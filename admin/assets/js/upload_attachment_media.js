(function() 

{

	var form = document.getElementById("upload_attachment_media_form");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("upload_attachment_media_dummy_loading").innerHTML = "Uploading attachment media, please wait";
		
		document.getElementById("upload_attachment_media_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();
		
		var totalfiles = document.getElementById('PAttachment').files.length;
           for (var index = 0; index < totalfiles; index++) {
              formData.append("PAttachment[]", document.getElementById('PAttachment').files[index]);
           }

        formData.append("upload_attachment_media_id", document.getElementById('upload_attachment_media_id').value);

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
			
			
		// Upload progress on request.upload
        picRequest.upload.onprogress = function(ev) {
            _("upload_attachment_progress_bar").style.display = "block";
        	        var size;
                    var total_size;
                    var unit;
                    
                    if(ev.loaded < 1000) {
                        size = ev.loaded;
                        total_size = ev.total;
                        unit = "Bytes";
                    } else if(ev.loaded >= 1000 && ev.loaded <1000000) {
                        size = ev.loaded * 0.001;
                        total_size = ev.total * 0.001;
                        unit = "KB";
                    } else {
                        size = ev.loaded * 0.000001;
                        total_size = ev.total * 0.000001;
                        unit = "MB";
                    }
                    
                    
                    _("upload_attachment_loaded_total").innerHTML = Math.round(size) + " " + unit +" of " + Math.round(total_size);
                    var percent = (ev.loaded / ev.total) * 100;
                    _("upload_attachment_progress_bar").value = Math.round(percent);
                    _("upload_attachment_media_status").innerHTML = Math.round(percent) + "% done...";

        };	

	//	picRequest.upload.addEventListener("progress", progressHandler, false);
		picRequest.addEventListener("load", function(ev) {
		    
                _("upload_attachment_progress_bar").value = 0;
		        _("upload_attachment_media_status").innerHTML = ev.target.responseText;
		        _("upload_attachment_media_dummy_loading_text").innerHTML = "";
             //document.getElementById("upload_attachment_media_dummy_loading_text").style.display = "none";
             document.getElementById("upload_attachment_media_dummy_loading").style.display = "none";
             _("upload_attachment_progress_bar").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("upload_attachment_media_status").innerHTML = "Video upload failed";
		    document.getElementById("upload_attachment_media_dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("upload_attachment_media_dummy_loading").style.display = "none";
		    _("upload_attachment_progress_bar").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("upload_attachment_media_status").innerHTML = "Video upload aborted";
             document.getElementById("upload_attachment_media_dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("upload_attachment_media_dummy_loading").style.display = "none";
             _("upload_attachment_progress_bar").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/upload_attachment_media.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}