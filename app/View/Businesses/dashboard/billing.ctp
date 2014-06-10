<body id="account">
	<div id="wrapper">

        <?php echo $this->element('business/dashboard/sidebar'); ?>

		<div id="content">

<?php  echo $this->element('business/dashboard/sidebar_setting',array('active'=>'billing'));?>

			<div id="panel" class="billing">
				<h3>
					Billing & Payments
				</h3>

				<div class="plan">

					<div class="current-plan">
						<div class="field">
							<label>Plan:</label> Team Subscription ($29.00/month)
							<a href="pricing-alt.html" class="change-plan">
								Change plan
								<i class="ion-edit"></i>
							</a>
						</div>

						<div class="field">
							<label>Users invited:</label> 5 / 15
						</div>
						
						<div class="field">
							<label>Member since:</label> Mar 15, 2013
						</div>

						<div class="field status">
							<label>Status:</label> <span class="value">Active</span>
						</div>
					</div>

					<div class="current-cc">
						<label>Current credit card:</label> 
						<img src="http://wolfadmin.herokuapp.com/assets/visa-5fc1888e5c31ba703807afdd864e94b9.png" />
						<strong>Visa</strong> ending in <strong>0328.</strong>
						<a href="#" class="manage-cc">
							Manage credit card
							<i class="ion-edit"></i>
						</a>
						<span class="next">(next payment on <strong>Mar 02, 2014</strong>).</span>
					</div>


					<!-- <a class="btn btn-danger suspend-sub" href="#">Suspend my subscription</a> -->

					<div class="invoices">
						<h3>Invoices</h3>

						<table class="table">
							<tr>
								<td>
									Date
								</td>
								<td>
									Amount
								</td>
								<td>
									Due
								</td>
								<td></td>
							</tr>
							<tr>
								<td>
									<a href="invoice.html">Nov 13, 2014 - Dec 13, 2014</a>
								</td>
								<td>
									$29.00 USD
								</td>
								<td>
									2014-11-13
								</td>
								<td>
									<a href="#">download</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="invoice.html">Oct 13, 2014 - Nov 13, 2014</a>
								</td>
								<td>
									$29.00 USD
								</td>
								<td>
									2014-10-13
								</td>
								<td>
									<a href="#">download</a>
								</td>
							</tr>
							<tr>
								<td>
									<a href="invoice.html">Sep 13, 2014 - Oct 13, 2014</a>
								</td>
								<td>
									$29.00 USD
								</td>
								<td>
									2014-09-13
								</td>
								<td>
									<a href="#">download</a>
								</td>
							</tr>
						</table>
					</div>
				</div>
				
			</div>

		</div>
	</div>

</body>