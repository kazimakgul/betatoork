<?php 
$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$userid));
$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$userid)); 
$channelurl=$this->Html->url(array("controller" => $user['User']['seo_username'],"action" =>""));
$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$userid));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
?>

<div class="userpanel">
  <p><a href="<?php echo $channelurl ?>"><?php echo $username ?></a></p>
  <div class="useravatar">
    <!-- if facebook logedin 
      <fb:profile-pic uid="" size="small" width="100" height="200" linked="false"/> -->
    <!-- else -->
  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($user,'User.picture'); }
  ?>
   <!-- end -->
  </div>
  <div class="activity">Activity</div>
  <div class="panelsep"></div>
  <a class="added" href="<?php echo $channelurl ?>"><?php echo $gamenumber ?> games added</a>
  <a class="favorite" href="<?php echo $channelurl ?>"><?php echo $favoritenumber ?> games favorite</a>
  <a class="subscriber" href="<?php echo $folurl ?>"><?php echo $subscribeto ?> Followers</a>
  <a class="subscription" href="<?php echo $suburl ?>"><?php echo $subscribe ?> Subscriptions</a>
  <a class="played" href="<?php echo $playcounturl ?>"><?php echo $playcount ?> games played</a>
  <div class="panelsep"></div>
  <div class="clearfix">
		<a class="fb_link" href="<?php echo $user['User']['fb_link']?>" target="_blank" rel="nofollow"></a>
		<a class="twitter_link" href="<?php echo $user['User']['twitter_link']?>" target="_blank" rel="nofollow"></a>
		<a class="gplus_link" href="<?php echo $user['User']['gplus_link']?>" target="_blank" rel="nofollow"></a>
		<a class="website_link" href="<?php echo $user['User']['website']?>" target="_blank" rel="nofollow"></a>
  </div>

</div>
