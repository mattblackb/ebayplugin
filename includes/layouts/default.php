<?php
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}
echo('<h1>Layout Default</h1>');
var_dump($resp->searchResult->item);
$results= '';
foreach($resp->searchResult->item as $item) {
		$pic   = $item->galleryURL;
		$link  = $item->viewItemURL;
		$title = $item->title;
		$currentPrice = $item->sellingStatus->currentPrice;
		$buyItNowPrice = $item->listingInfo->buyItNowPrice;
		  // For each SearchResultItem node, build a link and append it to $results
		 $results .= "<div class='mattbEbay_result'>";
		 $results .= "<div class='mattbEbay_leftCol'>";
		 $results .="<img src=\"$pic\">";
		 $results .="</div>";
		 $results .="<div class='mattbEbay_rightCol'>";
		 $results .="<h4>$title</h4>";
		 $results .="<p class='mattbEbay_currentPrice'>Current Price: $currentPrice</p>";
		 $results .="<p class='mattbEbay_buyitnowPrice'>Buy it now price: $buyItNowPrice</p>";
		 $results .="</div>";
		}
        ?>