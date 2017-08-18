<!DOCTYPE HTML >
<!-- Step 1 & 2 to begin the reservation process: pick your cruise and describe your party -->
<!--  file:///home/drshelby/MyDocuments/HTML/BaliHai/ReserveSeat.php -->
<!--  http://www.balihitours.com/ReserveSeat.php -->
<html>

<head>
    <meta name="resource-type" content="document">
    <meta name="distribution" content=" global ">
    <meta name="description" content="Offering boat tours off the Kauai coast">
    <meta name="rating" content="General" />
    <meta name="author" content="ZRaven" />
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <script type="text/javascript" src="/js/routines.js" ></script>
    <link  rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link  rel="stylesheet" type="text/css" href="/materials.css">
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
</head>
<script type="text/javascript" language="JavaScript" >
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

    <style>
        .navbar-light .navbar-brand, .navbar-light .navbar-toggler {
            color: #f8dab4 !important;
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
            color: #f8dab4;
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
        .mdl-data-table th {
            font-size: 16px !important;
            color: rgba(0, 0, 0, 0.79) !important;
            border-right: none !important;
            border-left: none !important;
        }
        .mdl-data-table td {
            font-size: 16px;
            border-right: none !important;
            border-left: none !important;
        }

       /* tr:hover {
            background-color: #EEEEEE;
            padding:56px;
        }*/
        input.mdl-button.mdl-js-button.mdl-button--raised {
            margin-right: 1%;
            background: rgba(158, 158, 158, 0.77) !important;
        }
        .mdl-data-table {

            width: 100%;
        }
        .formx tr{
            height: 70px;
            padding: 20px;
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
                <a class="navbar-brand" href="/">
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
        </div>
    </header>


<div class="container">
    <div class="row">
        <form name="frm" action="https://balihaitours.com/CCInfo.php" target="_parent" method="post" onsubmit="return CheckForm(this);" style="font-size:medium; color:black; background-color:white">
            <?php
            require("php/routines.php");
            // PasswordCheck("");
            ?>
            <div class="row">
                <span>Be advised Mother Nature has a mind of her own and we may need to reschedule due to adverse conditions.<br>
           Also, due to current gas prices we require a minimum passenger load; we may need to reschedule if enough people have not signed up for your chosen cruise. </span>
                <h4>Be sure to leave a contact number, just in case.</h4>
            </div>
            <h5>Click to select a cruise with the number of available seats needed on the date and time of your choosing:</h5>
<?php
   $EndTime = time() + (86400 * 120);
   ListTours($EndTime);
   StartTour();
?>
            <input type="submit" class="btn btn-primary" name=Continue value="Continue" />
        </form>
    </div>
</div>




<!--  site footer-->
    <footer class="footer">
        <div class="container">
            <div class="row margin-top margin-bottom footer__widgets-areas">
                <div class="col-md-6 footer__widgets-area footer__widgets-area--1"><div id="text-2" class="widget block-after-indent widget_text"><h3 class="widget__title">About Us</h3>			<div class="textwidget">Bali Hai Tours is a family-owned company that prides itself in offering the best of the best in island and wildlife exploration.

                            We've helped scout sights for various scenes, transported staff and actors, and built props assisting with stunt training on such movies as: A Perfect Getaway, Dinocroc II, III &amp; IV, Jurasic Park I, II &amp; III, Pearl Harbor, Supergatorm, Water World
                            <div class="header__info__item header__info__item--delimiter header__info__item--social-icons"><a href="https://www.facebook.com/Bali-Hai-Tours-371400862876724/"><i class="fa fa-facebook"></i></a><a href="https://www.yelp.com/biz/bali-hai-tours-anahola"><i class="fa fa-yelp"></i></a><a href="https://www.tripadvisor.com/Attraction_Review-g60609-d2390643-Reviews-Bali_Hai_Boat_Tours-Anahola_Kauai_Hawaii.html"><i class="fa fa-tripadvisor"></i></a></div>
                        </div>
                    </div></div><div class="col-md-6 footer__widgets-area footer__widgets-area--2"><div id="contact_us_adventure_tours-2" class="widget block-after-indent widget_contact_us_adventure_tours"><div class="widget-contact-info"><h3 class="widget__title">Bali Hai Tours</h3><div class="widget-contact-info__item"><div class="widget-contact-info__item__icon"><i class="fa fa-map-marker"></i></div><div class="widget-contact-info__item__text"><span>4997 Weke road Hanalei HI 96714</span></div></div><div class="widget-contact-info__item"><div class="widget-contact-info__item__icon"><i class="fa fa-mobile widget-contact-info__item__icon__mobile"></i></div><div class="widget-contact-info__item__text">808.634.2317</div></div><div class="widget-contact-info__item"><div class="widget-contact-info__item__icon"><i class="fa fa-envelope widget-contact-info__item__icon__email"></i></div><div class="widget-contact-info__item__text"><a href="mailto:jlicona@hawaii.rr.com">jlicona@hawaii.rr.com</a></div></div></div></div></div>	</div>
        </div>
        <div class="footer__bottom">
            <div class="footer__arrow-top"><a href="#"><i class="fa fa-chevron-up"></i></a></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer__copyright">© Bali Hai Tours 2017 All Rights Reserved </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-nav">
                            <ul id="menu-footer-menu" class="menu"><li id="menu-item-256" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-256"><a href="/terms-and-conditions">Terms &amp; Conditions</a></li>
                                <li id="menu-item-258" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-258"><a href="#">Privacy Policy</a></li>
                            </ul>						</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</BODY>
</HTML>
