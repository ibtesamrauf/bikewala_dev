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
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


    <script type="text/javascript" src="../slider/js/jssor.slider.min.js"></script>


    <script>
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
                {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
                $AutoPlay: true,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $Cols: 10,
                    $SpacingX: 8,
                    $SpacingY: 8,
                    $Align: 360
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>

        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('img/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01 .p            (normal)
        .jssort01 .p:hover      (normal mouseover)
        .jssort01 .p.pav        (active)
        .jssort01 .p.pdn        (mousedown)
        */
        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }

        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }

        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('img/t01.png') -800px -800px no-repeat;
            _background: none;
        }

        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }

        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }

        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }

        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }

    </style>






</head>


<?php
if ($_REQUEST['bike_option']==0 || $_REQUEST['bike_option']==1)
{


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

}
?>



<?php
$bike_id = $_REQUEST['bike_id'];

$query_bike = "SELECT * FROM tbl_bike where bike_id = $bike_id";
$result_bike = mysql_query($query_bike) or die('Error, query failed');
$row_bike = mysql_fetch_array($result_bike);

$make_id = $row_bike['make_id'];

$query_make = "SELECT make_id, make_name FROM tbl_make where make_id = $make_id";
$result_make = mysql_query($query_make) or die('Error, query failed');
$row_make = mysql_fetch_array($result_make);
$make_name = $row_make['make_name'];

$model_id = $row_bike['model_id'];

$query_model = "SELECT model_name FROM tbl_model where model_id = $model_id";
$result_model = mysql_query($query_model) or die('Error, query failed');
$row_model = mysql_fetch_array($result_model);
$model_name = $row_model['model_name'];

$bike_id = $row_bike['bike_id'];
$city_id = $row_bike['city_id'];
$bike_mileage = $row_bike['bike_mileage'];
$bike_year = $row_bike['bike_year'];
$bike_color = $row_bike['bike_color'];
$bike_regno = $row_bike['bike_regno'];
$bike_price = $row_bike['bike_price'];
$bike_detail = $row_bike['bike_detail'];
$bike_seller_name = $row_bike['bike_seller_name'];
$bike_seller_contactno = $row_bike['bike_seller_contactno'];
$bike_seller_email = $row_bike['bike_seller_email'];
$bike_featured = $row_bike['bike_featured'];
$bike_type = $row_bike['bike_type'];
$bike_featured = $row_bike['bike_featured'];
$bike_status = $row_bike['bike_status'];
$bike_date = $row_bike['bike_date'];

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
                     <h2>Bike Detail</h2>
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->

                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <h2><?php echo $make_name; ?> <?php echo $model_name; ?></h2>
                            <p><?php echo $bike_detail; ?></p>

                            <p>

                            <div class="row">
                                <div class="col-md-6">
                                    <!--    Hover Rows  -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Bike Specification
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <tr>
                                                        <td>Type</td>
                                                        <td>
                                                            <?php if ($bike_type==1)
                                                            {
                                                                echo 'New';
                                                            }
                                                            else
                                                            {
                                                                echo 'Used';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Year</td>
                                                        <td><?php echo $bike_year;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mileage</td>
                                                        <td><?php echo $bike_mileage;?> km</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Price</td>
                                                        <td>Rs. <?php echo $bike_price;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Color</td>
                                                        <td><?php echo $bike_color;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Feature Bike</td>
                                                        <td>
                                                            <?php if ($bike_featured==1)
                                                            {
                                                                echo 'Yes';
                                                            }
                                                            else
                                                            {
                                                                echo 'No';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>
                                                            <?php if ($bike_status==1)
                                                            {
                                                                echo 'Enable';
                                                            }
                                                            else
                                                            {
                                                                echo 'Disabled';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bike details added on</td>
                                                        <td><?php echo $bike_date;?></td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End  Hover Rows  -->
                                </div>
                            </div>
                            <!-- /. ROW  -->

                            <div class="row">
                                <div class="col-md-6">
                                    <!--    Hover Rows  -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Seller Information
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td><?php echo $bike_seller_name;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><?php echo $bike_seller_email;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Contact No.</td>
                                                        <td><?php echo $bike_seller_contactno;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>
                                                            <?php
                                                            $query_city = "SELECT city_name FROM tbl_city where city_id = $city_id";
                                                            $result_city = mysql_query($query_city) or die('Error, query failed');
                                                            $row_city = mysql_fetch_array($result_city);
                                                            $city_name = $row_city['city_name'];
                                                            echo $city_name;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End  Hover Rows  -->
                                </div>
                            </div>
                            <!-- /. ROW  -->


                            </p>

                            <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 456px; overflow: hidden; visibility: hidden; background-color: #b4b4b4;">
                                <!-- Loading Screen -->
                                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                                    <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                                </div>
                                <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">

                                    <?php
                                    $cnt = 0;
                                    foreach (glob("../upload4/server/php/".$bike_id."/*.*") as $filename)
                                    {
                                        ?>
                                        <div data-p="144.50" style="display: none;">
                                            <img data-u="image" src="<?php echo $filename; ?>" />
                                            <img data-u="thumb" src="<?php echo $filename; ?>" />
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <!-- Thumbnail Navigator -->
                                <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
                                    <!-- Thumbnail Item Skin Begin -->
                                    <div data-u="slides" style="cursor: default;">
                                        <div data-u="prototype" class="p">
                                            <div class="w">
                                                <div data-u="thumbnailtemplate" class="t"></div>
                                            </div>
                                            <div class="c"></div>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Item Skin End -->
                                </div>
                                <!-- Arrow Navigator -->
                                <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
                                <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
                                <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
                            </div>
                            <script>
                                jssor_1_slider_init();
                            </script>


                            <p>


                                <?php if ($bike_status==1)
                                {
                                ?>
                                    <a href="detail.php?bike_id=<?php echo $bike_id; ?>&bike_option=0&file_type=bike_status" class="btn btn-primary btn-lg" role="button">Disable Bike </a>
                                <?php
                                }
                                else
                                {
                                ?>
                                    <a href="detail.php?bike_id=<?php echo $bike_id; ?>&bike_option=1&file_type=bike_status" class="btn btn-primary btn-lg" role="button">Enable Bike</a>
                                <?php
                                }
                                ?>
                                &nbsp;
                                <?php if ($bike_featured==1)
                                {
                                ?>
                                    <a href="detail.php?bike_id=<?php echo $bike_id; ?>&bike_option=0&file_type=bike_featured" class="btn btn-primary btn-lg" role="button">Remove from Featured Listing</a>
                                <?php
                                }
                                else
                                {
                                ?>
                                    <a href="detail.php?bike_id=<?php echo $bike_id; ?>&bike_option=1&file_type=bike_featured" class="btn btn-primary btn-lg" role="button">Add to Featured Listing</a>
                                <?php
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->


    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
