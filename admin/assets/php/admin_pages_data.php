<?php 

require_once("../../../includes/initialise.php");

          $page_category = $_POST["page_category"];
          $page_info = $_POST["page_info"];

            if($database->update_pages_data_table($page_info,$page_category)) {
               echo "Upload a success";
            } else {
               echo "Upload fail";
            }
            

?>