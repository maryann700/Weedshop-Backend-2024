<?php
function img($field='image', $width=null, $height=null, $crop=false, $alt=null, $turl=null)
{
    global $editormode;
    $val = $field;

    if (!$val)
      	return null;
    $alt = ($alt) ? $alt : stem(basename($val));
    
	if($width==null && $height==null)
		$imgf = get_dir().$val;
	else
		$imgf = gen_img($val,$width, $height, $crop);
    
	if (!$imgf)
      	return "";
    $url = UPLOADROOT . str_replace(UPLOADROOT,'',$imgf);
	
    if (! $turl)
      	return  "<img src='$url' alt='$alt'/>\n";
    else
      	return "<a href='$turl'><img src='$url' alt='$alt'/></a>";
}
function gen_img($fileval,$width, $height, $crop)
{
  	if (!$fileval)
    	return null;
  	$fname = get_dir() . $fileval;
	
	if (! is_readable($fname))
    	return null;
	
	$stem = stem(basename($fname));
	
	if ($width != null && $height != null)
    {
      	$sz = getimagesize($fname);
		if ($sz[0] == $width && $sz[1] == $height) {
        	return  substr($fname, strlen(UPLOADROOT));
    }
    $sep = ($crop) ? '__' : '_';
    
	$outname = thumb_dir($fname) . $stem . $sep . $width . "x" . $height . "." . suffix($fname);

	if (! is_readable($outname) || filemtime($outname) < filemtime($fname))
        createthumb($fname, $outname, $width, $height, $crop);
    }
	else if ($width != null && $height == null)
    {
      	$outname = thumb_dir($fname) . $stem . "_" . $width . "." . suffix($fname);
      	if (! is_readable($outname) || filemtime($outname) < filemtime($fname))
        	createthumb($fname, $outname, $width,$crop);
    }
  	else
    	$outname = $fname;
	//echo $outname; die();
  	return  $outname;
	
}
function get_dir($art=null)
{
  	return UPLOADROOT . "upload/";
}
function stem($fname)
{
	if (!$fname)
    	return "";
  	$pos = strrpos($fname, ".");
	$name = ($pos === false) ? $fname : substr($fname,0,$pos);
	return $name;
}
function thumb_dir($path)
{
  	$enddir = strrpos($path, "/");
  	$dir =  substr($path,0,$enddir) . "/.thumbnails/";
  	if (!file_exists($dir))
    	mkdir($dir,0777,true);
  	return $dir;
}
function createthumb($source,$dest,$new_w,$new_h=null, $crop=false)
{
	if (!file_exists($source))
    	return null;
  	
  	$src_img = 0;
  	$src_img = image_create($source);
	$old_w=imageSX($src_img);
  	$old_h=imageSY($src_img);
  	$x = $y = 0;
	
  	if ($new_h == null) // we want a square thumb, cropped if necessary
    {
      	if ($old_w> $old_h)
        {
          	$x = ceil(($old_w - $old_h) / 2 );
          	$old_w = $old_h;
        }
      	else if($old_h> $old_w)
        {
          	$y = ceil(($old_h - $old_w) / 2);
          	$old_h = $old_w;
        }
      	$thumb_w = $thumb_h = $new_w;
    }
  	else if ($crop)
    {
		$thumb_w = $new_w;
      	$thumb_h = $new_h;
      	$oar = $old_w/$old_h;
      	$nar = $new_w/$new_h;
      	if ($oar < $nar)
        {
          	$y = ($old_h - $old_h * $oar/$nar)/2;
          	$old_h = ($old_h * $oar/$nar);
        }
      	else
        {
          	$x = ($old_w - $old_w * $nar/$oar)/2;
          	$old_w = ($old_w * $nar/$oar);
        }
    }
  	else if ($new_w * $old_h / $old_w <= $new_h) // retain aspect ratio, limit by new_w
    {
      	$thumb_h = $new_w * $old_h / $old_w;
      	$thumb_w = $new_w;
    }
  	else // retain aspect ratio, limit by new_h
    {
      	$thumb_w = $new_h * $old_w / $old_h;
      	$thumb_h = $new_h;
    }

  	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	
  	imagecolortransparent($dst_img, imagecolorallocatealpha($dst_img, 0, 0, 0, 127));
  	imagealphablending($dst_img, false);
  	imagesavealpha($dst_img, true);

  	imagecopyresampled($dst_img,$src_img,0,0,$x,$y,$thumb_w,$thumb_h,$old_w,$old_h); 

  	image_save($dst_img,$dest); 

  	imagedestroy($dst_img); 
  	imagedestroy($src_img); 
}
function suffix($fname)
{
  	$pos = strrpos($fname, ".");
  	return ($pos === false) ? null : substr($fname,$pos+1);
}
function image_create($source)
{
	$suf = strtolower(suffix($source));
  	if ($source == '.jpg') 
    	mylog("wtf", "source: $source",true);
  	if ($suf == "png")
    	return imagecreatefrompng($source);
  	else if ($suf=="jpg")
    	return imagecreatefromjpeg($source);
  	else if ($suf == "gif")
    	return imagecreatefromgif($source);
  	return null;
}

function image_save($dst_img,$dest)
{
  	$suf = strtolower(suffix($dest));
  	if ($suf == "png")
    	imagepng($dst_img,$dest); 
  	else if ($suf == "jpg" || $suf == "jpeg")
    	imagejpeg($dst_img,$dest);
  	else if ($suf == "gif")
    	imagegif($dst_img,$dest);
}
function delImg($fname){
	/*$data = explode('/',$fname);
	$dir = $data[0]."/";
	unlink(get_dir() . $dir . $data[1]);
	$filename = stem($data[1]);
	$files = glob( get_dir() . $dir .".thumbnails/" . '*' , GLOB_MARK );
    foreach( $files as $file ){
        if( preg_match( '/'.$filename.'/', $file ) )
            unlink( $file );
    }*/
	$data = explode('/',$fname);
	$data2 = explode(end($data),$fname);
	$dir = $data2[0];
	unlink(get_dir() . $dir . end($data));
	$filename = stem(end($data));
	$files = glob( get_dir() . $dir .".thumbnails/" . '*' , GLOB_MARK );
    foreach( $files as $file ){
        if( preg_match( '/'.$filename.'/', $file ) )
            unlink( $file );
    }
}
?>