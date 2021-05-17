<?php

require_once("../../includes/initialise.php");

// Count total files
$countfiles = count($_FILES['P_epcImage']['name']);
$upload_epc_media_id = $_POST["upload_epc_media_id"];

// Upload directory
$upload_location = "Uploaded/Images/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for($index = 0;$index < $countfiles;$index++){

   if(isset($_FILES['P_epcImage']['name'][$index]) && $_FILES['P_epcImage']['name'][$index] != ''){
      // File name
      $filename = $_FILES['P_epcImage']['name'][$index];

      // Get extension
      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

      // Valid image extension
      $valid_ext = array("png","jpeg","jpg");

      // Check extension
      if(in_array($ext, $valid_ext)){

         // File path
         $path = $upload_location.$filename;

         // Upload file
         if(move_uploaded_file($_FILES['P_epcImage']['tmp_name'][$index],$path)){
            $files_arr[] = $filename;
         }
      }
   }
}

//echo ;
$database->set_PID($upload_epc_media_id);
$database->set_P_epcImage(json_encode($files_arr));

if($database->upload_epc_media()) {
    echo "Listing epc media uploaded";
} else {
    echo "Failed to upload epc media";
}