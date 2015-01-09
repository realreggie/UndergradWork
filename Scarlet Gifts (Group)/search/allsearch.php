<?php

 include 'credentials.php';

$ds = mysql_connect( $hostname, $myname, $mypassword);
$qs = mysql_select_db( $mydatabase);

if($qs == FALSE)
{
    echo 'Cannot connect to database' . mysql_error();
}
else
{
    echo 'Connected to database<br><br>';
}

$nm = $_POST["search"];

$query = "Select * Customers";
$result = mysql_query($query);
if($result == false)
{
   user_error("Query failed: " . mysql_error() . "<br />\n$query");
}
elseif(mysql_num_rows($result) == 0)
{
   echo "<p>Sorry, no rows were returned by your query.</p>\n";
}
else
{
   while($query_row = mysql_fetch_assoc($result))
   {
      foreach($query_row as $key => $value)
      {
         echo "$key: $value<br />\n";
      }
      echo "<br />\n";
   }
}  

?>