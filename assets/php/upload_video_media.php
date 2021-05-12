<?php

require_once("../../includes/initialise.php");

// Count total files
$countfiles = count($_FILES['PVideo']['name']);
$upload_video_media_id = $_POST["upload_video_media_id"];

// Upload directory
$upload_location = "Uploaded/Videos/";

// To store uploaded files path
$files_arr = array();

// Loop all files
for($index = 0;$index < $countfiles;$index++){

   if(isset($_FILES['PVideo']['name'][$index]) && $_FILES['PVideo']['name'][$index] != ''){
      // File name
      $filename = $_FILES['PVideo']['name'][$index];

      // Get extension
      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

      // Valid image extension
      $valid_ext = array("mp4");

      // Check extension
      if(in_array($ext, $valid_ext)){

         // File path
         $path = $upload_location.$filename;

         // Upload file
         if(move_uploaded_file($_FILES['PVideo']['tmp_name'][$index],$path)){
            $files_arr[] = $filename;
         }
      }
   }
}

//echo ;
$database->set_PID($upload_video_media_id);
$database->set_PVideo(json_encode($files_arr));

if($database->upload_video_media()) {
    echo "Listing video media uploaded";
} else {
    echo "Failed to upload video media";
}