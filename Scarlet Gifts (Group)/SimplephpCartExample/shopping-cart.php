<?php

session_start();

var_dump($_SESSION['cart']);//dumps the info in the session variable cart.

$whereIn = implode(',', $_SESSION['cart']);
/*Uses the structure 'glue', pieces, where the first part is what you will separate the contents with, and the second part is the data you will be imploding.
*/


$sql = "
	SELECT * FROM Products 
	WHERE id IN ($whereIn)
";  // You can use this to call the info from your DB that is assocaited with each product ID.

echo $sql; //Just so we can see the list of product IDs is working correctly.
?>
