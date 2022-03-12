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
		$shipping = $item->shippingInfo->shippingServiceCost;
		$condition = $item->condition->conditionDisplayName;
		$currentPrice = $item->sellingStatus->currentPrice;
		$buyItNowPrice = $item->listingInfo->buyItNowPrice;
		  // For each SearchResultItem node, build a link and append it to $results
		 $results .= "<div class='mattbEbay_result ".$colour."'>";
		 $results .="<div class='mattEbay_header'><h5>$title</h5></div>";
		 $results .= "<div class='mattbEbay_leftCol'>";
		 $results .="<img src=\"$pic\">";
		 $results .="</div>";
		 $results .="<div class='mattbEbay_rightCol'>";
		
		
		 
		 $results .="<p class='mattbEbay_buyitnowPrice'><span class='mattbEbay_p_bold'>Condition:</span> $condition </p>";
		 $results .="<p class='mattbEbay_currentPrice'><span class='mattbEbay_p_bold'>Current Price:</span> $currentPrice</p>";
		 $results .="<p class='mattbEbay_currentPrice'><span class='mattbEbay_p_bold'>Shipping cost:</span> $shipping</p>";
		 $results .="<p class='mattbEbay_buyitnowPrice'><span class='mattbEbay_p_bold'>Buy it now price:</span> $buyItNowPrice</p>";
		 
		//  $results ."<button class='button' href='".$link."'>Buy now</button>";

		 $results .="<a class='mattbEbay_button' href='".$link."' target='_blank'>Buy it now</a>";
		 $results .="</div>";
		 $results .="</div>";
		}
        ?>