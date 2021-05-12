<?php

require_once("../includes/initialise.php");

if(isset($_POST["submit_property"])) {
	
	$PName = $_POST["Pname"];
	$Pdetails = $_POST["Pdetails"];
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

		/*$upload->set_photo_name($_FILES["Pimage"]["name"]);
        $upload->set_file_type($_FILES["Pimage"]["type"]);
        $upload->set_tmp_loc($_FILES["Pimage"]["tmp_name"]);
        $upload->set_file_error($_FILES["Pimage"]["error"]);*/
        
        $gallery_array = array();
        $features_array = array();
        
         $extension=array("jpeg","jpg","png","gif");
            foreach($_FILES["Pimage"]["tmp_name"] as $key=>$tmp_name) {
                $file_name=$_FILES["Pimage"]["name"][$key];
                $file_tmp=$_FILES["Pimage"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
            
                if(in_array($ext,$extension)) {
                    if(!file_exists('../Uploaded/Images/'.$file_name)) {
                        move_uploaded_file($file_tmp=$_FILES["Pimage"]["tmp_name"][$key],'../Uploaded/Images/'.$file_name);
                        array_push($gallery_array, $file_name);
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["Pimage"]["tmp_name"][$key],'../Uploaded/Images/'.$newFileName);
                        array_push($gallery_array, $newFileName);
                    }
                }
                else {
                    array_push($error,"$file_name, ");
                }
            }
            
            $gallery_items = implode(",",$gallery_array);
            
        foreach($Pfeatures as $arr) {
            array_push($features_array, $arr);
        }   
        
        $features_items = implode(",",$features_array);


        //if image upload is successful  
        if($gallery_items !== " ") {

        	$automation->generate_product_id();

        	$database->set_PID($automation->product_id);
        	$database->set_Pname($PName);
        	$database->set_Pdetails($Pdetails);
        	$database->set_Paddress($Paddress);
        	$database->set_Pcountry($Pcountry);
        	$database->set_Pcity($Pcity);
        	$database->set_Pcode($Pcode);
        	$database->set_Ptype($Ptype);
        	$database->set_Pstatus($Pstatus);
        	$database->set_Pprice($Pprice);
        	$database->set_PpricePeriod($PpricePeriod);
        	$database->set_PstartPrice($PstartPrice);
        	$database->set_Pfeatures($features_items);
        	$database->set_Psize($Psize);
        	$database->set_Pimage($gallery_items);
        	$database->set_PyearBuilt($PyearBuilt);
        	$database->set_PnearestTown($PnearestTown);
        	$database->set_Pbedrooms($Pbedrooms);
        	$database->set_Pbathrooms($Pbathrooms);
        	$database->set_PcontactName($PcontactName);
        	$database->set_PcontactPhone($PcontactPhone);
        	$database->set_PcontactEmail($PcontactEmail);
        	$database->set_PcontactInfo($PcontactInfo);

        	if($database->insert_to_products_table()) {
        		echo "Success";
        	} else {
        		echo "Failure";
        	}



        }

}

?>