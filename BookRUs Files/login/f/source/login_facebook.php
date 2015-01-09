<?php
include_once(".../includes/rusc0n.php");
session_start();

if(!empty($_SESSION) && $_SESSION['loginType'] == "fb" ){
	header("Location: http://www.ruselling.org/");//change
}


//mysql_connect('localhost', 'root', '');
//mysql_select_db('desec');

# We require the library
require("facebook.php");

# Creating the facebook object
$facebook = new Facebook(array(
	'appId'  => '454615907894268',
	'secret' => '6bcd2ecc3cdb77ade00ca55eea58d946',
	'cookie' => true
));

if(!empty($_SESSION) && $_SESSION['loginType'] == "none" ){
	$login_url = $facebook->getLoginUrl(array(
			'req_perms' => 'email,user_birthday,status_update,publish_stream'
		));
}
# Let's see if we have an active session
$session = $facebook->getSession();

if(!empty($session)) {
	# Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
	try{
		$uid = $facebook->getUser();
		$user = $facebook->api('/me');
	} catch (Exception $e){}
	
	if(!empty($user)){
		# We have an active session, let's check if we have already registered the user
		//$query = mysql_query("SELECT * FROM users WHERE oauth_provider = 'facebook' AND oauth_uid = ". $user['id']);
		//$result = mysql_fetch_array($query);
		
		# If not, let's add it to the database
		if(empty($result)){
			//$query = mysql_query("INSERT INTO users (oauth_provider, oauth_uid, username) VALUES ('facebook', {$user['id']}, '{$user['name']}')");
			//$query = msyql_query("SELECT * FROM users WHERE id = " . mysql_insert_id());
			//$result = mysql_fetch_array($query);
		}
		// this sets variables in the session 
		$_SESSION['fbid'] = $user['id'];//$result['id'];
		$_SESSION['oauth_uid'] = $user['id'];//$result['oauth_uid'];
		$_SESSION['oauth_provider'] = "facebook";//$result['oauth_provider'];
		$_SESSION['username'] = $user['name'];//$result['username'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['loginType'] = "fb";
		
		//save to database
		
		//look for email
		$email_query = mysql_query("SELECT * FROM `rus_users` WHERE `logType`='fb' AND `ContactEmail` = '".$_SESSION['email']."'");
		$email_rows = mysql_num_rows($email_query);
		
		if($email_rows==1){
			//email found
			$email_id_query = mysql_fetch_assoc($email_query);
			$update_user_query = mysql_query("UPDATE `campused_cbdbma1n`.`rus_users` SET `name` = '".$_SESSION['username']."',
				`ContactEmail` = '".$_SESSION['email']."' WHERE `rus_users`.`uid` =".$email_id_query['uid']) or die();
			$_SESSION['uid'] = $email_id_query['uid'];
		}else{
			//email not found
			$add_user_query = mysql_query("INSERT INTO `campused_cbdbma1n`.`rus_users` (
				`uid`, `name`, `logType`, `fbid`, `rating`, `oauth_uid`, `oauth_token`, `oauth_secret`, `oauth_provider`, 
				`ContactEmail`, `RUEmail`, `pw`, `Clubs`, `RequestTid`, `4SaleTid`, `Courses`) 
				VALUES ('', '".$_SESSION['username']."', 'fb', '".$_SESSION['fbid']."', '', '', '', '', '', '".$_SESSION['email']."', '', '', '', '', '', '')") or die();
			$uid_query_data = mysql_fetch_assoc( mysql_query("SELECT `uid` FROM `rus_users` WHERE `fbid` = '".$_SESSION['fbid']."'") );
			$_SESSION['uid'] = $uid_query_data['uid'];
		}
		
		
		//echo $_SESSION['id']."<br>".$_SESSION['oauth_uid']."<br>".$_SESSION['oauth_provider']."<br>".$_SESSION['username'];
	} else {
		# For testing purposes, if there was an error, let's kill the script
		//die("There was an error.");
	}
} else {
	# There's no active session, let's generate one
	$login_url = $facebook->getLoginUrl(array(
			'req_perms' => 'email,user_birthday,status_update,publish_stream'
		));
	//header("Location: ".$login_url);
}
	
?>