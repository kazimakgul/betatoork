<?php 
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
  if($user['User']['picture']==null) { 
    $img = $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'img-responsive img-circle circular1',"alt" => "clone user image")); 
    } else {
      $img = $this->Upload->image($user,'User.picture',array(),array('class'=>'img-responsive img-circle circular1','onerror'=>'imgError(this,"avatar");'));
	}
?>
<body id="account">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>
		<div id="content">
				<?php  echo $this->element('business/dashboard/sidebar_setting',array('active'=>'channel'));?>
			<div id="panel" class="channel_profile">
				<h3>
					Channel settings
				</h3>
				
            <!--Channel Cover Avatar Begins -->
            <div style="background-image: url('<?php echo Configure::read('S3.url').'/upload/users/'.$user['User']['id'].'/'.$user['User']['bg_image']; ?>'); background-color:<?php echo $user['User']['bg_color'];?>;" class="well col-md-12">
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
					
<form id="settings_profile" role="form" novalidate="novalidate">
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

                           <?php if($user['User']['bg_image']!=NULL && $user['User']['bg_image']!=''){?>
                                   <img id='user_background' src="<?php echo Configure::read('S3.url').'/upload/users/'.$user['User']['id'].'/'.$user['User']['bg_image']; ?>" class="img-responsive">
                           <?php }else{?>
					    			<img id='user_background' src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" class="img-responsive">
					    	<?php }?>		


					    		</div>
			                    
			                    <div class="control-group" style="margin-bottom:5px;">
				                    <label for="post_featured_image" style='display: block;'>
				                    	Choose a picture:
				                    </label>
				                    <a data-toggle="modal" data-target="#backgroundChange"  href="#" class="btn btn-xs btn-default"><span class="fa fa-picture-o"></span> Choose File</a><span style='margin-left:6px;'>No file chosen</span>
				                </div>
		                        <a href="#" class="remove-image">Remove Background Image</a>
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
					<div class="form-group action">
						<input type="submit" class="btn btn-success" id="updateButton" value="Save changes" />
					</div>
</form>
			</div>
		</div>
	</div>

<!-- Avatar Change Modal begins -->
    <div class="modal fade" id="pictureChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                
                <?php 
				$avatar_image_url=$this->Html->url(array('controller'=>'uploads','action'=>'index','avatar_image',$user['User']['id']));
				$url=$avatar_image_url;
				?>
                <iframe id='avatarframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
                
            </div>
        </div>
    </div>
<!-- Avatar Change Modal ends -->

<!-- Cover Change Modal begins -->
    <div class="modal fade" id="coverChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                <?php 
				$avatar_image_url=$this->Html->url(array('controller'=>'uploads','action'=>'index','cover_image',$user['User']['id']));
				$url=$avatar_image_url;
				?>
                <iframe id='coverframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
            </div>
        </div>
    </div>
	<!-- Cover Change Modal ends -->

	<!-- Background Change Modal begins -->
    <div class="modal fade" id="backgroundChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                <?php 
                $background_image_url=$this->Html->url(array('controller'=>'uploads','action'=>'index','bg_image',$user['User']['id']));
                $url=$background_image_url;
                ?>
                <iframe id='backgroundframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
            </div>
        </div>
    </div>
    <!-- Background Change Modal ends -->


</body>