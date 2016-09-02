<?php
include_once "classes/Portfolio_Item.class.php";

// home sweet home
$pageData->title = "Home";

$latest = portfolioItem::showPortfolioItem(4);

return "                
                <section>    
                    <h2>Who we are</h2>

                    <p>At Duke Denver Film we put you and your story into focus. Whether it is a sales video, information video, add a festive touch to a birthday - or something else - we have the experience and expertise to convey the exact way you want it! <a href=\"index.php?page=about\">Read more</a>
                    </p>

                </section>

                <section>
                    <h2>Latest works</h2>
                    
                    $latest
                    
                    <p><a href=\"index.php?page=portfolio\">See more</a></p>
                </section>
                
                <section> 
                
                    <h2>References</h2>

                    <p>Having worked with a few creative agencies in the past, DDF was the best experience so far. We want to thank your team for the excellent and professional work. In the future we are planning to use your services again. <a href=\"http://ilyakalinkin.890m.com/index.php?page=item&id=2016-05-27-11-43-59-02-00\">Signe Klejs &amp; katja management</a>
                    </p>

                </section>
";
?>