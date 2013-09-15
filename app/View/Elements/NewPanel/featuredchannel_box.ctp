<?php 

$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
foreach ($users as $follower): 
$publicuser = $follower;

$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
$followerNumber = $publicuser['Userstat']['subscribeto']; 
$gameNumber = $publicuser['Userstat']['uploadcount'];
$favoriteNumber = $publicuser['Userstat']['favoritecount']; 
$publicname = $publicuser['User']['username'];
$userid = $publicuser['User']['id']; 

?>
<?php 
$followid = $follower['User']['id'];
if($follower['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($follower['User']['seo_username']),"action" =>'')); 
}
else{
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$followid));
}

$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
?>

<?php if($publicuser['User']['banner']==null) { ?>
<div class="well well-small shadow-black" style=" padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* FF 3.6+ */  
">
<?php } else { ?>
<div class="well well-small shadow-black" style=" padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>); /* FF 3.6+ */  
">
<?php } ?>
<div class="row-fluid">
    <div class="span12">
       <!-- <p class="pull-right badge" style="font-family: 'Merriweather Sans', sans-serif; font-size: 20px; color:white; text-shadow: 1px 1px black;">Worth: $3.12</p> -->       
        <div class="thumbnails">
            <a href="<?php echo $profileurl; ?>">
                    <?php 
                    $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                      if($publicuser['User']['picture']==null) { 
                        echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'img-polaroid','width'=>'90',"alt" => "toork avatar image")); 
                        } else {
                          echo $this->Upload->image($publicuser,'User.picture',array(),array('class'=>'img-polaroid','width'=>'90','onerror'=>'imgError(this,"avatar");'));  }
                    ?>
            </a>
<ul class="thumbnails pull-right">
  
<?php
//Get 3 Games into variable
$games3=$this->requestAction( array('controller' => 'games', 'action' => 'get_3_games',$follower['User']['id'])); 
foreach ($games3 as $oneof3):
//--------Setting Up of Play Url----------
if($oneof3['Game']['seo_url']!=NULL)
{
      if($oneof3['Game']['embed']!=NULL)
      $playurl=$this->Html->url(array( "controller" => h($oneof3['User']['seo_username']),"action" =>h($oneof3['Game']['seo_url']),'playgame'));
    else
    $playurl=$this->Html->url(array( "controller" => h($oneof3['User']['seo_username']),"action" =>h($oneof3['Game']['seo_url']),'playframe'));
}
else{
       $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($oneof3['Game']['id'])));
}
//-------/Setting Up of Play Url----------
?>
  <?php $gameName = $oneof3['Game']['name'];?>
  <li style="margin:0px 0px 0px 5px;">
    <div rel="tooltip" data-placement="bottom" data-original-title="<?php echo $gameName; ?>" >
  <a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($oneof3,'Game.picture',array('style' => 'toorksize'),array('width'=>'130px','height'=>'72px','style'=>'max-height:72px','alt'=>$gameName,'class'=>'img-polaroid','onerror'=>'imgError(this,"toorksize");')); ?></a>
   </div>
  </li>  
 
<?php endforeach; ?>
  
  
  
</ul>

          
        </div>
<?php
$website=$publicuser['User']['website'];
?>   
        <h4 style="margin-bottom:2px; font-family: 'Merriweather Sans', sans-serif; font-size: 20px; color:white; text-shadow: 1px 1px black;"> <a href="<?php echo $profileurl; ?>"><?php echo $publicname?></a></h4>
      
<?php
if($website==NULL){


}else{
                    echo "<a target='_blank' rel='nofollow' class='btn btn-link' href='$website' style='padding:0px; font-family: Merriweather Sans, sans-serif; font-size: 12px; color:white; text-shadow: 1px 1px black;'>$website</a>";
}
?>
        <div class="row-fluid">
            <div class="span2">
                <a class="btn btn-block btn-success" id="follow_button" style="margin-top:5px;"  onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);">
                  <i class="elusive-plus-sign"></i> Follow
                </a> 
                <a class="btn btn-block" id="unFollow_button" style="display:none;" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'unFollow', '<?php echo $publicname?>']);">
                  <i class="elusive-remove-circle"></i> Unfollow
                </a> 
            </div> 
                <div class="span7"><p style="font-family: 'Merriweather Sans', sans-serif; font-size: 15px; color:white; text-shadow: 1px 1px black; margin-top:7px;">
                    <i class="helper-font-24 elusive-group color-blue"></i> <?php echo $followerNumber; ?> Followers 
                    <i class="helper-font-24 elusive-star-alt color-red"></i> <?php echo $gameNumber; ?> Games
                </p>
                </div>

                <div class="pull-right" style="margin-top:8px;">

<?php
$facebook=$publicuser['User']['fb_link'];
$twitter=$publicuser['User']['twitter_link'];
$gplus=$publicuser['User']['gplus_link'];
if($website==NULL){
                    echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-globe helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='$website' href='$website' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-globe color-red helper-font-24'></i>
                    </a>";
}
if($facebook==NULL){
                   echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-facebook helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                   echo "<a rel='tooltip' data-placement='bottom' data-original-title='Facebook Page' href='$facebook' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-facebook color-blue helper-font-24'></i>
                    </a>";
}
if($gplus==NULL){
                    echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-googleplus helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='Google+ Page' href='$gplus' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-googleplus color-red helper-font-24'></i>
                    </a>";
}
if($twitter==NULL){
                    echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-twitter helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='Twitter Page' href='$twitter' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-twitter color-blue helper-font-24'></i>
                    </a>";
}
?>


            </div>

        </div>
    </div>

</div>    
    


</div>

					
 <?php endforeach; ?>