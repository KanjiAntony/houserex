<?php

require_once("includes/initialise.php");

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
	
	<!-- 4th Home Slider -->
	<div class="home-four">
		<div class="container-fluid p0">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-banner-wrapper">
					    <div class="banner-style-one owl-theme owl-carousel">
					        <div class="slide slide-one" style="min-height: 800px;"></div>
					        <div class="slide slide-one" style="height: 800px;"></div>
					        <div class="slide slide-one" style="height: 800px;"></div>
					    </div>
					</div><!-- /.main-banner-wrapper -->
				</div>
			</div>
		</div>
		<div class="container home_iconbox_container">
			<div class="row posr">
				<div class="col-lg-12">
					<div class="home_content home4">
					
						<br/><br/><br/>
						<div class="home_adv_srch_opt home4">
						<br/><br/>
							
							<div class="tab-content home1_adsrchfrm" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									<div class="home1-advnc-search home4">
										<ul class="h1ads_1st_list mb0">
											<li class="list-inline-item">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="exampleInputName1" placeholder="Enter keyword...">
											    </div>
											</li>
											<li class="list-inline-item">
												<div class="search_option_two">
													<div class="candidate_revew_select">
														<select class="selectpicker w100 show-tick">
															<option>Property Type</option>
															<option>Apartment</option>
															<option>Bungalow</option>
															<option>Condo</option>
															<option>House</option>
															<option>Land</option>
															<option>Single Family</option>
														</select>
													</div>
												</div>
											</li>
											<li class="list-inline-item">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
											    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
											    </div>
											</li>
											<li class="list-inline-item">
												<div class="small_dropdown2 home4">
												    <div id="prncgs" class="btn dd_btn">
												    	<span>Price</span>
												    	<label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
												    </div>
												  	<div class="dd_content2">
													    <div class="pricing_acontent">
													    	<span id="slider-range-value1"></span>
															<span id="slider-range-value2"></span>
														    <div id="slider"></div>
															<!-- <input type="text" class="amount" placeholder="$52,239"> 
															<input type="text" class="amount2" placeholder="$985,14">
															<div class="slider-range"></div> -->
													    </div>
												  	</div>
												</div>
											</li>
											<li class="custome_fields_520 list-inline-item">
												<div class="navbered">
												  	<div class="mega-dropdown home4">
													    <span id="show_advbtn" class="dropbtn">Advanced <i class="flaticon-more pl10 flr-520"></i></span>
													    <div class="dropdown-content">
													      	<div class="row p15">
													      		<div class="col-lg-12">
													      			<h4 class="text-thm3">Amenities</h4>
													      		</div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck1">
																				<label class="custom-control-label" for="customCheck1">Air Conditioning</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck2">
																				<label class="custom-control-label" for="customCheck2">Lawn</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck3">
																				<label class="custom-control-label" for="customCheck3">Swimming Pool</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck4">
																				<label class="custom-control-label" for="customCheck4">Barbeque</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck5">
																				<label class="custom-control-label" for="customCheck5">Microwave</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck6">
																				<label class="custom-control-label" for="customCheck6">TV Cable</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck7">
																				<label class="custom-control-label" for="customCheck7">Dryer</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck8">
																				<label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck9">
																				<label class="custom-control-label" for="customCheck9">Washer</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck10">
																				<label class="custom-control-label" for="customCheck10">Gym</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck11">
																				<label class="custom-control-label" for="customCheck11">Refrigerator</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck12">
																				<label class="custom-control-label" for="customCheck12">WiFi</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck13">
																				<label class="custom-control-label" for="customCheck13">Laundry</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck14">
																				<label class="custom-control-label" for="customCheck14">Sauna</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck15">
																				<label class="custom-control-label" for="customCheck15">Window Coverings</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
													      	</div>
													      	<div class="row p15 pt0-xsd">
													      		<div class="col-lg-11 col-xl-10">
													      			<ul class="apeartment_area_list mb0">
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Bathrooms</option>
																					<option>1</option>
																					<option>2</option>
																					<option>3</option>
																					<option>4</option>
																					<option>5</option>
																					<option>6</option>
																					<option>7</option>
																					<option>8</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Bedrooms</option>
																					<option>1</option>
																					<option>2</option>
																					<option>3</option>
																					<option>4</option>
																					<option>5</option>
																					<option>6</option>
																					<option>7</option>
																					<option>8</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Year built</option>
																					<option>2013</option>
																					<option>2014</option>
																					<option>2015</option>
																					<option>2016</option>
																					<option>2017</option>
																					<option>2018</option>
																					<option>2019</option>
																					<option>2020</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Built-up Area</option>
																					<option>Manchester</option>
																				</select>
																			</div>
													      				</li>
													      			</ul>
													      		</div>
													      		<div class="col-lg-1 col-xl-2">
													      			<div class="mega_dropdown_content_closer">
														      			<h5 class="text-thm text-right mt15"><span id="hide_advbtn" class="curp">Hide</span></h5>
													      			</div>
													      		</div>
													      	</div>
													    </div>
													</div>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="search_option_button">
												    <button type="submit" class="btn btn-thm3">Search</button>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
									<div class="home1-advnc-search home4">
										<ul class="h1ads_1st_list mb0">
											<li class="list-inline-item">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="exampleInputName2" placeholder="Enter keyword...">
											    </div>
											</li>
											<li class="list-inline-item">
												<div class="search_option_two">
													<div class="candidate_revew_select">
														<select class="selectpicker w100 show-tick">
															<option>Property Type</option>
															<option>Apartment</option>
															<option>Bungalow</option>
															<option>Condo</option>
															<option>House</option>
															<option>Land</option>
															<option>Single Family</option>
														</select>
													</div>
												</div>
											</li>
											<li class="list-inline-item">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="exampleInputEmail3" placeholder="Location">
											    	<label for="exampleInputEmail3"><span class="flaticon-maps-and-flags"></span></label>
											    </div>
											</li>
											<li class="list-inline-item">
												<div class="small_dropdown2 home4">
												    <div id="prncgs2" class="btn dd_btn">
												    	<span>Price</span>
												    	<label><span class="fa fa-angle-down"></span></label>
												    </div>
												  	<div class="dd_content2">
													    <div class="pricing_acontent">
															<input type="text" class="amount" placeholder="£52,239"> 
															<input type="text" class="amount2" placeholder="£985,14">
															<div class="slider-range"></div>
													    </div>
												  	</div>
												</div>
											</li>
											<li class="custome_fields_520 list-inline-item">
												<div class="navbered">
												  	<div class="mega-dropdown home4">
													    <span id="show_advbtn2" class="dropbtn">Advanced <i class="flaticon-more pl10 flr-520"></i></span>
													    <div class="dropdown-content">
													      	<div class="row p15">
													      		<div class="col-lg-12">
													      			<h4 class="text-thm3">Amenities</h4>
													      		</div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck16">
																				<label class="custom-control-label" for="customCheck16">Air Conditioning</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck17">
																				<label class="custom-control-label" for="customCheck17">Lawn</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck18">
																				<label class="custom-control-label" for="customCheck18">Swimming Pool</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck19">
																				<label class="custom-control-label" for="customCheck19">Barbeque</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck20">
																				<label class="custom-control-label" for="customCheck20">Microwave</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck21">
																				<label class="custom-control-label" for="customCheck21">TV Cable</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck22">
																				<label class="custom-control-label" for="customCheck22">Dryer</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck23">
																				<label class="custom-control-label" for="customCheck23">Outdoor Shower</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck24">
																				<label class="custom-control-label" for="customCheck24">Washer</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck25">
																				<label class="custom-control-label" for="customCheck25">Gym</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck26">
																				<label class="custom-control-label" for="customCheck26">Refrigerator</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck27">
																				<label class="custom-control-label" for="customCheck27">WiFi</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck28">
																				<label class="custom-control-label" for="customCheck28">Laundry</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck29">
																				<label class="custom-control-label" for="customCheck29">Sauna</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck30">
																				<label class="custom-control-label" for="customCheck30">Window Coverings</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
													      	</div>
													      	<div class="row p15 pt0-xsd">
													      		<div class="col-lg-11 col-xl-10">
													      			<ul class="apeartment_area_list mb0">
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Bathrooms</option>
																					<option>1</option>
																					<option>2</option>
																					<option>3</option>
																					<option>4</option>
																					<option>5</option>
																					<option>6</option>
																					<option>7</option>
																					<option>8</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Bedrooms</option>
																					<option>1</option>
																					<option>2</option>
																					<option>3</option>
																					<option>4</option>
																					<option>5</option>
																					<option>6</option>
																					<option>7</option>
																					<option>8</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Year built</option>
																					<option>2013</option>
																					<option>2014</option>
																					<option>2015</option>
																					<option>2016</option>
																					<option>2017</option>
																					<option>2018</option>
																					<option>2019</option>
																					<option>2020</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Built-up Area</option>
																					<option>Manchester</option>
																				</select>
																			</div>
													      				</li>
													      			</ul>
													      		</div>
													      		<div class="col-lg-1 col-xl-2">
													      			<div class="mega_dropdown_content_closer">
														      			<h5 class="text-thm text-right mt15"><span id="hide_advbtn2" class="curp">Hide</span></h5>
													      			</div>
													      		</div>
													      	</div>
													    </div>
													</div>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="search_option_button">
												    <button type="submit" class="btn btn-thm3">Search</button>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="home-text text-center">
						<h3 class="fz45">Property on the Go, The Quicker The Better</h3>
						<p class="fz18 color-white">We are on a mission to support 1 million UK residents to buy and sell their homes.</p>
					</div>
					<!-- <h4 class="text-center color-white fw600 mb25 mb0-520">What are you looking for?</h4>
					<ul class="home4_iconbox mb0">
						<li class="list-inline-item"><div class="icon"><span class="flaticon-house"></span><p>Modern Villa</p></div></li>
						<li class="list-inline-item"><div class="icon"><span class="flaticon-house-1"></span><p>Family House</p></div></li>
						<li class="list-inline-item"><div class="icon"><span class="flaticon-house-2"></span><p>Town House</p></div></li>
						<li class="list-inline-item"><div class="icon"><span class="flaticon-building"></span><p>Apartment</p></div></li>
					</ul> -->
				</div>
			</div>
		</div>
	</div>

	
	<section id="best-property" class="best-property bgc-f7">
		<div class="container ovh">

			<div class="row">
				<div class="col-lg-12">
					<div class="row style2">
						<div class="col-lg-4 col-12 item">
							<div class="why_chose_us style2" style="height:350px;">
                                <h4><strong>PRIVATE SELLERS </strong></h4>
								<div class="text-center">
									
        							<p>We are the only property platform in the UK which private sellers are in fully control of selling their homes.</p>
        							<p>- List your property for free,</p>
        							<p>- Get messages alert from buyers.</p>
        							<p>- Free selling process support</p>
        							<p>- Get quick offers.</p>
        							
								</div>
								<a href="" class="btn btn-thm" data-toggle="modal" data-target=".bd-example-modal-lg">Sign up</a>
							</div>
						</div>
						
						<div class="col-lg-4 col-12 item">
							<div class="why_chose_us style2">
							    
							    <h4><strong>FOR PROFESSIONALS</strong></h4>

								<div class="text-center">
									
        							<p>- Free Property Listing and Advertising </p>
        							<p>- Set up Agent / Agency</p>
        							<p>- Professional Agent Profile</p>
        							<p>- Professional Agency webpage</p>
        							<p>- Agency / Agents Directory</p>
        							<p>You do not need high-cost high street office building or an expensive website which takes your time to manage. Set up your agency webpage and agent profile with all your details and information add unlimited team members to your agency or agent account which you are fully in control. List and advertise property all over the UK for free. Share your webpage account of your agency on your media platforms. </p>
        						    
								</div>
								
								<a href="" class="btn btn-thm" data-toggle="modal" data-target=".bd-example-modal-lg">Sign up</a>
							</div>
						</div>
						
						<div class="col-lg-4 col-12 item" >
							<div class="why_chose_us style2" style="height:350px;">
							    
							    <h4><strong>FOR BUYERS AND RENTERS </strong></h4>
							   
								<div class="text-center">
									
        							<p>- All you need for buying and renting a property at your fingerprint.</p>
        							<p>- Be the first to view new property listings.</p>
        							<p>- High quality services</p>
        							<br/><br/>
        							
								</div>
								
								<a href="" class="btn btn-thm" data-toggle="modal" data-target=".bd-example-modal-lg">Sign up</a>
							</div>
						</div>



					</div>
				</div>
			</div>
		</div>
	</section>

    <div class="wrapper">
    	<section id="best-property" class="best-property bgc-f7" >
            		<div class="container ovh" >
            			<div class="row">
            				<div class="col-lg-12 offset-lg-0">
            					<div class="main-title text-center mb40">
            						<h2>Featured Properties</h2>
            					</div>
            					<p class="text-right add_listing"><button class="btn btn-thm" style="border-radius:50px;">For sale</button> / <button class="btn btn-thm" style="border-radius:50px;background:#fff;color:#000;">For rent</button></p>
            				</div>
            			</div>
            			
            			<h2 id="dummy_loading_text"></h2>
                                <h2 id="dummy_loading" style='color:#1d293e;'></h2>
                        
                                <h2 id="dummy_status" style="color:#1d293e;"></h2>
                        
		            
            			        <div class="row" id="blogcontentloaded">
            				
            					    </div>
                                
        			</div>
        		</div>
        </section>   
    </div>    
	
    <section id="best-property" class="best-property bgc-f7">
		<div class="container ovh">

			<div class="row">
				<div class="col-lg-12">
				
						
						<div class="item">
							<div class="why_chose_us ">

								<div class="text-center">
									<h4><strong>STAY CONNECTED ALWAYS </strong></h4>
									<div class="text-center">
            							<p>- Get Property Alert</p>
            							<p>- News</p>
            							<p>- Latest on Where I want to live?</p>
            							<p>- Property guides</p>
            							<p>- Find an Agent/Agency</p>
            							<p>- UK House Prices Index</p>
            							<p class="text-right add_listing"><a href="">Learn more...</a></p>
            							<a href="" class="btn btn-lg btn-thm" data-toggle="modal" data-target=".bd-example-modal-lg">Sign up</a>
								    </div>
								</div>
								
								
							</div>
						</div>


				
				</div>
			</div>
		</div>
	</section>
	
	<!-- Our Contact -->
	<section class="property-city pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="form_grid">
					    
					    <h5>Follow us on</h5>
					    
						<ul class="contact_form_social_area">
							<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						
						<br/>
						
						<h4 class="mb5">Send us a message</h4>
			            <form class="contact_form" id="contact_form" name="contact_form" action="#" method="post" novalidate="novalidate">
							<div class="row">
				                <div class="col-md-6">
				                    <div class="form-group">
										<input id="form_name" name="form_name" class="form-control" required="required" type="text" placeholder="Name">
									</div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                    	<input id="form_email" name="form_email" class="form-control required email" required="required" type="email" placeholder="Email">
				                    </div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
				                    	<input id="form_phone" name="form_phone" class="form-control required phone" required="required" type="phone" placeholder="Phone">
				                    </div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
					                    <input id="form_subject" name="form_subject" class="form-control required" required="required" type="text" placeholder="Subject">
									</div>
				                </div>
				                <div class="col-sm-12">
		                            <div class="form-group">
		                                <textarea id="form_message" name="form_message" class="form-control required" rows="8" required="required" placeholder="Your Message"></textarea>
		                            </div>
				                    <div class="form-group mb0">
					                    <button type="button" class="btn btn-lg btn-thm">Send Message</button>
				                    </div>
				                </div>
			                </div>
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
<script src="assets/js/create_account.js"></script>
<script src="assets/js/login.js"></script>

<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

<script src="upup.min.js"></script>
<script>
UpUp.start({
  'content-url': 'index.php',
  'assets': ['images/logo.png', '', '']
});


</script>

<script>

  $(document).ready(function(){
    
    fetchAllProperties();

    function fetchAllProperties() {
        
        document.getElementById("dummy_loading").innerHTML = "Listing all properties, please wait";
		
		document.getElementById("dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		var picExtensionUrl = "assets/php/fetch_all_properties.php";


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
		    _("dummy_status").innerHTML = "Listing all properties failed";
		    document.getElementById("dummy_loading").innerHTML = "Failed";
		    document.getElementById("dummy_loading_text").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("dummy_status").innerHTML = "Listing all properties aborted";
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