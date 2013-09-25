<?php if($notifications!=NULL) { ?>
		
					<?php 
					
					foreach ($notifications as $lastactivity): 
						$followid = $lastactivity['PerformerUser']['id'];

if($lastactivity['PerformerUser']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($lastactivity['PerformerUser']['seo_username']),"action" =>'')); 
}
else{
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$followid));
}


						$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
						$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
						$activity_message = $this->requestAction( array('controller' => 'apis', 'action' => 'notificationMessage'),array('pass' => $lastactivity));
						$timestamp = strtotime($lastactivity['Activity']['created']);
				        $time=date("c",$timestamp);
						$publicname=$lastactivity['PerformerUser']['username'];
						$userid=$lastactivity['PerformerUser']['id'];
						$followstatus=$this->requestAction( array('controller' => 'subscriptions', 'action' => 'followstatus'),array($lastactivity['PerformerUser']['id']));

						$msg_id=$lastactivity['Activity']['msg_id'];
						$postPage=$this->Html->url(array("controller" => "wallentries","action" =>"posts",$msg_id));

					?>
			
			
			<div style="background-color:white; padding:10px; margin:15px 0px 0px 0px;" class="span12 shadow well">
                
                    <div class="media-object pull-left img-polaroid" width="30"><?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'32','height'=>'32')); 
                } else {
                echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('width'=>'32','height'=>'32','onerror'=>'imgError(this,"avatar");'));  }
              ?></div>
               
                <h4 class="media-heading"><a style="margin-left:9px;" href="<?php echo $profileurl ?>"><?php echo $lastactivity['PerformerUser']['username']; ?> <?php if($followstatus!=1){ ?> - <a id="follow<?php echo $userid; ?>" class="btn-mini btn-link" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-plus-sign"></i> Follow</a> <a id="unfollow<?php echo $userid; ?>" style="display:none;" class="btn-mini btn-link color-black" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchunfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-remove-circle"></i> Unfollow</a><?php }else{ ?> <a id="unfollow<?php echo $userid; ?>" class="btn-mini btn-link color-black" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchunfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-remove-circle"></i> Unfollow</a><a id="follow<?php echo $userid; ?>" style="display:none;" class="btn-mini btn-link" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-plus-sign"></i> Follow</a> <?php } ?> </a><small class="pull-right helper-font-small"><a href='<?php echo $postPage; ?>' class="timeago" title='<?php echo $time; ?>'></a></small></h4>
                <p style="margin-left:50px;"><?php echo $activity_message;?></p>
        </div>
							
					
				<?php endforeach; ?>  
				
<?php } ?>				