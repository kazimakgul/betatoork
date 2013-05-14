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


						$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$followid));
						$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$followid));
						$card = $this->requestAction( array('controller' => 'games', 'action' => 'follow_card', $followid));
						$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$followid));
						$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));

					?>
			
	<!----Declare Channel Name For JavaScript Usage---->
  <!----=========================================---->
  <script>
  <?php if($this->Session->check('Auth.User') == 1){ ?>
  user_auth=1;
  <?php }else{?>
  user_auth=0;
  <?php }?>
  
  </script>
  <!----=========================================---->			
					
			<div class="span6" style="margin:0px;">

									
				 <li class="header-control contact-alt grd-white" style="border-color:grey; margin:0px 10px 10px 0px;">
                                                    <!--we use data toggle tab for navigate this action-->
                                                    <a style="margin:0px 0px 5px 0px;" href="#" >
                                                        <!--we use contact-item structure like the component media in bootstrap-->
                                                    <button style="margin:20px 10px 20px 0px; opacity:1;" href="#" onclick="subscribe('<?php echo $card[0]; ?>',user_auth,<?php echo $followid; ?>);"  rel="tooltip" data-placement="left" data-original-title="Follow" data-box="close" data-hide="fadeOut" class="close"><i class="helper-font-24 elusive-plus-sign color-green"></i></button> 
                                                        <div class="contact-item">
                                                            <div class="pull-left" style="margin:4px;" >
                                                                <?php 
              if($card[6]['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'40','height'=>'32')); 
                } else {
                echo $this->Upload->image($card[6],'User.picture',array('class'=>'img-circle'),array('width'=>'40','height'=>'32','onerror'=>'imgError(this,"avatar");'));  }
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