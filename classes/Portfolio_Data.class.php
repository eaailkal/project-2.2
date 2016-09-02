<?php

// class Portfolio declaration
class Portfolio_Data {
    public $folder = "";
    public $latest = "";
    public $ind = "";

    // method for showing portfolio
    public function PortfolioPreview( $folder ){
        $ind = "";
        $filesInFolder = new DirectoryIterator($folder);
        while ( $filesInFolder->valid() ) {
            $file = $filesInFolder->current();
            $filename = $file->getFilename();
            $src = "$folder/$filename";
            $fileInfo = new Finfo( FILEINFO_MIME_TYPE ); 
            $mimeType = $fileInfo->file( $src );
            
            if ( $mimeType === 'image/jpeg' ) {
            $ind .= "<div class=\"box\"><img src=\"$src\" alt=\"\" />
            <span class=\"caption fade-caption\"><h3>Fade Caption</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer <a href=\"#\">More about this project</a></p>
            </span></div>\r\n";
            }
            $filesInFolder->next();
        }
        $ind .= "";
        print_r($ind); 
        
        return $ind;
    }
    
}

?>
