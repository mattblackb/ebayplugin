<?php
/*
Plugin Name: Simple Example Plugin
Description: Welcome to WordPress plugin development.
Plugin URI:  https://plain.black
Author:      Matt Burton
Version:     1.0
License:     GPLv2 or later
*/



// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

if (is_admin() ){
// include plugin dependencies
require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
// include plugin dependenciesx
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';

require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
}
//Core functionality- includes for public and admin
require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcode_ebaytastic.php';



// validate plugin settings 
function myplugin_validate_options($input) {
	
	// todo: add validation functionality..
	
	return $input;
	
}

// default plugin options
function myplugin_options_default() {

	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_api'   => 'ebay api',
		'custom_store'   => 'EBAY-US',
		// 'custom_message' => '<p class="custom-message">My custom message</p>',
		// 'custom_footer'  => 'Special message for users',
		// 'custom_toolbar' => false,
		// 'custom_scheme'  => 'default',
	);

}






