<body id="account">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar',array('active'=>'notification','bar'=>'setting'));?>		
		<div id="content">
				<?php  echo $this->element('business/dashboard/sidebar_setting', array('active'=>'notification'));?>
			<div id="panel" class="notifications">
				<h3>
					Email Notification Settings
				</h3>

				<div class="settings">
					<form action="#">
						<div class="digest">
							<h4>Daily digest</h4>
							<div class="row">
								<div class="col-md-9">
									<p>
										An email with all your activities for today and a summary of what was done yesterday directly to your email's inbox.
									</p>
								</div>
								<div class="col-md-3">
									<select data-smart-select>
										<option>Never receive</option>
										<option>Every day</option>
										<option>Every Week</option>
									</select>
								</div>
							</div>
						</div>
  <?php if(!isset($user_perms))$user_perms=array(); ?>

						<div class="types">
							<section>
								<div class="title">Notify Me</div>

								<div class="row">
									<div class="col-sm-8">
										I got a new follower
									</div>
									<div class="col-sm-4">
										<input type="checkbox" name="permission" data-switch value="2" <?php if(!in_array(2,$user_perms)) echo 'checked'; ?> />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Comments on a post I created
									</div>
									<div class="col-sm-4">
										<input type="checkbox" name="permission" data-switch value="6" <?php if(!in_array(6,$user_perms)) echo 'checked'; ?>/>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Comments on one of my games
									</div>
									<div class="col-sm-4">
										<input type="checkbox" name="permission" data-switch value="12" <?php if(!in_array(12,$user_perms)) echo 'checked'; ?> />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										One of my games get rated
									</div>
									<div class="col-sm-4">
										<input type="checkbox" name="permission" data-switch value="4" <?php if(!in_array(4,$user_perms)) echo 'checked'; ?> />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Favorite one of my games
									</div>
									<div class="col-sm-4">
										<input type="checkbox" name="permission" data-switch value="7" <?php if(!in_array(7,$user_perms)) echo 'checked'; ?>/>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Clone one of my games
									</div>
									<div class="col-sm-4">
										<input type="checkbox" name="permission" data-switch value="3" <?php if(!in_array(3,$user_perms)) echo 'checked'; ?> />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Mentions me in a post
									</div>
									<div class="col-sm-4">
										<input type="checkbox" name="permission" data-switch value="5" <?php if(!in_array(5,$user_perms)) echo 'checked'; ?> />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Someone hashtag my games
									</div>
									<div class="col-sm-4">
										<input type="checkbox" name="permission" data-switch value="8" <?php if(!in_array(8,$user_perms)) echo 'checked'; ?> />
									</div>
								</div>
							</section>
							<input type="hidden" id="attr" name="attr" value="notification_update" />
						</div>

						<div class="actions">
							<input class="btn btn-primary" id="updateButton" value="Save changes" />
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
<?php echo $this->Html->css(array('business/dashboard/vendor/bootstrap-switch.min')); ?>
</body>