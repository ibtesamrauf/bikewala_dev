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
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>


<?php
if ($_REQUEST['user_option']==0 || $_REQUEST['user_option']==1)
{

    $user_id = $_REQUEST['user_id'];
    $user_option = $_REQUEST['user_option'];

    $sql_update = "UPDATE tbl_user set user_status = $user_option  WHERE user_id = $user_id";

    if (!mysql_query($sql_update,$con))
    {
        die('Error: ' . mysql_error());
    }

}
?>

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
$user_web_url = $row_user['user_web_url'];
$user_fb_page = $row_user['user_fb_page'];
$user_brand = $row_user['user_brand'];
$user_deal_type = $row_user['user_deal_type'];
$user_desc =  $row_user['user_desc'];
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
                     <h2><?php echo $user_type; ?> Detail</h2>
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->

                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <p>
                            <div class="row">
                                <div class="col-md-6">
                                    <!--    Hover Rows  -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Information
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <tr>
                                                        <td>Type</td>
                                                        <td>
                                                            <?php	echo $user_type; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dealer / Shop Name</td>
                                                        <td><?php	echo $dealer_name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Owner Name</td>
                                                        <td><?php	echo $user_name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><?php	echo $user_email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Password</td>
                                                        <td><?php	echo $user_password; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td><?php	echo $user_address; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td><?php	echo $city_name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone Number</td>
                                                        <td><?php	echo $user_phone; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number</td>
                                                        <td><?php	echo $user_mobile; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Website URL</td>
                                                        <td><?php	echo $user_web_url; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Facebook Page</td>
                                                        <td><?php	echo $user_fb_page; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Deals In</td>
                                                        <td><?php	echo $user_deal_type; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brands Deal In</td>
                                                        <td>
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
									  ?></td>
                                                    </tr>								    
                                                    <tr>
                                                        <td>Description</td>
                                                        <td><?php	echo $user_desc; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Status</td>
                                                        <td>
                                                            <?php if ($user_status==1)
                                                            {
                                                                echo 'Enable';
                                                            }
                                                            else
                                                            {
                                                                echo 'Disabled';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>User created on</td>
                                                        <td><?php echo $user_date;?></td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End  Hover Rows  -->
                                </div>
                            </div>
                            <!-- /. ROW  -->

                            </p>

                            <p>

                                <?php if ($user_status==1)
                                {
                                ?>
                                    <a href="user_detail.php?user_id=<?php echo $user_id; ?>&user_option=0" class="btn btn-primary btn-lg" role="button">Disable User </a>
                                <?php
                                }
                                else
                                {
                                ?>
                                    <a href="user_detail.php?user_id=<?php echo $user_id; ?>&user_option=1" class="btn btn-primary btn-lg" role="button">Enable User</a>
                                <?php
                                }
                                ?>
                            
				    <a href="user_edit_detail.php?user_id=<?php echo $user_id; ?>&user_option=3" class="btn btn-primary btn-lg" role="button">Edit User</a>
				    
				    </p>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->


    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
