<?php
if(!function_exists('anyguide_plugin_get_version')) {
	function anyguide_plugin_get_version() {
		if ( ! function_exists( 'get_plugins' ) )
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			$plugin_folder = get_plugins( '/' . plugin_basename( dirname( ANYGUIDE_PLUGIN_FILE ) ) );
			// 		print_r($plugin_folder);
			return $plugin_folder['anyguide.php']['Version'];
	}
}

if(!function_exists('anyguide_trim_deep')) {
	function anyguide_trim_deep($value) {
		if ( is_array($value) ) {
			$value = array_map('anyguide_trim_deep', $value);
		} elseif ( is_object($value) ) {
			$vars = get_object_vars( $value );
			foreach ($vars as $key=>$data) {
				$value->{$key} = anyguide_trim_deep( $data );
			}
		} else {
			$value = trim($value);
		}
		return $value;
	}
}

if(!function_exists('anyguide_links')) {
	function anyguide_links($links, $file) {
		$base = plugin_basename(ANYGUIDE_PLUGIN_FILE);
		if ($file == $base) {
			$links[] = '<a href="http://help.anyguide.com/" target="_blank" class="anyguide_support" title="Support">Need Help?</a>';
			$links[] = '<a href="http://twitter.com/anyguidecom" class="anyguide_twitt" target="_blank" title="Follow us on Twitter">Twitter</a>';
			$links[] = '<a href="http://facebook.com/anyguidecom" class="anyguide_fbook" target="_blank" title="Like us on Facebook">Facebook</a>';
		}
		return $links;
	}
}

add_filter( 'plugin_row_meta','anyguide_links',10,2);