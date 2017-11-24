<?php require('../inc_connection.php'); ?>
<?php
$bike_id = $_REQUEST['bike_id'];
$file_type = $_REQUEST['file_type'];
$bike_option = $_REQUEST['bike_option'];


if ($file_type=='bike_status')
{
    $sql_update = "UPDATE tbl_bike set bike_status = $bike_option  WHERE bike_id = $bike_id";
}

if ($file_type=='bike_featured')
{
    $sql_update = "UPDATE tbl_bike set bike_featured = $bike_option  WHERE bike_id = $bike_id";
}

if (!mysql_query($sql_update,$con))
{
    die('Error: ' . mysql_error());
}

//header('Location: detail.php?bike_id=' .$bike_id);

print "<script language=\"JavaScript\">";
print "window.location = 'detail.php?bike_id=' .$bike_id ";
print "</script>";

?>