<?php

require_once("../../../includes/initialise.php");

//if ($_POST['action'] == "fetch") {
    
    
    $sql = $database->get_all_unapproved_listings();
    
    echo '<table class="table"><thead class="thead-light">
										    	<tr>
										    		<th scope="col">Listing Title</th>
										    		<th scope="col">Date published</th>
										    		<th scope="col">Status</th>
										    		<th scope="col">Action</th>
										    	</tr>
											</thead><tbody>';
    
    foreach($sql as $row) {
        
        echo ' 
	
										    	<tr>
										    		<th scope="row">
														<div class="feat_property list favorite_page style2">
															<div class="thumb">
																<img class="img-whp" src="https://houserex.co.uk/assets/php/Uploaded/Images/'.json_decode($row['Pimage'])[0].'" alt="fp1.jpg">
																<div class="thmb_cntnt">
																	<ul class="tag mb0">
																		<li class="list-inline-item dn"></li>
																		<li class="list-inline-item"><a href="#">For Rent / sale</a></li>
																	</ul>
																</div>
															</div>
															<div class="details">
																<div class="tc_content">
																	<h4>'.$row['Pname'].'</h4>
																	<p><span class="flaticon-placeholder"></span> '.$row['Paddress'].', '.$row['Pcity'].', '.$row['Pcounty'].'</p>
																	<a class="fp_price text-thm" href="#">£ '.$row['Pprice'].'</small></a>
																</div>
															</div>
														</div>
										    		</th>
										    		<td>30 December, 2020</td>
										    		<td><span class="status_tag badge">Pending</span></td>
										    		<td>
										    			<ul class="view_edit_delete_list mb0">
										    				<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><a href="#"><span class="flaticon-edit"></span></a></li>
										    				<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></li>
										    			</ul>
										    		</td>
										    	</tr>

											';
        
    }
    
    echo '                                  </tbody>
										</table>';
    
//}

?>