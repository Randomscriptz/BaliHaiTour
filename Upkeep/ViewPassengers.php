<!-- View a list of passengers for a selected cruise & add a passenger to that cruise -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Upkeep/ViewPassengers.php -->
<!--  http://www.balihitours.com/Upkeep/ViewPassengers.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours: Website & Schedule Maintenance: View & Delete Passenger Records</title>

<script language="JavaScript" src="../js/routines.js" type="text/javascript"></script>
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
   if (form.PremierNumber.value.length > 1)
   {
      if (form.PremierNumber.value.length != 5)
      {
         alert( "Wyndham premier number is wrong" );
         form.PremierNumber.focus();
         return false ;
      }
      if (!StringCheck(form.PremierNumber.value,"0123456789"))
      {
         alert( "Bad Wyndham premier number" );
         form.PremierNumber.focus();
         return false ;
      }
   }
   if (form.PremierNumber.value.length > 0)
   {
      if (form.PremierNumber.value.length != 5)
      {
         alert( "Premier number is wrong" );
         form.PremierNumber.focus();
         return false ;
      }
      if (!StringCheck(form.PremierNumber.value,"0123456789"))
      {
         alert( "Bad Priemier number/date" );
         form.PremierNumber.focus();
         return false ;
      }
      var today = new Date();
      var x = new Date();
      x.setFullYear(PreimExpYear.value,PriemExpMonth.value,1);
      var span = x.valueOf() - today.valueOf();
      if ((span < 86400000) || (span > 34387200000))
      {
         alert( "Bad Priemier date/number" );
         form.PremierNumber.focus();
         return false ;
      }
   }
  // ** END **
  return true ;
}
//-->
</script>
</head>

<body bgcolor="#FFFFFF" lang=EN-US text="#000000" link="#007799" vlink="#00AA00">
<form name="frma" action="ViewPassengers.php" method="post">
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<?php
   include("../php/routines.php");
   PasswordCheck("Administration");
   $MySql = DBOpen();
   $TripTime = $_POST['TripTime'];
   echo('<input type=hidden name=TripTime value="' . $TripTime . '">');

  // check for a delete
//echo('selected = ' . $_POST['Selected']);
   if (!strcmp($_POST['Selected'],"Delete Passengers"))
   {
      $deletes = $_POST['Delete'];
      if (count($deletes))
      {
         for ($a = 0; $a < count($deletes); $a++ )
         {
            $query = "DELETE FROM bookings WHERE BookTripTime='" . $TripTime . "' AND BookGroupName='" . $deletes[$a] . "';";
   //echo("query = " . $query);
            mysql_query($query, $MySql) or die('Delete error: ' . mysql_error());
         }
      }
   }

   // check for an insert
   if (strlen($_POST['AddPassenger']) > 4)
   {
      $Flags = 0;
      if (!strcmp($_POST['SafetySeat'],"Yes")) $Flags |=  Flag_SafetySeat;
      if (!strcmp($_POST['WebDisc'],"Yes")) $Flags |=  Flag_WebDisc;
      if (!strcmp($_POST['ExtraDisc'],"Yes")) $Flags |=  Flag_ExtraDisc;
      $query = "INSERT INTO bookings(BookTripTime,BookRecTime,BookGroupName,BookAdultQty,BookChildQty,BookFlags,BookCost,BookCCNameOnCard,CBookellPhone,BookLocalPhone,BookedBy) VALUES ('" . $TripTime . "',NOW(),'" . $_POST['GroupName'] . "'," . $_POST['AdultQty'] . "," . $_POST['ChildQty'] . "," . $Flags . "," . $_POST['TotalCost'] . ",'" . $_POST['CCNameOnCard'] . "','" . $_POST['CellPhone'] . "','" . $_POST['LocalPhone'] .  "','" . $LoginName  . "');";
   //echo("query = " . $query);
      mysql_query($query, $MySql) or die("Database insert error: " . mysql_error());
   }
?>
<font size="5">Passengers for cruise:</font>
<P>
 <table border="0" cellspacing="0" cellpadding="2" width="100%">
    <tr>
    <th align="center">Departure<br>Date</th>
    <th align="center">Departure<br>Time</th>
    <th align="center">Departure<br>Location</th>
    <th align="center">Max<br>Passengers</th>
    <th align="center">Brief<br>Description</th>
   </tr>
    <tr height="20">
<?php
  $query = "SELECT * FROM schedule WHERE SchedTripTime = '" . $TripTime . "';";
//echo ' query = ' . $query;
  $result = mysql_query($query, $MySql);
  $row = mysql_fetch_array($result);
  $date = DBGetDate($TripTime);
  echo('<td align="center">' . $date . '</td>');
  $time = DBGetTime($TripTime);
  echo('<td align="center">' . $time . '</td>');
  echo('<td align="center">' . $row['SchedDepartLoc'] . '</td>');
  echo('<td align="center">' . $row['SchedNumSeats'] . '</td>');
  echo('<td align="center">' . $row['SchedDescript'] . '</td>');
?>
   </tr></table>
<p>Click to delete record:
 <table border="1" cellspacing="0" cellpadding="2" width="100%">
    <tr><th></th>
    <th align="center">Family or <br>Group name</th>
    <th align="center">#<br>Adults</th>
    <th align="center">#<br>Children</th>
    <th align="center">Safety Seat<br>needed</th>
    <th align="center">Web<br>Discount</th>
    <th align="center">Extra<br>Discount</th>
    <th align="center">Total<br>Cost</th>
    <th align="center">Who<br>Booked</th>
    <th align="center">Credit<br>Card Name</th>
    <th align="center">Cell<br>Phone</th>
    <th align="center">Local<br>Phone</th>
   </tr>
<?php
  $query = "SELECT * FROM bookings WHERE BookTripTime = '" . $TripTime . "';";
  $result = mysql_query($query, $MySql);
  while ($row = mysql_fetch_array($result))
  {
    echo('<tr height=20><td><input type="checkbox" name="Delete[]" value="' . $row['BookGroupName'] .'">');
    echo('<td align=center><font size=2>' . $row['BookGroupName'] . '</td>');
    echo('<td align=center><font size=2>' . $row['BookAdultQty'] . '</td>');
    echo('<td align=center><font size=2>' . $row['BookChildQty'] . '</td>');
    $Flags = $row['BookFlags'];
    $hold = '';
    if ($Flags & Flag_SafetySeat) $hold = "Yes";
    echo('<td align=center><font size=2><p>' . $hold . '</td>');
    $hold = '';
    if ($Flags & Flag_WebDisc) $hold = "Yes";
    echo('<td align=center><font size=2><p>' . $hold . '</td>');
    $hold = '';
    if ($Flags & Flag_ExtraDisc) $hold = "Yes";
    echo('<td align=center><font size=2><p>' . $hold . '</td>');
    echo('<td align=center><font size=2>');
    printf("$%8.2f",$row['BookCost']);
    echo('</td>');
    echo('<td align=center><font size=2><p>' . $row['BookedBy'] . '</td>');
    echo('<td align=center><font size=2><p>' . $row['BookCCNameOnCard'] . '</td>');
    echo('<td align=center><font size=2><p>' . $row['BookCellPhone'] . '</td>');
    echo('<td align=center><font size=2><p>' . $row['BookLocalPhone'] . '</td></tr>
');
  }
?>
  </table>

<P><input type=submit name=Selected value="Delete Passengers" onclick='javascript: document.forms.frma.action="ViewPassengers.php";' />
</form>
<form name="frmb" action="http://balihaitours.com/CCInfo.php" target="_parent" method="post" onsubmit="return CheckForm(this);">
<?php PasswordSet($LoginName);
   $TripTime = $_POST['TripTime'];
   echo('<input type=hidden name=TripTime value="' . $TripTime . '">');

   StartTour();

?>
<P>  <input type="submit" name=AddPassenger value="Add passenger" />
</form>

<form name="frm" method="post">
<?php
   PasswordSet($LoginName);
   finish();
?>
</form>
</FONT>
</BODY>
</HTML>