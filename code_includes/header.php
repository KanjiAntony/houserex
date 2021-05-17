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
		        <a href="index.php" class="navbar_brand float-left dn-smd">
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
	                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" width="45px" height="45px" src="<?php echo $database->session_user_pic; ?>" alt=""> <span class="dn-1199"><?php echo $database->session_username; ?></span></a>
						    <div class="dropdown-menu">
						    	<div class="user_set_header">
						    		<img class="float-left" width="45px" height="45px" src="<?php echo $database->session_user_pic; ?>" alt="">
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
		       
		        <ul id="respMenu" class="ace-responsive-menu text-left" data-menu-style="horizontal">
		            <li style="position:relative;left:-13%;">
		                <a href=""><span class="title">Buy</span></a>
		                
		                <ul>
		                    <li><a href="sale_properties.php">Find property for sale</a></li>
		                    <!--<li><a href="">New Properties for sale</a></li>-->
		                </ul>

		            </li>
		            
		            <!--<li style="position:relative;left:-13%;">
		                <a href="sell.html"><span class="title">Sell</span></a>
		                
		                <ul>
		                    <li><a href="">List My Property For Free</a></li>
		                    <li><a href="">I am a Private Seller</a></li>
		                </ul>

		            </li>-->
		            
		            <li style="position:relative;left:-13%;">
		                <a href=""><span class="title">Rent</span></a>
		                
		                <ul>
		                    <li>
		                        <a href="rent_properties.php">Property for Rent</a>
		                    </li>
		                    <!--<li>
		                        <a href="#">Student Accommodation for Rent</a>
		                    </li>
		                    <li>
		                        <a href="#">Flat Share/Single Room</a>
		                    </li>-->

	                	</ul>

		            </li>
		            
		            
		            
		            <li style="position:relative;left:-13%;">
		                <a href=""><span class="title">Find agents</span></a>
		                
		                <ul>
		                    <li>
		                        <a href="#">Letting Agent</a>
		                    </li>
		                    <li>
		                        <a href="#">Estate Agents</a>
		                    </li>
		                    
		                    <!-- <li>
		                        <a href="#">International Agents</a>
		                    </li>
		                    <li>
		                        <a href="#">For AGENCY / AGENT</a>
		                         Level Three
		                        <ul>
		                            <li><a href="">Agencies Directory </a></li>
    	                            <li><a href="">Agents Directory</a></li>
    	                            <li><a href="">Become an Agent / Agency </a></li>
    	                            <li><a href="">List / Advertise Property For Free</a></li>
    	                            <li><a href="">Partnership</a></li>
		                        </ul>
		                    </li> -->

	                	</ul>

		            </li>
		            
		            <li style="position:relative;left:-13%;">
		                <a href=""><span class="title">House Rex Support.</span></a>
		                
		                <ul>
		                    <li>
		                        <a href="#">Buying support</a>
		                    </li>
		                    <li>
		                        <a href="#">Selling support</a>
		                    </li>

	                	</ul>

		            </li>
		            
		            <!--<li style="position:relative;left:-13%;">
		                <a href="commercial.html"><span class="title">Commercial</span></a>
		                
		                <ul>
		                    <li><a href="">Commercial property for rent</a></li>
		                    <li><a href="">Commercial property for sale </a></li>
		                    <li><a href="">List/ Advertise for Free </a></li>
		                </ul>

		            </li>-->
		            
		            <!--<li style="position:relative;left:-13%;">
		                <a href="get_inspired.html"><span class="title">Get inspired</span></a>
		                
		                <ul>
		                    <li><a href="">News </a></li>
		                    <li><a href="">Property guides</a></li>
		                    <li><a href="">UK House Prices Index</a></li>
		                    <li><a href="">House Rex Free buying support</a></li>
		                    <li><a href="">Mortgage Advice </a></li>
		                    <li><a href="">Conveyancing quotes </a></li>
		                    <li><a href="">Moving Removal </a></li>
		                </ul>

		            </li>-->

		        </ul>
		    </nav>
		</div>
	</header>