<?php
/*
Plugin Name: Custom Loops: get_posts()
Description: Demonstrates how to customize the WordPress Loop using get_posts().
Plugin URI:  https://plugin-planet.com/
Author:      Jeff Starr
Version:     1.0
*/
function getResponse($custom_url, $api, $globalid, $atts ) {
// API request variables
$searchterm = "Apple Mac Mini";
if(array_key_exists('searchterm', $atts)){
	$searchterm = $atts['searchterm'];
} else {
	$searchterm = "";
}
if(array_key_exists('num', $atts)){
	$number = $atts['num'];
} else {
	$number = 10;
}
$filterIndex = 0;
$endpoint = $custom_url.'/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = $api;  // Replace with your own AppID
// $globalid = 'EBAY-UK';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = $searchterm;  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0
// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=$number";
if(array_key_exists('minprice', $atts)){
	$minprice = $atts['minprice'];
	$apicall .= "&itemFilter($filterIndex).name=MinPrice";
	$apicall .= "&itemFilter($filterIndex).value=$minprice";
	$filterIndex++;
}
if(array_key_exists('maxprice', $atts)){
	$maxprice = $atts['maxprice'];
	$apicall .= "&itemFilter($filterIndex).name=MaxPrice";
	$apicall .= "&itemFilter($filterIndex).value=$maxprice";
	$filterIndex++;
}
if(array_key_exists('listingtype', $atts)){
	$listingtype = $atts['listingtype'];
	$apicall .= "&itemFilter($filterIndex).name=ListingType";
	$apicall .= "&itemFilter($filterIndex).value(0)=$listingtype";
	// $apicall .= "&itemFilter($filterIndex).value(0)=$listingtype";
	$filterIndex++;
}
if(array_key_exists('category', $atts)){
	$category = $atts['category'];
	$apicall .= "&findItemsByCategory.categoryId=$category";
	// $apicall .= "&itemFilter($filterIndex).value=$maxprice";
	$filterIndex++;
}
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
	if(array_key_exists('layout', $atts)){
		//include layouts with search results
		require_once plugin_dir_path( __FILE__ ) . 'layouts/'.$atts['layout'].'.php';
	} else {
		$results = '';
		// If the response was loaded, parse it and build links
		foreach($resp->searchResult->item as $item) {
		  $pic   = $item->galleryURL;
		  $link  = $item->viewItemURL;
		  $title = $item->title;
	  
		  // For each SearchResultItem node, build a link and append it to $results
		  $results .= "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td></tr>";
		}
   
    }
  }
  // If the response does not indicate 'Success,' print an error
  else {
    $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
    $results .= "AppID for the Production environment.</h3>";
  }
  return $results;
}

  


// custom loop shortcode: [get_posts_example]
function custom_loop_shortcode_get_posts( $atts ) {

	$options = get_option( 'myplugin_options', myplugin_options_default() );
	
	if ( isset( $options['custom_url'] ) && ! empty( $options['custom_url'] ) ) {
		
		$url = esc_url( $options['custom_url'] );
		
	} else {
		$url = "https://svcs.sandbox.ebay.com";
	}

	if ( isset( $options['custom_api'] ) && ! empty( $options['custom_api'] ) ) {
		
		$api=  $options['custom_api'] ;
		
	} else {
		$api = "Error";
	}

	if ( isset( $options['custom_store'] ) && ! empty( $options['custom_store'] ) ) {
		
		$globalid= $options['custom_store'] ;
		
	} else {
		$globalid = "EBAY-US";
	}
	// if($atts ) {
	// 	$searchterm = $atts['searchterm'];
	// }
	 
	// get global post variable
	global $post;
	// extract( shortcode_atts(  $atts ) );
	$results = getResponse(	$url, $api, $globalid, $atts );

	
	// get the posts
	// $posts = get_posts( $args );

	// begin output variable
	$output  =  $results;
	
	// return output
	return $output;
	
}

function wpb_hook_javascript() {
	$affiliate = '5338915041';
	$options = get_option( 'myplugin_options', myplugin_options_default() );
	if ( isset( $options['custom_affilaite'] ) && ! empty( $options['custom_affilaite'] ) ) {
		
		$affiliate=  $options['custom_affilaite'] ;
		
	}
    ?>
  
         <script>window._epn = {campaign: <?php echo($affiliate); ?>, smartPopover:false};</script>
		<script src="https://epnt.ebay.com/static/epn-smart-tools.js"></script>
		<!-- <script> alert( '<?php echo($affiliate); ?>'); </script> -->
       
    <?php
}

// register shortcode function
add_shortcode( 'get_posts_example', 'custom_loop_shortcode_get_posts' );
add_action('wp_head', 'wpb_hook_javascript');


