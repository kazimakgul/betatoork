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


<div class="span3">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white corner-top">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a data-box="close" data-hide="rotateOut">×</a>
                                            </div>
                                            <span><?php echo $card[0] ?></span>
                                        </div>
                                        <div class="box-body">

                                    <li>
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                    <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'90','height'=>'120','url' => array('controller' => 'games', 'action' => 'usergames', $followid))); 
                } else {
                  echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('onerror'=>'imgError(this,"avatar");'));  }
              ?>
                                         
                                            </a>
                                            <div class="media-body description">
                                                <p></p>
                                                <a class="btn btn-danger btn-small btn-block">View Channel</a>
                                            </div>
                                                            
                    <a class="" href="<?php echo $channelurl ?>"><?php echo $card[1] ?> Added Games</a>
                    <a class="" href="<?php echo $channelurl ?>"><?php echo $card[2] ?> Favorite Games</a>
                    <a class="" href="<?php echo $playcounturl ?>"><?php echo $card[5] ?> Played Games</a>
                    <a class="" href="<?php echo $folurl ?>"><?php echo $card[4] ?> Followers</a>
                    <a class="" href="<?php echo $suburl ?>"><?php echo $card[3] ?> Chains</a>
                
                                        </div>
                                    </li>
                                    <li class="dropdown-footer">
                                        <div>
                                            <a class="btn btn-small pull-right" href="login.html">Channel</a>
                                            <a class="btn btn-small" href="#">News</a>
                                        </div>
                                    </li>
  

                                        </div>
                                    </div>
                                </div>

			
 <?php endforeach; ?>