<?php

return showImages();

function showImages(){
    $out = "<h1>Portfolio</h1>";
    $out .= "<div id='images'>";
    $folder = "img";
    $filesInFolder = new DirectoryIterator( $folder);
    while ( $filesInFolder->valid() ) {
        $file = $filesInFolder->current();
        $filename = $file->getFilename();
        $src = "$folder/$filename";
        $fileInfo = new Finfo( FILEINFO_MIME_TYPE ); 
        $mimeType = $fileInfo->file( $src );
        
        if ( $mimeType === 'image/jpeg' ) {
            $out .= "<div class=\"imageWrapper\">
            <img src=\"$src\" alt=\"\" />
            <a href=\"#\" class=\"cornerLink\">More about this project</a>
            </div>\r\n";
        }
        $filesInFolder->next();
    }
    $out .= "</div>";    
    return $out;

}

?>



