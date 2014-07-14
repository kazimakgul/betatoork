<body id="account">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>

		<div id="content">
				<?php  echo $this->element('business/dashboard/sidebar_setting',array('active'=>'password_change'));?>
			<div id="panel" class="profile">
				<h3>
					Change Password
				</h3>
				<p class="intro">
<!--					Change your account information, login credentials, etc.-->
				</p>
<form id="password_change" role="form">
				  	<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="old_pass" id="old_pass" value="" />
					</div>
				  	<div class="form-group">
						<label>New Password</label>
						<input type="password" class="form-control" name="new_pass" id="new_pass" value="" />
					</div>
				  	<div class="form-group">
						<label>Confirm New Password</label>
						<input type="password" class="form-control" name="conf_pass" id="conf_pass" value="" />
					</div>
					<div class="form-group">
						<input type="hidden" id="attr" name="attr" value="password_change" />
					</div>
					<div class="form-group action">
						<input type="submit" class="btn btn-success" id="updateButton" value="Save changes" />
					</div>
</form>					
			</div>
		</div>
	</div>
</body>