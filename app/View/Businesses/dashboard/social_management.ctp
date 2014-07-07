<body id="account">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>

		<div id="content">
				<?php  echo $this->element('business/dashboard/sidebar_setting',array('active'=>'social_management'));?>
			<div id="panel" class="profile">
				<h3>
					Social Management Settings
				</h3>
				<p class="intro">
<!--					Change your account information, login credentials, etc.-->
				</p>
<form id="social_management" role="form" novalidate="novalidate">
				  	<div class="form-group">
						<label>Facebook Page</label>
						<input type="text" class="form-control" id="fb_link" value="<?php echo $user['User']['fb_link'];?>" />
					</div>
				  	<div class="form-group">
						<label>Twitter page</label>
						<input type="text" class="form-control" id="twitter_link" value="<?php echo $user['User']['twitter_link'];?>" />
					</div>
				  	<div class="form-group">
						<label>Google +</label>
						<input type="text" class="form-control" id="gplus_link" value="<?php echo $user['User']['gplus_link'];?>" />
					</div>
				  	<div class="form-group">
						<label>Web Site</label>
						<input type="text" class="form-control" id="website" value="<?php echo $user['User']['website'];?>" />
					</div>


					<div class="form-group">
						<input type="hidden" id="attr" name="attr" value="social_management" />
					</div>
					<div class="form-group action">
						<input type="submit" class="btn btn-success" id="updateButton" value="Save changes" />
					</div>
</form>					
			</div>
		</div>
	</div>
</body>