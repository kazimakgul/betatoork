<?php
$ads_management	= $this->Html->url(array('controller'=>'businesses','action'=>'ads_management'));
$mygames = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
$explorechannels = $this->Html->url(array('controller' => 'businesses', 'action' => 'explorechannels'));
?>

<body id="dashboard">
<div id="wrapper">
		<?php  echo $this->element('business/dashboard/sidebar',array('active'=>'dashboard'));?>
		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Dashboard
				</div>


				<div class="pull-right hidden-xs">
					<a href="<?php echo $mygames; ?>" class="btn btn-warning"><i class="fa fa-gamepad"></i> Game Management</a>
					<a href="<?php echo $ads_management; ?>" class="btn btn-danger"><i class="fa fa-bar-chart-o"></i> Ads Management</a>
					<a href="<?php echo $explorechannels; ?>" class="btn btn-info"><i class="ion-person-add"></i> Explore Channels</a>
				</div>


				<!-- <div class="period-select hidden-xs">
					<form class="input-daterange ">
						<div class="input-group input-group-sm">
						  	<span class="input-group-addon">
						  		<i class="fa fa-calendar-o"></i>
						  	</span>
						  	<input name="start" type="text" class="form-control datepicker" placeholder="02/27/2014" />
						</div>
						
						<p class="pull-left">to</p>

						<div class="input-group input-group-sm">
						  	<span class="input-group-addon">
						  		<i class="fa fa-calendar-o"></i>
						  	</span>
						  	<input name="end" type="text" class="form-control datepicker" placeholder="02/27/2014" />
						</div>
					</form> 
				</div> -->
			</div>

			<div class="content-wrapper">
				<div class="metrics clearfix">
					<div class="metric">
						<span class="field">Total Reputation</span>
						<span class="data">$674.00</span>
					</div>
					<div class="metric">
						<span class="field">Total Followers</span>
						<span class="data">108</span>
					</div>
					<div class="metric">
						<span class="field">Game Clones</span>
						<span class="data">674</span>
					</div>
					<div class="metric">
						<span class="field">Game Plays</span>
						<span class="data">3,823</span>
					</div>
				</div>

				<div class="chart">
					<h3>
						Concurrent visitors last 2 weeks

						<div class="total pull-right hidden-xs">
							12,958 total
							
							<div class="change up">
								<i class="fa fa-chevron-up"></i>
								10%
							</div>
						</div>
					</h3>
					<div id="visitors-chart"></div>
				</div>

				<div class="charts-half clearfix">
					<div class="chart pull-left">
						<h3>
							Succesful payments

							<div class="total pull-right hidden-xs">
								$3,124.00 total
								
								<div class="change up">
									<i class="fa fa-chevron-up"></i>
									6.5%
								</div>
							</div>
						</h3>
						<div id="payments-chart"></div>
					</div>
					<div class="chart pull-right">
						<h3>
							New customers

							<div class="total pull-right hidden-xs">
								1,402 total
								
								<div class="change down">
									<i class="fa fa-chevron-down"></i>
									3.5%
								</div>
							</div>
						</h3>
						<div id="signups-chart"></div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="barchart">
							<h3>Visitors last month</h3>
							<div id="bar-chart"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="referrals">
							<h3>Top Referrals</h3>
							<div class="referral">
								<span>
									www.google.com

									<div class="pull-right">
										<span class="data">293</span>  67%
									</div>
								</span>
								<div class="progress">
								  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 67%">
								  	</div>
								</div>
							</div>
							<div class="referral">
								<span>
									www.facebook.com

									<div class="pull-right">
										<span class="data">104</span>  17%
									</div>
								</span>
								<div class="progress">
								  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 17%">
								  	</div>
								</div>
							</div>
							<div class="referral">
								<span>
									www.twitter.com

									<div class="pull-right">
										<span class="data">57</span>  10%
									</div>
								</span>
								<div class="progress">
								  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
								  	</div>
								</div>
							</div>
							<div class="referral">
								<span>
									www.instagram.com

									<div class="pull-right">
										<span class="data">29</span>  6%
									</div>
								</span>
								<div class="progress">
								  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 6%">
								  	</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

</div>
</body>