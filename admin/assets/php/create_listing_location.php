<?php

require_once("../../includes/initialise.php");

    if($session->is_logged) {

            $database->get_session_details($session->session_id);

    	    $create_listing_location_address = $_POST["create_listing_location_address"];
    	    $create_listing_location_county = $_POST["create_listing_location_county"];
    	    $create_listing_location_city = $_POST["create_listing_location_city"];
    	    $create_listing_location_zip = $_POST["create_listing_location_zip"];
    	    $create_listing_location_country = $_POST["create_listing_location_country"];
    	    $create_listing_location_latitude = $_POST["create_listing_location_latitude"];
    	    $create_listing_location_longitude = $_POST["create_listing_location_longitude"];
    	    $listing_location_property_id = $_POST["listing_location_property_id"];
	
        	$database->set_PID($listing_location_property_id);
        	$database->set_Paddress($create_listing_location_address);
        	$database->set_Pcountry($create_listing_location_country);
        	$database->set_Pcity($create_listing_location_city);
        	$database->set_Pzip($create_listing_location_zip);
        	
        	$database->set_Pcounty($create_listing_location_county);
        	$database->set_Platitude($create_listing_location_latitude);
        	$database->set_Plongitude($create_listing_location_longitude);


        	if($database->create_listing_location()) {
        		echo "Location information updated";
        	} else {
        		echo "Failed to update location information";
        	}

     } else {
        
         echo "Session expired. Login again.";
        
     }

?>