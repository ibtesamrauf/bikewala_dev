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
	<body class="m-listings" data-scrolling-animations="false" >

        <?php require('inc_loader.php'); ?>
        <?php require('inc_modal.php'); ?>
        <?php require('inc_header.php'); ?>
        <?php require('inc_nav.php'); ?>

<?php
$query_user = "SELECT * FROM tbl_user order by user_id DESC LIMIT 0,100";
$result_user = mysql_query($query_user) or die('Error, query failed');
$rowcount = mysql_num_rows($result_user);

?>

		<section class="b-pageHeader">
			<div class="container">
				<h1 class=" wow zoomInLeft" data-wow-delay="0.5s">Buy a Bike</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
					<h3>Your search returned <strong>2</strong> results</h3>
				</div>
			</div>
		</section><!--b-pageHeader-->

		<div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.5s">
				<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="listings.html" class="b-breadCumbs__page m-active">Search Results</a>
			</div>
		</div><!--b-breadCumbs-->

		<div class="b-infoBar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-xs-12">
						<div class="b-infoBar__compare wow zoomInUp" data-wow-delay="0.5s">
							<div class="dropdown">
								<a href="#" class="dropdown-toggle b-infoBar__compare-item" data-toggle='dropdown'><span class="fa fa-clock-o"></span>RECENTLY VIEWED<span class="fa fa-caret-down"></span></a>
								<ul class="dropdown-menu">
									<li><a href="detail.html">Item</a></li>
									<li><a href="detail.html">Item</a></li>
									<li><a href="detail.html">Item</a></li>
									<li><a href="detail.html">Item</a></li>
								</ul>
							</div>
							<a href="compare.html" class="b-infoBar__compare-item"><span class="fa fa-compress"></span>COMPARE VEHICLES: 2</a>
						</div>
					</div>
					<div class="col-lg-8 col-xs-12">
						<div class="b-infoBar__select">
							<form method="post" action="/">
								<div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s">
									<span class="b-infoBar__select-one-title">SELECT VIEW</span>
									<a href="listingsTwo.html" class="m-list m-active"><span class="fa fa-list"></span></a>
									<a href="listTable.html" class="m-table"><span class="fa fa-table"></span></a>
								</div>
								<div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s">
									<span class="b-infoBar__select-one-title">SHOW ON PAGE</span>
									<select name="select1" class="m-select">
										<option value="" selected="">10 items</option>
									</select>
									<span class="fa fa-caret-down"></span>
								</div>
								<div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s">
									<span class="b-infoBar__select-one-title">SORT BY</span>
									<select name="select2" class="m-select">
										<option value="" selected="">Last Added</option>
									</select>
									<span class="fa fa-caret-down"></span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-infoBar-->

		<section class="b-items s-shadow">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-sm-8 col-xs-12">
						<div class="b-items__cars">
                                <?php
                                if ($rowcount==0)
                                {
                                    echo("No result found");
                                }
                                else
								{
                                    while ($row_user = mysql_fetch_array($result_user)) {
                                        $user_id = $row_user['user_id'];
                                        $user_type = $row_user['user_type'];
									    $dealer_name = $row_user['dealer_name'];
                                        $user_name = $row_user['user_name'];
									    $user_email = $row_user['user_email'];
									    $user_address = $row_user['user_address'];
									    $city_id = $row_user['city_id'];
									    $user_phone = $row_user['user_phone'];
									    $user_mobile = $row_user['user_mobile'];
										$user_deal_type = $row_user['user_deal_type'];
                                        
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
							
							<div class="b-items__cars-one wow zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__cars-one-img">
									<img src="media/270x230/dodge.jpg" alt='dodge'/>
									<a data-toggle="modal" data-target="#myModal" href="#" class="b-items__cars-one-img-video"><span class="fa fa-film"></span>VIDEO</a>
									<span class="b-items__cars-one-img-type m-premium">PREMIUM</span>
									<form action="/" method="post">
										<input type="checkbox" name="check1" id='check1'/>
										<label for="check1" class="b-items__cars-one-img-check"><span class="fa fa-check"></span></label>
									</form>
								</div>
								<div class="b-items__cars-one-info">
									<header class="b-items__cars-one-info-header s-lineDownLeft">
										<h2><?php echo $user_name ?></h2>
										<span><?php echo $user_type ?></span>
									</header>
									<p>
										<?php echo $user_address ?> 
									</p>
									<div class="b-items__cars-one-info-km">
										<!--<span class="fa fa-tachometer"></span> 31,730 KM-->
									</div>
									<div class="b-items__cars-one-info-details">
										<div class="b-featured__item-links">
											<a href="#">City <?php echo $city_name;?></a>
											<a href="#">Deals In <?php echo $user_deal_type; ?></a>
                                            <a href="#"><?php echo $user_mobile; ?></a>
										</div>
										<a href="user_detail.php?user_id=<?php echo $user_id;?>" class="btn m-btn">DETAILS<span class="fa fa-angle-right"></span></a>
									</div>
								</div>
							</div>
                                        <?php
                                    }
                                }
                                ?>


						</div>
						<div class="b-items__pagination wow zoomInUp" data-wow-delay="0.5s">
							<div class="b-items__pagination-main">
								<a data-toggle="modal" data-target="#myModal" href="#" class="m-left"><span class="fa fa-angle-left"></span></a>
								<span class="m-active"><a href="#">1</a></span>
								<span><a href="#">2</a></span>
								<span><a href="#">3</a></span>
								<span><a href="#">4</a></span>
								<a href="#" class="m-right"><span class="fa fa-angle-right"></span></a>    
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-4 col-xs-12">
						<aside class="b-items__aside">
							<h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">REFINE YOUR SEARCH</h2>
							<div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
								<form>
									<div class="b-items__aside-main-body">
										<div class="b-items__aside-main-body-item">
											<label>SELECT A MAKE</label>
											<div>
												<select name="select1" class="m-select">
                                               <option value="" selected="">Any Make</option>
                                                <option value="">Honda</option>
                                                <option value="">Suzuki</option>
                                                <option value="">Yamaha</option>
                                                <option value="">Treet</option>
                                                <option value="">Eagle</option>
                                                <option value="">Metro</option>

												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item">
											<label>SELECT A MODEL</label>
											<div>
												<select name="select1" class="m-select">
                                                <option value="" selected="">Any Make</option>
                                                <option value="">Honda CG 125</option>
                                                <option value="">Honda CD 70</option>
                                                <option value="">Honda Deluxe</option>
                                                <option value="">Suzuki Bandit</option>
                                                <option value="">Suzuki Intruder</option>
                                                <option value="">Suzuki Sprinter</option>
                                                <option value="">Yamaha YBR 125</option>
                                                <option value="">Yamaha Dhoom</option>
                                                <option value="">Yamaha Royale</option>
                                                <option value="">Yamaha Junoon</option>
												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
										<div class="b-items__aside-main-body-item">
											<label>PRICE RANGE</label>
											<div class="slider"></div>
											<input type="hidden" name="min" value="100" class="j-min" />
											<input type="hidden" name="max" value="1000" class="j-max" />
										</div>
										<div class="b-items__aside-main-body-item">
											<label>SELECT CITY</label>
											<div>
												<select name="select1" class="m-select">
                                                <option value="" selected="">Any City</option>
                                                <option value="">Karachi</option>
                                                <option value="">Lahore</option>
                                                <option value="">Islamabad</option>
                                                <option value="">Peshawar</option>
                                                <option value="">Quetta</option>

												</select>
												<span class="fa fa-caret-down"></span>
											</div>
										</div>
									</div>
									<footer class="b-items__aside-main-footer">
										<button type="submit" class="btn m-btn">FILTER BIKES<span class="fa fa-angle-right"></span></button><br />
										<a href="">RESET ALL FILTERS</a>
									</footer>
								</form>
							</div>
							<div class="b-items__aside-sell wow zoomInUp" data-wow-delay="0.5s">
								<div class="b-items__aside-sell-img">
									<h3>SELL YOUR BIKE</h3>
								</div>
								<div class="b-items__aside-sell-info">
									<p>
										Nam tellus enimds eleifend dignis lsim
										biben edum tristique sed metus fusce
										Maecenas lobortis.
									</p>
									<a href="submit1.html" class="btn m-btn">REGISTER NOW<span class="fa fa-angle-right"></span></a>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</section><!--b-items-->

		<?php require('inc_feature.php'); ?>
        <?php require('inc_info.php'); ?>
		<?php require('inc_footer.php'); ?>
		<?php require('inc_main.php'); ?>


	</body>
</html>