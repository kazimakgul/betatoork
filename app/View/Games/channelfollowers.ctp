<?php if($followers==NULL){ echo "<div class='elusive-plus-sign color-green media well shadow span12' style='background-color:white;'> No Followers Yet. Be the first to follow.</div>";} ?>

<?php foreach ($followers as $follower): ?>
<?php 
$followid = $follower['Subscription']['subscriber_id'];
$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
$channelurl=$this->Html->url(array("controller" => $card[7],"action" =>"")); 
$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$followid));
$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$followid));
$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$followid));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$followstatus=$this->requestAction( array('controller' => 'subscriptions', 'action' => 'followstatus'),array($followid));
$userid = $followid;
$publicname = $card[6]['User']['seo_username'];
?>



<?php 
if($card[6]['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($card[6]['User']['seo_username']),"action" =>'')); 
}
else
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$followid));

?>	


<div class="row-fluid span4" style="margin:0px 7px 0px 7px;">
    <div class="navbar"><div class="navbar-inner"  style="padding:5px 15px 15px 5px;">
     <div class="span4" style="margin:5px 20px 5px 5px;">
    <a  href="<?php echo $profileurl ?>" >
            <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("class"=>"img-polaroid img-rounded","alt" => "toork avatar image",'width'=>'72','style'=>'height:96px;')); 
                } else {
                  echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('width'=>'72','style'=>'height:96px;',"class"=>"img-polaroid img-rounded",'onerror'=>'imgError(this,"avatar");'));  }
            ?>
    </a><div style="margin-top:-35px; margin-left:-3px; text-align:center;">
    <?php if($followstatus!=1){ ?><a id="follow<?php echo $userid; ?>" class="btn btn-mini btn-success" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-plus-sign"></i> Follow</a> <a id="unfollow<?php echo $userid; ?>" style="display:none;" class="btn btn-mini helper-font-9" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchunfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-remove-circle"></i> Unfollow</a><?php }else{ ?> <a id="unfollow<?php echo $userid; ?>" class="btn btn-mini helper-font-9" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchunfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-remove-circle"></i> Unfollow</a><a id="follow<?php echo $userid; ?>" style="display:none;" class="btn btn-mini btn-success" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-plus-sign"></i> Follow</a> <?php } ?> </a></div>
  </div>
    
    <div class="span7" style="margin:-10px 10px 0px -25px;">
        

<ul style="padding-left:0px; list-style:none" class="nav-list">
  <li >
    <h5>
      <a class="btn" href="<?php echo $profileurl ?>"><?php echo $card[0] ?></a>
    </h5>
  </li>
  <li><i class="elusive-group color-green"></i> <?php echo $card[4] ?> Followers</a></li>
  <li><i class="elusive-group color-blue"></i> <?php echo $card[3] ?> Following</a></li>
  <li><i class="elusive-star-alt color-red"></i> <?php echo $card[1] ?> Games</a></li>
</ul>

    </div>

</div>
</div>

</div>

			
 <?php endforeach; ?>

<?php if($followers!=NULL){ ?>
 <!--Hidden Pagination -->
	<div class="paging_followers" style="display:none;">
    <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
     echo $this->Paginator->numbers();
     echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
    </div>
  <!--Hidden Pagination -->
<?php } ?>