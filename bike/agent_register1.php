<!DOCTYPE html>
<?php require('inc_connection.php'); ?>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<?php require('inc_title.php'); ?>

		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

		<link href="css/master.css" rel="stylesheet">


		<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="m-submit4" data-scrolling-animations="false" >

	<?php require('inc_loader.php'); ?>
	<?php require('inc_header.php'); ?>
	<?php require('inc_nav.php'); ?>
	<!--b-nav-->


	<?php

        $user_email = $_REQUEST['user_email'];
		$user_password = $_REQUEST['user_password'];
		$user_name = $_REQUEST['user_name'];
		$user_type = 1;
		$user_address = $_REQUEST['user_address'];
		$city_id = $_REQUEST['city_id'];
		$user_phone = $_REQUEST['user_phone'];
	    $user_mobile = $_REQUEST['user_mobile'];
	    $user_status = 0;
	    $user_date = date("Y/m/d");

		$sql = "select user_email from tbl_user where user_email='$user_email'";
		$result = mysql_query($sql) or die('Error: .' . mysql_error());

		if(@mysql_num_rows($result) == 0)
		{
			$sqlins = "INSERT INTO tbl_user (user_email, user_password, user_name, user_type, user_address, city_id, user_phone, user_mobile, user_status, user_date) VALUES ('$user_email', '$user_password', '$user_name', $user_type, '$user_address', $city_id, '$user_phone', '$user_mobile', $user_status, '$user_date')";
			if (!mysql_query($sqlins,$con))
			{
				die('Error: ' . mysql_error());
			}
			else
			{
				$msg = "<strong><font color=red>You have registered to our website successfully. You will receive confirmation email.</font></strong>";
			}
		}
		else
		{
				$msg = "<strong><font color=red>You have already registered with our web site. Click on the <a href=signin.php>SIGN IN</a> option to log into our web site.</font></strong>";
		}

   ?>

		<section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.3s">Agent Registration</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.3s">
					<h3>Add Your Detail In Our Listings</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.3s">
				<a href="index.php" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="agent_register.php" class="b-breadCumbs__page m-active">Agent Reister</a>
			</div>
		</div><!--b-breadCumbs-->
		<div class="b-submit">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
								<input type="hidden" value="1" name="agent_register">
								<div class="b-submit__main-contacts wow zoomInUp" data-wow-delay="0.3s">
									<header class="s-headerSubmit s-lineDownLeft">
										<h2>Agent Information</h2>
									</header>
									<p><?php echo $msg; ?></p>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-submit-->

		<?php require('inc_footer.php'); ?>
		<?php require('inc_main.php'); ?>
	</body>
</html>