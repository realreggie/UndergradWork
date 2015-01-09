<?php
# mlynn 12/23/2001
$dbhost="localhost";
$dbuser="<YOUR USER HERE>";
$dbpasswd="<YOUR PASSWORD HERE>";
$dbname="phpaypal";
global $PHP_SELF;

$dblink = mysql_pconnect("$dbhost","$dbuser","$dbpasswd");

mysql_select_db("$dbname",$dblink);
?>

