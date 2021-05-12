<?php

require_once("../../includes/initialise.php");
        

        $sql = $database->get_all_listings_home();
					        
        foreach($sql as $row) {
            
            $database->get_session_details($row["OwnerId"]);
            
            if($row['Pcategory'] == "Rent") {
            
                    echo '<div class="col-lg-4">
                    				    
                    					<div class="best_property_slider style2" >
                            <div class="item">
        							<div class="feat_property">
        								<div class="thumb">
        									<img class="img-whp" src="assets/php/Uploaded/Images/'.json_decode($row['Pimage'])[0].'" alt="">
        									<div class="thmb_cntnt">
        										<ul class="tag mb0">
        											<li class="list-inline-item"><a href="#">For rent</a></li>
        										</ul>
        										<ul class="icon mb0">
        											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
        											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
        										</ul>';
        										
        										
        										
        										    echo '<a class="fp_price" href="#">£ '.$row['Pprice'].'<small> / '.$row['PpricePeriod'].'</small></a>';
        										    
        										
        									echo '</div>
        								</div>
        								<div class="details">
        									<div class="tc_content">
        										<p class="text-thm">'.$row['Ptype'].'</p>
        										<a href="rent_property_view.php?id='.$row['PID'].'"><h4>'.$row['Pname'].'</h4></a>
        										<p><span class="flaticon-placeholder"></span>'.$row['Paddress'].' '.$row['Pcity'].', '.$row['Pcounty'].' '.$row['Pzip'].'</p>
        										<ul class="prop_details mb0">
        										    <li class="list-inline-item"><a href="#">Rooms: '.$row['Prooms'].'</a></li>
        											<li class="list-inline-item"><a href="#">Beds: '.$row['Pbedrooms'].'</a></li>
        											<li class="list-inline-item"><a href="#">Baths: '.$row['Pbathrooms'].'</a></li>
        											<li class="list-inline-item"><a href="#">Sq Ft: '.$row['Psize'].'</a></li>
        										</ul>
        									</div>
        									<div class="fp_footer">
        										<ul class="fp_meta float-left mb0">
        											<li class="list-inline-item"><a href="rent_property_view.php?id='.$row['PID'].'"><img src="assets/php/'.$database->session_user_pic.'" alt=""></a></li>
        											<li class="list-inline-item"><a href="rent_property_view.php?id='.$row['PID'].'">'.$database->session_username.'</a></li>
        										</ul>
        										<!--<div class="fp_pdate float-right">2 years ago</div>-->
        									</div>
        								</div>
        							</div>
        						</div>
        						
        						</div>
                				    </div>';
                				    
            } else {
										    
								echo '<a href="sale_property_view.php?id='.$row['PID'].'"><div class="col-lg-4">
                    				    
                    					<div class="best_property_slider style4" >
                            <div class="item">
                            
                            
        							<div class="feat_property">
        								<a href="sale_property_view.php?id='.$row['PID'].'"><div class="thumb">
        								
        								    
        									<img class="img" src="assets/php/Uploaded/Images/'.json_decode($row['Pimage'])[0].'" alt="" onClick="dis("woza");">
        									<div class="thmb_cntnt"><a href="sale_property_view.php?id='.$row['PID'].'">
        										<ul class="tag mb0">
        											<li class="list-inline-item"><a href="#">For sale</a></li>
        										</ul>
        										<ul class="icon mb0">
        											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
        											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
        										</ul>';
        										
        										
        										
        										   echo '<a class="fp_price" href="#">£ '.$row['Pprice'].'</a>';
        										    
        										
        									echo '</a></div>
        								</div></a>
        								<div class="details">
        									<div class="tc_content">
        										<p class="text-thm">'.$row['Ptype'].'</p>
        										<a href="sale_property_view.php?id='.$row['PID'].'"><h4>'.$row['Pname'].'</h4></a>
        										<p><span class="flaticon-placeholder"></span>'.$row['Paddress'].' '.$row['Pcity'].', '.$row['Pcounty'].' '.$row['Pzip'].'</p>
        										<ul class="prop_details mb0">
        										    <li class="list-inline-item"><a href="#">Rooms: '.$row['Prooms'].'</a></li>
        											<li class="list-inline-item"><a href="#">Beds: '.$row['Pbedrooms'].'</a></li>
        											<li class="list-inline-item"><a href="#">Baths: '.$row['Pbathrooms'].'</a></li>
        											<li class="list-inline-item"><a href="#">Sq Ft: '.$row['Psize'].'</a></li>
        										</ul>
        									</div>
        									<div class="fp_footer">
        										<ul class="fp_meta float-left mb0">
        											<li class="list-inline-item"><a href="sale_property_view.php?id='.$row['PID'].'"><img src="assets/php/'.$database->session_user_pic.'" alt=""></a></li>
        											<li class="list-inline-item"><a href="sale_property_view.php?id='.$row['PID'].'">'.$database->session_username.'</a></li>
        										</ul>
        										<!--<div class="fp_pdate float-right">2 years ago</div>-->
        									</div>
        								</div>
        							</div>
        							
        							
        							
        						</div>
        						
        						</div>
                				    </div></a>';		    
										    
			}    				    
            
        }
        

?>