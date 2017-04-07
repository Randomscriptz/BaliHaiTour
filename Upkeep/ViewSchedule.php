<!-- View list of planned and scheduled cruises -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Upkeep/ViewSchedule.php -->
<!--  http://www.balihitours.com/Upkeep/ViewSchedule.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=UTF-8">

   <title>Bali Hai Tours: Website & Schedule Maintenance: View & Delete</title>

   <title>Javascript Calendar Example by Lea Smart</title>
   <link rel="STYLESHEET" type="text/css" href="../css/calendar.css">
   <script language="JavaScript" src="../js/simplecalendar.js" type="text/javascript"></script>
</head>

<body bgcolor="#FFFFFF" lang=UTF-8 text="#000000" link="#007799" vlink="#00AA00">
<form name="frm" action="ViewSchedule.php" method="post">
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<font size="5">Cruise Schedule:</font>
<?php

   require("../php/routines.php");
   PasswordCheck("Administration");

   // take care of any deletes
   if (!empty($_POST["DeleteChecked"]))
   {
      $deletes = $_POST['Delete'];
   //echo ' deletes = ' . $deletes;
      if (count($deletes))
      {
         $MySql = DBOpen();
         for ($a = 0; $a < count($deletes); $a++ )
         {
            $query = "DELETE FROM schedule WHERE SchedTripTime='" . $deletes[$a] . "';";
            mysql_query($query) or die('Delete error: ' . mysql_error());
         }
         mysql_close($MySql);
      }
   }

   // delete olds
   if (!empty($_POST["DeleteOld"]))
   {
      $MySql = DBOpen();
      $query = "DELETE FROM schedule WHERE SchedTripTime <= NOW();";
      mysql_query($query) or die('Delete error: ' . mysql_error());
      mysql_close($MySql);
   }

   $DepartDate = $_POST["DepartDate"];
   $DepartTime = $_POST["DepartTime"];
   $MySql = DBOpen();
   if (!empty($_POST["Add"]))
   {
      $DepartLoc = $_POST["DepartLoc"];
      $Descript = $_POST["Descript"];
      $NumSeats = $_POST["NumSeats"];
      $AdultCost = $_POST["AdultCost"];
      $ChildCost = $_POST["ChildCost"];
      $AdultWebDisc = $_POST["AdultWebDisc"];
      $ChildWebDisc = $_POST["ChildWebDisc"];
      $AdultExDisc = $_POST["AdultExDisc"];
      $ChildExDisc = $_POST["ChildExDisc"];
      $AdultPremierCost = $_POST["AdultPremierCost"];
      $ChildPremierCost = $_POST["ChildPremierCost"];
      $AdultMarinaFee = $_POST["AdultMarinaFee"];
      $ChildMarinaFee = $_POST["ChildMarinaFee"];

      $sql = "INSERT INTO schedule (SchedRecTime,SchedTripTime,SchedDepartLoc,SchedDescript,SchedNumSeats,SchedAdultCost,SchedChildCost,SchedAdultWebDisc,SchedChildWebDisc,SchedAdultExDisc,SchedChildExDisc,SchedAdultPremierCost,SchedChildPremierCost,SchedAdultMarinaFee,SchedChildMarinaFee)
               VALUES (NOW(),'" . $DepartDate . " " . $DepartTime . "','" . $DepartLoc . "','" . $Descript . "'," . $NumSeats . "," . $AdultCost . "," . $ChildCost . "," . $AdultWebDisc . "," . $ChildWebDisc . "," . $AdultExDisc  . "," . $ChildExDisc . "," . $AdultPremierCost . "," . $ChildPremierCost . "," . $AdultMarinaFee . "," . $ChildMarinaFee . ");";
   //echo "insert = " . $sql . ' ';
      if (!mysql_query($sql,$MySql)) die('Database insert error: ' . mysql_error());
  } else
  {
      $sql = "SELECT * FROM cost";
      $result = mysql_query($sql) or die('Default read error: ' . mysql_error());
      $row = mysql_fetch_array($result);
      $DepartTime = $row["CostDepartTime"];
      $DepartLoc = $row["CostDepartLoc"];
      $Descript = $row["CostDescript"];
      $NumSeats = $row["CostNumSeats"];
      $AdultCost = $row["CostAdultCost"];
      $ChildCost = $row["CostChildCost"];
      $AdultWebDisc = $row["CostAdultWebDisc"];
      $ChildWebDisc = $row["CostChildWebDisc"];
      $AdultExDisc = $row["CostAdultExDisc"];
      $ChildExDisc = $row["CostChildExDisc"];
      $AdultPremierCost = $row["CostAdultPremierCost"];
      $ChildPremierCost = $row["CostChildPremierCost"];
      $AdultMarinaFee = $row["CostAdultMarinaFee"];
      $ChildMarinaFee = $row["CostChildMarinaFee"];
   }
   mysql_close($MySql);

?>
<p>A portion of each of the following records shows for the customer to select from available cruises. Be sure these accurately reflect the actual cruises planned.
<p>Click to delete record:
<P>
 <table border="1" cellspacing="0" cellpadding="2" width="100%">
    <tr><th></th>
    <th align="center">Departure<br>Time</th>
    <th align="center">Entry<br>Time</th>
    <th align="center">Departure<br>Location</th>
    <th align="center">Max<br>Passengers</th>
    <th align="center">Brief<br>Description</th>
    <th align="center">Adult<br>Web<br>Discount</th>
    <th align="center">Child<br>Web<br>Discount</th>
    <th align="center">Adult<br>Military<br>Discount</th>
    <th align="center">Child<br>Military<br>Discount</th>
    <th align="center">Adult<br>Marina<br>Fee</th>
    <th align="center">Child<br>Marina<br>Fee</th>
    <th align="center">Adult<br>Cost</th>
    <th align="center">Child<br>Cost</th>
    <th align="center">Adult<br>Premier<br>Cost</th>
    <th align="center">Child<br>Premier<br>Cost</th>
<?php

  $query = "SELECT * from schedule WHERE SchedTripTime >= NOW() ORDER BY SchedTripTime;";
  $MySql = DBOpen();
  $result = mysql_query($query,$MySql);

while($row = mysql_fetch_array($result))
{
    echo '<tr height="20">';
    echo '<td><input type="checkbox" name="Delete[]" value="' . $row['SchedTripTime'] . '"></td>';
    $date = DBGetDate($row['SchedTripTime']);
    $time = DBGetTime($row['SchedTripTime']);
    echo '<td align="center">' . $date . ' ' . $time . '</td>';
    $date = DBGetDate($row['SchedRecTime']);
    $time = DBGetTime($row['SchedRecTime']);
    echo '<td align="center">' . $date . ' ' . $time . '</td>';
    echo '<td align="center">' . $row['SchedDepartLoc'] . '</td>';
    echo '<td align="center">' . $row['SchedNumSeats'] . '</td>';
    echo '<td align="center">' . $row['SchedDescript'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultWebDisc'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildWebDisc'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultExDisc'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildExDisc'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultMarinaFee'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildMarinaFee'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultCost'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildCost'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultPremierCost'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildPremierCost'] . '</td>';
    echo '</tr>';
}
echo '</table>';
mysql_close($MySql);
?>

<P>  <input type="submit" name=DeleteChecked value="Delete checked records"
     onclick='javascript: document.forms.frm.action="ViewSchedule.php";' />

<P>Once in a while, to keep the database managable, you should
<input type="submit" name=DeleteOld value="Delete old records"
     onclick='javascript: document.forms.frm.action="ViewSchedule.php";' />

<p>
<p>
   <table border="0" cellspacing="0" cellpadding="2" >
      <tr>
      <td align="right">Depart Date:</td>
      <td><a href="javascript: void(0);" onmouseover="if (timeoutId) clearTimeout(timeoutId);window.status='Show Calendar';return true;" onmouseout="if (timeoutDelay) calendarTimeout();window.status='';" onclick="g_Calendar.show(event,'frm.DepartDate', false, 'yyyy-mm-dd', new Date()); return false;"><img src="../Pics/SMcalendar.gif" name="imgCalendar" width="34" height="21" border="0" alt=""></a>
      <input type="text" name="DepartDate" size="12" value="<?php echo $DepartDate;?>" /></td>
      </tr><tr>
      <td align="right">Check In Time:</td>
      <td align="left"><input type="text" name="DepartTime" size="6" value="<?php echo $DepartTime; ?>" /> </td>
      </tr><tr>
      <td align="right">Brief Description:</td>
      <td align="left"><input type="text" name="Descript" size="64" value="<?php echo $Descript; ?>" /> </td>
      </tr><tr>
      <td align="right">Departure Location:</td>
      <td align="left"><input type="text" name="DepartLoc" size="32" value="<?php echo $DepartLoc; ?>" /> </td>
      </tr><tr>
      <td align="right">Number of Seats:</td>
      <td align="left"><input type="text" name="NumSeats" size="2" value="<?php echo $NumSeats; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Web Discount:</td>
      <td align="left">$<input type="text" name="AdultWebDisc" size=3 value="<?php echo $AdultWebDisc; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Web Discount:</td>
      <td align="left">$<input type="text" name="ChildWebDisc" size=3 value="<?php echo $ChildWebDisc; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Military/Responder Discount:</td>
      <td align="left">$<input type="text" name="AdultExDisc" size=3 value="<?php echo $AdultExDisc; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Military/Responder Discount:</td>
      <td align="left">$<input type="text" name="ChildExDisc" size=3 value="<?php echo $ChildExDisc; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Marina Fee:</td>
      <td align="left">$<input type="text" name="AdultMarinaFee" size=3 value="<?php echo $AdultMarinaFee; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Marina Fee:</td>
      <td align="left">$<input type="text" name="ChildMarinaFee" size=3 value="<?php echo $ChildMarinaFee; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Cost:</td>
      <td align="left">$<input type="text" name="AdultCost" size=3 value="<?php echo $AdultCost; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Cost:</td>
      <td align="left">$<input type="text" name="ChildCost" size=3 value="<?php echo $ChildCost; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Premier Cost:</td>
      <td align="left">$<input type="text" name="AdultPremierCost" size=3 value="<?php echo $AdultPremierCost; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Premier Cost:</td>
      <td align="left">$<input type="text" name="ChildPremierCost" size=3 value="<?php echo $ChildPremierCost; ?>" /> </td>
      </tr>
   </table>

<P>  <input type="submit" name=Add value="Add data"
    onclick='javascript: document.forms.frm.action="ViewSchedule.php";' />

<P> <?php Finish(); ?>

</form>
</FONT>
</BODY>
</HTML>
