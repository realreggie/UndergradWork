
<?php
	session_start();
 include 'credentials.php';

$ds = mysql_connect( $hostname, $myname, $mypassword);
$qs = mysql_select_db( $mydatabase);

if($qs == FALSE)
{
    echo 'Cannot connect to database' . mysql_error();
}


$nm = $_POST["search"];

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

$search = $_POST['search'];

$query = "SELECT idProduct, ProductName, Price, Category, MerchantName, ProductImage, ProductDescription FROM Product JOIN Merchant on Product.idMerchant = Merchant.idMerchant WHERE ProductTag LIKE '% $search%' Order By ProductName Desc, Price Desc";

$result = mysql_query($query);
if (!$result) die ("Database access failed: " . mysql_error());
$rows = mysql_num_rows($result);


?>

<!DOCTYPE html>

<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Scarlet Gifts</title>

    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- <script src="val.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="custom.css">
	<script src="desc.js"></script>

		<script>                                           
	function validateForm ()                             /* Names function */
	{
	    var valid = true;                                /* Names variable valid and established default value of true. */
	    var msg="Incomplete form: \n";                   /* Names variable msg.  You can type anything in between the quotes.  \n means line break. */
	    if (allsearch.search.value == ""){               /* if statement where search value = nothing */
	        msg+="Please fill in a search term.\n";      /* Text to be added to msg when if statement is true */
	        valid = false;                               /* Changes valid to false when if statement is true */
	}
	    if (!valid) alert(msg);                   /* if statement that displays alert if valid is = to false */
	    return valid;                                  
	}
	</script>
	</head>
	
	<body>
		<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Scarlet Gifts</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
<li class="active"><a href="index1.php">Home</a></li>
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stores <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		    <li id="bravo" class="link"><a href="descriptions.php?id=2">Bravo</a></li>
			<li id="jimmy"><a href="descriptions.php?id=3" class="link">Brother Jimmys</a></li>
            <li id="chip"><a href="descriptions.php?id=5">Chipotle</a></li>
			<li id="qdoba"><a href="descriptions.php?id=6">Qdoba</a></li>
			<li id="star"><a href="descriptions.php?id=4">Starbucks</a></li>
            <li id="shop"><a href="descriptions.php?id=1">Shoprite</a></li>
			<li id="stuff"><a href="descriptions.php?id=7">Stuff Yer Face</a></li>
            <li id="target"><a href="descriptions.php?id=9">Target</a></li>
            <li id="walmart"><a href="descriptions.php?id=8">Walmart</a></li>
            <li id="wine"><a href="descriptions.php?id=10">Wine Country</a></li>
          </ul>
        </li>
       <li><a href="main_login.php">Login</a></li>
      <li><a href="createaccount.html">Create an Account</a></li>
      </ul>



      <form class="navbar-form navbar-left" role="search" name="allsearch" action="test.php" onsubmit="return validateForm(search)" method="post">
        <div class="form-group">
          <input type="text" name="search" autofocus maxlength="100" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
         </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav> <!-- End of Nav -->


		<div class="row">
		<?php for ($j = 0 ; $j < $rows ; ++$j) { 
				$row = mysql_fetch_row($result);
		?>
	<div class='col-xs-6 col-md-3' style='min-width:250px;min-height:200px;'>
	<a class="thumbnail" height='200' style='text-decoration:none;'>
      <img src="<?php echo $row[5];?>" alt="" class="img-rounded" height='100' width='250' style='text-decoration:none;'>
        <h3><?php echo $row[4]; ?></h3>
        <p><?php echo $row[2]; ?></p>
       <a href='add-to-cart.php?id="<?php echo $row[0];?>"'><button class='btn btn-sm btn-danger' style='font-size:1em; margin:.5em 0 .5em 0;'><span class='glyphicon glyphicon-shopping-cart '>Add to Cart</button></span></a> 
           </a>
		 </div>
		 <?php } // end of loop ?> 
		</div>
			
		

      <hr class="featurette-divider">


      <footer> <!-- Begining of Footer -->
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Scarlet Gifts, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
  </div> <!-- End of Container-->



   
   
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>