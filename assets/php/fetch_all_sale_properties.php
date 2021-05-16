<?php

require_once("../../includes/initialise.php");
        

        $sql = $database->get_all_category_based_listings_home("Sale");
					        
        foreach($sql as $row) {
            
            $database->get_session_details($row["OwnerId"]);
            

								echo '<div class="col-lg-4">
                    				    
                    					
								<a href="sale_property_view.php?id='.$row['PID'].'">
                            
								<img class="img" src="assets/php/Uploaded/Images/'.json_decode($row['Pimage'])[0].'" alt="" width="100%" height="200px">

								<a href="sale_property_view.php?id='.$row['PID'].'">
        							<div class="feat_property" style="border-radius:0px;z-index:1">
        								<a href="sale_property_view.php?id='.$row['PID'].'"><div class="thumb">
        								
        								    
        									
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
        								<div class="details" >
        									<div class="tc_content">

											<ul class="tag mb0">
        											<li class="list-inline-item"><a href="sale_properties.php" class="btn btn-block btn-thm">For sale</a></li>

													<ul class="icon mb0">
        											<li class="list-inline-item"><h3>£ '.$row['Pprice'].'</h3></li>
        										</ul>
        										</ul>
        										
												<br/>

        										<a href="sale_property_view.php?id='.$row['PID'].'"><h4>'.$row['Pname'].'</h4></a>
        										
        										<ul class="prop_details mb0">
        										    <li class="list-inline-item"><a href="#"><strong>Rooms:</strong> '.$row['Prooms'].'</a></li>
        											<li class="list-inline-item"><a href="#">Beds: '.$row['Pbedrooms'].'</a></li>
        											<li class="list-inline-item"><a href="#">Baths: '.$row['Pbathrooms'].'</a></li>
        										</ul>
												<p></p>
												<p><span class="flaticon-placeholder"></span>'.$row['Paddress'].' '.$row['Pcity'].', '.$row['Pzip'].'</p>
        									</div>
        									<div class="fp_footer">
        										<ul class="fp_meta float-left mb0">
        											<li class="list-inline-item"><a href="sale_property_view.php?id='.$row['PID'].'"><img src="assets/php/'.$database->session_user_pic.'" alt=""></a></li>
        											<li class="list-inline-item"><a href="sale_property_view.php?id='.$row['PID'].'">'.$database->session_username.'</a></li>

																									
        										</ul>
												<ul class="icon mb0 float-right">
        											<li class="list-inline-item"><a href="#" class="btn btn-block btn-thm"><span class="flaticon-heart"></span></a></li>
        										</ul>
        										
        									</div>
        								</div>
        							</div>
        							
        							
        							
        						</div>
        						
        						</a>';		    
										    
			    				    
            
        }
        

?>