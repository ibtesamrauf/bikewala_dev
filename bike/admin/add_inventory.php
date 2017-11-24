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

	$item_id = $_REQUEST['item_id'];
	$user_id = $_REQUEST['user_id'];
	$inventory_quantity = $_REQUEST['inventory_quantity'];
	$inventory_status = $_REQUEST['inventory_status'];

	
	$sql = "select * from tbl_inventory where item_id = $item_id and user_id = $user_id";
	$result = mysql_query($sql) or die('Error: .' . mysql_error());

	if(@mysql_num_rows($result) == 0)
	{
		$sqlins = "INSERT INTO tbl_inventory (item_id, user_id, inventory_quantity, inventory_status) VALUES ($item_id, $user_id, $inventory_quantity, $inventory_status)";
		
		if (!mysql_query($sqlins,$con))
		{
			die('Error: ' . mysql_error());
		}
		else
		{
			$msg = "<strong><font color=red>Inventory added successfully.</font></strong>";
		}
	}
	else
	{
		$msg = "<strong><font color=red>This item for this dealer is already exist.</font></strong>";
	}
    }
    else
    {
	$msg = "";
    }
   ?>


<?php
$user_id = $_REQUEST['user_id'];

$query_user = "SELECT dealer_name FROM tbl_user where user_id = $user_id";
$result_user = mysql_query($query_user) or die('Error, query failed');
$row_user = mysql_fetch_array($result_user);
$dealer_name = $row_user['dealer_name'];

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
                     <h2>Inventory Management</h2>
                        <h5>Add Inventory for <?php echo $dealer_name; ?></h5>
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
               <?php //require('inc_cpanel.php'); ?>
            <div class="row">
                <div class="col-md-12">
<!-- Form Elements -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <!--<h3>Basic Form Examples</h3>-->
                                    <form role="form" method="post">
							<input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
                                           <div class="form-group">
                                            <label>Select Item</label>
                                            <select class="form-control" name="item_id">
								<option value="0" selected="0">Select Item</option>
								<?php
								$query_item = "SELECT item_id, item_name FROM tbl_item where item_status = 1 order by item_id LIMIT 0,100";
								$result_item = mysql_query($query_item) or die('Error, query failed');
								while($row_item = mysql_fetch_array($result_item)) {
									$item_id = $row_item['item_id'];
									$item_name = $row_item['item_name'];
									?>
									<option value="<?php echo $item_id; ?>"><?php echo $item_name; ?></option>
									<?php
								}
								?>
                                            </select>
                                        </div>
							 
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" class="form-control" placeholder="Quantity" name="inventory_quantity" />
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="inventory_status" id="inventory_status" value="1" checked />Enable
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="inventory_status" id="inventory_status" value="0"/>Disable
                                                </label>
                                            </div>
                                        </div>
						    
						    <button type="submit" class="btn btn-default" name="Save">Add Inventory</button>
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
