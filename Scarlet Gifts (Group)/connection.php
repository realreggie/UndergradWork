<?php

 include 'credentials.php';

$ds = mysql_connect( $hostname, $myname, $mypassword);
$qs = mysql_select_db( $mydatabase);

if($qs == FALSE)
{
    echo 'Cannot connect to database' . mysql_error();
}else {
}



?>
