<?php

require_once("../../includes/initialise.php");

    if($session->is_logged) {

            $database->get_session_details($session->session_id);

    	    $create_listing_property_bedrooms = $_POST["create_listing_property_bedrooms"];
    	    $create_listing_property_bathrooms = $_POST["create_listing_property_bathrooms"];
    	    $create_listing_property_garage = $_POST["create_listing_property_garage"];
    	    $create_listing_property_garage_size = $_POST["create_listing_property_garage_size"];
    	    $create_listing_property_year_built = $_POST["create_listing_property_year_built"];
    	    $create_listing_property_amenities = $_POST["create_listing_property_amenities"];
    	    $listing_property_id = $_POST["listing_property_id"];
    	    $create_listing_property_id_code = $_POST["create_listing_property_id_code"];
    	    
    	    $create_listing_property_furnish_type = $_POST["create_listing_property_furnish_type"];
    	    $create_listing_property_windows_type = $_POST["create_listing_property_windows_type"];
    	    $create_listing_property_heating_type = $_POST["create_listing_property_heating_type"];
    	    $create_listing_property_nearest_amenities = $_POST["create_listing_property_nearest_amenities"];
	

        	$database->set_PID($listing_property_id);
        	$database->set_Pcode($create_listing_property_id_code);
        	$database->set_Pbedrooms($create_listing_property_bedrooms);
        	$database->set_Pbathrooms($create_listing_property_bathrooms);
        	$database->set_Pgarage($create_listing_property_garage);
        	$database->set_PgarageSize($create_listing_property_garage_size);
        	$database->set_PyearBuilt($create_listing_property_year_built);
        	$database->set_Pfeatures($create_listing_property_amenities);
        	
        	$database->set_PfurnishType($create_listing_property_furnish_type);
        	$database->set_PwindowsType($create_listing_property_windows_type);
        	$database->set_PheatingType($create_listing_property_heating_type);
        	$database->set_PnearestAmenities($create_listing_property_nearest_amenities);
        	

        	if($database->create_detailed_property_listing()) {
        		echo "Listing detailed information updated";
        	} else {
        		echo "Failed to update listing detailed information";
        	}

     } else {
        
         echo "Session expired. Login again.";
        
     }

?>