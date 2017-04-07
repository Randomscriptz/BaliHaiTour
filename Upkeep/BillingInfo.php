<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Maintenance/BillingInfo.php -->
<!--  http://www.balihitours.com/Maintenance/BillingInfo.php -->
<html>

<head>

<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours: Website & Schedule Maintenance: Billing Information</title>

</head>

<body bgcolor="#FFFFFF" lang=EN-US text="#0011AA" link="#007799" vlink="#00AA00">

<form name=frm method="post" action="BillingInfo.php">
<center><img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<?php
  include("../php/routines.php");
  PasswordCheck("Administration");
  if (!empty($_POST['DeleteBillingInfo']))
  {
    $MySql = DBOpen();
    $query = "DELETE FROM bookings WHERE BookTripTime < NOW();";
    if (!$result = mysql_query($query))
      die("Delete error: " . mysql_error());
    mysql_close($MySql);
  }
  if (!empty($_POST['DeleteChecked']))
  {
    // read each checked
    $deletes = $_POST['Delete'];
    if (count($deletes))
    {
      $MySql = DBOpen();
      for ($a = 0; $a < count($deletes); $a++ )
      {
        // seperate triptime
        $hold = substr($deletes[$a],-19);
        $holda = substr($deletes[$a],0,-19);
//echo('delete = ' . $hold . ' ' . $holda);
        $query = "DELETE FROM bookings WHERE BookCCNameOnCard='" . $holda . "' AND BookTripTime='" . $hold . "';";
        mysql_query($query) or die('Delete error: ' . mysql_error());
      }
      mysql_close($MySql);
    }
  }

?>
<!-- whole site table-->
<FONT size="5"> Billing Information, sorted by Name on Credit Card
<p><FONT size="3">Check to delete:
 <table border="1" cellspacing="0" cellpadding="2" width="100%">
   <tr>
    <th align="center"></th>
    <th align="center">Cruise<br>Date/Time</th>
    <th align="center">Credit Card<br>Name</th>
    <th align="center">Billing<br>Name</th>
    <th align="center">Street<br>Address</th>
    <th align="center">City<br>State</th>
    <th align="center">Zip<br>Country</th>
    <th align="center">Who<br>Booked</th>
    <th align="center">Total<br>Cost</th>
    <th align="center">CC<br>Type</th>
    <th align="center">CC<br>Number</th>
    <th align="center">CC<br>CCV</th>
    <th align="center">CC Exp<br>Mo/Yr</th>
   </tr>

<?php
  $MySql = DBOpen();
  $query = "SELECT * FROM bookings ORDER BY BookTriptime,BookCCNameOnCard;";
  $result = mysql_query($query);
  while ($row = mysql_fetch_array($result))
  {
    echo('<tr height="20">');
    echo '<td><input type="checkbox" name="Delete[]" value="' . $row['BookCCNameOnCard'] . $row['BookTripTime'] . '"></td>';
    $hold = dbGetDate($row['BookTripTime']);
    $holda = dbGetTime($row['BookTripTime']);
    echo('<td align=center><p>' . $hold . ' ' . $holda . '</td>');
    echo('<td align=center><p>' . $row['BookCCNameOnCard'] .  '</td>');
    echo('<td align=center><p>' . $row['BookName'] . '</td>');
    echo('<td align=center>' . $row['BookAddr1'] . '<br>' . $row['BookAddr2'] . '</td>');
    $hold = $row['BookState'];
    if (strlen($row['BookNotUSCountry']) > 1) $hold = $row['BookNotUSCountry'];
    echo('<td align=center>' . $row['BookCity'] . '<br>' . $hold . '</td>');
    $hold = '';
    if (strlen($row['BookNotUSState']) > 1) $hold = $row['BookNotUSState'];
    $holda = $row['BookZip'];
    if (strlen($row['BookNotUSZip']) > 1) $holda = $row['BookNotUSZip'];
    echo('<td align=center>' . $holda . '<br>' . $hold . '</td>');
    echo('<td align=center><p>' . $row['BookedBy'] . '</td>');
    echo('<td align=center>$' . $row['BookCost'] . '</td>');
    echo('<td align=center><p>' . $row['BookCCType'] . '</td>');
    echo('<td align=center><p>' . $row['BookCCNumber'] . '</td>');
    echo('<td align=center><p>' . $row['BookCCCcv'] . '</td>');
    echo('<td align=center><p>' . $row['BookCCExpMonth'] . '/' . $row['BookCCExpYear'] . '</td></tr>
');
  }
  mysql_close($MySql);
?>
 </table>

  <p> <FONT size="5"> <b>DO NOT</b> <FONT size="3">delete unless all information has been collected or page has been printed. Check to be sure.
<p><input type="submit" name="DeleteChecked" value="Delete checked record" />
Note: the checked records will be deleted from the Who Booked report, as well.
</b></i>
</div></div>
<p>
<?php
   finish();
?>

</form>
</FONT>
</BODY>
</HTML>
