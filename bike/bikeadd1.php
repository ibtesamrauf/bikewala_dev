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

    $bike_type = $_REQUEST['bike_type'];
    $make_id = $_REQUEST['make_id'];
    $model_id = $_REQUEST['model_id'];
    $agent_id = 0;
    $bike_mileage = $_REQUEST['bike_mileage'];
    $bike_year = $_REQUEST['bike_year'];
    $bike_price = $_REQUEST['bike_price'];
    $bike_color = $_REQUEST['bike_color'];
    $bike_regno = $_REQUEST['bike_regno'];
    $bike_detail = $_REQUEST['bike_detail'];
    //$bike_engine_type = $_REQUEST['bike_engine_type']. " Strokes";
    $bike_featured = 0;
    $bike_status = 0;
    $bike_date = date("Y/m/d");


	$sqlinsert = "insert into tbl_bike (make_id, model_id, agent_id, bike_mileage, bike_year, bike_color, bike_regno, bike_type, bike_price, bike_detail, bike_featured, bike_date, bike_status) values ($make_id, $model_id, $agent_id, $bike_mileage, $bike_year, '$bike_color', '$bike_regno', $bike_type, $bike_price, '$bike_detail', $bike_featured, '$bike_date', $bike_status)";

	if (!mysql_query($sqlinsert,$con))
	{
		die('Error: ' . mysql_error());
	}
	else
	{
		$bike_id = mysql_insert_id();
	}
    ?>


	<body class="m-submit3" data-scrolling-animations="false" >

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
				<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="submit3.html" class="b-breadCumbs__page m-active">Submit a Vehicle</a>
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
										<h4>Add YOUR Vehicle</h4>
										<p>Select your vehicle &amp; add info</p>
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
										<p>Add images / videos of vehicle</p>
										<div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
							</div>
							<div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.3s">
								<h3>Step 4</h3>
								<div class="b-submit__aside-step-inner clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-user"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Contact details</h4>
										<p>Choose vehicle specifications</p>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<form action="bikeadd2.php" method="post" >
								<input type="hidden" value="<?php echo $bike_id; ?>" name="bike_id">
								<div class="s-form">
									<div class="b-submit__main-file">
										<header class="s-headerSubmit s-lineDownLeft wow zoomInUp" data-wow-delay="0.3s">
											<h2>Upload Your Vehicle Photos</h2>
										</header>
										<p class=" wow zoomInUp" data-wow-delay="0.3s">You can upload upto 10 photos of your vehicle here.</p>
										<label class="b-submit__main-file-label btn m-btn wow zoomInUp" data-wow-delay="0.3s">
											<!--<input type="file" class="" name="img" />-->
                                            <!--<span onClick="window.open('fileupload.php?bike_id=<?php echo $bike_id?>','mywindow','width=500,height=300')">CHOOSE A  PHOTO</span>-->
											<span>CHOOSE A  PHOTO</span>
											<span class="fa fa-angle-right" onClick="window.open('upload4/index.php?bike_id=<?php echo $bike_id?>','mywindow','width=800,height=300')"></span>
                                        </label>
										<label>Max. file size: 3.5 MB. Allowed images: jpg, gif, png.</label>
									</div>
								</div>
								<div class="s-submit">
									<button type="submit" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.3s">Save &amp; PROCEED to next step<span class="fa fa-angle-right"></span></button>
								</div>
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