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

   echo '<object id="UnityObject" type="application/vnd.unity" classid="clsid:444785F1-DE89-4295-863A-D46C3A781394" width="'.$width.'" height="'.$height.'" codebase="http://webplayer.unity3d.com/download_webplayer/UnityWebPlayer.cab#version=2,0,0,0"> <param name="src" value="'.$link.'" /> <param name="logoimage" value="http://www.gamonaut.com/wp-content/themes/gamonaut.com/images/gamonaut.com.png"> <param name="backgroundcolor" value="000000"> <param name="bordercolor" value="000000"> <embed id="UnityEmbed" src="'.$link.'" width="'.$width.'" height="'.$height.'" backgroundcolor="000000" bordercolor="000000" logoimage="http://www.gamonaut.com/wp-content/themes/gamonaut.com/images/gamonaut.com.png" type="application/vnd.unity" pluginspage="http://www.unity3d.com/unity-web-player-2.x" /> </object>';

   }else{

   echo '<iframe src="'.$link.'" width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no"></iframe>';

   }

}   


?>
