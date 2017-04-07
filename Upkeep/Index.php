<?php
// ini_set('include_path', '../php/routines.php');
require('./config.php');
/**
 * Created by PhpStorm.
 * User: Dj
 * Date: 4/6/2017
 * Time: 5:26 PM
 */

echo <<<_END

<html>
<head>
<title>Bali Hai Website & Schedule Maintenance: Log in</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" type="text/css" href="/Upkeep/UpkeepLogin.css">
  
</head>
<style type="text/css">
</style>

<body lang=EN-US >

<div id="login">
    <h1><a href="https://balihaitours.com" title="Bali Hai Tours" tabindex="-1">Bali Hai Tours</a></h1>

    <form name="frm" id="loginform" action="https://balihaitours.com/wp-login.php" method="post">
        <input type="hidden" name="mode" value="logIn"/>
        <p>
            <label for="username" class="username">Username or Email Address<br>
                <input type="text" class="input" name="LoginName" id="username"  value="" size="20" placeholder="Username or Email Address"></label>
        </p>
        <p>
            <label for="username" >Password<br>
                <input type="password" class="input" name="password" id="password" value="" size="20" placeholder="Password"></label>
        </p>

        <div class="mainForm">
            <font size="2">
                <input type="submit" name="DefaultSettings" value="Default"
                       onclick='document.forms.frm.action="Costs.php";' />
                <input type="submit" name="Scheduler" value="Scheduler"
                       onclick='document.forms.frm.action="ViewSchedule.php";' />
                <input type="submit" name="Bookings" value="Bookings"
                       onclick='document.forms.frm.action="WhichCruise.php";' />
                <input type="submit" name="Billing" value="Billing"
                       onclick='document.forms.frm.action="BillingInfo.php";' />
                <input type="submit" name="WhoBooked" value="Who Booked"
                       onclick='document.forms.frm.action="WhoBooked.php";' />
                <input type="submit" name="WhoBooked" value="User Setup"
                       onclick='document.forms.frm.action="Passwords.php";' />


        </div>
    </form>


    <script type="text/javascript">
        function wp_attempt_focus(){
            setTimeout( function(){ try{
                d = document.getElementById('user_login');
                d.focus();
                d.select();
            } catch(e){}
            }, 200);
        }

        wp_attempt_focus();
        if(typeof wpOnload=='function')wpOnload();
    </script>

    <p id="backtoblog"><a href="https://balihaitours.com/">← Back to Bali Hai Tours</a></p>

</div>

</body>
</html>

_END;





?>