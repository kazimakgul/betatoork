<?php 
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
  if($user['User']['picture']==null) { 
    $img = $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'img-responsive img-circle circular1',"alt" => "clone user image")); 
    } else {
      $img = $this->Upload->image($user,'User.picture',array(),array('class'=>'img-responsive img-circle circular1','onerror'=>'imgError(this,"avatar");'));
	}
?>
<body id="wizard">
	<div id="wrapper">
	<?php echo $this->element('business/dashboard/sidebar',array('active'=>'dashboard')); ?>
		<div id="content">

			<div class="content-wrapper">
				<div class="header">
					<div class="sidebar-toggler visible-xs">
						<i class="ion-navicon"></i>
					</div>

					<div class="steps clearfix">
						<div class="step active">
							Setup your channel
							<span></span>
						</div>
						<div class="step">
							Add/Clone Games
							<span></span>
						</div>
						<div class="step">
							Follow Channels
							<span></span>
						</div>
						<div class="step">
							Finish
							<span></span>
						</div>
					</div>
				</div>

				<section class="form-wizard">

					<form id="new-customer" method="post" action="#" role="form">
						<div class="step active animated fadeInRightStep">
				  	<div class="form-group">
					<label>Custom Domain: </label> <a class="btn btn-default"> http://<?php echo $user['User']['seo_username'];?>.clone.gs </a> <a class="btn btn-default"><i class="fa fa-globe"></i> Map Domain </a>
						<span class="help" data-toggle="tooltip" title="Map your own domain to your channel.">
					    		<i class="fa fa-question-circle"></i>
					    </span>
					</div>

            <!--Channel Cover Avatar Begins -->
            <div id='background_area' style="background-image: url('<?php echo Configure::read('S3.url').'/upload/users/'.$user['User']['id'].'/'.$user['User']['bg_image']; ?>'); background-color:<?php echo $user['User']['bg_color'];?>;" class="well col-md-12">
                <?php
                if($user['User']['banner']==null) { ?>
                <div id="user_cover" style="background-image:url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);height: 160px;">
                <?php } else { ?>
                <div id="user_cover" style="background-image:url(<?php echo Configure::read('S3.url')."/upload/users/".$user['User']['id']."/".$user['User']['banner'];?>);height: 160px;">
                <?php }
                $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                      if($user['User']['picture']==null) { 
                        echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('style'=>'margin-top:120px;','id'=>'user_avatar','class'=>'pic circular1 img-thumbnail',"alt" => "clone user image")); 
                        } else {
                          echo $this->Upload->image($user,'User.picture',array(),array('style'=>'margin-top:120px; width:120px; height:120px;','id'=>'user_avatar','class'=>'pic circular1 img-thumbnail','onerror'=>'imgError(this,"avatar");'));  }
                    ?>
					
					<a data-toggle="modal" data-target="#coverChange" href="#" class="btn btn-xs btn-default pull-left" style="margin: 10px 0px 0px -110px; position:absolute;"><span class="fa fa-picture-o"></span> Change Cover</a>
                    
                    <div class="name">
                        <div class="showme">
                        	
                            <a data-toggle="modal" data-target="#pictureChange"  href="#" class="btn btn-xs btn-default pull-left" style="margin:-40px 0px 10px 25px; position:absolute;"><span class="fa fa-picture-o"></span> Change</a>
                        	
                        </div>
                    </div>
                </div>
    <br><br><br><br>
    			</div>
					<!--Channel Cover Avatar Ends -->
				  	<div class="form-group">
						<label>Screen Name
                        <span class="help" data-toggle="tooltip" title="Users will see your screen name on your channel.">
					    		<i class="fa fa-question-circle"></i>
					    </span>
						</label>
						<input type="text" class="form-control" name='screenname' id="title" value="<?php echo $user['User']['screenname'];?>" />
					</div>
					<div class="form-group">
				  		<label>Description</label>
				  		<div><textarea id="desc" class="form-control" id="desc" rows="4" name="description" style="margin-bottom: 10px; height:100px;"><?php echo $user['User']['description'];?></textarea></div>
				  	</div>
				  	<div class="form-group">
					    <label>Background Color</label>
					    <div>
					      	<input type="text" class="form-control minicolors" name='bgclr' id="bgcolor" value="<?php echo $user['User']['bg_color'];?>"/>
					    </div>
					</div>
					<div class="form-group">
					    <label>Background Image</label>
					    <div>
					    	<div class="well">
					    		<div class="pic">

                           <?php 
                           if($user['User']['bg_image']!=NULL && $user['User']['bg_image']!=''){
                            $bg_message="Background selected.";
                            $bg_exist=1;
                           	?>
                                   <img id='user_background' src="<?php echo Configure::read('S3.url').'/upload/users/'.$user['User']['id'].'/'.$user['User']['bg_image']; ?>" class="img-responsive">
                           <?php 
                            }else{
                            $bg_message="No background chosen.";
                            $bg_exist=0;	
                           	?>
					    			<img id='user_background' src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" class="img-responsive">
					    	<?php }?>		


					    		</div>
			                    
			                    <div class="control-group" style="margin-bottom:5px;">
				                    <label for="post_featured_image" style='display: block;'>
				                    	Choose a picture:
				                    </label>
				                    <a data-toggle="modal" data-target="#backgroundChange"  href="#" class="btn btn-xs btn-default"><span class="fa fa-picture-o"></span> Choose File</a><span id='bg_message' style='margin-left:6px;'><?php echo $bg_message; ?></span>
				                </div>
				                <?php if($bg_exist==1){ ?>
		                        <a href="#" class="remove_bg_img">Remove Background Image</a>
		                        <?php }else{ ?>
                                <a style="display:none;" href="#" class="remove_bg_img">Remove Background Image</a>
		                        <?php } ?>
				            </div>
					    </div>
				  	</div>
					<div class="form-group">
				  		<label>Analitics Code:</label>
				  		<div><textarea id="analitics" class="form-control" rows="4" style="margin-bottom: 10px; height:100px;"><?php echo $user['User']['analitics'];?></textarea></div>

				  	</div>
					<div class="form-group">
						<input type="hidden" id="attr" name="attr" value="channel_update" />
					</div>

						  	<div class="form-group form-actions">
					      		<button type="submit" class="button" data-step="2">
					      			<span>Next Step <i class="fa fa-angle-double-right"></i></span>
					      		</button>
						  	</div>
						</div>
						<div class="step">
							<?php
								foreach ($games as $game) {
								    $name = $game['Game']['name'];
								    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
								    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
								    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
								    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
								    $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
								    ?>
								    <div class="game col-sm-4">
								        <a href="<?php echo $playurl ?>">
								            <?= $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
								        </a>
								        <div class="name">
								            <a href="<?php echo $playurl ?>">
								                <?php echo $name ?>
								            </a>
								        </div>
								    </div>
								    <?php
								}
								?>
								<div class="clear"></div>
						  	<div class="form-group form-actions">
						  		<a class="button" href="#" data-step="1">
						  			<span><i class="fa fa-angle-double-left"></i> Back</span>
						  		</a>
					      		<button type="submit" class="button" data-step="3">
					      			<span>Next Step <i class="fa fa-angle-double-right"></i></span>
					      		</button>
						  	</div>
						</div>
						<div class="step">
<?php
foreach ($following as $value) {
    $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
    $name = $value['User']['username'];
	$userid  =$value['User']['id'];
	$publicname = $value['User']['username'];
	$followstatus=$this->requestAction( array('controller' => 'subscriptions', 'action' => 'followstatus'),array($userid));
    $followers = $value['Userstat']['subscribe'];
    $following = $value['Userstat']['subscribeto'];
    $games = $value['Userstat']['uploadcount'];
    ?>
    <div class="user col-sm-2">
        <a href="<?php echo $userlink ?>">
            <?php
            if (is_null($value['User']['picture'])) {
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name));
            } else {
                echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name));
            }
            ?>
        </a>
<!-- Follow button -->
    <?php if($followstatus!=1){ ?>
    <a id="follow<?php echo $userid; ?>" class="btn btn-primary" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); switchfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="fa fa-plus-circle"></i> Follow</a> 
    <a id="unfollow<?php echo $userid; ?>" style="display:none;" class="btn btn-success" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); switchunfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"> <i class="fa fa-foursquare"></i> Unfollow</a>
    <?php }else{ ?> 
    <a id="unfollow<?php echo $userid; ?>" class="btn btn-success" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); switchunfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="fa fa-foursquare"></i>  Unfollow</a>
    <a id="follow<?php echo $userid; ?>" style="display:none;" class="btn btn-primary" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); switchfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="fa fa-plus-circle"></i> Follow</a> <?php } ?> 
<!-- Follow button end -->
        <div class="name">
            <a href="<?php echo $userlink ?>">
                <?php echo $name ?>
            </a>
        </div>
    </div>
    <?php
}
?>							
						  	<div class="form-group form-actions">
						  		<a class="button" href="#" data-step="2">
						  			<span><i class="fa fa-angle-double-left"></i> Back</span>
						  		</a>
					      		<button type="submit" class="button" data-step="4">
					      			<span>Make payment <i class="fa fa-angle-double-right"></i></span>
					      		</button>
						  	</div>
						</div>
						<div class="step">
							<div class="success">
								<i class="ion-checkmark-circled"></i>
								<h3>
									Your account has been configured successfully!
								</h3>
								<a href="#" class="button">
									<span>Go to my channel</span>
								</a>
							</div>
						</div>
					</form>

				</section>

			</div>
		</div>
	</div>
</body>
