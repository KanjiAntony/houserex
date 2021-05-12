//var richTextField = document.getElementById("richTextField").contentDocument;

/*============================================================ formatting document =============================================================*/

	function loadFormats()
	{
		richTextField.document.designMode = "On";
		//richTextField.document.execCommand("insertBrOnReturn",false,null);

	}

	function boldText()
	{
		richTextField.document.execCommand('bold',false,null);
		richTextField.document.focus();
	}

	function underlineText()
	{
		richTextField.document.execCommand('underline',false,null);
		richTextField.focus();
	}

	function italicsText()
	{
		richTextField.document.execCommand('italic',false,null);
		richTextField.focus();
	}

	function justifyLeft()
	{
		richTextField.document.execCommand('justifyLeft',false,null);
		richTextField.focus();
	}

	function justifyCenter()
	{
		richTextField.document.execCommand('justifyCenter',false,null);
		richTextField.focus();
	}

	function justifyRight()
	{
		richTextField.document.execCommand('justifyRight',false,null);
		richTextField.focus();
	}

	function numberedList()
	{
		richTextField.document.execCommand('insertOrderedList',false,null);
		richTextField.focus();
	}

	function dottedList()
	{
		richTextField.document.execCommand('insertUnorderedList',false,null);
		richTextField.focus();
	}

	function addIndent()
	{
		richTextField.document.execCommand('indent',false,null);
		richTextField.focus();
	}

	function outdent()
	{
		richTextField.document.execCommand('outdent',false,null);
		richTextField.focus();
	}
	
	function blogImage()
	{
	   // var imgWidth = prompt('Enter image height in %', '');
	  // var imgSrc = "C:\\Users\\Kanji\\Pictures\\bob.png";
           // if(imgSrc !== null){
               // richTextField.document.execCommand('insertimage', false, imgSrc); 
               // richTextField.focus();
            //}
       
      // if(imgWidth !== null){

          // console.log(imgWidth);
        var fileInput = document.getElementById('blog_image');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            
            if(!allowedExtensions.exec(filePath)){
                alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
                fileInput.value = '';
                return false;
            }else{
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {

                        //document.getElementById('imagePreview').innerHTML = '<img class="img-fluid" src="'+e.target.result+'"/>';
                        console.log(e.target.result);
                       // console.log(e.target.result.height);
                         //richTextField.document.execCommand('insertimage', false, e.target.result);
                         richTextField.document.execCommand('inserthtml', false, '<img class="img-fluid" width="100%" height="30%" src="'+e.target.result+'"/>');
                            richTextField.focus();
                           // '<img class="img-fluid" id="img_dyna" height="'+imgWidth+'%" src="'+e.target.result+'"/>'
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
                
         }
		
	}

//upload whole data

	(function() 

{

	var form = document.getElementById("upload_admin_pages_data");

	form.onsubmit = function(event) {
		
		event.preventDefault();
		
		document.getElementById("dummy_loading").innerHTML = "Uploading, please wait";
		
		document.getElementById("dummy_loading_text").innerHTML = "<div class='d-flex justify-content-center'><div class='spinner-border text-dark' role='status'></div></div>";

		//create new form-data object
		var formData = new FormData();

		formData.append("page_info",window.frames["richTextField"].document.body.innerHTML);
		formData.append("page_category",document.getElementById("page_category").value);

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
		   _("status").innerHTML = ev.target.responseText;
             document.getElementById("dummy_loading_text").style.display = "none";
             document.getElementById("dummy_loading").style.display = "none";
		});
		
		picRequest.addEventListener("error", function(ev) {
		    _("status").innerHTML = "Upload Failed";
		    document.getElementById("dummy_loading_text").innerHTML = "Failed";
		    document.getElementById("dummy_loading").style.display = "none";
		});
		
        picRequest.addEventListener("abort", function(ev) {
             _("status").innerHTML = "Upload Aborted";
             document.getElementById("dummy_loading_text").innerHTML = "Cancelled";
             document.getElementById("dummy_loading").style.display = "none";
        });

		//open connection
		picRequest.open("POST","assets/php/admin_pages_data.php",true);

		picRequest.send(formData);

	}

})();


function _(el) {
            return document.getElementById(el);
}