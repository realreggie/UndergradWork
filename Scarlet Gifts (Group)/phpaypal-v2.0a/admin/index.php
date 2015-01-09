<?php
//  This free software is licensed under the terms of the
//  GNU public license. A copy should be accompanying this script.
//  Copyleft 2001 Mike Lynn <mike@mlynn.com>
//  This work is merely an enhanced translation of the original work by paypal@superfreaker.com. 
//  I added some paging logic and converted the whole thing to php / mysql.
//  Questions to mike@mlynn.com
//
//ChangeLog:
// mlynn 12-25-2001 Change Limit to products_per_page to make it easier to
// understand

include("../includes/database.php");

$query = "SELECT * FROM products"; 

$products_per_page=3;
$numresults=mysql_query($query);
$numrows=mysql_num_rows($numresults);
$business="mlynn@urs.net" ; #replace with YOUR paypal business email addr.

if (empty($offset) || ($offset < 0)) {
	$offset=0;
}


$dbResult = mysql_query("select * from products limit $offset,$products_per_page", $dblink);

?>
<html>
<head>
<title>PHP / PayPal Example</title>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#EEEEEE">
  <tr bgcolor=ffffff>
    <td colspan=2><img src=../images/logo.gif></td></tr>
    <td width="50?">
	<font face="Verdana, Arial, Helvetica, sans-serif" size="2">
  <tr> 
    <td width="50?"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Products (<?echo "$numrows"?>)</b></font></td>
    <td>
      <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#336699">Click 
        on an item for Details</font></div>
    </td>
  </tr>
  <tr>
    <td colspan=3 align=center>
	<a href="<? echo "detail.php?action=0"?>"><font size=1 face="Verdana, Arial, Helvetica, sans-serif" color='#336699'>[ Add Items ]</a></td>
  </tr>
</table>
<? 
while ($row=mysql_fetch_object($dbResult)) {
?>
<table width="500" border="1" cellspacing="0" cellpadding="0" bordercolor="#EEEEEE" align="center">
  <tr> 
    <td width="75"> 
      <div align="center"> 
        <table width="75" border="0" cellspacing="0" cellpadding="5" align="center">
          <tr> 
            <td> 
              <div align="center"><a href="detail.php?id=<? echo "$row->id"?>"><img src="../images/<? echo "$row->image_small"?>" border="0" width="50"></a></div>
            </td>
          </tr>
        </table>
      </div>
    </td>
    <td>&nbsp;<a href="detail.php?id=<? echo "$row->id" ?>"><font face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#000000"><? echo "$row->item_name" ?></font></b></font></a><br><font face="Verdana, Arial, Helvetica, sans-serif" size="1">&nbsp;<? echo "$row->item_desc" ?></font><a href="#" onClick="window.open('https://www.paypal.com/cart/add=1&business=<?echo "$business"?>&item_name=<? echo "$row->item_name"?>&item_number=<? echo "$row->item_id"?>&amount=<? echo "$row->item_price"?>&image_url=<? echo "$row->logo_location"?>&return=<? echo "$row->page_success"?>&cancel_return=<? echo "$row->page_cancel"?>','cartwin','width=600,height=400,scrollbars,resizable,status');"> 
      <br>
      </a><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="detail.php?id=<? echo "$row->id"?>"><font color="#336699">more...</font></a></font> 
    </td>
    <td width="50"> 
      <font face="Verdana, Arial, Helvetica, sans-serif"><b><font size="1">
      <a href='<? echo "detail.php?action=0&id=$row->id" ?>'>Edit</a>
      <a href='<? echo "detail.php?action=2&id=$row->id" ?>'>Delete</a>
      </font></b></font>
</td>
  </tr>
</table>
<br>
<a href="#" onClick="window.open('https://www.paypal.com/cart/add=1&business=<?echo "$business"?>&item_name=<? echo "$row->item_name"?>&item_number=<? echo "$row->item_id"?>&amount=<? echo "$row->item_price"?>&image_url=<? echo "$row->logo_location"?>&return=<? echo "$row->page_success"?>&cancel_return=<? echo "$row->page_cancel"?>','cartwin','width=600,height=400,scrollbars,resizable,status');"></a> 
<? 
} // while
print "<table width=500 align=center><tr><td colspan=2 align=center>\n";
print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\">";
$prevoffset=$offset-$products_per_page;
if ($prevoffset >= 0) {
	print "<a href=\"$PHP_SELF?offset=$prevoffset\">PREV</a> &nbsp; \n";
} else {
	print "PREV &nbsp; \n";
}

// calculate number of pages needing links
$pages=intval($numrows/$products_per_page);

// $pages now contains int of pages needed unless there is a remainder from division
if ($numrows%$products_per_page) {
    // has remainder so add one page
    $pages++;
}

for ($i=1;$i<=$pages;$i++) { // loop thru
    $newoffset=$products_per_page*($i-1);
    if($newoffset==$offset) {
	    print "<b>$i</b> &nbsp; \n";
    } else {
	    print "<a href=\"$PHP_SELF?offset=$newoffset\">$i</a> &nbsp; \n";
    }
}

// check to see if last page
if (!(($offset/$products_per_page)==$pages) && $pages!=1) {
    // not last page so give NEXT link
    $newoffset=$offset+$products_per_page;
    if ($newoffset < ($numrows+1)) {
	    print "<a href=\"$PHP_SELF?offset=$newoffset\">NEXT</a><p>\n";
    } else {
	    print "NEXT &nbsp;<p>\n";
    } 
	
} else {
	    print "NEXT &nbsp;<p>\n";
}
print "</td></tr><tr><td align=left>\n";
print "<A href=\"http://sourceforge.net/projects/phpaypal\"> <IMG src=\"http://sourceforge.net/sflogo.php?group_id=42702\" width=\"88\" height=\"31\" border=\"0\" alt=\"SourceForge Logo\"></A>\n";
print "</td><td align=right><a href=\"http://www.mlynn.com/phpaypal/\"><img src=../images/createdby.gif border=0></a></tr></table>\n";
?>
</body>
</html>
