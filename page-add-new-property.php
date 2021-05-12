<?php

require_once("includes/initialise.php");

    if($session->is_logged) {

      $database->get_session_details($session->session_id); 
      
        $automation->generate_user_id();

        $listingId = $automation->random_user_id;
      
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
	<div class="preloader"></div>

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
						<div class="col-lg-12 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Add New Property</h2>
								<p>Welcome back!</p>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="my_dashboard_review">
							    <form method="post" id="create_listing_form">
								<div class="row">
								
									<div class="col-lg-12">
										<h4 class="mb30">Create Listing</h4>
										<div class="my_profile_setting_input form-group">
									    	<label for="propertyTitle">Property Title</label>
									    	<input type="text" class="form-control" id="create_listing_name" required>
									    	<input type="hidden" class="form-control" id="create_listing_id" value="<?php echo $listingId; ?>" required>
										</div>
									</div>
									
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Property is for</label>
											<select class="selectpicker" data-live-search="true" data-width="100%" id="create_listing_category" onchange="basedOnCategory()">
												<option data-tokens="Sale">Sale</option>
												<option data-tokens="Rent">Rent</option>
											</select>
										</div>
									</div>
									
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<label>Price</label>
									    	<input type="text" class="form-control" id="create_listing_price">
										</div>
									</div>
									
									<!-- for rent -->
									<div class="col-lg-6 col-xl-6" id="create_listing_duration_all" style="display:none;">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Payment per</label>
											<select class="selectpicker" data-live-search="true" data-width="100%" id="create_listing_duration" >
											    <option data-tokens=""></option>
												<option data-tokens="Month">Month</option>
												<option data-tokens="Year">Year</option>
											</select>
										</div>
									</div>
									
									<div class="col-lg-6 col-xl-6" id="create_listing_deposit_all" style="display:none;">
										<div class="my_profile_setting_input form-group">
									    	<label>Deposit Amount</label>
									    	<input type="text" class="form-control" id="create_listing_deposit" >
										</div>
									</div>
									
									<div class="col-lg-6 col-xl-6" id="create_listing_let_available_date_all" style="display:none;">
										<div class="my_profile_setting_input form-group">
									    	<label>Let available date</label>
									    	<input type="date" class="form-control" id="create_listing_let_available_date" >
										</div>
									</div>
									
									<!-- for sale -->
									
									<div class="col-lg-6 col-xl-6" id="create_listing_ownership_type_all" style="display:block;">
										<div class="my_profile_setting_input form-group">
									    	<label>Ownership type</label>
									    	<input type="text" class="form-control" id="create_listing_ownership_type" >
										</div>
									</div>
									
									<div class="col-lg-6 col-xl-6" id="create_listing_sale_type_all" style="display:block;">
										<div class="my_profile_setting_input form-group">
									    	<label>Sale type</label>
									    	<input type="text" class="form-control" id="create_listing_sale_type" >
										</div>
									</div>
									
									
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Type</label>
											<select class="selectpicker" data-live-search="true" data-width="100%" id="create_listing_type">
												<option>Apartment</option>
															<option>Bungalow</option>
															<option>Condo</option>
															<option>House</option>
															<option>Single Family</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Status</label>
											<select class="selectpicker" data-live-search="true" data-width="100%" id="create_listing_status" >
												<option data-tokens="Enabled">Enabled</option>
												<option data-tokens="Disabled">Disabled</option>
											</select>
										</div>
									</div>
									
									
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<label>Area (Square Metres)</label>
									    	<input type="text" class="form-control" id="create_listing_area">
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Rooms</label>
											<input type="text" class="form-control" id="create_listing_rooms">
										</div>
									</div>
									
									<div class="col-lg-12">
										<div class="my_profile_setting_textarea">
										    <label for="propertyDescription">Description</label>
										    <textarea class="form-control" id="create_listing_desc" rows="7"></textarea>
										</div>
									</div>
									
									<div class="col-lg-12 col-xl-12">
										<h2 id="create_listing_dummy_loading_text"></h2>
                                        <h2 id="create_listing_dummy_loading" style='color:#1d293e;'></h2>
                    
                                        <h2 id="create_listing_status" style="color:#1d293e;"></h2>
									</div>
									
									<div class="col-xl-12">
									    
									    
									    
										<div class="my_profile_setting_input">
											<button type="submit" class="btn btn2 float-right" id="create_listing_btn">Next</button>
										</div>
									</div>
									
								</div>
								</form>
							</div>
							<div class="my_dashboard_review mt30">
							    
							    <form method="post" id="create_listing_location_form">
							        
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Location</h4>
										<input type="hidden" class="form-control" id="listing_location_property_id" value="<?php echo $listingId; ?>" required>
										<div class="my_profile_setting_input form-group">
									    	<label for="create_listing_location_address">Address</label>
									    	<input type="text" class="form-control" id="create_listing_location_address" value="" required>
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<label for="create_listing_location_county">County / State</label>
									    	<input type="text" class="form-control" id="create_listing_location_county" value="" required>
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<label for="create_listing_location_city">City</label>
									    	<input type="text" class="form-control" id="create_listing_location_city" value="" required>
										</div>
									</div>
									
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<label for="create_listing_location_zip">Zip code</label>
									    	<input type="text" class="form-control" id="create_listing_location_zip" value="" >
										</div>
									</div>
									
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Country</label>
											<select class="selectpicker" data-live-search="true" data-width="100%" id="create_listing_location_country" value="" required>
												<option data-tokens="United Kingdom">United Kingdom</option>
											</select>
										</div>
									</div>
									
									
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="create_listing_location_latitude"></label>
									    	<input type="text" class="form-control" id="create_listing_location_latitude" value="" style="display:none;">
										</div>
									</div>
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="create_listing_location_longitude"></label>
									    	<input type="text" class="form-control" id="create_listing_location_longitude" value="" style="display:none;">
										</div>
									</div>
									
									<div class="col-lg-12 col-xl-12">
    										<h2 id="create_listing_location_dummy_loading_text"></h2>
                                            <h2 id="create_listing_location_dummy_loading" style='color:#1d293e;'></h2>
                        
                                            <h2 id="create_listing_location_status" style="color:#1d293e;"></h2>
    									</div>

									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<button class="btn btn1 float-left">Back</button>
											<button type="submit" class="btn btn2 float-right">Next</button>
										</div>
									</div>
								</div>
								
								</form>
								
							</div>
							<div class="my_dashboard_review mt30">
							    <form method="post" id="create_listing_detailed_property_form">
								    <div class="row">
    									<div class="col-lg-12">
    										<h4 class="mb30">Detailed Information</h4>
    										<input type="hidden" class="form-control" id="listing_property_id" value="<?php echo $listingId; ?>" required>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="propertyId">Property ID</label>
    									    	<input type="text" class="form-control" id="create_listing_property_id_code" >
    										</div>
    									</div>
    									
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="">Furnish type</label>
    									    	<input type="text" class="form-control" id="create_listing_property_furnish_type" >
    										</div>
    									</div>
    									
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="">Window type</label>
    									    	<input type="text" class="form-control" id="create_listing_property_windows_type" >
    										</div>
    									</div>
    									
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="">Heating type</label>
    									    	<input type="text" class="form-control" id="create_listing_property_heating_type" >
    										</div>
    									</div>
    									
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="bedRooms">Bedrooms</label>
    									    	<input type="text" class="form-control" id="create_listing_property_bedrooms" required>
    										</div>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="bathRooms">Bathrooms</label>
    									    	<input type="text" class="form-control" id="create_listing_property_bathrooms" required>
    										</div>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="garages">Garages</label>
    									    	<input type="text" class="form-control" id="create_listing_property_garage" >
    										</div>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="garagesSize">Garages Size</label>
    									    	<input type="text" class="form-control" id="create_listing_property_garage_size" >
    										</div>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="yearBuild">Year Built</label>
    									    	<input type="text" class="form-control" id="create_listing_property_year_built" >
    										</div>
    									</div>
    							        <div class="col-xl-12">
    							        	<h4>Amenities</h4>
    							        </div>
    							        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
    						                <ul class="ui_kit_checkbox selectable-list">
    						                	<li>
    												<div class="custom-control custom-checkbox">
    													<input type="checkbox" class="custom-control-input" id="AirConditioning" value="Air Conditioning">
    													<label class="custom-control-label" for="AirConditioning">Air Conditioning</label>
    												</div>
    						                	</li>
    						                	<li>
    												<div class="custom-control custom-checkbox">
    													<input type="checkbox" class="custom-control-input" id="Lawn" value="Lawn">
    													<label class="custom-control-label" for="Lawn">Lawn</label>
    												</div>
    						                	</li>
    						                	<li>
    												<div class="custom-control custom-checkbox">
    													<input type="checkbox" class="custom-control-input" id="SwimmingPool" value="Swimming Pool">
    													<label class="custom-control-label" for="SwimmingPool">Swimming Pool</label>
    												</div>
    						                	</li>
    						                	<li>
    												<div class="custom-control custom-checkbox">
    													<input type="checkbox" class="custom-control-input" id="Barbeque" value="Barbeque">
    													<label class="custom-control-label" for="Barbeque">Barbeque</label>
    												</div>
    						                	</li>
    						                	<li>
    												<div class="custom-control custom-checkbox">
    													<input type="checkbox" class="custom-control-input" id="Microwave" value="Microwave">
    													<label class="custom-control-label" for="Microwave">Microwave</label>
    												</div>
    						                	</li>
    						                </ul>
    							        </div>
    							        
    							        <div class="col-lg-12">
    										<div class="my_profile_setting_textarea">
    										    <label for="propertyDescription">Nearest amenitites</label>
    										    <textarea class="form-control" id="create_listing_property_nearest_amenities" placeholder="Separate the different amenities using a comma e.g Mall, School, Supermarket" rows="7"></textarea>
    										</div>
    									</div>
    							        <!--<div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
    						                <ul class="ui_kit_checkbox selectable-list">
    						                	<li>
    												<div class="custom-control custom-checkbox">
    													<input type="checkbox" class="custom-control-input" id="customCheck6">
    													<label class="custom-control-label" for="customCheck6">TV Cable</label>
    												</div>
    						                	</li>
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
    						                	<li>
    												<div class="custom-control custom-checkbox">
    													<input type="checkbox" class="custom-control-input" id="customCheck10">
    													<label class="custom-control-label" for="customCheck10">Gym</label>
    												</div>
    						                	</li>
    						                </ul>
    							        </div>
    							        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
    						                <ul class="ui_kit_checkbox selectable-list">
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
    							        </div> -->
    									
    									<div class="col-lg-12 col-xl-12">
    										<h2 id="create_listing_detailed_property_dummy_loading_text"></h2>
                                            <h2 id="create_listing_detailed_property_dummy_loading" style='color:#1d293e;'></h2>
                        
                                            <h2 id="create_listing_detailed_property_status" style="color:#1d293e;"></h2>
    									</div>
									
    									<div class="col-xl-12">
    										<div class="my_profile_setting_input">
    											<button class="btn btn1 float-left">Back</button>
    											<button type="submit" class="btn btn2 float-right" id="create_listing_detailed_property_btn">Next</button>
    										</div>
    									</div>
    								</div>
    							</form>	
							</div>
							
							<div class="my_dashboard_review mt30">
							    <form method="post" id="upload_image_media_form">
									    	
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Property media</h4>
									</div>
									<div class="col-lg-12">
										<ul class="mb0">
											<li class="list-inline-item">
											    <div id="myImg"></div>
												<!--<div class="portfolio_item">
													<img class="" src="" alt="">
								    				<div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></div>
												</div>-->
											</li>
										</ul>
									</div>
									
									<div class="col-lg-12">
									    
									    <input type="hidden" class="form-control" id="upload_image_media_id" value="<?php echo $listingId; ?>" required>
									        <div class="drag-text" style="position:absolute;z-index:1;">
        											<div class="icon"><span class="flaticon-download"></span></div>
        											<p>Drag and drop images here</p>
        										</div>
    										<div class="portfolio_upload">
    										    
    											<input type="file" class="file-upload-input" name="Pimage[]" id="Pimage" onchange="readURL(this);" accept="image/*" multiple/>
    												
    										</div>
										
									</div>
									
									<!--<div class="col-xl-6">
										<div class="resume_uploader mb30">
											<h4>Attachments</h4>
											
												<input class="upload-path">
												<label class="upload">
												    <input type="file">
												    Select Attachment
												</label>
											
										</div>
									</div>-->
									
									<div class="col-lg-12 col-xl-12">
										<h2 id="upload_image_media_dummy_loading_text"></h2>
                                        <h2 id="upload_image_media_dummy_loading" style='color:#1d293e;'></h2>
                    
                                        <h2 id="upload_image_media_status" style="color:#1d293e;"></h2>
									</div>
									
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<button class="btn btn1 float-left">Back</button>
											<button type="submit" class="btn btn2 float-right" id="upload_image_media_btn">Next</button>
										</div>
									</div>
								</div>
								
								</form>
								
							</div>
							
							<div class="my_dashboard_review mt30">
							    <form method="post" id="upload_video_media_form">
									    	
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Property video media</h4>
									</div>
									<div class="col-lg-12">
										<ul class="mb0">
											<li class="list-inline-item">
											    <div id="myVideo"></div>

											</li>
										</ul>
									</div>
									
									<div class="col-lg-12">
									    
									    <input type="hidden" class="form-control" id="upload_video_media_id" value="<?php echo $listingId; ?>" required>
									        <div class="drag-text" style="position:absolute;z-index:1;">
        											<div class="icon"><span class="flaticon-download"></span></div>
        											<p>Drag and drop video here</p>
        										</div>
    										<div class="portfolio_upload">
    										    
    											<input type="file" class="file-upload-input" name="PVideo[]" id="PVideo" onchange="readVideoURL(this);" accept="/*" />
    												
    										</div>
										
									</div>

									<div class="col-lg-12 col-xl-12">
										<h2 id="upload_video_media_dummy_loading_text"></h2>
                                        <h2 id="upload_video_media_dummy_loading" style='color:#1d293e;'></h2>
                                        <progress id="upload_video_progress_bar" value="0" max="100" style="width:250px;display:none;"></progress>
                                        <p id="upload_video_loaded_total"></p>
                                        <h2 id="upload_video_media_status" style="color:#1d293e;"></h2>
									</div>
									
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<button class="btn btn1 float-left">Back</button>
											<button type="submit" class="btn btn2 float-right" id="upload_video_media_btn">Next</button>
										</div>
									</div>
								</div>
								
								</form>
								
							</div>
							
							<div class="my_dashboard_review mt30">
							    <form method="post" id="upload_epc_media_form">
									    	
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Energy performance certificate</h4>
									</div>
									<div class="col-lg-12">
										<ul class="mb0">
											<li class="list-inline-item">
											    <div id="myEPC"></div>

											</li>
										</ul>
									</div>
									

									<div class="col-lg-12">
									    
									    <input type="hidden" class="form-control" id="upload_epc_media_id" value="<?php echo $listingId; ?>" required>
									        <div class="drag-text" style="position:absolute;z-index:1;">
        											<div class="icon"><span class="flaticon-download"></span></div>
        											<p>Drag and drop epc images here</p>
        										</div>
    										<div class="portfolio_upload">
    										    
    											<input type="file" class="file-upload-inpu" name="P_epcImage[]" id="P_epcImage" onchange="readEPCURL(this);" accept="image/*" multiple/>
    												
    										</div>
										
									</div>

									<div class="col-lg-12 col-xl-12">
										<h2 id="upload_epc_media_dummy_loading_text"></h2>
                                        <h2 id="upload_epc_media_dummy_loading" style='color:#1d293e;'></h2>
                                        
                                        <h2 id="upload_epc_media_status" style="color:#1d293e;"></h2>
									</div>
									
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<button class="btn btn1 float-left">Back</button>
											<button type="submit" class="btn btn2 float-right" id="upload_epc_media_btn">Next</button>
										</div>
									</div>
								</div>
								
								</form>
								
							</div>
							
							<div class="my_dashboard_review mt30">
							    <form method="post" id="upload_attachment_media_form">
									    	
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Property attachments</h4>
									</div>
									<div class="col-lg-12">
										<ul class="mb0">
											<li class="list-inline-item">
											    <div id="myAttachment"></div>

											</li>
										</ul>
									</div>
									
									<div class="col-lg-12">
									    
									    <input type="hidden" class="form-control" id="upload_attachment_media_id" value="<?php echo $listingId; ?>" required>
									        <div class="drag-text" style="position:absolute;z-index:1;">
        											<div class="icon"><span class="flaticon-download"></span></div>
        											<p>Drag and drop attachment here</p>
        										</div>
    										<div class="portfolio_upload">
    										    
    											<input type="file" class="file-upload-input" name="PAttachment[]" id="PAttachment" onchange="readAttachmentURL(this);" accept="application/pdf" multiple/>
    												
    										</div>
										
									</div>
									
									<!--<div class="col-xl-6">
										<div class="resume_uploader mb30">
											<h4>Attachments</h4>
											
												<input class="upload-path">
												<label class="upload">
												    <input type="file">
												    Select Attachment
												</label>
											
										</div>
									</div>-->
									
									<div class="col-lg-12 col-xl-12">
										<h2 id="upload_attachment_media_dummy_loading_text"></h2>
                                        <h2 id="upload_attachment_media_dummy_loading" style='color:#1d293e;'></h2>
                                        <progress id="upload_attachment_progress_bar" value="0" max="100" style="width:250px;display:none;"></progress>
                                        <p id="upload_attachment_loaded_total"></p>
                                        <h2 id="upload_attachment_media_status" style="color:#1d293e;"></h2>
									</div>
									
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<button class="btn btn1 float-left">Back</button>
											<button type="submit" class="btn btn2 float-right" id="upload_attachment_media_btn">Next</button>
										</div>
									</div>
								</div>
								
								</form>
								
							</div>
							
							<div class="my_dashboard_review mt30">
							    
							    <form method="post" id="create_floorplan_form">
							        
								    <div class="row">
    									<div class="col-lg-12">
    										<h4 class="mb30">Floor Plans</h4>
    										<input type="hidden" class="form-control" id="floorplan_listing_id" value="<?php echo $listingId; ?>" required>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="create_listing_floorplan_bedrooms">Plan Bedrooms</label>
    									    	<input type="number" class="form-control" id="create_listing_floorplan_bedrooms" required>
    										</div>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="create_listing_floorplan_bathrooms">Plan Bathrooms</label>
    									    	<input type="number" class="form-control" id="create_listing_floorplan_bathrooms" required>
    										</div>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="create_listing_floorplan_price">Plan Price</label>
    									    	<input type="number" class="form-control" id="create_listing_floorplan_price" required>
    										</div>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label for="create_listing_floorplan_size">Plan Size</label>
    									    	<input type="text" class="form-control" id="create_listing_floorplan_size" required>
    										</div>
    									</div>
    									<div class="col-lg-6 col-xl-4">
    										<div class="my_profile_setting_input form-group">
    									    	<label>Plan Image</label>
    											<input type="file" class="form-control btn btn-thm" id="create_listing_floorplan_image" accept="image/*" />
    										</div>
    									</div>
    									<div class="col-xl-12">
    										<div class="my_profile_setting_textarea mt30-991">
    										    <label for="planDescription">Plan Description</label>
    										    <textarea class="form-control" id="create_listing_floorplan_desc" required rows="7"></textarea>
    										</div>
    									</div>
    									
    									<div class="col-lg-12 col-xl-12">
    										<h2 id="create_listing_floorplan_dummy_loading_text"></h2>
                                            <h2 id="create_listing_floorplan_dummy_loading" style='color:#1d293e;'></h2>
                        
                                            <h2 id="create_listing_floorplan_status" style="color:#1d293e;"></h2>
    									</div>
    									
    									<div class="col-xl-12">
    										<div class="my_profile_setting_input">
    											<button class="btn btn1 float-left">Back</button>
    											<button type="submit" class="btn btn-thm float-right" id="create_listing_floorplan_btn">Upload</button>
    										</div>
    									</div>
    								</div>
								
								</form>
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

<script src="assets/js/start_creating_listing.js"></script>
<script src="assets/js/upload_image_media.js"></script>
<script src="assets/js/upload_video_media.js"></script>
<script src="assets/js/upload_epc_media.js"></script>
<script src="assets/js/upload_attachment_media.js"></script>
<script src="assets/js/create_floorplans.js"></script>
<script src="assets/js/create_detailed_listing.js"></script>
<script src="assets/js/create_listing_location.js"></script>
<script src="js/dropzone/index.js"></script>

<script>

function basedOnCategory() {
   var category = $('#create_listing_category').find(":selected").text();
   
   if($('#create_listing_category').find(":selected").text() === "Rent") {
       
       //$("#create_listing_deposit").prop('disabled', false);
       //$("#create_listing_duration").prop('disabled', false);create_listing_ownership_type_all,create_listing_sale_type_all
       
       document.getElementById("create_listing_deposit_all").style.display = "block";
       document.getElementById("create_listing_duration_all").style.display = "block";
       document.getElementById("create_listing_let_available_date_all").style.display = "block";
       document.getElementById("create_listing_ownership_type_all").style.display = "none";
       document.getElementById("create_listing_sale_type_all").style.display = "none";

   } 
   
   if($('#create_listing_category').find(":selected").text() === "Sale") {
       
      //$("#create_listing_deposit").prop('disabled', true);
       //$("#create_listing_duration").prop('disabled', "disabled");
       
       document.getElementById("create_listing_deposit_all").style.display = "none";
       document.getElementById("create_listing_duration_all").style.display = "none";
       document.getElementById("create_listing_let_available_date_all").style.display = "none";
       document.getElementById("create_listing_ownership_type_all").style.display = "block";
       document.getElementById("create_listing_sale_type_all").style.display = "block";
       

   } 
   
}

function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    
    for (var i = 0; i < input.files.length; i++) {
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(input.files[i]);
    }


  } else {
    //removeUpload();
  }
}

function readVideoURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    
    for (var i = 0; i < input.files.length; i++) {
        var reader = new FileReader();
        reader.onload = videoIsLoaded;
        reader.readAsDataURL(input.files[i]);
    }


  } else {
    //removeUpload();
  }
}

function readEPCURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();
    
    for (var i = 0; i < input.files.length; i++) {
        var reader = new FileReader();
        reader.onload = imageEPCLoaded;
        reader.readAsDataURL(input.files[i]);
    }


  } else {
    //removeUpload();
  }
}

function readAttachmentURL(input) {
  if (input.files && input.files[0]) {

    //console.log(input.files[0]['name']);
    
    $('#myAttachment').append('<span class="flaticon-pdf text-thm fz30"></span> '+input.files[0]['name']);

  } else {
    //removeUpload();
  }
}

function imageIsLoaded(e) {
  $('#myImg').append('<img class="img-fluid file-upload-image" width="400px" height="400px" src=' + e.target.result + '>');
};

function videoIsLoaded(e) {
    $('#myVideo').html("");
  $('#myVideo').append('<video width="100%" controls src=' + e.target.result + '>');
};

function imageEPCLoaded(e) {
  $('#myEPC').append('<img class="img-fluid file-upload-image" width="400px" height="400px" src=' + e.target.result + '>');
};

function attachmentLoaded(e) {
  $('#myAttachment').append('<a href="' + e.target.result + '"><span class="flaticon-pdf text-thm fz30"></span></a>');
};

</script>

</body>

</html>