<?php

include_once("twitteroauth.php");  
session_start();


    // The TwitterOAuth instance  
    $twitteroauth = new TwitterOAuth('Mh1ngfYy70jrZxhvAECqw', 'bJn9TaeVOVorSfItygJy5cIz9LuvuOhXg7oDgBve44');  
    // Requesting authentication tokens, the parameter is the URL we will be redirected to  
    $request_token = $twitteroauth->getRequestToken('http://www.campusedbooks.com/rusite/login/t/twitteroauth.php'); //twitter callback link on account 
      
    // Saving them into the session  
    $_SESSION['oauth_token'] = $request_token['oauth_token'];  
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];  
	$_SESSION['testing'] = "working";
      
    // If everything goes well..  
    if($twitteroauth->http_code==200){  
        // Let's generate the URL and redirect  
        $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']); 
        header('Location: '. $url); 
    } else { 
        // It's a bad idea to kill the script, but we've got to know when there's an error.  
        die('Something wrong happened.');  
    }   
	
?>