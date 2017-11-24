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

		<script type="text/javascript" src="slider/js/jssor.slider.min.js"></script>


		<script>
			jssor_1_slider_init = function() {

				var jssor_1_SlideshowTransitions = [
					{$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
				];

				var jssor_1_options = {
					$AutoPlay: true,
					$SlideshowOptions: {
						$Class: $JssorSlideshowRunner$,
						$Transitions: jssor_1_SlideshowTransitions,
						$TransitionsOrder: 1
					},
					$ArrowNavigatorOptions: {
						$Class: $JssorArrowNavigator$
					},
					$ThumbnailNavigatorOptions: {
						$Class: $JssorThumbnailNavigator$,
						$Cols: 10,
						$SpacingX: 8,
						$SpacingY: 8,
						$Align: 360
					}
				};

				var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

				//responsive code begin
				//you can remove responsive code if you don't want the slider scales while window resizing
				function ScaleSlider() {
					var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
					if (refSize) {
						refSize = Math.min(refSize, 800);
						jssor_1_slider.$ScaleWidth(refSize);
					}
					else {
						window.setTimeout(ScaleSlider, 30);
					}
				}
				ScaleSlider();
				$Jssor$.$AddEvent(window, "load", ScaleSlider);
				$Jssor$.$AddEvent(window, "resize", ScaleSlider);
				$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
				//responsive code end
			};
		</script>

		<style>

			/* jssor slider arrow navigator skin 05 css */
			/*
            .jssora05l                  (normal)
            .jssora05r                  (normal)
            .jssora05l:hover            (normal mouseover)
            .jssora05r:hover            (normal mouseover)
            .jssora05l.jssora05ldn      (mousedown)
            .jssora05r.jssora05rdn      (mousedown)
            */
			.jssora05l, .jssora05r {
				display: block;
				position: absolute;
				/* size of arrow element */
				width: 40px;
				height: 40px;
				cursor: pointer;
				background: url('img/a17.png') no-repeat;
				overflow: hidden;
			}
			.jssora05l { background-position: -10px -40px; }
			.jssora05r { background-position: -70px -40px; }
			.jssora05l:hover { background-position: -130px -40px; }
			.jssora05r:hover { background-position: -190px -40px; }
			.jssora05l.jssora05ldn { background-position: -250px -40px; }
			.jssora05r.jssora05rdn { background-position: -310px -40px; }

			/* jssor slider thumbnail navigator skin 01 css */
			/*
            .jssort01 .p            (normal)
            .jssort01 .p:hover      (normal mouseover)
            .jssort01 .p.pav        (active)
            .jssort01 .p.pdn        (mousedown)
            */
			.jssort01 .p {
				position: absolute;
				top: 0;
				left: 0;
				width: 72px;
				height: 72px;
			}

			.jssort01 .t {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				border: none;
			}

			.jssort01 .w {
				position: absolute;
				top: 0px;
				left: 0px;
				width: 100%;
				height: 100%;
			}

			.jssort01 .c {
				position: absolute;
				top: 0px;
				left: 0px;
				width: 68px;
				height: 68px;
				border: #000 2px solid;
				box-sizing: content-box;
				background: url('img/t01.png') -800px -800px no-repeat;
				_background: none;
			}

			.jssort01 .pav .c {
				top: 2px;
				_top: 0px;
				left: 2px;
				_left: 0px;
				width: 68px;
				height: 68px;
				border: #000 0px solid;
				_border: #fff 2px solid;
				background-position: 50% 50%;
			}

			.jssort01 .p:hover .c {
				top: 0px;
				left: 0px;
				width: 70px;
				height: 70px;
				border: #fff 1px solid;
				background-position: 50% 50%;
			}

			.jssort01 .p.pdn .c {
				background-position: 50% 50%;
				width: 68px;
				height: 68px;
				border: #000 2px solid;
			}

			* html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
				/* ie quirks mode adjust */
				width /**/: 72px;
				height /**/: 72px;
			}

		</style>

	</head>

    <?php
    //$bike_id = $_REQUEST['bike_id'];
	$bike_id = 1;

    $query_bike = "SELECT * FROM tbl_bike where bike_id = $bike_id";
    $result_bike = mysql_query($query_bike) or die('Error, query failed');
    $row_bike = mysql_fetch_array($result_bike);

    $make_id = $row_bike['make_id'];

    $query_make = "SELECT make_id, make_name FROM tbl_make where make_id = $make_id";
    $result_make = mysql_query($query_make) or die('Error, query failed');
    $row_make = mysql_fetch_array($result_make);
    $make_name = $row_make['make_name'];

    $model_id = $row_bike['model_id'];

    $query_model = "SELECT model_name FROM tbl_model where model_id = $model_id";
    $result_model = mysql_query($query_model) or die('Error, query failed');
    $row_model = mysql_fetch_array($result_model);
    $model_name = $row_model['model_name'];

    $bike_id = $row_bike['bike_id'];
    $city_id = $row_bike['city_id'];
    $bike_mileage = $row_bike['bike_mileage'];
    $bike_year = $row_bike['bike_year'];
    $bike_color = $row_bike['bike_color'];
    $bike_regno = $row_bike['bike_regno'];
    $bike_engine_type = $row_bike['bike_engine_type'];
    $bike_price = $row_bike['bike_price'];
    $bike_detail = $row_bike['bike_detail'];
    $bike_seller_name = $row_bike['bike_seller_name'];
    $bike_seller_contactno = $row_bike['bike_seller_contactno'];
    $bike_featured = $row_bike['bike_featured'];
    $bike_date = $row_bike['bike_date'];

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
								<h1><?php echo $make_name; ?> <?php echo $model_name; ?></h1>
								<h3>Fully Redesigned Upscale Midsize Bike</h3>
							</div>
						</div>
						<div class="col-sm-3 col-xs-12">
							<div class="b-detail__head-price">
								<div class="b-detail__head-price-num">Rs 35,000<?php //echo number_format($bike_price); ?></div>
								<p>Included Taxes</p>
							</div>
						</div>
					</div>
				</header>
				<div class="b-detail__main">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<div class="b-detail__main-info">
								<div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
									<div class="row m-smallPadding">
										<div class="col-xs-10">
													<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #b4b4b4;">
														<!-- Loading Screen -->
														<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
															<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
															<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
														</div>
														<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">

																<?php
																$cnt = 0;
																foreach (glob("upload4/server/php/".$bike_id."/*.*") as $filename)
																{
																	?>
															<div data-p="144.50" style="display: none;">
																	<img data-u="image" src="<?php echo $filename; ?>" />
																	<img data-u="thumb" src="<?php echo $filename; ?>" />
															</div>
																	<?php
																}
																?>
														</div>
														<!-- Thumbnail Navigator -->
														<div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
															<!-- Thumbnail Item Skin Begin -->
															<div data-u="slides" style="cursor: default;">
																<div data-u="prototype" class="p">
																	<div class="w">
																		<div data-u="thumbnailtemplate" class="t"></div>
																	</div>
																	<div class="c"></div>
																</div>
															</div>
															<!-- Thumbnail Item Skin End -->
														</div>
														<!-- Arrow Navigator -->
														<span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
														<span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
														<a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
													</div>
													<script>
														jssor_1_slider_init();
													</script>

													<!--<img class="img-responsive center-block" src="upload4/server/php/100/bike_banner3.jpg" alt="nissan" />-->
										</div>
										<div class="col-xs-2">
											<div class="b-detail__main-info-images-small" id="bx-pager">
											</div>
										</div>
									</div>
								</div>


								<div class="b-detail__main-info-characteristics wow zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">Description</h2>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Make</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $make_name; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Model</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $model_name; ?></p>
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
                                            <h4 class="b-detail__main-aside-desc-title">Registration No.</h4>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="b-detail__main-aside-desc-value"><?php echo $bike_regno; ?></p>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Mileage</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $bike_mileage; ?> km</p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Color</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $bike_color; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<h4 class="b-detail__main-aside-desc-title">Year</h4>
										</div>
										<div class="col-xs-6">
											<p class="b-detail__main-aside-desc-value"><?php echo $bike_year; ?></p>
										</div>
									</div>

								</div>

								<div class="b-detail__main-info-extra wow zoomInUp" data-wow-delay="0.5s">
									<h2 class="s-titleDet">ADDITIONAL FEATURES</h2>
									<div class="row">
										<div class="col-xs-4">
											<ul>
												<li><span class="fa fa-check"></span>Security System</li>
												<li><span class="fa fa-check"></span>Air Conditioning</li>
												<li><span class="fa fa-check"></span>Alloy Wheels</li>
											</ul>
										</div>
										<div class="col-xs-4">
											<ul>
												<li><span class="fa fa-check"></span>Dual Airbag</li>
												<li><span class="fa fa-check"></span>Intermittent Wipers</li>
												<li><span class="fa fa-check"></span>Keyless Entry</li>
											</ul>
										</div>
									</div>
								</div>
                                 <br><br>
								<div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
									<div class="b-detail__main-aside-about-form-links">
										<a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'>GENERAL INFORMATION</a>
										<!--
										<a href="#" class="j-tab" data-to='#info2'>SCHEDULE TEST DRIVE</a>
										<a href="#" class="j-tab" data-to='#info3'>GENERAL INQUIRY</a>
										<a href="#" class="j-tab" data-to='#info4'>SCHEDULE TEST DRIVE</a>
										-->
									</div>
									<div id="info1">
										<p><?php echo $bike_detail; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12">
							<aside class="b-detail__main-aside">
								<div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
							<a href="#" class="btn m-btn m-infoBtn">ADD TO FAVOURITES<span class="fa fa-angle-right"></span></a>
							<a href="#" class="btn m-btn m-infoBtn">PRINT THIS PAGE<span class="fa fa-angle-right"></span></a>

									<h2 class="s-titleDet">INQUIRE ABOUT THIS BIKE</h2>
									<div class="b-detail__main-aside-about-call">
										<span class="fa fa-phone"></span>
										<div><?php echo $bike_seller_contactno; ?></div>
										<!--<p>Call the seller 24/7 and they would help you.</p>-->
									</div>
									<div class="b-detail__main-aside-about-seller">
										<p>Seller Info: <span><?php echo $bike_seller_name; ?></span></p>
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