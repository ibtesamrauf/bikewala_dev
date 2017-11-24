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

	$model_id = $_REQUEST['model_id'];
	$make_id = $_REQUEST['make_id'];
	$model_name = $_REQUEST['model_name'];
	$model_status = $_REQUEST['model_status'];
	
	$sql_update = "Update tbl_model set make_id = $make_id, model_name = '$model_name',model_status = $model_status where model_id= $model_id";

	if (!mysql_query($sql_update,$con))
      {
        die('Error: ' . mysql_error());
      }
	else
	{
		$msg = "Model edited successfully";	
	}
    }
    else
    {
	$msg = "";
    }
   ?>

<?php
$model_id = $_REQUEST['model_id'];

$query_model = "SELECT * FROM tbl_model where model_id = $model_id";
$result_model = mysql_query($query_model) or die('Error, query failed');
$row_model = mysql_fetch_array($result_model);


$model_name = $row_model['model_name'];
$model_id = $row_model['model_id'];
$make_id_master = $row_model['make_id'];
$model_status = $row_model['model_status'];
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
                     <h2>Model</h2>
                        <h5>Edit Model</h5>
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
						<input type="hidden" value="<?php echo $model_id; ?>" name="model_id"/>

                                           <div class="form-group">
                                            <label>Select Make</label>
                                            <select class="form-control" name="make_id">
								<option value="0" selected="0">Select City</option>
								<?php
								$query_make = "SELECT make_id, make_name FROM tbl_make where make_status = 1 order by make_id LIMIT 0,100";
								$result_make = mysql_query($query_make) or die('Error, query failed');
								while($row_make = mysql_fetch_array($result_make)) {
									$make_id = $row_make['make_id'];
									$make_name = $row_make['make_name'];
									
									if ($row_make['make_id'] == $make_id_master)
									{
									?>
									<option value="<?php echo $make_id; ?>" selected><?php echo $make_name; ?></option>
									<?php
									}
									else
									{
									?>
									<option value="<?php echo $make_id; ?>"><?php echo $make_name; ?></option>
									<?php
									}
								}
								?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Model Name</label>
                                            <input type="text" class="form-control" value="<?php echo $model_name; ?>" name="model_name" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="model_status" id="model_status" value="1" <?php if ($model_status==1) { ?> Checked <?php } ?> />Enable
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="model_status" id="model_status" value="0" <?php if ($model_status==0) { ?> Checked <?php } ?> />Disable
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
