<?php

include_once "classes/Portfolio_Item.class.php";

// page title
$pageData->title = "Upload";


// if form was submitted
if ( isset( $_POST['new-work'] ) ) {
    
    //this code runs if form was submitted
    $output = upload();
    
} else {
    
    //this runs if form was NOT submitted
    $output = include_once "views/upload-form.php";
}
return $output;

function upload(){    
    
    $newPortfolioItem = new portfolioItem();
    $newPortfolioItem->date = $_POST['date'];
    $newPortfolioItem->title = $_POST['title'];
    $newPortfolioItem->client = $_POST['client'];
    $newPortfolioItem->description = $_POST['description'];
    $newPortfolioItem->embed = $_POST['emb'];
    $newPortfolioItem->filename = $_FILES['poster']['name'];
    $newPortfolioItem->filedata = $_FILES['poster']['tmp_name'];
    $newPortfolioItem->reference = $_POST['reference'];
    $newPortfolioItem->category = $_POST['category'];
    
    // this creates the folder for the object and stores the data
    $itemUploaded = $newPortfolioItem->insert();
        
    if ( $itemUploaded ) {
        $out = "<section>New work '".$newPortfolioItem->title."' successfully added to the portfolio!</section>";
    } else {
        $out = "Sorry, something went wrong :/";
    } 
    return $out;
}