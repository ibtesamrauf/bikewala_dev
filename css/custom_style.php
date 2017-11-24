<?php
session_start();
header("Content-type: text/css");
$autoadmin_settings=$_SESSION["autoadmin_settings"];
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
error_reporting(0);
?>
body{font-size:13px;}
<?php
if($autoadmin_settings['siteoutercolor']!=""){
?>
body{
background-color:<?php print $autoadmin_settings['siteoutercolor']; ?>;
}
<?php } ?>

<?php if($autoadmin_settings['webtheme']=="readable"){ ?>
body {
    padding-top: 0px !important;
}
<?php } ?>

<?php if($autoadmin_settings['fixedtopheader']!="yes"){ ?>
  /* body{ padding-top: 0; } */
<?php } ?>
#header{
<?php 
if($autoadmin_settings['siteheadercolor']!="") print "background-color:". $autoadmin_settings['siteheadercolor'].";";
if($autoadmin_settings['siteheaderfontcolor']!="") print "color:". $autoadmin_settings['siteheaderfontcolor'].";";
?>
}

#wrapper .container{
<?php 
if($autoadmin_settings['siteinnercolor']!="") print "background-color:". $autoadmin_settings['siteinnercolor'].";";
if($autoadmin_settings['sitebordercolor']!="") print "border-color:". $autoadmin_settings['sitebordercolor'].";";
?>
}

#sidebar1{
<?php 
if($autoadmin_settings['searchformcolor']!="") print "background-color:". $autoadmin_settings['searchformcolor'].";";
if($autoadmin_settings['searchformbordercolor']!="") print "border-color:". $autoadmin_settings['searchformbordercolor'].";";
if($autoadmin_settings['searchformfontcolor']!="") print "color:". $autoadmin_settings['searchformfontcolor'].";";
if(($_GET['ptype']=="showOnMap" && $_GET['fullscreen']=="true") || $_GET['fs']=="true"){ 
/*  print "position: fixed; ";
    print "padding:10px; ";
    print "z-index: 100; ";
    print "width:250px;
    left:0px;
    top:10px; "; */
}
?>
}

.fblogin li > a:hover{
background-color:#fff;
}

<?php if(($_GET['ptype']=="showOnMap" && $_GET['fullscreen']=="true") || $_GET['fs']=="true"){   ?>
#header{
display:none;
}

#sidebar{
position: absolute;
z-index: 100;
top:0px;
<?php if(isset($_SESSION["rtl"]) && !$_SESSION["rtl"]){ ?>left:0px; <?php } ?>
width:270px;
}

#footer{
display:none;
}

#mainContent{
z-index:11;
background-color:#fff;
}
<?php } ?>
.smallOptional, .smallOptional a{
<?php 
if($autoadmin_settings['searchformfontcolor']!="") print "color:". $autoadmin_settings['searchformfontcolor'].";";
?>
}

#sidebarLogin{
<?php 
if($autoadmin_settings['menuboxcolor']!="") print "background-color:". $autoadmin_settings['menuboxcolor'].";";
if($autoadmin_settings['menuboxbordercolor']!="") print "border-color:". $autoadmin_settings['menuboxbordercolor'].";";
if($autoadmin_settings['menuboxfontcolor']!="") print "color:". $autoadmin_settings['menuboxfontcolor'].";";
?>
}

#footer,#footer p,#footer a{
<?php 
if($autoadmin_settings['sitefooterfontcolor']!="") print "color:". $autoadmin_settings['sitefooterfontcolor'].";";
?>
}

<?php if(trim($autoadmin_settings['topmenubordercolor'])!=""){ ?>
#header_top_menu{
border:1px solid <?php print $autoadmin_settings['topmenubordercolor']; ?>;
}

#header_top_menu ul li.first_item{
border-right:1px solid <?php print $autoadmin_settings['topmenubordercolor']; ?>;
}
<?php  } ?>

<?php if(trim($autoadmin_settings['topmenubackgroundcolor'])!=""){ ?>
#header_top_menu ul{
background-color: <?php print $autoadmin_settings['topmenubackgroundcolor']; ?>;
}
<?php  } ?>

<?php if(trim($autoadmin_settings['topmenufontcolor'])!=""){ ?>
#header_top_menu a{
color: <?php print $autoadmin_settings['topmenufontcolor']; ?>;
}
<?php  } ?>

.nav-collapse .nav{
margin-right:0;
z-index:200;
}

<?php if($_SESSION["rtl"]){ ?>
#addListingMap img, #reListingOnMap img { 
  max-width: none;
}
#addListingMap label, #reListingOnMap label { 
  width: auto; display:inline; 
} 
.ui-multiselect {
     text-align: right;
}
<?php } ?>

[class^="icon-"], [class*=" icon-"] {
   vertical-align: middle;
   background-image:none;
}

.nav-collapse .nav{
  /*  background-color:#000; */
}

.login_link{
    margin-left:30px;
}

#loginlink a{
    color:#fff;
}

#theListing{
<?php if(isset($_SESSION["rtl"]) && !$_SESSION["rtl"]){ ?>right:0px; <?php } ?>
}