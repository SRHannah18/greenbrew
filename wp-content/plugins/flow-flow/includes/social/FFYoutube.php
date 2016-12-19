<?php if ( ! defined( 'WPINC' ) ) die;
/**
 * Flow-Flow.
 *
 * @package   FlowFlow
 * @author    Looks Awesome <email@looks-awesome.com>

 * @link      http://looks-awesome.com
 * @copyright 2014 Looks Awesome
 */
require_once(AS_PLUGIN_DIR . 'includes/social/FFRss.php');
require_once(AS_PLUGIN_DIR . 'includes/social/FFFeedUtils.php');

class FFYoutube extends FFRss{
	private $nickname;
	private $profileImages = array();

	public function __construct() {
		parent::__construct( 'youtube' );
	}

	/**
	 * @param FFGeneralSettings $options
	 * @param FFStreamSettings $stream
	 * @param $feed
	 */
	public function init($options, $stream, $feed) {
		parent::init($options, $stream, $feed);
		$num = $this->getCount();
		$num = intval($num) > 50 ? 50 : $num;
		if (isset($feed->{'timeline-type'})) {
			switch ( $feed->{'timeline-type'} ) {
				case 'user_timeline':
					//		$this->url = "http://gdata.youtube.com/feeds/api/videos?{$feed->{'type'}}={$feed->content}&max-results={$num}&alt=rss&orderby=published&v=2";
					$this->url = "http://gdata.youtube.com/feeds/api/users/{$feed->content}/uploads?v=2.1&alt=rss";
					break;
				case 'playlist':
					$this->url = "http://gdata.youtube.com/feeds/api/playlists/{$feed->content}?v=2.2&alt=rss";
					break;
				case 'search':
					$query = urlencode($feed->content);
					$this->url = "http://gdata.youtube.com/feeds/api/videos?v=2.1&alt=rss&q={$query}";
					break;
			}
		}
	}

	protected function prepare( $item ) {
		$tm = parent::prepare( $item );
		$this->prepareMediaData($item);
		$this->prepareAuthorData($item);
		return $tm;
	}

	/**
	 * @param SimpleXMLElement $item
	 * @return string
	 */
	protected function getScreenName($item){
		$media = $item->children('media', true);
		$credit = $media->group->credit;
		foreach($credit->attributes('yt', true) as $a => $b) {
			if ($a == 'display') return $b;
		}
		return '';
	}

	/**
	 * @param SimpleXMLElement $item
	 * @return string
	 */
	protected function getHeader($item){
		return FFFeedUtils::wrapLinks(strip_tags((string)$item->title));
	}

	/**
	 * @param SimpleXMLElement $item
	 * @return string
	 */
	protected function getContent( $item ) {
		$media_group = $item->children('media', true);
		foreach ($media_group as $child) {
			$media = $child->children( 'media', true );
			foreach ( $media->description as $description ) {
				return FFFeedUtils::wrapLinks( strip_tags( (string) $description ) );
			}
		}
		return parent::getContent($item);
	}

	/**
	 * @param SimpleXMLElement $item
	 * @return bool
	 */
	protected function showImage($item){
		return isset($this->image);
	}

	/**
	 * @param SimpleXMLElement $item
	 * @return array
	 */
	protected function getImage( $item ) {
		return $this->image;
	}

	/**
	 * @param SimpleXMLElement $item
	 * @return array
	 */
	protected function getMedia( $item ) {
		return $this->media;
	}

	/**
	 * @param SimpleXMLElement $item
	 * @return void
	 */
	private function prepareAuthorData( $item ) {

		$group = $item->children('media', true)->group;
		$media = $group->children('yt', true);
		$uploaderId = (string)$media->uploaderId;

		if (array_key_exists($uploaderId, $this->profileImages) ){
			$this->nickname = $this->profileImages[$uploaderId][0];
			$this->profileImage = $this->profileImages[$uploaderId][1];
			$this->userLink = $this->profileImages[$uploaderId][2];
		}
		else {
			$data = FFFeedUtils::getFeedData( 'https://gdata.youtube.com/feeds/api/users/' . $uploaderId . '?v=2' );
			$xml = simplexml_load_string($data['response']);
			if ($xml) {
				$thumb = $xml->children('media', true)->thumbnail->attributes();
				$username = $xml->children('yt', true)->username;

				$this->nickname = (string)$username;

				$this->profileImage = (isset($thumb)) ? (string)$thumb->url  :
					plugin_dir_url(AS_PLUGIN_DIR).FlowFlow::$PLUGIN_SLUG.'/assets/avatar_default.png';

				$this->userLink = (isset($username)) ? "https://www.youtube.com/user/" . $this->nickname : '#';

				$this->profileImages[$uploaderId] = array($this->nickname, $this->profileImage, $this->userLink);
			}
		}
	}

	/**
	 * @param SimpleXMLElement $item
	 * @return void
	 */
	private function prepareMediaData( $item ) {
		$max_width = 0;
		$media_group = $item->children('media', true);
		foreach ($media_group as $child){
			$media = $child->children('media', true);
			foreach($media->thumbnail as $thumbnail) {
				$attributes = $thumbnail[0]->attributes();
				$temp_weight = (string)$attributes->width;
				if ($temp_weight > $max_width) {
					$width = $temp_weight;
					$max_width = $temp_weight;
					$url = (string)$attributes->url;
					$height = (string)$attributes->height;
				}
			}
			$this->image = parent::createImage($url, $width, $height);

			$height = FFFeedUtils::getScaleHeight(600, $this->image['width'], $this->image['height']);
			$media = $child->children('yt', true);
			foreach($media->aspectRatio as $aspectRatio) {
				if ($aspectRatio == 'widescreen'){
					$height = 338;
					break;
				}
			}

			$media = $child->children('media', true);
			foreach($media->content as $content) {
				$attributes = $content[0]->attributes();
				if (isset($attributes->isDefault) && $attributes->isDefault == true){
					$url = $attributes->url . '&autoplay=0';
					$this->media = array('type' => (string)$attributes->type, 'url' => $url, 'width' => 600, 'height' => $height);
					break;
				}
			}
		}
	}
}