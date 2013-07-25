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

									
				 <li class="header-control contact-alt grd-white" style="margin:0px 0px 3px 0px;">
                                                    <!--we use data toggle tab for navigate this action-->
                                                    <a style="margin:0px 0px 5px 0px;" href="<?php echo $profileurl ?>" >
                                                        <!--we use contact-item structure like the component media in bootstrap-->

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
                                                                <p class="help-block"><small >Comment on Angry Birds</small></p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="helper-font-9" style="margin:3px;">This game is really good. Follow us to be notified. <i class="elusive-thumbs-up color-blue" href="#"> Like</i> - <i class="elusive-ok color-blue" href="#"> Good</i> - <i class="elusive-fire color-blue" href="#"> Awesome</i></div>
                                                    
                                                </li>				
			
			</div>		
					
					
					
				<?php endforeach; ?>  