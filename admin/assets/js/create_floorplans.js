(function() 

{

	var form = document.getElementById("create_floorplan_form");
	
	var fileSelect = document.getElementById("create_listing_floorplan_image");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("create_listing_floorplan_dummy_loading").innerHTML = "Creating floorplan, please wait";
		
		document.getElementById("create_listing_floorplan_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();
		
		//get files from the input
		var files = fileSelect.files;

		//create new form-data object
		var formData = new FormData();

		//get one file from the input
		var file_poster = files[0];

		// add file to the request
		formData.append("create_listing_floorplan_image",file_poster,file_poster.name);

		formData.append("floorplan_listing_id",document.getElementById("floorplan_listing_id").value);
		formData.append("create_listing_floorplan_bedrooms",document.getElementById("create_listing_floorplan_bedrooms").value);
		formData.append("create_listing_floorplan_desc",$('#create_listing_floorplan_desc').val());
		formData.append("create_listing_floorplan_bathrooms",document.getElementById("create_listing_floorplan_bathrooms").value);
		formData.append("create_listing_floorplan_size",document.getElementById("create_listing_floorplan_size").value);
		formData.append("create_listing_floorplan_price",document.getElementById("create_listing_floorplan_price").value);

		var picRequest;

			try {

				// request for normal browsers
					picRequest = new XMLHttpRequest();
			} catch(e) {

				try {
					picRequest = new ActiveXObject("Msxml2.XMLHTTP")
				} catch(e) {
					
					try {
						picRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch(e) {
						alert("Browser has broken");
						return false;
					}

				}
			}
			

	//	picRequest.upload.addEventListener("progress", progressHandler, false);
		picRequest.addEventListener("load", function(ev) {

		  if(ev.target.responseText == "true") {
		      
		      document.getElementById("create_listing_floorplan_bedrooms").value = "";
		      document.getElementById("create_listing_floorplan_bathrooms").value = "";
		      document.getElementById("create_listing_floorplan_size").value = "";
		      document.getElementById("create_listing_floorplan_price").value = "";
		      document.getElementById("create_listing_floorplan_image").value = "";
		      document.getElementById("create_listing_floorplan_desc").value = "";

		      
		      _("create_listing_floorplan_dummy_loading_text").innerHTML = "Floorplan created successfully. You can add more or <a href='' class='btn btn-thm'>finish</a>";
		  
		  } else {
		    _("create_listing_floorplan_dummy_loading_text").innerHTML = ev.target.responseText;
		    _("create_listing_floorplan_dummy_loading").innerHTML = "";
		  }
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("create_listing_floorplan_status").innerHTML = "Floorplan creation failed";
		    document.getElementById("create_listing_floorplan_dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("create_listing_floorplan_dummy_loading").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("create_listing_floorplan_status").innerHTML = "Floorplan creation aborted";
             document.getElementById("create_listing_floorplan_dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("create_listing_floorplan_dummy_loading").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/create_floorplans.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}