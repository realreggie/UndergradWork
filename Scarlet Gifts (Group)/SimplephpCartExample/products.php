<div>
	<h3>Rocket Car</h3>
	<a href="add-to-cart.php?id=1">Add to Cart</a>
</div>
<div>
	<h3>Solid Gold House</h3>
	<a href="add-to-cart.php?id=2">Add to Cart</a>
</div>
<div>
	<h3>Millions of Dollars</h3>
	<a href="add-to-cart.php?id="<?php echo $row['idProduct']?>"">Add to Cart</a>
</div>

Just a simple product listing.  Note that each link for the product passes a different id to add-to-cart.php.  
Normally this would be pulled from your products table instead of manually entered.