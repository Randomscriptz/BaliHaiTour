<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Reserve/CreditCardInfo/PrintThisPage.html -->
<!--  http://www.balihitours.com/Reserve/CreditCardInfo/PrintThisPage.html -->
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
<form name="frm" action="http://balihaitours.com/reserveseat.html"  target="_top" method="post">
<center><img src="../Pics/BaliHaiBanner.jpg" width="95%" BORDER="0" ALT="Bali Hai Banner">
<p>
<?php
   include("php/routines.php");
   PasswordCheck("");

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
   $Deposit = $_POST['Deposit'];
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
   $query = "INSERT INTO bookings (BookTripTime,BookRecTime,BookGroupName,BookCellPhone,BookLocalPhone,BookAdultQty,BookChildQty,BookFlags,BookName,BookAddr1,BookAddr2,BookCity,BookState,BookZip,BookNotUSState,BookNotUSZip,BookNotUSCountry,BookCCType,BookCCNumber,BookCCExpMonth,BookCCExpYear,BookCCNameOnCard,BookCost,BookCCCcv,BookedBy,BookDeposit) VALUES ('" . $TripTime . "',NOW(),'" . $GroupName . "','" . $CellPhone . "','" . $LocalPhone . "'," . $AdultQty . "," . $ChildQty . "," . $Flags . ",'" . $BIName . "','" . $BIAddr1 . "','" . $BIAddr2 . "','" . $BICity . "','" . $BIState . "','" . $BIZip . "','" . $BINotUSState . "','" . $BINotUSZip . "','" . $BINotUSCountry . "','" . $CCType . "','" . $CCNumber . "'," . $CCExpMonth . "," . $CCExpYear . ",'" . $CCNameOnCard . "'," . $Price . "," . $CCCcv . ",'" . $LoginName . "'," . $Deposit . ");";
   //echo $query;
   mysql_query($query) or die("Database insert error: " . mysql_error());

   //$who = "codezeraven@gmail.com";
   $who = "8086342317@txt.att.net, codezeraven@gmail.com";
   $subject = "New booking on " . $TripTime;
   $message = "New booking on " . $TripTime . " by " . $GroupName . " at " . $LocalPhone . " or " . $CellPhone . "\r\n";
   if (!mail($who,$subject,$message))
      die("Email error");

?>

<!--  Site contents table-->
<FONT size="3"><B><I>Thank you for your  reservation. The following has been stored in our files:</i></b>
<P>
<?php
   if (strcmp($LoginName,"WEBAccess"))
   {
      printf('<p>Your reservations were made by: %s %s %s<p>',$PassRow['PassFullName'],$PassRow['PassEmail'],$PassRow['PassPhoneNumber']);
   }

   echo '<table cellspacing="3">
    <tr><td><i><b>Your chosen cruise:</b></i></td> ';
   SchedRead($TripTime);
   echo('<td>' . DBGetDate($TripTime) . '</td>');
   echo('<td>' . DBGetTime($TripTime) . '</td>');
   echo('<td>' . $SchedRow['SchedDepartLoc'] . '</td>');
   echo('<td>' . $SchedRow['SchedDescript'] . '</td>');
   mysql_close($MySql);
   echo '</tr></table>';

   ShowCosts($SchedRow,$PassRow,$AdultQty,$ChildQty,$Flags);
?>

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
<p><b><u>Be sure to</u></b>:
<p><UL>
	<LI><b>call Joe, 808 634-2317</b> , after 7pm  the night before your departure date to verify weather conditions and any last  minute changes.<p>
	<LI><b>Bring your credit card</b> to the departure location. Your signed receipt will be issued at that time.<p>

<?php
  if (!strcmp($LoginName,'WEBAccess'))
   {
      echo('<input type="submit" name="ReturnHome" value="Return Home"
      onclick="document.forms.frm.action=\'http://balihaitours.com/index.html\';"/>');
   }
   else
   {
//printf("passfunction = %s ",$PassRow['PassFunction']);
      if (!strcmp($PassRow['PassFunction'],"Administration"))
      {
         echo('<input type="submit" name="ReturnHome" value="Return to Bookings"
         onclick="document.forms.frm.action=\'http://balihaitours.com/Upkeep/ViewPassengers.php\';"/>');
      } else
      {
         echo('<input type="submit" name="ReturnHome" value="Return to Reserve Seat"
         onclick="document.forms.frm.action=\'http://balihaitours.com/ReserveSeat.php\';"/>');
      }
   }
?>

<table width="630">
  <tr><td>
<img src="Pics/KauaiMapBW.jpg" width="400" height="254" BORDER="0" ALT="Generic Map of Kauai">
<FONT size="3" face="Verdana, sans-serif"><b>Directions to Hanalei:</b>
<FONT size="2" face="Verdana, sans-serif">
      <UL>
      <LI>Take Kuhio Hwy (State Hwy #56) toward Hanalei, changes to State Hwy 560 after Princeville.<br>
      <LI>Once in Hanalei, turn toward ocean at Aku Road<br>
      <LI>Turn right at dead end, Weke Road<br>
      <LI>Turn right at dead end, look for our signs<br>
      <LI>Park, lock up and get ready for an adventure</LI></UL>
<img src="Pics/HanaleiXr.jpg" width="623" height="500" BORDER="0" ALT="Map to Hanalei location">
</td></tr></table>

</form>

 </FONT>
</BODY>
</HTML>
