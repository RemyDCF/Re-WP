<?php
/**
 * Creates the submenu page for the plugin.
 *
 * @package Re:WP
 */
 
/**
 * Creates the submenu page for the plugin.
 *
 * Provides the functionality necessary for rendering the page corresponding
 * to the submenu with which this page is associated.
 *
 * @package Re:WP
 */
class Submenu_Page {
 
        /**
     * This function renders the contents of the page associated with the Submenu
     * that invokes the render method. In the context of this plugin, this is the
     * Submenu class.
     */

    public function __construct( $deserializer ) {
    	$this->deserializer = $deserializer;
	}
	
    public function render() {
    	include_once( 'views/settings.php' );
	}
}