<?php
class Uploader {
    private $filename;
    private $fileData;
    private $destination;
    
    
    public function __construct( $key ) {
        $this->filename = $_FILES[$key]['name'];
        $this->fileData = $_FILES[$key]['tmp_name'];
    }

    public function saveIn( $folder ) {
        $this->destination = $folder;
    }
    
    public function save($input){
        $folderIsWritAble = is_writable( $this->destination );
        if( $folderIsWritAble ){
            $name = "$this->destination/$this->filename";
            $succes = move_uploaded_file( $this->fileData, $name );
            
            $input['poster'] = $name;
            
            // Open the CSV file for writing
            $fh = fopen('portfolio.csv','ab');
            
            // Write the data as a CSV-formatted string as a new line
            fputcsv($fh, $input);
        
            // close file
            fclose($fh);
            
        } else {
            trigger_error("cannot write to $this->destination");
            $succes = false;
        }
        return $succes;
    }

}



