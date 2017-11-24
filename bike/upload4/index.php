<?php
//$folderName = 'Test';
$folderName = $_REQUEST['bike_id'];
$url = 'basic-plus-ui.html';
header('Location: '.$url.'?folderName='.$folderName);
?>