<?php

require_once("../../includes/initialise.php");

    if($session->is_logged) {

            $database->get_session_details($session->session_id);
            
            $automation->generate_floorplan_id();

    	    $create_listing_floorplan_bedrooms = $_POST["create_listing_floorplan_bedrooms"];
    	    $create_listing_floorplan_desc = $_POST["create_listing_floorplan_desc"];
    	    $create_listing_floorplan_bathrooms = $_POST["create_listing_floorplan_bathrooms"];
    	    $create_listing_floorplan_size = $_POST["create_listing_floorplan_size"];
    	    $create_listing_floorplan_price = $_POST["create_listing_floorplan_price"];
    	    $floorplan_listing_id = $_POST["floorplan_listing_id"];

            $upload->set_photo_name($_FILES["create_listing_floorplan_image"]["name"]);
                  $upload->set_file_type($_FILES["create_listing_floorplan_image"]["type"]);
                  $upload->set_tmp_loc($_FILES["create_listing_floorplan_image"]["tmp_name"]);
                  $upload->set_file_error($_FILES["create_listing_floorplan_image"]["error"]);

        	$database->set_PID($floorplan_listing_id);
        	$database->set_floorplan_id($automation->floorplan_id);
        	$database->set_floorplan_bedrooms($create_listing_floorplan_bedrooms);
        	$database->set_floorplan_bathrooms($create_listing_floorplan_bathrooms);
        	$database->set_floorplan_size($create_listing_floorplan_size);
        	$database->set_floorplan_price($create_listing_floorplan_price);
        	$database->set_floorplan_desc($create_listing_floorplan_desc);


            if($upload->validate_image()) {
        
                      $database->set_floorplan_image($upload->Object_path);

                        	if($database->create_listing_floorplan()) {
                        		echo "true";
                        	} else {
                        		echo "Failed to upload floorplan";
                        	}
                        	
            }

     } else {
        
         echo "Session expired. Login again.";
        
     }

?>