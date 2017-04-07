<!-- Step 1 & 2 to begin the reservation process: pick your cruise and describe your party -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/ReserveSeat.php -->
<!--  http://www.balihitours.com/ReserveSeat.php -->
<html>

<head>
<meta name="resource-type" content="document" />
<meta name="distribution" content=" global " />
<meta name="keywords" content="Bali Hi Tours,Bali Hai Tours, bali hi tours, bali hai tours, boat tour,  boats, adventure tour, Kauai tours, kauai tour, kauai boat tour, kauai, kaui, Hawaii Boat Tours, hawaii boat tour, hawaii boat tours, hawaii, tours, Na Pali Coast, Napali Coast Tours, napali coast tour, snorkel, swim, sight see, Kauai Adventure, kauai adventure, pure nature, pure adventure, fun, sun, discount, snorkel tour, free snorkel gear, snorkle, free snorkle gear, dolphin tours, tours with dolphins, whale tours, tours with whales, zodiac tours kauai" />
<meta name="description" content="Offering boat tours off the Kauai coast" />
<meta name="rating" content="General" />
<meta name="author" content="Deana R. Shelby" />
<meta http-equiv="Keywords" content="Bali Hi Tours,Bali Hai Tours, bali hi tours, bali hai tours, boat tour,  boats, adventure tour, Kauai tours, kauai tour, kauai boat tour, kauai, kaui, Hawaii Boat Tours, hawaii boat tour, hawaii boat tours, hawaii, tours, Na Pali Coast, Napali Coast Tours, napali coast tour, snorkel, swim, sight see, Kauai Adventure, kauai adventure, pure nature, pure adventure, fun, sun, discount, snorkel tour, free snorkel gear, snorkle, free snorkle gear, dolphin tours, tours with dolphins, whale tours, tours with whales, zodiac tours kauai" />
<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

<script language="JavaScript" src="js/routines.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
function CheckForm(form)
{
  // ** START **
  if (form.GroupName.value.length < 3)
  {
    alert( "The Family or Group name is too short" );
    form.GroupName.focus();
    return false ;
  }
  if (form.CellPhone.value.length > 1)
  {
    if (form.CellPhone.value.length < 10)
    {
      alert( "The Cell Phone is too short" );
      form.CellPhone.focus();
      return false ;
    }
    if (!StringCheck(form.CellPhone.value," ()0123456789.-"))
    {
      alert( "The Cell Phone has illegal character(s)" );
      form.CellPhone.focus();
      return false ;
    }
  }
  if (form.LocalPhone.value.length > 1)
  {
    if (form.LocalPhone.value.length < 7)
    {
      alert( "The Local Phone is too short" );
      form.LocalPhone.focus();
      return false ;
    }
    if (!StringCheck(form.LocalPhone.value," ()0123456789.-"))
    {
      alert( "The Local Phone has illegal character(s)" );
      form.LocalPhone.focus();
      return false ;
    }
  }
  if ((form.CellPhone.value.length < 1) && (form.LocalPhone.value.length < 1))
  {
    alert( "The Cell Phone or Local Phone is not set" );
    form.CellPhone.focus();
    return false ;
  }
  if (!RadioCheck(form.TripTime))
  {
    alert( "Your Tour is not selected" );
    return false ;
  }
  // ** END **
  return true ;
}
//-->
</script>
</head>

<body bgcolor="#005599" lang=EN-US text="#0011AA" link="#007799" vlink="#00AA00">


<!-- whole site table-->
	    <A NAME="top"></A>
<table width="100%">
	<tr><td width="15%" valign="top">

<!--  Site contents table-->

<form name="frm" action="CCInfo.php" method="post" onsubmit="return CheckForm(this);">
<?php
include("php/routines.php");

$LoginName = $_POST['LoginName'];
echo('<INPUT TYPE=HIDDEN NAME=LoginName VALUE="' . $LoginName . '">
');

?>


	<table width="100%" bgcolor="#FFFFFF" CELLSPACING="5" CELLPADDING="5">
	  <tr><td align="left" valign="top">
	    <P>
	    <FONT size="5"><B><I>Step One: Scroll to pick your desired date & time</i></b>
	    <P>
	    <table width="100%" bgcolor="#A8DCAD" border="2">
	      <tr><td>
	      <table>
		<tr><td width="3%"></td>
		<td width="70%">
		<FONT size="4" face="Times New Roman"><i><center>Be advised Mother Nature has a mind of her own and we may need to reschedule due to adverse conditions.<br> Also, due to current gas prices we require a minimum passenger load; we may need to reschedule if enough people have not signed up for your chosen cruise. <b><br>Be sure to leave a contact number, just in case.</b></center></i></td>
	    </tr></table></td>
	    </tr></table>

<p><font size="4">Below is a list of our cruises which still have available seats.
<font size="3">Please note: though infants are welcome, they do occupy an available seat.
<p><font size="4"><b>Click to select</b> 
<font size="3">a cruise with the number of available seats needed on the date and time of your chosing:
<p><center>
 <table border="1" cellspacing="0" cellpadding="2" width="80%">
   <tr> <th></th>
    <th align="center">Available<br>Seats:</th>
    <th align="center">Check in<br>Date:</th>
    <th align="center">Check in<br>Time:</th>
    <th align="center">Departure<br>Location:</th>
    <th align="center">Brief<br>Description:</th>
    </tr>
<?php
  function ShowLine($TripTime,$DepartLoc,$Descript,$SeatQty)
  {
    if (strlen($TripTime) < 10) return;
    if ($SeatQty <= 0) return;
    echo ('<tr height=20><td align="center"><input type=radio name="TripTime" value="' . $TripTime . '"></td>');
    echo ('<td align=center><font size=2>' . $SeatQty . '</td>');
    $date = DBGetDate($TripTime);
    echo ('<td align=center><font size=2>' . $date . '</td>');
    $date = DBGetTime($TripTime);
    echo ('<td align=center><font size=2>' . $date . '</td>');
    echo ('<td align=center><font size=2>' . $DepartLoc . '</td>');
    echo ('<td align=center><font size=2>' . $Descript . '</td></tr>');
  }

  $MySql = DBOpen();
  $Query = "SELECT schedule.TripTime,schedule.DepartLoc,schedule.Descript,schedule.MaxPeople,bookings.AdultQty,bookings.ChildQty from schedule LEFT JOIN bookings ON schedule.TripTime = bookings.TripTime WHERE schedule.TripTime > NOW() ORDER BY schedule.TripTime;";
  $result = mysql_query($Query);
  // $status  0 means a preread is needed
  $TripTime = "";
  while($row = mysql_fetch_array($result))
  {
//echo(' compare ' . $TripTime . ' to ' . $row['TripTime']);
    if (strcmp($TripTime,$row['TripTime']))
    {
      showLine($TripTime,$DepartLoc,$Descript,$SeatQty);
      $TripTime = $row['TripTime'];
      $SeatQty = $row['MaxPeople'];
      $DepartLoc = $row['DepartLoc'];
      $Descript = $row['Descript'];
//echo(' set ' . $TripTime . ' to ' . $row['TripTime']);
    }
    if ($row['AdultQty']) $SeatQty -= ($row['AdultQty'] + $row['ChildQty']);
  }
  // do the last line
  showLine($TripTime,$DepartLoc,$Descript,$SeatQty);
  mysql_close($MySql);
?>
</center>
<table width="100%" bgcolor="#FFFFFF" CELLSPACING="0" CELLPADDING="5">
  <tr><td>
  <tr><td width="85%" align="left" valign="top">
  <FONT size="5"><B><I>Step Two: Tell us about your party</i></b>
  <P>
  <table width="100%" bgcolor="#A8DCAD" border="2">
    <tr><td>
    <table>
	<tr><td width="3%"></td>
	<td width="70%">
	<FONT size="4" face="Times New Roman"><i><center>We'll need to know a family or group name to log your request and the number of adults and children in your party.</center></i></b></td>
    </tr></table></td>
  </tr></table>
  <P>
  <table width="100%" bgcolor="#FFFFFF" border="0">
	<tr><td width="55%" valign="top">
	<table cellspacing="20"  border="0">
	  <tr><td valign="top">
		<FONT size="2">Family or Group name:
		<input type="text" size="25" name="GroupName" /></td>
	  <td align="center" valign="top">
		<FONT size="2">Adults:
		<select name="AdultQty">
		<option value="1" selected="selected">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		</select></td>

	 <td align="center" valign="top">
		<FONT size="2">Children:
		<select name="ChildQty">
		<option value="0" selected="selected">0</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select></td>
      </tr></table>

      <table cellspacing="20"  border="0">
	<tr><td valign="top">
		Cell phone:
		<input type="text" name="CellPhone" size="13" />
		<br><FONT size="2">(include area code):</td>
	<td align="center" valign="top">
		Local phone:
		<input type="text" name="LocalPhone" size="13" /> </td>
     </tr></table></td>
     <td  valign="middle" width="45%">
     <table  border="0">
       <td valign="top">
      		<input type="checkbox" name="SafetySeat" value="Yes"></td>
	<td>
      		<FONT size="2">I need an infant safety seat.</td></tr>
       <tr height="30"><td></td> 
       <tr><td valign="top">
		<input type="checkbox" name="ExtraDisc" value="Yes"></td>
	<td>
		<FONT size="2">I am in the military or a 1st responder. Check box to print discount coupon.
		<br>I will bring my professional ID.</td>
     </tr></table></td></tr>

</table>

	<P>	    <FONT size="2">
	<i>A 30% deposit will reserve your seat(s).</i> 
	<p><font size="3"><b><i>Ready to go to our secure site?</i><b>
	<input type="submit" name=Continue value="Continue..." />
  </tr></table>
</tr></table>

<!--  site footer-->

	<p>
	<table width="100%" bgcolor="#FFFFFF">
	  <tr><TD VALIGN=BOTTOM width="5%">
	  <A HREF="http://www.shelmer.com" TARGET="NEWPAGE"><IMG SRC="Pics/ShelmerLogoSM.jpg"></A></TD>
	  <TD align="left" VALIGN=BOTTOM width="45%">
   <FONT size="2" color="black">This site was built by <A HREF="http://www.shelmer.com/thehouse/" TARGET="NEWPAGE">
	  <BR>
   <FONT size="3">SHELMER HOUSE</FONT></A></TD>

	  <td align="right" VALIGN=BOTTOM width="50%">Email
	  <A HREF="mailto:drshelby@shelmer.com?subject=Shelmer House: Bali Hai Tours"> the Webmaster...</A><BR>
	  <FONT SIZE="2" FACE="Arial" color="black">Shelmer House on subject line, please</font></TD>     <td>
	</tr></table>	</td>
</tr></table>
</FORM>
</BODY>
</HTML>