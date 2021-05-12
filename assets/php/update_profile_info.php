<?php

require_once("../../includes/initialise.php");

if($session->is_logged) {

            $database->get_session_details($session->session_id);

    $update_profile_info_user_id = $_POST["update_profile_info_user_id"];
    $update_profile_info_name = $_POST["update_profile_info_name"];
    $update_profile_info_email = $_POST["update_profile_info_email"];
    $update_profile_info_usertype = $_POST["update_profile_info_usertype"];
    $update_profile_info_phone = $_POST["update_profile_info_phone"];
    $update_profile_info_desc = $_POST["update_profile_info_desc"];

    $database->set_user_id($update_profile_info_user_id);
    $database->set_username($update_profile_info_name);
    $database->set_user_type($update_profile_info_usertype);
    $database->set_email($update_profile_info_email);
    $database->set_phone_no($update_profile_info_phone);
    $database->set_user_desc($update_profile_info_desc);
      
      if($database->update_profile_information()) {
          

                echo "Profile information updated successfully";
                


      } else {
        
            echo "Failed to update profile information";
 

      }
 
} else {
        
         echo "Session expired. Login again.";
        }      

  

?>