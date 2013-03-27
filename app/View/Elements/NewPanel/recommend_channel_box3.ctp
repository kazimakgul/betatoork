					<?php 
					foreach ($channels as $follower): 
						$followid = $follower['User']['id'];
						$channelurl=$this->Html->url(array("controller" => $follower['User']['seo_username'],"action" =>"")); 
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

									
				 <li class="contact-alt grd-white">
                                                    <!--we use data toggle tab for navigate this action-->
                                                    <a href="<?php echo $channelurl ?>" >
                                                        <!--we use contact-item structure like the component media in bootstrap-->
                                                        <div class="contact-item">
                                                            <div class="pull-left">
                                                                <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'32','height'=>'32','url' => array('controller' => 'games', 'action' => 'usergames', $followid))); 
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