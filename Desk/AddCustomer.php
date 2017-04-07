<!-- View list of planned and scheduled cruises -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/Upkeep/ViewSchedule.php -->
<!--  http://www.balihitours.com/Upkeep/ViewSchedule.php -->
<html>

<head>
<meta name="resource-type" content="document" />

<meta http-equiv=Content-Type content="text/html; charset=UTF-8">

   <title>Bali Hai Activities Desk add a customer</title>

</head>

<body bgcolor="#FFFFFF" lang=UTF-8 text="#000000" link="#007799" vlink="#00AA00">
<form name="frm" action="AddCustomer.php" method="post">
<?php

   require("../php/routines.php");
   PasswordCheck();

?>
<img src="../Pics/BaliHaiBanner.jpg" width="100%" BORDER="0" ALT="Bali Hai Banner">
<p><font size="5">Select the tour:
<p>
<table border="1" cellspacing="0" cellpadding="2" width="100%">
   <tr><th align="center">Select</th>
   <th align="center">Checkin<br>Time</th>
   <th align="center">Brief<br>Description</th>
   <th align="center">Departure<br>Location</th>
   <th align="center">Seats<br>Available</th>

<?php

   // look form now for the next two weeks
   $endTime = time() + (86400 * 14);
   $query = "SELECT * from schedule WHERE TripTime > NOW() AND TripTime < FROM_UNIXTIME(" . $endTime . ") ORDER BY TripTime;";
   //echo(" query = $query ");
   $MySql = DBOpen();
   $result = mysql_query($query,$MySql);

   while($row = mysql_fetch_array($result))
   {
      echo '<tr height="20">';
      echo '<td align="center"><input type="radio" name="Select[]" value="' . $row['TripTime'] . '"></td>';
      $date = DBGetDate($row['TripTime']);
      $time = DBGetTime($row['TripTime']);
      echo '<td align="center">' . $date . ' ' . $time . '</td>';
      echo '<td align="center">' . $row['Descript'] . '</td>';
      echo '<td align="center">' . $row['DepartLoc'] . '</td>';
      // figure out how many seats are available
      $countQuery = "SELECT AdultQty, ChildQty FROM bookings WHERE TripTime='" . $row['TripTime'] . "';";
      $countResult = mysql_query($countQuery,$MySql);
      $countTotal =  $row['MaxPeople'];
      while($countRow = mysql_fetch_array($countResult))
      {
         $countTotal -= ($countRow['AdultQty'] + $countRow['ChildQty']);
      }
      echo '<td align="center">';
      if ($countTotal <= 0) echo '<font color=red>';
      else echo '<font color=green>';
      echo $countTotal . '</td>';
      echo '</tr>';
   }
   echo '</table>';
   mysql_close($MySql);
?>
<p><font size="4">
Adult Qty <input type="text" name="AdultQty" id="AdultQty" size="4" maxlength="2" value="0" />
 @ $<input type="text" name="AdultCost" id="AdultCost" size="4" maxlength="3" value="155" />
Child Qty <input type="text" name="ChildQty" id="ChildQty" size="4" maxlength="2" value="0" />
 @ $<input type="text" name="ChildCost" id="ChildCost" size="4" maxlength="3" value="90" />
<p>









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
    <td  valign="top"><input type="text" name="BINotUSState" id="BINotUSState" size="30"  maxlength="30"    value="" /><br />
    <td>Country:
    </td></tr>
    <tr valign="top"><td align="right" nowrap="nowrap">
    <label for="BIZip"><b>
    ZIP code:</b></label>

    </td>
    <td  valign="top"><input type="text" name="BIZip" id="BIZip" size="10" maxlength="10"    value="" /><br />
    <td  valign="top"><input type="text" name="BINotUSZip" id="BINotUSZip" size="10" maxlength="10"   value="" /><br />
    <td  valign="top"><input type="text" name="BINotUSCountry" id="BINotUSCountry" size="20" maxlength="20"    value="" /><br />
   </td></tr>
  </table>   </td></tr>
</table>

<FONT size="5"><B><I>Step Four: Credit card information</i></b>

<table cellpadding="3" border="0" width="100%" >
  <tr><td valign="top"><div id="PaymentInfo" >
  <table id="CreditCard"  border="0" cellpadding="2" cellspacing="0">

    <tr><td  valign="bottom"><b>
    Card Info</b></span>
    </td>
    <td  valign="top">
    <img title="MasterCard" src="Pics/MasterCard.gif" alt="MasterCard" border="0"/>
    <img title="Visa" src="Pics/Visa.gif" alt="Visa" border="0"/>
<!--
    <img title="AmericanExpress" src="Pics/AmEx.gif" alt="AmericanExpress" border="0"/>
    <img title="Discover" src="Pics/Discover.gif" alt="Discover" border="0"/> -->
    </td></tr>
  </table>

  <img title="" class="spacer" src="Pics/spacer.gif" height="5" width="1" border="0" alt=""/>

  <table border="0" cellpadding="3" cellspacing="0" width="100%">
    <tr valign="top"><td width="45%">
    <table><tr><td align="right" valign="top">
    <label for="CCType"><b>
    Payment method:</b></label></td>
    <td nowrap="nowrap">
    <select name="CCType" id="CCType">
      <option>MasterCard</option>
      <option>Visa</option>
      <!--
      <option value="3" >American Express</option>
      <option value="4" >Discover</option> -->
    </select>
    </td></tr>
    <tr><td valign="top" align="right">
    <label for="CCNumber"><b>
    <p>Card number:</b></label>
    </td>
    <td valign="bottom"><input type="text" name="CCNumber" id="CCNumber" size="16"  maxlength="16" value=""/>
    </td></tr>
    <tr><td valign="bottom" align="right">
    <label for="CCCcv"><b>
    <p>CCV code:</b></label>
    </td>
    <td valign="bottom"><input type="text" name="CCCcv" id="CCCcv" size="4"  maxlength="4" value=""/>
    </td>
    <td valign="bottom">
    <img title="CCV" src="Pics/CCVImageSMwArrow.jpg" alt="Sample card with CCV indicated" border="0"/>
    </td></tr>
    <tr><td valign="top" align="right">
    <label for="CCExpMonth"><b>
    <p>Expiration date:</b></label>
    </td>
    <td  valign="bottom"><select name="CCExpMonth" id="CCExpMonth">
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
   <option  value="2009">2009</option>
   <option  value="2010">2010</option>
   <option  value="2011">2011</option>
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
    </select>

    </td></tr>
    <tr><td valign="top" align="right">
    <label for="CCNameOnCard"><b>
    <p>Cardholder's name:</b></label>
    </td>

    <td valign="bottom" align="left"><input type="text" name="CCNameOnCard"   id="CCNameOnCard" size="35" maxlength="40" value="" /><br />
    </td></tr>
    <tr><td></td>
    <td>
   <font size="2">(as it appears on the card)</font>
    </td></tr>
    </table></td>
    <td width="35%"></td>

    <td valign="top" width="20%" align="right"><center>
    <a href="http://www.rapidssl.com" target="_blank">
    <img title="SSL Certificate info" src="Pics/rapidssl_ssl_certificate.gif" alt="SSL Certificate" border="0">    </a><br><font size="2">RapidSSL.com,<br> a subsidiary<br> of GeoTrust,<br>
    <img title="GeoTrust" src="Pics/equifax.jpg" alt="GeoTrust" border="0"></center>
</td></tr></table></td>
</tr></table><font size="3">

<P>  <FONT size="4" face="Times New Roman"><i><b>Terms:
<P>1) Your card will be charged 30% of the passenger fee (plus tax) to reserve your seat(s) and there will be NO refund if you do not give a 48 hour cancellation notice.
<p>2) With a full 48 hour cancellation notice, your card will be credited this 30%.
<p>3) Once your party shows up at the destination location, the total cost will be charged to your card.
<p>4) All trips are subject to acceptable weather conditions. Tour destinations will be determined based on passenger safety and comfort.
<p>5) You <b>MUST</b> call Joe @ 808 634-2317 after 7pm the night before your departure date to confirm take off location and favorable weather conditions. Please make a note of this number <u>now</u>.
<p> <FONT size="5">Hey...are you ready for some fun...
<input type="submit" name="AddCCbutton" id="AddCCbutton" value="Reserve those seat(s)" />


</form>
</FONT>
</BODY>
</HTML>
