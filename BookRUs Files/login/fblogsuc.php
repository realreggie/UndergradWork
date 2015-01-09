<?php
include_once("../includes/rusc0n.php");
session_start();
if( isset($_POST['fbid']) && isset($_POST['email']) ){
	// this sets variables in the session 
	$_SESSION['fbid'] = $_POST['uid'];//$result['id'];
	//$_SESSION['oauth_uid'] = $user['id'];//$result['oauth_uid'];
	//$_SESSION['oauth_provider'] = "facebook";//$result['oauth_provider'];
	$_SESSION['username'] = $_POST['name'];//$result['username'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['loginType'] = "fb";
	//save to database
	if( $_SESSION['fbid'] && strlen($_SESSION['email'])>4 ){
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
	}
		
}	
?>