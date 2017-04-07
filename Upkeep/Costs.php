<!-- View list of planned and scheduled cruises -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Upkeep/ViewSchedule.php -->
<!--  http://www.balihitours.com/Upkeep/ViewSchedule.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=UTF-8">

   <title>Bali Hai Tours: Website & Cost Maintenance: View & Delete</title>

</head>

<body bgcolor="#FFFFFF" lang=UTF-8 text="#000000" link="#007799" vlink="#00AA00">
<form name="frm" action="Costs.php" method="post">
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<font size="5">Default Settings:</font>
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
            $query = "DELETE FROM cost WHERE CostDescript='" . $deletes[$a] . "';";
            mysql_query($query) or die('Delete error: ' . mysql_error());
         }
         mysql_close($MySql);
      }
   }
   if (!empty($_POST["Update"]))
   {
      $MySql = DBOpen();
      $query = "DELETE FROM cost";
      mysql_query($query) or die('Delete error: ' . mysql_error());
      $query = "INSERT INTO cost (CostRecTime,CostDescript,CostDepartLoc,CostDepartTime,CostNumSeats,CostAdultCost,CostChildCost,CostAdultPremierCost,CostChildPremierCost,CostAdultWebDisc,CostChildWebDisc,CostAdultExDisc,CostChildExDisc,CostAdultMarinaFee,CostChildMarinaFee) VALUES (NOW(),'" . $_POST['Descript'] . "','" . $_POST['DepartLoc']  . "','" . $_POST['DepartTime'] . "','" . $_POST['NumSeats'] . "','" . $_POST['AdultCost'] . "','" . $_POST['ChildCost'] . "','" . $_POST['AdultPremierCost'] . "','" . $_POST['ChildPremierCost'] . "','" . $_POST['AdultWebDisc'] . "','" . $_POST['ChildWebDisc'] . "','" . $_POST['AdultExDisc'] . "','" . $_POST['ChildExDisc'] . "','" . $_POST['AdultMarinaFee'] . "','" . $_POST['ChildMarinaFee'] . "');";
//echo "insert = " . $query . ' ';
      if (!mysql_query($query,$MySql)) die('Database insert error: ' . mysql_error());
      mysql_close($MySql);
   }

?>
<P>
 <table border="1" cellspacing="0" cellpadding="2" width="100%">
    <tr>
    <th align="center">Entry<br>Time</th>
    <th align="center">Brief<br>Description</th>
    <th align="center">Brief<br>Departure<br>Location</th>
    <th align="center">Checkin<br>Time</th>
    <th align="center">Brief<br>Number of<br>Seats</th>
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

  $query = "SELECT * from cost ORDER BY CostDescript;";
  $MySql = DBOpen();
  $result = mysql_query($query,$MySql);

   $row = mysql_fetch_array($result);

    echo '<tr height="20">';
    //echo '<td><input type="checkbox" name="Delete[]" value="' . $row['CostDescript'] . '"></td>';
    $date = DBGetDate($row['CostRecTime']);
    $time = DBGetTime($row['CostRecTime']);
    echo '<td align="center">' . $date . ' ' . $time . '</td>';
    echo '<td align="center">' . $row['CostDescript'] . '</td>';
    echo '<td align="center">' . $row['CostDepartLoc'] . '</td>';
    echo '<td align="center">' . $row['CostDepartTime'] . '</td>';
    echo '<td align="center">' . $row['CostNumSeats'] . '</td>';
    echo '<td align="center">$' . $row['CostAdultWebDisc'] . '</td>';
    echo '<td align="center">$' . $row['CostChildWebDisc'] . '</td>';
    echo '<td align="center">$' . $row['CostAdultExDisc'] . '</td>';
    echo '<td align="center">$' . $row['CostChildExDisc'] . '</td>';
    echo '<td align="center">$' . $row['CostAdultMarinaFee'] . '</td>';
    echo '<td align="center">$' . $row['CostChildMarinaFee'] . '</td>';
    echo '<td align="center">$' . $row['CostAdultCost'] . '</td>';
    echo '<td align="center">$' . $row['CostChildCost'] . '</td>';
    echo '<td align="center">$' . $row['CostAdultPremierCost'] . '</td>';
    echo '<td align="center">$' . $row['CostChildPremierCost'] . '</td>';
    echo '</tr>';

   echo '</table>';
   mysql_close($MySql);
?>

<P>
   <table border="0" cellspacing="0" cellpadding="2" >
   <tr>
   <td align="right">Brief Description:</td>
   <td align="left"><input type="text" name="Descript" size="64" value="<?php echo $row['CostDescript']; ?>" /> </td>
   </tr><tr>
   <td align="right">Departure Location:</td>
   <td align="left"><input type="text" name="DepartLoc" size="32" value="<?php echo $row['CostDepartLoc']; ?>" /> </td>
   </tr><tr>
   <td align="right">Checkin Time:</td>
   <td align="left"><input type="text" name="DepartTime" size="8" value="<?php echo $row['CostDepartTime']; ?>" /> </td>
   </tr><tr>
   <td align="right">Number of Seats:</td>
   <td align="left"><input type="text" name="NumSeats" size="2" value="<?php echo $row['CostNumSeats']; ?>" /> </td>
   </tr><tr>
   <td align="right">Adult Web Discount:</td>
   <td align="left">$<input type="text" name="AdultWebDisc" size=3 value="<?php echo $row['CostAdultWebDisc']; ?>" /> </td>
   </tr><tr>
   <td align="right">Child Web Discount:</td>
   <td align="left">$<input type="text" name="ChildWebDisc" size=3 value="<?php echo $row['CostChildWebDisc']; ?>" /> </td>
   </tr><tr>
   <td align="right">Adult Military/Responder Discount:</td>
   <td align="left">$<input type="text" name="AdultExDisc" size=3 value="<?php echo $row['CostAdultExDisc']; ?>" /> </td>
   </tr><tr>
   <td align="right">Child Military/Responder Discount:</td>
   <td align="left">$<input type="text" name="ChildExDisc" size=3 value="<?php echo $row['CostChildExDisc']; ?>" /> </td>
   </tr><tr>
   <td align="right">Adult Marina Fee:</td>
   <td align="left">$<input type="text" name="AdultMarinaFee" size=3 value="<?php echo $row['CostAdultMarinaFee']; ?>" /> </td>
   </tr><tr>
   <td align="right">Child Marina Fee:</td>
   <td align="left">$<input type="text" name="ChildMarinaFee" size=3 value="<?php echo $row['CostChildMarinaFee']; ?>" /> </td>
   </tr><tr>
   <td align="right">Adult Cost:</td>
   <td align="left">$<input type="text" name="AdultCost" size=3 value="<?php echo $row['CostAdultCost']; ?>" /> </td>
   </tr><tr>
   <td align="right">Child Cost:</td>
   <td align="left">$<input type="text" name="ChildCost" size=3 value="<?php echo $row['CostChildCost']; ?>" /> </td>
   </tr><tr>
   <td align="right">Adult Premier Cost:</td>
   <td align="left">$<input type="text" name="AdultPremierCost" size=3 value="<?php echo $row['CostAdultPremierCost']; ?>" /> </td>
   </tr><tr>
   <td align="right">Child Premier Cost:</td>
   <td align="left">$<input type="text" name="ChildPremierCost" size=3 value="<?php echo $row['CostChildPremierCost']; ?>" /> </td>
   </tr></table>

<P>  <input type="submit" name=Update value="Update record"
     onclick='javascript: document.forms.frm.action="Costs.php";' />
<P>
<?php Finish(); ?>

<p>
</form>
</FONT>
</BODY>
</HTML>
