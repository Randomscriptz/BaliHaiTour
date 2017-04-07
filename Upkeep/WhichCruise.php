<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Maintenance/WhichCruise.php -->
<!--  http://www.balihitours.com/Maintenance/WhichCruise.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours: Website & Schedule Maintenance: Select cruise to view</title>

<script language="JavaScript" src="../js/routines.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
function CheckForm(form)
{
  // ** START **
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

<body bgcolor="#FFFFFF" lang=EN-US text="#000000" link="#007799" vlink="#00AA00">
<form name="frma" action="ViewPassengers.php" method="post" onsubmit="return CheckForm(this);">
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<?php
   require('../php/routines.php');
   PasswordCheck("Administration");
?>

<font size="5">Pick a cruise:</font>
<p>For which cruise do you want to view a passenger list or add a passenger record...
<p>Click to select:
<P>
<?php
   $endTime = time() + (86400 * 30);
   listTours($endTime);
?>

<P><input type=submit name=Selected value="View Passengers" />
</form>
<form name="frm" action="ViewSchedule.php" method="post" >
<?php  PasswordSet($LoginName);
   Finish();
?>
</form>
</FONT>
</BODY>
</HTML>