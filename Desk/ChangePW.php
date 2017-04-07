<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<!--  Password maintenance -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Upkeep/PW/Passwords.php -->
<!--  http://www.balihitours.com/Upkeep/PW/Passwords.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv="Content-type" content="text/html; charset=utf-8">

   <title>Bali Hai Tours:  Passwords Maintenance</title>

</head>
<body bgcolor="#FFFFFF" lang=EN-US text="#000000" link="#007799" vlink="#00AA00">
<form name="formb" action="ChangePW.php" method="post">
<?php
   require("../php/routines.php");
   PasswordCheck("");
   // take care of adds
   if (!empty($_POST["UpdateIt"]))
   {
      if (strlen($_POST["NewPassword"]) < 6) die("New password is too short");
      if (strcmp($_POST["NewPassword"],$_POST["NewPasswordB"])) die("The new passwords do not match");
//echo (" compare '" . MD5($_POST["OldPassword"]) . "' '" . $PassRow['PassPassword'] . "' ");
      if (strcmp(MD5($_POST["OldPassword"]),$PassRow['PassPassword'])) die("Old password is wrong");
      $query = "UPDATE passwords SET PassRecTime=NOW(), PassPassword='" . MD5($_POST['NewPassword']) . "' WHERE PassLoginName='" . $LoginName . "';";
      $MySql = DBOpen();
      mysql_query($query) or die('Update error: ' . mysql_error());
      mysql_close($MySql);
      echo('Password has been changed
<script type="text/javascript">
<!--
window.location = "http://www.balihaitours.com/Desk"
//-->
</script>
');
      header('Location: http://balihaitours.com/Desk');
      exit;
   }
?>
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<font size="5">Password Maintanence:</font>
<p>Click to delete record:
<P>
<p>Old Password <input type="password" name="OldPassword" size="16" maxlength="16">
<p>New Password <input type="password" name="NewPassword" size="16" maxlength="16">
<p>New Password <input type="password" name="NewPasswordB" size="16" maxlength="16">

<P><input type="submit" name=UpdateIt value="Update the password"/>
<p><input type=submit name=Cancel value="Cancel"
    onclick='javascript: document.forms.formb.action="index.html";' />

</FONT>
</form>
</BODY>
</HTML>