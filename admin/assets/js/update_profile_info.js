(function() 

{

	var form = document.getElementById("update_profile_info_form");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("update_profile_info_dummy_loading").innerHTML = "Profile information updating, please wait";
		
		document.getElementById("update_profile_info_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();

		formData.append("update_profile_info_name",document.getElementById("update_profile_info_name").value);
		formData.append("update_profile_info_email",document.getElementById("update_profile_info_email").value);
		formData.append("update_profile_info_usertype",$('#update_profile_info_usertype').find(":selected").text());
		formData.append("update_profile_info_phone",document.getElementById("update_profile_info_phone").value);
		formData.append("update_profile_info_user_id",document.getElementById("update_profile_info_user_id").value);
		formData.append("update_profile_info_desc",$('#update_profile_info_desc').val());

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
		    

		        _("update_profile_info_status").innerHTML = ev.target.responseText;

             document.getElementById("update_profile_info_dummy_loading_text").style.display = "none";
             document.getElementById("update_profile_info_dummy_loading").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("update_profile_info_status").innerHTML = "Profile information update failed";
		    document.getElementById("update_profile_info_dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("update_profile_info_dummy_loading").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("update_profile_info_status").innerHTML = "Profile information update aborted";
             document.getElementById("update_profile_info_dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("update_profile_info_dummy_loading").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/update_profile_info.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}