(function() 

{

	var form = document.getElementById("upload_epc_media_form");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("upload_epc_media_dummy_loading").innerHTML = "Uploading epc media, please wait";
		
		document.getElementById("upload_epc_media_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();
		
		var totalfiles = document.getElementById('P_epcImage').files.length;
           for (var index = 0; index < totalfiles; index++) {
              formData.append("P_epcImage[]", document.getElementById('P_epcImage').files[index]);
           }

        formData.append("upload_epc_media_id", document.getElementById('upload_epc_media_id').value);

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
		    

		        _("upload_epc_media_status").innerHTML = ev.target.responseText;
		        _("upload_epc_media_dummy_loading_text").innerHTML = "";
             //document.getElementById("upload_epc_media_dummy_loading_text").style.display = "none";
             document.getElementById("upload_epc_media_dummy_loading").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("upload_epc_media_status").innerHTML = "EPC upload failed";
		    document.getElementById("upload_epc_media_dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("upload_epc_media_dummy_loading").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("upload_epc_media_status").innerHTML = "EPC upload aborted";
             document.getElementById("upload_epc_media_dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("upload_epc_media_dummy_loading").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/upload_epc_media.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}