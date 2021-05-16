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

				<li><a href="index.php">Home</a>
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
		            
		                if($session->is_logged) {

                          $database->get_session_details($session->session_id); 
                          
                          
		        ?>

				<li><span><?php echo $database->session_username; ?></span>
					<ul>
		                <li><a href="" style="color:#000;">Dashboard</a></li>
		                <li><a href="my_properties.php" style="color:#000;">My Properties</a></li>
		                <li><a href="" style="color:#000;">My Message</a></li>
		                <li><a href="" style="color:#000;">My Review</a></li>
		                <li><a href="" style="color:#000;">My Favorites</a></li>
		                <li><a href="" style="color:#000;">Log out</a></li>
					</ul>
				</li>

				<?php } else { ?>
		            
	                <li ><a href="#" class="btn flaticon-user btn-block btn-lg btn-thm circle" data-toggle="modal" data-target=".bd-example-modal-lg"> Login/Register</a></li>

				<?php } ?>

				<li ><a href="online-valuation.html" class="btn btn-block btn-lg btn-thm circle">Online Valuation</a></li>
					
	            <li><a href="page-add-new-property.php" class="btn btn-block btn-lg btn-thm circle"><span class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li>
				
				<!-- <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-plus"></span> Create Listing</a></li> -->
			</ul>
		</nav>
	</div>