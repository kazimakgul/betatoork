<div class="navbar navbar-default navbar-fixed-top" role="navigation">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" rel="home" href="#"><?php echo $user['User']['screenname']?></a>
	</div>

	<div class="collapse navbar-collapse">

		<ul class="nav navbar-nav">
			<li><a href="#"><i class="fa fa-bullseye"></i> Whats New!</a></li>

		</ul>


    <div class="col-sm-3 col-md-3 navbar-right">
    <form class="navbar-form">
    <div class="input-group">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-user"></i> Login</button>
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-edit"></i> Register</button>
      </div>
    </div>
    </form>
    </div>


		<div class="col-sm-5 col-md-5">
		<form class="navbar-form" role="search">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search Games ..." name="srch-term" id="srch-term">
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			</div>
		</div>
		</form>
		</div>


	</div>
</div>