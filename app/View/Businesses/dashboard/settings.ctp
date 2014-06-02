<?php 
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
  if($user['User']['picture']==null) { 
    $img = $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'img-responsive img-circle',"alt" => "clone user image")); 
    } else {
      $img = $this->Upload->image($user,'User.picture',array(),array('class'=>'img-responsive img-circle','onerror'=>'imgError(this,"avatar");'));
	}
?>
<body id="account">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>

		<div id="content">
			<div id="sidebar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>
				
				<h3>My account</h3>
				<ul class="menu">
					<li>
						<a href="account-profile.html" class="active">
							<i class="ion-ios7-person-outline"></i>
							Profile
						</a>
					</li>
					<li>
						<a href="account-profile.html">
							<i class="fa fa-desktop"></i>
							Channel
						</a>
					</li>
					<li>
						<a href="account-billing.html">
							<i class="ion-card"></i>
							Billing
						</a>
					</li>
					<li>
						<a href="account-notifications.html">
							<i class="ion-ios7-email-outline"></i>
							Notifications
						</a>
					</li>
					<li>
						<a href="account-support.html">
							<i class="ion-ios7-help-outline"></i>
							Support
						</a>
					</li>
				</ul>
			</div>

			<div id="panel" class="profile">
				<h3>
					Profile settings
				</h3>
					<?// print_r($user);?>
				<p class="intro">
					Change your account information, avatar, login credentials, etc.
				</p>

				<form>
					<div class="form-group avatar-field clearfix">
					    <div class="col-sm-3">
							<?=$img;?>
					    	<!--<img class="" width="128" src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/hellboy_toork_original.jpg" />-->
					    </div>
					    <div class="col-sm-9">
					    	<label>Set up your avatar picture</label>
					      	<input type="file" />
					    </div>
				  	</div>
				  	<div class="form-group">
						<label>Username</label>
						<input type="email" class="form-control" disabled="disabled" placeholder="Enter email" value="<?=$user['User']['username'];?>" />
					</div>
				  	<div class="form-group">
						<label>Email address</label>
						<input type="email" class="form-control" placeholder="Enter email" value="<?=$user['User']['email'];?>" />
					</div>
					<div class="form-group">
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
					</div>
					<div class="form-group">
						<label>Street & Number</label>
						<input type="text" class="form-control" placeholder="Enter Street" value="5th Avenue 3053" />
					</div>
					<div class="form-group">
						<label>Ülke</label>
						<input type="text" class="form-control" placeholder="Enter Country" value="<?=$user['Country']['name'];?>"" />
					</div>
					<div class="form-group">
						<label>ZIP</label>
						<input type="text" class="form-control" placeholder="Enter email" value="3352" />
					</div>
					<div class="form-group">
						<label>New password</label>
						<input type="password" class="form-control" />
					</div>
					<div class="form-group">
						<label>Confirm new password</label>
						<input type="password" class="form-control" />
					</div>
					<div class="form-group action">
						<input type="submit" class="btn btn-success" value="Save changes" />
					</div>
				</form>
			</div>

		</div>
	</div>
</body>
