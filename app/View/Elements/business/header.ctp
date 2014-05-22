<?php 
$logout=$this->Html->url(array("controller" => "users","action" =>"logout")); 
$dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
$mygames=$this->Html->url(array("controller" => "games","action" =>"mygames"));
$search = $this->Html->url(array("controller" => "businesses","action" =>"search2",$user['User']['id']));
$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
$index=$this->Html->url(array("controller" => "businesses","action" =>"mysite",$user['User']['id'])); 
?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" rel="home" href="<?=$index?>"><?php echo $user['User']['username']?></a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="#"><i class="fa fa-bullseye"></i> Whats New!</a></li>
		</ul>
<?php if($this->Session->check('Auth.User')){ ?>
		<div class="col-sm-3 col-md-3 navbar-right " style="margin-top:8px;">
			
			<div class="pull-right btn-group">
			<a class="btn btn-default" href="<?php echo $dashboard; ?>"> 
				<i class="glyphicon glyphicon-user"></i> <?php echo $this->Session->read('Auth.User.username'); ?>
				
			</a>
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <span class="caret"></span>
			    <span class="sr-only">Toggle Dropdown</span>
			  </button>
				  <ul class="dropdown-menu" role="menu">
				    <li><a href="<?php echo $dashboard; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				    <li><a href="<?php echo $mygames; ?>"><i class="fa fa-gamepad"></i> My Games</a></li>
				    <li><a href="<?php echo $settings; ?>"><i class="fa fa-gears"></i> Settings</a></li>
				    <li class="divider"></li>
				    <li><a href="<?php echo $logout; ?>"><i class="fa fa-sign-out"></i> Sign Out</a></li>
				  </ul>
			</div>
		</div>
<?php }else{ ?>
	    <div class="col-sm-3 col-md-3 navbar-right" style="margin-top:8px;">
	      <div class="pull-right btn-group">
	        <button data-toggle="modal" data-target="#login" class="btn btn-default" ><i class="glyphicon glyphicon-user"></i> Login</button>
	        <button data-toggle="modal" data-target="#register" class="btn btn-default" ><i class="glyphicon glyphicon-edit"></i> Register</button>
	      </div>
	    </div>
<?php } ?>
		<div class="col-sm-5 col-md-5">
		<form class="navbar-form" action="<?php echo $search; ?>">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search Games..." name="srch-term" id="srch-term">
				<div class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			</div>
			</div>
		</form>
		</div>
	</div>
</div>