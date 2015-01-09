<?php
	//Enter your IDs
	define("Access_Key_ID", "AKIAJLZCZFLIF5EMYRGQ");
	define("Associate_tag", "advwebdes03-20");
	
	//Set up the operation in the request
	function ItemSearch($SearchIndex, $Keywords){
	
	//Set the values for some of the parameters
	$Operation = "ItemSearch";
	$Version = "2013-08-01";
	$ResponseGroup = "ItemAttributes,Offers";
	$Keywords = $_POST['search2'];
	//User interface provides values
	//for $SearchIndex and $Keywords
	
	//Define the request
	$request=
	     "http://webservices.amazon.com/onca/xml"
	   . "?Service=AWSECommerceService"
	   . "&AssociateTag=" . Associate_tag
	   . "&AWSAccessKeyId=" . Access_Key_ID
	   . "&Operation=" . $Operation
	   . "&Version=" . $Version
	   . "&SearchIndex=" . $SearchIndex
	   . "&Keywords=" . $Keywords
	   . "&Signature=" . zfh7KwKEj43XZXwIh%2B2Ta1UzhKE9vKz0SG6hSKWv4Uc%3D
	   . "&ResponseGroup=" . $ResponseGroup;
	
	//Catch the response in the $response object
	$response = file_get_contents($request);
	$parsed_xml = simplexml_load_string($response);
	printSearchResults($parsed_xml, $SearchIndex);
	}
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
        <li><a href="books.php">Books</a></li>
        <li><a href="amazon.html">Search Amazon</a></li>
        <li><a href="ebay.html">Search eBay</a></li>
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
			
		<h2>Search Books</h2>
				<form id="getposts_form" role="form" name="myForm" action="" method="post">
			    <div class="form-group">
			    <div class="col-md-9">		
			    <input type="text" class="form-control"  id="search2" name="search2" placeholder="(Enter search terms to search Books)">
			    </div>
			    <div class="col-md-3">
			    <a class="btn btn-primary" role="button" type="submit" name="submit">Search!</a>
			    </div>
			    </div>
				</form>
	
			</div>
				
			<div class="row">
	
			<h1>Amazon Search Results for <?php echo ; ?></h1>
	                    <div id="errors"></div>
	                    <ul id="results" class="list-group">
	       <table width="95%" cellspacing="0" class="table" cellpadding="3">
		<tr>
		  <td>
		    <?php echo ;?>
		  </td>
		</tr>
		</table>
	                    </ul>
			</div>
			


		






      <hr class="featurette-divider">


      <footer> <!-- Begining of Footer -->
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Books R Us, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
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
