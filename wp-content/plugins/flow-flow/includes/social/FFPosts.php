<?php if ( ! defined( 'WPINC' ) ) die;
/**
 * Flow-Flow.
 *
 * @package   FlowFlow
 * @author    Looks Awesome <email@looks-awesome.com>

 * @link      http://looks-awesome.com
 * @copyright 2014 Looks Awesome
 */
require_once(AS_PLUGIN_DIR . 'includes/social/FFBaseFeed.php');
require_once(AS_PLUGIN_DIR . 'includes/social/FFFeedUtils.php');

class FFPosts extends FFBaseFeed{
  private $args;
  private $shortcodes;
  private $authors;
	private $profileImage;

	public function __construct() {
		parent::__construct( 'posts' );
	}

	public function init($options, $stream, $feed){
    parent::init($options, $stream, $feed);
		$categories = $feed->{'category-name'};
		$this->shortcodes = $feed->{'shortcodes'};
    $this->args = array(
      'numberposts' => $this->getCount(),
      'category_name' => $categories,
      'post_status' => 'publish'
    );
    $this->profileImage = plugin_dir_url(AS_PLUGIN_DIR).FlowFlow::$PLUGIN_SLUG.'/assets/avatar_default.png';
  }

  public function posts(){
      $posts = wp_get_recent_posts($this->args);
      $result = array();
      foreach($posts as $item){
        $post = $this->parse($item);
        if ($this->isSuitablePost($post)) $result[] = $post;
      }
      return $result;
  }

  public function useCache(){
      false;
  }

  private function parse($post){
      $tc = new stdClass();
      $tc->id = (string)$post['ID'];
      $tc->type = $this->getType();
      $tc->header = $post['post_title'];
      $tc->nickname = $this->getAuthor($post['post_author'], 'nicename');
      $tc->screenname = trim($this->getAuthor($post['post_author'], 'user_full_name'));
      if (empty($tc->screenname)) $tc->screenname = get_bloginfo('name');
      $tc->system_timestamp = strtotime($post['post_date']);
      $tc->timestamp = FFFeedUtils::classicStyleDate($tc->system_timestamp);
      if ($this->shortcodes == 'strip') {
	      $tc->text = strip_shortcodes($post['post_content']);
      } else {
	      $tc->text = do_shortcode($post['post_content']);
      }
	    $userpic = get_avatar($post['post_author'], 80, '');
	    $tc->userpic =  (strpos($userpic,'avatar-default') !== false) ? $this->profileImage : FFFeedUtils::getUrlFromImg($userpic);
      $tc->userlink = '';//$this->getAuthor($post['post_author'], 'url');
      $tc->permalink = get_permalink($post["ID"]);

	    if ( has_post_thumbnail($post["ID"]) ) {
			$thumb_id = get_post_thumbnail_id($post["ID"]);
			$thumb = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
        $tc->img = $this->createImage($thumb[0], $thumb[1], $thumb[2]);
      }
      return $tc;
  }

  private function getAuthor($author_id, $key){
      if (!isset($this->authors[$author_id])){
          $this->authors[$author_id] = array(
              'nicename' => (string)get_the_author_meta('nicename', $author_id),
              'url' => (string)get_the_author_meta('url', $author_id),
              'user_full_name' => (string)get_the_author_meta('display_name', $author_id),
          );
      }
      return $this->authors[$author_id][$key];
  }
}