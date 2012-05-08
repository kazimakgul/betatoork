
<div class="userpanel">
  <p>Member Login</p>
                  <?php
                  $loginurl=$this->Html->url(array("controller" => "users","action" =>"login"));
                  $reseturl=$this->Html->url(array("controller" => "users","action" =>"reset_request"));
                  ?>
  <form name="panelLoginForm" id="panel_login_form" method="post" action="<?php echo $loginurl ?>">
    

<div style="display:none;" class="alert alert-error"></div>

  	<div class="email">
      <?php echo $this->Form->error('username'); ?>
      <input id="txt_email" type="text" name="data[User][username]" placeholder="Username or Email" required/>
  	</div>
  	<div class="pass">
	    <input id="txt_password" type="password" name="data[User][password]" placeholder="Password" required/>
  	</div>

    <a class="remember" id="remember"  href="#" ><label for="panel_forgot">Remember Me</label></a>

  <input class="loginbtn" type="submit" value="" />
  </form>
  <div class="panelsep"></div>

  <div style="padding:30px;font-size:13px;line-height:20px;font-weight:bold;" data-bind="visible: viewModel.registerForm.success(), text: viewModel.registerForm.message()"></div>


  <a class="forget" href="<?php echo $reseturl ?>">Forget Password?</a>
  <a class="bemember" href="#" data-bind="click: function() { $('#register').lightbox_me(); }">Not a member? Register now.</a>

</div>