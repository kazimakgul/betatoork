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
            <div class="showhim col-md-12">

                <?php
                
                if($user['User']['banner']==null) { ?>
                <div id="user_cover" style="background-image:url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);height: 130px;">
                <?php } else { ?>
                <div id="user_cover" style="background-image:url(<?php echo Configure::read('S3.url')."/upload/users/".$user['User']['id']."/".$user['User']['banner'];?>);height: 130px;">
                <?php } ?>

                    <?php 
                    $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                      if($user['User']['picture']==null) { 
                        echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'pic circular1 img-thumbnail',"alt" => "clone user image")); 
                        } else {
                          echo $this->Upload->image($user,'User.picture',array(),array('id'=>'user_avatar','class'=>'pic circular1 img-thumbnail','onerror'=>'imgError(this,"avatar");'));  }
                    ?>
					<?if($controls==$user['User']['id']){?>
					<a data-toggle="modal" data-target="#coverChange" href="#" class="btn btn-xs btn-default pull-left" style="margin:10px 0px 10px -150px; position:absolute;"><span class="fa fa-picture-o"></span> Change Cover</a>
                    <?}?>
                    <div class="name">
                        <div class="showme">
                        	<?if($controls==$user['User']['id']){?>
                            <a data-toggle="modal" data-target="#pictureChange"  href="#" class="btn btn-xs btn-default pull-left" style="margin:10px 0px 10px -125px; position:absolute;"><span class="fa fa-picture-o"></span> Change</a>
                        	<?}?>
                        </div>
				
 						
                    </div>


                </div>
    <br><br><br><br>
    </div>
       <!--Channel Cover Avatar Ends -->
                   

				  	<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" value="<?=$user['User']['username'];?>" />
					</div>
								
					
					<div class="form-group">
				  		<label>Description</label>
				  		<div class="note-editor"><textarea id="desc" class="note-editable col-sm-12" style="margin-bottom: 10px; height:100px;"><?=$user['User']['description'];?></textarea></div>
				  	</div>
					
					
					<div class="form-group action">
						<input type="submit" class="btn btn-success" id="updateButton" value="Save changes" />
					</div>
			</div>

		</div>
	</div>
<?php echo $this->Html->css(array('business/dashboard/vendor/datepicker','business/dashboard/vendor/summernote')); ?>
<?php echo $this->Html->script(array('business/dashboard/bootstrap/bootstrap-datepicker')); ?>
</body>