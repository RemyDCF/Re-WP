<?php 

add_filter('plugins_api', 're_wp_plugin_info', 20, 3);

function re_wp_plugin_info( $res, $action, $args ){
 
	if( $action !== 'plugin_information' )
		return false;
 
	if( 're-wp' !== $args->slug )
		return $res;
  
	$remote = wp_remote_get( 'https://raw.githubusercontent.com/RemyDCF/Re-WP/master/info.json', array(
		'timeout' => 10,
		'headers' => array(
			'Accept' => 'application/json'
		) )
	);
  
	if( $remote ) {
 
		$remote = json_decode( $remote['body'] );
		$res = new stdClass();
		$res->name = $remote->name;
		$res->slug = 're-wp';
		$res->version = $remote->version;
		$res->tested = $remote->tested;
		$res->requires = $remote->requires;
		$res->author = $remote->author;
		$res->author_homepage = $remote->author_homepage;
		$res->download_link = $remote->download_url;
		$res->trunk = $remote->download_url;
		$res->last_updated = $remote->last_updated;
		$res->sections = array(
			'description' => $remote->sections->description, // description tab
			'installation' => $remote->sections->installation, // installation tab
			'changelog' => $remote->sections->changelog, // changelog tab
		);
        return $res;
 
	}
 
	return false;
}

add_filter('site_transient_update_plugins', 're_wp_push_update' );
 
function re_wp_push_update( $transient ){
 
	if ( empty($transient->checked ) ) {
        return $transient;
    }
 
	$remote = wp_remote_get( 'https://raw.githubusercontent.com/RemyDCF/Re-WP/master/info.json', array(
		'timeout' => 10,
		'headers' => array(
			'Accept' => 'application/json'
		) )
	);
 
	if( $remote ) {
 
		$remote = json_decode( $remote['body'] );
 
		if( $remote && version_compare( get_plugin_data()["Version"], $remote->version, '<' ) && version_compare($remote->requires, get_bloginfo('version'), '<' ) ) {
			$res = new stdClass();
			$res->slug = 're-wp';
			$res->plugin = 'Re-WP/re-wp.php';
			$res->new_version = $remote->version;
			$res->tested = $remote->tested;
			$res->package = $remote->download_url;
			$res->url = $remote->homepage;
           		$transient->response[$res->plugin] = $res;
           	}
 
	}
    return $transient;
}

?>