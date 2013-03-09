

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
$profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$followid));
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


<div class="span3">
                                    <div class="box corner-all">
                                        <div class="box-header grd-white corner-top">
                                            <div class="header-control">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a data-box="close" data-hide="rotateOut">×</a>
                                            </div>
                                            <span><?php echo $follower['User']['username']; ?></span>
                                        </div>
                                        <div class="box-body">

                                    <li>
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                    <?php 
              if($follower['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'90','height'=>'120','url' => array('controller' => 'games', 'action' => 'usergames', $followid))); 
                } else {
                  echo $this->Upload->image($follower,'User.picture',array('class'=>'img-circle'),array('onerror'=>'imgError(this,"avatar");'));  }
              ?>
                                         
                                            </a>
                                            <div class="media-body description">
                                                <p></p>
                                                <a href="<?php echo $profileurl ?>" class="btn btn-danger btn-small btn-block">View Channel</a>
                                            </div>
                                                            
                <ul>
                    <li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $follower['Userstat']['uploadcount']; ?> Added Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $follower['Userstat']['favoritecount']; ?> Favorite Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $playcounturl ?>"><?php echo $follower['Userstat']['playcount']; ?> Played Games</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $folurl ?>"><?php echo $follower['Userstat']['subscribeto']; ?> Followers</a></li>
                    <li class="clearfix"><a class="" href="<?php echo $suburl ?>"><?php echo $follower['Userstat']['subscribe']; ?> Chains</a></li>
                    <!-- <?php echo $follower['Userstat']['potential']; ?> -->
                    
                </ul>
                
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