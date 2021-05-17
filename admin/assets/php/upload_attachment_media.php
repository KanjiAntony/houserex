<?php

require_once("../../includes/initialise.php");

// Count total files
$countfiles = count($_FILES['PAttachment']['name']);
$upload_attachment_media_id = $_POST["upload_attachment_media_id"];

// Upload directory
$upload_location = "Uploaded/Attachments/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for($index = 0;$index < $countfiles;$index++){

   if(isset($_FILES['PAttachment']['name'][$index]) && $_FILES['PAttachment']['name'][$index] != ''){
      // File name
      $filename = $_FILES['PAttachment']['name'][$index];

      // Get extension
      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

      // Valid image extension
      $valid_ext = array("pdf");

      // Check extension
      if(in_array($ext, $valid_ext)){

         // File path
         $path = $upload_location.$filename;

         // Upload file
         if(move_uploaded_file($_FILES['PAttachment']['tmp_name'][$index],$path)){
            $files_arr[] = $filename;
         }
      }
   }
}

//echo ;
$database->set_PID($upload_attachment_media_id);
$database->set_PAttachment(json_encode($files_arr));

if($database->upload_attachment_media()) {
    echo "Listing attachment media uploaded";
} else {
    echo "Failed to upload attachment media";
}