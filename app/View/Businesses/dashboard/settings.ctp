<?php 
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
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
				<?php  echo $this->element('business/dashboard/sidebar_setting',array('active'=>'profile'));?>
			<div id="panel" class="profile">
				<h3>
					Profile settings
				</h3>
				<p class="intro">
					Change your account information, login credentials, etc.
				</p>
					
				  	<div class="form-group">
						<label>User Name</label>
						<input type="text" class="form-control" disabled="disabled" value="<?=$user['User']['username'];?>" />
					</div>
				  	<div class="form-group">
						<label>Screen Name</label>
						<input type="text" class="form-control" id="screen" value="<?=$user['User']['screenname'];?>" />
					</div>
					<div class="form-group">
						<label>Email address</label>
						<input type="email" class="form-control" disabled="disabled" value="<?=$user['User']['email'];?>" />
					</div>
					<div class="form-group">
					    <label for="inputPassword3" >Birthday</label>
					    	<div class="input-group">
							  	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							  	<input type="text" class="form-control datepicker" id="user_time_zone" value="<?=$user['User']['birth_date'];?>" placeholder="<?echo (date("Y")-18); echo "-".date("m-d");?>">
					    	</div>
				  	</div>				
					<div class="form-group">
					    	<?php $item_list = array('f'=>'Female','m'=>'Male');  $this->request->data['gender']=$user['User']['gender'];
							 echo $this->Form->input('gender', array('type'=>'select','options'=>array($item_list), 'id'=>'gender', 'class'=>'form-control valid', 'label'=>'Gender', 'empty'=>'Choose Gender...',)); 
							?>
				  	</div>
		
					<div class="form-group">
						 <?php $this->request->data['country_id']=$user['Country']['id'];  echo $this->Form->input('country_id',array('label'=>'Country','class'=>'form-control','id'=>'country')); ?>
					</div>
					<div class="form-group">

						<input type="hidden" id="attr" name="attr" value="profile_update" />
					</div>
					<div class="form-group action">
						<input type="submit" class="btn btn-success" id="updateButton" value="Save changes" />
					</div>
			</div>

		</div>
	</div>
<?php echo $this->Html->css(array('business/dashboard/vendor/datepicker')); ?>
<?php echo $this->Html->script(array('business/dashboard/bootstrap/bootstrap-datepicker')); ?>
</body>