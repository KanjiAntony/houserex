<?php

class Automate {

	public $randomChar="A",$randomTicketChar="P",$randomNumber,$random_pass,$timestamp,$random_user_id,$random_admin_code,$photo_id,$ticket_id,$receipt_id,$pay_id,$rs_id,$drk_id,$floorplan_id;
	public $commChar = "REX";
	public $admin_code_char = "REX-INRSV";
	public $passChar = "PASS";
	public $payChar = "REXPAY";
	public $ticketChar = "BIMG";
	public $receiptChar = "REX";
	public $floorplanChar = "FPLAN";

	public function generate_random_char()
	{
		$length = 3;

		$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

		$characterLength = strlen($characters);

		for($i=0; $i<$length; $i++) {

			$this->randomChar .=$characters[rand(0,$characterLength)]; 

		}

		return $this->randomChar;

	}

	public function generate_random_ticket_char()
	{
		$length = 4;

		$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

		$characterLength = strlen($characters);

		for($i=0; $i<$length; $i++) {

			$this->randomTicketChar.=$characters[rand(0,$characterLength)]; 

		}

		return $this->randomTicketChar;

	}

	public function generate_random_number()
	{

		return $this->randomNumber = rand(1000,1000000);

	}

	public function generate_current_timestamp()
	{
		return $this->timestamp = date("dms",time());
	}

	public function generate_user_id()
	{
		$this->random_user_id = $this->generate_random_char().$this->generate_random_number().$this->commChar;
	}
	
	public function generate_admin_code()
	{
		$this->random_admin_code = $this->generate_random_char().$this->generate_random_number().$this->admin_code_char;
	}
	
	public function generate_new_pass()
	{
		$this->random_pass = $this->generate_random_char().$this->generate_random_number().$this->passChar;
	}

	public function generate_photo_id()
	{
		$this->photo_id = $this->generate_random_number().$this->generate_random_char();
	}

	public function generate_cart_id()
	{
		$this->cart_id = $this->generate_random_number().$this->generate_random_char();
	}
	
	public function generate_floorplan_id()
	{
		$this->floorplan_id = $this->floorplanChar.$this->generate_random_number().$this->generate_random_char();
	}

	public function generate_ticked_id()
	{
		$this->ticket_id = $this->ticketChar.$this->generate_random_number().$this->generate_random_ticket_char();
	}
	
	public function generate_random_zip_file_name()
	{
		return $this->ticketChar.$this->generate_random_number().$this->generate_random_ticket_char();
	}
	
	public function generate_receipt_id()
	{
		$this->receipt_id = $this->receiptChar.$this->generate_random_number().$this->generate_random_ticket_char();
	}
	
	public function generate_reserve_id()
	{
		$this->rs_id = $this->generate_random_number().$this->generate_random_char();
	}
	
	public function generate_drink_id()
	{
		$this->drk_id = $this->generate_random_number();
	}
	
	public function generate_pay_id()
	{
		$this->pay_id = $this->payChar.$this->generate_random_number();
	}

}

$automation = new Automate();


?>