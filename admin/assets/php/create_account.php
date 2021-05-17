<?php

require_once("../../includes/initialise.php");

    $automation->generate_user_id();

    $userId = $automation->random_user_id;
    $username = $_POST["user_reg_name"];
    $email = $_POST["user_reg_email"];
    $user_type = $_POST["user_reg_type"];
    $pass = $_POST["user_reg_password"];
    $conPass = $_POST["user_reg_confirm_password"];

    $database->set_user_id($userId);
    $database->set_username($username);
    $database->set_user_type($user_type);
    $database->set_email($email);
    $database->set_account_approval("0");

    if($pass == $conPass) {
      $database->set_password($pass);
      
      if($database->insert_to_reg_table()) {
          
          $session->login($userId);

            if($session->is_logged) {
            
                echo "true";
                
            } else {
                
                echo "Successfully registered, you can now login";
                
            }


      } else {
        
            echo "Failed to register";
 

      }
      
    } else {

        echo "Passwords do not match";

    } 
    
  

?>