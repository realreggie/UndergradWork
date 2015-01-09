<?php

  // Set your YELP keys here

  $consumer_key = "lP26EoTJS0YgeTx2HL6zww";
  $consumer_secret = "6fS5C8_9AyxZoal7Om2Tni9RO3U";
  $token = "_ZZIWUgbmQ5TMYJtz_bs-u5Htb9jzVT0L";
  $token_secret ="KzwvEykq5T000rP_xw-eMhPS8nML";
 
 
  require_once ('OAuth.php');
  header("Content-type: application/json\n\n");
  $params = $_SERVER['QUERY_STRING'];
  $unsigned_url = "http://api.yelp.com/v2/search?$params";
  $token = new OAuthToken($token, $token_secret);
  $consumer = new OAuthConsumer($consumer_key, $consumer_secret);
  $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
  $oauthrequest = OAuthRequest::from_consumer_and_token($consumer, $token, 'GET', $unsigned_url);
  $oauthrequest->sign_request($signature_method, $consumer, $token);
  $signed_url = $oauthrequest->to_url();
  $ch = curl_init($signed_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  print_r($data);

?>
