<?php
require("twitteroauth.php");  
session_start();
echo "<h2>Hello <?=(!empty(".$_SESSION['username'].") ? '@' . ".$_SESSION['username']." : 'Guest'); ?></h2> ";
  


    if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){  
        
		echo "<br>logged in";
		// We've got everything we need  
		
		// TwitterOAuth instance, with two new parameters we got in twitter_login.php  
		$twitteroauth = new TwitterOAuth('aF1ZPIQs8GhYfqgRlzQ', 'lFOf5fnnRXHFz5ttbBf7m02UPGzcY6Tp5owvxoReoo', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);  
		// Let's request the access token  
		$access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']); 
		// Save it in a session var 
		$_SESSION['access_token'] = $access_token; 
		// Let's get the user's info 
		$user_info = $twitteroauth->get('account/verify_credentials'); 
		// Print user's info  
		print_r($user_info); 
		
		if(!empty($_SESSION['username'])){  
			// User is logged in, redirect  
			echo "{".$_SESSION['username']."}";
		}else{
			//register user
			mysql_connect('localhost', 'campused_dbadm1n1', 'G+e43i$@T^34iN$#($#GYHJ>34G?Yg3');  
			mysql_select_db('campused_cbdbma1n'); 
		
		    if(isset($user_info->error)){  
				// Something's wrong, go back to square 1  
				//header('Location: twitter_login.php'); 
			} else { 
				// Let's find the user by its ID  
				$query = mysql_query("SELECT * FROM users_rus WHERE oauth_provider = 'twitter' AND oauth_uid = ". $user_info->id);  
				$result = mysql_fetch_array($query);  
			  
				// If not, let's add it to the database  
				if(empty($result)){  
					$query = mysql_query("INSERT INTO users_rus (oauth_provider, oauth_uid, username, oauth_token, oauth_secret) VALUES ('twitter', {$user_info->id}, '{$user_info->screen_name}', '{$access_token['oauth_token']}', '{$access_token['oauth_token_secret']}')");  
					$query = mysql_query("SELECT * FROM users_rus WHERE id = " . mysql_insert_id());  
					$result = mysql_fetch_array($query);  
				} else {  
					// Update the tokens  
					$query = mysql_query("UPDATE users_rus SET oauth_token = '{$access_token['oauth_token']}', oauth_secret = '{$access_token['oauth_token_secret']}' WHERE oauth_provider = 'twitter' AND oauth_uid = {$user_info->id}");  
				}  
			  
				$_SESSION['id'] = $result['id']; 
				$_SESSION['username'] = $result['username']; 
				$_SESSION['oauth_uid'] = $result['oauth_uid']; 
				$_SESSION['oauth_provider'] = $result['oauth_provider']; 
				$_SESSION['oauth_token'] = $result['oauth_token']; 
				$_SESSION['oauth_secret'] = $result['oauth_secret']; 
			 
				header('Location: login.php');  
			} 
		}		
		
		 
		
		
    } else {
		echo "<br>not logged in";
        // Something's missing, go back to square 1  
        //header('Location: login.php');  
		
		// The TwitterOAuth instance  
		$twitteroauth = new TwitterOAuth('aF1ZPIQs8GhYfqgRlzQ', 'lFOf5fnnRXHFz5ttbBf7m02UPGzcY6Tp5owvxoReoo');  
		// Requesting authentication tokens, the parameter is the URL we will be redirected to  
		$request_token = $twitteroauth->getRequestToken('http://campusedbooks.com/rusite/login/t/twitteroauth.php');  
		  
		// Saving them into the session  
		$_SESSION['oauth_token'] = $request_token['oauth_token'];  
		$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];  
		  
		// If everything goes well..  
		if($twitteroauth->http_code==200){  
			// Let's generate the URL and redirect  
			$url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']); 
			header('Location: '. $url); 
		} else { 
			// It's a bad idea to kill the script, but we've got to know when there's an error.  
			die('Something wrong happened.');  
		}
		
    }  
?>