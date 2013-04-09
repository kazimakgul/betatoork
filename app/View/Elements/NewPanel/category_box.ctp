					<?php 
					foreach ($category as $cat): 

					$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
					$catName = h($cat['Category']['name']);
					$catId = $cat['Category']['id'];
					$caturl=$this->Html->url(array("controller" => "games","action" =>"categorygames2",$catId)); 
				
					?>
				
					
			<div class="span12" style="margin:0px;">

									
				 <li class="header-control contact-alt grd-white" style="margin:0px 0px 3px 0px;">
                                                    <!--we use data toggle tab for navigate this action-->
                                                    <a style="margin:0px 0px 5px 0px;" href="<?php echo $caturl ?>" >
                                                        <!--we use contact-item structure like the component media in bootstrap-->
                                                        <div class="contact-item">
                                                            <div class="pull-left">
                                                                <?php 

                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'32','height'=>'32')); 

              ?>
                                                            </div>
                                                            <div class="contact-item-body">

                                                                <h6><p class="contact-item-heading bold"><?php echo $catName?></p>
                                                               </h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>				
			
			
			</div>		
					
					
					
				<?php endforeach; ?>  