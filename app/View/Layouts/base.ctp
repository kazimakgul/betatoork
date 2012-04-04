<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>

<title>Toork - Default</title>

<meta property="og:title" content="Toork"/>
<meta property="og:type" content="game"/>
<meta property="og:url" content="http://beta.toork.com/"/>
<meta property="og:image" content=""/>
<meta property="og:site_name" content="IMDb"/>
<meta property="fb:admins" content="USER_ID"/>
<meta property="og:description"
      content="Create your own game channel."/>


<?php echo $this->Html->css(array('header','userpanel','gamebox','footer','jquery.fancybox-1.3.4','light_box_register','ui-lightness/jquery-ui-1.8.17.custom')); ?>


<?php echo $this->Html->script(array('jquery.min','jquery-ui-1.8.17.custom.min','jquery.cookie','jquery.fancybox-1.3.4.pack','jquery.lightbox_me','knockout-2.0.0','underscore','jquery.placeholder.min')); ?>











<?php  echo $this->element('knockout'); ?>
<!-- fb -->
<?php  echo $this->element('test'); ?>


<script type="text/javascript">
$(document).ready(function() {

  $('.menu a').mouseenter(function () {
    var positions = $(this).position();
    $('.pointer').animate({ left: positions.left }, 200);
    $('.menu_up').animate({ left: -positions.left }, 200);
  });
});
var show_hide = function (left_status, right_status) {
  if (left_status === 1 && right_status === 0) {
  	$('#left_tab_content').removeClass('lightbox_display_none');
  	$('#right_tab_content').addClass('lightbox_display_none');
  	$('.lightbox_lineright').removeClass('lightbox_lineright').addClass('lightbox_lineleft');
  }
  else if (left_status === 0 &&  right_status === 1) {
  	$('#left_tab_content').addClass('lightbox_display_none');
  	$('#right_tab_content').removeClass('lightbox_display_none');
  	$('.lightbox_lineleft').removeClass('lightbox_lineleft').addClass('lightbox_lineright');
  }

  $('input, textarea').placeholder();
}
</script>

</head>
<body class="home">


<?php  echo $this->element('header'); ?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php  echo $this->element('footer'); ?>
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
          <form name="registerForm" id="register_form" method="post">
  					<input class="lightbox_txt_name" id="id_channel_name" name="channel_name" type="text" />
  					<input class="lightbox_txt_email" id="id_email" name="email" type="text" />
  					<input class="lightbox_txt_pass" id="id_password" name="password" type="password" />
  					<input class="lightbox_txt_pass" id="id_password1" name="password1" type="password" />
  					<div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='cb57a50b31cc117803835ecd11324908' /></div>
    				<div class="clearfix">
    				  <input style="display:none" type="checkbox" name="subscription_emails" id="id_subscription_emails" />
    					<a id="readterms" class="lightbox_licence mirror_subscription_emails" href="#" data-bind="click: function() { viewModel.registerForm.fields.subscription_emails.value(!viewModel.registerForm.fields.subscription_emails.value()); $('#readterms').removeClass('error');}, css: { lightbox_licencecheck: viewModel.registerForm.fields.subscription_emails.value() }">Yes, i accept to send me useful news about Toork</a>
    					<input style="display:none" type="checkbox" name="tos" id="id_tos" />
    					<a id="iread" class="lightbox_read mirror_tos" href="#" data-bind="click: function() { viewModel.registerForm.fields.tos.value(!viewModel.registerForm.fields.tos.value()); $('#iread').removeClass('error');}, css: { lightbox_readcheck: viewModel.registerForm.fields.tos.value() }">I agree to the Terms of Use and Privacy Policy</a>
    					<div class="lightbox_regs"><a class="lightbox_regbtn" href="#" data-bind="click: function() { viewModel.registerForm.submit(); }"></a></div>
    				</div>
    			</form>
  			</div>

  			<div id="right_tab_content" class="lightbox_display_none">
  				<form name="loginForm" id="login_form" method="post">
  					<input class="lightbox_tx_name" id="id_username2" name="email" type="text" value="Type your email address" />
  					<input class="lightbox_tx_pass" id="id_password2" name="password" type="password" value="Password" />
  					<div style='display:none'><input type='hidden' name='csrfmiddlewaretoken' value='cb57a50b31cc117803835ecd11324908' /></div>
    				<div class="clearfix">
    				  <input type="checkbox" name="rememberme" style="display:none" />
    					<a id="forgot" class="lightbox_forgott" href="#" data-bind="click: function() { viewModel.loginForm.fields.rememberme.value(!viewModel.loginForm.fields.rememberme.value()); }, css: { lightbox_forgotcheck: viewModel.loginForm.fields.rememberme.value() }">Remember Me</a>
    					<a id="member" class="lightbox_member" href="#">Forgot Password?</a>
    				</div>
    				<div class="lightbox_logs">
    					<a class="lightbox_logbtn" href="#" data-bind="click: function() { viewModel.loginForm.submit(); }"></a>
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
</body>
</html>
