        <!-- section header -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"><!-- Collapsable nav bar -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <!-- Your site name for the upper left corner of the site -->
      <a href="<?php echo $index; ?>" class="brand">toork</a>
 <form class="navbar-search">
  <input type="text" class="search-query" placeholder="Search">
</form>
      <!-- Start of the nav bar content -->
      <div class="nav-collapse"><!-- Other nav bar content -->
        <!-- The drop down menu -->
        <ul class="nav pull-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="elusive-compass"></i> Explore <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Best Channels</a></li>
                    <li><a href="#">Recommended Games</a></li>
                    <li><a href="#">New Games</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Why Join Toork</a></li>
                </ul>
            </li>
          <li class="divider-vertical"></li>
          <li><a href="#">Sign Up</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
            <div class="dropdown-menu span3" style="padding: 15px; padding-bottom: 0px;">
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'sign-in','method'=>'post'));?>
<?php echo $this->Form->input('username',array('label'=>'Username or Email' ,'div'=>false,'type'=>'text','class'=>'input-block-level','data-validate'=>'{required: true, messages:{required:"Please enter field username"}}')); ?>
<?php echo $this->Form->input('password',array('label'=>'Password' ,'div'=>false,'class'=>'input-block-level','data-validate'=>'{required: true, messages:{required:"Please enter field password"}}','required' ,'type' => 'password')); ?>
<?php echo $this->Form->input('remember', array('label'=>false ,'div'=>false,'type'=>'checkbox','style'=>"float: left; margin-right: 10px;",'name'=>'remember_me','id'=>'user_remember_me','value'=>0)); ?> 
                    <label class="string optional" for="user_remember_me"> Remember me</label>
                    <input class="btn btn-success" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
                </form>
                <div class="control-group">
                    <p class="recover-account"><a href="#modal-recover" class="link" data-toggle="modal">forget your password</a></p>
                </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
