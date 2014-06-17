
<body id="wizard">
	<div id="wrapper">

	<?php echo $this->element('business/dashboard/sidebar',array('active'=>'dashboard')); ?>
	
		<div id="content">

			<div class="content-wrapper">
				<div class="header">
					<div class="sidebar-toggler visible-xs">
						<i class="ion-navicon"></i>
					</div>

					<div class="steps clearfix">
						<div class="step active">
							Setup your channel
							<span></span>
						</div>
						<div class="step">
							Add/Clone Games
							<span></span>
						</div>
						<div class="step">
							Follow Channels
							<span></span>
						</div>
						<div class="step">
							Finish
							<span></span>
						</div>
					</div>
				</div>

				<section class="form-wizard">

					<form id="new-customer" method="post" action="#" role="form">
						<div class="step active animated fadeInRightStep">
							<div class="form-group">
							    <label>Full name</label>
							    <input type="text" class="form-control" name="customer[first_name]" />
						  	</div>
						  	<div class="form-group">
							    <label>Email address</label>
							    <input type="text" class="form-control" name="customer[email]" />
						  	</div>
						  	<div class="form-group">
							    <label>Password</label>
							   	<input type="password" class="form-control" name="customer[password]" />
							</div>
							<div class="form-group">
							    <label>Confirm Password</label>
							   	<input type="password" class="form-control" name="customer[password_confirmation]" />
							</div>
						  	<div class="form-group">
							    <label for="inputPassword3">Extra notes</label>
							    <textarea class="form-control" rows="4" name="customer[notes]"></textarea>
						  	</div>
						  	<div class="form-group form-actions">
					      		<button type="submit" class="button" data-step="2">
					      			<span>Next Step <i class="fa fa-angle-double-right"></i></span>
					      		</button>
						  	</div>
						</div>
						<div class="step">
							<div class="form-group">
							    <label>Username</label>
							    <input type="text" class="form-control" name="customer[username]" />
						  	</div>
						  	<div class="form-group">
							    <label>Display picture</label>
							    <div class="display-field clearfix">
							    	<div class="display">
								    	<span>100x100</span>
								    </div>
								    <input type="file" name="customer[display]" />
							    </div>
						  	</div>
						  	<div class="form-group">
							    <label>Application name</label>
							   	<input type="text" class="form-control" name="customer[]" />
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
						  	<div class="form-group form-actions">
						  		<a class="button" href="#" data-step="1">
						  			<span><i class="fa fa-angle-double-left"></i> Back</span>
						  		</a>
					      		<button type="submit" class="button" data-step="3">
					      			<span>Next Step <i class="fa fa-angle-double-right"></i></span>
					      		</button>
						  	</div>
						</div>
						<div class="step">
							<div class="form-group">
							    <label>Add/Clone Games</label>
							    <select data-smart-select>
                                    <option value="1">Basic - $19.00/month (USD)</option>
                                    <option value="2">Pro - $39.00/month (USD)</option>
                                    <option value="3">Premium - $59.00/month (USD)</option>
                                    <option value="4">Enterprise - $129.00/month (USD)</option>
                                </select>
						  	</div>
							<div class="form-group">
							    <label>Name on Card</label>
							    <input type="text" class="form-control" name="customer[first_name]" />
						  	</div>
						  	<div class="form-group">
							    <label>Credit Card Number</label>
							    <input type="text" class="form-control" name="customer[email]" />
						  	</div>
						  	<div class="form-group clearfix">
						  		<div class="column expiration-field">
						  			<label>Card Expiration</label>
								    <div class="clearfix">
								    	<input type="text" placeholder="MM" class="form-control" name="customer[password]" />
								   		<input type="text" placeholder="YYYY" class="form-control" name="customer[password]" />
								    </div>
						  		</div>
						  		<div class="column pull-right">
						  			<label>Card CVC Number</label>
							   		<input type="text" class="form-control" name="customer[password_confirmation]" />
						  		</div>
							</div>
						  	<div class="form-group form-actions">
						  		<a class="button" href="#" data-step="2">
						  			<span><i class="fa fa-angle-double-left"></i> Back</span>
						  		</a>
					      		<button type="submit" class="button" data-step="4">
					      			<span>Make payment <i class="fa fa-angle-double-right"></i></span>
					      		</button>
						  	</div>
						</div>
						<div class="step">
							<div class="success">
								<i class="ion-checkmark-circled"></i>
								<h3>
									Your account has been configured successfully!
								</h3>
								<a href="#" class="button">
									<span>Go to my channel</span>
								</a>
							</div>
						</div>
					</form>

				</section>

			</div>
		</div>
	</div>
</body>
