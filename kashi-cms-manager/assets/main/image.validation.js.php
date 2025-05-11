<script type="text/javascript">
var _URL = window.URL;
$("#user_profile_pic").change(function() 
{
    var val = $(this).val();
	//var fileExtension = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	var fileExtension=$('#user_profile_pic').val().replace(/^.*\./, '');
	
	if ((fileExtension == "jpg")||(fileExtension == "jpeg")||(fileExtension == "bmp")||(fileExtension == "gif")||(fileExtension == "JPEG")||(fileExtension == "JPG")||(fileExtension == "png")) 
	{
		 var fileUpload = document.getElementById("user_profile_pic");
         if (typeof (fileUpload.files) != "undefined") 
		 {
			 //var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
			 //alert(size + " KB.");
			 var size=$('#user_profile_pic')[0].files[0].size;
			 if (size < 1000000)
			 {
				 //alert(size + " KB.");
				 var file, img;
				 if((file = this.files[0]))
				 {
					 img = new Image();
					 img.onload = function()
					 {
						 var height = this.height;
                 		 var width = this.width;
				 		 if (height > 300 || width > 300) 
				 		 {
							 $(this).val('');
                      		 alert("Height and Width must not exceed 100px.");
                      		 //return false;
                 		 }
				 		 else
				 		 {
                      		 //alert("Uploaded image has valid Height and Width.");
                      		 return true;
				 		 }
					 };
					 img.src = _URL.createObjectURL(file);
				 }
			 }
			 else 
		 	 {
				 $(this).val('');
             	 alert("image under 5MB are accepted for upload");
         	 }    
         } 
		 else 
		 {
			 $(this).val('');
             alert("This browser does not support HTML5.");
         }
		//alert("an image");
	}
	else
	{
		$(this).val('');
		alert("not an image");
	}
}); 
</script>