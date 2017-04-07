<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Step 1 & 2 to begin the reservation process: pick your cruise and describe your party -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/ReserveSeat.php -->
<!--  http://www.balihitours.com/ReserveSeat.php -->
<html>

<head>
<meta name="resource-type" content="document">
<meta name="distribution" content=" global ">
<meta name="description" content="Offering boat tours off the Kauai coast">
<meta name="rating" content="General" />
<meta name="author" content="Deana R. Shelby" />
<meta http-equiv=Content-Type content="text/html; charset=utf-8">

<script language="JavaScript" src="js/routines.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
function CheckForm(form)
{
   // ** START **
   // check for a selecte trip
   if (RadioCheck(form.TripTime) == false)
   {
      alert( "Please select a trip" );
      form.TripTime.focus();
      return false ;
   }
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
   //$headers = array("From: balihaitours.com","Reply-To: codezeraven@gmail.com",
   // "X-Mailer: PHP/" . PHP_VERSION);
   //if (!mail("codezeraven@gmail.com","test email","test body\n",$headers))
   //   return false;
   //$subject = "New booking on " . form.TripTime;
   //$message = "New booking on " . form.TripTime . "by " . form.GroupName . "at " . form.LocalPhone.value . "\n";
   //if (!mail("codezeraven@gmail.com",$subject,$message,"From: codezeraven@gmail.com"))
   //   return false;
   return true ;
}
//-->
</script>
</head>

<body bgcolor="#005599" lang=EN-US text="#0011AA" link="#007799" vlink="#00AA00">

<form name="frm" action="https://balihaitours.com/V/CCInfo.php" target="_parent" method="post" onsubmit="return CheckForm(this);" style="font-size:medium; color:black; background-color:white">
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<?php
   require("php/routines.php");
   // PasswordCheck("");

?>
<p> </p>
<!--  Site contents table-->
   <center>
   <table width="90%" bgcolor="#A8DCAD" border="2" style="font-size:large; font-family:Times New Roman">
   <tr><td>
   <i><center>Be advised Mother Nature has a mind of her own and we may need to reschedule due to adverse conditions.<br> Also, due to current gas prices we require a minimum passenger load; we may need to reschedule if enough people have not signed up for your chosen cruise. <b><br>Be sure to leave a contact number, just in case.</b></center></i></td>
   </tr></table> </center>

<p><big>Click to select</big> a cruise with the number of available seats needed on the date and time of your chosing:
</p>
<p><center>
<?php
   $EndTime = time() + (86400 * 120);
   ListTours($EndTime);
   StartTour();
?>
   <p style="font-size:medium"><b><i>Ready to go to our secure site?</i><b>
   <input type="submit" name=Continue value="Continue..." />
   </p>
<!--  site footer-->

   <p>
   <table width="100%" bgcolor="#FFFFFF">
     <tr><TD VALIGN=BOTTOM width="5%">
     <A HREF="http://www.shelmer.com" TARGET="NEWPAGE"><IMG SRC="Pics/ShelmerLogoSM.jpg"></A></TD>
     <TD align="left" VALIGN=BOTTOM width="45%">
   <font size="2" color="black">This site was built by <A HREF="http://www.shelmer.com/thehouse/" TARGET="NEWPAGE">
     <BR>
   <font size="3">SHELMER HOUSE</font></A></TD>

     <td align="right" VALIGN=BOTTOM width="50%">Email
     <A HREF="mailto:drshelby@shelmer.com?subject=Shelmer House: Bali Hai Tours"> the Webmaster...</A><BR>
     <font SIZE="2" FACE="Arial" color="black">Shelmer House on subject line, please</font></TD>     <td>
   </tr></table>  </td>
</FORM>
</BODY>
</HTML>
