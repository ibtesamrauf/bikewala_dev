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
$user_id = $_REQUEST['user_id'];

$query_user = "SELECT * FROM tbl_user where user_id = $user_id";
$result_user = mysql_query($query_user) or die('Error, query failed');
$row_user = mysql_fetch_array($result_user);
$dealer_name = $row_user['dealer_name'];


$query_inv = "SELECT * FROM tbl_inventory where user_id = $user_id order by inventory_id DESC LIMIT 0,100";
$result_inv = mysql_query($query_inv) or die('Error, query failed');
$rowcount = mysql_num_rows($result_inv);

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
                     <h2>Inventory Management for <?php echo $dealer_name; ?></h2>
                        <h5>Add/Edit/Delete/View Inventory</h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <?php //require('inc_cpanel.php'); ?>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th colspan=6><a href="add_inventory.php?user_id=<?php echo $user_id; ?>">Add Inventory</a></th>
                                        </tr>
						    <tr>
                                            <th>ID</th>
                                            <th>Item</th>
							  <th>Quantity</th>
                                            <th>Price Per Unit</th>
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
                                    while ($row_inv = mysql_fetch_array($result_inv)) {
                                        $inventory_id = $row_inv['inventory_id'];
						    $item_id = $row_inv['item_id'];
						    $user_id = $row_inv['user_id'];
                                        $inventory_quantity = $row_inv['inventory_quantity'];
						    $inventory_status = $row_inv['inventory_status'];

						    $query_item = "SELECT item_id, item_name, item_price FROM tbl_item where item_id = $item_id";
                                        $result_item = mysql_query($query_item) or die('Error, query failed');
                                        $row_item = mysql_fetch_array($result_item);
                                        $item_name = $row_item['item_name'];
						    $item_price = $row_item['item_price'];
						    
						     if ($inventory_status == 1)
						     {
							$inventory_status = "Enable";	
						     }
                                         else if ($inventory_status == 0)
						     {
							$inventory_status = "Disable";	
						     }

						    ?>
                                        <tr class="odd gradeX">
                                            <td> <?php echo $inventory_id; ?></td>
                                            <td> <?php echo $item_name; ?></td>
							  <td> <?php echo $inventory_quantity; ?></td>
                                            <td> <?php echo number_format($item_price,2); ?></td>
							  <td> <?php echo $inventory_status; ?></td>
                                            <td align="center">
								<!--<a href="edit_inventory.php?inventory_id=<?php echo $inventory_id;?>" class="btn btn-primary btn-xs">Edit</a>-->
							  <a href="#" class="btn btn-primary btn-xs">Edit</a>
							  </td>
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
