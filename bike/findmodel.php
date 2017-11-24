<?php require('inc_connection.php'); ?>
<?php
$make_id=$_GET['make_id'];
$query_model="SELECT model_id,model_name FROM tbl_model WHERE model_status = 1 and make_id='$make_id'";
$result_model = mysql_query($query_model) or die('Error, query failed');;

?>
<select name="model_id">
    <option value="0">Select Model</option>
    <?php while($row_model=mysql_fetch_array($result_model)) { ?>
        <option value=<?php echo $row_model['model_id']?>><?php echo $row_model['model_name']?></option>
    <?php } ?>
</select>
<span class="fa fa-caret-down"></span>