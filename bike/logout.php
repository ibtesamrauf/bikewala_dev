<?php
//	include("inc_session.php");
 //   $_SESSION['login_email'] = '';
    $_SESSION['user_email'] = '';
   session_start();
   session_destroy();
	print "<script language=\"JavaScript\">";
	print "window.location = 'index.php' ";
	print "</script>";
?>