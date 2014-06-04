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
				<?php  echo $this->element('business/dashboard/sidebar_setting');?>
			<div id="panel" class="profile">
				<h3>
					Profile settings
				</h3>
				<p class="intro">
					Change your account information, avatar, login credentials, etc.
				</p>

					<div class="form-group avatar-field clearfix">
					    <div class="col-sm-3">
							<?=$img;?>
					    </div>
					    <div class="col-sm-9">
					    	<label>Set up your avatar picture</label>
					      	<input type="file"/>
					    </div>
				  	</div>
				  	<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" disabled="disabled" value="<?=$user['User']['username'];?>" />
					</div>
				  	<div class="form-group">
						<label>Email address</label>
						<input type="email" class="form-control" disabled="disabled" value="<?=$user['User']['email'];?>" />
					</div>
					<div class="form-group">
					    <label for="inputPassword3" >Brithday</label>
					    	<div class="input-group">
							  	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							  	<input type="text" class="form-control datepicker" id="user_time_zone" value="" placeholder="<?=date("Y-m-d");?>">
					    	</div>
				  	</div>				
					<!--<div class="form-group">
						<label>Timezone</label>
						<select id="user_time_zone" data-smart-select>
							<option value="Hawaii">(GMT-10:00) Hawaii</option>
							<option value="Alaska">(GMT-09:00) Alaska</option>
							<option value="Pacific Time (US &amp; Canada)">
								(GMT-08:00) Pacific Time (US &amp; Canada)
							</option>
							<option value="Arizona">(GMT-07:00) Arizona</option>
							<option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
							<option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
							<option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
							<option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
							<option value="" disabled="disabled">-------------</option>
							<option value="American Samoa">(GMT-11:00) American Samoa</option>
							<option value="International Date Line West">(GMT-11:00) International Date Line West</option>
							<option value="Midway Island">(GMT-11:00) Midway Island</option>
							<option value="Tijuana">(GMT-08:00) Tijuana</option>
							<option value="Chihuahua">(GMT-07:00) Chihuahua</option>
							<option value="Mazatlan">(GMT-07:00) Mazatlan</option>
							<option value="Central America">(GMT-06:00) Central America</option>
							<option value="Guadalajara">(GMT-06:00) Guadalajara</option>
							<option value="Mexico City">(GMT-06:00) Mexico City</option>
							<option value="Monterrey" >(GMT-06:00) Monterrey</option>
						</select>
					</div>-->
					
					<div class="form-group">
						<label>Street & Number</label>
						<input type="text" class="form-control" id="street" placeholder="Enter Street" value="5th Avenue 3053" />
					</div>
					<div class="form-group">
						<label>Ülke</label>
						<input type="text" class="form-control" id="country" placeholder="Enter Country" value="<?=$user['Country']['name'];?>" />
					</div>
					<div class="form-group">
						<label>ZIP</label>
						<input type="text" class="form-control" id="zip" placeholder="Enter zip code" value="3352" />
					</div>
					<div class="form-group">
						<label>New password</label>
						<input type="password" id="pass" class="form-control" />
					</div>
					<div class="form-group">
						<label>Confirm new password</label>
						<input type="password" class="form-control" />
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
