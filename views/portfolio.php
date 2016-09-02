<?php
include_once "classes/Portfolio_Item.class.php";

// page title
$pageData->title = "Portfolio";

$max = count(portfolioItem::getAllPortfolioItems());
$output = portfolioItem::showPortfolioItem($max);

return "
<h1>Our works</h1>\n

<section>
<p>We work with everything in the production of short / long fiction films, 
documentaries, TV series, presentation / company videos and music / theater production.</p>
</section>

<div class='button-group filters-button-group'>
  <button class='button is-checked' data-filter='*'>Show all categories</button>
  <button class='button' data-filter='.company'>Company</button>
  <button class='button' data-filter='.music'>Music</button>
  <button class='button' data-filter='.theatre'>Theatre</button>
  <button class='button' data-filter='.film'>Film</button>
</div>

$output
";
?>