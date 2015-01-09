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


$firstname = $_POST ['FirstName'];
$lastname = $_POST ['LastName'];
$email = $_POST ['Email'];
$Password = $_POST ['Password'];



   
   $query ="INSERT INTO `Login` (Email, Password) Values ('{$email}', '{$Password}')";    
       
mysql_query ($query) or die ('Error Submitting Information' . mysql_error());

$link = 'http://studentweb.comminfo.rutgers.edu/class-2014-9-04-547-410-01/group3/main_login.php';

echo "Your Account has been created! Sign in <a href='".$link."'>Here</a>
"





?>