<?php

require_once("../../includes/initialise.php");

    if($session->is_logged) {

            $database->get_session_details($session->session_id);

    	    $create_listing_name = $_POST["create_listing_name"];
    	    $create_listing_desc = $_POST["create_listing_desc"];
    	    $create_listing_type = $_POST["create_listing_type"];
    	    $create_listing_status = $_POST["create_listing_status"];
    	    $create_listing_price = $_POST["create_listing_price"];
    	    $create_listing_area = $_POST["create_listing_area"];
    	    $create_listing_rooms = $_POST["create_listing_rooms"];
    	    $create_listing_id = $_POST["create_listing_id"];
    	    
    	    $create_listing_duration = $_POST["create_listing_duration"];
        	$create_listing_deposit = $_POST["create_listing_deposit"];
        	$create_listing_category = $_POST["create_listing_category"];
        	$create_listing_let_available_date = $_POST["create_listing_let_available_date"];
        	$create_listing_ownership_type = $_POST["create_listing_ownership_type"];
        	$create_listing_sale_type = $_POST["create_listing_sale_type"];
	
    	/*  $Pdetails = $_POST["Pdetails"];
        	$Paddress = $_POST["Paddress"];
        	$Pcountry = $_POST["Pcountry"];
        	$Pcity = $_POST["Pcity"];
        	$Pcode = $_POST["Pcode"];
        	$Ptype = $_POST["Ptype"];
        	$Pstatus = $_POST["Pstatus"];
        	$Pprice = $_POST["Pprice"];
        	$PpricePeriod = $_POST["PpricePeriod"];
        	$PstartPrice = $_POST["PstartPrice"];
        	$Pfeatures = $_POST["Pfeatures"];
        	$Psize = $_POST["Psize"];
        	$PyearBuilt = $_POST["PyearBuilt"];
        	$PnearestTown = $_POST["PnearestTown"];
        	$Pbedrooms = $_POST["Pbedrooms"];
        	$Pbathrooms = $_POST["Pbathrooms"];
        	$PcontactName = $_POST["PcontactName"];
        	$PcontactPhone = $_POST["PcontactPhone"];
        	$PcontactEmail = $_POST["PcontactEmail"];
        	$PcontactInfo = $_POST["PcontactInfo"];
    
    		$upload->set_photo_name($_FILES["Pimage"]["name"]);
            $upload->set_file_type($_FILES["Pimage"]["type"]);
            $upload->set_tmp_loc($_FILES["Pimage"]["tmp_name"]);
            $upload->set_file_error($_FILES["Pimage"]["error"]);*/

        	$database->set_PID($create_listing_id);
        	$database->set_Pname($create_listing_name);
        	$database->set_Prooms($create_listing_rooms);
        	$database->set_Pdetails($create_listing_desc);
        	$database->set_Ptype($create_listing_type);
        	$database->set_Pprice($create_listing_price);
        	$database->set_Psize($create_listing_area);
        	$database->set_Pstatus($create_listing_status);
        	
        	$database->set_Pcategory($create_listing_category);
        	$database->set_PpricePeriod($create_listing_duration);
        	
        	$database->set_PstartPrice($create_listing_deposit);
        	$database->set_PletDate($create_listing_let_available_date);
        	
        	$database->set_PownershipType($create_listing_ownership_type);
        	$database->set_PsaleType($create_listing_sale_type);
        	
        	/*
        	$database->set_Paddress($Paddress);
        	$database->set_Pcountry($Pcountry);
        	$database->set_Pcity($Pcity);
        	$database->set_Pcode($Pcode);
        	$database->set_PpricePeriod($PpricePeriod);
        	$database->set_PstartPrice($PstartPrice);
        	$database->set_Pfeatures($features_items);
        	$database->set_Pimage($gallery_items);
        	$database->set_PyearBuilt($PyearBuilt);
        	$database->set_PnearestTown($PnearestTown);
        	$database->set_Pbedrooms($Pbedrooms);
        	$database->set_Pbathrooms($Pbathrooms);
        	$database->set_PcontactName($PcontactName);
        	$database->set_PcontactPhone($PcontactPhone);
        	$database->set_PcontactEmail($PcontactEmail);
        	$database->set_PcontactInfo($PcontactInfo);*/
        	
        

        	if($database->create_listing($database->session_user_id)) {
        		echo "Listing created";
        	} else {
        		echo "Failed to create listing";
        	}

     } else {
        
         echo "Session expired. Login again.";
        
     }

?>