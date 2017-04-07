<!-- used by Activity Desk personnel to change their password to a personal & private password -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Desk/PW/index.html -->
<!--  http://www.balihitours.com/Desk/PW/index.html -->
<html>

<head>
<meta name="resource-type" content="document" />
<meta name="distribution" content=" global " />
<meta name="description" content="Offering boat tours off the Kauai coast" />
<meta name="rating" content="General" />
<meta name="author" content="Deana R. Shelby" />
<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours: Change Your Password</title>
   <script language="JavaScript" src="../js/routines.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
function CheckForm(form)
{
  // ** START **
  if (form.ADUserID.value.length < 4)
  {
    alert("User name is too short");
    form.ADUserID.focus();
    return (false);
  }
  if (form.ADOldPassword.value.length < 4)
  {
    alert("Original password is too short");
    form.ADOldPassword.focus();
    return (false);
  }
  if (form.ADNewPassword.value.length < 8)
  {
    alert("New password is too short");
    form.ADNewPassword.focus();
    return (false);
  }
  if (form.ADNewPassword.value != form.ADNewPasswordCk.value)
  {
    alert("New Passwords don't match");
    form.ADNewPassword.focus();
    return (false);
  }
  if (!(CheckFor(form.ADNewPassword.value,"0123456789")))
  {
    alert("New Password needs number(s)");
    form.ADNewPassword.focus();
    return (false);
  }
  if (!(CheckFor(form.ADNewPassword.value,"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")))
  {
    alert("New Password needs letter(s)");
    form.ADNewPassword.focus();
    return (false);
  }
  // ** END **
  return true ;
}
//-->
</script>

</head>

<body bgcolor="#FFFFFF" lang=EN-US text="#0011AA" link="#007799" vlink="#00AA00">
<!--  ChangePassword contents table-->
<form name="frm" action="ChangePassword.php" method="post" onsubmit="return CheckForm(this);">

<?php
include("../php/routines.php");

  // see if this is clled from itself
  if (strlen($_POST['ADUserID']) > 4)
  {
    $MySql = DBOpen();
    // check for good original login
    $query = "SELECT LoginName FROM passwords WHERE LoginName='" . $_POST['ADUserID'] . "'and Password = '" . $_POST['ADOldPassword'] . "';";
    $result = mysql_query($query);
    if (!$row = mysql_fetch_array($result))
    die('Bad original Login/Password.');
    // update the password
    $query = "UPDATE passwords SET UpdateTime=NOW(),Password='" . $_POST['ADNewPassword'] . "' WHERE LoginName='" . $_POST['ADUserID'] . "';";
    mysql_query($query) or die('Database update error: ' . mysql_error());
    mysql_close($MySql);
    die('<font size="5">Password change was successful.');
  }
?>
<?php

?>
<?php

?>
<font size="5">Change your password...
<p>
  <table width="100%" bgcolor="#FFFFFF">
	  <tr><td valign="top">
		Enter Current Username:<br></td>
		<td valign="top"><input type="text" size=8 maxlength=12 name="ADUserID" /></td>
	  <td rowspan="4"> Your new password should:
		<ul>
		  <li>Contain 8 characters
		  <li>Contain at least 1 number and 1 letter
		  <li>Special characters, such as #, !, ?, %, &, $, <, >, are OK
		  <li>It is suggested to use one or more of the following tricks make your password harder to guess:
		  <ul>
			<li>Use 0 to replace the letter O
			<li>Use $ or Z to replace the letter S
			<li>Use ! or 1 to replace the letters I or L
			<li>Use the two characters !< or 1< to replace the letter K
			<li>Use the two letters VV to replace the letter W
			<li>Use % to replace the letters Z or X	
			<li>If to is part of your password, use the number 2
			<li>If for is part of your password, use the number 4</li>
		  </ul>
		  <li>Make sure it is something you can remember and no one else can guess
		  <li>Do not tell anyone your password</li>
		  </li>
		</ul></td></tr>
	  <tr><td valign="top">
		Enter Current Password:<br></td>
		<td valign="top"><input type="password" size="8" maxlength=12 name="ADOldPassword" /></td></tr>
	  <tr><td valign="top">
		Enter New Password:<br></td>
		<td valign="top"><input type="password" size="8" maxlength=12 name="ADNewPassword" /></td></tr>
	  <tr><td valign="top">
		Re-enter New Password:<br></td>
		<td valign="top"><input type="password" size="8" maxlength=12 name="ADNewPasswordCk" /></td></tr>
</table>

<input type="submit" name="ChangePassword" value="Change the password" />



</FORM>
</BODY>
</HTML>