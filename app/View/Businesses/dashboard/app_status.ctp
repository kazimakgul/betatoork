<body id="status">

	<div id="update">
		<div class="container">
			<header>
				<a href="#" onclick="history.go(-1);return false;">
					← Return to dashboard
				</a>
				<!-- -- <a href="#" class="pull-right">
					<i class="fa fa-rss"></i>
					Subscribe to notifications
				</a> -- -->
			</header>
			<div class="row header">
				<h3>Clone System Status</h3>
				<p>Current status and incident report</p>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="current-status">
						<!-- <span class="updated">
							Updated 2 minutes ago
						</span> -->
						<div class="status">
							<div class="color green"></div>
							All sistems operational
						</div>
						<div class="help">
							Need help? <a href="#">Contact us</a>.
						</div>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 info">
					<strong>What is this for?</strong>

					<p>
						if all the system operating normally you will see a green light otherwise its going to be orange or red which will show that your application may have some operational issues. Thanks for you patience.
					</p>
				</div>
				<div class="col-md-12">
					<div class="panel panel-default modules">
					  <!-- List group -->
					  <ul class="list-group">
					    <li class="list-group-item">
					    	Web API
					    	<div class="status">Operational</div>
					    </li>
					    <li class="list-group-item">
					    	Notifications
					    	<div class="status down">Works with issues</div>
					    </li>
					    <li class="list-group-item">
					    	Application Monitoring
					    	<div class="status">Operational</div>
					    </li>
					    <li class="list-group-item">
					    	Browser Plugin
					    	<div class="status">Operational</div>
					    </li>
					    <!-- <li class="list-group-item">
					    	Backoffice Administration
					    	<div class="status">Operational</div>
					    </li> -->
					  </ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="messages">
						<h3>Messages</h3>
						<div class="date">
							<div class="day">Today</div>
							<p class="ok">
								All systems operational
							</p>
						</div>
						<div class="date">
							<div class="day">Yesterday, <?php echo date("F j, Y", strtotime("yesterday")); ?></div>
							<p class="ok">
								All systems operational
							</p>
						</div>
						<div class="date">
							<div class="day">A week ago, <?php echo date("F j, Y", strtotime("-6 days")); ?></div>
							<p class="ok">
								All systems operational
							</p>
						</div>
						<div class="date">
							<div class="day">Last month, <?php echo date("F j, Y", strtotime("-45 days")); ?></div>
							<p class="ok">
								All systems operational
							</p>
						</div>
						<div class="date">
							<div class="day">Agust 14-15 2012</div>
							<p class="issues">
								BirthDay : Application deployment issues
							</p>
							<p class="update">
								<strong>Resolved:</strong>
								We fixed the issues monitoring status, downtime was between 1pm and 5pm PT.
							</p>
							<p class="update">
								<strong>Investigating:</strong>
								We identified some issues deploying some applications and monitoring their status.
							</p>
						</div>
					</div>
					<div class="full-history">
						<a href="#">
							← See full incident history
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>