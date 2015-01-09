<?php
include_once("../includes/rusc0n.php");
session_start();
# Logging in with Google accounts requires setting special identity, so this example shows how to do it.
require 'openid.php';//included in header so no need here
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('campusedbooks.com');
    if(!$openid->mode) {
		if(isset($_GET['gl0g'])) {
			$openid->required = array('namePerson/first', 'namePerson/last', 'contact/email');
			$openid->identity = 'https://www.google.com/accounts/o8/id';
			//header('Location: ' . $openid->authUrl());
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$openid->authUrl().'">'; 
        }

    } elseif($openid->mode == 'cancel') {
        //echo 'User has canceled authentication!';
		header('Location: http://campusedbooks.com/rusite/index.php');
    } else {
		if($openid->validate()) {
			$openid_identity = $openid->identity;
			$_SESSION['userid'] = $openid->identity;
			$data = $openid->getAttributes();
			$_SESSION['email'] = $data['contact/email'];
			$email = $data['contact/email'];
			$_SESSION['name/first'] = $data['namePerson/first'];
			$namePerson = $data['namePerson/first'];
			$last = $data['namePerson/last'];
			$_SESSION['name/last'] = $data['namePerson/last'];
			$full_name = $_SESSION['name/first']." ".$_SESSION['name/last'];
			//echo "Openid:".$openid_identity." <br>";
			//echo "Email : ".$email." <br>";
			//echo "namePerson : ".$namePerson." ".$last." <br>";
			
			//save to database
			
			//look for email
			$email_query = mysql_query("SELECT * FROM `rus_users` WHERE `logType`='g' AND `ContactEmail` = '".$_SESSION['email']."'");
			$email_rows = mysql_num_rows($email_query);
			
			if($email_rows==1){
				//email found
				$email_id_query = mysql_fetch_assoc($email_query);
				$update_user_query = mysql_query("UPDATE `campused_cbdbma1n`.`rus_users` SET `name` = '".$full_name."',
					`ContactEmail` = '".$_SESSION['email']."' WHERE `rus_users`.`uid` =".$email_id_query['uid']) or die();
				
			}else{
				//email not found
				$add_user_query = mysql_query("INSERT INTO `campused_cbdbma1n`.`rus_users` (
					`uid`, `name`, `logType`, `gid`, `rating`, `oauth_uid`, `oauth_token`, `oauth_secret`, `oauth_provider`, 
					`ContactEmail`, `RUEmail`, `pw`, `Clubs`, `RequestTid`, `4SaleTid`, `Courses`) 
					VALUES ('', '".$full_name."', 'g', '".$_SESSION['userid']."', '', '', '', '', '', '".$_SESSION['email']."', '', '', '', '', '', '')") or die();
			
			}

		} else {
			//echo "The user has not logged in";
		}

        //echo 'User ' . ($openid->validate() ? $openid->identity . ' has ' : 'has not ') . 'logged in.';
		//echo "<br>id:"+$openid->identity;
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
//echo "Saved data<br>";
//echo $_SESSION['email']."<br>".$_SESSION['name/first']."<br>".$_SESSION['name/last'];



?>