<body id="latest-activity">
	<div id="wrapper">
<?php echo $this->element('business/dashboard/sidebar',array('active'=>'activities')); ?>

		<div id="content">
			<div class="menubar">
				<div class="sidebar-toggler visible-xs">
					<i class="ion-navicon"></i>
				</div>

				<div class="page-title">
					Recent Activity Feed
				</div>
			</div>

			<div class="content-wrapper">
				<!-- Single button -->
				<div class="filter-user btn-group">
				  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				    	Filter by user <span class="caret"></span>
				  	</button>
				  	<ul class="dropdown-menu" role="menu">
				    	<li><a href="#">Jessie</a></li>
				    	<li><a href="#">Robb Stark</a></li>
					    <li><a href="#">Anna Sophia</a></li>
				  	</ul>
				</div>
				<h3>
					Today
					<small>August 03, 2014</small>
				</h3>
				<div class="moment first">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon">
								<i class="fa fa-comment"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="http://wolfadmin.herokuapp.com/assets/avatars/16-d920ead0154f6f2b29f34c811d563245.jpg" />
							<div class="content">
								<strong>John Smith</strong> commented on your thread <a href="#">What's up guys</a>.
							</div>
						</div>
					</div>
				</div>
				<div class="moment">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon violet">
								<i class="fa fa-upload"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="http://wolfadmin.herokuapp.com/assets/avatars/15-0dcff0b0e87ac1437ea09bcb51c642b4.jpg" />

							<div class="content">
								<strong>Jessie</strong> uploaded 3 files.
								<div class="files">
									<div class="file">
										<img class="img-responsive" src="http://wolfadmin.herokuapp.com/assets/avatars/15-0dcff0b0e87ac1437ea09bcb51c642b4.jpg" />

										<span class="name">
											Some cool file name
										</span>
									</div>
									<div class="file">
										<img class="img-responsive" src="http://wolfadmin.herokuapp.com/assets/avatars/15-0dcff0b0e87ac1437ea09bcb51c642b4.jpg" />

										<span class="name">
											Website design screenshot
										</span>
									</div>
									<div class="file">
										<img class="img-responsive" src="http://wolfadmin.herokuapp.com/assets/avatars/15-0dcff0b0e87ac1437ea09bcb51c642b4.jpg" />

										<span class="name">
											New Dashboard panel
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="moment">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon purple">
								<i class="fa fa-quote-left"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="http://wolfadmin.herokuapp.com/assets/avatars/16-d920ead0154f6f2b29f34c811d563245.jpg" />
							<div class="content">
								<strong>Robb Stark</strong> added a new note on project <a href="#">Web design</a>.

								<p>
									I want everything we do to be beautiful. I don’t give a damn whether the client understands that that’s worth anything, or that the client thinks it’s worth anything, or whether it is worth anything. It’s worth it to me. It’s the way I want to live my life. I want to make beautiful things, even if nobody cares.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="moment">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon violet">
								<i class="fa fa-upload"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="http://wolfadmin.herokuapp.com/assets/avatars/16-d920ead0154f6f2b29f34c811d563245.jpg" />
							<div class="content">
								<strong>Ana Sophia</strong> uploaded a text file <a href="#">site_documentation.txt</a> from Google Drive.

								<div class="big-file clearfix">
									<img src="http://wolfadmin.herokuapp.com/assets/avatars/16-d920ead0154f6f2b29f34c811d563245.jpg" />
									<a href="#" class="name">
										New Website Project Documentation for the team
									</a>
									<div class="size">
										20/01/2014. 135 KB.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="moment">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon">
								<i class="fa fa-comment"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="images/avatars/17.jpg" />
							<div class="content">
								<strong>George Smith</strong> made 2 comments on project <a href="#">PSD to HTML</a>.
								<p class="border-bottom">
									<span class="date">2 hours ago</span>
									You have to roll up your sleeves and be a stonecutter before you can become a sculptor – command of craft always precedes art: apprentice, journeyman, master.
								</p>
								<p>
									<span class="date">5 hours ago</span>
									It doesn’t matter one damn bit whether fashion is art or not. You don’t question whether an incredible chef is an artist or not – his cakes are delicious and that’s all that matters.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="moment">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon">
								<i class="fa fa-comment"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="images/avatars/8.jpg" />
							<div class="content">
								<strong>Brandon Johnson</strong> added a new comment on project <a href="#">This is great</a>.
								<p>
									Some people say design is about solving problems. Obviously designers solve problems but so do dentists. Design is about cultural invention.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="moment">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon yellow">
								<i class="fa fa-check"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="images/avatars/9.jpg" />
							<div class="content">
								<strong>Ana Sophia</strong> completed <a href="#">4 tasks</a>.
							</div>
						</div>
					</div>
				</div>
				<div class="moment last">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon dark">
								<i class="fa fa-files-o"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="images/avatars/17.jpg" />
							<div class="content">
								<strong>George Smith</strong> uploaded <a href="#">8 files</a>.
							</div>
						</div>
					</div>
				</div>
				<h3>
					Last week
					<small>July 23 - August 02, 2014</small>
				</h3>
				<div class="moment first">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon">
								<i class="fa fa-comment"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="images/avatars/10.jpg" />
							<div class="content">
								<strong>John Smith</strong> commented on your thread <a href="#">What's up guys</a>.
							</div>
						</div>
					</div>
				</div>
				<div class="moment">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon violet">
								<i class="fa fa-upload"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="images/avatars/15.jpg" />

							<div class="content">
								<strong>Jessie</strong> uploaded 3 files.
								<div class="files">
									<div class="file">
										<img class="img-responsive" src="images/shots/4.png" />

										<span class="name">
											Some cool file name
										</span>
									</div>
									<div class="file">
										<img class="img-responsive" src="images/shots/5.png" />

										<span class="name">
											Website design screenshot
										</span>
									</div>
									<div class="file">
										<img class="img-responsive" src="images/shots/6.jpg" />

										<span class="name">
											New Dashboard panel
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="moment last">
					<div class="row event clearfix">
						<div class="col-sm-1">
							<div class="icon purple">
								<i class="fa fa-quote-left"></i>
							</div>
						</div>
						<div class="col-sm-11 message">
							<img class="avatar" src="images/avatars/16.jpg" />
							<div class="content">
								<strong>Anna Sophia</strong> added a new note on project <a href="#">Web design</a>.

								<p>
									I want everything we do to be beautiful. I don’t give a damn whether the client understands that that’s worth anything, or that the client thinks it’s worth anything, or whether it is worth anything. It’s worth it to me.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

</body>