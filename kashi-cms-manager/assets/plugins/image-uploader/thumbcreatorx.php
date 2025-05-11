<?php 
function cropImage($nw, $nh, $source, $stype, $dest) 
{
	list($width,$height)=@getimagesize($source);
	switch($stype) 
	{
        case 'gif':
        $src = imagecreatefromgif($source);
        break;
        case 'jpg':
        $src = imagecreatefromjpeg($source);
        break;
		case 'jpeg':
        $src = imagecreatefromjpeg($source);
        break;
        case 'png':
        $src = imagecreatefrompng($source);
        break;
    }
    
	if($nh!=0)
	{
		$tmp = imagecreatetruecolor($nw, $nh);
	// for changing background color to white otherwise it is black

 		$bg = imagecolorallocate ( $tmp, 255, 254, 241 );
		imagefill ( $tmp, 0, 0, $bg );
	
	////////////////////////////////////////////////////////////
		$wm  = $width/$nw;
		$hm  = $height/$nh;
	 
		$h_height = $nh/2;
		$w_height = $nw/2;
		if($width> $height)
		{
			$adjusted_width = $width / $hm;
			$half_width = $adjusted_width / 2;
			$int_width = $half_width - $w_height;
			imagecopyresampled($tmp,$src,-$int_width,0,0,0,$adjusted_width,$nh,$width,$height);
		}elseif(($width <$height) || ($width == $height)) {
			$adjusted_height = $height / $wm;
			$half_height = $adjusted_height / 2;
			$int_height = $half_height - $h_height;
			imagecopyresampled($tmp,$src,0,-$int_height,0,0,$nw,$adjusted_height,$width,$height);
		}
		else 
		{
			imagecopyresampled($tmp,$src,0,0,0,0,$nw,$nh,$width,$height);
		}
	}
	else
	{
		// this line actually does the image resizing, copying from the original
		// image into the $tmp image
		$newwidth = $nw;
		$newheight=($height/$width)*$newwidth;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		// for changing background color to white otherwise it is black

 		$bg = imagecolorallocate ( $tmp, 255, 254, 241 );
		imagefill ( $tmp, 0, 0, $bg );
	
	////////////////////////////////////////////////////////////
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	}
   
	switch($stype) 
	{
			case 'gif':
			imagegif($tmp,$dest,100);
			break;
			case 'jpg':
			imagejpeg($tmp,$dest,100);
			break;
			case 'jpeg':
			imagejpeg($tmp,$dest,100);
			break;
			case 'png':
			imagepng($tmp,$dest);
			break;
	}
	imagedestroy($src);
	imagedestroy($tmp);  
}
?>