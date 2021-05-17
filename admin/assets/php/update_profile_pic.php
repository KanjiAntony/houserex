<?php

require_once("../../includes/initialise.php");

    if($session->is_logged) {

            $database->get_session_details($session->session_id);
            
    	    $update_profile_pic_user_id = $_POST["update_profile_pic_user_id"];

            $upload->set_photo_name($_FILES["update_profile_pic_image"]["name"]);
                  $upload->set_file_type($_FILES["update_profile_pic_image"]["type"]);
                  $upload->set_tmp_loc($_FILES["update_profile_pic_image"]["tmp_name"]);
                  $upload->set_file_error($_FILES["update_profile_pic_image"]["error"]);


            if($upload->validate_profile_image()) {
        
                      $database->set_profile_pic("https://houserex.co.uk/assets/php/".$upload->Object_path);

                        	if($database->update_profile_pic($database->session_user_id)) {
                        		echo "true";
                        	} else {
                        		echo "Failed to update profile picture";
                        	}
                        	
            }

     } else {
        
         echo "Session expired. Login again.";
        
     }

?>