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

$query = "SELECT idbook, bookname, author, price, genre, bookimage FROM books WHERE bookname LIKE '% $search%' OR genre LIKE '% $search%' Order By bookname Desc, price Desc";


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

    <title>Books R Us</title>

    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- <script src="val.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="custom.css">

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
<!-- NAVBAR
================================================== -->
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
        <a class="navbar-brand" href="#">Books R Us</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index1.php">Home</a></li>
        <li><a href="index1.php">Books</a></li>
        <li><a href="index1.php">Search Amazon</a></li>
        <li><a href="index1.php">Search eBay</a></li>

      </ul>


      <form class="navbar-form navbar-left" role="search" name="allsearch" action="search.php" onsubmit="return validateForm(search)" method="post">
        <div class="form-group">
          <input type="text" name="search" autofocus maxlength="100" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
         </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<H2>Books R Us</h2>



			<div class="row">
		<?php for ($j = 0 ; $j < $rows ; ++$j) { 
				$row = mysql_fetch_row($result);
		?>
	<div class='col-xs-6 col-md-3' style='min-width:250px;min-height:200px;'>
	<a class="thumbnail" height='200' style='text-decoration:none;' href='reviews.php?id="<?php echo $row[0];?>"'>
      <img src="<?php echo $row[5];?>" alt="" class="img-rounded" height='100' width='250' style='text-decoration:none;'>
        <h3><?php echo $row[1]; ?></h3>
        <p><?php echo $row[2]; ?></p>
        <p><?php echo $row[4]; ?></p>
        <p><?php echo $row[3]; ?></p>

<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="reginald_essien@yahoo.com">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="item_name" value="<?php echo $row[1]; ?>">
<input type="hidden" name="amount" value="<?php echo $row[3]; ?>">
<input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
           </a>
		 </div>
		 <?php } // end of loop ?> 
		</div>


      <hr class="featurette-divider">

	<footer>
        <p>&copy; 2014 Books R Us, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      	</footer> 

   
   
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

