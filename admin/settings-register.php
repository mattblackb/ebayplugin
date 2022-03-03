<?php

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}


// register plugin settings
function myplugin_register_settings() {

		/*
	
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	
	*/
	
	add_settings_section( 
		'myplugin_section_login', 
		'Customize Login Page', 
		'myplugin_callback_section_login', 
		'myplugin'
	);
	
	// add_settings_section( 
	// 	'myplugin_section_admin', 
	// 	'Customize Admin Area', 
	// 	'myplugin_callback_section_admin', 
	// 	'myplugin'
	// );

		/*

	add_settings_field(
    	string   $id,
		string   $title,
		callable $callback,
		string   $page,
		string   $section = 'default',
		array    $args = []
	);

	*/

	add_settings_field(
		'custom_url',
		'Custom URL',
		'myplugin_callback_field_text',
		'myplugin',
		'myplugin_section_login',
		[ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link https://svcs.sandbox.ebay.com for sandbox access https://svcs.ebay.com for production' ]
	);

	add_settings_field(
		'custom_api',
		'Your ebay App ID',
		'myplugin_callback_field_text',
		'myplugin',
		'myplugin_section_login',
		[ 'id' => 'custom_api', 'label' => 'Enter your ebay App ID here' ]
	);

	add_settings_field(
		'custom_store',
		'Custom Store',
		'myplugin_callback_field_text',
		'myplugin',
		'myplugin_section_login',
		[ 'id' => 'custom_store', 'label' => 'Enter your unique ebay store ID - eg. EBAY-US, EBAY-GB etc.' ]
	);

	add_settings_field(
		'custom_affilaite',
		'Affiliate Campaign',
		'myplugin_callback_field_text',
		'myplugin',
		'myplugin_section_login',
		[ 'id' => 'custom_affilaite', 'label' => 'Enter your affiliate Campaign address' ]
	);

	// add_settings_field(
	// 	'custom_message',
	// 	'Custom Message',
	// 	'myplugin_callback_field_textarea',
	// 	'myplugin',
	// 	'myplugin_section_login',
	// 	[ 'id' => 'custom_message', 'label' => 'Custom text and/or markup' ]
	// );

	// add_settings_field(
	// 	'custom_footer',
	// 	'Custom Footer',
	// 	'myplugin_callback_field_text',
	// 	'myplugin',
	// 	'myplugin_section_admin',
	// 	[ 'id' => 'custom_footer', 'label' => 'Custom footer text' ]
	// );

	// add_settings_field(
	// 	'custom_toolbar',
	// 	'Custom Toolbar',
	// 	'myplugin_callback_field_checkbox',
	// 	'myplugin',
	// 	'myplugin_section_admin',
	// 	[ 'id' => 'custom_toolbar', 'label' => 'Remove new post and comment links from the Toolbar' ]
	// );

	// add_settings_field(
	// 	'custom_scheme',
	// 	'Custom Scheme',
	// 	'myplugin_callback_field_select',
	// 	'myplugin',
	// 	'myplugin_section_admin',
	// 	[ 'id' => 'custom_scheme', 'label' => 'Default color scheme for new users' ]
	// );




 
	
	/*
	
	register_setting( 
		string   $option_group, 
		string   $option_name, 
		callable $sanitize_callback
	);
	
	*/
	
	
	register_setting( 
		'myplugin_options', 
		'myplugin_options', 
		'myplugin_callback_validate_options',
		
	); 

}
add_action( 'admin_init', 'myplugin_register_settings' );