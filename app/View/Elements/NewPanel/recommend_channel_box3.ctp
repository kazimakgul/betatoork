					<?php 
					foreach ($channels as $follower): 
						$followid = $follower['User']['id'];

if($follower['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($follower['User']['seo_username']),"action" =>'go')); 
}
else{
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$followid));
}


						$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$followid));
						$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$followid));
						$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
						$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$followid));
						$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
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
				
					
			<div class="span12" style="margin:0px;">

									
				 <li class="header-control contact-alt grd-white" style="margin:0px 0px 3px 0px;">
                                                    <!--we use data toggle tab for navigate this action-->
                                                    <a style="margin:0px 0px 5px 0px;" href="<?php echo $profileurl ?>" >
                                                        <!--we use contact-item structure like the component media in bootstrap-->
                                                    <button style="margin:10px 0px 0px 0px; opacity:1;" href="#" onclick="$.pnotify({
            title: 'Thanks for Follow',
            text: 'You are following <strong><?php echo $card[0] ?></strong> now.<br>You will be notified about the updates of this channel.',
            type: 'success'
          });"  rel="tooltip" data-placement="left" data-original-title="Follow" data-box="close" data-hide="fadeOut" class="close"><i class="elusive-plus-sign color-green"></i></button> 
                                                        <div class="contact-item">
                                                            <div class="pull-left">
                                                                <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'32','height'=>'32')); 
                } else {
                echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('width'=>'32','height'=>'32','onerror'=>'imgError(this,"avatar");'));  }
              ?>
                                                            </div>
                                                            <div class="contact-item-body">

                                                                <p class="contact-item-heading bold"><?php echo $follower['User']['username']; ?></p>
                                                                <p class="help-block"><small class="muted"><?php echo $card[4] ?> Followers-</small><small class="muted"><?php echo $card[1] ?> Games</small></p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>				
			
			
			</div>		
					
					
					
				<?php endforeach; ?>  