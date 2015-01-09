<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Receipt Database| Insert</title>
<link href="style.css" rel="stylesheet">
</head>


<body>

<nav>
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="merchant.php">Merchants</a></li>
<li><a href="dates.html">Dates</a></li>
<li><a href="expbycat.php">ExpByCat</a></li>
<li><a href="merchexptype.php">MerchExpType</a></li>
<li><a id="here" href="insertmerch.html">Insert</a></li>
<li><a href="updatemerch.html">Update</a></li>
<li><a href="deletemerch.html">Delete</a></li>
</ul>
</nav>

<h1>Frankie Ng </h1>

<div id= header>
<h2>Receipt Database: <span>Insert</span></a></h2>
</div>


<div id=article>
<div id=php>

<?php
$merchantid = $_POST['merchantid'];
$merchantname = $_POST['merchantname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];
$telephone = $_POST['telephone'];             

require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Unable to connect to MySQL: ".mysql_error());
mysql_select_db($db_database)  or die("Unable to select database: " . mysql_error());
$query = "INSERT INTO `Merchant` (`MerchantID`, `MerchantName`, `Address`, `City`, `State`, `ZipCode`, `Telephone`) VALUES ('$merchantid', '$merchantname', '$address', '$city', '$state', '$zipcode', '$telephone')";
$result = mysql_query($query);
if (!$result) die ("Database access failed: " . mysql_error());
$rows = mysql_num_rows($result);


	echo "<p>Inserted the following into the Merchant Table.</p>
		<table style='width:880px'>
		<tr>
			<th>MerchantID</th>
			<th>Merchant Name</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zipcode</th>
			<th>Telephone</th>
		</tr>";

	echo '<tr>';
			echo '<td>' . $merchantid . '</td>';
			echo '<td>' . $merchantname . '</td>';
			echo '<td>' . $address . '</td>';
			echo '<td>' . $city . '</td>';
			echo '<td>' . $state . '</td>';
			echo '<td>' . $zipcode . '</td>';
			echo '<td>' . $telephone . '</td>';
	echo '</tr>';

	echo '</table>';
?>


</div>
</div>


<footer>
	<p>Database Technologies</p>
	<p>Final Project</p>
</footer>

</body>
</html>