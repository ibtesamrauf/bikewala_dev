<!DOCTYPE html>
<?php require('inc_connection.php'); ?>
<?php require('inc_functions.php'); ?>
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
		<section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.3s">User Control Panel</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.3s">
					<h3>User Access Area</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.3s">
            <?php require('inc_nav_user.php'); ?>
			</div>
		</div><!--b-breadCumbs-->
		<div class="b-submit">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<div class="b-submit__main-contacts wow zoomInUp" data-wow-delay="0.3s">
								<header class="s-headerSubmit s-lineDownLeft">
									<h2>User Area</h2>
								</header>
								<p>Welcome to our website. User can perform following tasks<br><br>
                                * Add Bike Detail<br>
                                * Add Bike Accessories<br>
                                * View Request from Buyers<br>
                                * Update Profile<br>
                                 </p>
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