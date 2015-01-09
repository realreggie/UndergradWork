<?php 
// $page_title = 'Random Restaurant Picker - Place of Advice';
// include_once('include/header.html.php'); 
?>

<div class="restaurantcontainer">

<form action="randomrestaurant.php" method="post" id="randomrestaurant">
	<fieldset>
		<legend>Random Restaurant Picker:</legend>
		<p>
			<label>
				Food Type or Name (Optional): 
				<input type="text" id="foodparam" name="foodparam"
					<?php 
					if (isset($_POST['foodparam'])) {
						echo ' value="'.$_POST['foodparam'].'"';
					}
					?>
				>
			</label>
		</p>
		<p>
			<label>
				Location: 
				<input type="text" id="locationparam" name="locationparam"
					<?php 
					if (isset($_POST['locationparam'])) {
						echo ' value="'.$_POST['locationparam'].'"';
					}
					?>
				>
			</label>
		</p>
		<p>
			<label>
				Distance (Miles): 
				<input type="range" id="distanceparam" name="distanceparam" min="1" max="10" step="1"
					<?php 
					if (isset($_POST['distanceparam'])) {
						echo ' value="'.$_POST['distanceparam'].'"';
					} else {
						echo ' value="5"';
					}
					?>
				 oninput="distanceamt.value=distanceparam.value">
				 <output name="distanceamt" for="distanceparam">
				 	<?php
				 	if (isset($_POST['distanceparam'])) {
						echo $_POST['distanceparam'];
					} else {
						echo 5;
					}
				 	?>
				 </output>
			</label>
		</p>
		<p>
			<input type="submit" id="submitbutton" value="Pick a restaurant!">
		</p>
	</fieldset>
</form>

<?php

function processParam($string) {
	//Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "+", $string);
    return $string;
}


if ($_SERVER['REQUEST_METHOD']=='POST') {
	//Process user inputs into search parameters for Yelp API
	$distance_terms = $_POST['distanceparam'] * 1600;
	if (isset($_POST['foodparam']) && isset($_POST['locationparam'])) {
		$food_terms = processParam($_POST['foodparam']);
		$location_terms = processParam($_POST['locationparam']);
		$unsigned_url = "http://api.yelp.com/v2/search?category_filter=food,restaurants&term=$food_terms&location=$location_terms&radius_filter=$distance_terms";
	} elseif (isset($_POST['foodparam']) && !isset($_POST['locationparam'])) {
		$food_terms = processParam($_POST['foodparam']);
		$unsigned_url = "http://api.yelp.com/v2/search?category_filter=food,restaurants&term=$food_terms&radius_filter=$distance_terms";
	} elseif (!isset($_POST['foodparam']) && isset($_POST['locationparam'])) {
		$location_terms = processParam($_POST['locationparam']);
		$unsigned_url = "http://api.yelp.com/v2/search?category_filter=food,restaurants&location=$location_terms&radius_filter=$distance_terms";
	} elseif (!isset($_POST['foodparam']) && !isset($_POST['locationparam'])) {
		echo 'Please specify a location or food/restaurant name or type. '; //Doesnt work for some reason. Needed to create the error text check later...
	}

	if (isset($unsigned_url)) {
		// Enter the path that the oauth library is in relation to the php file
		require_once ('OAuth.php');

		// For example, request business with id 'the-waterboy-sacramento'
		//$unsigned_url = "http://api.yelp.com/v2/business/the-waterboy-sacramento";

		// For examaple, search for 'tacos' in 'sf'
		// $unsigned_url = "http://api.yelp.com/v2/search?category_filter=food,restaurants&term=cluck+chicken&location=07079&limit=1";


		// Set your keys here (get from Yelp API site)
		$consumer_key = "lP26EoTJS0YgeTx2HL6zww";
		$consumer_secret = "6fS5C8_9AyxZoal7Om2Tni9RO3U";
		$token = "_ZZIWUgbmQ5TMYJtz_bs-u5Htb9jzVT0L";
		$token_secret = "KzwvEykq5T000rP_xw-eMhPS8nML";

		// Token object built using the OAuth library
		$token = new OAuthToken($token, $token_secret);

		// Consumer object built using the OAuth library
		$consumer = new OAuthConsumer($consumer_key, $consumer_secret);

		// Yelp uses HMAC SHA1 encoding
		$signature_method = new OAuthSignatureMethod_HMAC_SHA1();

		// Build OAuth Request using the OAuth PHP library. Uses the consumer and token object created above.
		$oauthrequest = OAuthRequest::from_consumer_and_token($consumer, $token, 'GET', $unsigned_url);

		// Sign the request
		$oauthrequest->sign_request($signature_method, $consumer, $token);

		// Get the signed URL
		$signed_url = $oauthrequest->to_url();

		// Send Yelp API Call
		$ch = curl_init($signed_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch); // Yelp response
		curl_close($ch);

		// Handle Yelp response data
		$response = json_decode($data);

		//Choose a random restaurant from top 10 (or less depending on search results) best matches
		if (isset($response->error->text)) {
			echo "The search returned an error. Please make sure the spelling and/or zipcode is correct.";
		} else {
			$number_found = $response->total;

			if ($number_found == 0) {
				echo "We could not find any restaurants matching your preference. Try something else!";
			} elseif ($number_found < 10) {
				$random_number = rand(0,$number_found-1);
				$chosen = $response->businesses[$random_number];
			} else {
				$random_number = rand(0,9);
				$chosen = $response->businesses[$random_number];
			}

			//Store restaurant information
			$name = $chosen->name;
			$phone = $chosen->display_phone;
			$address_one = $chosen->location->display_address[0];
			$address_two = $chosen->location->display_address[1];
			$rating = $chosen->rating;
			if (isset($chosen->image_url)) {
				$image = $chosen->image_url;
			}
		}
	}
}

?>
<p>Restaurant Name: 
	<?php
	if (isset($name)) {
		echo $name;
	}
	?>
</p>

<p>Phone Number:
	<?php
	if (isset($phone)) {
		echo $phone;
	}
	?>
</p>

<p>Address Line One:
	<?php
	if (isset($address_one)) {
		echo $address_one;
	}
	?>
</p>

<p>Address Line Two:
	<?php
	if (isset($address_two)) {
		echo $address_two;
	}
	?>
</p>

<p>Rating:
	<?php
	if (isset($rating)) {
		echo number_format($rating,1).'/5.0';
	}
	?>
</p>

<p>Picture:
	<?php 
	if (isset($image)) {
		echo '<img src="'.$image.'" alt="Restaurant image." />';
	}
	?>
</p>

</div> <!--restaurantcontainer div-->

<?php //include_once('include/footer.html.php') ?>