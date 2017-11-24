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
    <?php
    $bike_id = $_REQUEST['bike_id'];
    ?>
    <body class="m-submit4" data-scrolling-animations="false" >

	<?php require('inc_loader.php'); ?>
	<?php require('inc_header.php'); ?>
	<?php require('inc_nav.php'); ?>
	<!--b-nav-->

        <!--
        <section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.3s">Submit Your Bike</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.3s">
					<h3>Add Your Bike In Our Listings</h3>
				</div>
			</div>
		</section>
        -->
        <!--b-pageHeader-->

        <!--
        <div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.3s">
				<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="submit4.html" class="b-breadCumbs__page m-active">Submit a Bike</a>
			</div>
		</div>
        -->
        <!--b-breadCumbs-->
		<div class="b-submit">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
						<aside class="b-submit__aside">
							<div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.3s">
								<h3>Step 1</h3>
								<div class="b-submit__aside-step-inner m-active clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-car"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Add YOUR Bike</h4>
										<p>Select your bike &amp; add info</p>
										<div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
							</div>
							<div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.3s">
								<h3>Step 2</h3>
								<div class="b-submit__aside-step-inner m-active clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-photo"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Photos &amp; videos</h4>
										<p>Add images / videos of bike</p>
										<div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
							</div>
							<div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.3s">
								<h3>Step 3</h3>
								<div class="b-submit__aside-step-inner m-active clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-photo"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Contact Details</h4>
										<p></p>
										<div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<form action="bikeadd3.php" method="post" class='s-submit'>
                                <input type="hidden" value="<?php echo $bike_id; ?>" name="bike_id">
								<div class="b-submit__main-contacts wow zoomInUp" data-wow-delay="0.3s">
									<header class="s-headerSubmit s-lineDownLeft">
										<h2>Tell Us How Buyers Contact You</h2>
									</header>
									<!--<p>Curabitur libero. Donec facilisis velit eu est. Phasellus cons quat aenean vitae quam. </p>-->
									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Name  <span>*</span></label>
												<input type="text" name="bike_seller_name" />
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Email Address  <span>*</span></label>
												<input type="text" name="bike_seller_email" />
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Mobile Number  <span>*</span></label>
												<input type="text" name="bike_seller_contactno" />
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

								</div>
								<button type="submit" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.3s">Save<span class="fa fa-angle-right"></span></button>
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