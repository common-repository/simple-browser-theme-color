<?php

	/**
	 * Plugin Name: 🎨 Simple Browser Theme Color
	 * Plugin URI:  https://wordpress.org/plugins/simple-browser-theme-color
	 * Description: This plugin allows you to easily add the "theme-color" meta tag to your website.
	 * Version:     1.1.0
	 * Author:      Christoph Weßels
	 * Author URI:  https://christophwessels.com
	 * Text Domain: wessels-browser-theme
	 */

	defined( 'ABSPATH' ) || exit;

	if ( ! defined( 'WESSELS_THEME_COLOR_PLUGIN_FILE' ) ) {
		define( 'WESSELS_THEME_COLOR_PLUGIN_FILE', __FILE__ );
	}

	require_once("class-settings.php");
	require_once("class-header.php");

	function SBTC_plugin_settings_link($links) {
		$settings_link = '<a href="options-general.php?page=wessels_browser_theme_settings">Settings</a>';
		array_unshift($links, $settings_link);
		return $links;
	}

	$plugin = plugin_basename(__FILE__);
	add_filter("plugin_action_links_$plugin", 'SBTC_plugin_settings_link' );

?>