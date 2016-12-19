<?php if ( ! defined( 'WPINC' ) ) die;
/**
 * Flow-Flow.
 *
 * @package   FlowFlow
 * @author    Looks Awesome <email@looks-awesome.com>

 * @link      http://looks-awesome.com
 * @copyright 2014 Looks Awesome
 */
require_once(AS_PLUGIN_DIR . 'includes/settings/FFSettingsUtils.php');
require_once(AS_PLUGIN_DIR . 'includes/social/timelines/FFTimeline.php');

class FFListTimeline implements FFTimeline{
	private static $URL = 'https://api.twitter.com/1.1/lists/statuses.json';

	private $count;
	private $screenName;
	private $include_rts;
	private $listName;

	public function init( $stream, $feed ) {
		$this->count = $stream->getCountOfPosts();
		$this->listName = $feed->{'list-name'};
		$this->screenName = $feed->content;
		$this->include_rts = (string)FFSettingsUtils::YepNope2ClassicStyle($feed->retweets);
	}

	public function getUrl() {
		return self::$URL;
	}

	public function getField() {
		$getfield = "?slug={$this->listName}&owner_screen_name={$this->screenName}&count={$this->count}&include_rts={$this->include_rts}&include_entities=true";
		return $getfield;
	}
}