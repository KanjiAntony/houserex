<?php

require_once("initialise.php");

class database extends alerts{
		public $dbase;
		public $user_email,
				$admin_email,
				$admin_code,
				$user_id,
				$username,
				$phone_no,
				$usertype,
				$profile_pic,$user_mobile,$user_desc,
				$cover_pic,
				$front_id_pic,
				$back_id_pic,
				$IDStatus,
				$business_licence_pic,
				$business_licence_status,
				$settlement_account,
				$settlement_account_status,
				$open_days,
				$open_time,
				$close_time,
				$happy_hour_start,
				$happy_hour_stop,
				$address,
				$city,
				$country,
				$password,$raw_password,$old_password,$pass,$approval_status,
				$fetched_email,
				$fetched_user_id,
				$fetched_user_type,
				$regDate,
				$regTime;
		private $regEventsTable = "baridareg";
		private $deliveryFeeTable = "barida_delivery_fees";
		private $regTable = "user_reg";
		private $BOregSPTable = "ibooq_bo_sp";
		private $regAdminTable = "barida_reg_admin";
		private $userRegTable = "baridauser";
		private $loginTable = "user_login";
		private $reserveTable = "baridareserve";
		private $drinksTable = "baridadrinks";
		private $cartTable = "baridacart";
		private $bookingTable = "bookings";
		private $pagesDataTable = "pages_data";
		private $baridaMpesaTable = "baridampesa";
		private $paymentTable = "baridareservepayment";
		private $floorplanTable = "floorplan";
		private $listingTable = "listing";
		public $stmt;
		public $session_email,$session_user_id,$session_username,$session_user_type,$session_user_phone,$session_user_facebook,$session_user_twitter,$session_user_linkedin,$session_user_instagram,$session_user_description,$session_user_pic,$session_regDate,$session_regTime;
		
		public $floorplan_id,$floorplan_bedrooms,$floorplan_bathrooms,$floorplan_size,$floorplan_image,$floorplan_price,$floorplan_desc;
				
		public $now_date_only,$now_time_only;

		public $booking_name,$booking_id,$p_owner_id,$booking_phone,$booking_email,$booking_message;
		
		public $fetched_search_array,$fetched_page_data;
		
		public $fetched_Pzip,$fetched_PfurnishType,$fetched_PwindowsType,$fetched_PheatingType,$fetched_PnearestAmenities,$fetched_P_epcImage,$fetched_PVideo,$fetched_PAttachment,$fetched_Pcategory,$fetched_PletDate,$fetched_PownershipType,$fetched_PsaleType;
		
		public $PID,$Pname,$Paddress,$Pdetails,$Pcountry,$Pcity,$Pcode,$Ptype,$Pstatus,$Pprice,$Pgarage,$PgarageSize,$Prooms,$Pzip,$PfurnishType,$PwindowsType,$PheatingType,$PnearestAmenities,
			$PpricePeriod,$PstartPrice,$Pfeatures,$Psize,$PyearBuilt,$PnearestTown,$Pbedrooms,$Pbathrooms,$Pimage,$P_epcImage,$PVideo,$PAttachment,$PcontactName,$PcontactPhone,$PcontactEmail,$PcontactInfo,$Pcounty,$Platitude,$Plongitude,$Pcategory,$PletDate,$PownershipType,$PsaleType;
	    public $fetched_PID,$fetched_Pname,$fetched_Paddress,$fetched_Pdetails,$fetched_Pcountry,$fetched_Pcity,$fetched_Pcode,$fetched_Ptype,$fetched_Pstatus,$fetched_Pprice,
			$fetched_PpricePeriod,$fetched_PstartPrice,$fetched_Pfeatures,$fetched_Psize,$fetched_PyearBuilt,$fetched_PnearestTown,$fetched_Pbedrooms,$fetched_Pbathrooms,$fetched_Pimage,$fetched_PcontactName,$fetched_PcontactPhone,$fetched_PcontactEmail,$fetched_PcontactInfo;		
	    public $fetched_tenant_name,$fetched_tenant_phone,$fetched_total_property_revenue,$fetched_total_property_balance,$fetched_total_tenant_revenue,$fetched_total_tenant_balance;
	
	    public $fetched_Pcounty,$fetched_Platitude,$fetched_Plongitude,$fetched_Prooms,$fetched_Pgarage,$fetched_PgarageSize,$fetched_ownerId;

		public $post_id,$post_title,$post_data,$post_photo_path;
		public $regUserId,$regUsername,$regUserEmail,$regUserPhone,$full_name;
		public $fetchedPayId,$fetchedPayUserId,$fetchedPayAmount,$fetchedPayMethod,$fetchedPayStat,$fetchedPayDate,$fetchedPayTime;
		
		public $prod_id_in_array,$sizecolor_in_array;

		public function __construct()
		{
			$this->connect();
			$this->fetched_search_array = array();
			$prod_id_in_array = array();
            $sizecolor_in_array = array();
		}


		public function connect()
		{

			try {

				$this->dbase = new PDO("mysql:host=".server.";dbname=".database,user,pass);

				

			}catch(PDOException $e) {

				echo "Failed to connect to db";

			}

			$this->dbase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			date_default_timezone_set('Africa/Nairobi');
			
			$this->now_date_only = date("Y-m-d");
			
			$this->now_time_only = date("H:i:s");

		}
		public function set_email($email)
		{
			$this->user_email = $email;
		}
		
		public function set_admin_email($admin_email)
		{
			$this->admin_email = $admin_email;
		}
		
		public function set_admin_code($admin_code)
		{
			$this->admin_code = $admin_code;
		}

		public function set_user_id($userId)
		{
			$this->user_id = $userId;
		}

		public function set_user_city($city){
			$this->city =$city;
		}

		public function set_user_country($country){
			$this->country =$country;
		}

		public function set_user_address($address){
			$this->address = $address;
		}

		public function set_username($username)
		{
			$this->username = $username;
		}

		public function set_full_name($fname,$lname)
		{
			$this->full_name = $fname." ".$lname;
		}

		public function set_phone_no($phoneNo)
		{
			$this->phone_no = $phoneNo;
		}
		
		public function set_user_desc($user_desc)
		{
			$this->user_desc = $user_desc;
		}

		public function set_user_type($usertype)
		{
			$this->usertype = $usertype;
		}
		
		/*------------------ START floorplan setters -------------------------------*/

		public function set_floorplan_id($floorplan_id)
		{
			$this->floorplan_id = $floorplan_id;
		}

		public function set_floorplan_bedrooms($floorplan_bedrooms)
		{
			$this->floorplan_bedrooms = $floorplan_bedrooms;
		}

		public function set_floorplan_bathrooms($floorplan_bathrooms)
		{
			$this->floorplan_bathrooms = $floorplan_bathrooms;
		}

		public function set_floorplan_size($floorplan_size)
		{
			$this->floorplan_size = $floorplan_size;
		}

		public function set_floorplan_image($floorplan_image)
		{
			$this->floorplan_image = $floorplan_image;
		}

		public function set_floorplan_price($floorplan_price)
		{
			$this->floorplan_price = $floorplan_price;
		}

		public function set_floorplan_desc($floorplan_desc)
		{
			$this->floorplan_desc = $floorplan_desc;
		}
		
		/*------------------ END floorplan setters -------------------------------*/
		
		public function set_profile_pic($profile_pic)
		{
			$this->profile_pic = $profile_pic;
		}
		
		public function set_cover_pic($cover_pic)
		{
			$this->cover_pic = $cover_pic;
		}
		
		public function set_open_days($open_days)
		{
			$this->open_days = $open_days;
		}
		
		public function set_open_time($open_time)
		{
			$this->open_time = $open_time;
		}
		
		public function set_close_time($close_time)
		{
			$this->close_time = $close_time;
		}
		
		public function set_happy_hour_start($open_time)
		{
			$this->happy_hour_start = $open_time;
		}
		
		public function set_happy_hour_stop($close_time)
		{
			$this->happy_hour_stop = $close_time;
		}

		public function set_address($address)
		{
			$this->address = $address;
		}

		public function set_city($city)
		{
			$this->city = $city;
		}

		public function set_country($country)
		{
			$this->country = $country;
		}

		public function set_account_approval($approval)
		{
			$this->approval_status = $approval;
		}

		public function set_raw_password($pass)
		{
			$this->raw_password = $pass;
		}
		
		public function set_old_password($pass)
		{
			$this->old_password = $pass;
		}

		public function set_password($pass)
		{
			$this->password = password_hash($pass, PASSWORD_BCRYPT);
		}

		public function set_photo_id($photoid)
		{
			$this->photo_id = $photoid;
		}

		public function set_photo_name($photoname)
		{
			$this->photo_name = $photoname;
		}

		public function set_photo_desc($photodesc)
		{
			$this->photo_desc = $photodesc;
		}

		public function set_photo_path($photopath)
		{
			$this->photo_path = $photopath;
		}

		public function set_post_id($postid) 
		{
			$this->post_id = $postid;
		}

		public function set_post_title($title)
		{
			$this->post_title = $title;
		}

		public function set_post_data($postdata)
		{
			$this->post_data = $postdata;
		}

		public function set_post_photo_path($photopath)
		{
			$this->post_photo_path = $photopath;
		}
		
		public function set_prod_id($prod_id)
		{
			$this->prod_id = $prod_id;
		}
		
		public function set_cart_id($cartId)
		{
			$this->cart_id = $cartId;
		}
		

		
		public function set_PID($PID)
	{
		$this->PID = $PID;
	}

	public function set_Pname($pname)
	{
		$this->Pname = $pname;
	}

	public function set_Pdetails($Pdetails)
	{
		$this->Pdetails = $Pdetails;
	}

	public function set_Paddress($Paddress)
	{
		$this->Paddress = $Paddress;
	}

	public function set_Pcountry($Pcountry)
	{
		$this->Pcountry = $Pcountry;
	}
	
	public function set_Pcounty($Pcounty)
	{
		$this->Pcounty = $Pcounty;
	}
	
	public function set_Platitude($Platitude)
	{
		$this->Platitude = $Platitude;
	}
	
	public function set_Plongitude($Plongitude)
	{
		$this->Plongitude = $Plongitude;
	}

	public function set_Pcity($Pcity)
	{
		$this->Pcity = $Pcity;
	}
	
	public function set_Pzip($Pzip)
	{
		$this->Pzip = $Pzip;
	}

	public function set_Pcode($Pcode)
	{
		$this->Pcode = $Pcode;
	}

	public function set_Ptype($Ptype)
	{
		$this->Ptype = $Ptype;
	}

	public function set_Pstatus($Pstatus)
	{
		$this->Pstatus = $Pstatus;
	}

	public function set_Pprice($Pprice)
	{
		$this->Pprice = $Pprice;
	}

	public function set_PpricePeriod($PpricePeriod)
	{
		$this->PpricePeriod = $PpricePeriod;
	}

	public function set_PstartPrice($PstartPrice)
	{
		$this->PstartPrice = $PstartPrice;
	}
	
	public function set_Pcategory($Pcategory)
	{
		$this->Pcategory = $Pcategory;
	}
	
	public function set_PletDate($PletDate)
	{
		$this->PletDate = $PletDate;
	}
	
	public function set_PownershipType($PownershipType)
	{
		$this->PownershipType = $PownershipType;
	}
	
	public function set_PsaleType($PsaleType)
	{
		$this->PsaleType = $PsaleType;
	}

	public function set_Pfeatures($Pfeatures)
	{
		$this->Pfeatures = $Pfeatures;
	}
	
	public function set_PfurnishType($PfurnishType)
	{
		$this->PfurnishType = $PfurnishType ;
	}
	
	public function set_PwindowsType($PwindowsType)
	{
		$this->PwindowsType = $PwindowsType ;
	}
	
	public function set_PheatingType($PheatingType)
	{
		$this->PheatingType = $PheatingType ;
	}
	
	public function set_PnearestAmenities($PnearestAmenities)
	{
		$this->PnearestAmenities = $PnearestAmenities ;
	}

	public function set_Psize($Psize)
	{
		$this->Psize = $Psize;
	}

	public function set_PyearBuilt($PyearBuilt)
	{
		$this->PyearBuilt = $PyearBuilt;
	}

	public function set_PnearestTown($PnearestTown)
	{
		$this->PnearestTown = $PnearestTown;
	}

	public function set_Pbedrooms($Pbedrooms)
	{
		$this->Pbedrooms = $Pbedrooms;
	}
	
	public function set_Pgarage($Pgarage)
	{
		$this->Pgarage = $Pgarage;
	}
	
	public function set_PgarageSize($PgarageSize)
	{
		$this->PgarageSize = $PgarageSize;
	}
	
	public function set_Prooms($Prooms)
	{
		$this->Prooms = $Prooms;
	}

	public function set_Pbathrooms($Pbathrooms)
	{
		$this->Pbathrooms = $Pbathrooms;
	}

	public function set_Pimage($Pimage)
	{
		$this->Pimage = $Pimage;
	}
	
	public function set_PVideo($PVideo)
	{
		$this->PVideo = $PVideo;
	}
	
	public function set_PAttachment($PAttachment)
	{
		$this->PAttachment = $PAttachment;
	}
	
	public function set_P_epcImage($P_epcImage)
	{
		$this->P_epcImage = $P_epcImage;
	}

	public function set_PcontactName($PcontactName)
	{
		$this->PcontactName = $PcontactName;
	}

	public function set_PcontactPhone($PcontactPhone)
	{
		$this->PcontactPhone = $PcontactPhone;
	}

	public function set_PcontactEmail($PcontactEmail)
	{
		$this->PcontactEmail = $PcontactEmail;
	}

	public function set_PcontactInfo($PcontactInfo)
	{
		$this->PcontactInfo = $PcontactInfo;
	}
	

	public function set_booking_name($booking_name)
	{
		$this->booking_name = $booking_name;
	}
	
		public function set_booking_id($booking_id)
	{
		$this->booking_id = $booking_id;
	}
	
		public function set_p_owner_id($p_owner_id)
	{
		$this->p_owner_id = $p_owner_id;
	}
	
		public function set_booking_phone($booking_phone)
	{
		$this->booking_phone = $booking_phone;
	}
	
		public function set_booking_email($booking_email)
	{
		$this->booking_email = $booking_email;
	}
	
		public function set_booking_message($booking_message)
	{
		$this->booking_message = $booking_message;
	}
	

	public function insert_to_products_table()
		{
			$this->stmt = $this->dbase->prepare(
				"INSERT INTO 
				$this->productsTable(PID,Pname,Pdetails,Paddress,Pcountry,Pcity,Pcode,Ptype,Pstatus,Pprice,PpricePeriod,
					PstartPrice,Pfeatures,Psize,PyearBuilt,PnearestTown,Pbedrooms,Pbathrooms,Pimage,PcontactName,PcontactPhone,PcontactEmail,PcontactInfo,PVacancy) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				
			$vacancy = "Available";	

			$this->stmt->bindParam(1,$this->PID);
			$this->stmt->bindParam(2,$this->Pname);
			$this->stmt->bindParam(3,$this->Pdetails);
			$this->stmt->bindParam(4,$this->Paddress);
			$this->stmt->bindParam(5,$this->Pcountry);
			$this->stmt->bindParam(6,$this->Pcity);
			$this->stmt->bindParam(7,$this->Pcode);
			$this->stmt->bindParam(8,$this->Ptype);
			$this->stmt->bindParam(9,$this->Pstatus);
			$this->stmt->bindParam(10,$this->Pprice);
			$this->stmt->bindParam(11,$this->PpricePeriod);
			$this->stmt->bindParam(12,$this->PstartPrice);
			$this->stmt->bindParam(13,$this->Pfeatures);
			$this->stmt->bindParam(14,$this->Psize);
			$this->stmt->bindParam(15,$this->PyearBuilt);
			$this->stmt->bindParam(16,$this->PnearestTown);
			$this->stmt->bindParam(17,$this->Pbedrooms);
			$this->stmt->bindParam(18,$this->Pbathrooms);
			$this->stmt->bindParam(19,$this->Pimage);
			$this->stmt->bindParam(20,$this->PcontactName);
			$this->stmt->bindParam(21,$this->PcontactPhone);
			$this->stmt->bindParam(22,$this->PcontactEmail);
			$this->stmt->bindParam(23,$this->PcontactInfo);
			$this->stmt->bindParam(24,$vacancy);
			$this->stmt->execute();

			if($this->stmt) {
				return true;
			} else {
				return false;
			}
	}
	
	
	public function create_listing($owner_id)
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE PID='$this->PID' ");
			
			if($sql->rowCount() > 0 ) { 
			    
    			$this->stmt = $this->dbase->prepare("UPDATE $this->listingTable SET Pname=?,Pdetails=?,Prooms=?,Ptype=?,Pprice=?,Psize=?,Pstatus=?,Pcategory=?,PstartPrice=?,PpricePeriod=?,PletDate=?,PownershipType=?,PsaleType=? WHERE PID=? ");
			
        			$this->stmt->bindParam(1,$this->Pname);
        			$this->stmt->bindParam(2,$this->Pdetails);
        			$this->stmt->bindParam(3,$this->Prooms);
        			$this->stmt->bindParam(4,$this->Ptype);
        			$this->stmt->bindParam(5,$this->Pprice);
        			$this->stmt->bindParam(6,$this->Psize);
        			$this->stmt->bindParam(7,$this->Pstatus);
        			$this->stmt->bindParam(8,$this->Pcategory); //Pcategory,PletDate,PownershipType,PsaleType,PpricePeriod,PstartPrice
                    $this->stmt->bindParam(9,$this->PstartPrice); //Pcategory=?,PstartPrice=?,PpricePeriod=?,PletDate=?,PownershipType=?,PsaleType=?
                    $this->stmt->bindParam(10,$this->PpricePeriod);
                    $this->stmt->bindParam(11,$this->PletDate);
                    $this->stmt->bindParam(12,$this->PownershipType);
                    $this->stmt->bindParam(13,$this->PsaleType);
                    $this->stmt->bindParam(14,$this->PID);
        		
        			$this->stmt->execute(); 
        
        			if($this->stmt) {
        				return true;
        			} else {
        				return false;
        			} 
    			
			} else {
			    
			    $approval = "0";
			    
			    $this->stmt = $this->dbase->prepare("INSERT INTO $this->listingTable(OwnerId,PID,Pname,Pcategory,PApproval) VALUES(?,?,?,?,?)");
    				
    			$this->stmt->bindParam(1,$owner_id);
    			$this->stmt->bindParam(2,$this->PID);
    			$this->stmt->bindParam(3,$this->Pname);
    			$this->stmt->bindParam(4,$this->Pcategory);
    			$this->stmt->bindParam(5,$approval);
    			$this->stmt->execute();
    
    			if($this->stmt) {
    				return true;
    			} else {
    				return false;
    			}
			    
			}
		}
		
	public function create_detailed_property_listing()
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE PID='$this->PID' ");
			
			if($sql->rowCount() > 0 ) { 
			    
    			$this->stmt = $this->dbase->prepare("UPDATE $this->listingTable SET Pcode=?,PBedrooms=?,PBathrooms=?,Pgarage=?,PgarageSize=?,PyearBuilt=?,PFeatures=?,PfurnishType=?,PwindowsType=?,PheatingType=?,PnearestAmenities=? WHERE PID=? ");
			
        			$this->stmt->bindParam(1,$this->Pcode); //PfurnishType=?,PwindowsType=?,PheatingType=?,PnearestAmenities=?
        			$this->stmt->bindParam(2,$this->Pbedrooms);
        			$this->stmt->bindParam(3,$this->Pbathrooms);
        			$this->stmt->bindParam(4,$this->Pgarage);
        			$this->stmt->bindParam(5,$this->PgarageSize);
        			$this->stmt->bindParam(6,$this->PyearBuilt);
        			$this->stmt->bindParam(7,$this->Pfeatures);
        			$this->stmt->bindParam(8,$this->PfurnishType);
        			$this->stmt->bindParam(9,$this->PwindowsType);
        			$this->stmt->bindParam(10,$this->PheatingType);
        			$this->stmt->bindParam(11,$this->PnearestAmenities);
        			$this->stmt->bindParam(12,$this->PID);

        			$this->stmt->execute(); 
        
        			if($this->stmt) {
        				return true;
        			} else {
        				return false;
        			} 
    			
			} else {
			    
    				return false;
    			
			}
		}
		
		
	public function create_listing_location()
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE PID='$this->PID' ");
			
			if($sql->rowCount() > 0 ) { 
			    
    			$this->stmt = $this->dbase->prepare("UPDATE $this->listingTable SET Paddress=?,Pcountry=?,Pcity=?,Pzip=?,Pcounty=?,Platitude=?,Plongitude=? WHERE PID=? ");
			
        			$this->stmt->bindParam(1,$this->Paddress);
        			$this->stmt->bindParam(2,$this->Pcountry);
        			$this->stmt->bindParam(3,$this->Pcity);
        			$this->stmt->bindParam(4,$this->Pzip);
        			$this->stmt->bindParam(5,$this->Pcounty);
        			$this->stmt->bindParam(6,$this->Platitude);
        			$this->stmt->bindParam(7,$this->Plongitude);
        			$this->stmt->bindParam(8,$this->PID);

        			$this->stmt->execute(); 
        
        			if($this->stmt) {
        				return true;
        			} else {
        				return false;
        			} 
    			
			} else {
			    
    				return false;
    			
			}
		 }	
		
	public function upload_image_media()
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE PID='$this->PID' ");
			
			if($sql->rowCount() > 0 ) { 
			    
    			$this->stmt = $this->dbase->prepare("UPDATE $this->listingTable SET Pimage=? WHERE PID=? ");
			
        			$this->stmt->bindParam(1,$this->Pimage);
        			$this->stmt->bindParam(2,$this->PID);
        		
        			$this->stmt->execute(); 
        
        			if($this->stmt) {
        				return true;
        			} else {
        				return false;
        			} 
    			
			} else {
			    
			    return false;
			    
			}
		}
		
	public function upload_epc_media()
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE PID='$this->PID' ");
			
			if($sql->rowCount() > 0 ) { 
			    
    			$this->stmt = $this->dbase->prepare("UPDATE $this->listingTable SET P_epcImage=? WHERE PID=? ");
			
        			$this->stmt->bindParam(1,$this->P_epcImage);
        			$this->stmt->bindParam(2,$this->PID);
        		
        			$this->stmt->execute(); 
        
        			if($this->stmt) {
        				return true;
        			} else {
        				return false;
        			} 
    			
			} else {
			    
			    return false;
			    
			}
		}
		
	public function upload_video_media()
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE PID='$this->PID' ");
			
			if($sql->rowCount() > 0 ) { 
			    
    			$this->stmt = $this->dbase->prepare("UPDATE $this->listingTable SET PVideo=? WHERE PID=? ");
			
        			$this->stmt->bindParam(1,$this->PVideo);
        			$this->stmt->bindParam(2,$this->PID);
        		
        			$this->stmt->execute(); 
        
        			if($this->stmt) {
        				return true;
        			} else {
        				return false;
        			} 
    			
			} else {
			    
			    return false;
			    
			}
		}	
		
	public function upload_attachment_media()
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE PID='$this->PID' ");
			
			if($sql->rowCount() > 0 ) { 
			    
    			$this->stmt = $this->dbase->prepare("UPDATE $this->listingTable SET PAttachment=? WHERE PID=? ");
			
        			$this->stmt->bindParam(1,$this->PAttachment);
        			$this->stmt->bindParam(2,$this->PID);
        		
        			$this->stmt->execute(); 
        
        			if($this->stmt) {
        				return true;
        			} else {
        				return false;
        			} 
    			
			} else {
			    
			    return false;
			    
			}
		}		
		
	public function create_listing_floorplan()
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE PID='$this->PID' ");
			
			if($sql->rowCount() > 0 ) { 
			    
    			$this->stmt = $this->dbase->prepare("INSERT INTO $this->floorplanTable(FloorplanId,ListingId,FloorplanBedrooms,FloorplanBathrooms,FloorplanSize,FloorplanImage,FloorplanPrice,FloorplanDesc) VALUES(?,?,?,?,?,?,?,?)");
    				
    			$this->stmt->bindParam(1,$this->floorplan_id);
    			$this->stmt->bindParam(2,$this->PID);
    			$this->stmt->bindParam(3,$this->floorplan_bedrooms);
    			$this->stmt->bindParam(4,$this->floorplan_bathrooms);
    			$this->stmt->bindParam(5,$this->floorplan_size);
    			$this->stmt->bindParam(6,$this->floorplan_image);
    			$this->stmt->bindParam(7,$this->floorplan_price);
    			$this->stmt->bindParam(8,$this->floorplan_desc);
    			$this->stmt->execute();
    
    			if($this->stmt) {
    				return true;
    			} else {
    				return false;
    			}
    			
			} else {
			    
			    return false;
			    
			}
		}	
		
	public function fetch_specific_listing_data($pid)
	{

		$sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE PID='$pid' ");

		foreach($sql as $row) {
		    $this->fetched_PID = $row["PID"];
		    $this->fetched_ownerId = $row["OwnerId"];
		    $this->fetched_Pname = $row["Pname"];
		    $this->fetched_Paddress = $row["Paddress"];
		    $this->fetched_Pdetails = $row["Pdetails"];
		    $this->fetched_Pcountry = $row["Pcountry"];
		     $this->fetched_Pcity = $row["Pcity"];
		     $this->fetched_Pcounty = $row["Pcounty"];
		     $this->fetched_Platitude = $row["Platitude"];
		     $this->fetched_Plongitude = $row["Plongitude"];
		     $this->fetched_Prooms = $row["Prooms"];
		     $this->fetched_Pgarage = $row["Pgarage"];
		     $this->fetched_PgarageSize = $row["PgarageSize"];
		    $this->fetched_Pcode = $row["Pcode"];
		    $this->fetched_Ptype = $row["Ptype"];
		    $this->fetched_Pstatus = $row["Pstatus"];
		    $this->fetched_Pprice = $row["Pprice"];
		     $this->fetched_PpricePeriod = $row["PpricePeriod"];
		    $this->fetched_PstartPrice = $row["PstartPrice"];
		    $this->fetched_Pfeatures = $row["Pfeatures"];
		    $this->fetched_Psize = $row["Psize"];
		    $this->fetched_PyearBuilt = $row["PyearBuilt"];
		     $this->fetched_PnearestTown = $row["PnearestTown"];
		    $this->fetched_Pbedrooms = $row["Pbedrooms"];
		    $this->fetched_Pbathrooms = $row["Pbathrooms"];
		    $this->fetched_Pimage = $row["Pimage"];
		    $this->fetched_PcontactName = $row["PcontactName"];
		     $this->fetched_PcontactPhone = $row["PcontactPhone"];
		    $this->fetched_PcontactEmail = $row["PcontactEmail"];
		    $this->fetched_PcontactInfo = $row["PcontactInfo"];
		    
		    $this->fetched_Pzip = $row["Pzip"];
		    $this->fetched_PfurnishType = $row["PfurnishType"];
		    $this->fetched_PwindowsType = $row["PwindowsType"];
		    $this->fetched_PheatingType = $row["PheatingType"];
		    $this->fetched_PnearestAmenities = $row["PnearestAmenities"];
		    $this->fetched_P_epcImage = $row["P_epcImage"];
		    $this->fetched_PVideo = $row["PVideo"];
		    $this->fetched_PAttachment = $row["PAttachment"];
		    $this->fetched_Pcategory = $row["Pcategory"];
		    $this->fetched_PletDate = $row["PletDate"];
		    $this->fetched_PownershipType = $row["PownershipType"];
		    $this->fetched_PsaleType = $row["PsaleType"];

		    
		}

	}

		public function get_all_listings()
		{
			$sql = $this->dbase->query("SELECT * FROM $this->listingTable ");

			if($sql->rowCount() > 0) {
				return $sql;
			} else {
				return false;
			}
		}
		
		public function get_specific_listing_floorplans($listing_id)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->floorplanTable WHERE ListingId='$listing_id' ");

			if($sql->rowCount() > 0) {
				return $sql;
			} else {
				return false;
			}
		}
		
		public function get_all_listings_home()
		{
			$sql = $this->dbase->query("SELECT * FROM $this->listingTable LIMIT 6");

			if($sql->rowCount() > 0) {
				return $sql;
			} else {
				return false;
			}
		}
		
		public function get_all_category_based_listings_home($category)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE Pcategory='$category' ");

			if($sql->rowCount() > 0) {
				return $sql;
			} else {
				return false;
			}
		}
		
		public function get_all_user_category_based_listings_related($category,$pid,$user_id)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE Pcategory='$category' AND OwnerId='$user_id' AND NOT PID='$pid' ");

			if($sql->rowCount() > 0) {
				return $sql;
			} else {
				return false;
			}
		}
		
		public function get_all_user_listings($user_id)
		{
			$sql = $this->dbase->query("SELECT * FROM $this->listingTable WHERE OwnerId='$user_id' ");

			if($sql->rowCount() > 0) {
				return $sql;
			} else {
				return false;
			}
		}
		
	public function insert_to_bookings_table()
	{
	    

        $booking_status = "0";
    
		$this->stmt = $this->dbase->prepare(
			"INSERT INTO 
			$this->bookingTable(Booking_id,PID,OwnerID,Booking_name,Booking_phone,Booking_email,Booking_message,Booking_status,BookDate,BookTime) 
			VALUES(?,?,?,?,?,?,?,?,now(),now())");

		$this->stmt->bindParam(1,$this->booking_id);
		$this->stmt->bindParam(2,$this->PID);
		$this->stmt->bindParam(3,$this->p_owner_id);
		$this->stmt->bindParam(4,$this->booking_name);
		$this->stmt->bindParam(5,$this->booking_phone);
		$this->stmt->bindParam(6,$this->booking_email);
		$this->stmt->bindParam(7,$this->booking_message);
		$this->stmt->bindParam(8,$booking_status);
		$this->stmt->execute();

		if($this->stmt) {
			return true;
		} else {
			return false;
		}
	}
		
	public function get_all_bookings()
	{
	    
	    $sql = $this->dbase->query("SELECT * FROM $this->bookingTable ");

		return $sql;
	    
	}

	public function update_pages_data_table($page_info,$page_category)
		{
		    
			    
    			$this->stmt = $this->dbase->prepare("UPDATE $this->pagesDataTable SET Data=? WHERE PageID=? ");
			
        			$this->stmt->bindParam(1,$page_info);
        			$this->stmt->bindParam(2,$page_category);
        		
        			$this->stmt->execute(); 
        
        			if($this->stmt) {
        				return true;
        			} else {
        				return false;
        			} 
    			
		}

		public function get_pages_data_details($page_category)
		{

			$sql = $this->dbase->query("SELECT * FROM $this->pagesDataTable WHERE PageID='$page_category' ");

			foreach($sql as $row) {
				$this->fetched_page_data = $row["Data"];
			}

		}	

		public function update_profile_pic($user_id)
		{
			
			$this->stmt = $this->dbase->prepare("UPDATE $this->regTable SET UserPic=? WHERE UserId=? ");
			
			$this->stmt->bindParam(1,$this->profile_pic);
			$this->stmt->bindParam(2,$user_id);
			
			$this->stmt->execute(); 

			if($this->stmt) {
				return true;
			} else {
				return false;
			} 
			
		}

        public function update_profile_information()
		{
			
			$this->stmt = $this->dbase->prepare("UPDATE $this->regTable SET UserName=?,UserEmail=?,UserType=?,UserMobile=?,UserDescription=? WHERE UserId=? ");
			
			$this->stmt->bindParam(1,$this->username);
			$this->stmt->bindParam(2,$this->user_email);
			$this->stmt->bindParam(3,$this->usertype);
			$this->stmt->bindParam(4,$this->phone_no);
			$this->stmt->bindParam(5,$this->user_desc);
			$this->stmt->bindParam(6,$this->user_id);
			
			$this->stmt->execute(); 

			if($this->stmt) {
				return true;
			} else {
				return false;
			} 
			
		}

		public function insert_to_reg_table()
		{

			//sql query to determine if the UserId is already registered
			$sql2 = $this->dbase->query("SELECT * FROM ".$this->regTable." WHERE UserEmail='$this->user_email' ");


						if($sql2->rowCount() > 0) { // if it does not exist in database
						
						
								return false;		
								

						} else {
                                
                                $this->stmt = $this->dbase->prepare("INSERT INTO $this->regTable(UserId,UserName,UserEmail,UserType,Password,Approval,Date,Time) 
																	VALUES(?,?,?,?,?,?,now(),now())");

								$this->stmt->bindParam(1,$this->user_id);
								$this->stmt->bindParam(2,$this->username);
								$this->stmt->bindParam(3,$this->user_email);
								$this->stmt->bindParam(4,$this->usertype);
								$this->stmt->bindParam(5,$this->password);
								$this->stmt->bindParam(6,$this->approval_status);
								$this->stmt->execute();

								if($this->stmt) {
									return true;
								} else {
									return false;
								}

                        
						}

		}


		
		public function update_reg_table()
		{
			$this->stmt = $this->dbase->prepare
			("UPDATE $this->regTable SET UserId=?,Username=?,Email=?,PhoneNo=?,Address=?,City=?,ProfilePic=?,CoverPic=?,OpeningDays=?,OpeningTime=?,ClosingTime=? WHERE UserId=? ");

			                    $this->stmt->bindParam(1,$this->user_id);
								$this->stmt->bindParam(2,$this->username);
								$this->stmt->bindParam(3,$this->user_email);
								$this->stmt->bindParam(4,$this->phone_no);
								$this->stmt->bindParam(5,$this->address);
								$this->stmt->bindParam(6,$this->city);
								$this->stmt->bindParam(7,$this->profile_pic);
		                        $this->stmt->bindParam(8,$this->cover_pic);
		                        $this->stmt->bindParam(9,$this->open_days);
                    			$this->stmt->bindParam(10,$this->open_time);
                    			$this->stmt->bindParam(11,$this->close_time);
								$this->stmt->bindParam(12,$this->user_id);
								$this->stmt->execute();

								if($this->stmt) {
									return true;
								} else {
									return false;
								}

		}
		
		public function fetch_approval_status_from_reg_data($UserId)
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->regTable WHERE UserId='$UserId' ");
		    
		    if($sql->rowCount() > 0) {
			    foreach ($sql as $key => $row) {
			    	return $row["Approval"];
			    }
		    } else {
		        return false;
		    }
		    
		}
		
		public function fetch_from_reg_data_mobile($UserId)
		{
		    
		    $sql = $this->dbase->query("SELECT * FROM $this->regTable WHERE UserId='$UserId' ");
		    
		    if($sql->rowCount() > 0) {
			    return $sql;
		    } else {
		        return false;
		    }
		    
		}
		


		public function update_user_approval_status($user_id)
		{
			
			$this->stmt = $this->dbase->prepare("UPDATE $this->regTable SET Approval='1' WHERE UserId=? ");

			$this->stmt->bindParam(1,$user_id);
			
			$this->stmt->execute(); 

			if($this->stmt) {
				return true;
			} else {
				return false;
			} 
			
		}



		public function insert_to_login_table()
		{

			$sql = $this->dbase->query("SELECT * FROM $this->regTable WHERE UserEmail='$this->user_email' ");

			//if yes, fetch all the details that match the entered email and store in variables
			if($sql->rowCount() > 0) {

				foreach($sql as $row) {
					$this->fetched_email = $row["UserEmail"];
					$this->fetched_user_id = $row["UserId"];
					$this->fetched_user_type = $row["UserType"];
				    $this->password = $row["Password"];
				}

				//confirm password

				//if above condition is met, enter that data into the Login table
				if(password_verify($this->raw_password,$this->password)) {

					$this->stmt = $this->dbase->prepare("INSERT INTO $this->loginTable(UserId,LoginDate,LoginTime) VALUES(:userid,now(),now())");

					$this->stmt->bindParam(":userid",$this->fetched_user_id);
					$this->stmt->execute();

					if($this->stmt) {
						return true;
					} else {
						return false;
					}

				}

			}


		}
		
		public function change_password()
		{

			//sql query to determine if the UserId is already registered
			$sql2 = $this->dbase->query("SELECT * FROM $this->regTable WHERE UserId='$this->user_id' ");


						if($sql2->rowCount() > 0) { // if it does not exist in database
						
        						foreach($sql2 as $row) {
                					$this->pass = $row["Password"];
                				}
        						
						  if(password_verify($this->old_password,$this->pass)) {
						
						    $this->stmt = $this->dbase->prepare("UPDATE $this->regTable SET Password=? WHERE UserId=?");

								$this->stmt->bindParam(1,$this->password);
								$this->stmt->bindParam(2,$this->user_id);
								$this->stmt->execute();

								if($this->stmt) {
									return true;
								} else {
									return false;
								}

					    	} /*else {
					    	    return false;
					    	}*/
						
						} else {
						    
								return false;

						}

		}
		

		
		public function forgot_password()
		{

			//sql query to determine if the UserId is already registered
			$sql2 = $this->dbase->query("SELECT * FROM ".$this->regTable." WHERE Email='$this->user_email' ");


						if($sql2->rowCount() > 0) { // if it does not exist in database
						
						    $this->stmt = $this->dbase->prepare("UPDATE $this->regTable SET Password=? WHERE Email=?");

								$this->stmt->bindParam(1,$this->password);
								$this->stmt->bindParam(2,$this->user_email);
								$this->stmt->execute();

								if($this->stmt) {
									return true;
								} else {
									return false;
								}

							
						} else {
						    
						        return false;
								$this->message("Use an unregistered e-mail.","Fail");

						}

		}

		public function get_session_details($session_id)
		{

			$sql = $this->dbase->query("SELECT * FROM $this->regTable WHERE UserId='$session_id' ");

			foreach($sql as $row) {
				$this->session_email = $row["UserEmail"];
				$this->session_user_id = $row["UserId"];
				$this->session_username = $row["UserName"];
				$this->session_user_type = $row["UserType"];
				$this->session_user_phone = $row["UserMobile"];
				$this->session_user_facebook = $row["UserFacebook"];
				$this->session_user_twitter = $row["UserTwitter"];
				$this->session_user_linkedin = $row["UserLinkedin"];
				$this->session_user_instagram = $row["UserInstagram"];
				$this->session_user_description = $row["UserDescription"];
				$this->session_user_pic = $row["UserPic"];
				$this->session_regDate = $row["Date"];
				$this->session_regTime = $row["Time"];
			}

		}


		public function get_all_unapproved_users()
		{

			$sql = $this->dbase->query("SELECT * FROM $this->regTable WHERE Approval='0' ");
			return $sql;

		}

		public function delete_user($userid)
		{

			$sql = $this->dbase->query("SELECT * FROM $this->emailTable WHERE UserId='$userid' ");

			if($sql->rowCount() > 0) {

				$this->stmt = $this->dbase->prepare("DELETE $this->emailTable,$this->regTable FROM $this->emailTable INNER JOIN $this->regTable 
													WHERE $this->emailTable.UserId=$this->regTable.UserId AND $this->emailTable.UserId=:userid ");

				$this->stmt->bindParam(":userid",$userid);
				$this->stmt->execute();

				if($this->stmt) {
					echo "Deletion success";
				} else {
					echo "Deletion failed";
				}

			} else {
				echo "User not registered";
			}

		}
		public function test(){
			return "Db Connect";
		}

	}
	$database = new database();

?>