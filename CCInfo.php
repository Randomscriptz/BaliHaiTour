<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Reserve/CreditCardInfo/CCInfo.html -->
<!--  http://www.balihitours.com/Reserve/CreditCardInfo/CCInfo.html -->
<html>

<head>
<meta name="resource-type" content="document" />
<meta name="description" content="Offering boat tours off the Kauai coast" />
<meta name="rating" content="General" />
<meta name="author" content="ZRaven" />
<meta http-equiv=Content-Type content="text/html; charset=us-ascii">

   <title>Bali Hai Tours: Reserve Seats/ Credit Card info</title>

<script language="JavaScript" src="js/routines.js" type="text/javascript"></script>
    <link  rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link type="text/javascript" href="bootstrap.min.js" >
    <script type="text/javascript" language="JavaScript" >
<!--
function CheckForm(form)
{
  // ** START **
  if (form.BIName.value.length < 4)
  {
    alert( "The Billing Name is too short" );
    form.BIName.focus();
    return false ;
  }
  if (form.BIAddr1.value.length < 4)
  {
    alert( "The Billing Address 1 is too short" );
    form.BIAddr1.focus();
    return false ;
  }
  if (form.BICity.value.length < 2)
  {
    alert( "The Billing City is too short" );
    form.BICity.focus();
    return false ;
  }
  if (form.BINotUSState.value.length > 0)
  {
    if (form.BIState.selectedIndex > 0)
    {
      alert("Cannot have a US/Canada and a Foriegn State");
      form.BIState.focus();
      return (false);
    }
    if (form.BINotUSCountry.value.length < 4)
    {
      alert("Foriegn Country is too short");
      form.BINotUSCountry.focus();
      return (false);
    }
    if (form.BINotUSZip.value.length < 4)
    {
      alert("Foriegn Zip Code is too short");
      form.BINotUSZip.focus();
      return (false);
    }
    if (form.BIZip.value.length > 0)
    {
      alert("US/Canada Zip Code is set");
      form.BIZip.focus();
      return (false);
    }
  }
  else
  {
    if (form.BIZip.value.length < 4)
    {
      alert("US/Canada Zip Code is too short");
      form.BIZip.focus();
      return (false);
    }
    if (form.BINotUSCountry.value.length > 0)
    {
      alert("Foriegn Country is set");
      form.BINotUSCountry.focus();
      return (false);
    }
    if (form.BINotUSZip.value.length > 0)
    {
      alert("Foriegn Zip Code is set");
      form.BINotUSZip.focus();
      return (false);
    }
  }
  form.CCNumber.value = removeSpaces(form.CCNumber.value);
  if (form.CCNumber.value != "!!TEST!!")
  {
  if (!CCCheck(form.CCNumber.value,form.CCType.options[form.CCType.selectedIndex].value))
  {
    alert( ccErrors[ccErrorNo] );
    // alert( "The Credit Card Number is wrong" );
    form.CCNumber.focus();
    return false ;
  }
  }
  if (form.CCCcv.value.length < 3)
  {
    alert("Credit Card CCV Number is too short");
    form.CCCcv.focus();
    return (false);
  }
  if (!StringCheck(form.CCCcv.value,"0123456789"))
  {
    alert("Credit Card CCV Number is not numeric");
    form.CCCcv.focus();
    return (false);
  }
  if (form.CCExpMonth.selectedIndex <= 0)
  {
    alert("Credit Card Month is not selected");
    form.CCExpMonth.focus();
    return (false);
  }
  if (form.CCExpYear.selectedIndex <= 0)
  {
    alert("Credit Card Year is not selected");
    form.CCExpYear.focus();
    return (false);
  }
  if (form.CCNameOnCard.value.length < 4)
  {
    alert( "The Credit Card Name is too short" );
    form.CCNameOnCard.focus();
    return false ;
  }
  // ** END **
  return true ;
}
//-->
</script>
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
    </style>
</head>

<body bgcolor="#005599" lang=EN-US text="#0011AA" link="#007799" vlink="#00AA00">

<nav class="navbar fixed-top navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img src="https://balihaitours.com/wp-content/uploads/2017/03/Bali-Hai-Logo-PNG-low-res-1000x.png" width="50" height="50" class="d-inline-block align-top" alt="">

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
<div class="container">
<form name="frmAddBilling" method="post" action="https://balihaitours.com/PrintThisPage.php" onsubmit="return CheckForm(this);" >


<?php
   include("php/routines.php");
   // PasswordCheck("");

   // check to make sure this came from a local machine
   $server = $_SERVER['HTTP_HOST'];
   //if (strcmp($server,"localhost") && strcmp($server,"dklemer-desktop.local"))
   //  die($server . " Connection not allowed ");

   // check previous variables
   $GroupName = $_POST['GroupName'];
   //if (strlen($GroupName) <= 2) die("Family or Group name is not set - Hit the back button and enter it ");
   echo('<INPUT TYPE=HIDDEN NAME=GroupName VALUE="' . $GroupName . '">
   ');

   $AdultQty = $_POST['AdultQty'];
   echo('<INPUT TYPE=HIDDEN NAME=AdultQty VALUE="' . $AdultQty . '">
   ');

   $ChildQty = $_POST['ChildQty'];
   echo('<INPUT TYPE=HIDDEN NAME=ChildQty VALUE="' . $ChildQty . '">
   ');

   $PremierNumber = $_POST['$PremierNumber'];
   echo('<INPUT TYPE=HIDDEN NAME=PremierNumber VALUE="' . $PremierNumber . '">
   ');


   $Flags = 0;
   if ($LoginName == "WEBAccess") $Flags |= Flag_WebDisc;
   if (!strcmp($_POST['SafetySeat'],"Yes")) $Flags |= Flag_SafetySeat;
   if (!strcmp($_POST['ExtraDisc'],"Yes")) $Flags |= Flag_ExtraDisc;
   echo('<INPUT TYPE=HIDDEN NAME=Flags VALUE="' . $Flags . '">
   ');

   $CellPhone = $_POST['CellPhone'];
   $LocalPhone = $_POST['LocalPhone'];
   //if ((strlen($CellPhone) < 7) && (strlen($LocalPhone) < 7))
   //  die("A cell or local phone number is needed - Hit the back button and enter it ");
   //if ((strlen($CellPhone) >= 7) && (strlen($CellPhone) < 10))
   //  die("The cell phone number needs an area code - Hit the back button and enter it ");
   echo('<INPUT TYPE=HIDDEN NAME=CellPhone VALUE="' . $CellPhone . '">
   ');
   echo('<INPUT TYPE=HIDDEN NAME=LocalPhone VALUE="' . $LocalPhone . '">
   ');

   $TripTime = $_POST['TripTime'];
   //if (strlen($TripTime) < 18) die("A Trip was not selected - Hit the back button and enter it ");
   echo('<INPUT TYPE=HIDDEN NAME=TripTime VALUE="' . $TripTime . '">
');

   // make sure the quantity doen't exceed the max
   SchedRead($TripTime);
   $count = BookCountSeats($TripTime);
//echo " function " . $PassRow['PassFunction'] . " book " . $count . " AdultQty " . $AdultQty . " ChildQty " . $ChildQty . " max people " . $SchedRow['SchedNumSeats'];
   if (strcmp($PassRow['PassFunction'],"Administration"))
   {
      if (($AdultQty + $ChildQty + BookCountSeats($triptime)) > $SchedRow['SchedNumSeats'])
         die("Too many people for this tour - Hit the back button and select another tour ");
   }

?>



<!-- whole site table-->

   <table width="100%" bgcolor="#FFFFFF" CELLSPACING="5" CELLPADDING="5">
     <tr><td align="left" valign="top">
       <P>

<p>
<FONT size="5"><B><I>Credit card information</i></b>

<table width="100%" bgcolor="#A8DCAD" border="2">
<tr><td  valign="top">
<table>
  <tr><td width="1%"></td>
  <td  valign="top">
  <FONT size="4" face="Times New Roman">

  <table cellspacing="3" width="100%">
    <tr><td><i><b>Your chosen cruise:</b></i></td>
<?php
   echo('<td>' . DBGetDate($TripTime) . '</td>');
   echo('<td>' . DBGetTime($TripTime) . '</td>');
   echo('<td>' . $SchedRow['SchedDepartLoc'] . '</td>');
   echo('<td>' . $SchedRow['SchedDescript'] . '</td>');
?>
  </tr></table>
<?php
   ShowCosts($SchedRow,$PassRow,$AdultQty,$ChildQty,$Flags);
?>

</td>
</tr></table></td>
</tr></table>
<?php echo('<INPUT TYPE=HIDDEN NAME=Price VALUE="' . $Due . '">
');?>
<?php echo('<INPUT TYPE=HIDDEN NAME=Deposit VALUE="' . $Commision . '">
');?>

<!--  Site contents table-->
<p>
<FONT size="5"><B><I>Enter your billing information</i></b>

<table width="100%" bgcolor="#A8DCAD" border="2">
<tr><td  valign="top">
<table>
  <tr><td width="1%"></td>
  <td width="70%">
  <FONT size="4" face="Times New Roman"><i><b><center>The following should match your credit card company   records.</center></b></i></b></td>
</tr></table></td>
</tr></table>

<table bgcolor="#FFFFFF" cellpadding="3" border="0" width="97%"   style="border-collapse:collapse;">
  <tr><td valign="top" nowrap="nowrap">

  <b>Billing Information</b>
  </td></tr>
  <tr><td valign="top">
  <table id="AddrInfo" name="AddrInfo" border="0" cellpadding="3"    cellspacing="0">
    <tr valign="top"><td align="right" nowrap="nowrap">
    <label for="BIName"><b>
    Name:</b></label>
    </td>

    <td  valign="top"><input type="text" name="BIName" id="BIName" size="35"  maxlength="40"    value="" /><br />
    </td></tr>
    <tr valign="top"><td align="right" nowrap="nowrap">
    <label for="BIAddr1"><b>
    Address line 1:</b></label>
    </td>
    <td  valign="top"><input type="text" name="BIAddr1" id="BIAddr1" size="35"   maxlength="30" value="" /><br />
    </td></tr>

    <tr valign="top"><td align="right" nowrap="nowrap">
    <label for="BIAddr2">
    Address line 2:</label>
    </td>
    <td  valign="top"><input type="text" name="BIAddr2" id="BIAddr2" size="35"   maxlength="30" value="" /><br /><font size="2">(optional)   &nbsp;
    <td valign="bottom"> Not US or Canada?
    </td></tr>
    <tr valign="top"><td align="right" nowrap="nowrap">

    <label for="BICity"><b>
    City:</b></label>
    </td>
    <td  valign="top"><input type="text" name="BICity" id="BICity" size="35"  maxlength="30"    value="" /><br />
    <td>Enter the following as needed:
    </td></tr>
    <tr valign="top""><td align="right" nowrap="nowrap">
    <label for="BIState"><b>
    State/Province:</b></label>

    </td>
    <td  valign="top"><select name="BIState" id="BIState" length="50" style="width:233px;">
   <option value="">- Select a state -</option>
   <option value="AL">Alabama</option>
   <option value="AK">Alaska</option>
   <option value="AB">Alberta</option>
   <option value="AS">American Samoa</option>
   <option value="AZ">Arizona</option>
   <option value="AR">Arkansas  </option>
   <option value="AA">Armed Forces - Americas</option>
   <option value="AE">Armed Forces -  Europe+</option>
   <option value="AP">Armed Forces - Pacific</option>
   <option value="BC">British Columbia</option>
   <option value="CA">California</option>
   <option value="CO">Colorado</option>
   <option value="CT">Connecticut</option>
   <option value="DC">D.C.</option>
   <option value="DE">Delaware</option>
   <option value="FM">Fed. States of Micronesia</option>
   <option value="FL">Florida</option>
   <option value="GA">Georgia</option>
   <option value="GU">Guam</option>
   <option value="HI">Hawaii </option>
   <option value="ID">Idaho</option>
   <option value="IL">Illinois</option>
   <option value="IN">Indiana</option>
   <option value="IA">Iowa</option>
   <option value="KS">Kansas </option>
   <option value="KY">Kentucky</option>
   <option value="LA">Louisiana</option>
   <option value="ME">Maine</option>
   <option value="MB">Manitoba</option>
   <option value="MH">Marshall Islands</option>
   <option value="MD">Maryland</option>
   <option value="MA">Massachusetts</option>
   <option value="MI">Michigan</option>
   <option value="MN">Minnesota</option>
   <option value="MS">Mississippi</option>
   <option value="MO">Missouri</option>
   <option value="MT">Montana</option>
   <option value="NE">Nebraska</option>
   <option value="NV">Nevada</option>
   <option value="NL">Newfoundland & Labrador</option>
   <option value="NH">New Hampshire</option>
   <option value="NJ">New Jersey</option>
   <option value="NM">New Mexico</option>
   <option value="NY">New York</option>
   <option value="NC">North Carolina</option>
   <option value="ND">North Dakota</option>
   <option value="MP">Northern  Mariana Islands</option>
   <option value="NT">Northwest Territories</option>
   <option value="NS">Nova Scotia</option>
   <option value="NU">Nunavut</option>
   <option value="OH">Ohio</option>
   <option value="OK">Oklahoma</option>
   <option value="ON">Ontario</option>
   <option value="OR">Oregon </option>
   <option value="PW">Palau</option>
   <option value="PA">Pennsylvania</option>
   <option value="PE">Prince Edward Island</option>
   <option value="PR">Puerto Rico</option>
   <option value="QC">Quebec</option>
   <option value="RI">Rhode Island</option>
   <option value="SK">Saskatchewan</option>
   <option value="SC">South Carolina</option>
   <option value="SD">South Dakota</option>
   <option value="TN">Tennessee </option>
   <option value="TX">Texas</option>
   <option value="UT">Utah</option>
   <option value="VT">Vermont</option>
   <option value="VI">Virgin Islands</option>
   <option value="VA">Virginia</option>
   <option value="WA">Washington</option>
   <option value="WV">West Virginia</option>
   <option value="WI">Wisconsin</option>
   <option value="WY">Wyoming</option>
   <option value="YT">Yukon</option>
    </select>
    <td  valign="top">Province:<input type="text" name="BINotUSState" id="BINotUSState" size="30"  maxlength="30"  value=""/><br />
    <td>Country:<input type="text" name="BINotUSCountry" id="BINotUSCountry" size="20" maxlength="20"    value="" /><br />
    </td></tr>
    <tr valign="top"><td align="right" nowrap="nowrap">
    <label for="BIZip"><b>
    ZIP code:</b></label>

    </td>
    <td  valign="top"><input type="text" name="BIZip" id="BIZip" size="10" maxlength="10"    value="" /><br />
    <td  valign="top">Postal code:<input type="text" name="BINotUSZip" id="BINotUSZip" size="10" maxlength="10"   value="" /><br />
   </td></tr>
  </table>   </td></tr>
</table>


<table cellpadding="3" border="0" width="100%" >
  <tr><td valign="top"><div id="PaymentInfo" >
  <table id="CreditCard"  border="0" cellpadding="2" cellspacing="0">

    <tr><td  valign="bottom"><b>
    Card Info</b></span>
    </td>
    <td  valign="top">
    <img title="AmEx" src="Pics/AmEx.gif" alt="AmEx" border="0"/>
    <img title="Discover" src="Pics/Discover.gif" alt="Discover" border="0"/>
    <img title="MasterCard" src="Pics/MasterCard.gif" alt="MasterCard" border="0"/>
    <img title="Visa" src="Pics/Visa.gif" alt="Visa" border="0"/>
        <table border="0" cellpadding="3" cellspacing="0" width="100%">
            <tr valign="top"><td width="45%">
                    <table><tr><td align="right" valign="top">
                                <label for="CCType"><b>
                                        Payment method:</b></label></td>
                            <td nowrap="nowrap">
                                <select name="CCType" id="CCType">
                                    <option>AmericanExpress</option>
                                    <option>Discover</option>
                                    <option>MasterCard</option>
                                    <option>Visa</option>
                                    <!--
                                    <option value="3" >American Express</option>
                                    <option value="4" >Discover</option> -->
                                </select>
                            </td></tr>
                        <tr><td valign="top" align="right">
                                <label for="CCNumber">
             <p>Card number:</p></label>
         </td>
         <td><input type="text" name="CCNumber" id="CCNumber" size="20"  maxlength="20" value=""/>
         </td></tr>
       <tr><td align="right">
               <label for="CCCcv"><b>
                       <p>CCV code:</b></label>
           </td>
           <td><input type="text" name="CCCcv" id="CCCcv" size="4"  maxlength="4" value=""/>
           </td>
           <td>
               <img title="CCV" src="Pics/SampleCards.gif" alt="Sample cards with CCV indicated" border="0"/>
           </td></tr>
       <tr><td align="right">
               <label for="CCExpMonth"><b>
                       <p>Expiration date:</b></label>
           </td>
           <td><select name="CCExpMonth" id="CCExpMonth">
                   <option  value="">Month</option>
                   <option  value="01">01 (January)</option>
                   <option  value="02">02 (February)</option>
                   <option  value="03">03 (March)</option>
                   <option  value="04">04 (April)</option>
                   <option  value="05">05 (May)</option>
                   <option  value="06">06 (June)</option>
                   <option  value="07">07 (July)</option>
                   <option  value="08">08 (August)</option>
                   <option  value="09">09 (September)</option>
                   <option  value="10">10 (October)</option>
                   <option  value="11">11 (November)</option>
                   <option  value="12">12 (December)</option>
               </select>&nbsp;&nbsp;
               <select name="CCExpYear" id="CCExpYear">
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
       <tr><th valign=bottom align="right">Cardholder's name:</th>

           <td valign=bottom align="left"><input type="text" name="CCNameOnCard"   id="CCNameOnCard" size="35" maxlength="40" value="" /><br />
           </td></tr>
       <tr><td></td>
           <td>
               (as it appears on the card)
           </td></tr>
   </table></td>


    <!--   <td width="20%" align="right"><center>
       <a href="http://www.rapidssl.com" target="_blank">
       <img title="SSL Certificate info" src="Pics/rapidssl_ssl_certificate.gif" alt="SSL Certificate" border="0">    </a><br><font size="2">RapidSSL.com,<br> a subsidiary<br> of GeoTrust,<br>
       <img title="GeoTrust" src="Pics/equifax.jpg" alt="GeoTrust" border="0"></center>
   </td></tr></table></td>
   </tr></table><font size="3">-->
    </td></tr>
  </table>

  <img title="" class="spacer" src="Pics/spacer.gif" height="5" width="1" border="0" alt=""/>


</div>
    <h6>Terms:</h6>
<p>1) Your card will be charged 30% of the passenger fee (plus tax) to reserve your seat(s) and there will be NO refund if you do not give a 48 hour cancellation notice.</p>
<p>2) With a full 48 hour cancellation notice, your card will be credited this 30%.</p>
<p>3) Once your party shows up at the destination location, the total cost will be charged to your card.</p>
<p>4) All trips are subject to acceptable weather conditions. Tour destinations will be determined based on passenger safety and comfort.</p>
<p>5) You <b>MUST</b> call Joe @ 808 634-2317 after 7pm the night before your departure date to confirm take off location and favorable weather conditions. Please make a note of this number <u>now</u>.</p>
Hey...are you ready for some fun...
<input type="submit" class="btn btn-primary" name="AddCCbutton" id="AddCCbutton" value="Reserve those seat(s)" />
    </div>


</form>

</body>
</html>


