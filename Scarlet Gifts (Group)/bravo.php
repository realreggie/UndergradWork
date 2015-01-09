<html><body>
<?php
include 'credentials.php';

$ds = mysql_connect( $hostname, $myname, $mypassword);
$qs = mysql_select_db( $mydatabase);


if($qs == FALSE)

{

    echo 'Cannot connect to database' . mysql_error();

}

$query = "CALL AllSearch('$nm')";

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


$nm = $_POST["search"];



$query = "SELECT ProductName, Price, Category,
 MerchantName, ProductImage, ProductDescription 
 FROM Product JOIN Merchant on Product.idMerchant 
 = Merchant.idMerchant WHERE MerchantName LIKE '%Bravo%' Order By Price Desc";

$result = mysql_connect($connection, $query);

}
mysql_connect($connection);
?>
</body></html>