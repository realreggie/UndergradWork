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
        <li><a href="google.html">Search Google</a></li>
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


    <!-- Carousel
    ================================================== -->
<div class="container">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>

  </ol>

  <!-- Wrapper for slides -->
   <div class="carousel-inner">
   
      <div class="item active">
      <img src="intelligent-books.jpg" height="100%" width="100%">
      <div class="carousel-caption">
        Fact: In ancient Egypt, any books found in ships coming nto port, would be brought immediately to the library of Alexandria and be copied. The original would be kept in the library and the copy given back to the owner!
      </div>
    </div>
  
    <div class="item">
      <img src="img/magic-book.png">
      <div class="carousel-caption">
      </div>
    </div>
    
    <div class="item">
      <img src="pile_books.jpg">
      <div class="carousel-caption">
        
      </div>
    </div>
    
     <div class="item">
      <img src="Books-heart.jpg" height="100%" width="100%">
      <div class="carousel-caption">
      
      </div>
    </div>
    
    <div class="item">
      <img src="img/wine-books-wine-folly.jpg">
      <div class="carousel-caption">
      
      </div>
    </div>
    

    
    
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
          <span class="text-muted red">Books R Us</span></h2>
          <p class="lead">Books R Us is a site designed for the reader by the reader. Founded in 2014, our site is dedicated to helping readers satisfy their longing for books. Whatever book a reader is interested in they can search our database to find, review and buy! If we do not carry the book we will not stop until the reader receives it. And all of our purchases are backed by buyer protection with Paypal so the readers know we mean BUSINESS. 

</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="book-logo.png" height="100%" width="100%" alt="Generic placeholder image">
        </div>
      </div> <!-- End of Second Section-->
 
 <hr class="featurette-divider"><!-- Third Section-->

      <div class="row featurette">
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="img/book-stack.jpg" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">About Our Patners<br>
           <span class="text-muted red">
           <img src="http://www.elfis.net/blog/wp-content/uploads/amazon_logo_small.jpg">
           <img src="http://realmoneynoscams.com/wp-content/uploads/2014/11/ebay-logo.jpg">
           <img src="http://www.whichbettingsite.com/wp-content/uploads/2013/05/paypal-logo-small.png"></span></h2>
          <p class="lead">Amazon.com, Inc. is an American electronic commerce company with headquarters in Seattle, Washington. It is the largest Internet-based company in the United States. Amazon.com started as an online bookstore, but soon diversified, selling DVDs, VHSs, CDs, video and MP3 downloads/streaming, software, video games, electronics, apparel, furniture, food, toys, and jewelry. The company also produces consumer electronics—notably, Amazon Kindle e-book readers, Fire tablets, Fire TV and Fire Phone — and is a major provider of cloud computing services. Amazon has separate retail websites for United States, United Kingdom & Ireland, France, Canada, Germany, The Netherlands, Italy, Spain, Australia, Brazil, Japan, China, India and Mexico. Amazon also offers international shipping to certain other countries for some of its products. In 2011, it had professed an intention to launch its websites in Poland, and Sweden.<br><br/>

eBay Inc. is an American multinational corporation and e-commerce company, providing consumer-to-consumer & business-to-consumer sales services via Internet. It is headquartered in San Jose, California, United States. eBay was founded by Pierre Omidyar in 1995, and became a notable success story of the dot-com bubble; it is a multi-billion dollar business with operations localized in over thirty countries.
The company manages eBay.com, an online auction and shopping website in which people and businesses buy and sell a broad variety of goods and services worldwide. In addition to its auction-style sales, the website has since expanded to include "Buy It Now" shopping; shopping by UPC, ISBN, or other kind of SKU (via Half.com); online classified advertisements (via Kijiji or eBay Classifieds); online event ticket trading (via StubHub); online money transfers (via PayPal)[7] and other services.<br><br/>

PayPal is an American, international digital wallet based e-commerce business allowing payments and money transfers to be made through the Internet. Online money transfers serve as electronic alternatives to paying with traditional paper methods, such as checks and money orders. PayPal is one of the world's largest internet payment companies. The company operates as an acquirer, performing payment processing for online vendors, auction sites and other commercial users, for which it charges a fee.
Established in 1998, PayPal (NASDAQ: PYPL) had its IPO in 2002, and became a wholly owned subsidiary of eBay later that year. In 2013, PayPal moved $180 billion in 26 currencies across 193 nations, generating a total revenue of $6.6 billion (41% of eBay’s total profits). In 2014, eBay announced plans to spin-off PayPal into an independent company the following year.


</p>
        </div>
      </div><!-- End of the Third Section-->


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