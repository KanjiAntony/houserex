<?php 
  
    require_once("../../includes/initialise.php");
    
      
      $email = $_POST["user_login_email"];
      $pass = $_POST["user_login_password"];
      $database->set_email($email);
      $database->set_raw_password($pass);
      
      if($database->insert_to_login_table()) {
        
        $session->login($database->fetched_user_id);

        if($session->is_logged) {


            echo "true";


        } else {

           echo "Failed to login. Error 301";

        }
        
      } else {

        echo "Failed to Login";

      }
    
  
?>