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
		//||($ext == "bmp")||($ext == "gif")||($ext == "docx") ||($ext == "doc") ||($ext == "pdf")
 		if (($ext == "jpg")||($ext == "jpeg")||($ext == "JPEG")||($ext == "JPG")||($ext == "png")||($ext == "webp")  &&($_FILES[$uploder_name]["size"] < 1000000)) 
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
					$co=" A problem occurred during file upload!";	 
				}
 			} 
			else 
			{
 				$co=" File ".$_FILES[$uploder_name]["name"]." already exists";
 			} 
 		} 
		else 
		{
 			$co="  Only .jpg/.gif/.png images under 5MB are accepted for upload";
 		}
 	} 
	else 
	{
 		$co= "<span style='color:red; font-size:14px;'>Error: No file uploaded</span>";
 	}
}
function uploadmaster_name($folder_name,$uploder_name,$finame)
{
 global $img_name;
 global $bn_ext;
 global $co;

 if (!file_exists($folder_name))
 {
  mkdir($folder_name, 0777, true);
 }
 //$finame='';
 $abcd=0;
 if((!empty($_FILES[$uploder_name])) && ($_FILES[$uploder_name]['error'] == 0))
 {
  $filename = strtolower(basename($_FILES[$uploder_name]['name']));
  $ext = substr($filename, strrpos($filename, '.') + 1);
  $bn_ext=$ext;
  if (($ext == "jpg")||($ext == "jpeg")||($ext == "bmp")||($ext == "gif")||($ext == "JPEG")||($ext == "JPG")||($ext
    == "png")||($ext == "webp")||($ext == "docx") ||($ext == "doc") ||($ext == "pdf")  &&
   ($_FILES[$uploder_name]["size"] < 1000000))
  {
   /*$nam=time().rand(0,10000);
   $name=$nam.".";*/
   $img_name=$finame.".".$ext;
   $img_upload = $folder_name.$img_name;
   if (!file_exists($img_name))
   {
    if ((move_uploaded_file($_FILES[$uploder_name]['tmp_name'],$img_upload)))
    {
    }
    else
    {
     $co=" A problem occurred during file upload!";
    }
   }
   else
   {
    $co=" File ".$_FILES[$uploder_name]["name"]." already exists";
   }
  }
  else
  {
   $co="  Only .jpg/.gif/.png images under 5MB are accepted for upload";
  }
 }
 else
 {
  $co= "<span style='color:red; font-size:14px;'>Error: No file uploaded</span>";
 }
}
function upload_doc($folder_name,$uploder_name,$finame)
{
 if (!file_exists($folder_name))
 {
  mkdir($folder_name, 0777, true);
 }
 global $img_name;
 global $bn_ext;
 global $co;
 //$finame='';
 $abcd=0;
 if((!empty($_FILES[$uploder_name])) && ($_FILES[$uploder_name]['error'] == 0))
 {
  $filename = strtolower(basename($_FILES[$uploder_name]['name']));
  $ext = substr($filename, strrpos($filename, '.') + 1);
  $bn_ext=$ext;
  if (($ext == "docx") ||($ext == "doc") ||($ext == "pdf")||($ext == "xls")||($ext == "xlsx")  &&($_FILES[$uploder_name]["size"] < 1000000))
  {
   /*$nam=time().rand(0,10000);
   $name=$nam.".";*/
   $img_name=$finame.".".$ext;
   $img_upload = $folder_name.$img_name;
   if (!file_exists($img_name))
   {
    if ((move_uploaded_file($_FILES[$uploder_name]['tmp_name'],$img_upload)))
    {
    }
    else
    {
     $co=" A problem occurred during file upload!";
    }
   }
   else
   {
    $co=" File ".$_FILES[$uploder_name]["name"]." already exists";
   }
  }
  else
  {
   $co="  Only .jpg/.gif/.png images under 5MB are accepted for upload";
  }
 }
 else
 {
  $co= "<span style='color:red; font-size:14px;'>Error: No file uploaded</span>";
 }
}
?>