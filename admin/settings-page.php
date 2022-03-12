<?php // mattbebay - Settings Page



// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}




// display the plugin settings page
function mattbebay_display_settings_page() {
	
	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	
	?>
	
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			
			<?php
			
			// output security fields
			settings_fields( 'mattbebay_options' );
			
			// output setting sections
			do_settings_sections( 'mattbebay' );
			
			// submit button
			submit_button();
			
			?>
			
		</form>
		<a href="https://developer.ebay.com/devzone/finding/callref/Enums/GlobalIdList.html" target="_blank"> List of global ID's</a>
	</div>
	
	<?php
	
}


