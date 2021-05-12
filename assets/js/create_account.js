(function() 

{

	var form = document.getElementById("register_user");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("reg_dummy_loading").innerHTML = "Creating account, please wait";
		
		document.getElementById("reg_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();

		formData.append("user_reg_name",document.getElementById("user_reg_name").value);
		formData.append("user_reg_email",document.getElementById("user_reg_email").value);
		formData.append("user_reg_type",$('#user_reg_type').find(":selected").text());
		formData.append("user_reg_password",document.getElementById("user_reg_password").value);
		formData.append("user_reg_confirm_password",document.getElementById("user_reg_confirm_password").value);

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
		        window.location.href = "page-add-new-property.php";
		    } else {
		        _("reg_status").innerHTML = ev.target.responseText;
		    }
		   
             document.getElementById("reg_dummy_loading_text").style.display = "none";
             document.getElementById("reg_dummy_loading").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("reg_status").innerHTML = "Account creation failed";
		    document.getElementById("reg_dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("reg_dummy_loading").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("reg_status").innerHTML = "Account creation aborted";
             document.getElementById("reg_dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("reg_dummy_loading").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/create_account.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}