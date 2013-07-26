					<?php 
					foreach ($channels as $follower): 
						$followid = $follower['User']['id'];

if($follower['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($follower['User']['seo_username']),"action" =>'')); 
}
else{
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$followid));
}


						$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
						$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));

					?>
				
					
			<div class="span12" style="margin:0px;">

									
				 <li class="contact-alt grd-white" style="margin:0px 0px 3px 0px;">
                                                    <!--we use data toggle tab for navigate this action-->
                                                    
                                                        <!--we use contact-item structure like the component media in bootstrap-->

                                                        <div class="contact-item" style="margin:5px;">
                                                            <div class="pull-left">
                                                                <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'32','height'=>'32')); 
                } else {
                echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('width'=>'32','height'=>'32','onerror'=>'imgError(this,"avatar");'));  }
              ?>
                                                            </div>
                                                            <div class="contact-item-body">

                                                                <a class="contact-item-heading btn-link btn-mini bold" href="<?php echo $profileurl ?>"  style="margin:-10px 0px -25px 0px; padding-left:0px;padding-left:0px;"><?php echo $follower['User']['username']; ?></a>
                                                                <p style="margin-top:-5px; margin-bottom:-5px; padding:0px;"><small >Comment on Angry Birds and need for speed online</small></p>
                                                            </div>
                                                        </div>
                                                   
                                                </li>				
			
			</div>		
					
					
					
				<?php endforeach; ?>  