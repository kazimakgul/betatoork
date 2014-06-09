<body id="status">

	<div id="update">
		<div class="container">
			<header>
				<a href="#" onclick="history.go(-1);return false;">
					← Return to dashboard
				</a>
				<a href="#" class="pull-right">
					<i class="fa fa-rss"></i>
					Subscribe to notifications
				</a>
			</header>
			<div class="row header">
				<h3>Clone System Status</h3>
				<p>Current status and incident report</p>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="current-status">
						<span class="updated">
							Updated 2 minutes ago
						</span>
						<div class="status">
							<div class="color green"></div>
							All sistems operational
						</div>
						<div class="help">
							Need help? <a href="contactus.html">Contact us</a>.
						</div>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 info">
					<strong>What is this site?</strong>

					<p>
						In here you can show the status of your website or application to your users. You can 
						explain if there are any interruptions or problems in any given time and all the updates.
						You can also explain how they can get in touch if they are having some problems that
						are not related to any problems shown here.
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
					    	<div class="status down">Down</div>
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
							<div class="day">Yesterday, October 25 2013</div>
							<p class="ok">
								All systems operational
							</p>
						</div>
						<div class="date">
							<div class="day">October 04 2013</div>
							<p class="ok">
								All systems operational
							</p>
						</div>
						<div class="date">
							<div class="day">October 03 2013</div>
							<p class="ok">
								All systems operational
							</p>
						</div>
						<div class="date">
							<div class="day">October 02 2013</div>
							<p class="issues">
								Application deployment issues
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