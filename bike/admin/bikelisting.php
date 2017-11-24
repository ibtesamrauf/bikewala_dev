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
$query_bike = "SELECT * FROM tbl_bike order by bike_id DESC LIMIT 0,100";
$result_bike = mysql_query($query_bike) or die('Error, query failed');
$rowcount = mysql_num_rows($result_bike);

echo $query_bike."<br>";
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
                     <h2>Bike Listing</h2>
                        <h5>View Old & Used Bike Listing </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Featured/Newly Added Bikes
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Make</th>
                                            <th>Model</th>
                                            <th>Year</th>
                                            <th>Mileage</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>System Date</th>
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
                                    while ($row_bike = mysql_fetch_array($result_bike)) {
                                        $bike_id = $row_bike['bike_id'];
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

                                        $city_id = $row_bike['city_id'];

                                        $query_city = "SELECT city_name FROM tbl_city where city_id = $city_id";
                                        $result_city = mysql_query($query_city) or die('Error, query failed');
                                        $row_city = mysql_fetch_array($result_city);
                                        $city_name = $row_city['city_name'];

                                        $bike_mileage = $row_bike['bike_mileage'];
                                        $bike_year = $row_bike['bike_year'];
                                        $bike_status = $row_bike['bike_status'];
                                        $bike_date = $row_bike['bike_date'];
                                        ?>
                                        <tr class="odd gradeX">
                                            <td> <?php echo $make_name; ?></td>
                                            <td> <?php echo $model_name; ?></td>
                                            <td> <?php echo $bike_year; ?></td>
                                            <td> <?php echo $bike_mileage; ?></td>
                                            <td> <?php echo $city_name; ?></td>
                                            <td>
                                                <?php if ($bike_status==1)
                                                {
                                                    echo 'Enable';
                                                }
                                                else
                                                {
                                                    echo 'Disable';
                                                }
                                                ?>
                                            </td>
                                            <td> <?php echo $bike_date; ?></td>
                                            <td align="center"> <a href="detail.php?bike_id=<?php echo $bike_id;?>&bike_option=3" class="btn btn-primary btn-xs">View Detail</a></td>

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
