<!DOCTYPE html>
<?php require('../inc_connection.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php require('inc_title.php'); ?>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

	<?php
    if (isset($_POST['Save']))
    {

	$user_type = $_REQUEST['user_type'];
	$user_email = $_REQUEST['user_email'];
	$user_password = $_REQUEST['user_password'];
	$dealer_name = $_REQUEST['dealer_name'];
	$user_name = $_REQUEST['user_name'];
	$user_address = $_REQUEST['user_address'];
	$city_id = $_REQUEST['city_id'];
	$user_phone = $_REQUEST['user_phone'];
	$user_mobile = $_REQUEST['user_mobile'];
      $user_web_url =  $_REQUEST['user_web_url'];   
      $user_fb_page = $_REQUEST['user_fb_page'];
	$user_deal_type = $_REQUEST['user_deal_type'];
	$user_desc = $_REQUEST['user_desc'];
	
	$sql_update = "Update tbl_user set user_type = $user_type,user_password = '$user_password',dealer_name = '$dealer_name', user_name = '$user_name',user_address = '$user_address',city_id = $city_id,user_phone = '$user_phone',user_mobile = '$user_mobile',	user_web_url = '$user_web_url', user_fb_page = '$user_fb_page',user_deal_type = $user_deal_type, user_desc = '$user_desc' where user_email='$user_email'";

	if (!mysql_query($sql_update,$con))
      {
        die('Error: ' . mysql_error());
      }
	else
	{
		$msg = "User profile edited successfully";	
	}
    }
    else
    {
	$msg = "";
    }
   ?>
<?php
$user_id = $_REQUEST['user_id'];
$user_option = $_REQUEST['user_option'];

$query_user = "SELECT * FROM tbl_user where user_id = $user_id";
$result_user = mysql_query($query_user) or die('Error, query failed');
$row_user = mysql_fetch_array($result_user);

$user_type = $row_user['user_type'];
$dealer_name = $row_user['dealer_name'];
$user_name = $row_user['user_name'];
$user_email = $row_user['user_email'];
$user_password = $row_user['user_password'];
$user_address = $row_user['user_address'];
$city_id_master = $row_user['city_id'];
$user_phone = $row_user['user_phone'];
$user_mobile = $row_user['user_mobile'];
$user_web_url = $row_user['user_web_url'];
$user_fb_page = $row_user['user_fb_page'];
$user_brand = $row_user['user_brand'];
$user_deal_type = $row_user['user_deal_type'];
$user_desc = $row_user['user_desc'];
?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <?php require('inc_topnav.php'); ?>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <?php require('inc_sidenav.php'); ?>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit User Profile</h2>
                        <h5>
				<?php
				{
				echo $msg;	
				}
				
				 ?> </h5>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Profile of User / Bike Dealer / Mechanic / Spare Parts Dealer
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <!--<h3>Basic Form Examples</h3>-->
                                    <form role="form" method="post">
							<input type="hidden" value="<?php echo $user_email; ?>" name="user_email"/>
                                        <div class="form-group">
                                            <label>Select Profile Type</label>
                                            <select class="form-control" name="user_type">
                                                <!--<option value=1 <?php //if ($user_type==1) { ?> Selected <?php // } ?>>User</option>-->
                                                <option value=2 <?php if ($user_type==2) { ?> Selected <?php } ?>>Bike Dealer</option>
                                                <option value=3 <?php if ($user_type==3) { ?> Selected <?php } ?>>Mechanic</option>
                                                <option value=4 <?php if ($user_type==4) { ?> Selected <?php } ?>>Spare Parts Dealer</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="<?php echo $user_email; ?>" name="user_email" disabled />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="user_password" />
                                        </div>

                                        <div class="form-group">
                                            <label>Dealer / Shop Name</label>
                                            <input type="text" class="form-control" value="<?php echo $dealer_name; ?>" name="dealer_name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="<?php echo $user_name; ?>" name="user_name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" value="<?php echo $user_address; ?>" name="user_address" />
                                        </div>

                                        <div class="form-group">
                                            <label>Select City</label>
                                            <select class="form-control" name="city_id">
								<option value="0" selected="0">Select City</option>
								<?php
								$query_city = "SELECT city_id, city_name FROM tbl_city where city_status = 1 order by city_id LIMIT 0,100";
								$result_city = mysql_query($query_city) or die('Error, query failed');
								while($row_city = mysql_fetch_array($result_city)) {
									$city_id = $row_city['city_id'];
									$city_name = $row_city['city_name'];
									
									if ($row_city['city_id'] == $city_id_master)
									{
									?>
									<option value="<?php echo $city_id; ?>" selected><?php echo $city_name; ?></option>
									<?php
									}
									else
									{
									?>
									<option value="<?php echo $city_id; ?>"><?php echo $city_name; ?></option>
									<?php
									}
								}
								?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" value="<?php echo $user_phone; ?>" name="user_phone" />
                                        </div>

                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" value="<?php echo $user_mobile; ?>" name="user_mobile" />
                                        </div>

                                        <div class="form-group">
                                            <label>Website URL</label>
                                            <input type="text" class="form-control" value="<?php echo $user_web_url; ?>" name="user_web_url" />
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Facebook Page</label>
                                            <input type="text" class="form-control" value="<?php echo $user_fb_page; ?>" name="user_fb_page" />
                                        </div>

                                        <div class="form-group">
                                            <label>Deals In</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="user_deal_type" id="user_deal_type" value="0" <?php if ($user_deal_type==0) { ?> Checked <?php } ?> />Both
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="user_deal_type" id="user_deal_type" value="1" <?php if ($user_deal_type==1) { ?> Checked <?php } ?> />New
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="user_deal_type" id="user_deal_type" value="2" <?php if ($user_deal_type==2) { ?> Checked <?php } ?>/>Old
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Brands Deal In</label>
                                            <select multiple class="form-control" name="user_brand[]" multiple="multiple">
                                                <option value="0" selected="0">All</option>
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
                                        </div>
						    
						    <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="user_desc" class="form-control" rows=5><?php echo $user_desc; ?></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-default" name="Save">Edit & Save</button>

                                    </form>
                                    <br />
						</div>

                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
