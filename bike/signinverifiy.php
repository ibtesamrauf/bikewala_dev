<?php
require('inc_connection.php');
require('inc_session.php');

$user_email =  $_POST["user_email"];
$user_password =   $_POST["user_password"];

$login_failed = false;

$sql = "select user_id, user_email, user_password, user_name from tbl_user where user_email='$user_email' and user_password = '$user_password' and user_status=1";
$result = mysql_query($sql) or die('Server Error. Please try again later. <span style="color:red">' . $sql . '<br>' . mysql_error());


if (!$result)
	die (mysql_error());

	$numrows = @mysql_num_rows($result);

	if ($numrows == 0)
	{
		$login_failed = true;
		$msg = "Invalid%20E-mail%20or%20Password";
		header("Location: signin.php?msg=".$msg);
		}
	else
	{
		while($rs = mysql_fetch_assoc($result))
		{
			if (!$rs['user_password'] = $user_password)
				{
				$login_failed = true;
				$msg = "Invalid%20E-mail%20or%20Password";
				header("Location: signin.php?msg=".$msg);
			    }
			else
			{
				$login_failed = false;

            $_SESSION['user_id'] = $rs['user_id'];
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_name'] = $rs['user_name'];

			print "<script language=\"JavaScript\">";
			print "window.location = 'user_main.php' ";
			print "</script>";


			}
		}
	}








/*if ($txt_username=="admin" && $txt_password=="1admin23")
$_SESSION['user_fname'] = $txt_username;

    print "<script language=\"JavaScript\">";
    print "window.location = 'admin.php?menu_name=admin' ";
    print "</script>";
*/

//header("Location: admin.php?menu_name=admin");



//else
//$msg='Invalid Username or Password';
//header("Location: Index.php?msg=".$msg);  
?> 




<?php


//set rs = conn.execute("select * from Tbl_User Where User_Email='"& txt_username &"' and User_Password = '"& txt_password &"' and User_Status= True")

//if not rs.eof then
//	session("loginname") = request.form("txt_username")
//	session("username") = request.form("txt_username")
//	response.redirect "admin.asp"
//else
//	msg="Invalid Admin ID or Password"
//	response.redirect "index.asp?Message="&msg
//end if
?>


