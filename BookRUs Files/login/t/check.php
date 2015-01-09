<?php
session_start();
echo "checking if logged in...<br>info obtained:<br><br>";

echo $_SESSION['id']."<br>".$_SESSION['username']."<br>".$_SESSION['oauth_uid']."<br>".$_SESSION['oauth_provider']."<br>".$_SESSION['oauth_token']."<br>".$_SESSION['oauth_secret'];

?>