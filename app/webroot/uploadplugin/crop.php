<?php

class imagetools{

    public function getProperties($src)
	{
		$sizes = getimagesize($src);
		$imgtypes = array('1'=>'gif', '2'=>'jpg', '3'=>'png', '4'=>'png');
		return array("w"=>$sizes[0],"h"=>$sizes[1], 'type'=>$imgtypes[$sizes[2]], 'mime'=>$sizes['mime']);
	}
	
	 public function crop($src,$x,$y,$w,$h,$targ_w=150,$targ_h=150,$quality=100)
	{
		$imageinfo = $this->getProperties($src);
		
		switch($imageinfo['type']){
			//crop jpg
			case 'jpg':
			//process begins
			 $img_r = imagecreatefromjpeg($src);
             $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
             imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$w,$h);
             imagejpeg($dst_r,$src,$quality);
             exit;
			 //process ends
				break;
			//crop png
			case 'png':
				$quality = ceil($quality / 10); // for png quality is compression, 0-9, 9 full compression
				$quality = ($quality == 0)? 9 : (($quality - 1) % 9);
				
				$src_img=imagecreatefrompng($src);			
				$dst_img=ImageCreateTrueColor($targ_w,$targ_h);
				imagealphablending($dst_img, false);
				imagecopyresampled($dst_img,$src_img,0,0,$x,$y,$targ_w,$targ_h,$w,$h);
				imagesavealpha($dst_img, true);
				imagepng($dst_img,$src,$quality); 
				break;
			//crop gif
			case 'gif':
			//process begins
			$src_img=imagecreatefromgif($src);
			$dst_img=ImageCreateTrueColor($targ_w,$targ_h);
			imagecopyresampled($dst_img,$src_img,0,0,$x,$y,$targ_w,$targ_h,$w,$h);
			imagegif($dst_img,$src); //no quality option available
			//process ends	
				break;
		}//end of switch
		
	}

}

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

echo 'okey';
echo $_POST['uploadtype'].'<br>';
echo $_POST['name'].'<br>';
echo $_POST['id'].'<br>';
echo $_POST['x'].'<br>';
echo $_POST['y'].'<br>';
echo $_POST['w'].'<br>';
echo $_POST['h'].'<br>';
echo 'w_size:'.$_POST['w_size'].'<br>';
echo 'h_size:'.$_POST['h_size'].'<br>';

  $it = new imagetools();
  if($_POST['uploadtype']=='avatar_image' || $_POST['uploadtype']=='cover_image')
  $src = '../upload/users/'.$_POST['id'].'/'.$_POST['name'];
  if($_POST['uploadtype']=='game_image')
  $src = '../upload/games/'.$_POST['id'].'/'.$_POST['name'];
  if($_POST['uploadtype']=='new_game')
  $src = '../upload/temporary/'.$_POST['id'].'/'.$_POST['name'];
  
  $imageinfo=$it->crop($src,$_POST['x'],$_POST['y'],$_POST['w'],$_POST['h'],$_POST['w_size'],$_POST['h_size']);
  
  
  

