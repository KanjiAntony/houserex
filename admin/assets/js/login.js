(function() 

{

	var form = document.getElementById("login_user");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("login_dummy_loading").innerHTML = "Accessing admin, please wait";
		
		document.getElementById("login_dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();

		formData.append("user_login_email",document.getElementById("user_login_email").value);
		formData.append("user_login_password",document.getElementById("user_login_password").value);

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
		        window.location.href = "index.php";
		    } else {
		        _("login_status").innerHTML = ev.target.responseText;
		    }
		   
             document.getElementById("login_dummy_loading_text").style.display = "none";
             document.getElementById("login_dummy_loading").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("login_status").innerHTML = "Login failed";
		    document.getElementById("login_dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("login_dummy_loading").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("login_status").innerHTML = "Login aborted";
             document.getElementById("login_dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("login_dummy_loading").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/login.php",true);


		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}