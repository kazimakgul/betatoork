<?php 
//Max Game Width:900px
$type=$game['Game']['type'];
$width=$game['Game']['width'];
$height=$game['Game']['height'];
$link=$game['Game']['link'];
?>

<div class='game_box' style="margin:0 auto; text-align: center; font-family:Verdana, Geneva, sans-serif; color:#000; font-size:5px;">
<?php 
if($game['Game']['embed']==NULL)
{
  echo $game['Game']['embed']; 
}elseif($game['Game']['type']=='swf'){

echo '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'.$width.'" height="'.$height.'" id="ieID"> <param name="movie" value="'.$link.'" /> <!--[if !IE]>--> <object type="application/x-shockwave-flash" data="'.$link.'" width="'.$width.'" height="'.$height.'" id="eID"> <!--<![endif]--> <!--[if !IE]>--> </object> <!--<![endif]--> </object>';

}
?>
</div>