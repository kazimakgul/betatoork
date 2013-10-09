        <!-- section header -->
<div class="navbar navbar-fixed-top shadow-black">
  <div class="navbar-inner navbar-custom">
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
        <ul class="nav span3 pull-right">

          <a class="btn btn-success" href="<?php echo $index; ?>"><i class="elusive-edit"></i> Sign Up</a>
          <span class="dropdown">
            <a class="btn btn-custom-darken dropdown-toggle" href="#" data-toggle="dropdown"><i class="icofont-signin"></i> Sign In </a>
            <div class="dropdown-menu span3" style="padding: 15px; padding-bottom: 0px;">
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'sign-in','method'=>'post'));?>
<?php echo $this->Form->input('username',array('label'=>'Username or Email' ,'div'=>false,'type'=>'text','class'=>'input-block-level','id'=>'mobile_signusername','data-validate'=>'{required: true, messages:{required:"Please enter field username"}}')); ?>
<?php echo $this->Form->input('password',array('label'=>'Password' ,'div'=>false,'class'=>'input-block-level','id'=>'mobile_signpass','data-validate'=>'{required: true, messages:{required:"Please enter field password"}}','required' ,'type' => 'password')); ?>
<?php echo $this->Form->input('remember', array('label'=>false ,'div'=>false,'type'=>'checkbox','style'=>"float: left; margin-right: 10px;",'name'=>'remember_me','id'=>'user_remember_me','value'=>0, 'checked')); ?> 
                    <label class="string optional" for="user_remember_me"> Remember me</label>
                    <input class="btn btn-success" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="button" name="commit" id="t_mobile_login_btn" value="Sign In" />
                </form>
               <!-- <a style="margin:10px 0px 0px 0px;" class="btn btn-block"><i class="elusive-facebook color-blue"></i> Connect with Facebook</a> -->
                <div class="control-group">
                    <p class="recover-account"><a href="#modal-recover" class="link" data-toggle="modal">forget your password</a></p>
                </div>
            </div>
          </span>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php  echo $this->element('NewPanel/passwordModal'); ?>