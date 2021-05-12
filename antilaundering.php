<?php

require_once("includes/initialise.php");

$database->get_pages_data_details("ANTILAUNDERING");

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

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<script>

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      registerAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      //document.getElementById('status').innerHTML = 'Please log ' + 'into this webpage.';
      console.log("Please login");
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1322485091461528',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v10.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };
 
  function registerAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
     // document.getElementById('status').innerHTML = 'Thanks for logging in, ' + response.name + '!';
     // window.location.href = "index.html";
    });
  }

</script>
    
</head>
<body>
    
    
<div class="wrapper">
	<div class="preloader"></div>
	
	<?php include("code_includes/header.php");?>

	<!-- Modal -->
	<div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
		      	<div class="modal-body container pb20">
		      		<div class="row">
		      			<div class="col-lg-12">
				    		<ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
							  	<li class="nav-item">
							    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
							  	</li>
							  	<li class="nav-item">
							    	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
							  	</li>
							</ul>
		      			</div>
		      		</div>
					<div class="tab-content container" id="myTabContent">
					  	<div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="login_thumb">
					  				<img class="img-fluid w100" src="images/resource/login.jpg" alt="login.jpg">
					  			</div>
					  		</div>
					  		<div class="col-lg-6 col-xl-6">
								<div class="login_form">
									<form method="post" id="login_user">
										<div class="heading">
											<h4>Login</h4>
										</div>
										<div class="row mt25">
											<div class="col-lg-12">
												<button class="btn btn-fb btn-block" onlogin="checkLoginState();"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
											</div>
											<!--<fb:login-button class="btn btn-fb btn-block" scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>-->
											<div class="col-lg-12">
												<button type="submit" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
											</div>
										</div>
										<hr>
										
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
										<p class="text-center">Don't have an account? <a class="text-thm" href="#">Register</a></p>
									</form>
								</div>
					  		</div>
					  	</div>
					  	<div class="row mt25 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="regstr_thumb">
					  				<img class="img-fluid w100" src="images/resource/regstr.jpg" alt="regstr.jpg">
					  			</div>
					  		</div>
					  		<div class="col-lg-6 col-xl-6">
								<div class="sign_up_form">
									<div class="heading">
										<h4>Register</h4>
									</div>
									<form method="post" id="register_user">
										<div class="row">
											<div class="col-lg-12">
												<button type="submit" class="btn btn-block btn-fb"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
											</div>
											<div class="col-lg-12">
												<button type="submit" class="btn btn-block btn-googl"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
											</div>
										</div>
										
										
										<hr>
										
										<h2 id="reg_dummy_loading_text"></h2>
                                            <h2 id="reg_dummy_loading" style='color:#1d293e;'></h2>
                    
                                            <h2 id="reg_status" style="color:#1d293e;"></h2>
                                            
										<div class="form-group input-group">
										    <input type="text" class="form-control" id="user_reg_name" placeholder="User Name" required>
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-user"></i></div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="email" class="form-control" id="user_reg_email" placeholder="Email" required>
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="password" class="form-control" id="user_reg_password" placeholder="Password" required>
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										<div class="form-group input-group">
										    <input type="password" class="form-control" id="user_reg_confirm_password" placeholder="Re-enter password" required>
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										<div class="form-group ui_kit_select_search mb0">
											<select class="selectpicker" data-live-search="true" data-width="100%" id="user_reg_type" required>
												<option data-tokens="Seller">Seller</option>
												<option data-tokens="User">User</option>
												<option data-tokens="Agent">Agent</option>
												<option data-tokens="Agency">Agency</option>
												<option data-tokens="Developer">Developer</option>
											</select>
										</div>
										<div class="form-group custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="terms_of_use" required>
											<label class="custom-control-label" for="terms_of_use">I have read and accept the Terms and Privacy Policy?</label>
										</div>
										<button type="submit" class="btn btn-log btn-block btn-thm" id="register_user_btn">Sign Up</button>
										<p class="text-center">Already have an account? <a class="text-thm" href="#">Log In</a></p>
									</form>
								</div>
					  		</div>
					  	</div>
					</div>
		      	</div>
		    </div>
		</div>
	</div>

    <?php include("code_includes/header_mobile.php");?>
	
    <section class="our-terms bgc-f7">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="terms_condition_grid">

  						<?php echo $database->fetched_page_data;?>

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
<script src="assets/js/create_account.js"></script>
<script src="assets/js/login.js"></script>

<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

<script src="upup.min.js"></script>
<script>
UpUp.start({
  'content-url': 'index.html',
  'assets': ['images/logo.png', '', '']
});


</script>

<script>

  $(document).ready(function(){
    
    fetchAllProperties();

    function fetchAllProperties() {
        
        document.getElementById("dummy_loading").innerHTML = "Listing all rent properties, please wait";
		
		document.getElementById("dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		var picExtensionUrl = "assets/php/fetch_all_rent_properties.php";


		var picRequest;

			try {

				// request for normal browsers
					picRequest = new XMLHttpRequest();
			} catch(e) {

				try {
					picRequest = new ActiveXObject("Msxml2.XMLHTTP")
				} catch(e) {
					
					try {
						picRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch(e) {
						alert("Browser has broken");
						return false;
					}

				}
			}
			

	//	picRequest.upload.addEventListener("progress", progressHandler, false);
		picRequest.addEventListener("load", function(ev) {

		    _("dummy_loading").innerHTML = "";
		    _("dummy_loading_text").innerHTML = "";
		    $("#blogcontentloaded").html(ev.target.responseText);
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("dummy_status").innerHTML = "Listing all rent properties failed";
		    document.getElementById("dummy_loading").innerHTML = "Failed";
		    document.getElementById("dummy_loading_text").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("dummy_status").innerHTML = "Listing all rent properties aborted";
             document.getElementById("dummy_loading").innerHTML = "Cancelled";
             document.getElementById("dummy_loading_text").style.display = "none";
        });

		//open connection
		picRequest.open("POST",picExtensionUrl,true);

        //picRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		picRequest.send();
        
    }
    
  });
  
  function _(el) {
            return document.getElementById(el);
    }

</script>

</body>

</html>