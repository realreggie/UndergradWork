<?php

session_start();//Starts the session on this page

if (empty($_SESSION['cart'])) {//checks to see if there is an existing session variable called cart before making a new one, so we don't overwrite the cart
$_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], $_GET['id']);//adds the "id" from the link on the products page to the array


?>

<p>
	Product was added to your cart.
	<a href="shopping-cart.php">View Cart</a>
</p>