<?php

require_once("../../../includes/initialise.php");
        

        $sql = $database->get_all_listings();
					        
            
            //$database->get_session_details($row["OwnerId"]);
            
            
            
				echo '<table class="table"><thead class="thead-light">
								<tr>
									<th scope="col">Listing Title</th>
									<th scope="col">Published by</th>
									<th scope="col">Date published</th>
									<th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
							</thead><tbody>';

				foreach($sql as $row) {

					$database->get_session_details($row["OwnerId"]);

					if($row['Pcategory'] == "Rent") {
						echo '
								<tr>
									<th scope="row">
										<div class="feat_property list favorite_page style2">
											<div class="thumb">
												<img class="img-whp" src="https://houserex.co.uk/assets/php/Uploaded/Images/'.json_decode($row['Pimage'])[0].'" alt="fp1.jpg">
												<div class="thmb_cntnt">
													<ul class="tag mb0">
														<li class="list-inline-item dn"></li>
														<li class="list-inline-item"><a href="#">For rent</a></li>
													</ul>
												</div>
											</div>
											<div class="details">
												<div class="tc_content">
													<h4>'.$row['Pname'].'</h4>
													<p><span class="flaticon-placeholder"></span> '.$row['Paddress'].', '.$row['Pcity'].', '.$row['Pcounty'].'</p>
													<a class="fp_price text-thm" href="#">£ '.$row['Pprice'].'<small> / '.$row['PpricePeriod'].'</small></a>
													<p>
													<a class="fp_price text-thm" href="#">£ '.$row['PstartPrice'].'<small> deposit</small></a></p>
												</div>
											</div>
										</div>
									</th>
									<td>'.$database->session_username.'</td>
									<td>30 December, 2020</td>';

									if($row['PApproval'] == "0") {
										echo '<td><span class="status_tag badge">Pending</span></td>';
									}else {

										echo '<td><span class="status_tag badge2">Approved</span></td>';

									}
									
									echo '
									<td>
										<ul class="view_edit_delete_list mb0">
											<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><a href="#"><span class="flaticon-edit"></span></a></li>
											<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></li>
										</ul>
									</td>
								</tr>

							';

					} else {

						echo '
								<tr>
									<th scope="row">
										<div class="feat_property list favorite_page style2">
											<div class="thumb">
												<img class="img-whp" src="https://houserex.co.uk/assets/php/Uploaded/Images/'.json_decode($row['Pimage'])[0].'" alt="fp1.jpg">
												<div class="thmb_cntnt">
													<ul class="tag mb0">
														<li class="list-inline-item dn"></li>
														<li class="list-inline-item"><a href="#">For sale</a></li>
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
									<td>'.$database->session_username.'</td>
									<td>30 December, 2020';

									if($row['PApproval'] == "0") {
										echo '<td><span class="status_tag badge">Pending</span></td>';
									}else {

										echo '<td><span class="status_tag badge2">Approved</span></td>';

									}
									
									echo '
									<td>
										<ul class="view_edit_delete_list mb0">
											<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><a href="#"><span class="flaticon-edit"></span></a></li>
											<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></li>
										</ul>
									</td>
								</tr>

							';	


					}

				}

				echo '                                  </tbody>
						</table>';
                				    
    
        
        

?>