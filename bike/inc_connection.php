<?php 
 $con = mysql_connect("localhost","ootpatan_zeeshan","zeeshan123");
 if (!$con) 
       die('Could not connect: ' . mysql_error()); 
 mysql_select_db("ootpatan_bike", $con);
?>
