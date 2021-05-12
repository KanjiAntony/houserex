(function() 

{

	var form = document.getElementById("create_listing_form");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("create_listing_dummy_loading").innerHTML = "Creating listing, please wait";
		
		document.getElementById("create_listing_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();

		formData.append("create_listing_id",document.getElementById("create_listing_id").value);
		formData.append("create_listing_name",document.getElementById("create_listing_name").value);
		formData.append("create_listing_desc",$('#create_listing_desc').val());
		formData.append("create_listing_type",$('#create_listing_type').find(":selected").text());
		formData.append("create_listing_status",$('#create_listing_status').find(":selected").text());
		
		formData.append("create_listing_category",$('#create_listing_category').find(":selected").text());
		formData.append("create_listing_duration",$('#create_listing_duration').find(":selected").text());
		formData.append("create_listing_deposit",document.getElementById("create_listing_deposit").value);
		formData.append("create_listing_let_available_date",document.getElementById("create_listing_let_available_date").value);
		formData.append("create_listing_ownership_type",document.getElementById("create_listing_ownership_type").value);
		formData.append("create_listing_sale_type",document.getElementById("create_listing_sale_type").value);
		
		formData.append("create_listing_price",document.getElementById("create_listing_price").value);
		formData.append("create_listing_area",document.getElementById("create_listing_area").value);
		formData.append("create_listing_rooms",document.getElementById("create_listing_rooms").value);

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
		    _("create_listing_dummy_loading_text").innerHTML = ev.target.responseText;
		    _("create_listing_dummy_loading").innerHTML = "";
             //document.getElementById("create_listing_dummy_loading_text").style.display = "none";
             //document.getElementById("create_listing_dummy_loading").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("create_listing_status").innerHTML = "Property listing failed";
		    document.getElementById("create_listing_dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("create_listing_dummy_loading").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("create_listing_status").innerHTML = "Property listing aborted";
             document.getElementById("create_listing_dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("create_listing_dummy_loading").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/start_creating_listing.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}