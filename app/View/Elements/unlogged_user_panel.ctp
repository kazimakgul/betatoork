<div class="userpanel">
  <p>Member Login</p>
                  <?php
                  $loginurl=$this->Html->url(array("controller" => "users","action" =>"login"));
                  ?>
  <form name="panelLoginForm" id="panel_login_form" method="post" action="<?php echo $loginurl ?>">
    

<div style="display:none;" class="alert alert-error"></div>

  	<div class="email">
      <?php echo $this->Form->error('username'); ?>
      <input id="txt_email" type="text" name="data[User][username]" placeholder="Email Address" required/>
  	</div>
  	<div class="pass">
	    <input id="txt_password" type="password" name="data[User][password]" placeholder="Password" />
  	</div>

    <input type="checkbox" class="checkbox" name="rememberme" />

    <a class="rememberme" id="panel_forgot"  href="#" data-bind="click: function() { viewModel.panelLoginForm.fields.rememberme.value(!viewModel.panelLoginForm.fields.rememberme.value()); }"><label for="panel_forgot">Remember Me</label></a>

  <input class="loginbtn" type="submit" data-bind="click: function() { viewModel.panelLoginForm.submit(); }" value="" />
  <div class="panelsep"></div>

  <div style="padding:30px;font-size:13px;line-height:20px;font-weight:bold;" data-bind="visible: viewModel.registerForm.success(), text: viewModel.registerForm.message()"></div>


  <a class="forget" href="forgot">Forget Password?</a>
  <?php echo $this->Html->link('Not a member? Register now',array('controller'=>'users','action'=>'register'),array('class'=>'bemember')); ?>
  </form>
</div>