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
      <a class="navbar-brand" href="#">Scarlet Gifts</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stores <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		    <li><a href="#">Bravo</a></li>
			<li><a href="#">Brother Jimmys</a></li>
            <li><a href="#">Chipotle</a></li>
			<li><a href="#">Qdoba</a></li>
			<li><a href="#">Starbucks</a></li>
            <li><a href="#">Shoprite</a></li>
			<li><a href="#">Stuff Yer Face</a></li>
            <li><a href="#">Target</a></li>
            <li><a href="#">Walmart</a></li>
            <li><a href="#">Wine Country</a></li>	
          </ul>
        </li>
       <li><a href="login.html">Login</a></li>
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


    <!-- Carousel
    ================================================== -->
<div class="container">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  
    <div class="item active">
      <img src="http://studentweb.comminfo.rutgers.edu/class-2014-9-04-547-410-01/group3/images/StuffYerFace.jpg" alt="..." height = "100%" width = "100%">
      <div class="carousel-caption">
        Something
      </div>
    </div>
    
    <div class="item">
      <img src="http://studentweb.comminfo.rutgers.edu/class-2014-9-04-547-410-01/group3/images/RutgersStarbucks.jpg" alt="..." height = "100%" width = "100%">
      <div class="carousel-caption">
        What
      </div>
    </div>
    
      <div class="item">
      <img src="http://studentweb.comminfo.rutgers.edu/class-2014-9-04-547-410-01/group3/images/shoprite1.jpg" alt="..." height = "100%" width = "100%">
      <div class="carousel-caption">
        What
      </div>
    </div>
	 <div class="item">
      <img src="http://studentweb.comminfo.rutgers.edu/class-2014-9-04-547-410-01/group3/images/brother_jimmys.jpg" alt="..." height = "100%" width = "100%">
      <div class="carousel-caption">
        What
      </div>
    </div>
    
    Vendors
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
</div> <!-- End of Carousel -->

 <hr class="featurette-divider"> <!-- Second Section-->

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">About Us <br>
          <span class="text-muted red">Scarlet Gifts</span></h2>
          <p class="lead">Scarlet Gifts is an organization dedicated to providing the Rutgers Community with the opportunity to utilize their affiliate privileges to purchase Gift Certificates at a discount for their favorite stores. We seek to establish a connection between Students, Faculty, Staff and the stores they frequent. We partner with the select stores and pass the savings onto the Rutgers Community.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="ScarletGifts (2).jpg" alt="Generic placeholder image">
        </div>
      </div> <!-- End of Second Section-->
 
 <hr class="featurette-divider"><!-- Third Section-->

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="stores_logos.jpg" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Who Are Our Partners?<br>
           <span class="text-muted red">Main Vendors</span></h2>
          <p class="lead">We partner with stores predominantly located in the New Brunswick area, more specifically in and around the 4 campuses. Our partners are Bravo, Brother Jimmys, Chipotle, Dunkin' Donuts‎, Qdoba, Starbucks, Shoprite, Stuff Yer Face, Target, Walmart and Wine Country. Our offer may not be eligible to these same stores outside of a 5 mile radius of the college campuses.</p>
        </div>
      </div><!-- End of the Third Section-->


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