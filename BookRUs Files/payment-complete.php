<?php include('header.php'); ?>
<style type="text/css">
#text-border
{
border: solid 1px #d21034;
padding: 10px;
-webkit-border-radius: 5px;
border-radius: 5px;
-moz-background-clip: padding; -webkit-background-clip: padding-box; background-clip: padding-box;
min-height: 100px;
}
</style>
<div role="main" id="page" class="no-page-background">
	<div id="invite-page" class="container">
		<div id="invite-header">
			<div class="sixteen columns">
				<h1>Thanks For Buying a Textbook!</h1>
				<h4>Share on Facebook and Twitter!</h4>
			</div>
			<div id="text-border" class="sixteen columns">
				
						<div>
							<table align="center" width="80%">
								<tr><td align="center" width="50%">
									<script src='http://connect.facebook.net/en_US/all.js'></script><div id='fb-root'></div>
									<a href="http://facebook.com" onclick='postToFeed(); return false;' target="_blank"><img src="images/fb_logo.png" alt="Facebook" height="150" width="150"></a>
								<p id='msg'></p>
								</td><td align="center">
									<a href="https://twitter.com/intent/tweet?button_hashtag=RUSelling&text=I%20just%20bought%20a%20textbook%20on%20RU%20Selling!%20Find%20the%20textbooks%20you%20need%20today!" data-lang="en"><img src="images/tw_logo.png" alt="Twitter" height="150" width="150"></a>
							</td></tr>
							</table>
						</div>
						<script> 
					      FB.init({appId: "132529643574153", status: true, cookie: true});

					      function postToFeed() {

					        // calling the API ...
					        var obj = {
					          method: 'feed',
					          redirect_uri: 'http://ruselling.org',
					          link: 'http://ruselling.org/search.php',
					          picture: 'http://ruselling.org/images/RUSelling-Final-width-200px.png',
					          name: 'I just bought a textbook on RU Selling!',
					          caption: 'RUSelling.org',
					          description: 'Search for the textbooks you need for your classes on RU Selling today!'
					        };

					        function callback(response) {
					          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
					        }

					        FB.ui(obj, callback);
					      }
					    
					    </script>
					    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					<p>You should receive a confirmation email along with a new message in your RU Selling Account!</p>	
			</div>
			
		</div>
		
	</div>
</div>
<div id="page-middle"></div>
<div id="page-bottom"></div>
<div id="page-backside"></div>

<?php include('footer.php'); ?>