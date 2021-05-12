<?php

require_once("includes/initialise.php");

    if($session->is_logged) {

      $database->get_session_details($session->session_id); 
      
      
    } else {

        header("Location: index.php");
  
    }

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
<meta name="description" content="House Rex">
<!-- css file -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/dashbord_navitaion.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="css/responsive.css">
<!-- Title -->
<title>House Rex</title>
<!-- Favicon -->
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />


	<style>
		.my_profile_setting_input .btn1, .my_profile_setting_input .btn2 {
			background: #23A455;
			border : 2px solid #23A455;
			color:#fff;
		}
	</style>

</head>
<body>
<div class="wrapper">
	<!-- <div class="preloader"></div> -->

	<?php include("code_includes/header_admin.php");?>

    <?php include("code_includes/sidebar_drawer_admin.php");?>

	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid ovh">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-lg-9 col-xl-10 maxw100flex-992">
					<div class="row">
						<div class="col-lg-12">
							
							<?php include("code_includes/sidebar_drawer_admin_mobile.php");?>
							
						</div>

						
						<div class="col-lg-12">
							<div class="my_dashboard_review">
								<div class="row">
									<div class="col-xl-2">
										<h4>Profile Information</h4>
									</div>
									<div class="col-xl-10">
									    
									    <form method="post" id="update_profile_pic_form">
									        
									        
    										<div class="row">
    											<div class="col-lg-12">
    												<div class="wrap-custom-file">
    												    <img src="assets/php/<?php echo $database->session_user_pic; ?>" width="150px" height="150px">
    												    <input type="hidden" id="update_profile_pic_user_id" value="<?php echo $database->session_user_id; ?>">
    												    <input type="file" name="image1" id="image1" accept=".gif, .jpg, .png"/>
    												    <label  for="image1" style="background-image: url('');">
    												      	<span><i class="flaticon-download"></i> Upload Photo </span>
    												    </label>
    												</div>
    												<!--<p>*minimum 260px x 260px</p>-->
    											</div>
    											
    											<div class="col-lg-12 col-xl-12">
            										<h2 id="update_profile_pic_dummy_loading_text"></h2>
                                                    <h2 id="update_profile_pic_dummy_loading" style='color:#1d293e;'></h2>
                                
                                                    <h2 id="update_profile_pic_status" style="color:#1d293e;"></h2>
            									</div>
    											
    											<div class="col-xl-12 text-right">
    												<div class="my_profile_setting_input">
    													<button type="submit" class="btn btn2">Update Profile pic</button>
    												</div>
    											</div>
    										</div>
										
										</form>
										
									</div>
								</div>
							</div>
							
							<div class="my_dashboard_review mt30">
								<div class="row">
									<div class="col-xl-2">
										<h4>Profile Information</h4>
									</div>
									<div class="col-xl-10">
									    
									    <form method="post" id="update_profile_info_form">
									        
    										<div class="row">
    											<div class="col-lg-6 col-xl-6">
    												<div class="my_profile_setting_input form-group">
    											    	<label for="">Username</label>
    											    	<input type="text" class="form-control" id="update_profile_info_name" value="<?php echo $database->session_username; ?>">
    											    	<input type="hidden" id="update_profile_info_user_id" value="<?php echo $database->session_user_id; ?>">
    												</div>
    											</div>
    											<div class="col-lg-6 col-xl-6">
            										<div class="my_profile_setting_input ui_kit_select_search form-group">
            									    	<label>User type</label>
            											<select class="selectpicker" data-live-search="true" data-width="100%" id="update_profile_info_usertype">
            												<option data-tokens="Seller">Seller</option>
            												<option data-tokens="User">User</option>
            												<option data-tokens="Agent">Agent</option>
            												<option data-tokens="Agency">Agency</option>
            												<option data-tokens="Developer">Developer</option>
            											</select>
            										</div>
            									</div>
    											<div class="col-lg-6 col-xl-6">
    												<div class="my_profile_setting_input form-group">
    											    	<label for="">Email</label>
    											    	<input type="email" class="form-control" id="update_profile_info_email" value="<?php echo $database->session_email; ?>">
    												</div>
    											</div>
    											
    											<div class="col-lg-6 col-xl-6">
    												<div class="my_profile_setting_input form-group">
    											    	<label for="">Phone</label>
    											    	<input type="text" class="form-control" id="update_profile_info_phone" value="<?php echo $database->session_user_phone; ?>">
    												</div>
    											</div>
    
    											<div class="col-xl-12">
    												<div class="my_profile_setting_textarea">
    												    <label for="">About me</label>
    												    <textarea class="form-control" id="update_profile_info_desc" rows="7"><?php echo $database->session_user_description; ?></textarea>
    												</div>
    											</div>
    											
    											<div class="col-lg-12 col-xl-12">
            										<h2 id="update_profile_info_dummy_loading_text"></h2>
                                                    <h2 id="update_profile_info_dummy_loading" style='color:#1d293e;'></h2>
                                
                                                    <h2 id="update_profile_info_status" style="color:#1d293e;"></h2>
            									</div>
                									
    											<div class="col-xl-12 text-right">
    												<div class="my_profile_setting_input">
    													<button type="submit" class="btn btn2">Update information</button>
    												</div>
    											</div>
    										</div>
										
										</form>
										
									</div>
								</div>
							</div>
							<div class="my_dashboard_review mt30">
								<div class="row">
									<div class="col-xl-2">
										<h4>Social Media</h4>
									</div>
									<div class="col-xl-10">
										<div class="row">

											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="">Facebook</label>
											    	<input type="text" class="form-control" id="">
												</div>
											</div>
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="">Twitter</label>
											    	<input type="text" class="form-control" id="">
												</div>
											</div>
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="">Linkedin</label>
											    	<input type="text" class="form-control" id="">
												</div>
											</div>
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="">Instagram</label>
											    	<input type="text" class="form-control" id="">
												</div>
											</div>
											<div class="col-xl-12 text-right">
												<div class="my_profile_setting_input">
													<button class="btn btn2">Update Profile</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="my_dashboard_review mt30">
								<div class="row">
									<div class="col-xl-2">
										<h4>Change password</h4>
									</div>
									<div class="col-xl-10">
										<div class="row">
											<div class="col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="">Old Password</label>
											    	<input type="text" class="form-control" id="" placeholder="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="">New Password</label>
											    	<input type="text" class="form-control" id="">
												</div>
											</div>
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="">Confirm New Password</label>
											    	<input type="text" class="form-control" id="">
												</div>
											</div>
											<div class="col-xl-12">
												
												<div class="my_profile_setting_input float-right fn-520">
													<button class="btn btn2">Update Profile</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row mt50">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>© 2021 House Rex.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<!-- Wrapper End -->

<?php include("code_includes/scripts_admin.php");?>
<script src="assets/js/update_profile_pic.js"></script>
<script src="assets/js/update_profile_info.js"></script>
<script src="js/dropzone/index.js"></script>


</body>

</html>