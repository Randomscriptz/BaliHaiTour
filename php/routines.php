<?php
//echo(" do include ");
// routines that may be used multiple times
// these are flag defines
define("Flag_SafetySeat",1);
define("Flag_ExtraDisc",2);
define("Flag_WebDisc",4);

// $db['db_host'] = "localhost";
// $db['db_user'] = "balihait_main";
// $db['db_pass'] = "Kg447OleHyeeEQt9tv2K";
// $db['db_name'] = "balihait_main";

// foreach($db as $key => $value){
//     define(strtoupper($key), $value);
// }

// $MySql = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);


// database routines
function DBOpen()
{
    // global $MySql;
    // //echo(" db do connect ");
    // //$MySql = mysqli_connect("localhost","balihait_main","Kg447OleHyeeEQt9tv2K","balihait_main");
    // $MySql = mysql_connect("localhost","balihait_main","Kg447OleHyeeEQt9tv2K");
    // //echo(" db connected ");
    // if (!$MySql) die('Database connect error: ' . mysql_error());
    // mysqli_select_db("balihait_main",$MySql);
    // //echo(" db selected ");
    // return ($MySql);




    //$MySql = mysql_connect( 'localhost', 'balihait_main', 'Kg447OleHyeeEQt9tv2K') or die('Could not connect to server.' );

    $MySql = mysql_connect( 'localhost', 'balihait_main', 'Kg447OleHyeeEQt9tv2K');
    if (!$MySql) {
            var_dump('Connected NO successfully');
        die('Could not connect: ' . mysql_error());
    }


    mysql_select_db('balihait_main', $MySql) or die('Could not select database.');
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
/**
 * @param $expFunction
 * @return mixed
 */
function PasswordCheck($expFunction)
{
    global $LoginName;
    global $PassRow;
    global $MySql;
    $LoginName = $_POST['LoginName'];
//echo('login name = ' . $LoginName . "password = " . MD5($_POST['password']));
    // look up the
    $MySql = DBOpen();
    $query = "select * from passwords where PassLoginName='" . $LoginName . "';";
//echo('query = ' . $query);
    $result = mysql_query($query, $MySql);
    if (!($PassRow = mysql_fetch_array($result))) {
        die('Illegal username/password');
        mysql_close($MySql);
    }    
//echo (" passwords = '" . $_POST['password'] . "' '" . $PassRow['PassPassword'] . "' ");
    if (!empty($_POST['password']))
    {
//echo (" passwords = '" . $_POST['password'] . "' '" . $PassRow['PassPassword'] . "' ");
        if (strcmp($LoginName,"WEBAccess"))
        {
            if (strcmp(MD5($_POST['password']),$PassRow['PassPassword']))
                die('Illegal password/username');
        }
    }
    if (!empty($expFunction))
    {
        if (strcmp($PassRow['PassFunction'],$expFunction))
            die('Permission denied');
    }
    echo('<input type=hidden name=LoginName value="' . $LoginName . '">');
    return($LoginName);
}

function PasswordSet($LoginName)
{
    $LoginName = $_POST['LoginName'];
    echo('<input type=hidden name=LoginName value="' . $LoginName . '">');
}

function PasswordCreate($length=8)
{
    $seed = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for($x=1;$x<=$length;$x++)
    {
        $password .= $seed{rand(0,61)};
    }
    return($password);
}

function emailPassword($to,$password)
{
    $message = "The initial password for your http://www.balihaitours.com/Desk account is " . $password . "\n\nFor assistance, contact codezeraven@gmail.com.\n";
    if (!mail($to,"Password for balihaitours.com",$message,"From: codezeraven@gmail.com\n"))
        die("Password email failed");
}

function SchedRead($triptime)
{
    global $SchedRow;
    //global $MySql;

    $MySql = DBOpen();

    $query = "SELECT * FROM schedule WHERE SchedTripTime = '" . $triptime . "';";
    $result = mysql_query($query, $MySql);
    if (!($SchedRow = mysql_fetch_array($result)))
        die("Bad TripTime '" . $triptime . "''" . $_POST['TripTime'] . "' ");
}

function BookCountSeats($triptime)
{
    global $MySql;
    $MySql = DBOpen();
    $query = "SELECT BookAdultQty, BookChildQty FROM bookings WHERE BookTripTime = '" . $triptime . "';";
    $result = mysql_query($query, $MySql);
    $countTotal = 0;
    while($countRow = mysql_fetch_array($countResult))
    {
        $countTotal += ($countRow['BookAdultQty'] + $countRow['BookChildQty']);
    }
    return($countTotal);
}

function ListTours($EndTime)
{
    global $MySql;
    $MySql = DBOpen();
    echo (' <table border="1" cellspacing="0" cellpadding="2" width="80%" class="mdl-data-table mdl-js-data-table">
 <thead>
      <tr> <th></th>
      <th class="mdl-data-table__cell--non-numeric">Check in Time:</th>
      <th class="mdl-data-table__cell--non-numeric">Brief Description:</th>
      <th class="mdl-data-table__cell--non-numeric">Departure Location:</th>
      <th class="mdl-data-table__cell--non-numeric">Seats Available:</th>
      <th class="mdl-data-table__cell--non-numeric">Adult Price:</th>
      <th class="mdl-data-table__cell--non-numeric">Child Price:</th>
      </tr>
      </thead>
      <tbody>
      ');
    $query = "SELECT * from schedule WHERE SchedTripTime > NOW() AND SchedTripTime < FROM_UNIXTIME(" . $EndTime . ") ORDER BY SchedTripTime;";
    //echo(" query = $query ");
    $result = mysql_query($query, $MySql);

    while($row = mysql_fetch_array($result))
    {
        echo '<tr>';
        echo '<td  class="mdl-data-table__cell--non-numeric"><input type="radio" name="TripTime" value="' . $row['SchedTripTime'] . '" /></td>';
        $date = DBGetDate($row['SchedTripTime']);
        $time = DBGetTime($row['SchedTripTime']);
        echo '<td  class="mdl-data-table__cell--non-numeric">' . $date . ' ' . $time . '</td>';
        echo '<td  class="mdl-data-table__cell--non-numeric">' . $row['SchedDescript'] . '</td>';
        echo '<td  class="mdl-data-table__cell--non-numeric">' . $row['SchedDepartLoc'] . '</td>';
        // figure out how many seats are available
        $countQuery = "SELECT BookAdultQty, BookChildQty FROM bookings WHERE BookTripTime='" . $row['SchedTripTime'] . "';";
        $countResult = mysql_query($countQuery, $MySql);
        $countTotal =  $row['SchedNumSeats'];
        while($countRow = mysql_fetch_array($countResult))
        {
            $countTotal -= ($countRow['BookAdultQty'] + $countRow['BookChildQty']);
        }
        if ($countTotal <= 0) echo '<td align="center" style="color:red">';
        else echo '<td align="center" style="color:green">';
        echo $countTotal . '</td>';
        echo '<td align="center">$' . $row['SchedAdultCost'] . '</td>';
        echo '<td align="center">$' . $row['SchedChildCost'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}

function StartTour()
{
    echo '
      <table width=100% bgcolor=#FFFFFF CELLSPACING=0 CELLPADDING=5  class="formx" >
         <tr><td>
         <tr><td width=85% align=left valign=top>
         <B><I>Tell us about your party</i>
         <br>
         <table width=81% bgcolor=#A8DCAD border=2>
            <tr><td>
            <table>
               <tr><td width=3%></td>
               <td width=70%><i><span>We\'ll need to know a family or group name to log your request and the number of adults and children in your party.</span></i></td>
            </tr>
         </table>
           </td>
         </tr></table>
         <P>
         <table width=100% bgcolor=#FFFFFF border=0>
            <tr><td width=55% valign=top>
            <table cellspacing=20  border=0>
               <tr><td class="">
             Family or Group name:
               <input type=text size=25 name=GroupName />
               </td>
               <td align=center >
               Adults:
               <select name=AdultQty>
               <option value=1 selected>1</option>
               <option value=2>2</option>
               <option value=3>3</option>
               <option value=4>4</option>
               <option value=5>5</option>
               <option value=6>6</option>
               </select></td>

               <td align=center >
               Children:
               <select name=ChildQty>
               <option value=0 selected>0</option>
               <option value=1>1</option>
               <option value=2>2</option>
               <option value=3>3</option>
               <option value=4>4</option>
               <option value=5>5</option>
               </select></td>
            </tr></table>
            <table cellspacing=20  border=0>
               <tr><td valign=top>
               Cell phone:
               <input type=text name=CellPhone size=13 />
               <br>(include area code):</td>
               <td align=center valign=top>
               Local phone:
               <input type=text name=LocalPhone size=13 /> </td>
            </tr></table></td>
            <td  valign=middle width=45%>
            <table  border=0>
               <td valign=top>
               <input type=checkbox name=SafetySeat value=Yes></td>
               <td>
               I need an infant safety seat.</td></tr>
               <tr height=30><td></td>
               <tr><td valign=top>
               <input type=checkbox name=ExtraDisc value=Yes></td>
               <td>
               I am in the military or a 1st responder.
               <br>I will bring my professional ID.</td>
            </tr></table></td></tr>
            <tr><td></td><td valign=top>
            Wyndham Premier Number:
            <input type=text size=5 name=PremierNumber />Expires: <select name="PriemExpMonth" id="PriemExpMonth">
               <option  value="">Month</option>
               <option  value="01">01 January</option>
               <option  value="02">02 February</option>
               <option  value="03">03 March</option>
               <option  value="04">04 April</option>
               <option  value="05">05 May</option>
               <option  value="06">06 June</option>
               <option  value="07">07 July</option>
               <option  value="08">08 August</option>
               <option  value="09">09 September</option>
               <option  value="10">10 October</option>
               <option  value="11">11 November</option>
               <option  value="12">12 December</option>
               </select>&nbsp;&nbsp;<select name="PreimExpYear" id="PreimExpYear">
               <option  value="">Year</option>
               <option  value="2012">2012</option>
               <option  value="2013">2013</option>
               <option  value="2014">2014</option>
               <option  value="2015">2015</option>
               <option  value="2016">2016</option>
               <option  value="2017">2017</option>
               <option  value="2018">2018</option>
               <option  value="2019">2019</option>
               <option  value="2020">2020</option>
               <option  value="2021">2021</option>
               <option  value="2022">2022</option>
               <option  value="2023">2023</option>
               <option  value="2024">2024</option>
               <option  value="2025">2025</option>
               <option  value="2026">2026</option>
               <option  value="2027">2027</option>
               <option  value="2028">2028</option>
               <option  value="2029">2029</option>
               </select>
            </td></tr>
         </table>
      </table>';
}

function ShowCosts($SchedRow,$PassRow,$AdultQty,$ChildQty,$Flags)
{
    //printf("costs %s %s ",$SchedRow['SchedAdultCost'],$SchedRow['SchedChildCost']);
    global $Commision;
    global $Due;
    $MilDiscount = 0;
    $WebDiscount = 0;
    $PremierNumber = $_POST['PremierNumber'];
    if (strlen($PremierNumber) == 5)  // premier
    {
        $TotalCost = ($SchedRow['SchedAdultPremierCost'] * $AdultQty) + ($SchedRow['SchedChildPremierCost'] * $ChildQty);
        $Commision = 0;
    } else
    {
        $TotalCost = ($SchedRow['SchedAdultCost'] * $AdultQty) + ($SchedRow['SchedChildCost'] * $ChildQty);
        $Commision = ($PassRow['PassCommision'] * .01) * $TotalCost;
        if (!$Commision)
        {
            if ($Flags & Flag_WebDisc)
            {
                $WebDiscount += ($AdultQty * $SchedRow['SchedAdultWebDisc']) + ($ChildQty * $SchedRow['SchedChildWebDisc']);
            }
            if ($Flags & Flag_ExtraDisc)
            {
                $MilDiscount += ($AdultQty * $SchedRow['SchedAdultExDisc']) + ($ChildQty * $SchedRow['SchedChildExDisc']);
            }
        }
    }
    $PassCost = $TotalCost;
    $MarinaFee = ($AdultQty * $SchedRow['SchedAdultMarinaFee']) + ($ChildQty * $SchedRow['SchedChildMarinaFee']);
    $TotalCost += $MarinaFee;
    $TotalCost -= ($MilDiscount + $WebDiscount);
    $Tax = $TotalCost * .04;
    $TotalCost += $Tax;
    $Due = $TotalCost - $Commision;

    echo ('
      <table cellspacing=3>
      ');
    printf("<tr><td>Your total cost</td>
      <td align=right><i><b>For passengers: </td>
      <td align=right>$%7.2f</td></tr> ",$PassCost);
    if ($MilDiscount)
    {
        printf("<tr><td></td>
         <td align=right><i><b>Military/responder discount:</td>
         <td align=right>-$%7.2f</td></tr> ",$MilDiscount);
    }
    if ($WebDiscount)
    {
        printf("<tr><td></td>
         <td align=right><i><b>Web discount:</td>
         <td align=right>-$%7.2f</td></tr> ",$WebDiscount);
    }
    if ($MarinaFee)
    {
        printf("<tr><td></td>
         <td align=right><i><b>Marina fee:</td>
         <td align=right>$%7.2f</td></tr> ",$MarinaFee);
    }
    printf("<tr><td></td>
      <td align=right><i><b>Tax:</td>
      <td align=right>$%7.2f</td></tr> ",$Tax);
    if ($Commision)
    {
        printf("<tr><td></td>
         <td align=right><i><b>Deposit:</td>
         <td align=right>$%7.2f</td></tr> ",$Commision);
    }
    printf("<tr><td></td>
      <td align=right><i><b>Due at trip:</td>
      <td align=right>$%7.2f</td></tr> ",$Due);
    echo("</table> ");
    echo('<INPUT TYPE=HIDDEN NAME=Price VALUE="' . $Due . '">
      ');
    echo('<INPUT TYPE=HIDDEN NAME=Deposit VALUE="' . $Commision . '">
      ');
    return($Due);
}

function Finish()
{
    mysql_close($MySql);
    echo '
      </form><form name="doneForm" target="_parent" method="post">
      ';
    echo('<input type=hidden name=LoginName value="' . $_POST['LoginName'] . '">');
    echo '
      <input type=submit name=Selected value="Go to Defaults"
         onclick=\'javascript: document.forms.doneForm.action="Costs.php";\' class="mdl-button mdl-js-button mdl-button--raised " />

      <input type=submit name=Selected value="Go to Scheduler"
         onclick=\'javascript: document.forms.doneForm.action="ViewSchedule.php";\' class="mdl-button mdl-js-button mdl-button--raised " />

      <input type="submit" name=View value="Go to Bookings"
         onclick=\'javascript: document.forms.doneForm.action="WhichCruise.php";\' class="mdl-button mdl-js-button mdl-button--raised " />

      <input type="submit" name=View value="Go to Who Booked report"
         onclick=\'javascript: document.forms.doneForm.action="WhoBooked.php";\' class="mdl-button mdl-js-button mdl-button--raised" />

      <input type="submit" name=View value="Go to Billing report"
         onclick=\'javascript: document.forms.doneForm.action="BillingInfo.php";\' class="mdl-button mdl-js-button mdl-button--raised " />

      <input type="submit" name=View value="Go to User Setup"
         onclick=\'javascript: document.forms.doneForm.action="Passwords.php";\'  class="mdl-button mdl-js-button mdl-button--raised "/>
      ';
}


?>
