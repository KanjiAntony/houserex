<?php

require_once("../includes/initialise.php");

    if($session->is_admin_logged) {

      $database->get_admin_session_details($session->admin_session_id);
      
      
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
						<div class="col-lg-4 col-xl-4 mb10">
							<div class="breadcrumb_content style2 mb10">
								<h2 class="breadcrumb_title">Approved properties</h2>

								<input type="hidden" id="user_id" value="<?php echo $database->session_user_id; ?>">
							</div>
						</div>
						
						<div class="col-lg-8 col-xl-8">
							<div class="candidate_revew_select style2 text-right mb30-991">
								<ul class="mb0">
									<li class="list-inline-item">
										<div class="candidate_revew_search_box course fn-520">
											<form class="form-inline my-2">
										    	<input class="form-control mr-sm-2" type="search" placeholder="Search properties" aria-label="Search">
										    	<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
										    </form>
										</div>
									</li>
									<li class="list-inline-item">
										<select class="selectpicker show-tick">
											<option>All</option>
											<option>Pending</option>
											<option>Approved</option>
										</select>
									</li>
								</ul>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="my_dashboard_review mb40">
								<div class="property_table">
									<div class="table-responsive mt0" id="user_properties_table">
										
									</div>
									
									<div class="col-lg-12 col-xl-12">
										<h2 id="dummy_loading_text"></h2>
                                        <h2 id="dummy_loading" style='color:#1d293e;'></h2>
                    
                                        <h2 id="dummy_status" style="color:#1d293e;"></h2>
									</div>
									
									<div class="mbp_pagination">
										<ul class="page_navigation">
										    <li class="page-item disabled">
										    	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
										    </li>
										    <li class="page-item"><a class="page-link" href="#">1</a></li>
										    <li class="page-item active" aria-current="page">
										    	<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
										    </li>
										    <li class="page-item"><a class="page-link" href="#">3</a></li>
										    <li class="page-item"><a class="page-link" href="#">...</a></li>
										    <li class="page-item"><a class="page-link" href="#">29</a></li>
										    <li class="page-item">
										    	<a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
										    </li>
										</ul>
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

<script src="js/dropzone/index.js"></script>

<script>

  $(document).ready(function(){
    
    fetchAllProperties();

    function fetchAllProperties() {
        
        document.getElementById("dummy_loading").innerHTML = "Showing all approved listings, please wait";
		
		document.getElementById("dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		var action = "fetch";
        var status = $("#user_id").attr("value");
        
        var picQueryString = "action=" + action + "&user_id=" + status;
		var picExtensionUrl = "assets/php/fetch_approved_listings.php";


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
		    $("#user_properties_table").html(ev.target.responseText);
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("dummy_status").innerHTML = "Showing all approved listings failed";
		    document.getElementById("dummy_loading").innerHTML = "Failed";
		    document.getElementById("dummy_loading_text").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("dummy_status").innerHTML = "Showing all approved listings aborted";
             document.getElementById("dummy_loading").innerHTML = "Cancelled";
             document.getElementById("dummy_loading_text").style.display = "none";
        });

		//open connection
		picRequest.open("POST",picExtensionUrl,true);

        picRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		picRequest.send(picQueryString);
        
    }
    
  });
  
  function _(el) {
            return document.getElementById(el);
    }

</script>

</body>

</html>