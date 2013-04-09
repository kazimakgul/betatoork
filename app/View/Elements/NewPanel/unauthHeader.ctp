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
      <a href="<?php echo $index; ?>" class="brand"></a>
 <form class="navbar-search">
<div class="input-icon-append">
  <button type="button" rel="tooltip-bottom" title="" class="color-blue icon" data-original-title="search"><i class="icofont-search"></i></button>
 <input class="input-large search-query grd-white" maxlength="23" placeholder="Search for a game..." type="text">
</div>
</form>
      <!-- Start of the nav bar content -->
      <div class="nav-collapse"><!-- Other nav bar content -->
        <!-- The drop down menu -->
        <ul class="nav pull-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="elusive-compass"></i> Explore <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $bestchannels; ?>"><i class="icofont-link color-purple"></i> Best Channels</a></li>
                    <li><a href="<?php echo $toprated; ?>"><i class="elusive-fire color-red"></i> Hot Games</a></li>
                    <li><a href="#"><i class="elusive-eye-open color-green"></i> New Games</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo $index; ?>"><i class="elusive-idea color-blue"></i> Why Join Toork</a></li>
                </ul>
            </li>
          <li class="divider-vertical"></li>
          <li><a href="<?php echo $login; ?>">Sign Up</a></li>
          <li class="divider-vertical"></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
            <div class="dropdown-menu span3" style="padding: 15px; padding-bottom: 0px;">
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'sign-in','method'=>'post'));?>
<?php echo $this->Form->input('username',array('label'=>'Username or Email' ,'div'=>false,'type'=>'text','class'=>'input-block-level','id'=>'mobile_signusername','data-validate'=>'{required: true, messages:{required:"Please enter field username"}}')); ?>
<?php echo $this->Form->input('password',array('label'=>'Password' ,'div'=>false,'class'=>'input-block-level','id'=>'mobile_signpass','data-validate'=>'{required: true, messages:{required:"Please enter field password"}}','required' ,'type' => 'password')); ?>
<?php echo $this->Form->input('remember', array('label'=>false ,'div'=>false,'type'=>'checkbox','style'=>"float: left; margin-right: 10px;",'name'=>'remember_me','id'=>'user_remember_me','value'=>0)); ?> 
                    <label class="string optional" for="user_remember_me"> Remember me</label>
                    <input class="btn btn-success" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="button" name="commit" id="t_mobile_login_btn" value="Sign In" />
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
<?php  echo $this->element('NewPanel/passwordModal'); ?>