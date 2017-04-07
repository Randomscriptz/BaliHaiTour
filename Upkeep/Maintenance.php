<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Maintenance.php -->
<!--  http://www.balihitours.com/Maintenance.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours: Website & Schedule Maintenance: Add schedule records</title>

    <basefont size="2" face="Arial,Helvetica,sans-serif" color="#000000">
	<title>Javascript Calendar Example by Lea Smart</title>
	<link rel="STYLESHEET" type="text/css" href="../css/calendar.css">
	<script language="JavaScript" src="../js/simplecalendar.js" type="text/javascript"></script>
</head>

<body bgcolor="#FFFFFF" lang=EN-US text="#000000" link="#007799" vlink="#00AA00">
<form name="frm" action="Maintenance.php" method="post">
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<?php
  include("../php/routines.php");
  PasswordCheck("Administration");

  // save all the post variables
  $DepartDate = $_POST["DepartDate"];
  $DepartTime = $_POST["DepartTime"];
  $DepartTimeC = $_POST["DepartTimeC"];
  if (!empty($_POST["DepartTimeC"])) $DepartTime = $DepartTimeC;
  $DepartLoc = $_POST["DepartLoc"];
  $DepartLocC = $_POST["DepartLocC"];
  if (!empty($_POST["DepartLocC"])) $DepartLoc = $DepartLocC;
  $Descript = $_POST["Descript"];
  $DescriptC = $_POST["DescriptC"];
  if (!empty($_POST["DescriptC"])) $Descript = $DescriptC;
  $MaxPeople = $_POST["MaxPeople"];
  $MaxPeopleC = $_POST["MaxPeopleC"];
  if (!empty($_POST["MaxPeopleC"])) $MaxPeople = $MaxPeopleC;
  $AdultCost = $_POST["AdultCost"];
  $AdultCostC = $_POST["AdultCostC"];
  if (!empty($_POST["AdultCostC"])) $AdultCost = $AdultCostC;
  $ChildCost = $_POST["ChildCost"];
  $ChildCostC = $_POST["ChildCostC"];
  if (!empty($_POST["ChildCostC"])) $ChildCost = $ChildCostC;
  $WebDisc = $_POST["WebDisc"];
  $WebDiscC = $_POST["WebDiscC"];
  if (!empty($_POST["WebDiscC"])) $WebDisc = $WebDiscC;
  $ExDisc = $_POST["ExDisc"];
  $ExDiscC = $_POST["ExDiscC"];
  if (!empty($_POST["ExDiscC"])) $ExDisc = $ExDiscC;
  $PremierAdultCost = $_POST["PremierAdultCost"];
  $PremierAdultCostC = $_POST["PremierAdultCostC"];
  if (!empty($_POST["PremierAdultCostC"])) $PremierAdultCost = $PremierAdultCostC;
  $PremierChildCost = $_POST["PremierChildCost"];
  $PremierChildCostC = $_POST["PremierChildCostC"];
  if (!empty($_POST["PremierChildCostC"])) $PremierChildCost = $PremierChildCostC;
  $MarinaAdultCost = $_POST["MarinaAdultCost"];
  $MarinaAdultCostC = $_POST["MarinaAdultCostC"];
  if (!empty($_POST["MarinaAdultCostC"])) $MarinaAdultCost = $MarinaAdultCostC;
  $MarinaChildCost = $_POST["MarinaChildCost"];
  $MarinaChildCostC = $_POST["MarinaChildCostC"];
  if (!empty($_POST["MarinaChildCostC"])) $MarinaChildCost = $MarinaChildCostC;

  // set defaults
  if (empty($_POST["DepartDate"]))
  {
      $DepartTime = "06:30";
      $DepartLoc = "Hanalei";
      $Descript = "NaPali Coast";
      $MaxPeople = "6";
      $AdultCost = "155";
      $ChildCost = "90";
      $WebDisc = "10";
      $ExDisc = "10";
      $PremierAdultCost = "120";
      $PremierChildCost = "85";
      $MarinaAdultCost = "12";
      $MarinaChildCost = "0";
  }

  // check for an add
  if (!strcmp($_POST["Add"],'Add'))
  {
    $sql = "INSERT INTO schedule (SchedRecTime,SchedTripTime,SchedDepartLoc,SchedDescript,SchedMaxPeople,SchedAdultCost,SchedChildCost,SchedWebDisc,SchedExDisc,SchedPremierAdultCost,SchedPremierChildCost,SchedMarinaAdultCost,SchedMarinaChildCost)
            VALUES (NOW(),'" . $DepartDate . " " . $DepartTime . "','" . $DepartLoc . "','" . $Descript . "'," . $MaxPeople . "," . $AdultCost . "," . $ChildCost . "," . $WebDisc . "," . $ExDisc . "," . $PremierAdultCost . "," . $PremierChildCost . "," . $MarinaAdultCost . "," . $MarinaChildCost . ");";
//echo "insert = " . $sql . ' ';
    if (!mysql_query($sql,$MySql)) die('Database insert error: ' . mysql_error());
  }

?>

<font size="5"><b>Schedule Maintenance:</b></font>
<p>
<table border="0" cellspacing="0" cellpadding="2" >
   <tr><th align="right">Depart Date</th>
      <td align="right"><a href="javascript: void(0);" onmouseover="if (timeoutId) clearTimeout(timeoutId);window.status='Show Calendar';return true;" onmouseout="if (timeoutDelay) calendarTimeout();window.status='';" onclick="g_Calendar.show(event,'frm.DepartDate', false, 'yyyy-mm-dd', new Date()); return false;"><img src="../Pics/SMcalendar.gif" name="imgCalendar" width="34" height="21" border="0" alt=""></a></td>
      <td align="left"><input type="text" name="DepartDate" size="12" value="<?php echo $DepartDate;?>" /></td>
   </tr><tr><th align="right">Check In Time</th>
      <td align="right"><select name="DepartTime">
         <option <?php if (!strcmp($DepartTime,'06:30')) echo 'SELECTED'; ?> >06:30</option>
         <option <?php if (!strcmp($DepartTime,'07:00')) echo 'SELECTED'; ?> >07:00</option>
         <option <?php if (!strcmp($DepartTime,'07:30')) echo 'SELECTED'; ?> >07:30</option>
         <option <?php if (!strcmp($DepartTime,'08:00')) echo 'SELECTED'; ?> >08:00</option>
         <option <?php if (!strcmp($DepartTime,'08:30')) echo 'SELECTED'; ?> >08:30</option>
         <option <?php if (!strcmp($DepartTime,'12:30')) echo 'SELECTED'; ?> >12:30</option>
         <option <?php if (!strcmp($DepartTime,'13:00')) echo 'SELECTED'; ?> >13:00</option>
         <option <?php if (!strcmp($DepartTime,'13:30')) echo 'SELECTED'; ?> >13:30</option>
         <option <?php if (!strcmp($DepartTime,'14:00')) echo 'SELECTED'; ?> >14:00</option>
         <option <?php if (!strcmp($DepartTime,'14:30')) echo 'SELECTED'; ?> >14:30</option>
      </select></td>
      <td align="left"><input type="text" name="DepartTimeC" size="6" value="<?php echo $DepartTimeC; ?>" /> </td>
   </tr><tr><th align="right">Depart Loc</th>
      <td align="right"><select name="DepartLoc">
         <option <?php if (!strcmp($DepartLoc,'Hanalei')) echo 'SELECTED'; ?> >Hanalei</option>
         <option <?php if (!strcmp($DepartLoc,'Kapaa')) echo 'SELECTED'; ?> >Kapaa</option>
      </select></td>
      <td align="left"><input type="text" name="DepartLocC" size="10" value="<?php echo $DepartLocC; ?>" /> </td>
   </tr><tr><th align="right">Max People</th>
      <td align="right"><select name="MaxPeople">
         <option <?php if (!strcmp($MaxPeople,'6')) echo 'SELECTED'; ?> >6</option>
         <option <?php if (!strcmp($MaxPeople,'8')) echo 'SELECTED'; ?> >8</option>
         <option <?php if (!strcmp($MaxPeople,'10')) echo 'SELECTED'; ?> >10</option>
         <option <?php if (!strcmp($MaxPeople,'12')) echo 'SELECTED'; ?> >12</option>
         <option <?php if (!strcmp($MaxPeople,'14')) echo 'SELECTED'; ?> >14</option>
         <option <?php if (!strcmp($MaxPeople,'16')) echo 'SELECTED'; ?> >15</option>
      </select></td>
      <td><input type="text" name="MaxPeopleC" size="2" value="<?php echo $MaxPeopleC; ?>" /> </td>
   </tr><tr><th align="right">Description</th>
      <td align="right"><select name="Descript">
         <option <?php if (!strcmp($Descript,'NaPali Coast')) echo 'SELECTED'; ?> >NaPali Coast</option>
         <option <?php if (!strcmp($Descript,'Whale watch')) echo 'SELECTED'; ?> >Whale watch</option>
      </select></td>
      <td align="left"><input type="text" name="DescriptC" size="15" value="<?php echo $DescriptC; ?>" /> </td>
   </tr><tr><th align="right">Adult WEB Discount $</th>
      <td align="right"><select name="WebDisc">
         <option <?php if (!strcmp($WebDisc,'0')) echo 'SELECTED'; ?> >0</option>
         <option <?php if (!strcmp($WebDisc,'5')) echo 'SELECTED'; ?> >5</option>
         <option <?php if (!strcmp($WebDisc,'10')) echo 'SELECTED'; ?> >10</option>
         <option <?php if (!strcmp($WebDisc,'15')) echo 'SELECTED'; ?> >15</option>
         <option <?php if (!strcmp($WebDisc,'20')) echo 'SELECTED'; ?> >20</option>
         <option <?php if (!strcmp($WebDisc,'25')) echo 'SELECTED'; ?> >25</option>
      </select></td>
      <td align="left">$<input type="text" name="WebDiscC" size="3" value="<?php echo $WebDiscC; ?>" /></td>
   </tr><tr><th align="right">Adult Military/First Responder Discount $</th>
      <td align="right"><select name="ExDisc">
         <option <?php if (!strcmp($ExDisc,'0')) echo 'SELECTED'; ?> >0</option>
         <option <?php if (!strcmp($ExDisc,'5')) echo 'SELECTED'; ?> >5</option>
         <option <?php if (!strcmp($ExDisc,'10')) echo 'SELECTED'; ?> >10</option>
         <option <?php if (!strcmp($ExDisc,'15')) echo 'SELECTED'; ?> >15</option>
         <option <?php if (!strcmp($ExDisc,'20')) echo 'SELECTED'; ?> >20</option>
         <option <?php if (!strcmp($ExDisc,'25')) echo 'SELECTED'; ?> >25</option>
      </select></td>
      <td align="left">$<input type="text" name="ExDiscC" size="3" value="<?php echo $ExDiscC; ?>" /></td>
   </tr><tr><th align="right">Adult Marina Fee</th>
      <td align="right"><select name="MarinaAdultCost">
         <option <?php if (!strcmp($MarinaAdultCost,'0')) echo 'SELECTED'; ?> >0</option>
         <option <?php if (!strcmp($MarinaAdultCost,'5')) echo 'SELECTED'; ?> >5</option>
         <option <?php if (!strcmp($MarinaAdultCost,'10')) echo 'SELECTED'; ?> >10</option>
         <option <?php if (!strcmp($MarinaAdultCost,'12')) echo 'SELECTED'; ?> >12</option>
         <option <?php if (!strcmp($MarinaAdultCost,'15')) echo 'SELECTED'; ?> >15</option>
         <option <?php if (!strcmp($MarinaAdultCost,'20')) echo 'SELECTED'; ?> >20</option>
         <option <?php if (!strcmp($MarinaAdultCost,'25')) echo 'SELECTED'; ?> >25</option>
      </select></td>
      <td align="left">$<input type="text" name="MarinaAdultCostC" size="3" value="<?php echo $MarinaAdultCostC; ?>" /></td>
   </tr><tr><th align="right">Child Marina Fee</th>
      <td align="right"><select name="MarinaChildCost">
         <option <?php if (!strcmp($MarinaChildCost,'0')) echo 'SELECTED'; ?> >0</option>
         <option <?php if (!strcmp($MarinaChildCost,'5')) echo 'SELECTED'; ?> >5</option>
         <option <?php if (!strcmp($MarinaChildCost,'10')) echo 'SELECTED'; ?> >10</option>
         <option <?php if (!strcmp($MarinaChildCost,'12')) echo 'SELECTED'; ?> >12</option>
         <option <?php if (!strcmp($MarinaChildCost,'15')) echo 'SELECTED'; ?> >15</option>
         <option <?php if (!strcmp($MarinaChildCost,'20')) echo 'SELECTED'; ?> >20</option>
         <option <?php if (!strcmp($MarinaChildCost,'25')) echo 'SELECTED'; ?> >25</option>
      </select></td>
      <td align="left">$<input type="text" name="MarinaChildCostC" size="3" value="<?php echo $MarinaChildCostC; ?>" /></td>
   </tr><tr><th align="right">Adult Cost</th>
      <td align="right"><select name="AdultCost">
         <option <?php if (!strcmp($AdultCost,'99')) echo 'SELECTED'; ?> >99</option>
         <option <?php if (!strcmp($AdultCost,'120')) echo 'SELECTED'; ?> >120</option>
         <option <?php if (!strcmp($AdultCost,'130')) echo 'SELECTED'; ?> >130</option>
         <option <?php if (!strcmp($AdultCost,'140')) echo 'SELECTED'; ?> >140</option>
         <option <?php if (!strcmp($AdultCost,'150')) echo 'SELECTED'; ?> >150</option>
         <option <?php if (!strcmp($AdultCost,'155')) echo 'SELECTED'; ?> >155</option>
         <option <?php if (!strcmp($AdultCost,'160')) echo 'SELECTED'; ?> >160</option>
         <option <?php if (!strcmp($AdultCost,'165')) echo 'SELECTED'; ?> >165</option>
         <option <?php if (!strcmp($AdultCost,'170')) echo 'SELECTED'; ?> >170</option>
         <option <?php if (!strcmp($AdultCost,'175')) echo 'SELECTED'; ?> >175</option>
         <option <?php if (!strcmp($AdultCost,'180')) echo 'SELECTED'; ?> >180</option>
         <option <?php if (!strcmp($AdultCost,'190')) echo 'SELECTED'; ?> >190</option>
         <option <?php if (!strcmp($AdultCost,'200')) echo 'SELECTED'; ?> >200</option>
      </select></td>
      <td align="left">$<input type="text" name="AdultCostC" size="3" value="<?php echo $AdultCostC; ?>" /></td>
   </tr><tr><th align="right">Child Cost</th>
      <td align="right"><select name="ChildCost">
         <option <?php if (!strcmp($ChildCost,'0')) echo 'SELECTED'; ?> >0</option>
         <option <?php if (!strcmp($ChildCost,'50')) echo 'SELECTED'; ?> >50</option>
         <option <?php if (!strcmp($ChildCost,'70')) echo 'SELECTED'; ?> >70</option>
         <option <?php if (!strcmp($ChildCost,'80')) echo 'SELECTED'; ?> >80</option>
         <option <?php if (!strcmp($ChildCost,'85')) echo 'SELECTED'; ?> >85</option>
         <option <?php if (!strcmp($ChildCost,'90')) echo 'SELECTED'; ?> >90</option>
         <option <?php if (!strcmp($ChildCost,'95')) echo 'SELECTED'; ?> >95</option>
         <option <?php if (!strcmp($ChildCost,'100')) echo 'SELECTED'; ?> >100</option>
         <option <?php if (!strcmp($ChildCost,'105')) echo 'SELECTED'; ?> >105</option>
         <option <?php if (!strcmp($ChildCost,'110')) echo 'SELECTED'; ?> >110</option>
         <option <?php if (!strcmp($ChildCost,'120')) echo 'SELECTED'; ?> >120</option>
         <option <?php if (!strcmp($ChildCost,'130')) echo 'SELECTED'; ?> >130</option>
         <option <?php if (!strcmp($ChildCost,'140')) echo 'SELECTED'; ?> >140</option>
         <option <?php if (!strcmp($ChildCost,'150')) echo 'SELECTED'; ?> >150</option>
      </select></td>
      <td align="left">$<input type="text" name="ChildCostC" size="3" value="<?php echo $ChildCostC; ?>" /></td>
   </tr><tr><th align="right">Premier Adult Cost</th>
      <td align="right"><select name="PremierAdultCost">
         <option <?php if (!strcmp($PremierAdultCost,'99')) echo 'SELECTED'; ?> >99</option>
         <option <?php if (!strcmp($PremierAdultCost,'110')) echo 'SELECTED'; ?> >120</option>
         <option <?php if (!strcmp($PremierAdultCost,'120')) echo 'SELECTED'; ?> >120</option>
         <option <?php if (!strcmp($PremierAdultCost,'130')) echo 'SELECTED'; ?> >130</option>
         <option <?php if (!strcmp($PremierAdultCost,'140')) echo 'SELECTED'; ?> >140</option>
         <option <?php if (!strcmp($PremierAdultCost,'150')) echo 'SELECTED'; ?> >150</option>
         <option <?php if (!strcmp($PremierAdultCost,'155')) echo 'SELECTED'; ?> >155</option>
         <option <?php if (!strcmp($PremierAdultCost,'160')) echo 'SELECTED'; ?> >160</option>
         <option <?php if (!strcmp($PremierAdultCost,'165')) echo 'SELECTED'; ?> >165</option>
         <option <?php if (!strcmp($PremierAdultCost,'170')) echo 'SELECTED'; ?> >170</option>
         <option <?php if (!strcmp($PremierAdultCost,'175')) echo 'SELECTED'; ?> >175</option>
         <option <?php if (!strcmp($PremierAdultCost,'180')) echo 'SELECTED'; ?> >180</option>
         <option <?php if (!strcmp($PremierAdultCost,'190')) echo 'SELECTED'; ?> >190</option>
         <option <?php if (!strcmp($PremierAdultCost,'200')) echo 'SELECTED'; ?> >200</option>
      </select></td>
      <td align="left">$<input type="text" name="PremierAdultCostC" size="3" value="<?php echo $PremierAdultCostC; ?>" /></td>
   </tr><tr><th align="right">Premier Child Cost</th>
      <td align="right"><select name="PremierChildCost">
         <option <?php if (!strcmp($PremierChildCost,'0')) echo 'SELECTED'; ?> >0</option>
         <option <?php if (!strcmp($PremierChildCost,'50')) echo 'SELECTED'; ?> >50</option>
         <option <?php if (!strcmp($PremierChildCost,'70')) echo 'SELECTED'; ?> >70</option>
         <option <?php if (!strcmp($PremierChildCost,'80')) echo 'SELECTED'; ?> >80</option>
         <option <?php if (!strcmp($PremierChildCost,'85')) echo 'SELECTED'; ?> >85</option>
         <option <?php if (!strcmp($PremierChildCost,'90')) echo 'SELECTED'; ?> >90</option>
         <option <?php if (!strcmp($PremierChildCost,'95')) echo 'SELECTED'; ?> >95</option>
         <option <?php if (!strcmp($PremierChildCost,'100')) echo 'SELECTED'; ?> >100</option>
         <option <?php if (!strcmp($PremierChildCost,'105')) echo 'SELECTED'; ?> >105</option>
         <option <?php if (!strcmp($PremierChildCost,'110')) echo 'SELECTED'; ?> >110</option>
         <option <?php if (!strcmp($PremierChildCost,'120')) echo 'SELECTED'; ?> >120</option>
         <option <?php if (!strcmp($PremierChildCost,'130')) echo 'SELECTED'; ?> >130</option>
         <option <?php if (!strcmp($PremierChildCost,'140')) echo 'SELECTED'; ?> >140</option>
         <option <?php if (!strcmp($PremierChildCost,'150')) echo 'SELECTED'; ?> >150</option>
      </select></td>
      <td align="left">$<input type="text" name="PremierChildCostC" size="3" value="<?php echo $PremierChildCostC; ?>" /></td>

   </tr></table></td>

<input type="submit" name="Add" value="Add"
onclick='javascript: document.forms.frm.action="Maintenance.php";' />

<p>
<?php finish(); ?>

</form>
</FONT>
</BODY>
</HTML>