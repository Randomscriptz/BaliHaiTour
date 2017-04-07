<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/AddPassenger.html -->
<!--  http://www.balihitours.com/AddPassenger.html -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours: Website & Schedule Maintenance: Add a Passenger Record</title>

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
  if (form.AdultQty.value.length < 1)
  {
    alert( "The # of Adults is not set" );
    form.AdultQty.focus();
    return false ;
  }
  if (!StringCheck(form.AdultQty.value,"0123456789"))
  {
    alert( "The # of Adults has illegal character(s)" );
    form.AdultQty.focus();
    return false ;
  }
  if (form.ChildQty.value.length < 1)
  {
    alert( "The # of Children is not set" );
    form.ChildQty.focus();
    return false ;
  }
  if (!StringCheck(form.ChildQty.value,"0123456789"))
  {
    alert( "The # of Children has illegal character(s)" );
    form.ChildQty.focus();
    return false ;
  }
  if (form.TotalCost.value.length < 1)
  {
    alert( "The Total Cost is not set" );
    form.TotalCost.focus();
    return false ;
  }
  if (!StringCheck(form.TotalCost.value,"0123456789"))
  {
    alert( "The Total Cost has illegal character(s)" );
    form.TotalCost.focus();
    return false ;
  }
  if (form.CCNameOnCard.value.length < 4)
  {
    alert( "The Credit Card Name is too short" );
    form.CCNameOnCard.focus();
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
  // ** END **
  return true ;
}
//-->
</script>

</head>

<body bgcolor="#FFFFFF" lang=EN-US text="#000000" link="#007799" vlink="#00AA00">
<form name="frm" action="ViewPassengers.php" method="post" onsubmit="return CheckForm(this);">
<?php
include("../php/routines.php");

PasswordCheck();

$TripTime = $_POST['TripTime'];
echo('<input type=hidden name=TripTime value="' . $TripTime . '">');
if (strlen($TripTime) < 10) die("No cruise was selected");
?>
<font size="5">Add Passenger record to cruise:</font>
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
  $MySql = DBOpen();
  $query = "SELECT * FROM schedule WHERE TripTime = '" . $TripTime . "';";
//echo ' query = ' . $query;
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  $date = DBGetDate($TripTime);
  echo('<td align=center>' . $date . '</td>');
  $time = DBGetTime($TripTime);
  echo('<td align=center>' . $time . '</td>');
  echo('<td align=center>' . $row['DepartLoc'] . '</td>');
  echo('<td align=center>' . $row['MaxPeople'] . '</td>');
  echo('<td align=center>' . $row['Descript'] . '</td>');
  mysql_close($MySql);
?>
   </tr></table>

<p>The following is shown on the Passenger list for each cruise. The numbers will reduce seats available in the Availability list. Enter values as desired.
<P>
 <table border="0" cellspacing="0" cellpadding="2" width="100%">
    <tr>
    <th align="center">Family or <br>Group name</th>
    <th align="center">#<br>Adults</th>

    <th align="center">#<br>Children</th>
    <th align="center">Safety Seat<br>needed</th>
    <th align="center">Web<br>Discount</th>
    <th align="center">Extra<br>Discount</th>
    <th align="center">Total<br>Cost</th>

    <th align="center">Credit<br>Card Name</th>
    <th align="center">Cell<br>Phone</th>
    <th align="center">Local<br>Phone</th>
   </tr>
    <tr height="20">
    <td align="center"> <input type="text" name="GroupName" size="25" maxlength="30"> </td>

    <td align="center">
    <select name="AdultQty">
      <option value="1" selected="selected">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
      <option value="32">32</option>
      <option value="33">33</option>
      <option value="34">34</option>
      <option value="35">35</option>
    </select></td>

    <td align="center">
    <select name="ChildQty">
      <option value="0" selected="selected">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select></td>
    <td align="center">
   <select  name="SafetySeat" >
   <option  >No</option>
      <option  >Yes</option>
   </select> </td>

    <td align="center">
   <select  name="WebDisc">
   <option  >No</option>
      <option  >Yes</option>
   </select> </td>
    <td align="center">
   <select  name="ExtraDisc">
   <option  >No</option>

      <option  >Yes</option>
   </select> </td>
    <td align="center"> $<input type="text" name="TotalCost" size="7"></td>
    <td align="center"> <input type="text" name="CCNameOnCard" size="35" maxlength="40"></td>
    <td align="center"> <input type="text" name="CellPhone" size="12"></td>
    <td align="center"> <input type="text" name="LocalPhone" size="12"></td>

   </tr></table>


<P>  <input type="submit" name=AddPassenger value="Add passenger & View passenger list" />
</form>
</FONT>
</BODY>
</HTML>