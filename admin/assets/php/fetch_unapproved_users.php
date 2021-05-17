<?php

require_once("../../../includes/initialise.php");

//if ($_POST['action'] == "fetch") {
    
    //$status = $_POST['status'];
    
    $sql = $database->get_all_unapproved_users();
    
    echo '<table class="table"><thead class="thead-light">
										    	<tr>
													<th scope="col">Profile</th>
										    		<th scope="col">Reg Date</th>
										    		<th scope="col">Reg Time</th>
										    		<th scope="col">Approve</th>
										    		<th scope="col">Deny</th>
										    	</tr>
											</thead><tbody>';
    
    foreach($sql as $row) {
        
        echo ' 
	
										    	<tr>
										    		<th scope="row">
														<div class="feat_property list favorite_page style2">
															<div class="thumb">
																<img class="img-whp" src="'.$row['UserPic'].'" alt="">
																<div class="thmb_cntnt">
																	<ul class="tag mb0">
																		<li class="list-inline-item dn"></li>
																		<li class="list-inline-item"><a href="#">'.$row['UserType'].'</a></li>
																	</ul>
																</div>
															</div>
															<div class="details">
																<div class="tc_content">
																	<h4>'.$row['UserName'].'</h4>
																	<h4>'.$row['UserEmail'].'</h4>
																	<p>'.$row['UserMobile'].'</p>
																	<a class="fp_price text-thm" href="#">Reg : '.$row['RegType'].'</small></a>
																</div>
															</div>
														</div>
										    		</th>
													<td>'.$row['Date'].'</td>
										    		<td>'.$row['Time'].'</td>
										    		<td><a href="#"><span class="status_tag badge2">Approve</span></a></td>
										    		<td>
										    			<a href="#" class="btn btn-danger">
										    				<span class="flaticon-garbage "></span>
										    			</a>
										    		</td>
										    	</tr>

											';
        
    }
    
    echo '                                  </tbody>
										</table>';
    
//}

?>