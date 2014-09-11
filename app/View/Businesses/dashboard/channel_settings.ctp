<?php 
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
  if($user['User']['picture']==null) { 
    $img = $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'img-responsive img-circle circular1',"alt" => "clone user image")); 
    } else {
      $img = $this->Upload->image($user,'User.picture',array(),array('class'=>'img-responsive img-circle circular1','onerror'=>'imgError(this,"avatar");'));
	}

if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
    $gochannel = $this->Html->url('http://' . $user['User']['seo_username'] . '.' . $_SERVER['HTTP_HOST']);
} else {
    $gochannel = $this->Html->url(array('controller' => 'businesses', 'action' => 'mysite', $user['User']['id']));
}
$go_support = 	$this->Html->url(array('controller' => 'businesses', 'action' => 'support'));
?>
<body id="account">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar',array('active'=>'channel','bar'=>'setting'));?>
		<div id="content">
				<?php  echo $this->element('business/dashboard/sidebar_setting',array('active'=>'channel'));?>
			<div id="panel" class="channel_profile">
				<h3>
					Channel settings
				</h3>

				<p class="intro">
					Change your channel information, customize design, etc.
				</p>

				<p class="intro">
					<label>Custom Domain </label>
                                        <span class="help" data-toggle="tooltip" title="Map your own domain to your channel.">
                                            <a href="<?php echo $go_support;?>" class="badge badge-info"><i class="fa fa-question-circle"> help</i></a>
                                        </span>
                                    
                                        
                                  <div id="remove_domain" <?php if(!isset($mapping_domain)){echo 'style="display:none;"';} ?>>
                                  <a href="http://<?php echo $mapping_domain; ?>" target="_blank" class="btn btn-default domain_label"><i class="ion-ios7-world-outline"></i>  <?php echo $mapping_domain;?> </a>
                                  <a class="btn btn-default remove_mapping" data-toggle="tooltip" title="Click to remove domain mapping!"><i class="fa fa-trash-o"></i> Remove Domain</a>
                                  </div>
                                 
                                  <div id="map_domain" <?php if(isset($mapping_domain)){echo 'style="display:none;"';} ?>>
                                  <input type="text" class="form-control valid" name="mapping_domain" id="mapping_domain" placeholder="www.mygamesite.com" value="" style=" width: 250px;display: inline; ">
                                  <a class="btn btn-default add_mapping" style="vertical-align: top;" data-toggle="tooltip" title="You need to upgrade"><i class="fa fa-globe"></i> Map Domain</a>
                                  </div>
                                  
				</p>

				
            <!--Channel Cover Avatar Begins -->
            <div id='background_area' style="background-image: url('<?php echo Configure::read('S3.url').'/upload/users/'.$user['User']['id'].'/'.$user['User']['bg_image']; ?>'); background-color:<?php echo $user['User']['bg_color'];?>;height: 203px;" class="well col-md-12">
                <?php
                if($user['User']['banner']==null) { ?>
                <div id="user_cover" style="background-size:contain; background-position:center; background-image:url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);height: 115px;">
                <?php } else { ?>
                <div id="user_cover" style="background-size:contain; background-position:center; background-image:url(<?php echo Configure::read('S3.url')."/upload/users/".$user['User']['id']."/".$user['User']['banner'];?>);height: 115px;">
                <?php }
                $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                      if($user['User']['picture']==null) { 
                        echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('style'=>'margin-top:50px;width:120px; height:120px;','id'=>'channel_avatar','class'=>'pic circular1 img-thumbnail',"alt" => "clone user image")); 
                        } else {
                          echo $this->Upload->image($user,'User.picture',array(),array('style'=>'margin-top:50px; width:120px; height:120px;','id'=>'channel_avatar','class'=>'pic circular1 img-thumbnail','onerror'=>'imgError(this,"avatar");'));  }
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
					
<form id="channel_profile" role="form" novalidate="novalidate">
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
                        <span class="help" data-toggle="tooltip" title="Exp. : UA-XXXXX-X">
					    		<i class="fa fa-question-circle"></i>
					    </span>
				  		<div><input type="text" id="analitics" class="form-control" maxlength="25" value="<?php echo $user['User']['analitics'];?>"></div>

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