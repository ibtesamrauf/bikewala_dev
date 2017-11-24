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
$query_user = "SELECT * FROM tbl_user order by user_id DESC LIMIT 0,100";
$result_user = mysql_query($query_user) or die('Error, query failed');
$rowcount = mysql_num_rows($result_user);

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
                     <h2>Directory</h2>
                        <h5>View Individuals / Bike Dealers / Mechanics / Spare Parts Dealers Listing </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             User list
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Dealer / Shop Name</th>
                                            <th>Owner Name</th>
                                            <th>Email</th>
                                            
                                            <th>City</th>
                                            
							  <th>Mobile No</th>
							  <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                if ($rowcount==0)
                                {
                                    echo("No result found");
                                }
                                else {
                                    while ($row_user = mysql_fetch_array($result_user)) {
                                        $user_id = $row_user['user_id'];
                                        $user_type = $row_user['user_type'];
						    $dealer_name = $row_user['dealer_name'];
                                        $user_name = $row_user['user_name'];
						    $user_email = $row_user['user_email'];
						    
						    $city_id = $row_user['city_id'];
						    
						    $user_mobile = $row_user['user_mobile'];

                                        $query_city = "SELECT city_name FROM tbl_city where city_id = $city_id";
                                        $result_city = mysql_query($query_city) or die('Error, query failed');
                                        $row_city = mysql_fetch_array($result_city);
                                        $city_name = $row_city['city_name'];

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
                                        <tr class="odd gradeX">
                                            <td> <?php echo $user_type; ?></td>
                                            <td> <?php echo $dealer_name; ?></td>
                                            <td> <?php echo $user_name; ?></td>
                                            <td> <?php echo $user_email; ?></td>
                                            
                                            <td> <?php echo $city_name; ?></td>
                                            
							  <td> <?php echo $user_mobile; ?></td>
                                            <td align="center">
								<?php
								
								if ($row_user['user_type'] == 4) { ?>
									<a href="user_inventory.php?user_id=<?php echo $user_id;?>&user_option=3" class="btn btn-primary btn-xs">Inventory</a>
								<?php } ?>
							  </td>
							  <td align="center"> <a href="user_detail.php?user_id=<?php echo $user_id;?>&user_option=3" class="btn btn-primary btn-xs">View Detail</a></td>

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
