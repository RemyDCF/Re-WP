<?php
/**
* Plugin Name: Re:WP
* Description: Let's make Wordpress a little bit more awesome!
* Version: 1.0
* Author: Rémy Da Costa Faro
* Author URI: https://remydcf.dev
**/

if ( ! defined( 'WPINC' ) ) {
     die;
}
 
// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
    include_once $file;
}

// Include the shared dependency.
include_once( plugin_dir_path( __FILE__ ) . 'shared/class-deserializer.php' );
 
add_action( 'plugins_loaded', 're_wp_custom_admin_settings' );

/**
 * Starts the plugin.
 *
 * @since 1.0.0
 */
function re_wp_custom_admin_settings() {
 
    $serializer = new Serializer();
    $serializer->init();

    $deserializer = new Deserializer();

    $plugin = new Submenu( new Submenu_Page( $deserializer ) );
    $plugin->init();
 
}

register_activation_hook( __FILE__, 're_wp_plugin_activate' );
function re_wp_plugin_activate() {
    update_option('allow-svg', true );
    update_option('add-font-awesome', false );
}









function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

if (get_option('allow-svg')) {
	add_filter('upload_mimes', 'cc_mime_types');
}

function font_awesome() {
	echo '<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>';
}

if (get_option('add-font-awesome')) {
	add_action( 'admin_head', 'font_awesome');
	add_action( 'wp_head', 'font_awesome' );
}

function chrome_bar_color() {
	echo '<meta name="theme-color" content="#' . get_option('chrome-bar-color') . '">';
}

if (get_option('chrome-bar-color') != "") {
	add_action( 'admin_head', 'chrome_bar_color');
	add_action( 'wp_head', 'chrome_bar_color' );
}