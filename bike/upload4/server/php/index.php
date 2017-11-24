<?php
/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */


if(isset($_POST['folderName']))	//New Line Addition  -  Farhan Aslam
{$test = $_POST['folderName'];	//New Line Addition  -  Farhan Aslam
if(!is_dir($test))				//New Line Addition  -  Farhan Aslam
mkdir($test);					//New Line Addition  -  Farhan Aslam
if(!is_dir($test.'/thumbnail'))	//New Line Addition  -  Farhan Aslam
mkdir($test.'/thumbnail');		//New Line Addition  -  Farhan Aslam
}								//New Line Addition  -  Farhan Aslam
else							//New Line Addition  -  Farhan Aslam
$test = 'temp'; 				//New Line Addition  -  Farhan Aslam // $test has to be initialized with anything. If it doesnot
								// it will start showing index.php and uploadhandler.php as uploaded files.

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
$upload_handler = new UploadHandler();
