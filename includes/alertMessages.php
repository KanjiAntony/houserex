<?php

require_once("initialise.php");

class alerts {

	public $mess;

	public function message($mess,$status){
			$this->mess = $mess;

		if($status == "Fail") {

			echo '


				<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  '.$this->mess.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>

				</div>

';

		} else if($status == "Success") {
			echo '



				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  '.$this->mess.'
				   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>

				</div>
';
		}	

	}
	
	public function send_firebase_notification($username)
	{
	    
        $url1 		= 'https://fcm.googleapis.com/fcm/send';


        $f = array("to"=>"/topics/mojito",
        				"data" => array(
				            
				            "content" => $username." just bought drinks from your store!",
      						"title" => "Drink Bought"
				            
				            )

        				);

        $send = json_encode($f);
            
        $ch1 = curl_init();

        // Set the url, number of POST vars, POST data
		curl_setopt($ch1, CURLOPT_URL, $url1);

        // Set the url, number of POST vars, POST data
		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1,CURLOPT_POSTFIELDS, $send);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);

        // Disabling SSL Certificate support temporarily
		curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
        
        $headers1 = array();
        $headers1[] = "Content-Type: application/json";
        $headers1[] = "Authorization: key=AAAAEmCYuiM:APA91bFFe4aVeohWtCSKY4M-GU0u2Wzckfdtvv5kthsrfTtgZROG73rQSwgUlgsIrc83cpSlNuG4pkCHLgSbRuKIS__Pva1Wiguh8-AuP-5cOritQsXa5fqgkVaQDp9GgtLXDGcMaK5K";
        curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers1);

        // Execute post
        $result1 = curl_exec($ch1);

	}


}

	$alert = new alerts();

?>
