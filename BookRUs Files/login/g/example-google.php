<?php
session_start();
# Logging in with Google accounts requires setting special identity, so this example shows how to do it.
require 'openid.php';
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('campusedbooks.com');
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->required = array('namePerson/first', 'namePerson/last', 'contact/email');
			$openid->identity = 'https://www.google.com/accounts/o8/id';
			header('Location: ' . $openid->authUrl());
        }
?>
<form action="?login" method="post">
    <button>Login with Google</button>
</form>
<?php
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
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

			echo "Openid:".$openid_identity." <br>";
			echo "Email : ".$email." <br>";
			echo "namePerson : ".$namePerson." ".$last." <br>";

		} else {
			echo "The user has not logged in";
		}

        //echo 'User ' . ($openid->validate() ? $openid->identity . ' has ' : 'has not ') . 'logged in.';
		//echo "<br>id:"+$openid->identity;
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
echo "Saved data<br>";
echo $_SESSION['email']."<br>".$_SESSION['name/first']."<br>".$_SESSION['name/last'];



?>