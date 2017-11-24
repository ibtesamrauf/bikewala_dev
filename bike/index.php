<!DOCTYPE html>
<?php //require('inc_connection.php'); ?>


<html>
	<head>

        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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

                var strURL="findmodel.php?make_id="+make_id;
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
	<body class="m-index" data-scrolling-animations="false" data-equal-height=".b-auto__main-item">

		<?php //require('inc_loader.php'); ?>
        <?php require('inc_header.php'); ?>
        <?php require('inc_nav.php'); ?>
		<section class="b-asks" style="background-image: linear-gradient(rgba(0,0,0,0.11), rgba(0,0,0,0.9)), url(images/bike_banner5.jpg)">
            <div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
						<div class="b-asks__first wow zoomInLeft" data-wow-delay="0.3s" data-wow-offset="100">
							<div class="b-asks__first-circle">
								<span class="fa fa-search"></span>
							</div>
							<div class="b-asks__first-info">
								<h2>ARE YOU LOOKING FOR A BIKE?</h2>
								<p>Search Our Inventory With Thousands Of Bikes  And More
									Bikes Are Adding On Daily Basis</p>
							</div>
							<div class="b-asks__first-arrow">
								<a href="listingsTwo.html"><span class="fa fa-angle-right"></span></a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
						<div class="b-asks__first m-second wow zoomInRight" data-wow-delay="0.3s" data-wow-offset="100">
							<div class="b-asks__first-circle">
								<span class="fa fa-usd"></span>
							</div>
							<div class="b-asks__first-info">
								<h2>DO YOU WANT TO SELL A BIKE?</h2>
								<p>Search Our Inventory With Thousands Of Bikes  And More
									Bikes Are Adding On Daily Basis</p>
							</div>
							<div class="b-asks__first-arrow">
								<a href="bikeadd.php"><span class="fa fa-angle-right"></span></a>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<p class="b-asks__call wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">QUESTIONS? CALL US  : <span>021-112345666</span></p>
					</div>
				</div>
			</div>
		</section><!--b-asks-->

        <!--<section class="b-contact" style="background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.0)), url(images/orange_background.jpg)">-->
        <section class="b-contact">
            <div class="container">
                <div class="row wow zoomInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                    <div class="col-xs-4">
                        <div class="b-contact-title">
                            <h5>SPECIAL OFFER</h5><br />
                            <h2>SPECIAL OFFER SIGNUP</h2>
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <div class="b-contact__form">
                            <p>WE ARE PROVIDING SPECIAL OFFERS. ENTER YOUR DETAILS AND YOU WILL GET A FREE OIL CHANGE!</p>
                            <form action="/" method="POST">
                                <div><span class="fa fa-user"></span><input type="text" name="user" value="" placeholder="Your Name" /></div>
                                <div><span class="fa fa-envelope"></span><input type="text" name="email" value="" placeholder="Your Email" /></div><br><br>
                                <div><span class="fa fa-envelope"></span><input type="text" name="email" value="" placeholder="Bike Model" /></div>
                                <div><span class="fa fa-envelope"></span><input type="text" name="email" value="" placeholder="Bike Registration Number" /></div><br><br>
                                <button type="submit"><span class="fa fa-angle-right"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


		<!--
		<section class="b-slider">
			<div id="carousel" class="slide carousel carousel-fade">
				<div class="carousel-inner">
					<div class="item active">
						<img src="media/main-slider/1.jpg" alt="sliderImg" />
					</div>
				</div>
			</div>
		</section>
		-->
		<!--b-slider-->

        <br><br>
		<section class="b-search">
			<div class="container">
				<form action="bikelisting.php" method="POST" class="b-search__main"  style="background-image: linear-gradient(rgba(0,0,0,0.15), rgba(0,0,0,0.3)), url(images/bike_banner3.jpg)">
					<div class="b-search__main-title wow zoomInUp" data-wow-delay="0.3s">
						<h2>LOOKING FOR BIKE? FIND IT HERE</h2>
					</div>
					<div class="b-search__main-type wow zoomInUp" data-wow-delay="0.3s">
						<!--<div class="col-xs-12 col-md-2 s-noLeftPadding">
							<h4>Select vehicle type</h4>
						</div>-->
					</div>
					<div class="b-search__main-form wow zoomInUp" data-wow-delay="0.3s">
						<div class="row">
							<div class="col-xs-12 col-md-8">
								<div class="m-firstSelects">
									<div class="col-xs-4">
										<select name="make_id" onChange="getmodel(this.value)">
                                            <option value="0" selected="0">Any Make</option>
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
										<p><font color="black"> MISSING MANUFACTURER?</font></p>
									</div>
                                    <div class="col-xs-4" id="modeldiv">
										<select name="model_id">
											<option value="" selected="">Select Make First</option>
										</select>
										<span class="fa fa-caret-down"></span>
										<p><font color="black"> MISSING MODEL?</font></p>
									</div>
									<div class="col-xs-4">
                                        <select name="city_id">
                                            <option value="0" selected="">Any City</option>
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
										<p><font color="black"> E.G:  KARACHI, LAHORE, ISLAMABAD</font></p>
									</div>
								</div>
                                <div class="col-xs-radio">
                                    <input type="radio" value="1" name="bike_type" checked><SPAN STYLE="color: #999999; font:600 10px 'Open Sans',sans-serif;">&nbsp;<font color="black"> New Bike</font></span>
                                    &nbsp;&nbsp;&nbsp;<input type="radio" value="0" name="bike_type"><SPAN STYLE="color: #999999; font:600 10px 'Open Sans',sans-serif;">&nbsp;<font color="black"> Used Bike</font></span>
                                </div>
							</div>

							<div class="col-md-4 col-xs-12 text-left s-noPadding">
								<div class="b-search__main-form-range">
									<label>PRICE RANGE</label>
									<div class="slider"></div>
									<input type="hidden" name="min_range" class="j-min" />
									<input type="hidden" name="max_range" class="j-max" />
								</div>
								<div class="b-search__main-form-submit">
									<a href="#"><strong>Advanced search</strong></a>
                                    <button type="submit" class="btn m-btn">Search the Bike<span class="fa fa-angle-right"></span></button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section><!--b-search-->
        <br><br><br><br><br><br>
		<section class="b-featured">
			<div class="container">
				<h2 class="s-title wow zoomInUp" data-wow-delay="0.3s">Featured Vehicles</h2>
				<div id="carousel-small" class="owl-carousel enable-owl-carousel" data-items="4" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-tablet-small="2">
					<div>
						<div class="b-featured__item wow rotateIn" data-wow-delay="0.3s" data-wow-offset="150">
							<a href="detail.html">
								<img src="media/186x113/mers.jpg" alt="mers" />
								<!--<span class="m-premium">Premium</span>-->
							</a>
							<div class="b-featured__item-price">
								Rs.65,900
							</div>
							<div class="clearfix"></div>
							<h5><a href="detail.html">UNIQUE</a></h5>
							<div class="b-featured__item-count"><span class="fa fa-tachometer"></span>35,000 KM</div>
							<div class="b-featured__item-links">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Red</a>
							</div>
						</div>
					</div>
					<div>
						<div class="b-featured__item wow rotateIn" data-wow-delay="0.3s" data-wow-offset="150">
							<a href="detail.html">
								<img src="media/186x113/audi.jpg" alt="audi" />
							</a>
							<div class="b-featured__item-price">
								Rs.130,825
							</div>
							<div class="clearfix"></div>
							<h5><a href="detail.html">SUZUKI AGR</a></h5>
							<div class="b-featured__item-count"><span class="fa fa-tachometer"></span>16,000 KM</div>
							<div class="b-featured__item-links">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Red</a>
							</div>
						</div>
					</div>
					<div>
						<div class="b-featured__item wow rotateIn" data-wow-delay="0.3s" data-wow-offset="150">
							<a href="detail.html">
								<img src="media/186x113/aston.jpg" alt="aston" />
								<!--<span class="m-leasing">LEASING AVAILABLE</span>-->
							</a>
							<div class="b-featured__item-price">
								Rs.50,825
							</div>
							<div class="clearfix"></div>
							<h5><a href="detail.html">YAMAHA MBR</a></h5>
							<div class="b-featured__item-count"><span class="fa fa-tachometer"></span>35,000 KM</div>
							<div class="b-featured__item-links">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Red</a>
							</div>
						</div>
					</div>
					<div>
						<div class="b-featured__item wow rotateIn" data-wow-delay="0.3s" data-wow-offset="150">
							<a href="detail.html">
								<img src="media/186x113/aston.jpg" alt="aston" />
								<span class="m-leasing">LEASING AVAILABLE</span>
							</a>
							<div class="b-featured__item-price">
								Rs.30,000
							</div>
							<div class="clearfix"></div>
							<h5><a href="detail.html">HONDA CD-70</a></h5>
							<div class="b-featured__item-count"><span class="fa fa-tachometer"></span>28,000 KM</div>
							<div class="b-featured__item-links">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Red</a>
							</div>
						</div>
					</div>
					<div>
						<div class="b-featured__item wow rotateIn" data-wow-delay="0.3s" data-wow-offset="150">
							<a href="detail.html">
								<img src="media/186x113/jaguar.jpg" alt="jaguar" />
							</a>
							<div class="b-featured__item-price">
								Rs.30,825
							</div>
							<div class="clearfix"></div>
							<h5><a href="detail.html">HONDA CG-125</a></h5>
							<div class="b-featured__item-count"><span class="fa fa-tachometer"></span>15,000 KM</div>
							<div class="b-featured__item-links">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Red</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-featured-->
        <br><br>
        <?php require('inc_footer.php'); ?>
        <?php require('inc_main.php'); ?>
    </body>
</html>