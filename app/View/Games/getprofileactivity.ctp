<?php if($lastactivities!=NULL) { ?>
		
					<?php 
					
					foreach ($lastactivities as $lastactivity): 
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
						$activity_message = $this->requestAction( array('controller' => 'apis', 'action' => 'activityMessage'),array('pass' => $lastactivity));
						$timestamp = strtotime($lastactivity['Activity']['created']);
				        $time=date("c",$timestamp);
						$publicname=$lastactivity['PerformerUser']['username'];
						$userid=$lastactivity['PerformerUser']['id'];

					?>
			
			
			<div style="background-color:white; padding:10px; margin:15px 0px 0px 0px;" class="span12 shadow well">
                
                    <div class="media-object pull-left img-polaroid" width="30"><?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'32','height'=>'32')); 
                } else {
                echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('width'=>'32','height'=>'32','onerror'=>'imgError(this,"avatar");'));  }
              ?></div>
               
                <h4 class="media-heading"><a style="margin-left:9px;" href="<?php echo $profileurl ?>"><?php echo $lastactivity['PerformerUser']['username']; ?> - <a id="follow<?php echo $userid; ?>" class="btn-mini btn-link" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-plus-sign"></i> Follow</a> </a><small class="pull-right helper-font-small"><a href='#' class="timeago" title='<?php echo $time; ?>'></a></small></h4>
                <p style="margin-left:50px;"><?php echo $activity_message;?></p>
                <small style="margin-left:50px; opacity:0.5;"><a class="btn-link"><i class="elusive-thumbs-up"></i> Like</a> - <a class="btn-link"><i class="elusive-comment"></i> Thanx</a> - <a class="btn-link"><i class="elusive-ok"></i> Good</a> - <a class="btn-link"><i class="elusive-fire"></i> Awesome</a></small>
        </div>
							
					
				<?php endforeach; ?>  
				
<?php } ?>				