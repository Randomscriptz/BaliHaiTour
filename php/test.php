<?php

   echo(" do include ");
  // routines that may be used multiple times
  // these are flag defines
  define("Flag_SafetySeat",1);
  define("Flag_ExtraDisc",2);
  define("Flag_WebDisc",4);

  // database routines
  function DBOpen()
  {
    $MySql = mysql_connect("localhost","shelmerc_BaliHai","HaiBali");
    if (!$MySql) die('Database connect error: ' . mysql_error());
    mysql_select_db("shelmerc_baliHai",$MySql);
    return $MySql;
  }

  function DBGetDate($time)
  {
    sscanf($time,"%d-%d-%d",$year,$month,$day);
    $result = $month . '/' . $day . '/' . $year;
    return($result);
  }

  function DBGetTime($time)
  {
    $result = substr($time,11,5);
    sscanf($result,"%d:%d",$hour,$minute);
    $AmPm = "AM";
    if ($hour >= 12) $AmPm = "PM";
    if ($hour > 12) $hour -= 12;
    $result = sprintf("%d:%02d%s",$hour,$minute,$AmPm);
    return($result);
  }

   // this is an administration password lookup
   function PasswordCheck()
   {
      $LoginName = $_POST['LoginName'];
      echo('login name = ' . $LoginName);
      if (strlen($LoginName) > 0)
      {
         echo('<input type=hidden name=LoginName value="' . $LoginName . '">');
         return($LoginName);
      }
      // look up the
      $MySql= DBOpen();
      $query = "select Function from passwords where LoginName = '" . $_POST['username'] . "' and Password = 'MD5(" . $_POST['password'] . ")';";
      $result = mysql_query($query);
      if (!($row = mysql_fetch_array($result)) || (strcmp($row['Function'],"Administration")))
         die('Illegal username/password<P><A HREF="index.html>Click here to enter password.</a>');
      $LoginName = $_POST['username'];
      echo('<input type=hidden name=LoginName value="' . $LoginName . '">');
      return($LoginName);
   }

  function PasswordSet($LoginName)
  {
    echo('<input type=hidden name=LoginName value="' . $LoginName . '">');
  }

?>
