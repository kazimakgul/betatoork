<div id="register" style="position:absolute;width:364px;display:none;">
  <div class="lightbox_overlay">
  	<div class="lightbox_container">
  		<div class="lightbox_sign"></div>
  	<div data-bind="visible: !viewModel.registerForm.success()">

<?php 
			
			$opt=array(
				'label' => 'Login',
				'custom' => false,
				'redirect' => false,
				'img' => false,
				'alt' => '',
				'id' => '',
				'show-faces' => false,	// fb button only
				'width' => 400,			// fb button only
				'max-rows' => 1,			// fb button only
				'perms' => 'email,publish_stream'
			);
			
		
			?>


<!-- -->  		<div class="clearfix">

      	
			<?php 
			if($facebook_user)
			{
			echo $this->Facebook->logout(array('redirect'=>array('controller'=>'users','action'=>'logout')));
			debug($facebook_user);
			echo 'finish';
			debug($user);
			}else{
			echo $this->Facebook->login($opt); 
			}
			?>
  		

      </div>
  		<div class="lightbox_term">By signing in you accept our terms of use.</div> <!-- --> 
		
		
  		<div class="lightbox_tabs clearfix">
  			<div class="lightbox_lineleft">
  				<a class="lightbox_leftclick" href="#" onclick="show_hide(1, 0)"></a>
  				<a class="lightbox_rightclick" href="#" onclick="show_hide(0, 1)"></a>
  			</div>
  		</div>
  		<div class="lightbox_tabs_content">
  			<div id="left_tab_content">
			
<?php
  $regurl=$this->Html->url(array("controller" => "users","action" =>"register"));
  $termsurl=$this->Html->url(array("controller" => "pages","action" =>"terms"));
  $privacyurl=$this->Html->url(array("controller" => "pages","action" =>"privacy"));
?>
			
          <form name="registerForm" id="register_form" method="post" action="<?php echo $regurl ?>">
  					<input type="text" name="data[User][username]" pattern="[\w]{6,20}" title="Please use 6 to 20 characters, only letters and numbers, do not use any space" placeholder="Choose a Username" required>
  					<input class="lightbox_txt_email" id="id_email" name="data[User][email]" pattern="[aA-zZ0-9._%+-]+@[aA-zZ0-9.-]+\.[aA-zZ]{2,4}" type="email" placeholder="Type Your Email" required title="Email must be format : name@example.com" />
  					<input class="lightbox_txt_pass" id="id_password" name="data[User][password]" type="password" placeholder="Choose a Password" pattern="[^\f\n\r\t\v\u00A0\u2028\u2029]{6,}" title="Please use at least 6 characters, only letters,numbers and specials, do not use any space"  required />
  					<input class="lightbox_txt_pass" id="id_password1" name="data[User][confirm_password]" type="password" placeholder="Password Again" pattern="[^\f\n\r\t\v\u00A0\u2028\u2029]{6,}" title="Please use at least 6 characters, only letters,numbers and specials, do not use any space" , required />
  					<div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='cb57a50b31cc117803835ecd11324908' /></div>
    				<div class="clearfix">
    				  
    					<a id="readterms" class="lightbox_licence mirror_subscription_emails" href="<?php echo $privacyurl?>">Yes, i read and accept the privacy notice</a>
    					
    					<a id="iread" class="lightbox_read mirror_tos" href="<?php echo $termsurl?>">I agree to the Terms and Conditions</a>

<!--   <?php

      echo $this->Recaptcha->show(array(
        'theme' => 'white',
        'lang' => 'en',
      ));
  
      echo $this->Recaptcha->error();

  ?> -->

    					<div class="lightbox_regs"><input class="lightbox_regbtn" type="submit" value='' /></div>
    				</div>
    			</form>
  			</div>
<?php
 $loginurl=$this->Html->url(array("controller" => "users","action" =>"login"));
?>
  			<div id="right_tab_content" class="lightbox_display_none">
  				<form name="loginForm" id="login_form" method="post" action="<?php echo $loginurl ?>">
  					<input class="lightbox_tx_name" id="id_username2" name="data[User][username]" type="text" placeholder="Username or Email Address" required />
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