<?php 

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

?>