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

	$area_id = $_REQUEST['area_id'];
	$city_id = $_REQUEST['city_id'];
	$area_name = $_REQUEST['area_name'];
	$area_status = $_REQUEST['area_status'];
	
	$sql_update = "Update tbl_area set city_id = $city_id, area_name = '$area_name',area_status = $area_status where area_id= $area_id";

	if (!mysql_query($sql_update,$con))
      {
        die('Error: ' . mysql_error());
      }
	else
	{
		$msg = "Area edited successfully";	
	}
    }
    else
    {
	$msg = "";
    }
   ?>

<?php
$area_id = $_REQUEST['area_id'];

$query_area = "SELECT * FROM tbl_area where area_id = $area_id";
$result_area = mysql_query($query_area) or die('Error, query failed');
$row_area = mysql_fetch_array($result_area);


$area_name = $row_area['area_name'];
$area_id = $row_area['area_id'];
$city_id_master = $row_area['city_id'];
$area_status = $row_area['area_status'];
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
                     <h2>Area</h2>
                        <h5>Edit Area</h5>
                        <h5><strong>
				<?php
				{
				echo $msg;	
				}
				
				 ?> </strong></h5>                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <?php require('inc_cpanel.php'); ?>
            <div class="row">
                <div class="col-md-12">
<!-- Form Elements -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <!--<h3>Basic Form Examples</h3>-->
                                    <form role="form" method="post">
						<input type="hidden" value="<?php echo $area_id; ?>" name="area_id"/>

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
                                            <label>Area Name</label>
                                            <input type="text" class="form-control" value="<?php echo $area_name; ?>" name="area_name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="area_status" id="area_status" value="1" <?php if ($area_status==1) { ?> Checked <?php } ?> />Enable
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="area_status" id="area_status" value="0" <?php if ($area_status==0) { ?> Checked <?php } ?> />Disable
                                                </label>
                                            </div>
                                        </div>
						    
						    <button type="submit" class="btn btn-default" name="Save">Edit & Save</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>

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
