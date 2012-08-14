<?php 
	$opt=array(
		'label' => 'Login',
		'custom' => false,
		'redirect' => false,
		'img' => false,
		'alt' => '',
		'id' => '',
		'show-faces' => false,	// fb button only
		'width' => 800,			// fb button only
		'max-rows' => 3,			// fb button only
		'perms' => 'email,publish_stream'
	);
	
	$terms=$this->Html->url(array( "controller" => "pages","action" =>"terms"));
	$privacy=$this->Html->url(array( "controller" => "pages","action" =>"privacy"));
?>

<div class="t_regbox_overlay"></div>
	<div id="t_regbox" class="t_regbox">
		<div id="t_regbox_top" class="t_regbox_top">
			<a id="t_regbox_clsbtn" class="t_regbox_clsbtn" href="#"></a>        
		</div>
		<div id="t_regbox_mid" class="t_regbox_mid">
			<div id="t_regbox_social" class="t_regbox_social">
				<!-- <a id="t_regbox_face" class="t_regbox_face" href="#"><img style="border:0" alt="" src="img/new_reg/face.png" /></a> -->
					<?php 
						/*if($facebook_user)
						{
							echo $this->Facebook->logout(array('redirect'=>array('controller'=>'users','action'=>'logout')));
							
						}else{*/
							echo '<a id="fbLogin" href="#"/></a>'; 
						//}
					?>
					
					
					
				<!-- <a id="t_regbox_twt" class="t_regbox_twt" href="#"><img style="border:0" alt="" src="img/new_reg/twt.png" /></a> -->
				<span style="font-size:7pt; color:#666;">By signing in you accept our terms of use.</span>            
			</div>
			<div id="t_regbox_tabs" class="t_regbox_tabs">
				<div class="clearfix">
					<a id="t_regbox_regtab" class="t_regbox_regtab" href="#" ></a>
					<a id="t_regbox_logtab" class="t_regbox_logtab" href="#" ></a>
				</div>            
			</div>

			<div id="t_regbox_signmask" class="t_regbox_signmask">
				<div id="t_regbox_signform" class="t_regbox_signform"><!-- all forms -->
					<div id="t_regbox_regform" class="t_regbox_regform">
						<div class="t_regbox_signusername"><input id="txt_signusername" type="text" /></div>
						<div class="t_regbox_signemail"><input id="txt_signemail" type="text" disabled="disabled" /></div>
						<div class="t_regbox_signpass"><input id="txt_signpass" type="password" disabled="disabled" /></div>
						<div class="t_regbox_signpassagain"><input id="txt_signpassagain" type="password" disabled="disabled" /></div>
						<span>Yes, i read and accept the <a href="<?php echo $privacy ?>" target="_blank">Privacy Notice</a></span>
						<span>I agree to the <a href="<?php echo $terms ?>" target="_blank">Terms and Conditions</a></span>
						<a class="t_regbox_btn" id="t_regbox_registerbtn" href="#"></a>                   
					</div>
					<div id="t_regbox_regcapthcaform" class="t_regbox_regcapthcaform">
						<span style="width:320px;">Be patient! This is the last step to be a member of Toork. Please type the words below to be a part of Toork's world.</span>
						<div id="t_regbox_regcapthca" class="t_regbox_regcapthca">
							<script type="text/javascript">
								var RecaptchaOptions = {
									theme: 'custom',
									custom_theme_widget: 'recaptcha_widget'
								};
							</script>
							<div id="recaptcha_widget">
								<div id="recaptcha_image"></div>
								<div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
								<div class="clearfix" style="margin-left:23px;">
									<div class="recaptcha_response_field">
										<input tabindex="-1" type="text" id="recaptcha_response_field" name="recaptcha_response_field" style="width:123px; margin:0; padding:0; margin-top:4px; font-size:8pt; margin-left:5px; color:#0066CC;" />
									</div>
									<div style="float:left; margin-left:12px;">
										<a tabindex="-1" style="display:block; width:25px; height:16px; margin-top:2px;" href="javascript:Recaptcha.reload()"></a>
										<div class="recaptcha_only_if_image"><a tabindex="-2" style="display:block; width:25px; height:14px; margin-top:2px;" href="javascript:Recaptcha.switch_type('audio')"></a></div>
										<div class="recaptcha_only_if_audio"><a tabindex="-3" style="display:block; width:25px; height:14px; margin-top:2px;" href="javascript:Recaptcha.switch_type('image')"></a></div>
										<div><a tabindex="-4" style="display:block; width:25px; height:16px; margin-top:1px;" href="javascript:Recaptcha.showhelp()"></a></div>
									</div>
								</div>
							</div>
							<script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6LfxlskSAAAAAEz7PiFd9ajsfynq_40FvcSx0JuK"></script>                        
						</div>
						<a tabindex="-5" class="t_regbox_donebtn" id="t_regbox_signdonebtn" href="#"></a>                      
					</div>                                      
					<div id="t_regbox_regcongrats" class="t_regbox_regcongrats">
						<span>Congratulatios!</span>
						<span>Now, you're a part of Toork's world.</span> 
						<span>A verification mail send to your e-mail addres. Please check your inbox to verificate your Toork profile.</span>
						<span>Enjoy</span>                    
					</div> 
				</div>
			</div>

			<div id="t_regbox_logmask" class="t_regbox_logmask">
				<div id="t_regbox_logform" class="t_regbox_logform"><!-- all forms -->
					<div id="t_regbox_loginform" class="t_regbox_loginform">
						<div class="t_regbox_logusername"><input id="txt_logusername" type="text" /></div>
						<div class="t_regbox_logpassword"><input id="txt_logpassword" type="password" disabled="disabled" /></div>                
						<div class="clearfix" style="width:307px; padding-top:20px;">
							<a id="t_regbox_remembtn" class="rememberbtn" href="#">Remember Me</a>
							<a class="t_regbox_forgetbtn" style="display:block; float:right; font-family:Verdana; font-size:8pt; text-decoration:none;" href="#">Forgot Password?</a>
						</div>
						<div class="clearfix" style="width:309px; margin-top:95px;">
							<!--<a class="t_regbox_cancelbtn" id="t_regbox_cancelbtn" href="#"></a>-->
							<a class="t_regbox_btn" id="t_regbox_loginbtn" href="#"></a>                         
						</div>                    
					</div>                
					<div id="t_regbox_rememberform" class="t_regbox_rememberform">
						<div class="margin_fix" style="margin-top:10px;">
							<span>Please enter your registed e-mail addres below.</span>
							<span>A password recovery e-mail will send your inbox.</span>
							<div class="t_regbox_logemail"><input id="t_regbox_logemail" type="text" /></div>
							<div class="clearfix" style="width:309px; margin-top:100px;">
								<a style="margin-top:28px;" class="t_regbox_cancelbtn" id="t_regbox_logcancelbtn" href="#"></a>
								<a class="t_regbox_logdonebtn" id="t_regbox_logdonebtn" href="#"></a>                          
							</div>  
						</div>
					</div> 
					<div id="t_regbox_logcongrats" class="t_regbox_logcongrats">
						<span>Congratulatios!</span>
						<span>A Password recovery mail send to your email adress.</span> 
						<span>Please check your inbox to recover your password.</span>
						<span>Enjoy</span>                    
					</div> 
				</div>            
			</div>

			<div id="t_regbox_errbox_container" class="t_regbox_errbox_container">
				<div class="clearfix">
					<div id="t_regbox_errbox_left" class="t_regbox_errbox_left"></div>
					<div id="t_regbox_errbox_right" class="t_regbox_errbox_right">
						<div id="t_regbox_errbox_top" class="t_regbox_errbox_top"></div>
						<div id="t_regbox_errbox_mid" class="t_regbox_errbox_mid">
							<p class="errbox_title"></p>
							<p class="errbox_msg"></p>
						</div>
						<div id="t_regbox_errbox_bot" class="t_regbox_errbox_bot"></div>
					</div>
				</div>
			</div>

		</div>
		<div id="t_regbox_bot" class="t_regbox_bot"></div>
	</div>
