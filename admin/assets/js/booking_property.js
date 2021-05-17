(function() 

{

	var form = document.getElementById("booking_form");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("booking_dummy_loading").innerHTML = "Requesting review, please wait";
		
		document.getElementById("booking_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();

		formData.append("booking_name",document.getElementById("booking_name").value);
		formData.append("p_id",document.getElementById("p_id").value);
		formData.append("p_owner_id",document.getElementById("p_owner_id").value);
		formData.append("booking_phone",document.getElementById("booking_phone").value);
		formData.append("booking_email",document.getElementById("booking_email").value);
		formData.append("booking_message",$('#booking_message').val());

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
		    

		        _("booking_status").innerHTML = ev.target.responseText;
             document.getElementById("booking_dummy_loading_text").style.display = "none";
             document.getElementById("booking_dummy_loading").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("booking_status").innerHTML = "Requesting review failed";
		    document.getElementById("booking_dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("booking_dummy_loading").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("booking_status").innerHTML = "Requesting review aborted";
             document.getElementById("booking_dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("booking_dummy_loading").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/booking_property.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}