(function() 

{

	var form = document.getElementById("update_profile_pic_form");
	
	var fileSelect = document.getElementById("image1");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("update_profile_pic_dummy_loading").innerHTML = "Updating profile pic, please wait";
		
		document.getElementById("update_profile_pic_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();
		
		//get files from the input
		var files = fileSelect.files;

		//create new form-data object
		var formData = new FormData();

		//get one file from the input
		var file_poster = files[0];

		// add file to the request
		formData.append("update_profile_pic_image",file_poster,file_poster.name);

		formData.append("update_profile_pic_user_id",document.getElementById("update_profile_pic_user_id").value);

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
		      

		      document.getElementById("image1").value = "";

		      _("update_profile_pic_dummy_loading").innerHTML = "";
		      _("update_profile_pic_dummy_loading_text").innerHTML = "Profile pic updated successfully.";
		  
		  } else {
		    _("update_profile_pic_dummy_loading_text").innerHTML = ev.target.responseText;
		    _("update_profile_pic_dummy_loading").innerHTML = "";
		  }
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("update_profile_pic_status").innerHTML = "Profile pic update failed";
		    document.getElementById("update_profile_pic_dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("update_profile_pic_dummy_loading").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("update_profile_pic_status").innerHTML = "Profile pic update aborted";
             document.getElementById("update_profile_pic_dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("update_profile_pic_dummy_loading").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/update_profile_pic.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}