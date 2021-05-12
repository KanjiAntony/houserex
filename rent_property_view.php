<?php

require_once("includes/initialise.php");

//$formatter = new NumberFormatter('en_GB',  NumberFormatter::CURRENCY);

if(isset($_GET["id"])) {
    
    $pid = $_GET["id"];
    
    $database->fetch_specific_listing_data($pid);
    
} else {
    header("Location: index.php");
}

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
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
    
<style>
    
#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: "Roboto", "sans-serif";
  line-height: 30px;
  padding-left: 10px;
}
    
	.gallery_item{
		margin-bottom: 20px;
		position: relative;
	}
	.gallery_item .gallery_overlay{
		background-color: rgba(255, 90, 95, .8);
		border-radius: 5px;
		bottom: 0;
		left: 0;
		position: absolute;
		right: 0;
		top: 0;
		width: 100%;
		-webkit-transform: scale(0);
		-moz-transform: scale(0);
		-o-transform: scale(0);
		-ms-transform: scale(0);
		transform: scale(0);
		-webkit-transition: all 0.3s ease 0s;
		-moz-transition: all 0.3s ease 0s;
		-o-transition: all 0.3s ease 0s;
		transition: all 0.3s ease 0s;
	}
	.gallery_item:hover .gallery_overlay{
		-webkit-transform: scale(1.0);
		-moz-transform: scale(1.0);
		-o-transform: scale(1.0);
		-ms-transform: scale(1.0);
		transform: scale(1.0);
	}
	.gallery_item .gallery_overlay .icon{
	    bottom: 0;
	    left: 0;
		position: absolute;
	    right: 0;
	    top: 25%;
	    text-align: center;
	}
	.gallery_item .gallery_overlay .icon span{
		color: #ffffff;
		font-size: 50px;
	}
</style>   
    
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

<script>

let panorama;

function initMap() {
  const map = new google.maps.Map(document.getElementById("map-canvas"), {
    zoom: 17,
    //center: { lat: -34.397, lng: 150.644 },
  });
  const geocoder = new google.maps.Geocoder();
  
  /*document.getElementById("submit").addEventListener("click", () => {
    geocodeAddress(geocoder, map);
  });*/
  
  $(document).ready(function(){
      
      geocodeAddress(geocoder, map);
      geocodeAddressForStreetView(geocoder);
      
  });
  
}

function geocodeAddress(geocoder, resultsMap) {
  const address = document.getElementById("address").value;
  geocoder.geocode({ address: address }, (results, status) => {
      
    if (status === "OK") {
      resultsMap.setCenter(results[0].geometry.location);
      new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
      });
    } else {
      console.log("Geocode was not successful for the following reason: " + status);
    }
    
  });
}

function geocodeAddressForStreetView(geocoder) {
  const address2 = document.getElementById("address").value;
  geocoder.geocode({ address: address2 }, (results, status) => {
      
    if (status === "OK") {
      
      /*resultsMap.setCenter(results[0].geometry.location);
      new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
      });*/
      
      panorama = new google.maps.StreetViewPanorama(
        document.getElementById("street-view"),
        {
          position: results[0].geometry.location,
          pov: { heading: 165, pitch: 0 },
          zoom: 10,
        }
      );
      
    } else {
      console.log("Geocode was not successful for the following reason: " + status);
    }
    
  });
}


</script>
    
</head>
<body>
    
    
<div class="wrapper">
	
	
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
	
	<!-- Listing Single v5 Home Area -->
	


	
    <div class="single_page_listing_tab">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="slider-tab" data-toggle="tab" href="#slider_tabs" role="tab" aria-controls="slider_tabs" aria-selected="true"><span class="flaticon-photo-camera color-white"></span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="map-tab" data-toggle="tab" href="#map_tabs" role="tab" aria-controls="map_tabs" aria-selected="false"><span class="flaticon-pin color-white"></span></a>
						</li>
						<li class="nav-item">
					    	<a class="nav-link" id="street-view-tab" data-toggle="tab" href="#street_view" role="tab" aria-controls="street_view" aria-selected="false"><span class="flaticon-street-view color-white"></span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="slider_tabs" role="tabpanel" aria-labelledby="slider-tab">
			  	<!-- 10th Home Slider -->
				<div class="home10-mainslider">
					<div class="container-fluid p0">
						<div class="row">
							<div class="col-lg-12">
								<div class="main-banner-wrapper home10">
								    <div class="banner-style-one owl-theme owl-carousel">
								        <div class="slide slide-one flex popup-img" href="assets/php/Uploaded/Images/<?php echo json_decode($database->fetched_Pimage)[0]; ?>" style="background-image: url('assets/php/Uploaded/Images/<?php echo json_decode($database->fetched_Pimage)[0]; ?>');height: 600px;cursor:pointer;"></div>
								        
								        <a style="display:none;"><img class="img-fluid" src="images/property/1.jpg" alt="1.jpg"></a>
								        
								        <?php 
							    
        							        for($i=1; $i <  count(json_decode($database->fetched_Pimage)); $i++) {
        							        
        							        
        							    
        							    ?>
							    
								        <div class="slide slide-one flex popup-img" href="assets/php/Uploaded/Images/<?php echo json_decode($database->fetched_Pimage)[$i] ?>" style="background-image: url('assets/php/Uploaded/Images/<?php echo json_decode($database->fetched_Pimage)[$i] ?>');height: 600px;cursor:pointer;"></div>
								        
								        <?php } ?>
   
								        
								    </div>
								    <div class="carousel-btn-block banner-carousel-btn">
								        <span class="carousel-btn left-btn"><i class="flaticon-left-arrow-1 left"></i></span>
								        <span class="carousel-btn right-btn"><i class="flaticon-right-arrow right"></i></span>
								    </div><!-- /.carousel-btn-block banner-carousel-btn -->
								</div><!-- /.main-banner-wrapper -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="map_tabs" role="tabpanel" aria-labelledby="map-tab">
			    <div id="floating-panel">
                  <input id="address" type="textbox" value="<?php echo $database->fetched_Paddress; ?> <?php echo $database->fetched_Pcity; ?>, <?php echo $database->fetched_Pcounty; ?> <?php echo $database->fetched_Pzip; ?>" />
                  <input id="submit" type="button" value="Search" />
                </div>
			  	<div class="h600" id="map-canvas"></div>
		  	</div>
		  	<div class="tab-pane fade" id="street_view" role="tabpanel" aria-labelledby="street-view-tab">
		  		<div class="h600 w100" id="street-view"></div>
		  	</div>
		</div>
	</div>

	<!-- Agent Single Grid View -->
	<section class="our-agent-single bgc-f7 pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-xl-8">
					<div class="single_property_title mt30-767 mb30-767">
						<h2><?php echo $database->fetched_Pname; ?></h2>
						<p><?php echo $database->fetched_Paddress; ?> <?php echo $database->fetched_Pcity; ?>, <?php echo $database->fetched_Pcounty; ?> <?php echo $database->fetched_Pzip; ?></p>
					</div>
				</div>
				<div class="col-lg-5 col-xl-4">
					<div class="single_property_social_share">
						<div class="price float-left fn-400">
							<h2>£ <?php echo $database->fetched_Pprice; ?> / <?php echo $database->fetched_PpricePeriod; ?></h2>
							<h4 style="text-align:center;">Deposit: £ <?php echo $database->fetched_PstartPrice; ?> </h4>
						</div>
						<div class="spss mt20 text-right tal-400">
							<ul class="mb0">
								<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
								<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-8 mt50">
					<div class="row">
						<div class="col-lg-12">
							<div class="listing_single_description">
								<div class="lsd_list">
									<ul class="mb0">
										<li class="list-inline-item"><a href="#"><?php echo $database->fetched_Ptype; ?></a></li>
										<li class="list-inline-item"><a href="#">Beds: <?php echo $database->fetched_Pbedrooms; ?></a></li>
										<li class="list-inline-item"><a href="#">Baths: <?php echo $database->fetched_Pbathrooms; ?></a></li>
										<li class="list-inline-item"><a href="#">Rooms: <?php echo $database->fetched_Prooms; ?></a></li>
									</ul>
								</div>
								
								<h4><i class="las la-calendar" style="font-size:24px;"></i> Let by <?php echo $database->fetched_PletDate; ?></h4>
								

							</div>
						</div>
						
						  
							    
						<div class="col-lg-12">
							<div class="additional_details mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb15">Property Details</h4>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Property ID :</p></li>
											<li><p>Property Size :</p></li>
											<li><p>Year Built :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span><?php echo $database->fetched_Pcode; ?></span></p></li>
											<li><p><span><?php echo $database->fetched_Psize; ?></span></p></li>
											<li><p><span><?php echo $database->fetched_PyearBuilt; ?></span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Furnish :</p></li>
											<li><p>Windows :</p></li>
											<li><p>Heating :</p></li>
											<li><p>Garage :</p></li>
											<li><p>Garage Size :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span><?php echo $database->fetched_PfurnishType; ?></span></p></li>
											<li><p><span><?php echo $database->fetched_PwindowsType; ?></span></p></li>
											<li><p><span><?php echo $database->fetched_PheatingType; ?></span></p></li>
											<li><p><span><?php echo $database->fetched_Pgarage; ?></span></p></li>
											<li><p><span><?php echo $database->fetched_PgarageSize; ?></span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Property Type : </p> <strong></strong></li>
											<li><p>Property Status :</p> <strong></strong></li>
											<!--<li><p>Ownership Type :</p> <strong></strong></li>
											<li><p>Sale Type :</p> <strong></strong></li>-->
										</ul>
										<ul class="list-inline-item">
											<li><p><span><?php echo $database->fetched_Ptype; ?></span></p></li>
											<li><p><span><?php echo $database->fetched_Pstatus; ?></span></p></li>
											<!--<li><p><span><?php echo $database->fetched_PownershipType; ?></span></p></li>
											<li><p><span><?php echo $database->fetched_PsaleType; ?></span></p></li>-->
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="application_statics mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb10">Features</h4>
									</div>
									
									<?php 
							    
    							        $features = explode(",", $database->fetched_Pfeatures);
    							        
    							        foreach($features as $key=>$value) {
    							    
    							    ?>
    							    
									<div class="col-sm-6 col-md-6 col-lg-4">
										<ul class="order_list list-inline-item">
											<li><a href="#"><span class="flaticon-tick"></span><?php echo $value?></a></li>
										</ul>
									</div>
									
									<?php } ?>
									

								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="application_statics mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb10">Nearest amenities</h4>
									</div>
									
									<?php 
							    
    							        $features = explode(",", $database->fetched_PnearestAmenities);
    							        
    							        foreach($features as $key=>$value) {
    							    
    							    ?>
    							    
									<div class="col-sm-6 col-md-6 col-lg-4">
										<ul class="order_list list-inline-item">
											<li><a href="#"><span class="flaticon-tick"></span><?php echo $value?></a></li>
										</ul>
									</div>
									
									<?php } ?>
									

								</div>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="listing_single_description mt30">
							    
						        <h3 class="mb30">Description</h3>
						    	<p class="mb25"><?php echo $database->fetched_Pdetails; ?></p>
								
							
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="property_attachment_area mt30">
								<h3 class="mb30">Property Attachments</h3>
								<div class="iba_container style2">
									
									<?php 
							    
        							        for($i=0; $i <  count(json_decode($database->fetched_PAttachment)); $i++) {
        							        
        							        
        							    
        							    ?>
        							    
        							    <a href="assets/php/Uploaded/Attachments/<?php echo json_decode($database->fetched_PAttachment)[$i] ?>">
        							    
    									    <div class="icon_box_area style2">
        										<div class="score"><span class="flaticon-pdf text-thm fz30"></span></div>
        										<div class="details">
        											<h5><span class="flaticon-download text-thm pr10"></span> <?php echo json_decode($database->fetched_PAttachment)[$i] ?></h5>
        										</div>
        									</div>
        									
        								</a>	
									
									<?php } ?>
									
								</div>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="property_attachment_area mt30">
								<h3 class="mb30">Energy performance certificate</h3>
								<div class="iba_container style2">
								    
                                			<div class="row">
									
									<?php 
							    
        							        for($i=0; $i <  count(json_decode($database->fetched_P_epcImage)); $i++) {
        							        
        							        
        							    
        							    ?>
        							    
        								<div class="col-sm-6 col-md-6 col-lg-6">
                        					<div class="gallery_item">
                        						<img class="img-fluid img-circle-rounded w100" src="assets/php/Uploaded/Images/<?php echo json_decode($database->fetched_P_epcImage)[$i] ?>" alt="">
                        						<div class="gallery_overlay"><a class="icon popup-img" href="assets/php/Uploaded/Images/<?php echo json_decode($database->fetched_P_epcImage)[$i] ?>"><span class="flaticon-zoom-in"></span></a></div>
                        					</div>
                        				</div>
									
									<?php } ?>
									
									</div>

									
								</div>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="application_statics mt30">
								<h4 class="mb30">Floor plans</h4>
								<div class="faq_according style2">
									<div class="accordion" id="accordionExample">
									    
									    <?php
					    
                					        $sql = $database->get_specific_listing_floorplans($database->fetched_PID);
                					        
                					        $floorcount = 0;
                					        
                					        foreach($sql as $row) {
                					            
                					            $floorcount = $floorcount + 1;
                					            
                					            
                					    ?>
					    
									  	<div class="card floor_plan">
										    <div class="card-header" id="#h<?php echo $row["FloorplanId"];?>">
										    	<h2 class="mb-0">
										        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#k<?php echo $row["FloorplanId"];?>" aria-expanded="true" aria-controls="k<?php echo $row["FloorplanId"];?>">
										        		<ul class="mb0">
										        			<li class="list-inline-item">Floor <?php echo $floorcount; ?></li>
										        			<li class="list-inline-item"><p>Size: </p> <span> <?php echo $row["FloorplanSize"]; ?></span></li>
										        			<li class="list-inline-item"><p>Bedrooms: </p> <span><?php echo $row["FloorplanBedrooms"]; ?></span></li>
										        			<li class="list-inline-item"><p>Bathrooms: </p> <span><?php echo $row["FloorplanBathrooms"]; ?></span></li>
										        			<li class="list-inline-item"><p>Price: </p> <span>£ <?php echo $row["FloorplanPrice"]; ?></span></li>
										        		</ul>
										        	</button>
										   		</h2>
										    </div>
										    <div id="k<?php echo $row["FloorplanId"];?>" class="collapse" aria-labelledby="#h<?php echo $row["FloorplanId"];?>" data-parent="#accordionExample" style="">
											    <div class="card-body text-center">
											    	<img class="img-fluid" src="assets/php/<?php echo $row["FloorplanImage"];?>" alt="">
									        		<p><?php echo $row["FloorplanDesc"];?></p>
											    </div>
										    </div>
									    </div>
									    
									    <?php } ?>
									    
									    
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="shop_single_tab_content style2 mt30">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
									    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Property video</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent2">
									<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
										<div class="property_video">
											<div class="thumb">
											    <video src="assets/php/Uploaded/Videos/<?php echo json_decode($database->fetched_PVideo)[0] ?>" width="100%" controls>
												<img class="pro_img img-fluid w100" src="images/background/7.jpg" alt="7.jpg">
												<div class="overlay_icon">
													<a class="video_popup_btn popup-img red popup-youtube" href="https://www.youtube.com/watch?v=oqNZOOWF8qM"><span class="flaticon-play"></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="walkscore_area mt30">
								<h4 class="mb30">Walkscore <span class="float-right"><img src="images/resource/wscore.png" alt="wscore.png"></span></h4>
								<div class="iba_container">
									<div class="icon_box_area">
										<div class="score"><span>70</span></div>
										<div class="details">
											<h5>Walk Score</h5>
											<p>Somewhat Walkable</p>
										</div>
									</div>
									<div class="icon_box_area">
										<div class="score"><span>40</span></div>
										<div class="details">
											<h5>Bike Score</h5>
											<p>Bikeable</p>
										</div>
									</div>
								</div>
								<a class="more_info" href="#">More Details Here</a>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="application_statics mt30">
								<div class="row">
									<div class="col-lg-12">
										<div class="chart_circle_doughnut">
											<h4>Mortgage Calculator</h4>
										
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
											<select class="selectpicker" data-live-search="true" data-width="100%">
												<option data-tokens="Terms">Terms</option>
												<option data-tokens="Terms2">Terms2</option>
												<option data-tokens="Terms3">Terms3</option>
												<option data-tokens="Terms4">Terms4</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<input type="text" class="form-control" id="formGroupExampleWebsite" placeholder="Interest">
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<input type="text" class="form-control" id="formGroupExampleFaceBook" placeholder="Home Price">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<input type="text" class="form-control" id="formGroupExampleTwitter" placeholder="Down Payment">
										</div>
									</div>
									<div class="col-lg-6 col-xl-2">
										<div class="my_profile_setting_input form-group">
									    	<input type="text" class="form-control" id="formGroupExampleLinkedin" placeholder="10%">
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="product_single_content">
								<div class="mbp_pagination_comments mt30">
									<ul class="total_reivew_view">
										<li class="list-inline-item sub_titles">2 Reviews</li>
										<li class="list-inline-item">
											<ul class="star_list">
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											</ul>
										</li>
										<li class="list-inline-item avrg_review">( 4.5 out of 5 )</li>
										<li class="list-inline-item write_review">All Reviews</li>
									</ul>
									<div class="mbp_first media">
										<img src="images/team/e1.jpg" class="mr-3" alt="1.png">
										<div class="media-body">
									    	<h4 class="sub_title mt-0">Brian Wanene
												<div class="sspd_review dif">
													<ul class="ml10">
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"></li>
													</ul>
												</div>
									    	</h4>
									    	<a class="sspd_postdate fz14" href="#">December 28, 2020</a>
									    	<p class="mt10">Beautiful home</p>
										</div>
									</div>
									<div class="custom_hr"></div>
									<div class="mbp_first media">
										<img src="images/team/e1.jpg" class="mr-3" alt="2.png">
										<div class="media-body">
									    	<h4 class="sub_title mt-0">Kanji Antony
												<div class="sspd_review dif">
													<ul class="ml10">
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"></li>
													</ul>
												</div>
									    	</h4>
									    	<a class="sspd_postdate fz14" href="#">December 28, 2020</a>
									    	<p class="mt10">would love to come back during the cooler seasons!</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="product_single_content">
								<div class="mbp_pagination_comments mt30">
									<div class="mbp_comment_form style2">
										<h4>Write a Review</h4>
										<ul class="sspd_review">
											<li class="list-inline-item">
												<ul class="mb0">
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
												</ul>
											</li>
											<li class="list-inline-item review_rating_para">Your Rating & Review</li>
										</ul>
										<form class="comments_form">
											<div class="form-group">
										    	<input type="text" class="form-control" id="exampleInputName1" aria-describedby="textHelp" placeholder="Review Title">
											</div>
											<div class="form-group">
											    <textarea class="form-control" id="exampleFormControlTextarea1" rows="12" placeholder="Your Review"></textarea>
											</div>
											<button type="submit" class="btn btn-thm">Submit Review <span class="flaticon-right-arrow-1"></span></button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<h4 class="mt30 mb30">Similar Properties</h4>
						</div>
						
						<?php
					    
					        $sql = $database->get_all_user_category_based_listings_related("Rent",$pid,$database->fetched_ownerId);
					        
					        foreach($sql as $row) {
					            
					            $database->get_session_details($row["OwnerId"]);
					    
					    ?>
					    
						<div class="col-lg-6">
							<div class="feat_property">
								<div class="thumb">
									<img class="img-whp" src="assets/php/Uploaded/Images/<?php echo json_decode($row['Pimage'])[0];?>" alt="fp1.jpg">
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item"><a href="#">For Rent</a></li>
										</ul>
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
										<a class="fp_price" href="#">£ <?php echo $row['Pprice'];?><!--<small>/mo</small>--></a>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p class="text-thm"><?php echo $row['Ptype'];?></p>
										<h4><?php echo $row['Pname'];?></h4>
										<p><span class="flaticon-placeholder"></span> <?php echo $row['Paddress'];?>, <?php echo $row['Pcity'];?>, <?php echo $row['Pcounty'];?></p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="#">Beds: <?php echo $row['Pbedrooms'];?></a></li>
											<li class="list-inline-item"><a href="#">Baths: <?php echo $row['Pbathrooms'];?></a></li>
											<li class="list-inline-item"><a href="#"><?php echo $row['Psize'];?></a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="assets/php/<?php echo $database->session_user_pic; ?>" alt=""></a></li>
											<li class="list-inline-item"><a href="#"><?php echo $database->session_username; ?></a></li>
										</ul>
										
									</div>
								</div>
							</div>
						</div>
						
						<?php } ?>

					</div>
				</div>
				<div class="col-lg-4 col-xl-4 mt50">
					<div class="sidebar_listing_list">
					    
					    <?php
					    
					        $database->get_session_details($database->fetched_ownerId);
					    
					    ?>
					    
						<div class="sidebar_advanced_search_widget">
							<div class="sl_creator">
								<h4 class="mb25">Listed By</h4>
								<div class="media">
									<img class="mr-3" src="assets/php/<?php echo $database->session_user_pic; ?>" alt="lc1.png">
									<div class="media-body">
								    	<h5 class="mt-0 mb0"><?php echo $database->session_username; ?></h5>
								    	<p class="mb0"><?php echo $database->session_user_phone; ?></p>
								    	<p class="mb0"><?php echo $database->session_email; ?></p>
								    	<a class="text-thm" href="user_view.php?id=<?php echo $database->session_user_id; ?>">View <?php echo $database->session_user_type; ?>'s Listings</a>
								  	</div>
								</div>
							</div>
							
    						<h2 id="booking_dummy_loading_text"></h2>
                            <h2 id="booking_dummy_loading" style='color:#1d293e;'></h2>
                        
                            <h2 id="booking_status" style="color:#1d293e;"></h2>

							
							<form method="post" id="booking_form">
    							<ul class="sasw_list mb0">
    								<li class="search_area">
    								    <div class="form-group">
    								    	<input type="text" class="form-control" id="booking_name" placeholder="Your Name">
    								    	<input type="hidden" class="form-control" id="p_id" value="<?php echo $pid; ?>" required>
    								    	<input type="hidden" class="form-control" id="p_owner_id" value="<?php echo $database->session_user_id; ?>" required>
    								    </div>
    								</li>
    								<li class="search_area">
    								    <div class="form-group">
    								    	<input type="number" class="form-control" id="booking_phone" placeholder="Phone">
    								    </div>
    								</li>
    								<li class="search_area">
    								    <div class="form-group">
    								    	<input type="email" class="form-control" id="booking_email" placeholder="Email">
    								    </div>
    								</li>
    								<li class="search_area">
    		                            <div class="form-group">
    		                                <textarea id="booking_message" name="form_message" class="form-control required" rows="5" required="required" placeholder="I'm interest in [ Listing Single ]"></textarea>
    		                            </div>
    								</li>
    								<li>
    									<div class="search_option_button">
    									    <button type="submit" class="btn btn-block btn-thm">Request</button>
    									</div>
    								</li>
    							</ul>
    						</form>	
						</div>
					</div>
					<div class="sidebar_listing_list">
						<div class="sidebar_advanced_search_widget">
							<ul class="sasw_list mb0">
								<li class="search_area">
								    <div class="form-group">
								    	<input type="text" class="form-control" id="exampleInputName1" placeholder="keyword">
								    	<label for="exampleInputEmail"><span class="flaticon-magnifying-glass"></span></label>
								    </div>
								</li>
								<li class="search_area">
								    <div class="form-group">
								    	<input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
								    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
								    </div>
								</li>
								<li>
									<div class="search_option_two">
										<div class="candidate_revew_select">
											<select class="selectpicker w100 show-tick">
												<option>Status</option>
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
								<li>
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
								<li>
									<div class="small_dropdown2">
									    <div id="prncgs2" class="btn dd_btn">
									    	<span>Price</span>
									    	<label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
									    </div>
									  	<div class="dd_content2">
										    <div class="pricing_acontent">
										    	<span id="slider-range-value1"></span>
												<span class="mt0" id="slider-range-value2"></span>
											    <div id="slider"></div>
												<!-- <input type="text" class="amount" placeholder="$52,239"> 
												<input type="text" class="amount2" placeholder="$985,14">
												<div class="slider-range"></div> -->
										    </div>
									  	</div>
									</div>
								</li>
								<li>
									<div class="search_option_two">
										<div class="candidate_revew_select">
											<select class="selectpicker w100 show-tick">
												<option>Bathrooms</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
											</select>
										</div>
									</div>
								</li>
								<li>
									<div class="search_option_two">
										<div class="candidate_revew_select">
											<select class="selectpicker w100 show-tick">
												<option>Bedrooms</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
											</select>
										</div>
									</div>
								</li>
								<li>
									<div class="search_option_two">
										<div class="candidate_revew_select">
											<select class="selectpicker w100 show-tick">
												<option>Garages</option>
												<option>Yes</option>
												<option>No</option>
												<option>Others</option>
											</select>
										</div>
									</div>
								</li>
								<li>
									<div class="search_option_two">
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
									</div>
								</li>
								<li class="min_area list-inline-item">
								    <div class="form-group">
								    	<input type="text" class="form-control" id="exampleInputName2" placeholder="Min Area">
								    </div>
								</li>
								<li class="max_area list-inline-item">
								    <div class="form-group">
								    	<input type="text" class="form-control" id="exampleInputName3" placeholder="Max Area">
								    </div>
								</li>
								<li>
								  	<div id="accordion" class="panel-group">
									    <div class="panel">
									      	<div class="panel-heading">
										      	<h4 class="panel-title">
										        	<a href="#panelBodyRating" class="accordion-toggle link" data-toggle="collapse" data-parent="#accordion"><i class="flaticon-more"></i> Advanced features</a>
										        </h4>
									      	</div>
										    <div id="panelBodyRating" class="panel-collapse collapse">
										        <div class="panel-body row">
										      		<div class="col-lg-12">
										                <ul class="ui_kit_checkbox selectable-list float-left fn-400">
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck16">
																	<label class="custom-control-label" for="customCheck16">Air Conditioning</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck17">
																	<label class="custom-control-label" for="customCheck17">Barbeque</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck18">
																	<label class="custom-control-label" for="customCheck18">Gym</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck19">
																	<label class="custom-control-label" for="customCheck19">Microwave</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck20">
																	<label class="custom-control-label" for="customCheck20">TV Cable</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck21">
																	<label class="custom-control-label" for="customCheck21">Lawn</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck22">
																	<label class="custom-control-label" for="customCheck22">Refrigerator</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck23">
																	<label class="custom-control-label" for="customCheck23">Swimming Pool</label>
																</div>
										                	</li>
										                </ul>
										                <ul class="ui_kit_checkbox selectable-list float-right fn-400">
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck24">
																	<label class="custom-control-label" for="customCheck24">WiFi</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck25">
																	<label class="custom-control-label" for="customCheck25">Sauna</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck26">
																	<label class="custom-control-label" for="customCheck26">Dryer</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck27">
																	<label class="custom-control-label" for="customCheck27">Washer</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck28">
																	<label class="custom-control-label" for="customCheck28">Laundry</label>
																</div>
										                	</li>
										                	<li>
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck29">
																	<label class="custom-control-label" for="customCheck29">Outdoor Shower</label>
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
										    </div>
									    </div>
									</div>
								</li>
								<li>
									<div class="search_option_button">
									    <button type="submit" class="btn btn-block btn-thm">Search</button>
									</div>
								</li>
							</ul>
						</div>
					</div>

					<div class="terms_condition_widget">
						<h4 class="title">Categories</h4>
						<div class="widget_list">
							<ul class="list_details">
								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Apartment <span class="float-right">6 properties</span></a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
	
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
<script type="text/javascript" src="js/progressbar.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/pricing-slider.js"></script>
<script type="text/javascript" src="js/timepicker.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7Dg8nq0_0jPI3-oTh-y0nEsO8ocAYsro&callback=initMap&libraries=&v=weekly" async></script>

<!-- Custom script for all pages --> 
<script type="text/javascript" src="js/script.js"></script>
<script src="assets/js/create_account.js"></script>
<script src="assets/js/login.js"></script>
<script src="assets/js/booking_property.js"></script>

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
    
    //fetchAllProperties();

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