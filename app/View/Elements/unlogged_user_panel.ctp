<div class="userpanel">
  <p>Member Login</p>
  <form name="panelLoginForm" id="panel_login_form" method="post" >
    

<div style="display:none;" class="alert alert-error"></div>

  	<div class="email">
      <input id="txt_email" type="text" name="email" placeholder="Email Address" />
  	</div>
  	<div class="pass">
	    <input id="txt_password" type="password" name="password" placeholder="Password" />
  	</div>

    <input type="checkbox" class="checkbox" name="rememberme" />

    <a class="rememberme" id="panel_forgot"  href="#" data-bind="click: function() { viewModel.panelLoginForm.fields.rememberme.value(!viewModel.panelLoginForm.fields.rememberme.value()); }"><label for="panel_forgot">Remember Me</label></a>

  <input class="loginbtn" type="submit" data-bind="click: function() { viewModel.panelLoginForm.submit(); }" value="" />
  <div class="panelsep"></div>

  <div style="padding:30px;font-size:13px;line-height:20px;font-weight:bold;" data-bind="visible: viewModel.registerForm.success(), text: viewModel.registerForm.message()"></div>


  <a class="forget" href="forgot">Forget Password?</a>
	<a class="bemember" href="#" data-bind="click: function() { $('#register').lightbox_me(); }">Not a member? Register now.</a>
  </form>
</div>