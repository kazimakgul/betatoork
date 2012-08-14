

<?php foreach ($users as $follower): ?>
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

        <div id="card1" class="subcard">
            <div class="subup clearfix">
                <a class="channelname" href="<?php echo $channelurl ?>"><?php echo $card[0] ?></a>


        <?php if($this->Session->check('Auth.User')){?>
                 <?php if(in_array($followid,$mutuals)){?>
               <a class="subcardchained" style="float:right" onclick="javascript:changechain(<?php echo $card[6]['User']['id']; ?>,$(this));"></a> 
               <?php }else {?>
               <a class="subcardchain" style="float:right" onclick="javascript:changechain(<?php echo $card[6]['User']['id']; ?>,$(this));"></a>
               <?php }?>
        <?php }else {?>
          <a class="subcardchain" style="float:right" onclick="javascript:changechain(<?php echo $card[6]['User']['id']; ?>,$(this));"></a> 
         <?php }?>  





            </div>
            <div class="submid clearfix">
                <div class="cardsep"></div>
                <div class="channelavatar">
              <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $followid))); 
                } else {
                  echo $this->Upload->image($card[6],'User.picture'); }
              ?>
                </div>
                <ul>
                    <li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $card[1] ?> Added Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $card[2] ?> Favorite Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $playcounturl ?>"><?php echo $card[5] ?> Played Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $folurl ?>"><?php echo $card[4] ?> Followers</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $suburl ?>"><?php echo $card[3] ?> Subscriptions</a></li>

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