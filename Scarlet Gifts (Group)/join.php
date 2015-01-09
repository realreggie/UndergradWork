<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Receipt Database| Dates</title>
<link href="style.css" rel="stylesheet">
</head>


<body>

<nav>
	<ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="merchant.php">Merchants</a></li>
		<li><a href="dates.html" id="here">Dates</a></li>
		<li><a href="expbycat.php">ExpByCat</a></li>
		<li><a href="merchexptype.php">MerchExpType</a></li>
		<li><a href="insertmerch.html">Insert</a></li>
		<li><a href="updatemerch.html">Update</a></li>
		<li><a href="deletemerch.html">Delete</a></li>
	</ul>
</nav>

<h1>Frankie Ng </h1>

<div id= header>
<h2>Receipt Database: <span>Transactions between Dates</span></a></h2>
</div>


<div id=article>
<div id=php>
<?php
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];

require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Unable to connect to MySQL: ".mysql_error());
mysql_select_db($db_database)  or die("Unable to select database: " . mysql_error());
$query = "SELECT MerchantName, TransactionDate, TransactionTime, Sum(Price) FROM Merchant JOIN Transaction on Merchant.MerchantID = Transaction.MerchantID JOIN OrderTable on Transaction.TransactionID = OrderTable.TransactionID JOIN Product on OrderTable.ProductID = Product.ProductID WHERE TransactionDate >= '$startdate' and TransactionDate <= '$enddate' Group By OrderTable.TransactionID Order By TransactionDate Desc, MerchantName";

$query2 = "SELECT Sum(Price) FROM Transaction JOIN OrderTable on Transaction.TransactionID = OrderTable.TransactionID JOIN Product on OrderTable.ProductID = Product.ProductID WHERE TransactionDate >= '$startdate' and TransactionDate <= '$enddate'";
$result = mysql_query($query);
if (!$result) die ("Database access failed: " . mysql_error());
$rows = mysql_num_rows($result);
$result2 = mysql_query($query2);
if (!$result2) die ("Database access failed: " . mysql_error());
$rows2 = mysql_num_rows($result2);

echo "<table style='width:400px'>
<tr>
	<th>Merchant Name</th>
	<th>Date</th>
	<th>Time</th>
	<th>Total</th>
</tr>";

for ($j = 0 ; $j < $rows ; ++$j){
	$row = mysql_fetch_row($result);
	
	echo '<tr>';
		echo '<td>' . $row[0] . '</td>';
		echo '<td>' . $row[1] . '</td>';
		echo '<td>' . $row[2] . '</td>';
		echo '<td>' . $row[3] . '</td>';
	echo '</tr>';
}
	
for ($j = 0 ; $j < $rows2 ; ++$j){
$row2 = mysql_fetch_row($result2);

	echo '<tr>';
		echo '<th id="total">Final Total: </th>';
		echo '<th id="total">&nbsp;</th>';
		echo '<th id="total">&nbsp;</th>';
		echo '<th id="total">' . $row2[0] . '</th>';
	echo '</tr>';
	echo '</table>';
}
?>


</div>
</div>


<footer>
	<p>Database Technologies</p>
	<p>Final Project</p>
</footer>

</body>
</html>