(function() 

{

	var form = document.getElementById("create_listing_detailed_property_form");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("create_listing_detailed_property_dummy_loading").innerHTML = "Updating detailed listing information, please wait";
		
		document.getElementById("create_listing_detailed_property_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();

		formData.append("listing_property_id",document.getElementById("listing_property_id").value);
		formData.append("create_listing_property_bedrooms",document.getElementById("create_listing_property_bedrooms").value);
		
		formData.append("create_listing_property_furnish_type",document.getElementById("create_listing_property_furnish_type").value);
		formData.append("create_listing_property_windows_type",document.getElementById("create_listing_property_windows_type").value);
		formData.append("create_listing_property_heating_type",document.getElementById("create_listing_property_heating_type").value);
		formData.append("create_listing_property_nearest_amenities",$('#create_listing_property_nearest_amenities').val());
		
		formData.append("create_listing_property_bathrooms",document.getElementById("create_listing_property_bathrooms").value);
		formData.append("create_listing_property_garage",document.getElementById("create_listing_property_garage").value);
		formData.append("create_listing_property_garage_size",document.getElementById("create_listing_property_garage_size").value);
		formData.append("create_listing_property_year_built",document.getElementById("create_listing_property_year_built").value);
		formData.append("create_listing_property_id_code",document.getElementById("create_listing_property_id_code").value);
		
		//Create an Array.
        var selected_amenities = new Array();

        //Reference the CheckBoxes and insert the checked CheckBox value in Array.
        $("#create_listing_detailed_property_form input[type=checkbox]:checked").each(function () {
            selected_amenities.push(this.value);
        });

        //Display the selected CheckBox values.
        if (selected_amenities.length > 0) {
            formData.append("create_listing_property_amenities",selected_amenities.join(","));
        }

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
		    _("create_listing_detailed_property_dummy_loading").innerHTML = ev.target.responseText;
		    _("create_listing_detailed_property_dummy_loading_text").innerHTML = "";
             //document.getElementById("create_listing_dummy_loading_text").style.display = "none";
             //document.getElementById("create_listing_dummy_loading").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("create_listing_detailed_property_status").innerHTML = "Detailed property creation failed";
		    document.getElementById("create_listing_detailed_property_dummy_loading").innerHTML = "Failed";
		    document.getElementById("create_listing_detailed_property_dummy_loading_text").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("create_listing_detailed_property_status").innerHTML = "Detailed property creation aborted";
             document.getElementById("create_listing_detailed_property_dummy_loading").innerHTML = "Cancelled";
             document.getElementById("create_listing_detailed_property_dummy_loading_text").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/create_detailed_listing.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}