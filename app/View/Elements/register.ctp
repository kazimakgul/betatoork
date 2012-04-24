<div id="register" style="position:absolute;width:364px;display:none;">
  <div class="lightbox_overlay">
  	<div class="lightbox_container">
  		<div class="lightbox_sign"></div>
  	<div data-bind="visible: !viewModel.registerForm.success()">
  		<div class="clearfix">

      	<a class="lightbox_face" href="javascript:FB_login()"></a>
  			<a class="lightbox_twt" href="javascript:;"></a>
  		

      </div>
  		<div class="lightbox_term">By signing in you accept our terms of use.</div>
  		<div class="lightbox_tabs clearfix">
  			<div class="lightbox_lineleft">
  				<a class="lightbox_leftclick" href="#" data-bind="click: function(){ show_hide(1, 0); }"></a>
  				<a class="lightbox_rightclick" href="#" data-bind="click: function(){ show_hide(0, 1); }"></a>
  			</div>
  		</div>
  		<div class="lightbox_tabs_content">
  			<div id="left_tab_content">
			
<?php
 $regurl=$this->Html->url(array("controller" => "users","action" =>"register"));
?>
			
          <form name="registerForm" id="register_form" method="post" action="<?php echo $regurl ?>">
  					<input type="text" name="data[User][username]" pattern="[\w]{6,20}" title="Please use 6 to 20 characters, only letters and numbers, do not use any space" placeholder="choose a username" required>
  					<input class="lightbox_txt_email" id="id_email" name="data[User][email]" type="email" placeholder="type your email" required />
  					<input class="lightbox_txt_pass" id="id_password" name="data[User][password]" type="password" placeholder="choose a password" pattern="[^\f\n\r\t\v\u00A0\u2028\u2029]{4,}" title="Please use at least 4 characters, only letters,numbers and specials, do not use any space"  required />
  					<input class="lightbox_txt_pass" id="id_password1" name="data[User][confirm_password]" type="password" placeholder="password again" pattern="[^\f\n\r\t\v\u00A0\u2028\u2029]{4,}" title="Please use at least 4 characters, only letters,numbers and specials, do not use any space" , required />
  					<div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='cb57a50b31cc117803835ecd11324908' /></div>
    				<div class="clearfix">
    				  <input style="display:none" type="checkbox" name="subscription_emails" id="id_subscription_emails" />
    					<a id="readterms" class="lightbox_licence mirror_subscription_emails" href="#" data-bind="click: function() { viewModel.registerForm.fields.subscription_emails.value(!viewModel.registerForm.fields.subscription_emails.value()); $('#readterms').removeClass('error');}, css: { lightbox_licencecheck: viewModel.registerForm.fields.subscription_emails.value() }">Yes, i accept to send me useful news about Toork</a>
    					<input style="display:none" type="checkbox" name="tos" id="id_tos" />
    					<a id="iread" class="lightbox_read mirror_tos" href="#" data-bind="click: function() { viewModel.registerForm.fields.tos.value(!viewModel.registerForm.fields.tos.value()); $('#iread').removeClass('error');}, css: { lightbox_readcheck: viewModel.registerForm.fields.tos.value() }">I agree to the Terms of Use and Privacy Policy</a>
    					<div class="lightbox_regs"><input class="lightbox_regbtn" type="submit" value='' /></div>
    				</div>
    			</form>
  			</div>
<?php
 $loginurl=$this->Html->url(array("controller" => "users","action" =>"login"));
?>
  			<div id="right_tab_content" class="lightbox_display_none">
  				<form name="loginForm" id="login_form" method="post" action="<?php echo $loginurl ?>">
  					<input class="lightbox_tx_name" id="id_username2" name="data[User][username]" type="text" placeholder="Email Address" required />
  					<input class="lightbox_tx_pass" id="id_password2" name="data[User][password]" type="password" placeholder="Password" required />
  					<div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='cb57a50b31cc117803835ecd11324908' /></div>
    				<div class="clearfix">
    				  <input type="checkbox" name="rememberme" style="display:none" />
    					<a id="forgot" class="lightbox_forgott" href="#" data-bind="click: function() { viewModel.loginForm.fields.rememberme.value(!viewModel.loginForm.fields.rememberme.value()); }, css: { lightbox_forgotcheck: viewModel.loginForm.fields.rememberme.value() }">Remember Me</a>
    					<a id="member" class="lightbox_member" href="#">Forgot Password?</a>
    				</div>
    				<div class="lightbox_logs">
    					
						<input class="lightbox_logbtn" type="submit" value=''/>
    					<a class="lightbox_cncbtn" href="#"></a>
    				</div>
    		  </form>
  			</div>
  		</div>
  	</div>
  	<div style="padding:30px;font-size:13px;line-height:20px;font-weight:bold;" data-bind="visible: viewModel.registerForm.success(), text: viewModel.registerForm.message()"></div>
  		<a class="lightbox_close close" href="#"></a>
  	</div>
  </div>
</div>