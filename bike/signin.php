<!DOCTYPE html>
<?php require('inc_connection.php'); ?>
<?php require('inc_functions.php'); ?>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<?php require('inc_title.php'); ?>

		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

		<link href="css/master.css" rel="stylesheet">


		<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="m-submit4" data-scrolling-animations="false" >

	<?php require('inc_loader.php'); ?>
	<?php require('inc_header.php'); ?>
	<?php require('inc_nav.php'); ?>
	<!--b-nav-->
        <!--
        <section class="b-pageHeader">
			<div class="container">
				<h1 class="wow zoomInLeft" data-wow-delay="0.3s">Agent Login</h1>
				<div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.3s">
					<h3>Log into our Website</h3>
				</div>
			</div>
		</section>
        -->
        <!--b-pageHeader-->

        <!--
        <div class="b-breadCumbs s-shadow">
			<div class="container wow zoomInUp" data-wow-delay="0.3s">
				<a href="index.php" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="signin.php" class="b-breadCumbs__page m-active">Sign In</a>
			</div>
		</div>
        -->
        <!--b-breadCumbs-->
		<div class="b-submit">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
						<div class="b-submit__main">
							<form action="signinverifiy.php" method="post" class='s-submit'>
								<div class="b-submit__main-contacts wow zoomInUp" data-wow-delay="0.3s">
									<header class="s-headerSubmit s-lineDownLeft">
										<h2>Login Information</h2>
									</header>
                          			<?php if (!empty($_GET["msg"]))
			            		    {
                                    ?>
                                    <font face="Arial" size="2" color=red><?php echo $_GET["msg"];?></font>
                                    <?php
                                    }
                                    ?>

									<!--<p>Enter login credentials to access agent specific modules. </p>-->
                                    <div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Email  <span>*</span></label>
												<input type="text" name="user_email" />
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Password  <span>*</span></label>
												<input type="text" name="user_password" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6 col-xs-12">
											<div class="b-submit__main-element">
												<label>Forogt Password. Click <a href="fgpass.php">here</a> to retrieve login information.</label>
											</div>
										</div>
									</div>



								</div>
								<button name="save" type="submit" class="btn m-btn pull-right wow zoomInUp" data-wow-delay="0.3s">Sign In<span class="fa fa-angle-right"></span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--b-submit-->

		<?php require('inc_footer.php'); ?>
		<?php require('inc_main.php'); ?>
	</body>
</html>