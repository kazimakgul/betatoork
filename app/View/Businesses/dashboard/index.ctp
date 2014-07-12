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
						<span class="data">$<?php echo $stat['Userstat']['potential']/100;?></span>
					</div>
					<div class="metric">
						<span class="field">Total Followers</span>
						<span class="data"><?php echo $stat['Userstat']['subscribeto'];?></span>
					</div>
					<div class="metric">
						<span class="field">Game Clones</span>
						<span class="data"><?php echo $stat['Userstat']['uploadcount'];?></span>
					</div>
					<div class="metric">
						<span class="field">Game Plays</span>
						<span class="data"><?php echo $stat['Userstat']['playcount'];?></span>
					</div>
				</div>


<div class="container-fluid">
    <hr class="">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div style="padding:40px; background-size:contain;
background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/users/6/rsz_1how_to_play_pool1_original.png)" class="panel-heading">
                    
                </div>
					<a href="#">
			            <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive center-block avatar thumbnail" style="margin-top:-40px;" width="70px" height="70px">
					 </a>
                <div class="panel-body">
					<div style="margin-top:-20px;" class="text-center">
					<a class="btn btn-default"><i class="ion-person-add"></i> unfollow</a>
					</div>
					<h4><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span> <strong>MiniClip Games</strong> <br> <small>@miniclip</small></h4>
					<span class="label label-warning">215 Followers</span>
					<span class="label label-danger">59 Games</span>
				</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div style="padding:40px; background-color:#F7819F;" class="panel-heading">
                    
                </div>
					<a href="#">
			            <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive center-block avatar thumbnail" style="margin-top:-40px;" width="70px" height="70px">
					 </a>
                <div class="panel-body">
					<div style="margin-top:-20px;" class="text-center">
					<a class="btn btn-info"><i class="ion-person-add"></i> Follow</a>
					</div>
					<h4><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span> <strong>Socialesman</strong> <br> <small>@socialesman</small></h4>
					<span class="label label-warning">148 Followers</span>
					<span class="label label-danger">28 Games</span>
				</div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <div style="padding:40px; background-size:contain;
background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/users/2/gamebackground7_toork_original.gif)" class="panel-heading">
                    
                </div>
					<a href="#">
			            <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive center-block avatar thumbnail" style="margin-top:-40px;" width="70px" height="70px">
					 </a>
                <div class="panel-body">
					<div style="margin-top:-20px;" class="text-center">
					<a class="btn btn-info"><i class="ion-person-add"></i> Follow</a>
					</div>
					<h4><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span> <strong>Socialesman</strong> <br> <small>@socialesman</small></h4>
					<span class="label label-warning">148 Followers</span>
					<span class="label label-danger">28 Games</span>
				</div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="">Hello.</h3>
                </div>
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra
                    varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt
                    condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis
                    nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor
                    accumsan. Aliquam in felis sit amet augue.</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="">Hello.</h3>
                </div>
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra
                    varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt
                    condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis
                    nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor
                    accumsan. Aliquam in felis sit amet augue.</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="">Hello.</h3>
                </div>
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra
                    varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt
                    condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis
                    nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor
                    accumsan. Aliquam in felis sit amet augue.</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="">Hello.</h3>
                </div>
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra
                    varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt
                    condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis
                    nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor
                    accumsan. Aliquam in felis sit amet augue.</div>
            </div>
        </div>



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