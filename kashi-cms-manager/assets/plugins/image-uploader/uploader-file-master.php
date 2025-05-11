<?php
function uploadmaster($folder_name,$uploder_name)
{
	global $finame;
	global $bn_ext;
	global $co;
	$finame='';
	$abcd=0;
	if((!empty($_FILES[$uploder_name])) && ($_FILES[$uploder_name]['error'] == 0))
	{
		$filename = strtolower(basename($_FILES[$uploder_name]['name']));
 		$ext = substr($filename, strrpos($filename, '.') + 1);
		$bn_ext=$ext;
 		if (($_FILES[$uploder_name]["size"] < 1000000) && (($ext == "jpg")||($ext == "jpeg")||($ext == "bmp")||($ext == "gif")||($ext == "JPEG")||($ext == "JPG")||($ext == "png"))) 
		{
			$nam=time().rand(0,10000);
			$name=$nam.".";
			$finame=$name.$ext;
			$newname = $folder_name.$name.$ext;
			if (!file_exists($newname)) 
			{
				if ((move_uploaded_file($_FILES[$uploder_name]['tmp_name'],$newname))) 
				{
 				} 
				else 
				{ 
					$_SESSION['err_msg']=" A problem occurred during file upload!";	 
				}
 			} 
			else 
			{
 				$_SESSION['err_msg']=" File ".$_FILES[$uploder_name]["name"]." already exists";
 			} 
 		} 
		else 
		{
 			$_SESSION['err_msg']="  Only .jpg/.gif/.png images under 5MB are accepted for upload";
 		}
 	} 
	else 
	{
 		$_SESSION['err_msg']= "<span style='color:red; font-size:14px;'>Error: No file uploaded</span>";
 	}
}
?>