<?php
 
include 'credentials.php';


  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
	$ds = mysql_connect( $hostname, $myname, $mypassword);
	$qs = mysql_select_db( $mydatabase);
	
	if($qs == FALSE)
	{
	    echo 'Cannot connect to database' . mysql_error();
	}


$bookname = $_POST ['name'];
$author = $_POST ['author'];
$price = $_POST ['price'];
$genre = $_POST ['genre'];



   
   $query ="INSERT INTO `books` (bookname, author, price, genre) Values ('{$bookname}', '{$author}', '{$price}', '{$genre}')";    
       
mysql_query ($query) or die ('Error Submitting Information' . mysql_error());

echo "Information Submited!"





?>