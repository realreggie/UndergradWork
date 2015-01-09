<?php
//  This free software is licensed under the terms of the
//  GNU public license. A copy should be accompanying this script.
//  Copyleft 2001 Mike Lynn <mike@mlynn.com>
//  This work is merely an enhanced translation of the original work by paypal@superfreaker.com.
//  I added some paging logic and converted the whole thing to php / mysql.
//  Questions to mike@mlynn.com

include("../includes/database.php");
include("../includes/config.php");

define (INITIAL_PAGE,0);
define (UPDATE_ENTRY,1);
define (DELETE_ENTRY,2);
define (ADD_ENTRY,3);

if (empty ($action))
        $action = INITIAL_PAGE;

$title="PHPayPal Product Administration";
?>
<html><body bgcolor="#FFFFFF" text="#000000">
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#EEEEEE">
  <tr bgcolor=ffffff>
    <td colspan=2><img src=../images/logo.gif></td></tr>
    <td width="50?">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
  <tr>
    <td width="50?"><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Products</b></font></td>
    <td>
      <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#336699">Click
        on an item for Details</font></div>
    </td>
  </tr>
  <tr>
    <td colspan=3 align=center>
        <a href="<? echo "detail.php?action=3"?>"><font size=1 face="Verdana, Arial, Helvetica, sans-serif" color='#336699'>[ Add Items ]</a></td>
  </tr>
</table>
<?
switch($action)
{
case DELETE_ENTRY:
        delete_entry($id,$confirmed);
        break;
case UPDATE_ENTRY:
	if ($id) {
	    
		$query = "UPDATE products ";
		$query .= "SET ";
	$query.="id=\"$id\",item_name=\"$item_name\",item_category=\"$item_category\",item_desc=\"$item_desc\",item_price=\"$item_price\",logo_location=\"$logo_location\",image_small=\"$image_small\",image_large=\"$image_large\",page_success=\"$page_success\",page_cancel=\"$page_cancel\",status=\"$status\"";
	$query .= " WHERE id = \"$id\"";
	if (mysql_query ($query) && mysql_affected_rows () > 0)
		print ("Entry $id updated successfully.\n");
	else
		print ("Entry not updated.\n");
	}// else {
	//	add_new($id,$item_name,$item_category,$item_desc,$item_price,$logo_location,$image_small,$image_large,$page_success,$page_cancel,$status) ;
//	}
	break;
case ADD_ENTRY;
	if ($item_name) {
		$id = add_new($id,$item_name,$item_category,$item_desc,$item_price,$logo_location,$image_small,$image_large,$page_success,$page_cancel,$status) ;
	}
        break;
default:
        break;
}


$dbResult = mysql_query("select * from products where id='$id'", $dblink);
$row=mysql_fetch_object($dbResult);
?>
<div> 
  <div align="center">
    <form action="<? echo "$PHP_SELF"?>" ENCTYPE=multipart/form-data>
    <table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td> 
          <div> 
<? if ($row->image_large) { ?>
            <div align="center"><img src="../images/<?echo "$row->image_large"?>"> 
            </div>
<?}?>
          </div>
          <br>
          <table border=0>
          <tr valign=top>
                <td nowrap>
                        <font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Item ID: </b></font>
                </td>
                <td>
                        <font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b><? echo "$row->id" ?></b></font>
                </td>
          </tr>

	  <tr valign=top>
		<td nowrap>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Item Name: </b></font>
		</td>
		<td>
			<input name=item_name type=text size=35 value="<?echo "$row->item_name"?>">
		</td>
	  </tr>
          <TR valign=top>
		<td nowrap>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="2">
			<b>Item Description:</b></font>
		</td>
		<td>
			<textarea name=item_desc cols=55 rows=4><?echo "$row->item_desc"?></textarea>
		</td>
	  </tr>
	  <tr valign=top>
		<td nowrap>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="2">
			<b>Item Price:</b>
			</font>
		</td>
		<td>
			<input name=item_price value="<? echo "$row->item_price" ?>" type=text size=10>
		</td>
	  </tr>
	  <tr valign=top>
		<td nowrap>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="2">
			<b>Logo Location:</b>
			</font>
	  	</td>
		<td>
			<input name="logo_location" value="<?echo "$row->logo_location"?>" size=50>
		</td>
	  </tr>
	  <tr valign=top>
		<td nowrap>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="2">
			<b>Image (Thumbnail):</b>
			</font>
		</td>
		<td>
			<input name="image_small" value="<?echo "$row->image_small"?>" size=20>
		<!--next release	<input type=file style='font-size:8pt'  name=file_small>-->
		</td>
	  </tr>
	  <tr valign=top>
		<td nowrap>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Image (Large):</b></font>
		</td>
		<td>
			<input name="image_large" value="<?echo "$row->image_large"?>" size=20>
			<!--next release<input type=file style='font-size:8pt'  name=file_large>-->
		</td>
	  </tr>
	  <tr valign=top>
		<td nowrap>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Success Page (URL):</b></font>
		</td>
		<td>
			<input name="page_success" value="<?echo "$row->page_success"?>" size=50>
		</td>
	  </tr>
	  <tr valign=top>
		<td nowrap>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Cancel Page (URL):</b></font>
		</td>
		<td>
			<input name="page_cancel" value="<?echo "$row->page_cancel"?>" size=50>
		</td>
	  </tr>
	  <tr valign=top>
		<td nowrap>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="2"><b>Status:</b></font>
		</td>
		<td>
			<input name="status" value="<?echo "$row->status"?>" size=10>
		</td>
   	  </tr>
	  <tr valign=top>
		<td colspan=2>
			<font face="Verdana, Arial, Helvetica, sans-serif" size="1">
			<input type=hidden name=id value="<?echo "$row->id"?>">
			<? if ($row->id) { 
				$value=Update ;
				print "<input type=hidden name=action value=1>";
			} else {
				$value="Add";
				print "<input type=hidden name=action value=3>";
			}?>
			<input type=submit value="<?echo "$value"?>">
			<a href="<? echo "$PHP_SELF?action=2&id=$row->id"?>">Delete</a>
			</font>
		</td>
	  </tr>
	  </table>

        </td>
      </tr>
    </table>
    </form>
    <br>
  </div>
</div>
</body>
</html>
<?

function showcursettings()
{
}

function check_image($imfile)
{
 if(!file_exists($imfile)) return "not picture";
 $image=getimagesize($imfile);
 $im_width=$image[0];
 $im_height=$image[1];
 switch($image[2])
    {
    case 1:
        $im_type = ".gif";
        break;
    case 2:
        $im_type = ".jpg";
        break;
    case 3:
        $im_type = ".png";
        break;
    default:
        $im_type="not picture";
        break;
     }
 return $im_type;
}

function process_file($file_body,$file_name,$path)
{
  global $error;
  if(!file_exists($path))
    {
    }
  $im_type=check_image($file_body);
  if($im_type=="not picture")    {  $error="Wrong file type"; return 0; }
  if(!file_exists($path . $file_name))
        $ffilename=$file_name;
  else
    {
        $n="0";
        $pos = strrpos($file_name, ".");
        $tfilename = substr($file_name, 0, $pos);

        do
          {
            $ffilename= $tfilename."_".$n.$im_type;
            $n++;

          } while (file_exists($path . $ffilename));
    }

 if(!copy($file_body,$path . $ffilename))
   { $error="Error saving file $ffilename"; return 0; }
  else print "File uploaded....";
 return $ffilename;

}
function add_new($id,$item_name,$item_category,$item_desc,$item_price,$logo_location,$image_small,$image_large,$page_success,$page_cancel,$status) {
$q="INSERT INTO products (id,item_name,item_category,item_desc,item_price,logo_location,image_small,image_large,page_success,page_cancel,status) VALUES (\"$id\",\"$item_name\",\"$item_category\",\"$item_desc\",\"$item_price\",\"$logo_location\",\"$image_small\",\"$image_large\",\"$page_success\",\"$page_cancel\",\"$status\") ";
if(!mysql_query($q))
        die("Could not add Item");
return mysql_insert_id();

}

function delete_entry($id,$confirmed)
{
if ($confirmed == "yes") {
        $q = "DELETE FROM products where id=\"$id\"";
	if (!mysql_query($q)) {
		die("Cound not delete id $id\n");
	} else {
		print "$id Deleted from Products Table.";
		?>
		              <div align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="index.php"><font color="#336699">Back
			                  to products</font></a></font></div>
		<?
		exit;
	}
} else if ($confirmed == "no") {
    //Do nothing
}else{
        print "<TABLE ALIGN=CENTER><TR><TD>\n";
	print "<form action=\"$PHP_SELF\">";
	print "<input type=hidden name=\"id\" value=$id>";
	print "<input type=hidden name=action value=2>";
		   
	print "<font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\">";
        print "Are you sure you want to delete id $id?<br>\n";
                print "<TABLE><TR><TD>YES</TD><TD>NO</TD></TR>\n";
        print "<TR><TD><input type=radio name=confirmed value=yes></TD>\n";
        print "<TD><input type=radio name=confirmed value=no><input type=hidden name=DELETE value=1></TD></TR>";
        print "<TR><TD><input type=submit value=CONFIRM></td></tr></TABLE>\n";
        print "</TD></TR>\n";
	?>
	              <div align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="index.php"><font color="#336699">Back
		                  to products</font></a></font></div>
	<?
 	exit;
}
}
?>
          <div align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="index.php"><font color="#336699">Back 
            to products</font></a></font></div>
<?
exit;

?>
