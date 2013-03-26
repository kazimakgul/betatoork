					<?php 
					foreach ($users as $follower): 
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

            <div class="box corner-all" style="margin:5px 0px 0px 0px;">
                                        <div class="box-header grd-white corner-top">
                                            <div class="header-control">
                                            </div>
                                            <span><a href="<?php echo $channelurl ?>" class="channelname"><?php echo $follower['User']['username']; ?></a></span>
                                        </div>
                                        <div class="box-body">

                                    
                                        <div class="media">
                                            <a href="#">
                                                    <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'90','height'=>'120','url' => array('controller' => 'games', 'action' => 'usergames', $followid))); 
                } else {
                echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('onerror'=>'imgError(this,"avatar");'));  }
              ?>
                                         
                                            </a>
                                            <div class="media-body description">
								<!-- Chain Button Begins-->			
								<?php if($this->Session->check('Auth.User')){?>
								<?php if(in_array($followid,$mutuals)){?>
									<a class="btn btn-info btn-small btn-block" style="float:right" onclick="javascript:changechain(<?php echo $follower['User']['id']; ?>,$(this));">Unfollow</a> 
								<?php }else {?>
									<a class="btn btn-info btn-small btn-block" style="float:right" onclick="javascript:changechain(<?php echo $follower['User']['id']; ?>,$(this));">Follow</a>
								<?php }?>
							    <?php }?> 			
								<!-- Chain Button Ends-->		
											
                                                <p></p>
                                                <a href="<?php echo $channelurl; ?>" class="btn btn-danger btn-small btn-block">View Channel</a>
                                            </div>
                                                            
                   
 <ul class="nav nav-list">
  <li> <a class="" href="<?php echo $channelurl ?>"><?php echo $card[1] ?> Added Games</a></li>
  <li ><a class="" href="<?php echo $channelurl ?>"><?php echo $card[2] ?> Favorite Games</a></li>
  <li><a class="" href="<?php echo $playcounturl ?>"><?php echo $card[5] ?> Played Games</a></li>
  <li><a class="" href="<?php echo $folurl ?>"><?php echo $card[4] ?> Followers</a></li>
  <li><a class="" href="<?php echo $suburl ?>"><?php echo $card[3] ?> Chains</a></li>
</ul>
                
                                        </div>
                                    
                                    
                                        <div>
                                            <a class="btn btn-small pull-right" href="login.html">Channel</a>
                                            <a class="btn btn-small" href="#">News</a>
                                        </div>
                                   
  
                                        </div>
                                    </div>
									
									
									
									
									
									
			
			</div>		
					
					
					
				<?php endforeach; ?>  