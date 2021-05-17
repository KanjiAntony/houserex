<?php

require_once("../includes/initialise.php");

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced custom search, agency, agent, business, clean, corporate, directory, google maps, homes, idx agent, listing properties, membership packages, property, real broker, real estate, real estate agent, real estate agency, realtor">
<meta name="description" content="House Rex">
<!-- css file -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Title -->
<title>House Rex</title>
<!-- Favicon -->
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#00a300">
<meta name="theme-color" content="#ffffff">

<meta name="google-signin-client_id" content="678045316263-8u0upaj68m1pjti41tfr852j4671efok.apps.googleusercontent.com">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
</head>
<body>
    
    
<div class="wrapper">
	<div class="preloader"></div>
	
	<?php include("code_includes/header.php");?>


    <?php include("code_includes/header_mobile.php");?>
	
	<!-- Our LogIn Register -->
	<section class="our-log-reg bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-6 offset-lg-3">
					
				<div class="login_form">
									
									<div class="heading">
										<h4>Login</h4>
									</div>
									
									<form method="post" id="login_user">	
									<h2 id="login_dummy_loading_text"></h2>
										<h2 id="login_dummy_loading" style='color:#1d293e;'></h2>
				
										<h2 id="login_status" style="color:#1d293e;"></h2>
										
									<div class="input-group mb-2 mr-sm-2">
										<input type="text" class="form-control" id="user_login_email" placeholder="Email" required>
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="flaticon-user"></i></div>
										</div>
									</div>
									<div class="input-group form-group">
										<input type="password" class="form-control" id="user_login_password" placeholder="Password" required>
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="flaticon-password"></i></div>
										</div>
									</div>

									<button type="submit" class="btn btn-log btn-block btn-thm">Log In</button>

								</form>
							</div>

				</div>
			</div>
		</div>
	</section>

	
	<br/><br/>
	
	
    <?php include("code_includes/footer.php");?>

<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<!-- Wrapper End -->
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/isotop.js"></script>
<script type="text/javascript" src="js/snackbar.min.js"></script>
<script type="text/javascript" src="js/simplebar.js"></script>
<script type="text/javascript" src="js/parallax.js"></script>
<script type="text/javascript" src="js/scrollto.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="js/jquery.counterup.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/pricing-slider.js"></script>
<script type="text/javascript" src="js/timepicker.js"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="js/script.js"></script>

<script src="assets/js/login.js"></script>

</body>

</html>