<?php

require("classes/Portfolio_Item.class.php");

// pseudocode with reference function for home page

function showReference($id) {
$item = portfolioItem::getAllPortfolioItems();
    
// if we have and id then show related reference and if not, then return random reference
// from all portfolio items get array with portfolio items which has reference
// shuffle them
// return $client and $refrence and $itemID as a link to work in the portfolio 

$out = "<div>\n";		
            $out .= "<p>$item->refernce</p>\n";
			$out .= "<p>Published: $item->date</p>\n";
            $out .= "<p><a href=\"index.php?page=item&id=$portfolioItem->id\">Client: $item->client</a></p>\n";
$out .= "</div>\n";

return $out;
}

if(isset($_GET['id'])) {
    $output = showReference($_GET['id']);
    return "$output";
} else {
    return "Item ID is missing. Please choose another work from our portfolio <a href=\"index.php?page=portfolio\" title=\"Portfolio\">portfolio</a>.";}
    
?>