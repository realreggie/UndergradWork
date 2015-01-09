<?php
//  This free software is licensed under the terms of the
//  GNU public license. A copy should be accompanying this script.
//  Copyleft 2001 Mike Lynn <mike@mlynn.com>
//  This work is merely an enhanced translation of the original work by paypal@superfreaker.com.
//  I added some paging logic and converted the whole thing to php / mysql.
//  Questions to mike@mlynn.com

include("includes/database.php");
$business="mlynn@urs.net";

$dbResult = mysql_query("select * from products where id='$id'", $dblink);
$row=mysql_fetch_object($dbResult);
?>
<html>
<head>
<title>PHP / Paypal Example</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<div> 
  <div align="center">
    <table width="500" border="0" cellspacing="0" cellpadding="0" bgcolor="#EEEEEE">
      <tr> 
        <td width="50?"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Product 
          Details</b></font></td>
        <td>
          <div align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="index.php"><font color="#336699">Back 
            to products</font></a></font></div>
        </td>
      </tr>
    </table>
    <table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td> 
          <div> 
            <div align="center"><img src="images/<?echo "$row->image_large"?>"> 
            </div>
          </div>
          <br>
          <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
	  <b><?echo "$row->item_name"?></b> <b><font color="#336699"><? echo "$row->item_price"?></font></b><br>
          <?echo "$row->item_desc"?> <a href="#" onClick="window.open('https://www.paypal.com/cart/add=1&business=<?echo "$business"?>&item_name=<?echo "$row->item_name"?>&item_number=<?echo "$row->id"?>&amount=<?echo "$row->item_price"?>&image_url=<?echo "$row->logo_location"?>&return=<?echo "$row->page_success"?>&cancel_return=<?echo "$row->page_cancel"?>','cartwin','width=600,height=400,scrollbars,resizable,status');"></a></font><a href="#" onClick="window.open('https://www.paypal.com/cart/add=1&business=<?echo "$business"?>&item_name=<?echo "$row->item_name"?>&item_number=<?echo "$row->item_id"?>&amount=<?echo "$row->item_price"?>&image_url=<?echo "$row->logo_location"?>&return=<?echo "$row->page_success"?>&cancel_return=<?echo "$row->page_cancel"?>','cartwin','width=600,height=400,scrollbars,resizable,status');"><br>
          <br>
          <img src="images/b_addtocart.gif" border="0" width="87" height="23"></a><a href="#" onClick="window.open('https://www.paypal.com/cart/display=1&business=<?echo "$business"?>','cartwin','width=600,height=400,scrollbars,resizable,status');"><img src="images/b_viewcart.gif" border="0" width="74" height="21"></a> 
        </td>
      </tr>
    </table>
    <br>
  </div>
</div>
</body>
</html>
