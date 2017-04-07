<!-- View a sorted list of passengers by who booked the reservation -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Upkeep/ViewPassengers.php -->
<!--  http://www.balihitours.com/Upkeep/ViewPassengers.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours: Website & Schedule Maintenance: View & Delete Passenger Records</title>

   <script language="JavaScript" src="PrintPassengerRecords.js" type="text/javascript"></script>
</head>

<body bgcolor="#FFFFFF" lang=EN-US text="#000000" link="#007799" vlink="#00AA00">

<form name="frm" action="GO TO page selected.php" method="post">
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">


<?php
include("../php/routines.php");

PasswordCheck("Administration");


?>
<font size="5">Who Booked Report</font>
<P>

<table border="0" cellspacing="0" cellpadding="2" width="100%">
    <tr>
    <th align="center">Booking<br>Company</th>
    <th align="center">Booking Agent<br>Full Name</th>
    <th align="center">Group<br>Name</th>
    <th align="center">Cell<br>Phone</th>
    <th align="center">Local<br>Phone</th>
    <th align="center">#<br>Adults</th>
    <th align="center">#<br>Children</th>
    <th align="center">Web<br>Discount</th>
    <th align="center">Extra<br>Discount</th>
    <th align="center">Total<br>Commision</th>
    <th align="center">Total<br>Amount*</th>
    <th align="center">Credit<br>Card Name</th>
    <th align="center">Departure<br>Date/Time</th>
    <th align="center">Departure<br>Location</th>
    <th align="center">Brief<br>Description</th>
   </tr>
    <tr height="20">
<?php
  $MySql = DBOpen();
  $query = "select *
   from bookings, schedule, passwords where bookings.BookTripTime = schedule.SchedTripTime and bookings.BookedBy = passwords.PassLoginName order by passwords.PassCompany;";
  $result = mysql_query($query);
  while ($row = mysql_fetch_array($result))
  {
    echo('<td align=center><font size=2>' . $row['PassCompany'] . '</td>');
    echo('<td align=center><font size=2>' . $row['PassFullName'] . '</td>');
    echo('<td align=center><font size=2>' . $row['BookGroupName'] . '</td>');
    echo('<td align=center><font size=2>' . $row['BookCellPhone'] . '</td>');
    echo('<td align=center><font size=2>' . $row['BookLocalPhone'] . '</td>');
    echo('<td align=center><font size=2>' . $row['BookAdultQty'] . '</td>');
    echo('<td align=center><font size=2>' . $row['BookChildQty'] . '</td>');
    $Flags = $row['BookFlags'];
    $hold = '';
    if ($Flags & Flag_WebDisc) $hold = "Yes";
    echo('<td align=center><font size=2>' . $hold . '</td>');
    $hold = '';
    if ($Flags & Flag_ExtraDisc) $hold = "Yes";
    echo('<td align=center><font size=2>' . $hold . '</td>');
    printf("<td align=center><font size=2>$%8.2f</td>",$row['BookDeposit']);
    printf("<td align=center><font size=2>$%8.2f</td>",$row['BookCost']);
    echo('<td align=center><font size=2>' . $row['BookCCNameOnCard'] . '</td>');
    $date = DBGetDate($row['SchedTripTime']);
    $time = DBGetTime($row['SchedTripTime']);
    echo '<td align="center">' . $date . ' ' . $time . '</td>';
    echo('<td align=center><font size=2>' . $row['SchedDepartLoc'] . '</td>');
    echo('<td align=center><font size=2>' . $row['SchedDescript'] . '</td></tr>
');
  }
  mysql_close($MySql);
?>
  </table>
<p><b>*</b> Total Amount <u>does not</u> reflect discount given at departure location
<p>
<?php
   finish();
?>
</form>
</FONT>
</BODY>
</HTML>