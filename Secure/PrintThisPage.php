<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Reserve/CreditCardInfo/PrintThisPage.php -->
<!--  http://www.balihitours.com/Reserve/CreditCardInfo/PrintThisPage.php -->
<html>

<head>
<meta name="resource-type" content="document" />
<meta name="description" content="Offering boat tours off the Kauai coast" />
<meta name="rating" content="General" />
<meta name="author" content="Deana R. Shelby" />
<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours: Reserve Seats/ Print your reservation</title>
</head>
<body bgcolor="#ffffff" lang=EN-US text="#000000" link="#007799" vlink="#00AA00">
<form name="frm" action="http://balihaitours.com/reserveseat.php"  target="_top" method="post">
<?php
include("php/routines.php");

// pick up variables
$LoginName = $_POST['LoginName'];
echo('<INPUT TYPE=HIDDEN NAME=LoginName VALUE="' . $LoginName . '">
');

$GroupName = $_POST['GroupName'];
echo('<INPUT TYPE=HIDDEN NAME=GroupName VALUE="' . $GroupName . '">
');
$AdultQty = $_POST['AdultQty'];
$ChildQty = $_POST['ChildQty'];
$Flags = $_POST['Flags'];
$CellPhone = $_POST['CellPhone'];
$LocalPhone = $_POST['LocalPhone'];
$TripTime = $_POST['TripTime'];
echo('<INPUT TYPE=HIDDEN NAME=TripTime VALUE="' . $TripTime . '">
');
$Price = $_POST['Price'];
// these are variables that need checking
$BIName = $_POST['BIName'];
$BIAddr1 = $_POST['BIAddr1'];
$BIAddr2 = $_POST['BIAddr2'];
$BICity = $_POST['BICity'];
$BIState = $_POST['BIState'];
$BINotUSState = $_POST['BINotUSState'];
$BIZip = $_POST['BIZip'];
$BINotUSZip = $_POST['BINotUSZip'];
$BINotUSCountry = $_POST['BINotUSCountry'];
$CCType = $_POST['CCType'];
$CCNumber = $_POST['CCNumber'];
$CCCcv = $_POST['CCCcv'];
$CCExpMonth = $_POST['CCExpMonth'];
$CCExpYear = $_POST['CCExpYear'];
$CCNameOnCard = $_POST['CCNameOnCard'];
// insert the record
  $MySql = DBOpen();
  $query = "INSERT INTO bookings (TripTime,RecTime,GroupName,CellPhone,LocalPhone,AdultQty,ChildQty,Flags,BIName,BIAddr1,BIAddr2,BICity,BIState,BIZip,BINotUSState,BINotUSZip,BINotUSCountry,CCType,CCNumber,CCExpMonth,CCExpYear,CCNameOnCard,Cost,CCCcv,BookedBy)
            VALUES ('" . $TripTime . "',NOW(),'" . $GroupName . "','" . $CellPhone . "','" . $LocalPhone . "'," . $AdultQty . "," . $ChildQty . "," . $Flags . ",'" . $BIName . "','" . $BIAddr1 . "','" . $BIAddr2 . "','" . $BICity . "','" . $BIState . "','" . $BIZip .
            "','" . $BINotUSState . "','" . $BINotUSZip . "','" . $BINotUSCountry . "','" . $CCType . "','" . $CCNumber . "'," . $CCExpMonth . "," . $CCExpYear . ",'" . $CCNameOnCard . "'," . $Price . "," . $CCCcv . ",'" . $LoginName . "');";
//echo $query;
  mysql_query($query) or die("Database insert error: " . mysql_error());
  mysql_close($MySql);
?>

<!--  Site contents table-->
<FONT size="3"><B><I>Thank you for your  reservation. The following has been stored in our files:</i></b>
<P>
  <table cellspacing="3" width="100%">

    <tr><td><i><b>Your chosen cruise:</b></i></td>
<?php
  $MySql = DBOpen();
  $query = "SELECT * FROM schedule WHERE TripTime = '" . $TripTime . "';";
//echo ' query = ' . $query;
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  $date = DBGetDate($TripTime);
  echo('<td>' . $date . '</td>');
  $time = DBGetTime($TripTime);
  echo('<td>' . $time . '</td>');
  echo('<td>' . $row['DepartLoc'] . '</td>');
  echo('<td>' . $row['Descript'] . '</td>');
  mysql_close($MySql);
?>
  </tr></table>

<table width="100%" border="0">
<tr><td  valign="top">
<p><b><FONT size="3"><i>Billing Information:</i></b>
  </td></tr>
  <tr><td valign="top" align="left">
  <table id="AddrInfo" name="AddrInfo" border="0" cellpadding="3" cellspacing="0">

    <tr valign="top"><td align="right" nowrap="nowrap">
    <label for="BIName"><b><FONT size="2">
    Name:</b></label>
    </td>
    <td  valign="top"> <FONT size="2"><?php echo($BIName) ?><br />

    </td></tr>
    <tr valign="top"><td align="right" nowrap="nowrap">
    <label for="BIAddr1"><b><FONT size="2">
    Address line 1:</b></label>
    </td>
    <td  valign="top"> <FONT size="2"><?php echo($BIAddr1) ?><br />
    </td></tr>

    <tr valign="top"><td align="right" nowrap="nowrap">
    <label for="BIAddr2"><FONT size="2">
    Address line 2:</label>
    </td>
    <td  valign="top"><FONT size="2"><?php echo($BIAddr2) ?><br />
    </td></tr>

    <tr valign="top"><td align="right" nowrap="nowrap">
    <label for="BICity"><b><FONT size="2">
    City:</b></label>
    </td>
    <td  valign="top"><FONT size="2"><?php echo($BICity) ?><br />
    </td>

    <td align="right" nowrap="nowrap">
    <label for="BIState"><b><FONT size="2">
    , State/Province:</b></label>
    </td>
    <td  valign="top"><FONT size="2">
<?php
  $state = $BIState;
  $zip = $BIZip;
  $country = '';
  if (strlen($BINotUSState))
  {
    $state = $BINotUSState;
    $zip = $BINotUSZip;
    $country = $BINotUSCountry;
  }
  echo($state)
?>
    <br />
    </td>

    <td align="right" nowrap="nowrap">
    <label for="BIZip"><b><FONT size="2">
    , ZIP code:</b></label>
    </td>
    <td  valign="top"><FONT size="2"><?php echo($zip) ?><br />
    </td>

    <td align="right" nowrap="nowrap">
    <label for="BICountry"><b><FONT size="2">
<?php
  if ($country != '')
  echo(", Country: " .$country);
?>
  </table>   </td></tr>
</table>
</center>
<FONT size="3"><B><I>Credit card information:</i></b>
<P>

<table cellpadding="3" border="0" width="100%" >
  <tr><td valign="top"><div id="PaymentInfo" >
  <table id="CreditCard"  border="0" cellpadding="2" cellspacing="0">
    <tr><td  valign="top"><?php echo($CCNameOnCard) ?> used a <?php echo($CCType) ?>  with last 4 digits: <?php $hold = substr($CCNumber,-4,4); echo($hold) ?>
      </td></tr>
    </table>    </td>
</tr></table></td>
</tr></table>
<P>If the above is correct, print this page for  your information. Otherwise,
<?php
  if (empty($LoginName))
    echo('<input type="submit" name="StartOver" value="DELETE and Start Over" />
');
  else
  {
    echo('<input type="submit" name="StartOver" value="DELETE and Start Over"
    onclick="document.forms.frm.action=\'ReserveSeat.php\';"/>
');
  }
?>
<p><b><u>Be sure to</u></b>:
<p><UL>
	<LI><b>call Joe, 808 634-2317</b> , after 7pm  the night before your departure date to verify weather conditions and any last  minute changes.<p>
	<LI><b>Bring your credit card</b> to the departure location. Your signed receipt will be issued at that time.<p>

<?php
  if (($Flags & Flag_WebDisc) || ($Flags & Flag_ExtraDisc))
  echo("<LI><b>Bring your discount coupon</b> to the departure location, as well.");
?>
<center>
<p>
<?php
  if ($Flags & Flag_WebDisc)
  echo('<img src="Pics/Coupon10.jpg" width="683" height="223" BORDER="1" ALT="10% off coupon">');
?>

<p>
<?php
  if ($Flags & Flag_ExtraDisc)
  echo('<img src="Pics/Coupon5.jpg" width="683" height="224" BORDER="1" ALT="5% off coupon">');
?>

</center>
<?php
  if (empty($LoginName))
    {
      echo('<input type="submit" name="ReturnHome" value="Return Home"
      onclick="document.forms.frm.action=\'http://balihaitours.com/index.php\';"/>');
    }
  else
    {
      echo('<input type="submit" name="ReturnHome" value="Return to Reserve Seat"
      onclick="document.forms.frm.action=\'ReserveSeat.php\';"/>');
    }
?>

</form>

 </FONT>
</BODY>
</HTML>
