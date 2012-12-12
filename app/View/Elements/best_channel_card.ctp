

<?php 
foreach ($users as $follower): ?>
<?php 
$followid = $follower['User']['id'];
//$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
$channelurl=$this->Html->url(array("controller" => $follower['User']['seo_username'],"action" =>"")); 
$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$followid));
$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$followid));
$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$followid));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
?>

<?php
$facebook=$follower['User']['fb_link'];
$twitter=$follower['User']['twitter_link'];
$gplus=$follower['User']['gplus_link'];
$website=$follower['User']['website'];
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

        <div id="card1" class="subcard">
            <div class="subup clearfix">
                <a class="channelname" href="<?php echo $channelurl ?>"><?php echo $follower['User']['username']; ?></a>



        <?php if($this->Session->check('Auth.User')){?>
                 <?php if(in_array($followid,$mutuals)){?>
               <a class="subcardchained" style="float:right" onclick="javascript:changechain(<?php echo $follower['User']['id']; ?>,$(this));"></a> 
               <?php }else {?>
               <a class="subcardchain" style="float:right" onclick="javascript:changechain(<?php echo $follower['User']['id']; ?>,$(this));"></a>
               <?php }?>
        <?php }else {?>
          <a class="subcardchain" style="float:right" onclick="javascript:changechain(<?php echo $follower['User']['id']; ?>,$(this));"></a> 
         <?php }?>  




            </div>
            <div class="submid clearfix">
                <div class="cardsep"></div>
                <div class="channelavatar">
              <?php 
              if($follower['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'90','height'=>'120','url' => array('controller' => 'games', 'action' => 'usergames', $followid))); 
                } else {
                  echo $this->Upload->image($follower,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");')); }
              ?>
                </div>
                <ul>
                    <li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $follower['Userstat']['uploadcount']; ?> Added Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $follower['Userstat']['favoritecount']; ?> Favorite Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $playcounturl ?>"><?php echo $follower['Userstat']['playcount']; ?> Played Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $folurl ?>"><?php echo $follower['Userstat']['subscribeto']; ?> Followers</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $suburl ?>"><?php echo $follower['Userstat']['subscribe']; ?> Chains</a></li>
                    <!-- <?php echo $follower['Userstat']['potential']; ?> -->
                <li class="clearfix"><div class="cardsep" style="margin-bottom:5px; margin-top:5px;"></div></li>
                    <li class="clearfix">
                    <?php
                    echo $facebook;
                    echo $twitter;
                    echo $gplus;
                    echo $website;
                    ?>
                    </li>
                    
                </ul>

            </div>
            <div class="subdown"></div>
        </div>
					
 <?php endforeach; ?>