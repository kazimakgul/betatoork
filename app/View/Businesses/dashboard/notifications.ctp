<body id="account">
	<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar');?>		
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

						<div class="types">
							<h4>
								Types
							</h4>
							<section>
								<div class="title">In-app</div>

								<div class="row">
									<div class="col-sm-8">
										New comments on my posts
									</div>
									<div class="col-sm-4">
										<input type="checkbox" data-switch value="3" checked />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Assigned to new projects
									</div>
									<div class="col-sm-4">
										<input type="checkbox" data-switch value="3" />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Order updates
									</div>
									<div class="col-sm-4">
										<input type="checkbox" data-switch value="3" checked />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										New invitations 
									</div>
									<div class="col-sm-4">
										<input type="checkbox" data-switch value="3" checked />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Mentions you in a comment
									</div>
									<div class="col-sm-4">
										<input type="checkbox" data-switch value="3" />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Product is deleted
									</div>
									<div class="col-sm-4">
										<input type="checkbox" data-switch value="3" checked />
									</div>
								</div>
							</section>
							<section>
								<div class="title">News</div>

								<div class="row">
									<div class="col-sm-8">
										New updates
									</div>
									<div class="col-sm-4">
										<input type="checkbox" data-switch value="3" checked />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Recommendations & tips
									</div>
									<div class="col-sm-4">
										<input type="checkbox" data-switch value="3" />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8">
										Offers
									</div>
									<div class="col-sm-4">
										<input type="checkbox" data-switch value="3" checked />
									</div>
								</div>
							</section>
						</div>

						<div class="actions">
							<input class="btn btn-primary" type="submit" value="Save changes" />
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
<?php echo $this->Html->css(array('business/dashboard/vendor/bootstrap-switch.min')); ?>
</body>