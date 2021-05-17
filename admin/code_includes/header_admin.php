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
		        <a href="../index.php" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="images/logo.png" alt="logo.png">
		            <img class="logo2 img-fluid" src="images/logo2.png" alt="logo2.png">
		            <span style="color:#001a75">house rex</span>
		        </a>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul class="ace-responsive-menu text-right" data-menu-style="horizontal">
		            
		            <?php
		            
		                if($session->is_admin_logged) {

                          $database->get_admin_session_details($session->admin_session_id); 
                          
                          
		            ?>
		            
		            <li class="user_setting">
						<div class="dropdown">
	                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" width="45px" height="45px" src="<?php echo $database->session_user_pic; ?>" alt=""> <span class="dn-1199"><?php echo $database->session_username; ?></span></a>
						    <div class="dropdown-menu">
						    	<div class="user_set_header">
						    		<img class="float-left" width="45px" height="45px" src="<?php echo $database->session_user_pic; ?>" alt="">
							    	<p><?php echo $database->session_username; ?> <br><span class="address"><?php echo $database->session_email; ?></span></p>
						    	</div>
						    	<div class="user_setting_content">
									<a class="dropdown-item active" href="index.php" style="color:#000;">Dashboard</a>
									<a class="dropdown-item" href="my_properties.php" style="color:#000;">My Properties</a>
									<a class="dropdown-item" href="" style="color:#000;">My Message</a>
									<a class="dropdown-item" href="" style="color:#000;">My Review</a>
									<a class="dropdown-item" href="" style="color:#000;">My Favorites</a>
									<a class="dropdown-item" href="logout.php" style="color:#000;">Log out</a>
						    	</div>
						    </div>
						</div>
			        </li>
			        
			        <?php } ?>
		            
			        
			        <li class="list-inline-item add_listing"><a href="online-valuation.html">Online Valuation</a></li>
					
	                <li class="list-inline-item add_listing"><a href="pending_properties.php"><span class="flaticon-plus"></span><span class="dn-lg"> Approve Listings</span></a></li>
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

<li><a href="../index.php">Home</a>
</li>

<li><span>Buy</span>
	<ul>
		<li><a href="sale_properties.php" style="color:#000;">Find property for sale</a></li>
	</ul>
		</li>

		<li><span>Rent</span>
			<ul>
				<li><a href="rent_properties.php" style="color:#000;">Find property for rent</a></li>
			</ul>
		</li>

		<li><span>Find agents</span>
			<ul>
				<li><a href="" style="color:#000;">Letting Agent</a></li>
				<li><a href="" style="color:#000;">Estate Agents</a></li>
			</ul>
		</li>

		<li><span>House Rex Support.</span>
			<ul>
				<li><a href="" style="color:#000;">Buying support</a></li>
				<li><a href="" style="color:#000;">Selling support</a></li>
			</ul>
		</li>

		<!-- <li><a href="page-login.html"><span class="flaticon-user"></span> Login</a></li>
		<li><a href="page-register.html"><span class="flaticon-edit"></span> Register</a></li> -->


		<?php
			
				if($session->is_admin_logged) {

					$database->get_admin_session_details($session->admin_session_id);
				
				
		?>

		<li><span><?php echo $database->session_username; ?></span>
			<ul>
				<li><a href="" style="color:#000;">Dashboard</a></li>
				<li><a href="my_properties.php" style="color:#000;">My Properties</a></li>
				<li><a href="" style="color:#000;">My Message</a></li>
				<li><a href="" style="color:#000;">My Review</a></li>
				<li><a href="" style="color:#000;">My Favorites</a></li>
				<li><a href="logout.php" style="color:#000;">Log out</a></li>
			</ul>
		</li>

		<?php } ?>			

		<li ><a href="online-valuation.html" class="btn btn-block btn-lg btn-thm circle">Online Valuation</a></li>
			
		<li><a href="pending_properties.php" class="btn btn-block btn-lg btn-thm circle"><span class="flaticon-plus"></span><span class="dn-lg"> Approve Listings</span></a></li>

		<!-- <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-plus"></span> Create Listing</a></li> -->
		</ul>
		</nav>
	</div>