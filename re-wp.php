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
include_once( plugin_dir_path( __FILE__ ) . 'plugin.php' );
include_once( plugin_dir_path( __FILE__ ) . 'update.php' );
 
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