<?php

// include_once "classes/Portfolio_Data.class.php";
// $portfolio = new Portfolio_Data();

// $portfolio->PortfolioPreview('img');

// page title
$pageData->title = "Portfolio";

/**
 * Convert a comma separated file into an associated array.
 * The first row should contain the array keys.
 * 
 * Example:
 * 
 * @param string $filename Path to the CSV file
 * @param string $delimiter The separator used in the file
 * @return array
 * @link http://gist.github.com/385876
 * @author Jay Williams <http://myd3.com/>
 * @copyright Copyright (c) 2010, Jay Williams
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
function csv_to_array($filename='', $delimiter=',')
{
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
		{
			if (!$header)
				$header = array_map('trim', $row);
			else
				$data[] = array_combine($header, $row);
		}
		fclose($handle);
	}
	return $data;
}



print_r( $work = (csv_to_array('portfolio.csv')) );



foreach(new RecursiveIteratorIterator(new RecursiveArrayIterator($work)) as $key=>$value)
{
    $worksOutput = "";
    switch ($key) {
    case "title": $worksOutput .= "<h3>$value</h3>\r\n"; 
             $workTitle = $value;
    case "client": $worksOutput .= "<b>$value</b>\r\n";
    case "dsc": $worksOutput .= "<b>$value</b>\r\n";
    case "category": $workCat = $value;
    case "poster": $worksOutput .= "<img src=\"$value\" data-category=\"$workCat\" alt=\"$workTitle\" />\r\n";
    }
    // echo $key." -- ".$value."<br />\r\n";
}
echo $worksOutput;
// print "There are total ". count($work) ." works in protfolio.";


?>

