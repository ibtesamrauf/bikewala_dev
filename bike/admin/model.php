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
$query_model = "SELECT * FROM tbl_model order by model_id DESC LIMIT 0,100";
$result_model = mysql_query($query_model) or die('Error, query failed');
$rowcount = mysql_num_rows($result_model);

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
                        <h5>Add/Edit/Delete/View model</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <?php require('inc_cpanel.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th colspan=5><a href="add_model.php">Add Model</a></th>
                                        </tr>
						    
						    <tr>
                                            <th>ID</th>
                                            <th>Make</th>
							  <th>Name</th>
                                            <th>Status</th>
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
                                    while ($row_model = mysql_fetch_array($result_model)) {
                                        $model_id = $row_model['model_id'];
						    $make_id = $row_model['make_id'];
                                        $model_name = $row_model['model_name'];
						    $model_status = $row_model['model_status'];

						    $query_make = "SELECT make_id, make_name FROM tbl_make where make_id = $make_id";
                                        $result_make = mysql_query($query_make) or die('Error, query failed');
                                        $row_make = mysql_fetch_array($result_make);
                                        $make_name = $row_make['make_name'];
						    
						     if ($model_status == 1)
						     {
							$model_status = "Enable";	
						     }
                                         else if ($model_status == 0)
						     {
							$model_status = "Disable";	
						     }

						    ?>
                                        <tr class="odd gradeX">
                                            <td> <?php echo $model_id; ?></td>
                                            <td> <?php echo $make_name; ?></td>
							  <td> <?php echo $model_name; ?></td>
                                            <td> <?php echo $model_status; ?></td>
                                            <td align="center"> <a href="edit_model.php?model_id=<?php echo $model_id;?>" class="btn btn-primary btn-xs">Edit</a></td>
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
