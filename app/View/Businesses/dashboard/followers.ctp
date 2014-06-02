<body id="users">
	<div id="wrapper">

<?php  echo $this->element('business/dashboard/sidebar');?>

		<div id="content">
			<div class="menubar fixed">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>
				
				<div class="page-title">
					Channels
				</div>
				<form class="search hidden-xs">
					<i class="fa fa-search"></i>
					<input type="text" name="q" placeholder="Search channels, users..." />
					<input type="submit" />
				</form>
				<a href="form.html" class="new-user btn btn-success pull-right">
					<span>Invite Friends</span>
				</a>
			</div>

			<div class="content-wrapper">
				<div class="row page-controls">
					<div class="col-md-12 filters">
						<label>Filter Followers:</label>
						<a href="#">All Followers (243)</a>
						<a href="#" class="active">Verified (3)</a>
						<a href="#">High Rated (8)</a>
						<a href="#">Prospects</a>

						<div class="show-options">
							<div class="dropdown">
							  	<a class="button" data-toggle="dropdown" href="#">
							  		<span>
							  			Sort by
							  			<i class="fa fa-unsorted"></i>
							  		</span>
							  	</a>
							  	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							    	<li><a href="#">Name</a></li>
									<li><a href="#">Signed up</a></li>
									<li><a href="#">Last seen</a></li>
									<li><a href="#">Browser</a></li>
									<li><a href="#">Country</a></li>
							  	</ul>
							</div>
							<a href="#" data-grid=".users-list" class="grid-view active"><i class="fa fa-th-list"></i></a>
							<a href="#" data-grid=".users-grid" class="grid-view"><i class="fa fa-th"></i></a>
						</div>
					</div>
				</div>

				<div class="row users-list">
					<div class="col-md-12">
						<div class="row headers">
							<div class="col-sm-2 header select-users">
								<input type="checkbox" />
								<div class="dropdown bulk-actions">
									<a data-toggle="dropdown" href="#">
								  		Bulk actions
								  		<span class="total-checked"></span>

								  		<i class="fa fa-chevron-down"></i>
								  	</a>
								  	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								    	<li><a href="#">Add tags</a></li>
										<li><a href="#">Delete users</a></li>
										<li><a href="#">Edit customers</a></li>
										<li><a href="#">Manage permissions</a></li>
								  	</ul>
								</div>
							</div>
							<div class="col-sm-3 header hidden-xs">
								<label><a href="#">Name</a></label>
							</div>
							<div class="col-sm-3 header hidden-xs">
								<label><a href="#">Followers</a></label>
							</div>
							<div class="col-sm-2 header hidden-xs">
								<label><a href="#">Following</a></label>
							</div>
							<div class="col-sm-2 header hidden-xs">
								<label class="text-right"><a href="#">Games</a></label>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/hellboy_toork_original.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">Socialesman</a>
							</div>
							<div class="col-sm-3">
								<div class="email">177</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									20132
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									244
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/hellboy_toork_original.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">Richard Moore Stevens</a>
							</div>
							<div class="col-sm-3">
								<div class="email">richard@hotmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$1,200.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 25, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/hellboy_toork_original.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">
									Karen Jessica Lawrence
									<span class="label label-info">New user</span>
								</a>
							</div>
							<div class="col-sm-3">
								<div class="email">karen@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$400.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 25, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/1.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">John Smith Stewart</a>
							</div>
							<div class="col-sm-3">
								<div class="email">john.smith@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$3,150.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 22, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/5.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">
									Richard Moore
									<span class="label label-warning">Order pending</span>
								</a>
							</div>
							<div class="col-sm-3">
								<div class="email">rick98@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$89.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 17, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/6.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">Karen Jessica Lawrence</a>
							</div>
							<div class="col-sm-3">
								<div class="email">lawrence@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$399.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 14, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/7.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">Eric McKellen</a>
							</div>
							<div class="col-sm-3">
								<div class="email">eric@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$5,900.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 11, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/8.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">George Lucas Francois</a>
							</div>
							<div class="col-sm-3">
								<div class="email">george@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$280.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 09, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/9.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">Maria Harrison</a>
							</div>
							<div class="col-sm-3">
								<div class="email">maria.01@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$19,000.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 09, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/10.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">
									Butch Robertson
									<span class="label label-info">New user</span>
								</a>
							</div>
							<div class="col-sm-3">
								<div class="email">butch@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$8,900.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 03, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/11.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">Richard Dawkins</a>
							</div>
							<div class="col-sm-3">
								<div class="email">dawkins@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$2,600.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Feb 01, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/12.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">Andrea Kotrevzka</a>
							</div>
							<div class="col-sm-3">
								<div class="email">andrea@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$799.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Jan 28, 2014
								</div>
							</div>
						</div>
						<div class="row user">
							<div class="col-sm-2 avatar">
								<input type="checkbox" name="select-user" />
								<img src="images/avatars/13.jpg" />
							</div>
							<div class="col-sm-3">
								<a href="user-profile.html" class="name">Robert Diaz</a>
							</div>
							<div class="col-sm-3">
								<div class="email">robert.diaz@gmail.com</div>
							</div>
							<div class="col-sm-2">
								<div class="total-spent">
									$900.00
								</div>
							</div>
							<div class="col-sm-2">
								<div class="created-at">
									Jan 27, 2014
								</div>
							</div>
						</div>

						<div class="row pager-wrapper">
							<div class="col-sm-12">
								<ul class="pager">
								  	<li><a href="#">Previous</a></li>
								  	<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="row users-grid">
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/2.jpg" />
						</a>
						<div class="name">John Smith Stewart</div>
						<div class="email">john.39@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/3.jpg" />
						</a>
						<div class="name">Richard Moore Stevens</div>
						<div class="email">richard@hotmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/4.jpg" />
						</a>
						<div class="name">Karen Jessica Lawrence</div>
						<div class="email">karen@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/1.jpg" />
						</a>
						<div class="name">John Smith Stewart</div>
						<div class="email">john.smith@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/5.jpg" />
						</a>
						<div class="name">Richard Moore Stevens</div>
						<div class="email">rick98@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/6.jpg" />
						</a>
						<div class="name">Karen Jessica Lawrence</div>
						<div class="email">lawrence@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/7.jpg" />
						</a>
						<div class="name">Eric McKellen</div>
						<div class="email">eric@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/8.jpg" />
						</a>
						<div class="name">George Lucas Francois</div>
						<div class="email">george@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/9.jpg" />
						</a>
						<div class="name">Maria Harrison</div>
						<div class="email">maria.01@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/10.jpg" />
						</a>
						<div class="name">Richard Dawkins</div>
						<div class="email">dawkins@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/11.jpg" />
						</a>
						<div class="name">Andrea Kotrevzka</div>
						<div class="email">andrea@gmail.com</div>
					</div>
					<div class="user col-sm-3 col-xs-6">
						<a href="#">
							<img src="images/avatars/12.jpg" />
						</a>
						<div class="name">Robert Diaz</div>
						<div class="email">robert.diaz@gmail.com</div>
					</div>

					<div class="pager-wrapper">
						<div class="col-sm-12">
							<ul class="pager">
							  	<li><a href="#">Previous</a></li>
							  	<li><a href="#">Next</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="skin-switcher">
		<div class="toggler">
			<i class="brankic-brush"></i>
		</div>
		<ul class="menu">
			<li>
				<a class="active" data-skin="sidebar-default" href="#">
					<span class="color default"></span> Default
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-clear" href="#">
					<span class="color clear"></span> Clear
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-black" href="#">
					<span class="color black"></span> Black
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-dark" href="#">
					<span class="color dark"></span> Dark
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-flat" href="#">
					<span class="color flat"></span> Flat
					<i class="fa fa-check"></i>
				</a>
			</li>
			<li>
				<a data-skin="sidebar-flat-dark" href="#">
					<span class="color flat-dark"></span> Flat dark
					<i class="fa fa-check"></i>
				</a>
			</li>
		</ul>
	</div>

	<script type="text/javascript">
		$(function () {
			// User list checkboxes
			var $allUsers = $(".select-users input:checkbox");
			var $checkboxes = $("[name='select-user']");

			$allUsers.change(function () {
				var checked = $allUsers.is(":checked");
				if (checked) {
					$checkboxes.prop("checked", "checked");
					toggleBulkActions(checked, $checkboxes.length);
				} else {
					$checkboxes.prop("checked", "");
					toggleBulkActions(checked, 0);
				}
			});

			$checkboxes.change(function () {
				var anyChecked = $(".user [name='select-user']:checked");
				toggleBulkActions(anyChecked.length, anyChecked.length);
			});

			function toggleBulkActions(shouldShow, checkedCount) {
				if (shouldShow) {
					$(".users-list .header").hide();
					$(".users-list .header.select-users").addClass("active").find(".total-checked").html("(" + checkedCount + " total users)");

				} else {
					$(".users-list .header").show();
					$(".users-list .header.select-users").removeClass("active");
				}
			}


			// Grid switcher
			$btns = $(".grid-view");
			$views = $(".users-view");

			$btns.click(function (e) {
				e.preventDefault();
				$btns.removeClass("active");
				$(this).addClass("active");
				
				$views.removeClass("active");
				
				$(".users-grid").hide();
				$(".users-list").hide();

				$($(this).data("grid")).show();
			});
		})
	</script>
</body>