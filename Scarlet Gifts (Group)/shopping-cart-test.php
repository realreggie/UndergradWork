<?php

session_start();


$whereIn = implode(',', $_SESSION['cart']);
/*Uses the structure 'glue', pieces, where the first part is what you will separate the contents with, and the second part is the data you will be imploding.
*/


  //--------------------------------------------------------------------------
  //  php script for fetching data from mysql database
  //--------------------------------------------------------------------------
 include 'credentials.php';

  $tableName = "Product";

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //-------------------------------------------------------------------------- 
	$ds = mysql_connect( $hostname, $myname, $mypassword);
	$qs = mysql_select_db( $mydatabase);
	
	if($qs == FALSE)
	{
	    echo 'Cannot connect to database' . mysql_error();
	}

$currency = '$';
$quantity = $_GET['quantity'];
$total = $row[2] * $quantity;

$query = "SELECT * FROM Product WHERE idProduct IN ($whereIn)";  //You can use this to call the info from your DB that is assocaited with each product ID.


$result = mysql_query($query);          //query
$rows = mysql_num_rows($result);       //fetch result 

$query2 = "SELECT Sum(Price) FROM Product = WHERE idProduct IN ($whereIn)";


$result2 = mysql_query($query2);          //query
$rows2 = mysql_num_rows($result2);       //fetch result 

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
      <a class="navbar-brand" href="index1.php">Scarlet Gifts</a>
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



      <form class="navbar-form navbar-left" role="search" name="allsearch" action="search.php" onsubmit="return validateForm(search)" method="post">
        <div class="form-group">
          <input type="text" name="search" autofocus maxlength="100" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
         </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>


	<div class="row">

        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th></th>
                        <th>Price</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                		<?php for ($j = 0 ; $j < $rows ; ++$j) { 
				$row = mysql_fetch_row($result);
		?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo $row[4]; ?>" style="width: 110px; height: 90px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo $row[1] ?></a></h4>
                                <h5 class="media-heading"> by <a href="#"><?php echo $row[3] ?></a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="quantity" class="form-control" id="quantity" value="1">
                        </td>
                        <td></td>
                        <td class="col-sm-1 col-md-1"><strong><?php echo $currency,$row[2]; ?></strong></td> 


                    </tr>
                    		 <?php } // end of loop ?>
                    

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>
<?php						
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
						
						</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default"><a style="text-decoration: no" href="search.php">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </a></button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
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