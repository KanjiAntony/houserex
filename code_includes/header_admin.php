    <!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky main-menu">
		<div class="container-fluid p0">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="images/logo.png" alt="logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="#" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="images/logo.png" alt="logo.png">
		            <img class="logo2 img-fluid" src="images/logo2.png" alt="logo2.png">
		            <span style="color:#001a75">house rex</span>
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul class="ace-responsive-menu text-right" data-menu-style="horizontal">
		            
		            <?php
		            
		                if($session->is_logged) {

                          $database->get_session_details($session->session_id); 
                          
                          
		            ?>
		            
		            <li class="user_setting">
						<div class="dropdown">
	                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" src="../assets/php/<?php echo $database->session_user_pic; ?>" alt=""> <span class="dn-1199"><?php echo $database->session_username; ?></span></a>
						    <div class="dropdown-menu">
						    	<div class="user_set_header">
						    		<img class="float-left" src="../assets/php/<?php echo $database->session_user_pic; ?>" alt="">
							    	<p><?php echo $database->session_username; ?> <br><span class="address"><?php echo $database->session_email; ?></span></p>
						    	</div>
						    	<div class="user_setting_content">
									<a class="dropdown-item active" href="" style="color:#000;">Dashboard</a>
									<a class="dropdown-item" href="my_properties.php" style="color:#000;">My Properties</a>
									<a class="dropdown-item" href="" style="color:#000;">My Message</a>
									<a class="dropdown-item" href="" style="color:#000;">My Review</a>
									<a class="dropdown-item" href="" style="color:#000;">My Favorites</a>
									<a class="dropdown-item" href="logout.php" style="color:#000;">Log out</a>
						    	</div>
						    </div>
						</div>
			        </li>
			        
			        <?php } else { ?>
		            
	                <li class="list-inline-item add_listing"><a href="#" class="btn flaticon-user" data-toggle="modal" data-target=".bd-example-modal-lg"> Login/Register</a></li>

					<?php } ?>
			        
			        <li class="list-inline-item add_listing"><a href="online-valuation.html">Online Valuation</a></li>
					
	                <li class="list-inline-item add_listing"><a href="page-add-new-property.php"><span class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li>
		        </ul>
		       
		        
		    </nav>
		</div>
	</header>

	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="main_logo_home2 text-center">
		            <img class="nav_logo_img img-fluid mt20" src="images/logo2.png" alt="logo2.png">
		            <span class="mt20">House Rex</span>
				</div>
				<ul class="menu_bar_home2">
	                <li class="list-inline-item list_s"><a href=""></a>
									

					</li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
				<li><a href="index.html">Home</a>
				</li>
				<li><a href="about.html">About Us</a>
				</li>
				<li><a href="">Pricing</a>
				</li>
				<li><a href="">Contact Us</a>
				</li>
				
				<li><span>Brian Wanene</span>
					<ul>
		                <li><a href="page-dashboard.html" style="color:#000;">Dashboard</a></li>
		                <li><a href="page-my-properties.html" style="color:#000;">My Properties</a></li>
		                <li><a href="page-message.html" style="color:#000;">My Message</a></li>
		                <li><a href="page-my-review.html" style="color:#000;">My Review</a></li>
		                <li><a href="page-my-favorites.html" style="color:#000;">My Favorites</a></li>
		                <li><a href="" style="color:#000;">Log out</a></li>
					</ul>
				</li>
				
				<li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-plus"></span> Create Listing</a></li>
			</ul>
		</nav>
	</div>