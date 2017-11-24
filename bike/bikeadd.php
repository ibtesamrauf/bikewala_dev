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

        <!--
        <section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.5s">Submit Your Bike</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.5s">
					<h3>Add Your Bike In Our Listings</h3>
				</div>
			</div>
		</section>
        -->
        <!--b-pageHeader-->

        <!--
        <div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.5s">
				<a href="home.html" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="bikeadd.php" class="b-breadCumbs__page m-active">Submit a Bike</a>
			</div>
		</div>
        -->
        <!--b-breadCumbs-->
    <?php

    if (isset($_POST['Submit']))
    {
        $bike_type = $_REQUEST['bike_type'];
        $make_id = $_REQUEST['make_id'];
        $model_id = $_REQUEST['model_id'];
        if ((isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
        {
            $user_id = $_SESSION['user_id'];
        }
        else
        {
            $user_id = 0;
        }
        $bike_mileage = $_REQUEST['bike_mileage'];
        $bike_year = $_REQUEST['bike_year'];
        $bike_price = $_REQUEST['bike_price'];
        $bike_color = $_REQUEST['bike_color'];
        $bike_regno = $_REQUEST['bike_regno'];
        $bike_detail = $_REQUEST['bike_detail'];
        $city_id = $_REQUEST['city_id'];
        $bike_featured = 0;
        $bike_status = 0;
        $bike_date = date("Y/m/d");

        $sqlinsert = "insert into tbl_bike (make_id, model_id, user_id, bike_mileage, bike_year, bike_color, bike_regno, bike_type, bike_price, city_id, bike_detail, bike_featured, bike_date, bike_status) values ($make_id, $model_id, $user_id, $bike_mileage, $bike_year, '$bike_color', '$bike_regno', $bike_type, $bike_price, $city_id, '$bike_detail', $bike_featured, '$bike_date', $bike_status)";
        if (!mysql_query($sqlinsert,$con))
        {
        	die('Error: ' . mysql_error());
        }
        else
        {
        	$bike_id = mysql_insert_id();

            /*
            if(!empty($_POST['bike_feature_name']))
            {
                foreach($_POST['bike_feature_name'] as $bike_feature_name)
                {
           			$sqlins_feature = "INSERT INTO tbl_bike_feature (bike_id, bike_feature_name) VALUES ($$bike_id, '$bike_feature_name')";
           			if (!mysql_query($sqlins_feature,$con))
           			{
           				die('Error: ' . mysql_error());
           			}
                }
            }
            */
            if ((isset($_POST['user_password']) && $_POST['user_password'] != ''))
            {
                $user_password = $_REQUEST['user_password'];
                $seller_city_id = $_REQUEST['bike_seller_city_id'];
              	$user_name = $_REQUEST['bike_seller_name'];
               	$user_mobile = $_REQUEST['bike_seller_contactno'];
               	$user_email = $_REQUEST['bike_seller_email'];
                $user_type = 1;
                $user_status = 1;
           	    $user_date = date("Y/m/d");

         		$sql_user = "select user_email from tbl_user where user_email='$user_email'";
           		$result_user = mysql_query($sql_user) or die('Error: .' . mysql_error());

           		if(@mysql_num_rows($result_user) == 0)
           		{
           			$sqlins_user = "INSERT INTO tbl_user (user_email, user_password, user_name, user_type, city_id, user_mobile, user_status, user_date) VALUES ('$user_email', '$user_password', '$user_name', $user_type, $seller_city_id, '$user_mobile', $user_status, '$user_date')";
           			if (!mysql_query($sqlins_user,$con))
           			{
           				die('Error: ' . mysql_error());
           			}
           			else
           			{
           				$msg = "<strong><font color=red>You have registered to our website successfully. You will receive confirmation email.</font></strong>";
                        $user_id = mysql_insert_id();
                        $sql_update_user = "UPDATE tbl_bike set user_id = $user_id WHERE bike_id = $bike_id";
                        if (!mysql_query($sql_update_user,$con))
                        {
                            die('Error: ' . mysql_error());
                        }
                    }
           		}
           		else
           		{
        			$msg = "<strong><font color=red>You have already registered with our web site. Click on the <a href=signin.php>SIGN IN</a> option to log into our web site.</font></strong>";
           		}
            }
            else
            {
                if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
                {
                    $bike_seller_city_id = $_REQUEST['bike_seller_city_id'];
                  	$bike_seller_name = $_REQUEST['bike_seller_name'];
                   	$bike_seller_contactno = $_REQUEST['bike_seller_contactno'];
                   	$bike_seller_email = $_REQUEST['bike_seller_email'];

                    $sql_update = "UPDATE tbl_bike set bike_seller_city_id = $bike_seller_city_id, bike_seller_name = '$bike_seller_name', bike_seller_contactno = '$bike_seller_contactno', bike_seller_email = '$bike_seller_email'  WHERE bike_id = $bike_id";
                    if (!mysql_query($sql_update,$con))
                    {
                        die('Error: ' . mysql_error());
                    }
                }
            }
        }
    }
    ?>

        <div class="b-submit">
			<div class="container">
				<div class="row">
                    <!--
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
                    -->
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<header class="s-headerSubmit s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
								<h2 class="">Add Your Bike Details</h2>
							</header>
							<form class="s-submit clearfix" action="bikeadd.php" method="POST">
								<div class="row">
									<div class="col-md-6 col-xs-12">

										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.5s">
											<label>Select Type</label>
											<div class='s-relative'>
												<select class="m-select" name="bike_type">

													<option value="1" selected>New</option>
													<option value="2">Used</option>
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
                                            <label>City<span>*</span></label>
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
											<div class='s-relative'>
												<label>Sale Price <span>*</span></label>
												<input placeholder="Sale Price" type="text" name="bike_price" />
											</div>
										</div>
									</div>
								</div>
                                <br>

                                <div class="b-submit__main-file wow zoomInUp" data-wow-delay="0.3s">
                                    <header class="s-headerSubmit s-lineDownLeft">
                                        <h2>Write Additional Comments</h2>
                                    </header>
                                    <!--
									<p>Features</p>
                                <div class="row">
									<div class="col-md-6 col-xs-12">
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.3s">
											<input type="checkbox" name="bike_feature_name1" id="bike_feature_name1" value="Anti Lock Braking System (ABS)" />
											<label class="s-submitCheckLabel" for="bike_feature_name1"><span class="fa fa-check"></span></label>
											<label class="s-submitCheck" for="bike_feature_name1">Anti Lock Braking System (ABS)</label>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.3s">
											<input type="checkbox" name="bike_feature_name2" id="bike_feature_name2" value="BS Type Carburetor Fuel System" />
											<label class="s-submitCheckLabel" for="bike_feature_name2"><span class="fa fa-check"></span></label>
											<label class="s-submitCheck" for="bike_feature_name2">BS Type Carburetor Fuel System</label>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.3s">
											<input type="checkbox" name="bike_feature_name3" id="bike_feature_name3" value="Decompressor Kick Start System" />
											<label class="s-submitCheckLabel" for="bike_feature_name3"><span class="fa fa-check"></span></label>
											<label class="s-submitCheck" for="bike_feature_name3">Decompressor Kick Start System</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.3s">
											<input type="checkbox" name="bike_feature_name4" id="bike_feature_name4" value="CDI Ignition System" />
											<label class="s-submitCheckLabel" for="bike_feature_name4"><span class="fa fa-check"></span></label>
											<label class="s-submitCheck" for="bike_feature_name4">CDI&nbsp;Ignition System</label>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.3s">
											<input type="checkbox" name="bike_feature_name5" id="bike_feature_name5" value="Gear Indicator" />
											<label class="s-submitCheckLabel" for="bike_feature_name5"><span class="fa fa-check"></span></label>
											<label class="s-submitCheck" for="bike_feature_name5">Gear Indicator</label>
										</div>
										<div class="b-submit__main-element wow zoomInUp" data-wow-delay="0.3s">
											<input type="checkbox" name="bike_feature_name6" id="bike_feature_name6" value="4-Speed Transmission" />
											<label class="s-submitCheckLabel" for="bike_feature_name6"><span class="fa fa-check"></span></label>
											<label class="s-submitCheck" for="bike_feature_name6">4-Speed Transmission </label>
										</div>
									</div>
								</div>-->
                                    <textarea name="bike_detail" cols="75"></textarea>
                                </div>
                                <div class="b-submit__main-file wow zoomInUp" data-wow-delay="0.3s">
										<header class="s-headerSubmit s-lineDownLeft wow zoomInUp" data-wow-delay="0.3s">
											<h2>Upload Your Bike Photos</h2>
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

                                <?php
                                if (!(isset($_SESSION['user_id']) && $_SESSION['user_id'] != ''))
                                {
                                ?>
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
    												<label>Choose Password  <span>(By choosing password you will be our registered user)</span></label>
    												<input type="text" name="user_password" />
    											</div>
    										</div>
    										<div class="col-md-6 col-xs-12">
    											<div class="b-submit__main-element">
    												<label>Confirm Password  <span><br><br></span></label>
    												<input type="text" name="user_password" />
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
    												<label>City  <span>*</span></label>
    												<div class='s-relative'>
    													<select class="m-select" name="bike_seller_city_id">
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
                                <?php
                                }
                                ?>
                                <button name="Submit"  type="submit" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.5s">SUBMIT<span class="fa fa-angle-right"></span></button>
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