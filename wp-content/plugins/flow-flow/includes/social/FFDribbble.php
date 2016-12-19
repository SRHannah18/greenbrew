<?php if ( ! defined( 'WPINC' ) ) die;
/**
 * Flow-Flow.
 *
 * @package   FlowFlow
 * @author    Looks Awesome <email@looks-awesome.com>

 * @link      http://looks-awesome.com
 * @copyright 2014 Looks Awesome
 */
require_once(AS_PLUGIN_DIR . 'includes/social/FFFeedUtils.php');
require_once(AS_PLUGIN_DIR . 'includes/social/FFHttpRequestFeed.php');
require_once(AS_PLUGIN_DIR . 'includes/settings/FFSettingsUtils.php');

class FFDribbble extends FFHttpRequestFeed{
	private $showText;
	private $page = 1;
	private $template_url;
	private $size = 0;

	public function __construct() {
		parent::__construct( 'dribbble' );
	}

	public function init( $options, $stream, $feed ) {
		parent::init( $options, $stream, $feed );
		$username = $feed->content;
		$partOfUrl = ($feed->{'timeline-type'} == 'liked') ? '/likes' : '';
		$this->template_url = "http://api.dribbble.com/players/{$username}/shots{$partOfUrl}?sort=recent&page=";
		$this->url = $this->template_url . $this->page;
		$this->showText = FFSettingsUtils::notYepNope2ClassicStyle($feed->{'hide-text'}, true);
	}

	protected function items( $request ) {
		$pxml = json_decode($request);
		return $pxml->shots;
	}

	protected function getId( $item ) {
		return $item->id;
	}

	protected function getHeader( $item ) {
		return $this->showText ? $item->title : '';
	}

	protected function getScreenName( $item ) {
		return $item->player->name;
	}

	protected function getProfileImage( $item ) {
		return $item->player->avatar_url;
	}

	protected function getSystemDate( $item ) {
		return strtotime($item->created_at);
	}

	protected function getContent( $item ) {
		return $this->showText ? FFFeedUtils::wrapLinks($item->description) : '';
	}

	protected function getUserlink( $item ) {
		return $item->player->url;
	}

	protected function getPermalink( $item ) {
		return $item->url;
	}

	protected function showImage( $item ) {
		return true;
	}

	protected function getImage( $item ) {
		$width = $this->getImageWidth();
		$height = FFFeedUtils::getScaleHeight($width, $item->width, $item->height);
		$url = $item->image_url;
		return $this->createImage($url, $width, $height);
	}

	protected function getMedia( $item ) {
		return $this->createMedia($item->image_url, $item->width, $item->height);
	}

	protected function customize( $post, $item ) {
		$post->nickname = isset($item->username) ? $item->username : '';
		return parent::customize( $post, $item );
	}

	protected function nextPage( $result ) {
		$size = sizeof($result);
		if ($size == $this->size) {
			return false;
		}
		else {
			$this->size = $size;
			$this->page = $this->page + 1;
			$this->url = $this->template_url . $this->page;
			return $this->getCount() >= $size;
		}
	}
}