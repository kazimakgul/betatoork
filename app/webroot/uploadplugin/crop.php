<?php

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


  $targ_w = $targ_h = 150;
  $jpeg_quality = 90;

  $src = '../upload/users/'.$_POST['id'].'/'.$_POST['name'];
  $img_r = imagecreatefromjpeg($src);
  $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

  imagecopyresampled($dst_r,$img_r,0,0,466,158,
  $targ_w,$targ_h,301,301);

  //header('Content-type: image/jpeg');
  imagejpeg($dst_r,$src,$jpeg_quality);

  exit;

