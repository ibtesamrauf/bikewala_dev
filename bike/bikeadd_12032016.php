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

        <script language="javascript" type="text/javascript">
            function getXMLHTTP() { //fuction to return the xml http object
                var xmlhttp=false;
                try{
                    xmlhttp=new XMLHttpRequest();
                }
                catch(e)	{
                    try{
                        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    catch(e){
                        try{
                            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                        }
                        catch(e1){
                            xmlhttp=false;
                        }
                    }
                }

                return xmlhttp;
            }

            function getmodel(make_id) {

                var strURL="findmodel_add.php?make_id="+make_id;
                var req = getXMLHTTP();

                if (req) {

                    req.onreadystatechange = function() {
                        if (req.readyState == 4) {
                            // only if "OK"
                            if (req.status == 200) {
                                document.getElementById('modeldiv').innerHTML=req.responseText;
                            } else {
                                alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                            }
                        }
                    }
                    req.open("GET", strURL, true);
                    req.send(null);
                }
            }
        </script>

	</head>
	<body class="m-submit1" data-scrolling-animations="false">

	<?php require('inc_loader.php'); ?>
	<?php require('inc_header.php'); ?>
	<?php require('inc_nav.php'); ?>
		<!--b-nav-->

		<section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.5s">Submit Your Bike</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
					<h3>Add Your Bike In Our Listings</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.5s">
				<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="bikeadd.php" class="b-breadCumbs__page m-active">Submit a Bike</a>
			</div>
		</div><!--b-breadCumbs-->

		<div class="b-submit">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
						<aside class="b-submit__aside">
							<div class="b-submit__aside-step m-active wow zoomInUp" data-wow-delay="0.5s">
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
							<div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.5s">
								<h3>Step 2</h3>
								<div class="b-submit__aside-step-inner clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-photo"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Photos &amp; videos</h4>
										<p>Add images / videos of bike</p>
									</div>
								</div>
							</div>
							<div class="b-submit__aside-step wow zoomInUp" data-wow-delay="0.5s">
								<h3>Step 3</h3>
								<div class="b-submit__aside-step-inner clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-user"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4>Contact details</h4>
										<p>Choose bike specifications</p>
									</div>
								</div>
							</div>
						</aside>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<header class="s-headerSubmit s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
								<h2 class="">Add Your Bike Details</h2>
							</header>
							<form class="s-submit clearfix" action="bikeadd1.php" method="POST">
								<div class="row">
									<div class="col-md-6 col-xs-12">

										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Select Type</label>
											<div class='s-relative'>
												<select class="m-select" name="bike_type">

													<option value="1" selected>New</option>
													<option value="0">Used</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>




										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Model <span>*</span></label>
											<div class='s-relative' id="modeldiv">
												<select class="m-select" name="model_id">
													<option value="" selected="">Select Make First</option>												</select>
												<span class="fa fa-caret-down"></span>
											</div>

										</div>

										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Mileage<span>*</span></label>
											<div class="b-submit__main-contacts-inputSelect">
												<input type="text" name="bike_mileage"/>
												<div class="b-submit__main-contacts-select">
													<select name="km" class="m-select">
														<option>IN KMS</option>
													</select>
													<span class="fa fa-caret-down"></span>
												</div>
											</div>
										</div>

                                        <div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
                                            <label>Color<span>*</span></label>
                                            <div class='s-relative'>
                                                <select class="m-select" name="bike_color">
                                                    <option value="0" selected>Select Color</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Grey">Grey</option>
                                                    <option value="Red">Red</option>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                            </div>
                                        </div>

										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<div class='s-relative'>
												<label>Expected Price <span>*</span></label>
												<input placeholder="Expected Price" type="text" name="bike_price" />
											</div>
										</div>




									</div>


									<div class="col-md-6 col-xs-12">
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">

											<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
												<label>Make <span>*</span></label>
												<div class='s-relative'>
													<select class="m-select" name="make_id" onChange="getmodel(this.value)">
														<option value="0" selected="0">Select Make</option>
														<?php
														$query_make = "SELECT make_id, make_name FROM tbl_make where make_status = 1 order by make_id LIMIT 0,100";
														$result_make = mysql_query($query_make) or die('Error, query failed');
														echo $query_make;
														while($row_make = mysql_fetch_array($result_make)) {

															$make_id = $row_make['make_id'];
															$make_name = $row_make['make_name'];

															?>
															<option value="<?php echo $make_id; ?>"><?php echo $make_name; ?></option>
															<?php
														}
														?>
													</select>
													<span class="fa fa-caret-down"></span>
												</div>
											</div>

											<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
												<label>Manufacturer Year<span>*</span></label>
												<div class='s-relative'>
													<select class="m-select" name="bike_year">
														<option value="0" selected>Select Year</option>
														<option value="2010">2010</option>
														<option value="2011">2011</option>
														<option value="2012">2012</option>
														<option value="2013">2013</option>
														<option value="2014">2014</option>
														<option value="2015">2015</option>
														<option value="2016">2016</option>
													</select>
													<span class="fa fa-caret-down"></span>
												</div>
											</div>



											<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
												<div class='s-relative'>
													<label>Registration No.<span>*</span></label>
													<input placeholder="Bike Registration No." type="text" name="bike_regno" />
												</div>
											</div>
										</div>

										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Engine Type<span>*</span></label>
											<div class='s-relative'>
												<select class="m-select" name="bike_engine_type">
													<option value="0" selected>Select Engine Type</option>
													<option value="2">2 Strokes</option>
													<option value="4">4 Strokes</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>

									</div>
								</div>
                                <div class="b-submit__main-file wow zoomInUp" data-wow-delay="0.3s">
                                    <header class="s-headerSubmit s-lineDownLeft">
                                        <h2>Write Some Additional Comments About Your Bike</h2>
                                    </header>

                                    <textarea name="bike_detail" placeholder="write additional comments" cols="75"></textarea>
                                </div>
                                <button type="submit" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.5s">Save &amp; PROCEED to next step<span class="fa fa-angle-right"></span></button>
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