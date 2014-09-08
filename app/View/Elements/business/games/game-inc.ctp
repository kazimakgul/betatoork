<?php 
//Max Game Width:900px
$type=$game['Game']['type'];
$width=$game['Game']['width'];
$height=$game['Game']['height'];
$link=$game['Game']['link'];
?>

<?php 

if($game['Game']['embed']!=NULL)
{
  echo $game['Game']['embed']; 
}else{//if it is not embed

   if($game['Game']['type']=='swf')
   {

   echo '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'.$width.'" height="'.$height.'" id="ieID"> <param name="movie" value="'.$link.'" /> <!--[if !IE]>--> <object type="application/x-shockwave-flash" data="'.$link.'" width="'.$width.'" height="'.$height.'" id="eID"> <!--<![endif]--> <!--[if !IE]>--> </object> <!--<![endif]--> </object>';

   }else if($game['Game']['type']=='unity3d'){

   echo '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'.$width.'" height="'.$height.'" id="ieID"> <param name="movie" value="'.$link.'" /> <!--[if !IE]>--> <object type="application/x-shockwave-flash" data="'.$link.'" width="'.$width.'" height="'.$height.'" id="eID"> <!--<![endif]--> <!--[if !IE]>--> </object> <!--<![endif]--> </object>';

   }else{

   echo '<iframe src="'.$link.'" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no"></iframe>';

   }

}   


?>
