<?php if($followers==NULL){ echo "<div class='elusive-plus-sign color-green media well shadow span6' style='background-color:white;'> You have't followed any channels yet.</div>";} ?>

<?php foreach ($followers as $follower): ?>
<?php 
$followid = $follower['Subscription']['subscriber_to_id'];
$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
$channelurl=$this->Html->url(array("controller" => $card[7],"action" =>"")); 
$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$followid));
$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$followid));
$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$followid));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
?>



<?php 
if($card[6]['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($card[6]['User']['seo_username']),"action" =>'')); 
}
else
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$followid));

?>	

<?php
$facebook=$card[6]['User']['fb_link'];
$twitter=$card[6]['User']['twitter_link'];
$gplus=$card[6]['User']['gplus_link'];
$website=$card[6]['User']['website'];
if($facebook==NULL){
  
}else{
  $facebook = "<a class='fb_link' href='$facebook' target='_blank' rel='nofollow'></a>";
}
if($twitter==NULL){
  
}else{
  $twitter = "<a class='twitter_link' href='$twitter' target='_blank' rel='nofollow'></a>";
}
if($gplus==NULL){
  
}else{
  $gplus = "<a class='gplus_link' href='$gplus' target='_blank' rel='nofollow'></a>";
}
if($website==NULL){
  
}else{
  $website = "<a class='website_link' href='$website' target='_blank' rel='nofollow'></a>";
}
?>

 <!----Declare Channel Name For JavaScript Usage---->
  <!----=========================================---->
  <script>
  <?php if($this->Session->check('Auth.User') == 1){ ?>
  user_auth=1;
  <?php }else{?>
  user_auth=0;
  <?php }?>
  
  </script>
  <!----=========================================---->


<div class="row-fluid span4" style="margin:0px 7px 0px 7px;">
    <div class="navbar"><div class="navbar-inner"  style="padding:5px 15px 5px 5px;">
      <div class="header-control" style="margin:0px -10px 0px 0px;">
        <button onclick="subscribeout('<?php echo $card[0]; ?>',user_auth,<?php echo $followid; ?>); _gaq.push(['_trackEvent', 'Channel', 'unFollow', '<?php echo $card[0] ?>']);"  rel="tooltip" data-placement="top" data-original-title="UnFollow" data-box="close" data-hide="fadeOut" class="close" >×</button> 
      </div>
    <a class="span4" href="<?php echo $profileurl ?>" style="margin:0px 20px 0px 0px;">
            <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("class"=>"img-polaroid img-rounded","alt" => "toork avatar image",'width'=>'72','style'=>'height:96px;')); 
                } else {
                  echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('width'=>'72','style'=>'height:96px;',"class"=>"img-polaroid img-rounded",'onerror'=>'imgError(this,"avatar");'));  }
            ?>
    </a>
    
    <div class="span7" style="margin:-10px 10px 0px -25px;">
        

<ul style="padding-left:0px; list-style:none" class="nav-list">
  <li ><h5><a class="btn" href="<?php echo $profileurl ?>"><?php echo $card[0] ?></a></h5></li>
  <li><i class="elusive-group color-green"></i> <?php echo $card[4] ?> Followers</a></li>
  <li><i class="elusive-group color-blue"></i> <?php echo $card[3] ?> Following</a></li>
  <li><i class="elusive-star-alt color-red"></i> <?php echo $card[1] ?> Games</a></li>
</ul>
                    
                    
                    
                    <!-- <?php echo $follower['Userstat']['potential']; ?> -->

    </div>


</div>
</div>

</div>


			
 <?php endforeach; ?>