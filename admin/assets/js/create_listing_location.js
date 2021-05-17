(function() 

{

	var form = document.getElementById("create_listing_location_form");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("create_listing_location_dummy_loading").innerHTML = "Updating location information, please wait";
		
		document.getElementById("create_listing_location_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();

		formData.append("listing_location_property_id",document.getElementById("listing_location_property_id").value);
		formData.append("create_listing_location_address",document.getElementById("create_listing_location_address").value);
		formData.append("create_listing_location_county",document.getElementById("create_listing_location_county").value);
		formData.append("create_listing_location_city",document.getElementById("create_listing_location_city").value);
		formData.append("create_listing_location_zip",document.getElementById("create_listing_location_zip").value);
		formData.append("create_listing_location_country",$('#create_listing_location_country').find(":selected").text());
		formData.append("create_listing_location_latitude",document.getElementById("create_listing_location_latitude").value);
		formData.append("create_listing_location_longitude",document.getElementById("create_listing_location_longitude").value);


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

		   // _("create_listing_status").innerHTML = ev.target.responseText;
		    _("create_listing_location_dummy_loading").innerHTML = ev.target.responseText;
		    _("create_listing_location_dummy_loading_text").innerHTML = "";
             //document.getElementById("create_listing_dummy_loading_text").style.display = "none";
             //document.getElementById("create_listing_dummy_loading").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("create_listing_location_status").innerHTML = "Uploading location information failed";
		    document.getElementById("create_listing_location_dummy_loading").innerHTML = "Failed";
		    document.getElementById("create_listing_location_dummy_loading_text").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("create_listing_location_status").innerHTML = "Uploading location information aborted";
             document.getElementById("create_listing_location_dummy_loading").innerHTML = "Cancelled";
             document.getElementById("create_listing_location_dummy_loading_text").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/create_listing_location.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}