<?php

// new RecursiveDirectoryIterator(WEBSITE_DOCROOT.$path_directory, RecursiveDirectoryIterator::SKIP_DOTS);

return showImages();

function showImages(){
    $out = "<h2 id=\"heading-2\">Latest works</h2>\r\n";
    $out .= "<ul class=\"grid cs-style-3\">\r\n";
    $folder = "img";
    $filesInFolder = new DirectoryIterator( $folder);
    $x = 1;
    do {
        $file = $filesInFolder->current();
        $filename = $file->getFilename();
        $src = "$folder/$filename";
        $fileInfo = new Finfo( FILEINFO_MIME_TYPE ); 
        $mimeType = $fileInfo->file( $src );
        
        if ( $mimeType === 'image/jpeg' ) {
            $out .= "<li><figure>
            <img src=\"$src\" alt=\"\" />
            <figcaption>
				<h3>Camera</h3>
				<span>Claus Lund</span>
				<a href=\"index.php?page=portfolio\">Take a look</a>
			</figcaption></figure>
            </li>\r\n";
        }
        $filesInFolder->next();
        $x++;
    } while ($x <= 6);
    $out .= "</ul>
    <p><a href=\"portfolio.html\">See more</a></p>
    <!-- end of mainwrapper -->";
    

return "                
                <section>    
                    <h2>Who we are</h2>

                    <p>At Duke Denver Film we put you and your history into focus. Whether it is a sales video , information video , add a festive touch to a birthday - or something else - we have the experience and expertise to convey the exact way you want it! <a href=\"about.html\">Read more</a>
                    </p>

                </section>

                <section>
                    <h2>Latest works</h2>
                
                $out
                
                </section>
                
                <section> 
                
                    <h2>References</h2>

                    <p>Having worked with a few creative agencies in the past, DDF was the best experience by far. We want to thank you for the excellent technical support of your company. In the future we are planning to use your services again.<a href=\"portfolio.html\">Signe Klejs &amp; katja management</a>
                    </p>

                </section>
";
}