<?php

require("classes/Portfolio_Item.class.php");
// $item = new portfolioItem();

// var_dump($out);

// all we need to have for one good portfolio item
function showItem($id) {
$url = $_SERVER['PHP_SELF'];
$item = portfolioItem::getPortfolioItem($id);
$out = "<div class=\"x\">\n";		
            // print_r($item->id);
            $out .= "<h1>$item->title</h1>\n";
            $out .= "<p>Client: $item->client</p>\n";
			$out .= "<p>Published: $item->date</p>\n";
    		$out .= "<p>Category: $item->category</p>\n";
    		$out .= "<p>Description: $item->description</p>\n";
			$out .= "<div><img src=\"$item->poster\" alt=\"$item->title\" width=\"100%\" />
            <div>$item->embed</div>\n";
    		$out .= "<p>Reference: $item->reference</p>\n";
            $out .= "<div class=\"fb-share-button\" data-href=\"$url\" data-layout=\"button_count\" data-mobile-iframe=\"true\"></div>";
$out .= "</div>\n";

return $out;
}


// page title
$pageData->title = "Portfolio"; // .$item->title;

// let's look at it
if(isset($_GET['id'])) {
    $output = showItem($_GET['id']);
    return "$output";
} else {
    return "Item ID is missing. Please choose another work from our portfolio <a href=\"index.php?page=portfolio\" title=\"Portfolio\">portfolio</a>.";
}

?>