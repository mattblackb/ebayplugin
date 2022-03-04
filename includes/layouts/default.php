<?php
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

$results= '';
foreach($resp->searchResult->item as $item) {
		$pic   = $item->galleryURL;
		$link  = $item->viewItemURL;
		$title = $item->title;
		$currentPrice = $item->sellingStatus->currentPrice;
		$buyItNowPrice = $item->listingInfo->buyItNowPrice;
		  // For each SearchResultItem node, build a link and append it to $results
		 $results .= "<div class='mattbEbay_result ".$colour."'>";
		 $results .= "<div class='mattbEbay_leftCol'>";
		 $results .="<img src=\"$pic\">";
		 $results .="</div>";
		 $results .="<div class='mattbEbay_rightCol'>";
		 $results .="<h5>$title</h5>";
		
		 $results .="<p class='mattbEbay_currentPrice'>Current Price: $currentPrice</p>";
		 $results .="<p class='mattbEbay_buyitnowPrice'>Buy it now price: $buyItNowPrice</p>";
		 $results .="<a class='mattbEbay_button' href='".$link."' target='_blank'>Visit</a>";
		 $results .="</div>";
		 $results .="</div>";
		}
        ?>