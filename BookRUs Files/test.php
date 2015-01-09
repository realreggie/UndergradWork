<?php
$AWSAccessKeyId = "#";
$AWSSecretKey = "#";
$TrackingID = "#";
$browseNodeID = "1000"; // HDTVs
 
// no changes needed below this line 
 
$Timestamp = gmdate("Y-m-d\TH:i:s\Z");
$Timestamp = str_replace(":", "%3A", $Timestamp);
$item = "";
$rank = 0;
 
$String = "Service=AWSECommerceService&".
  "AWSAccessKeyId=$AWSAccessKeyId&".
  "Operation=BrowseNodeLookup&".
  "SearchIndex=Books&".
  "Keywords=shades&".
  "ResponseGroup=BrowseNodes&".
  "Version=2013-08-01&".
  "Timestamp=$Timestamp&".
  "Version=2013-08-01";
   
$Prepend = "GET\nwebservices.amazon.com\n/onca/xml\n";
$PrependString = $Prepend . $String;
   
$Signature = base64_encode(hash_hmac("sha256", $PrependString, $AWSSecretKey, True));
$Signature = str_replace("+", "%2B", $Signature);
$Signature = str_replace("=", "%3D", $Signature);
 
$BaseUrl = "http://webservices.amazon.com/onca/xml?";
$SignedRequest = $BaseUrl . $String . "&Signature=" . $Signature;
 
if(!$xml = simplexml_load_file($SignedRequest))
{
   echo "Top Sellers not available.<br>";
}
else
{
  foreach ($xml->BrowseNodes->BrowseNode->BrowseNodeId->Name as $item)
  {
     $rank++;
     echo $rank.". <a href=\"http://www.amazon.com/exec/obidos/ASIN/".$item->Name;
     echo "/ref=nosim/".$TrackingID."\" rel=\"nofollow\">".$item->Name;
     echo "</a><br />";
  }
}
?>
