<?php if ( ! defined( 'WPINC' ) ) die;
/**
 * Flow-Flow
 *
 * Plugin class. This class should ideally be used to work with the
 * public-facing side of the WordPress site.
 *
 * If you're interested in introducing administrative or dashboard
 * functionality, then refer to `FlowFlowAdmin.php`
 *
 * @package   FlowFlow
 * @author    Looks Awesome <email@looks-awesome.com>

 * @link      http://looks-awesome.com
 * @copyright 2014 Looks Awesome
 */
require_once(AS_PLUGIN_DIR . 'includes/cache/FFCacheManager.php');

class FFSnapshotManager {
	private static $TABLE_NAME = 'ff_snapshots';

	public static function create_snapshot_table () {
		global $wpdb;
		global $ff_db_version;
		$table_name = $wpdb->prefix . self::$TABLE_NAME;

		/*
		 * We'll set the default character set and collation for this table.
		 * If we don't do this, some characters could end up being converted
		 * to just ?'s when saved in our table.
		 */
		$charset_collate = '';

		if ( ! empty( $wpdb->charset ) ) {
			$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
		}

		if ( ! empty( $wpdb->collate ) ) {
			$charset_collate .= " COLLATE {$wpdb->collate}";
		}

		$sql = "CREATE TABLE {$table_name} (
			id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			description VARCHAR(20),
			creation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			settings LONGTEXT NOT NULL,
			fb_settings LONGTEXT
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		add_option( 'ff_db_version', $ff_db_version );
	}

	protected static $instance = null;

	/** @return FFSnapshotManager */
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	function __construct() {
		add_action('wp_ajax_create_backup', array( $this, 'processAjaxRequest'));
		add_action('wp_ajax_restore_backup', array( $this, 'processAjaxRequest'));
		add_action('wp_ajax_delete_backup', array( $this, 'processAjaxRequest'));
	}

	public function getSnapshots(){
		global $wpdb;
		$table_name = $wpdb->prefix . self::$TABLE_NAME;

		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
			return $wpdb->get_results ("SELECT * FROM {$table_name} ORDER BY creation_time DESC");
		}
	}

	public function processAjaxRequest() {
		$result = array();
		if (isset($_REQUEST['action'])){
			switch ($_REQUEST['action']){
				case 'create_backup':
					$result = $this->createBackup();
					break;
				case 'restore_backup':
					$result = $this->restoreBackup();
					break;
				case 'delete_backup':
					$result = $this->deleteBackup();
					break;
			}
		}
		echo json_encode($result);
		die();
	}

	public function createBackup () {
		/** @var wpdb $wpdb */
		global $wpdb;
		$description = '';//TODO add description for snapshot
		$table_name = $wpdb->prefix . self::$TABLE_NAME;
		$option_name = FlowFlow::$PLUGIN_SLUG_DOWN . '_options';
		$fb_auth_option_name = FlowFlow::$PLUGIN_SLUG_DOWN . '_fb_auth_options';
		$sql = "INSERT INTO `{$table_name}` (`description`, `settings`, `fb_settings`) SELECT '{$description}', wp1.option_value as 'settings', wp2.option_value as 'fb_settings' FROM {$wpdb->options} wp1, {$wpdb->options} wp2 WHERE wp1.option_name = '{$option_name}' AND wp2.option_name = '{$fb_auth_option_name}'";
		$op = $wpdb->query($sql);
		return array('backed_up' => (false !== $op), 'result' => $wpdb->insert_id);
	}

	public function restoreBackup () {
		/** @var wpdb $wpdb */
		global $wpdb;
		$table_name = $wpdb->prefix . self::$TABLE_NAME;
		$op = $wpdb->get_results ("SELECT `settings`, `fb_settings` FROM {$table_name} WHERE id = '". $_REQUEST['id'] ."'");

		if (count($op)) {
			$option_name = FlowFlow::$PLUGIN_SLUG_DOWN . '_options';
			$fb_auth_option_name = FlowFlow::$PLUGIN_SLUG_DOWN . '_fb_auth_options';
			$sql = "UPDATE `{$wpdb->options}` SET option_value = '%s' WHERE option_name = '%s'";
			$prepare_sql = $wpdb->prepare($sql, $op[0]->settings, $option_name);
			$wpdb->query($prepare_sql);
			$prepare_sql = $wpdb->prepare($sql, $op[0]->fb_settings, $fb_auth_option_name);
			$wpdb->query($prepare_sql);

			FFCacheManager::clean(array('%'));

			return array('restore' => true);
		}
		return array('found' => false);
	}

	public function deleteBackup () {
		global $wpdb;
		$table_name = $wpdb->prefix . self::$TABLE_NAME;
		$op = $wpdb->query ("DELETE FROM {$table_name} WHERE id = '". $_REQUEST['id'] ."'");
		return array('deleted' => (false !== $op));
	}
} 