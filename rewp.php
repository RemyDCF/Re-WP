<?php
/**
* Plugin Name: Re:WP
* Description: Let's make WordPress a little bit more awesome!
* Version: 1.0
* Author: Rémy Da Costa Faro
* Author URI: https://remydcf.dev
**/

if (! defined('WPINC')) {
    die;
}
 
// Include the dependencies needed to instantiate the plugin.
foreach (glob(plugin_dir_path(__FILE__) . 'admin/*.php') as $file) {
    include_once $file;
}

// Include the shared dependency.
include_once(plugin_dir_path(__FILE__) . 'shared/class-deserializer.php');
include_once(plugin_dir_path(__FILE__) . 'plugin.php');
 
add_action('plugins_loaded', 're_wp_custom_admin_settings');

/**
 * Starts the plugin.
 *
 * @since 1.0.0
 */
function re_wp_custom_admin_settings()
{
    $serializer = new rewp_Serializer();
    $serializer->init();

    $deserializer = new rewp_Deserializer();

    $plugin = new rewp_Submenu(new rewp_Submenu_Page($deserializer));
    $plugin->init();
}
