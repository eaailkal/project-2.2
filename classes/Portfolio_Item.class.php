<?php
  
define( "Portfolio_Folder" , "./works/");

//portfolioItem class for handling works in portfolio

class portfolioItem
{
    // property declaration
    public $id = '';
    public $author="CL";  // Claus Lund is default value
    public $date='';
    public $title='';
    public $client='';
    public $description='';
    public $embed='';
    public $poster='';
    public $reference='';
    public $category='';

    // method declaration 
    public function insert() {
        // create unique id from timestamp - only really OK if only one user
        // if 2 users hit send at the same time it MAY result in one of the inputs disappearing
        $subFolderNameAndId = date(DATE_ATOM); 
        
        // remove this line after testing
        // echo "<h1>".$subFolderNameAndId."</h1>"; 

        //  minus (-) replaces non-numbers (\D) to make a legal foldername
        $subFolderNameAndId = preg_replace("/\D/", "-", $subFolderNameAndId);  
        
        // remove this line after testing
        // echo "<h1>".$subFolderNameAndId."</h1>";  

        if (mkdir(Portfolio_Folder.$subFolderNameAndId)) {   
        // if (mkdir(Portfolio_Folder.$subFolderNameAndId)) && is_writable(Portfolio_Folder) {   
            // mkdir (above) creates a folder - returns true if successfull
            // and now we store the information inside the folder*
            $this->id = $subFolderNameAndId;
            $this->date=substr($subFolderNameAndId, 0,10);
            
            // save poster
            $this->postername = Portfolio_Folder.$subFolderNameAndId . "/" . $this->filename;
            $succes = move_uploaded_file( $this->filedata, $this->postername );

            // store all information in separate files inside newly created folder
            // first title
            $handle = fopen(Portfolio_Folder.$this->id."/author.ddf","w");
            fwrite($handle, $this->author);
            fclose($handle);

            // then content
            $handle = fopen(Portfolio_Folder.$this->id."/date.ddf","w");
            fwrite($handle, $this->date);
            fclose($handle);

            // e.t.c.
            $handle = fopen(Portfolio_Folder.$this->id."/title.ddf","w");
            fwrite($handle, $this->title);
            fclose($handle);

            // e.t.c.
            $handle = fopen(Portfolio_Folder.$this->id."/client.ddf","w");
            fwrite($handle, $this->client);
            fclose($handle);

            // e.t.c.
            $handle = fopen(Portfolio_Folder.$this->id."/description.ddf","w");
            fwrite($handle, $this->description);
            fclose($handle);
            
            // e.t.c.
            $handle = fopen(Portfolio_Folder.$this->id."/embed.ddf","w");
            fwrite($handle, $this->embed);
            fclose($handle);
            
            // e.t.c.
            $handle = fopen(Portfolio_Folder.$this->id."/poster.ddf","w");
            fwrite($handle, $this->postername);
            fclose($handle);
            
            // e.t.c.
            $handle = fopen(Portfolio_Folder.$this->id."/reference.ddf","w");
            fwrite($handle, $this->reference);
            fclose($handle);
            
            // and category
            $handle = fopen(Portfolio_Folder.$this->id."/category.ddf","w");
            fwrite($handle, $this->category);
            fclose($handle);

        } else {
            trigger_error("Cannot write to ". Portfolio_Folder. ".");
            $succes = false;
        }
        return $succes;

    }

    public static function getAllPortfolioItems() {
        $portfolioItemsIds  = array();
        $portfolioItemsIds = scandir(Portfolio_Folder);
        array_splice($portfolioItemsIds,0,2);
        rsort($portfolioItemsIds);
        
        // now we have an array ($portfolioItemsIds) of all the id´s 
        // next we turn that into an array ($portfolioItems) of portfolioItem objects
        $portfolioItems = array();
        foreach ($portfolioItemsIds as $id) {
            $portfolioItems[]= portfolioItem::getportfolioItem($id);
        }
        return $portfolioItems;
    }
  
    public function getRandomPortfolioItem	(){
    	$allPortfolioItems = portfolioItem::getAllPortfolioItems();
    	shuffle($allPortfolioItems);
        return $allPortfolioItems[0];
    }

    public static function getPortfolioItem($id){
        // create a portfolioItem object
        $portfolioItemToReturn = new portfolioItem();
        // give it an id
        $portfolioItemToReturn->id = $id ;
        // read the other attributes from the files in the folder
        $portfolioItemToReturn->author = file_get_contents(Portfolio_Folder.$id."/author.ddf");
        $portfolioItemToReturn->date = file_get_contents(Portfolio_Folder.$id."/date.ddf");
        $portfolioItemToReturn->title = file_get_contents(Portfolio_Folder.$id."/title.ddf");
        $portfolioItemToReturn->client =  file_get_contents(Portfolio_Folder.$id."/client.ddf");
        $portfolioItemToReturn->description =  file_get_contents(Portfolio_Folder.$id."/description.ddf");
        $portfolioItemToReturn->embed =  file_get_contents(Portfolio_Folder.$id."/embed.ddf");
        $portfolioItemToReturn->poster =  file_get_contents(Portfolio_Folder.$id."/poster.ddf");
        $portfolioItemToReturn->reference =  file_get_contents(Portfolio_Folder.$id."/reference.ddf");
        $portfolioItemToReturn->category =  file_get_contents(Portfolio_Folder.$id."/category.ddf");
        // send back the object to the caller
        return $portfolioItemToReturn;
    }

    public static function showPortfolioItem($max){
        if (isset($max)) {$result = $max;} else {$result = count(portfolioItem::getAllPortfolioItems());}
        $out = "<div class=\"grid\">\n";
        $i=0;
		$villy=portfolioItem::getAllPortfolioItems();
        foreach ($villy as $portfolioItem) {
            if ($i++ == $result) break;
            // $i++;
            // if($i>$max) break;
    		$out .= "<div class=\"element-item $portfolioItem->category\">\n";

            $out .= "<!-- <strong>$portfolioItem->title</strong> --> \n";
            $out .= "<!-- <p> $portfolioItem->client</p> --> \n";
			//	echo "<p>Posted on:$portfolioItem->date</p>\n";
			$out .= "<a href=\"index.php?page=item&id=$portfolioItem->id\"><img src=\"$portfolioItem->poster\" alt=\"$portfolioItem->title\" data-tooltip=\"<strong>$portfolioItem->title</strong><br><p> $portfolioItem->client</p>\" /></a></div>\n";
        }
        $out .= "</div>\n";
        return $out; 
    }
    
}
?>