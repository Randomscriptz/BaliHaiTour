<!--  Password maintenance -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Upkeep/PW/Passwords.php -->
<!--  http://www.balihitours.com/Upkeep/PW/Passwords.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours:  Passwords Maintenance</title>
<script language="JavaScript" src="../js/routines.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
<!--
function CheckForm(form)
{
  // ** START **
  if (form.LoginName.value.length < 4)
  {
    alert( "The Username is too short" );
    form.LoginName.focus();
    return false ;
  }
  if (form.FullName.value.length < 6)
  {
    alert( "The Full Name is too short" );
    form.FullName.focus();
    return false ;
  }
  if (form.Company.value.length < 6)
  {
    alert( "The Company Name is too short" );
    form.Company.focus();
    return false ;
  }
  if (form.PhoneNumber.value.length < 7)
  {
    alert( "The Phone Number is too short" );
    form.PhoneNumber.focus();
    return false ;
  }
  if (form.Email.value.length < 14)
  {
    alert( "The Email is too short" );
    form.Email.focus();
    return false ;
  }
  if (form.Commision.value.length < 1)
  {
    alert( "The Commision is too short" );
    form.Commision.focus();
    return false ;
  }

  // ** END **
  return true ;
}
//-->
</script>
</head>

<body bgcolor="#FFFFFF" lang=EN-US text="#000000" link="#007799" vlink="#00AA00">

<form name="frma" action="Passwords.php" method="post">
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<?php
   include("../php/routines.php");

   PasswordCheck("Administration");

   // take care of any deletes
   if (!empty($_POST["DeleteChecked"]))
   {
      $deletes = $_POST['Delete'];
   //echo ' deletes = ' . $deletes;
      if (count($deletes))
      {
         for ($a = 0; $a < count($deletes); $a++ )
         {
            $query = "DELETE FROM passwords WHERE PassLoginName='" . $deletes[$a] . "';";
            mysql_query($query) or die('Delete error: ' . mysql_error());
         }
      }
   }

   // do any reset password
   if (!empty($_POST["ResetChecked"]))
   {
      $updates = $_POST['Delete'];
//echo ' updates = ' . $updates;
      if (count($updates))
      {
//echo ' updatesa ';
         for ($a = 0; $a < count($updates); $a++ )
         {
            // update the password
            $Password = PasswordCreate();
//echo ' password =  '. $Password;
            $query = "UPDATE passwords SET PassRecTime=NOW(), PassPassword=MD5('" . $Password . "') WHERE PassLoginName='" .  $updates[$a] . "';";
//echo ' updates querry = ' . $query;
            mysql_query($query) or die('Update error: ' . mysql_error());
            // find the email address
            $query = "SELECT PassEmail FROM passwords WHERE PassLoginName='" . $updates[$a] . "';";
//echo ' reread updates querry = ' . $query;
            $resulta = mysql_query($query) or die('Read error: ' . mysql_error());
            $row = mysql_fetch_array($resulta);
            // mail it
            emailPassword($row['PassEmail'],$Password);
         }
      }
   }

  // take care of adds
  if (!empty($_POST["AddIt"]))
  {
      $Password = PasswordCreate();
      $query = "INSERT INTO passwords (PassRecTime,PassCreateTime,PassLoginName,PassPassword,PassCompany,PassFunction,PassFullName,PassPhoneNumber,PassEmail,PassCommision) VALUES (NOW(),NOW(),'" . $_POST['UserName'] . "',MD5('" . $Password . "'),'" . $_POST['Company'] . "','" . $_POST['Function'] . "','" . $_POST['FullName'] . "','" . $_POST['PhoneNumber'] . "','" . $_POST['Email'] . "','" . $_POST['Commision'] . "');";
      //echo "querry = " . $query . " ";
      mysql_query($query) or die('Insert error: ' . mysql_error());
      emailPassword($_POST['Email'],$Password);
   }

?>

<font size="5">User Maintanence:</font>
<P>
 <table border="1" cellspacing="0" cellpadding="2" width="100%">
    <tr><th></th>
    <th align="center">Username</th>
    <th align="center">Full Name</th>
    <th align="center">Company<br></th>
    <th align="center">Function<br></th>
    <th align="center">Phone<br></th>
    <th align="center">Email<br></th>
    <th align="center">Comish<br></th>
    <th align="center">Create Time</th>
    <th align="center">Update Time</th>

<?php

  $query = "SELECT * from passwords ORDER BY PassLoginName;";
  $result = mysql_query($query);

   while($row = mysql_fetch_array($result))
   {
      echo ("<tr height=20>");
      echo ("<td><input type=checkbox name='Delete[]' value='" . $row['PassLoginName'] . "'></td>");
      echo ('<td align="center">' . $row['PassLoginName'] . '</td>');
      echo ('<td align="center">' . $row['PassFullName'] . '</td>');
      echo ('<td align="center">' . $row['PassCompany'] . '</td>');
      echo ('<td align="center">' . $row['PassFunction'] . '</td>');
      echo ('<td align="center">' . $row['PassPhoneNumber'] . '</td>');
      echo ('<td align="center">' . $row['PassEmail'] . '</td>');
      echo ('<td align="center">' . $row['PassCommision'] . '%</td>');
      $date = DBGetDate($row['PassCreateTime']);
      $time = DBGetTime($row['PassCreateTime']);
      echo ('<td align="center">' . $date . ' ' . $time . '</td>');
      $date = DBGetDate($row['PassRecTime']);
      $time = DBGetTime($row['PassRecTime']);
      echo ('<td align="center">' . $date . ' ' . $time . '</td>');
      echo ('</tr>');
   }
   echo '</table>';
?>

<P>  <input type="submit" name=DeleteChecked value="Delete checked records" />
  <input type="submit" name=ResetChecked value="Reset password for checked records" />
   <p>Username:<input type="text" name="UserName" size="16" maxlength="16">
   <p>Function:<select  name="Function">
   <option>Activities</option>
   <option>Administration</option>
   </select>
   <p>Full Name:<input type="text" name="FullName" size="32" maxlength="32">
   <p>Company:<input type="text" name="Company" size="32" maxlength="32">
   <p>Phone Number:<input type="text" name="PhoneNumber" size="16" maxlength="16">
   <p>Email:<input type="text" name="Email" size="48" maxlength="48">
   <p>Commision:<input type="text" name="Commision" size="3" maxlength="3">%
   <input type="hidden" name="Password" value="123456789012">

   <P><input type="submit" name=AddIt value="Add a new record"/>
   <p>

<?php
   PasswordSet($LoginName);
   finish();
?>

</form>
</BODY>
</HTML>