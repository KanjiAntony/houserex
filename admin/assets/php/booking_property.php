<?php 
  
    require_once("../../includes/initialise.php");
    
    //$booking_name,$booking_id,$p_owner_id,$booking_phone,$booking_email,$booking_message
    //booking_name,booking_id,p_owner_id,booking_phone,booking_email,booking_message
    //set_booking_name,set_booking_id,set_p_owner_id,set_booking_phone,set_booking_email,set_booking_message
      
      $booking_name = $_POST["booking_name"];
      $p_id = $_POST["p_id"];
      $p_owner_id = $_POST["p_owner_id"];
      $booking_phone = $_POST["booking_phone"];
      $booking_email = $_POST["booking_email"];
      $booking_message = $_POST["booking_message"];
      
      $automation->generate_receipt_id();
                                            
    $booking_id = $automation->receipt_id;
      
      $database->set_PID($p_id);
      $database->set_booking_name($booking_name);
      $database->set_booking_id($booking_id);
      $database->set_p_owner_id($p_owner_id);
      $database->set_booking_phone($booking_phone);
      $database->set_booking_email($booking_email);
      $database->set_booking_message($booking_message);
      
      $database->get_session_details($p_owner_id);
     
      $mailSending->set_from_address("market@shamalandscapes.com");
                     $mailSending->set_from_name("Client");
                     $mailSending->set_to_address($database->session_email);
                     $mailSending->set_to_name("Review request office");
                     $mailSending->set_subject("Review request");
                     $mailSending->set_message("You have a review request from $booking_name. Check dashboard for Review ID: $booking_id");
                     $mailSending->set_variables();

                     
      
      if($database->insert_to_bookings_table()) {
        
            if($mailSending->send_email()) {
                echo "<div class='alert alert-success'>Review request sent. You will be contacted</div>";
            } else {
                echo "<div class='alert alert-success'>Review request sent. You will be contacted soon</div>";
            }


      } else {

        echo "Failed to request review";

      }
    
  
?>