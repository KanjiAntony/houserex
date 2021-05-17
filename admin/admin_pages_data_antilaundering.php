<?php

require_once("../includes/initialise.php");

    if($session->is_admin_logged) {

      $database->get_admin_session_details($session->session_id); 
      
		$database->get_pages_data_details("ANTILAUNDERING");
      
    } else {

        header("Location: login.php");
  
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

<!-- Custom icon font-->
<link rel="stylesheet" href="assets/css/themify-icons/themify-icons.css">


<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


	<style>
		.my_profile_setting_input .btn1, .my_profile_setting_input .btn2 {
			background: #23A455;
			border : 2px solid #23A455;
			color:#fff;
		}
        .formattingBar{
                border: 1px solid #ddd;
                margin: 1rem 0;
                border-radius: 2px;
                
                
            }
            
            .formattingBar .format{
                border-bottom: 1px solid #ddd;
                padding: 1rem 0.5rem;
            }
            
            .formattingBar .span{
                padding: 0 1rem;
                border-right: 1px solid #ddd;
            }
            
                .formattingBar .images{
                    padding: 1rem 0.5rem;
                }
            .images>input {
                display: none;
                }
	</style>

</head>
<body onload="loadFormats();edit_post();">
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
						<div class="col-lg-12 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Antilaundering</h2>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="my_dashboard_review">
							    

							<form method="post" id="upload_admin_pages_data">
                    
                            <input id="page_category" type="hidden" value="ANTILAUNDERING">
		
					<div class="form-group">
					  <label for="formattingBar">Content</label>
		
											<div class="formattingBar">
												<div class="format">
													<span class="span" id="bold"  onclick="boldText()"><i class="las la-bold"></i></span>
													<span class="span"  id="underline" onclick="underlineText()"> <span class="ti-underline" alt="B"></span></span>
													<span class="span"  id="italic" onclick="italicsText()"><span class="ti-Italic" alt="B"></span></span>
													<span class="span"  id="justifyLeft" onclick="justifyLeft()"><span class="ti-align-left" alt="left"></span></span>
													<span class="span"  id="justifyCenter" onclick="justifyCenter()"><span class="ti-align-center" alt="center"></span></span>
													<span class="span"  id="justifyRight" onclick="justifyRight()"><span class="ti-align-right" alt="right"></span></span>
													<span class="span" id="numberedList" onclick="numberedList()"><span class="ti-list-ol" alt="number"></span></span>
													<span class="span"  id="dottedList" onclick="dottedList()"><span class="ti-list" alt="dots"></span></span>
													<span class="span"  id="addIndent" onclick="addIndent()"><i class="fas fa-indent" alt="ident"></i></span>
													<span class="span"  id="outdent" onclick="outdent()"><i class="fas fa-outdent" alt="outdent"></i></span>

													<span class="images">

								
														<a><label for="blog_image"><i class="uil-image"></i></label></a>
				
														<input id="blog_image" type="file" name="blog_image" onchange="blogImage()" accept="image/*">

													</span>

												</div>
												
												 <!--<span id="bImage" onclick="blogImage()"><img src='icons/image.gif' alt="image"></span>-->
												 
											  
											</div><!-- end the formattingBar div -->

					  <!-- Image preview -->
						<div id="imagePreview"></div>
						<div id="prev_info" style="display:none"><?php echo $database->fetched_page_data; ?></div>
					  <iframe id="richTextField" name="richTextField" style="width:100%;min-height:1500px;border:1px solid #ddd; border-radius:2px" contenteditable="true"></iframe>
					  
					</div>
					
					<h2 id="dummy_loading_text"></h2>
								<h2 id="dummy_loading" style='color:#1d293e;'></h2>
		
								<h2 id="status" style="color:#1d293e;"></h2>
		
					<input type="submit" class="button outline-success" id="submit_blog" value="Upload">
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

<script src="js/dropzone/index.js"></script>
<script src="assets/js/admin_pages_data_script.js"></script>

<script>
	     
	     function edit_post(data)
        {
           // alert(document.getElementById("prev_info").innerHTML);
            window.frames["richTextField"].document.body.innerHTML = document.getElementById("prev_info").innerHTML;
        }
	     
	 </script>

</body>

</html>