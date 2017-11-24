<!DOCTYPE html>
<?php require('inc_connection.php'); ?>
<?php require('inc_session.php'); ?>
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
$user_id = $_REQUEST['user_id'];

$query_user = "SELECT * FROM tbl_user where user_id = $user_id";
$result_user = mysql_query($query_user) or die('Error, query failed');
$row_user = mysql_fetch_array($result_user);

$user_id = $row_user['user_id'];
$user_type = $row_user['user_type'];
$dealer_name = $row_user['dealer_name'];
$user_name = $row_user['user_name'];
$user_email = $row_user['user_email'];
$user_password = $row_user['user_password'];
$user_address = $row_user['user_address'];
$city_id = $row_user['city_id'];
$user_phone = $row_user['user_phone'];
$user_mobile = $row_user['user_mobile'];
$user_fb_page = $row_user['user_fb_page'];
$user_brand = $row_user['user_brand'];
$user_deal_type = $row_user['user_deal_type'];
$user_status = $row_user['user_status'];
$user_date = $row_user['user_date'];

$query_city = "SELECT city_name FROM tbl_city where city_id = $city_id";
$result_city = mysql_query($query_city) or die('Error, query failed');
$row_city = mysql_fetch_array($result_city);
$city_name = $row_city['city_name'];

if ($user_deal_type == 0)
{
	$user_deal_type = "Old & New Bikes";	
}
else if ($user_deal_type == 1)
{
	$user_deal_type = "New Bikes";	
}
else if ($user_deal_type == 2)
{
	$user_deal_type = "Old Bikes";
}


if ($user_type == 1)
{
	$user_type = "Individual";	
}
else if ($user_type == 2)
{
	$user_type = "Bike Dealer";	
}
else if ($user_type == 3)
{
	$user_type = "Mechanic";
}
else if ($user_type == 4)
{
	$user_type = "Spare Parts Dealer";
}
?>


    <body class="m-detail" data-scrolling-animations="false" data-equal-height=".b-auto__main-item">

		<?php require('inc_loader.php'); ?>
		<?php require('inc_modal.php'); ?>
		<?php require('inc_header.php'); ?>
		<?php require('inc_nav.php'); ?>

		<section class="b-pageHeader">
			<div class="container">
				<h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Bike Detail</h1>
			</div>
		</section><!--b-pageHeader-->


		<div class="b-breadCumbs s-shadow wow zoomInUp" data-wow-delay="0.5s">
			<div class="container">
				<a href="index.php" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="bikelisting.php" class="b-breadCumbs__page m-active">Search Results</a><span class="fa fa-angle-right"></span><a href="detail.php" class="b-breadCumbs__page m-active">Detail</a>
			</div>
		</div><!--b-breadCumbs-->

		<!--<div class="b-infoBar">
			<div class="container">
			</div>
		</div>
        -->
        <!--b-infoBar-->

		<section class="b-detail s-shadow">
			<div class="container">
				<header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
					<div class="row">
						<div class="col-sm-9 col-xs-12">
							<div class="b-detail__head-title">
								<h1><?php echo $user_name; ?></h1>
								<!--<h3>Fully Redesigned Upscale Midsize Bike</h3>-->
							</div>
						</div>
						<div class="col-sm-3 col-xs-12">
							<div class="b-detail__head-price">
								<div class="b-detail__head-price-num"><?php echo $user_type; ?></div>
								
							</div>
						</div>
					</div>
				</header>
				<div class="b-detail__main">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<div class="b-detail__main-info">



								<div class="b-detail__main-info-characteristics wow zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">Details</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Dealer / Shop Name</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php	echo $dealer_name; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Email</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $user_email; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Address</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $user_address; ?></p>
										</div>
									</div>
									
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">City</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value">
												<?php
												$query_city = "SELECT city_name FROM tbl_city where city_id = $city_id";
												$result_city = mysql_query($query_city) or die('Error, query failed');
												$row_city = mysql_fetch_array($result_city);
												$city_name = $row_city['city_name'];
												echo $city_name;
												?>
											</p>
										</div>
									</div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h4 class="b-detail__main-aside-desc-title">Phone No.</h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="b-detail__main-aside-desc-value"><?php echo $user_phone; ?></p>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Mobile No.</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $user_mobile; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Facebook Page</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php	echo $user_fb_page; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Deals In</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php	echo $user_deal_type; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Brands Deal In</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value">
									  <?php
									  if ($user_brand==0)
									  {
										echo "All Brands";
									  }
									  else
									  {
										$query_make = "SELECT make_name FROM tbl_make where make_id in ($user_brand)";
										$result_make = mysql_query($query_make) or die('Error, query failed');
										
										while($row_make = mysql_fetch_array($result_make))
										{
										    $make_name = $row_make['make_name'];
										    echo $make_name."<br>";
										}
									  }
									  ?>
											</p>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="col-md-4 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
							<a href="#" class="btn m-btn m-infoBtn">ADD TO FAVOURITES<span class="fa fa-angle-right"></span></a>
							<a href="#" class="btn m-btn m-infoBtn">PRINT THIS PAGE<span class="fa fa-angle-right"></span></a>

									<h2 class="s-titleDet">INQUIRE ABOUT THIS <?php echo $user_type; ?></h2>
									<div class="b-detail__main-aside-about-call">
										<span class="fa fa-phone"></span>
										<div><?php echo $bike_seller_contactno; ?></div>
										<!--<p>Call the seller 24/7 and they would help you.</p>-->
									</div>
									<div class="b-detail__main-aside-about-seller">
										<p>Your Info: <span><?php echo $bike_seller_name; ?></span></p>
									</div>
									<div class="b-detail__main-aside-about-form">
										<!--
										<div class="b-detail__main-aside-about-form-links">
											<a href="#" class="j-tab m-active s-lineDownCenter" data-to='#form1'>GENERAL INQUIRY</a>
										</div>
										-->
										<form id="form1" action="/" method="post">
											<input type="text" placeholder="YOUR NAME" value="" name="name" />
											<input type="email" placeholder="EMAIL ADDRESS" value="" name="email" />
											<input type="tel" placeholder="PHONE NO." value="" name="name" />
											<textarea name="text" placeholder="message"></textarea>
											<div><input type="checkbox" name="one" value="" /><label>Send me a copy of this message</label></div>
											<!--<div><input type="checkbox" name="two" value="" /><label>Send me a copy of this message</label></div>-->
											<button type="submit" class="btn m-btn">SEND MESSAGE<span class="fa fa-angle-right"></span></button>
										</form>
										<form id="form2" action="/" method="post">
											<input type="text" placeholder="YOUR NAME" value="" name="name" />
											<textarea name="text" placeholder="message"></textarea>
											<div><input type="checkbox" name="one" value="" /><label>Send me a copy of this message</label></div>
											<div><input type="checkbox" name="two" value="" /><label>Send me a copy of this message</label></div>
											<button type="submit" class="btn m-btn">SEND MESSAGE<span class="fa fa-angle-right"></span></button>
										</form>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</section><!--b-detail-->

		<section class="b-related m-home">
			<div class="container">
				<h5 class="s-titleBg wow zoomInUp" data-wow-delay="0.5s">FIND OUT MORE</h5><br />
				<h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">RELATED BIKES ON SALE</h2>
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
							<img class="img-responsive center-block"  src="media/270x150/LandRover.jpg" alt="LandRover" />
							<div class="b-world__item-val">
								<span class="b-world__item-val-title">REGISTERED <span>2014</span></span>
							</div>
							<h2><a href="detail.html">Honda CD 70</a></h2>
							<div class="b-auto__main-item-info s-lineDownLeft">
								<span class="m-price">
									Rs 44,380
								</span>
								<span class="m-number">
									<span class="fa fa-tachometer"></span>35,000 KM
								</span>
							</div>
							<div class="b-featured__item-links m-auto">
								<a href="#">Used</a>
								<a href="#">2014</a>
								<a href="#">Dark Grey</a>

							</div>
						</div>
					</div>

                    <div class="col-md-3 col-xs-6">
                        <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                            <img class="img-responsive center-block"  src="media/270x150/LandRover.jpg" alt="LandRover" />
                            <div class="b-world__item-val">
                                <span class="b-world__item-val-title">REGISTERED <span>2012</span></span>
                            </div>
                            <h2><a href="detail.html">Yamaha MBR 125</a></h2>
                            <div class="b-auto__main-item-info s-lineDownLeft">
								<span class="m-price">
									Rs 23,500
								</span>
								<span class="m-number">
									<span class="fa fa-tachometer"></span>15,000 KM
								</span>
                            </div>
                            <div class="b-featured__item-links m-auto">
                                <a href="#">Used</a>
                                <a href="#">2012</a>
                                <a href="#">Blue</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="b-auto__main-item wow zoomInLeft" data-wow-delay="0.5s">
                            <img class="img-responsive center-block"  src="media/270x150/LandRover.jpg" alt="LandRover" />
                            <div class="b-world__item-val">
                                <span class="b-world__item-val-title">REGISTERED <span>2016</span></span>
                            </div>
                            <h2><a href="detail.html">Suzuki Intruder</a></h2>
                            <div class="b-auto__main-item-info s-lineDownLeft">
								<span class="m-price">
									Rs 123,500
								</span>
								<span class="m-number">
									<span class="fa fa-tachometer"></span>10 KM
								</span>
                            </div>
                            <div class="b-featured__item-links m-auto">
                                <a href="#">New</a>
                                <a href="#">2016</a>
                                <a href="#">Red</a>
                            </div>
                        </div>
                    </div>


				</div>
			</div>
		</section><!--"b-related-->
		<?php require('inc_footer.php'); ?>
		<?php require('inc_main.php'); ?>
	</body>
</html>