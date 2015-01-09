<?php

$hostname = 'studentweb.comminfo.rutgers.edu';
$mydatabase = 'class-2014-9-04-547-410-01_group3';
$myname = 're154';
$mypassword = 'wXk.LQdA7J:Y';

// Create connection
$con=mysqli_connect($hostname,$myname,$mypassword,$mydatabase);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php

	//For values in $_POST
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	
	// Database Query
	// $query1 = "INSERT INTO Customers (FirstName, LastName)
				//VALUES ('{$FirstName}', '{$LastName}')";
	$query2 = "INSERT INTO Login (Email, Password, idCustomers) 
				VALUES ('{$Email}', '{$Password}', 10)";
				
	//$result1 = mysqli_query($con, $query1);
	$result2 = mysqli_query($con, $query2);

	
	
	//if ($result1){
		//Success
		//redirect_to("somehting.php");
		//echo "Success";
	//}else {
		//die("Database query Failed." .mysqli_error($con));
	//}
	
	if ($result2){
		//Success
		//redirect_to("somehting.php");
		echo "Success";
	}else {
		die("Database query Failed." .mysqli_error($con));
	}
?>
<html lang="en">
	<head>
		<title>Processing</title>
	</head>
	<body>

	
	</body>
</html>

<?php
	// Close Connection
	mysql_close($con);
?>