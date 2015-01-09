<html>
<?php
session_start();
include_once("./login/f/fbcon.php");//fb login code


?>
<div id="info-page" title="More Info">
      
      <?php echo $user."<BR>"; if($user){ ?>
      <div align="left">
      <h3><a class="namediv">[Name]</a> is <a class="sellwant">[selling/looking for]</a>:</h3>
      <fieldset class="condiv">[Listing]</fieldset>
      
      </div>
      Tags: <a class="tagsdiv">[Tags]</a> <br /><br /><br />
      <small align="center">You can contact <a class="namediv">[Name]</a> through facebook <a class="linkdiv" href="#" target="_blank">here</a>.</small>
      <br>
      <div id="show"></div>
      <div id="show_data"></div>
      <?php }else{ ?>
      <br />
      Please Login with Facebook to See More Info.
      <br /><br /><a href="<?php echo $loginUrl; ?>"><img src='imgs/facebook-login-button.png' border='0' alt='facebook'></a>
      <br />
      <?php } ?>
</div>
</html>