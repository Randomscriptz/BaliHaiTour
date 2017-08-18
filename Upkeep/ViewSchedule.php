<!-- View list of planned and scheduled cruises -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Upkeep/ViewSchedule.php -->
<!--  http://www.balihitours.com/Upkeep/ViewSchedule.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=UTF-8">

   <title>Bali Hai Tours: Website & Schedule Maintenance: View & Delete</title>

   <title>Javascript Calendar Example by Lea Smart</title>
   <link rel="STYLESHEET" type="text/css" href="../css/calendar.css">
   <script language="JavaScript" src="../js/simplecalendar.js" type="text/javascript"></script>
    <link  rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link type="text/javascript" href="bootstrap.min.js" >
    <link rel='stylesheet' id='theme-addons-css'  href='https://balihaitours.com/wp-content/themes/adventure-tours/assets/csslib/theme-addons.min.css?ver=2.2.7' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-font-google-fonts-css'  href='//fonts.googleapis.com/css?family=Raleway%3A400normal%2C500normal%7CKaushan+Script%3A400normal&#038;ver=4.7.3' type='text/css' media='all' />
    <link rel='stylesheet' id='icons-font-03995f7f138b2412ddc3a38958d28840-css'  href='https://balihaitours.com/wp-content/themes/adventure-tours/assets/csslib/adventure-tours-icons.css?ver=4.7.3' type='text/css' media='all' />
    <link rel="icon" href="https://balihaitours.com/wp-content/uploads/2016/11/cropped-logo-png-high-res-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://balihaitours.com/wp-content/uploads/2016/11/cropped-logo-png-high-res-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="https://balihaitours.com/wp-content/uploads/2016/11/cropped-logo-png-high-res-180x180.png" />
    <meta name="msapplication-TileImage" content="https://balihaitours.com/wp-content/uploads/2016/11/cropped-logo-png-high-res-270x270.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
    <link rel="stylesheet" href="https://rawgit.com/MEYVN-digital/mdl-selectfield/master/mdl-selectfield.min.css">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script defer src="https://rawgit.com/MEYVN-digital/mdl-selectfield/master/mdl-selectfield.min.js"></script>


    <script type="javascript" >
        window.onload = function() {
            materializeControls();
        }
        function materializeControls() {
            //   materializeTextInputs();
            //  materializeSelects();
            //  materializeRadioButtons();
            //  materializeCheckboxes();
            materializeTables();
            materializeLists();
            // materializeButtons();
        }
        function materializeTables() {
            document.querySelectorAll('table').forEach(function(table) {
                table.classList.add('mdl-data-table', 'mdl-js-data-table');
                table.querySelectorAll('th,td').forEach(function(cell) {
                    cell.classList.add('mdl-data-table__cell--non-numeric');
                });
            });
        }

        function materializeLists() {
            document.querySelectorAll('ul').forEach(function(ulEl) {
                ulEl.classList.add('mdl-list');
                ulEl.querySelectorAll('li').forEach(function(liEl) {
                    liEl.classList.add('mdl-list__item');
                    liEl.innerHTML = "<span class='mdl-list__item-primary-content'>" +
                        "<i class='material-icons mdl-list__item-icon'>home</i>" +
                        liEl.innerText + "</span>";
                });
            });
        }

    </script>
</head>

<body bgcolor="#FFFFFF" lang=EN-US text="#000000" link="#007799" vlink="#00AA00">

<style>
    .navbar-light .navbar-brand, .navbar-light .navbar-toggler {
        olor: #f8dab4 !important;
    }
    .navbar-light .navbar-nav .nav-link {
        color: #f8dab4 !important;
    }
    .bg-faded{

        background: #1d6976 !important;
    }
    .container {
        margin-top: 100px;
    }
    .footer {
        background: #1d6976;
        color: #f8dab4;
    }
    .footer .widget__title {
        font-size: 1.200em;
        color: #fff;
        opacity: 0.9;
    }
    .footer .widget .textwidget {
        text-align: left;
    }
    .widget-contact-info__item {
        display: table;
        width: 100%;
        margin-bottom: 10px;
        vertical-align: middle;
    }
    .widget-contact-info__item__text {
        display: table-cell;
        padding-left: 10px;
    }
    .widget-contact-info__item__icon i {
        width: 1.688em;
        height: 1.688em;
        line-height: 1.688em;
        border-radius: 100%;
        background: #f8dab4;
        color: #1d6976;
        font-size: 1.071em;
        text-align: center;
    }
    .footer .widget a {
        color: #fff;
        border-bottom: 1px dashed transparent;
        opacity: 0.9;
    }
    .footer__bottom {
        padding: 10px 0;
        position: relative;
        font-size: 0.867em;
    }
    .footer__arrow-top {
        width: 50px;
        height: 50px;
        line-height: 45px;
        background: #1d6976;
        position: absolute;
        top: -25px;
        left: 50%;
        -moz-transform: translate(-50%,0);
        -ms-transform: translate(-50%,0);
        -webkit-transform: translate(-50%,0);
        -o-transform: translate(-50%,0);
        transform: translate(-50%,0);
        text-align: center;
        border-radius: 100%;
    }
    .containerx {
        margin: 0 auto !important;
        width: 60%;
        padding-top: 10px;
    }
    header.main {
        background: #1d6976 !important;
        width: 100%;
        position: relative;
        display: block;
    }

    .header__info__item {
        display: inline-block;
        margin: 5px 0;
        padding-left: 1px;
        font-size: 1em;
        line-height: 35px;
    }
    .header__info__item.header__info__item--phone.header__info__item--delimiter {
        display: inline-block;
        margin: 5px 0;
        padding-left: 1px;
        font-size: 2em;
        line-height: 35px;
    }
    .header__info__item.header__info__item--phone.header__info__item--delimiter:hover {
        color: #2196F3;
    }
    .header__info__items-left {
        width: 50%;
        display: inline-block;
    }
    .header__info__items-right {
        float: right;
        display: inline-block;
        /* width: 50%; */
        /* font-size: 1em; */
    }
    .fa {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        font-size: 27px;
        margin: 0 9px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    #navbarNavAltMarkup > div {
        float: right;
        position: relative;
    }
    div#navbarNavAltMarkup {
        float: right;
        display: block !important;
        position: relative;
    }
    .navbar-light .navbar-nav .nav-link {
        color: #f8dab4 !important;
        font-weight: 500;
        font-style: normal;
        font-family: Raleway;
        font-size: 1em;
        width: auto;
        margin: 0 10px;
    }
    img.d-inline-block.align-top {
        width: 175px;
        height: auto;
        position: absolute;
    }
    a.navbar-brand {
        height: 75px;
    }
    .margin-bottom {
        margin-bottom: 40px;
    }
    .margin-top {
        margin-top: 40px;
    }
    td{
        padding: 0;

    }
    .containerxx{
        margin: 96px auto;
        width: 95%;
    }
    .toolbar-section {
        width: 100%;
        margin-top: 50px;
    }
    .info-section {
        margin: 15px 0;
    }
    .info-section > * {
        display: inline-block;
        vertical-align: top;
    }
    .info-section table {
        margin-right: 200px;
    }
    .info-section ul li {
        padding: 0;
    }
    tr:hover {
        background-color: #EEEEEE;
        padding:56px;
    }
    input.mdl-button.mdl-js-button.mdl-button--raised {
        margin-right: 1%;
        background: rgba(158, 158, 158, 0.77) !important;
    }
    .mdl-shadow--2dp {

        width: 100%;
    }
</style>
<header class="main">
    <div class="containerx">
        <div class="topmain">
            <div class="header__info">
                <div class="header__info__items-left"><div class="header__info__item header__info__item--phone header__info__item--delimiter"><i class="fa fa-phone"></i>808-634-2317</div></div>

                <div class="header__info__items-right">
                    <div class="header__info__item header__info__item--delimiter header__info__item--social-icons"><a href="https://www.facebook.com/Bali-Hai-Tours-371400862876724/"><i class="fa fa-facebook"></i></a><a href="https://www.instagram.com/balihaitours/"><i class="fa fa-instagram"></i></a><a href="https://www.yelp.com/biz/bali-hai-tours-anahola"><i class="fa fa-yelp"></i></a><a href="https://www.tripadvisor.com/Attraction_Review-g60609-d2390643-Reviews-Bali_Hai_Boat_Tours-Anahola_Kauai_Hawaii.html"><i class="fa fa-tripadvisor"></i></a></div>					</div>
            </div>

        </div>
        <nav class="navbar  navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="https://balihaitours.com/wp-content/uploads/2017/03/Bali-Hai-Logo-PNG-low-res-1000x.png" width="50" height="50" class="d-inline-block align-top" alt="Bali Hai Tours ">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="https://balihaitours.com/">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="https://balihaitours.com/tours/">Tours</a>
                    <a class="nav-item nav-link" href="https://balihaitours.com/about-us/">About Us</a>
                    <a class="nav-item nav-link disabled" href="https://balihaitours.com/faqs/">FAQ</a>
                    <a class="nav-item nav-link" href="https://balihaitours.com/gallery/">Gallery</a>
                    <a class="nav-item nav-link" href="https://balihaitours.com/blog//">Blog</a>
                    <a class="nav-item nav-link " href="https://balihaitours.com/contact-us/">Contact Us</a>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="containerxx">
<form name="frm" action="ViewSchedule.php" method="post">
<h3>Cruise Schedule:</h3>
<?php

   require("../php/routines.php");
   PasswordCheck("Administration");

   // take care of any deletes
   if (!empty($_POST["DeleteChecked"]))
   {
      $deletes = $_POST['Delete'];
   //echo ' deletes = ' . $deletes;
      if (count($deletes))
      {
         $MySql = DBOpen();
         for ($a = 0; $a < count($deletes); $a++ )
         {
            $query = "DELETE FROM schedule WHERE SchedTripTime='" . $deletes[$a] . "';";
            mysql_query($query) or die('Delete error: ' . mysql_error());
         }
         mysql_close($MySql);
      }
   }

   // delete olds
   if (!empty($_POST["DeleteOld"]))
   {
      $MySql = DBOpen();
      $query = "DELETE FROM schedule WHERE SchedTripTime <= NOW();";
      mysql_query($query) or die('Delete error: ' . mysql_error());
      mysql_close($MySql);
   }

   $DepartDate = $_POST["DepartDate"];
   $DepartTime = $_POST["DepartTime"];
   $MySql = DBOpen();
   if (!empty($_POST["Add"]))
   {
      $DepartLoc = $_POST["DepartLoc"];
      $Descript = $_POST["Descript"];
      $NumSeats = $_POST["NumSeats"];
      $AdultCost = $_POST["AdultCost"];
      $ChildCost = $_POST["ChildCost"];
      $AdultWebDisc = $_POST["AdultWebDisc"];
      $ChildWebDisc = $_POST["ChildWebDisc"];
      $AdultExDisc = $_POST["AdultExDisc"];
      $ChildExDisc = $_POST["ChildExDisc"];
      $AdultPremierCost = $_POST["AdultPremierCost"];
      $ChildPremierCost = $_POST["ChildPremierCost"];
      $AdultMarinaFee = $_POST["AdultMarinaFee"];
      $ChildMarinaFee = $_POST["ChildMarinaFee"];

      $sql = "INSERT INTO schedule (SchedRecTime,SchedTripTime,SchedDepartLoc,SchedDescript,SchedNumSeats,SchedAdultCost,SchedChildCost,SchedAdultWebDisc,SchedChildWebDisc,SchedAdultExDisc,SchedChildExDisc,SchedAdultPremierCost,SchedChildPremierCost,SchedAdultMarinaFee,SchedChildMarinaFee)
               VALUES (NOW(),'" . $DepartDate . " " . $DepartTime . "','" . $DepartLoc . "','" . $Descript . "'," . $NumSeats . "," . $AdultCost . "," . $ChildCost . "," . $AdultWebDisc . "," . $ChildWebDisc . "," . $AdultExDisc  . "," . $ChildExDisc . "," . $AdultPremierCost . "," . $ChildPremierCost . "," . $AdultMarinaFee . "," . $ChildMarinaFee . ");";
   //echo "insert = " . $sql . ' ';
      if (!mysql_query($sql,$MySql)) die('Database insert error: ' . mysql_error());
  } else
  {
      $sql = "SELECT * FROM cost";
      $result = mysql_query($sql) or die('Default read error: ' . mysql_error());
      $row = mysql_fetch_array($result);
      $DepartTime = $row["CostDepartTime"];
      $DepartLoc = $row["CostDepartLoc"];
      $Descript = $row["CostDescript"];
      $NumSeats = $row["CostNumSeats"];
      $AdultCost = $row["CostAdultCost"];
      $ChildCost = $row["CostChildCost"];
      $AdultWebDisc = $row["CostAdultWebDisc"];
      $ChildWebDisc = $row["CostChildWebDisc"];
      $AdultExDisc = $row["CostAdultExDisc"];
      $ChildExDisc = $row["CostChildExDisc"];
      $AdultPremierCost = $row["CostAdultPremierCost"];
      $ChildPremierCost = $row["CostChildPremierCost"];
      $AdultMarinaFee = $row["CostAdultMarinaFee"];
      $ChildMarinaFee = $row["CostChildMarinaFee"];
   }
   mysql_close($MySql);

?>
<p>A portion of each of the following records shows for the customer to select from available cruises. Be sure these accurately reflect the actual cruises planned.
Click to delete record:
    </p>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
            <thead>
    <tr><th></th>
    <th class="mdl-data-table__cell--non-numeric">Departure<br>Time</th>
    <th align="center">Entry<br>Time</th>
    <th align="center">Departure<br>Location</th>
    <th align="center">Max<br>Passengers</th>
    <th align="center">Brief<br>Description</th>
    <th align="center">Adult<br>Web<br>Discount</th>
    <th align="center">Child<br>Web<br>Discount</th>
    <th align="center">Adult<br>Military<br>Discount</th>
    <th align="center">Child<br>Military<br>Discount</th>
    <th align="center">Adult<br>Marina<br>Fee</th>
    <th align="center">Child<br>Marina<br>Fee</th>
    <th align="center">Adult<br>Cost</th>
    <th align="center">Child<br>Cost</th>
    <th align="center">Adult<br>Premier<br>Cost</th>
    <th align="center">Child<br>Premier<br>Cost</th>
    </tr>
            </thead>
            <tbody>

<?php

  $query = "SELECT * from schedule WHERE SchedTripTime >= NOW() ORDER BY SchedTripTime;";
  $MySql = DBOpen();
  $result = mysql_query($query,$MySql);

while($row = mysql_fetch_array($result))
{
    echo '<tr height="20">';
    echo '<td class="mdl-data-table__cell--non-numeric"><input type="checkbox" name="Delete[]" value="' . $row['SchedTripTime'] . '"></td>';
    $date = DBGetDate($row['SchedTripTime']);
    $time = DBGetTime($row['SchedTripTime']);
    echo '<td >' . $date . ' ' . $time . '</td>';
    $date = DBGetDate($row['SchedRecTime']);
    $time = DBGetTime($row['SchedRecTime']);
    echo '<td align="center">' . $date . ' ' . $time . '</td>';
    echo '<td align="center">' . $row['SchedDepartLoc'] . '</td>';
    echo '<td align="center">' . $row['SchedNumSeats'] . '</td>';
    echo '<td align="center">' . $row['SchedDescript'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultWebDisc'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildWebDisc'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultExDisc'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildExDisc'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultMarinaFee'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildMarinaFee'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultCost'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildCost'] . '</td>';
    echo '<td align="center">$' . $row['SchedAdultPremierCost'] . '</td>';
    echo '<td align="center">$' . $row['SchedChildPremierCost'] . '</td>';
    echo '</tr>';
}
echo '</tbody></table>';
mysql_close($MySql);
?>

 <input type="submit" name=DeleteChecked value="Delete checked records"
     onclick='javascript: document.forms.frm.action="ViewSchedule.php";' />

    <p>Once in a while, to keep the database managable, you should</p>
<input type="submit" name=DeleteOld value="Delete old records"
     onclick='javascript: document.forms.frm.action="ViewSchedule.php";' />


   <table border="0" cellspacing="0" cellpadding="2" >
      <tr>
      <td align="right">Depart Date:</td>
      <td><a href="javascript: void(0);" onmouseover="if (timeoutId) clearTimeout(timeoutId);window.status='Show Calendar';return true;" onmouseout="if (timeoutDelay) calendarTimeout();window.status='';" onclick="g_Calendar.show(event,'frm.DepartDate', false, 'yyyy-mm-dd', new Date()); return false;"><img src="../Pics/SMcalendar.gif" name="imgCalendar" width="34" height="21" border="0" alt=""></a>
      <input type="text" name="DepartDate" size="12" value="<?php echo $DepartDate;?>" /></td>
      </tr><tr>
      <td align="right">Check In Time:</td>
      <td align="left"><input type="text" name="DepartTime" size="6" value="<?php echo $DepartTime; ?>" /> </td>
      </tr><tr>
      <td align="right">Brief Description:</td>
      <td align="left"><input type="text" name="Descript" size="64" value="<?php echo $Descript; ?>" /> </td>
      </tr><tr>
      <td align="right">Departure Location:</td>
      <td align="left"><input type="text" name="DepartLoc" size="32" value="<?php echo $DepartLoc; ?>" /> </td>
      </tr><tr>
      <td align="right">Number of Seats:</td>
      <td align="left"><input type="text" name="NumSeats" size="2" value="<?php echo $NumSeats; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Web Discount:</td>
      <td align="left">$<input type="text" name="AdultWebDisc" size=3 value="<?php echo $AdultWebDisc; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Web Discount:</td>
      <td align="left">$<input type="text" name="ChildWebDisc" size=3 value="<?php echo $ChildWebDisc; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Military/Responder Discount:</td>
      <td align="left">$<input type="text" name="AdultExDisc" size=3 value="<?php echo $AdultExDisc; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Military/Responder Discount:</td>
      <td align="left">$<input type="text" name="ChildExDisc" size=3 value="<?php echo $ChildExDisc; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Marina Fee:</td>
      <td align="left">$<input type="text" name="AdultMarinaFee" size=3 value="<?php echo $AdultMarinaFee; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Marina Fee:</td>
      <td align="left">$<input type="text" name="ChildMarinaFee" size=3 value="<?php echo $ChildMarinaFee; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Cost:</td>
      <td align="left">$<input type="text" name="AdultCost" size=3 value="<?php echo $AdultCost; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Cost:</td>
      <td align="left">$<input type="text" name="ChildCost" size=3 value="<?php echo $ChildCost; ?>" /> </td>
      </tr><tr>
      <td align="right">Adult Premier Cost:</td>
      <td align="left">$<input type="text" name="AdultPremierCost" size=3 value="<?php echo $AdultPremierCost; ?>" /> </td>
      </tr><tr>
      <td align="right">Child Premier Cost:</td>
      <td align="left">$<input type="text" name="ChildPremierCost" size=3 value="<?php echo $ChildPremierCost; ?>" /> </td>
      </tr>
   </table>

<p>  <input type="submit" name=Add value="Add data"
            onclick='javascript: document.forms.frm.action="ViewSchedule.php";' /> </p>

 <?php Finish(); ?>

</form>
</div>
</body>
</HTML>
