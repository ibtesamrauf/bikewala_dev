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
		<!--<section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.3s">Agent Registration</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.3s">
					<h3>Add Your Detail In Our Listings</h3>
				</div>
			</div>
		</section>--><!--b-pageHeader-->

		<!--<div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.3s">
				<a href="index.php" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="agent_register.php" class="b-breadCumbs__page m-active">Agent Reister</a>
			</div>
		</div>
        -->
        <!--b-breadCumbs-->
		<div class="b-submit">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<form action="agent_register1.php" method="post" class='s-submit'>
								<input type="hidden" value="1" name="agent_register">
								<div class="b-submit__main-contacts wow zoomInUp" data-wow-delay="0.3s">
									<header class="s-headerSubmit s-lineDownLeft">
										<h2>User Information</h2>
									</header>
									<!--<p>Complete agent registration section. We will post a free listing of your bikes & accessories. </p>-->

									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Name  <span>*</span></label>
												<input type="text" name="user_name" />
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Email  <span>*</span></label>
												<input type="text" name="user_email" />
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Choose Password  <span>*</span></label>
												<input type="text" name="user_password" />
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Confirm Password  <span>*</span></label>
												<input type="text" name="user_password" />
											</div>
										</div>
									</div>

									<header class="s-headerSubmit s-lineDownLeft">
										<h2>Contact Detail</h2>
									</header>
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Address <span>*</span></label>
												<input type="text" name="user_address" />
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Email Address  <span>*</span></label>
												<div class='s-relative'>
													<select class="m-select" name="city_id">
														<option value="0" selected="0">Select City</option>
														<?php
														$query_city = "SELECT city_id, city_name FROM tbl_city where city_status = 1 order by city_id LIMIT 0,100";
														$result_city = mysql_query($query_city) or die('Error, query failed');
														echo $query_city;
														while($row_city = mysql_fetch_array($result_city)) {

															$city_id = $row_city['city_id'];
															$city_name = $row_city['city_name'];

															?>
															<option value="<?php echo $city_id; ?>"><?php echo $city_name; ?></option>
															<?php
														}
														?>
													</select>
													<span class="fa fa-caret-down"></span>
												</div>

											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Phone  <span>*</span></label>
												<input type="text" name="user_phone" />
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Mobile  <span>*</span></label>
												<input type="text" name="user_mobile" />
											</div>
										</div>
									</div>


								</div>
								<button name="save" type="submit" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.3s">Save<span class="fa fa-angle-right"></span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-submit-->

		<?php require('inc_footer.php'); ?>
		<?php require('inc_main.php'); ?>
	</body>
</html>