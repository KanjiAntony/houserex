<?php

require_once("../../includes/initialise.php");

    $automation->generate_user_id();

    $userId = $automation->random_user_id;
    $username = $_POST["name"];
    $email = $_POST["email"];
    $user_type = "User";
    
    $reg_type = $_POST["reg_type"];

    if($reg_type == "Facebook") {
        $profile_pic = "http://graph.facebook.com/".$_POST["profile_pic"]."/picture?type=normal";
    } else {
        $profile_pic = $_POST["profile_pic"];
    }

    $database->set_user_id($userId);
    $database->set_username($username);
    $database->set_user_type($user_type);
    $database->set_email($email);
    $database->set_account_approval("0");
    $database->set_profile_pic($profile_pic);

      
      if($database->insert_to_social_media_reg_table($reg_type)) {

        $database->get_email_session_details($email);
          
          $session->login($database->session_user_id);

            if($session->is_logged) {
            
                echo "true";
                
            } else {
                
                echo "Successfully registered, you can now login";
                
            }


      } else {
        
            echo "Failed to register";
 

      } 

      //echo "u= ".$username.", e=".$email.", p=".$profile_pic.", type=".$reg_type;

      //echo "<img src='".$profile_pic."'>";
      

?>