<?php

require_once("../../includes/initialise.php");

// Count total files
$countfiles = count($_FILES['Pimage']['name']);
$upload_image_media_id = $_POST["upload_image_media_id"];

// Upload directory
$upload_location = "Uploaded/Images/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for($index = 0;$index < $countfiles;$index++){

   if(isset($_FILES['Pimage']['name'][$index]) && $_FILES['Pimage']['name'][$index] != ''){
      // File name
      $filename = $_FILES['Pimage']['name'][$index];

      // Get extension
      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

      // Valid image extension
      $valid_ext = array("png","jpeg","jpg");

      // Check extension
      if(in_array($ext, $valid_ext)){

         // File path
         $path = $upload_location.$filename;

         // Upload file
         if(move_uploaded_file($_FILES['Pimage']['tmp_name'][$index],$path)){
            $files_arr[] = $filename;
         }
      }
   }
}

//echo ;
$database->set_PID($upload_image_media_id);
$database->set_Pimage(json_encode($files_arr));

if($database->upload_image_media()) {
    echo "Listing image media uploaded";
} else {
    echo "Failed to upload image media";
}