<?php // mattbebay - Core Functionality



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}

function sd_add_scripts(){
	wp_enqueue_script( 'mattbebay', plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/mattbebay-default.js', array('jquery'), null, true );
		
 
	wp_enqueue_style( 'mattbebay', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/mattbebay-main.css', array(), null, 'screen' );
		
}
add_action( 'wp_enqueue_scripts', 'sd_add_scripts' );



// custom login styles
function mattbebay_custom_login_styles() {
	
	$styles = true;
	$options = get_option( 'mattbebay_options', mattbebay_options_default() );
	
	if ( isset( $options['custom_style'] ) && ! empty( $options['custom_style'] ) ) {
		
		$styles = sanitize_text_field( $options['custom_style'] );
		
	}
	

		
		wp_enqueue_style( 'mattbebay', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/mattbebay-main.css', array(), null, 'screen' );
		
		wp_enqueue_script( 'mattbebay', plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/mattbebay-default.js', array(), null, true );
		
	
	
}
add_action( 'login_enqueue_scripts', 'mattbebay_custom_login_styles' );





// custom admin color scheme
function mattbebay_custom_admin_scheme( $user_id ) {
	
	$scheme = 'default';
	
	$options = get_option( 'mattbebay_options', mattbebay_options_default() );
	
	if ( isset( $options['custom_scheme'] ) && ! empty( $options['custom_scheme'] ) ) {
		
		$scheme = sanitize_text_field( $options['custom_scheme'] );
		
	}
	
	$args = array( 'ID' => $user_id, 'admin_color' => $scheme );
	
	wp_update_user( $args );
	
}
add_action( 'user_register', 'mattbebay_custom_admin_scheme' );


