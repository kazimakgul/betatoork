function Register(){
	$('.t_regbox_overlay').fadeIn(400);
	$('.t_regbox').animate({ top: ($('.t_regbox_overlay').height() - $('.t_regbox').height()) / 2 }, 150, function(){
		$('.t_regbox_regtab').click();
	});	
}


$(function () {
    //variable
    var errpas, errun, errmail,errfor = true;
    var mailRegex = /[aA-zZ0-9._%+-]+@[aA-zZ0-9.-]+\.[aA-zZ]{2,4}/;
	
	//header menu
	$('.menu a').mouseenter(function () {
		var positions = $(this).position();
		$('.pointer').animate({ left: positions.left }, 200);
		$('.menu_up').animate({ left: -positions.left }, 200);
	});
	//header menu
	
	$('.t_regbox_regform input').keypress(function (e) {
	    if (!errpass && !errun && !errmail && e.which == 13) {
            $('.t_regbox_signform').animate({ left: '-=350' }, 300);
        }
	}); 
	
	$('.t_regbox_regcapthcaform input').keypress(function (e) {
	    if (e.which == 13) {
			trecaptcha();
        }
	});
	
	$('.t_regbox_loginform input').keypress(function (e) {
	    if (e.which == 13) {
			tlogin();
        }
	});	
	
	$('.t_regbox_rememberform input').keypress(function (e) {
	    if (e.which == 13) {
			tforget();
        }
	});
	
	$('.t_regbox').css({'left': ($('.t_regbox_overlay').width() - $('.t_regbox').width()) / 2 });
	
	$('#up_btn_register').click(function () {
		Register();
	});
	
	$('.unauth').click(function () {
		Register();
	});
	
	$('#subscribeout').click(function () {
		Register();
	});
	
	$('.logout_btn').click(function () {
		Register();
	});
	
	$('#up_btn_forget').click(function () {
		$('.t_regbox_overlay').fadeIn(400);
		$('.t_regbox').animate({ top: ($('.t_regbox_overlay').height() - $('.t_regbox').height()) / 2 }, 150, function(){
			$('.t_regbox_logtab').click();
			$('.t_regbox_forgetbtn').click();
		});
	});
	
	
	
	$('#fbLogin').click(function(event) {
        login();
    });
	
	$('#fbLoginun').click(function(event) {
        login();
    });
	
    //---------------//
    /* Tab's action */
    $('.t_regbox_regtab').click(function () {
        $('.t_regbox_tabs').css('backgroundPosition', '-4px 0px');
        $('.t_regbox_logmask').hide();
        $('.t_regbox_signmask').show();
        if ($('.t_regbox_errbox_container').is(':visible')) {
            $('.t_regbox_errbox_container').hide();
        }
    });
    $('.t_regbox_logtab').click(function () {
        $('.t_regbox_tabs').css('backgroundPosition', '-4px -38px');
        $('.t_regbox_signmask').hide();
        $('.t_regbox_logmask').show();
        if ($('.t_regbox_errbox_container').is(':visible')) {
            $('.t_regbox_errbox_container').hide();
        }
    });
    /* Tab's action */
    //---------------//

    //---------------------//
    /* Validation's action */
	
	function trecaptcha(){
		$.post(remotecheck, { dt: $('#recaptcha_response_field').val(), c: $('#recaptcha_challenge_field').val(), attr: 'recaptcha_response_field', un: $('#txt_signusername').val(), um: $('#txt_signemail').val(), up: $('#txt_signpass').val() }, function (data) {
			if (data.rtdata == 'true') {
				$('.t_regbox_signform').animate({ left: '-=350' }, 300);
			}
			else if(data.rtdata == 'false'){
                Recaptcha.reload();
                $('.errbox_title').html('Recaptcha Code');
                $('.errbox_msg').html('Recaptcha Code is incorrect. Please try again.');
				$('.t_regbox_errbox_container').css({ 'top': $('#recaptcha_response_field').position().top - $('#recaptcha_response_field').height() , 'left': '196px'});
                $('.t_regbox_errbox_container').show();
                $('.recaptcha_response_field').css('backgroundPosition', '0px 0px');
			}
			else
			{
				Recaptcha.reload();
				$('.t_regbox_signform').animate({ left: '+=350' }, 300);
				errbox($('#txt_signusername'));
				$('.errbox_msg').html(data.rtdata);
			}
		}, 'json');	
	}
	
	function tlogin(){
        $.post(remotecheck, { un: $('#txt_logusername').val(), ps: $('#txt_logpassword').val(), attr: 'txt_logusername' }, function (data) {
			if(data.rtdata.msgid=='0'){
				$('#txt_logusername').parent().css('backgroundPosition', '0px -116px');
				$('#txt_logpassword').parent().css('backgroundPosition', '0px -116px');
				$('.errbox_title').html('Invalid Username or Password');
				$('.errbox_msg').html(data.rtdata.msg);
				$('.t_regbox_errbox_container').css({ 'top': $('#txt_logusername').parent().position().top });
				$('.t_regbox_errbox_container').show();
			}
			else if(data.rtdata.msgid=='1'){
				$('.t_regbox').animate({ top: - $('.t_regbox').height()}, 150);
				$('.t_regbox_overlay').fadeOut(400,function(){$('.t_regbox_overlay').hide(); window.location = data.rtdata.msg;});
			}
			else{
				$('#txt_logusername').parent().css('backgroundPosition', '0px -116px');
				$('#txt_logpassword').parent().css('backgroundPosition', '0px -116px');
				$('.errbox_title').html('Invalid Username or Password');
				$('.errbox_msg').html(data.rtdata.msg);
				$('.t_regbox_errbox_container').css({ 'top': $('#txt_logusername').parent().position().top });
				$('.t_regbox_errbox_container').show();			
			}
        }, 'json');	
	}
	
	function tforget(){
         $.post(remotecheck, { dt: $('#t_regbox_logemail').val(), attr: 't_regbox_logemail' }, function (data) {
            if (data.rtdata != null) {
				$('.t_regbox_errbox_container').show();
				$('#t_regbox_logemail').parent().css('backgroundPosition', '0px -116px');
				$('.errbox_title').html('Invalid Email');
				$('.errbox_msg').html(data.rtdata);
				$('.t_regbox_errbox_container').css({ 'top': $(this).parent().position().top, 'left': '331px' });
            }
            else { 
				$('.t_regbox_logform').animate({ left: '-=350' }, 300);
			}
        }, 'json');	
	}
	
    function errbox(obj) {
        obj.parent().css('backgroundPosition', '0px -116px');
		var topPos = obj.parent().position().top;
		var leftPos  = obj.parent().position().left + obj.parent().width() + 5;
        if (obj.attr('id') == 'txt_signusername') {
            $('.errbox_title').html('Choose a Username');
        }
        else if (obj.attr('id') == 'txt_signpass') {
            $('.errbox_title').html('Choose a Password');
        }
        else if (obj.attr('id') == 'txt_signpassagain') {
            $('.errbox_title').html('Password Again');
        }
        else if (obj.attr('id') == 'txt_logusername') {
            $('.errbox_title').html('Email or Username');
        }
        else if (obj.attr('id') == 'txt_logpassword') {
            $('.errbox_title').html('Type your Password');
        }
        else { }
		if (obj.attr('id') == 'txt_signemail'){
		    $('.errbox_title').html('Type your e-mail');
            $('.errbox_msg').html('Email must be format: example@example.com');
		}
		else
		{
			$('.errbox_msg').html('Please use 6 to 20 characters, only letters and numbers, do not use any space');
		}
		$('.t_regbox_errbox_container').css({ 'top': topPos, 'left': leftPos });
        $('.t_regbox_errbox_container').show();

    }
	
	
	

    $('#recaptcha_response_field').click(function () {
        if ($('.t_regbox_errbox_container').is(':visible')) {
            $('.t_regbox_errbox_container').hide();
            $('.recaptcha_response_field').css('backgroundPosition', '0px -22px');
        }
    });




    $('#t_regbox_regform input').focus(function () {
        if($(this).val() == '' ) { $(this).parent().css('backgroundPosition', '0px -58px'); }
        if ($('.t_regbox_errbox_container').is(':visible')) { $('.t_regbox_errbox_container').hide(); }
    }).blur(function () {
        if ($(this).val() == '') {
            $(this).parent().css('backgroundPosition', '0px -29px'); errbox($(this));
        }
        else if ($(this).attr('id') != 'txt_signemail' && ($(this).val().length < 6 || $(this).val().length > 20)) {
            errbox($(this));
        }
        else { }
    }).keyup(function () {
        var _this = $(this);
        if (_this.attr('id') != 'txt_signemail' && ($(this).val().length < 6 || $(this).val().length > 20)) {
			if(_this.attr('id') == 'txt_signusername'){errun = true;}else{errpas = true;}
            errbox($(this));
        }else {
			if (_this.attr('id') == 'txt_signemail' && !mailRegex.test($(this).val())) {
				errmail = true;
				errbox($(this));
			}
			else if (_this.attr('id') == 'txt_signusername' || _this.attr('id') == 'txt_signemail'){
				$.post(remotecheck, { dt: $(this).val(), attr: _this.attr('id') }, function (data) {
					if (data.rtdata == null) {
						if(_this.attr('id') == 'txt_signusername'){errun = false;}else{errmail = false;}
						_this.parent().css('backgroundPosition', '0px -87px');
						$('.t_regbox_errbox_container').hide();
						if (_this.parent().next().children('input').is(':disabled')) {
							_this.parent().next().children('input').removeAttr('disabled');
							_this.parent().next().css('backgroundPosition', '0px -29px');
						}
					}
					else {
						if(_this.attr('id') == 'txt_signusername'){errun = true;}else{errmail = true;}
						_this.parent().css('backgroundPosition', '0px -116px');
						$('.errbox_title').html('Choose a Username');
						$('.errbox_msg').html(data.rtdata);
						$('.t_regbox_errbox_container').show();
					}
				}, 'json');
			}
			else if(_this.attr('id') == 'txt_signpass' && $('#txt_signpassagain').val() !='' && _this.val() != $('#txt_signpassagain').val()){
				errpass = true;
				$('.t_regbox_signpass').css('backgroundPosition', '0px -116px');
				$('.errbox_title').html('Password Again');
				$('.errbox_msg').html('Please re-enter your password twice so that the values match');
				$('.t_regbox_errbox_container').css({ 'top': '76px' });
				$('.t_regbox_errbox_container').show();
			}
			else if(_this.attr('id') == 'txt_signpassagain' && $('#txt_signpass').val() !='' && _this.val() != $('#txt_signpass').val()){
				errpass = true;
				$('.t_regbox_signpassagain').css('backgroundPosition', '0px -116px');
				$('.errbox_title').html('Password Again');
				$('.errbox_msg').html('Please re-enter your password twice so that the values match');
				$('.t_regbox_errbox_container').css({ 'top': '115px' });
				$('.t_regbox_errbox_container').show();		
			}
			else
			{
				$('.t_regbox_errbox_container').hide();
				if($('#txt_signpass').val() == $('#txt_signpassagain').val())
				{
					errpass = false;
					$('.t_regbox_signpass').css('backgroundPosition', '0px -87px');
					$('.t_regbox_signpassagain').css('backgroundPosition', '0px -87px');			
				}
				else
				{
					_this.parent().css('backgroundPosition', '0px -87px');
					if (_this.parent().next().children('input').is(':disabled')) {
						_this.parent().next().children('input').removeAttr('disabled');
						_this.parent().next().css('backgroundPosition', '0px -29px');
					}
				}
				
			}
		}
    });

    $('#t_regbox_logform input').focus(function () {
        if($(this).val() == '' ) { $(this).parent().css('backgroundPosition', '0px -58px'); }
        if ($('.t_regbox_errbox_container').is(':visible')) { $('.t_regbox_errbox_container').hide(); }
    }).blur(function () {
        if (_this.attr('id') != 't_regbox_logemail' && $(this).val() == '') {
            $(this).parent().css('backgroundPosition', '0px -29px');
            errbox($(this));
        }
        else if (_this.attr('id') != 't_regbox_logemail' && $(this).val().length < 6 || $(this).val().length > 20) {
            errbox($(this));
        }
        else { }
    }).keyup(function () {
        var _this = $(this);
        if (_this.attr('id') != 't_regbox_logemail' && ($(this).val().length < 6 || $(this).val().length > 20)) {
            errbox($(this));
        }
		else if (_this.attr('id') == 't_regbox_logemail' && !mailRegex.test($(this).val())) {
			errfor = true;
			_this.parent().css('backgroundPosition', '0px -116px');
			$('.errbox_title').html('Type your e-mail');
            $('.errbox_msg').html('Email must be format: example@example.com');
			$('.t_regbox_errbox_container').css({ 'top': $(this).parent().position().top, 'left': '331px' });
			$('.t_regbox_errbox_container').show();
		}
        else {
            _this.parent().css('backgroundPosition', '0px -87px');
            $('.t_regbox_errbox_container').hide();
			if (_this.attr('id') == 't_regbox_logemail'){errfor = false;}
            if (_this.parent().next().children('input').is(':disabled')) {
                _this.parent().next().children('input').removeAttr('disabled');
                _this.parent().next().css('backgroundPosition', '0px -29px');
            }
        }
    });
    /* Validation's action */
    //---------------------//


    //-----------------//
    /* Button's action */
    $('#t_regbox_registerbtn').click(function () {
        if (!errpass && !errun && !errmail) {
            $('.t_regbox_signform').animate({ left: '-=350' }, 300);
        }
    });

    $('#t_regbox_signdonebtn').click(function () {
		trecaptcha();
    });

    $('.t_regbox_forgetbtn').click(function () {
        $('.t_regbox_errbox_container').hide();
        $('.t_regbox_logform').animate({ left: '-=350' }, 300);
    });

    $('#t_regbox_logcancelbtn').click(function () {
        $('.t_regbox_errbox_container').hide();
        $('.t_regbox_logform').animate({ left: '+=350' }, 300);
    });

    $('#t_regbox_logdonebtn').click(function () {
		tforget();
    });

    $('#t_regbox_loginbtn').click(function () {
		tlogin();
    });
	
	
	$('#t_regbox_clsbtn').click(function () {
		$('.t_regbox').animate({ top: - $('.t_regbox').height()}, 150);
		$('.t_regbox_overlay').fadeOut(400,function(){$('.t_regbox_overlay').hide();});
	});
	
	$('#t_regbox_remembtn').click(function () { if ($(this).hasClass('rememberbtn')) { $('#t_regbox_remembtn').removeClass('rememberbtn').addClass('rememberbtntick'); } else { $('#t_regbox_remembtn').removeClass('rememberbtntick').addClass('rememberbtn'); } });
    /* Button's action */
    //-----------------//
	

});









//Gatekeeper functions

//***************************************************
//------------------Settings-------------------------
//***************************************************
//Login Olan Userin Redirect Sayfasi(düzenlenecek)
var redirect_page='homepage';


function trecaptcha2(){
		$.post(remotecheck, { dt: $('#recaptcha_response_field').val(), c: $('#recaptcha_challenge_field').val(), attr: 'recaptcha_response_field', un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val() }, function (data) {
			if (data.rtdata == 'true') {
				
				$.pnotify({
               text: 'You have registered now.You will be redirected to your channel.',
               type: 'success'
               });
				
				setInterval(function(){autoLogin($('#reg_username').val(),$('#reg_password').val());},2000);
				
				
			}
			else if(data.rtdata == 'false'){
                Recaptcha.reload();
				
				$.pnotify({
               text: 'Recaptcha Code is incorrect. Please try again.',
               type: 'error'
               });
				
				
			}
			else
			{
				Recaptcha.reload();
				//alert(data.rtdata)
				$.pnotify({
               text: data.rtdata,
               type: 'error'
               });
				
			}
		}, 'json');	
	}
	
	
	function checkUser2(){
		$.post(remotecheck2, {attr: 'fast_register', un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val() }, function (data) {
			if (data.rtdata == 'true') {
				
				$.pnotify({
               text: 'You have registered now.You will be redirected to your channel.',
               type: 'success'
               });
				
				setInterval(function(){autoLogin($('#reg_username').val(),$('#reg_password').val());},2000);
				
				
			}
			else if(data.rtdata == 'false'){
        
				
				$.pnotify({
               text: 'Recaptcha Code is incorrect. Please try again.',
               type: 'error'
               });
				
				
			}
			else
			{
				//alert(data.rtdata)
				$.pnotify({
               text: data.rtdata,
               type: 'error'
               });
				
			}
		}, 'json');	
	}
	
	function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};
	
	
	function checkusername() {
		
		$.post(remotecheck, { dt: $('#reg_username').val(), attr: 'txt_signusername' }, function (data) {
					if (data.rtdata == null) {
						//no any messages
						alert('boyle bir user yok');hata=0;
					}
					else {
						
						alert('boyle bir user var');hata=1;
					    
						}
						
						alert(hata);
					
					
				}, 'json');
		
	}
	
	
	//Register button for landingpage
	
	$('#t_landing_registerbtn').live('click',function () {
	    
		//checkusername();
		if(check_land_validation())
		{
			checkUser2();
			}else{
				
				$.pnotify({
               text: 'There are some missing parts on registration form.',
               type: 'error'
               });
				
				
				}
    });
	
	function check_land_validation() {
		 result=1;	
	     if($('#reg_username').val().length==0 || $('#reg_username').val().length<6 || $('#reg_username').val().length>20)
		 {
		 //aksiyon
		 result=0;	
		 }	
		 if($('#reg_email').val().length==0 || !isValidEmailAddress($('#reg_email').val()))
		 {
		 //aksiyon
		 result=0;	
		 }	
		 if($('#reg_password').val().length==0 || $('#reg_password').val().length<6)
		 {
		 //aksiyon
		 result=0;	
		 }

		 return result;
	}
	
	
	//Register button for gatekeeper
	$('#t_gatekeeper_registerbtn').click(function () {
	    
		//checkusername();
		if(checkvalidation())
		{
			trecaptcha2();
			}else{
				
				$.pnotify({
               text: 'There are some missing parts on registration form.',
               type: 'error'
               });
				
				
				}
    });
	
	
	function checkAvailability(dt_var,attr_var) {
		       
		$.post(remotecheck, { dt: dt_var, attr: attr_var }, function (data) {
					if (data.rtdata == null) {
						//no any messages
						onay=1;
					}
					else {
						
						$.pnotify({
               text: data.rtdata,
               type: 'error'
               });
						onay=0;
					}
					
					if(onay==1)
					{
					
					}
					if(onay==0)
					{
					my_issue=0;alert('edildi');
					}
					
					
					
				}, 'json');

	}
	
	
	
	
	function checkvalidation() {
	     result=1;	
	     if($('#reg_username').val().length==0 || $('#reg_username').val().length<6 || $('#reg_username').val().length>20)
		 {
		 //aksiyon
		 result=0;	
		 }	
		 if($('#reg_email').val().length==0 || !isValidEmailAddress($('#reg_email').val()))
		 {
		 //aksiyon
		 result=0;	
		 }	
		 if($('#reg_password').val().length==0 || $('#reg_password').val().length<6)
		 {
		 //aksiyon
		 result=0;	
		 }
		 if($('#reg_password_again').val().length==0 || $('#reg_password_again').val()!=$('#reg_password').val())
		 {
		 //aksiyon
		 result=0;
		 }	

		 return result;
		 
	}
	
	
	$('#t_mobile_login_btn').live('click',function () {
		
		t_mobile_login2();
	});
	
	function t_mobile_login2(){
        $.post(remotecheck, { un: $('#mobile_signusername').val(), ps: $('#mobile_signpass').val(), attr: 'txt_logusername' }, function (data) {
			if(data.rtdata.msgid=='0'){
				
				$.pnotify({
			   title:'Invalid Username or Password',
               text: data.rtdata.msg,
               type: 'error'
               });
				
			}
			else if(data.rtdata.msgid=='1'){
				
				window.location = data.rtdata.msg;
			}
			else{
				
				$.pnotify({
			   title:'Invalid Username or Password',
               text: data.rtdata.msg,
               type: 'error'
               });
							
			}
        }, 'json');	
	}
	
	
	$('#t_gatekeeper_login_btn').click(function () {
		
		tlogin2();
	});
	
	
	function tlogin2(){
        $.post(remotecheck, { un: $('#txt_signusername').val(), ps: $('#txt_signpass').val(), attr: 'txt_logusername' }, function (data) {
			if(data.rtdata.msgid=='0'){
				
				$.pnotify({
			   title:'Invalid Username or Password',
               text: data.rtdata.msg,
               type: 'error'
               });
				
			}
			else if(data.rtdata.msgid=='1'){
				
				window.location = data.rtdata.msg;
			}
			else{
				
				$.pnotify({
			   title:'Invalid Username or Password',
               text: data.rtdata.msg,
               type: 'error'
               });
							
			}
        }, 'json');	
	}
	
	function autoLogin(username,password){
        $.post(remotecheck, { un: username, ps: password, attr: 'txt_logusername' }, function (data) {
			if(data.rtdata.msgid=='0'){
				
				$.pnotify({
			   title:'Invalid Username or Password',
               text: data.rtdata.msg,
               type: 'error'
               });
				
			}
			else if(data.rtdata.msgid=='1'){
				
				window.location = data.rtdata.msg;
			}
			else{
				
				$.pnotify({
			   title:'Invalid Username or Password',
               text: data.rtdata.msg,
               type: 'error'
               });
							
			}
        }, 'json');	
	}
	
	//------------
	
//***************************************************
//------------------Subscription Functions-------------------------
//***************************************************

function subscribe (channel_name,user_auth,id) {
		          
		    if(user_auth==1)
		    {
				
		switch_subscribe(id);
		$.pnotify({
            title: 'Thanks for Following',
            text: 'You are following <strong>'+channel_name+'</strong> now.<br>You will be notified about the updates of this channel.',
            type: 'success'
          });
		
			}else{
				
			$.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to follow channels.',
            type: 'error'
          });	
					
			}
		  
				
	}
	
	
	function subscribeout (channel_name,user_auth,id) {
		        
		    if(user_auth==1)
		    {
				
		switch_subscribe(id);
		$.pnotify({
            title: 'Unfollow is done',
            text: 'You stopped following <strong>'+channel_name+'</strong> now.<br>You will not be notified about the updates of this channel.',
            type: 'error'
          });
		
			}else{
				
			$.pnotify({
            title: 'Authentication Error',
            text: 'You have to login first to follow channels.',
            type: 'error'
          });	
					
			}
		  
				
	}
	
	
    function switch_subscribe(channel_id)
    {
		
    	$.get(subswitcher+'/'+channel_id,function(data) {/*success callback*/});	
		
    }
	
	
	$('#follow_button').click(function () {
		   if(user_auth==1)
		    {
		$('#follow_button').hide();
		$('#unFollow_button').show();
			}
	});
	
	$('#unFollow_button').click(function () {
		   if(user_auth==1)
		    {
		$('#unFollow_button').hide();
		$('#follow_button').show();
			}
	});
	
	
//Her sayfa yüklenisinde ve sadece profile sayfasinda çalismak üzere hazirlandi.	
if($('#follow_button').attr('id')=='follow_button')
	{
	checkstatus();
	}
	
	
		function checkstatus(){
		$.get(checkFollowStat+'/'+profile_id,function(data) {			  
											if(data==1) {
											    $('#follow_button').hide();
		                                        $('#unFollow_button').show();
										     } else {
											    $('#unFollow_button').hide();
		                                        $('#follow_button').show();				  
											 }						  
			                    });
		         }
				 
				 
//***************************************************
//------------------Favorite Functions-------------------------
//***************************************************	


	function favorite (game_name,user_auth,id) {
		   
		    if(user_auth==1)
		    {
				
		switch_favorite(id);
		$.pnotify({
            title: 'Thanks for Favorite',
            text: 'You have added <strong>'+game_name+'</strong> in your favorite list.<br>You can reach this game when you want to play again.',
            type: 'success'
          });
		
			}else{
				
			$.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to favorite games.',
            type: 'error'
          });	
					
			}
		  
				
	}
	
	function unFavorite (game_name,user_auth,id) {
		          
		    if(user_auth==1)
		    {
				
		switch_favorite(id);
		$.pnotify({
            title: 'Favorite has been removed',
            text: 'You have removed <strong>'+game_name+'</strong> from your favorite list.',
            type: 'error'
          });
		
			}else{
				
			$.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to favorite games.',
            type: 'error'
          });	
					
			}
		  
				
	}
	
	function switch_favorite(game_id)
    {
		
    	$.get(favswitcher+'/'+game_id,function(data) {/*success callback*/});	
		
    }
	
	$('#fav_button').click(function () {
		if(user_auth==1)
		    {
		$('#fav_button').hide();
		$('#fav_button2').hide();
		$('#unFav_button').show();
		$('#unFav_button2').show();
			}
	});
	
	$('#unFav_button').click(function () {
		   if(user_auth==1)
		    {
		$('#unFav_button').hide();
		$('#unFav_button2').hide();
		$('#fav_button').show();
		$('#fav_button2').show();
			}
	});
	
	$('#fav_button2').click(function () {
		   if(user_auth==1)
		    {
		$('#fav_button').hide();
		$('#fav_button2').hide();
		$('#unFav_button').show();
		$('#unFav_button2').show();
			}
	});
	
	$('#unFav_button2').click(function () {
		    if(user_auth==1)
		    {
		$('#unFav_button').hide();
		$('#unFav_button2').hide();
		$('#fav_button').show();
		$('#fav_button2').show();
			}
	});
	
//Her sayfa yüklenisinde ve sadece game sayfasinda çalismak üzere hazirlandi.	
if($('#fav_button').attr('id')=='fav_button')
	{
	checkstatus2();
	}
	
	
		function checkstatus2(){
		$.get(checkFavStat+'/'+game_id,function(data) {	  
											if(data==1) {
											    $('#fav_button').hide();
												$('#fav_button2').hide();
		                                        $('#unFav_button').show();
												$('#unFav_button2').show();
										     } else {
											    $('#unFav_button').hide();
												$('#unFav_button2').hide();
		                                        $('#fav_button').show();
												$('#fav_button2').show();
											 }						  
			                    });
		         }
				 
	if($('#fav_button2').attr('id')=='fav_button2')
	{
	checkstatus2();
	}
	
	
		function checkstatus2(){
		$.get(checkFavStat+'/'+game_id,function(data) {	  
											if(data==1) {
											    $('#fav_button').hide();
												$('#fav_button2').hide();
		                                        $('#unFav_button').show();
												$('#unFav_button2').show();
										     } else {
											    $('#unFav_button').hide();
												$('#unFav_button2').hide();
		                                        $('#fav_button').show();
												$('#fav_button2').show();
											 }						  
			                    });
		         }
				 
				 
//***************************************************
//------------------Rating Functions-------------------------
//***************************************************	

function rate_a_game(rating,user_auth,game_id){


 if(user_auth==1)
 {
	          $.post(rateurl+'/'+game_id+'/'+rating,function(data) {
												   
		                $.pnotify({
                        text: data,
                        type: 'success'
                        });  
				});
	

    if (rating==1)
    {
		$('.ratingbar').css({width: '20%'});
    }
    else if (rating==2)
    {
    $('.ratingbar').css({width: '40%'});
    }
    else if (rating==3)
    {
    $('.ratingbar').css({width: '60%'});
    }
    else if (rating==4)
    {
    $('.ratingbar').css({width: '80%'});
    }
    else if (rating==5)
    {
    $('.ratingbar').css({width: '100%'});
    }
  
   }else{
    //if user is no logged in.
    //$('.unauth').click();
	
	$.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to rate games.',
            type: 'error'
          });	
  
   }  
  
}

//***************************************************
//------------Game Chain/Clone Functions-------------
//***************************************************

$('#chaingame').live('click',function () {

    if(user_auth==1)
    {   
	    game_name=$('#game_name').val();
		$.get(chaingame + '/'+game_id, function (data) {
			
			if(data==1)
			{
			  $.pnotify({
			  title: 'You have chained succesfully.',
              text: 'You have chained.<strong>'+game_name+'</strong> game.You will be able to edit this game as you wish on your games section.',
              type: 'success'
              });  
			}else{
				
				$.pnotify({
			  title: 'System Error',
              text: 'There are some problems on server,please try again later.',
              type: 'error'
              });  
				
			}
			
		});
		
	}else{
		
		 $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to chain games.',
            type: 'error'
          });	
		
		
		}

				
				
				});


function chaingame2(game_name,user_auth,game_id)
{
if(user_auth==1)
    {   
		$.get(chaingame + '/'+game_id, function (data) {
			
			if(data==1)
			{
			  $.pnotify({
			  title: 'You have chained succesfully.',
              text: 'You have chained.<strong>'+game_name+'</strong> game.You will be able to edit this game as you wish on your games section.',
              type: 'success'
              });  
			}else{
				
				$.pnotify({
			  title: 'System Error',
              text: 'There are some problems on server,please try again later.',
              type: 'error'
              });  
				
			}
			
		});
		
	}else{
		
		 $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to chain games.',
            type: 'error'
          });	
		
		
		}	
	
	
}


//***************************************************
//---------------Game Delete Function----------------
//***************************************************
function gamedelete(game_name,user_auth,game_id)
{
   
   if(user_auth==1)
    { 
	
	    $.get(deletegame + '/'+game_id, function (data) {
			
			if(data==1)
			{
			  $.pnotify({
              text:  '<strong>'+game_name+'</strong> has been deleted,That game will no longer be visible.',
              type: 'success'
              });  
			  
			  $('#myModal'+game_id).modal('toggle');
			  $('#my_thumb_'+game_id).hide();
			}else{
				
				$.pnotify({
			  title: 'System Error',
              text: 'There are some problems on server,please try again later.',
              type: 'error'
              });  
				
			}
							
		});
	
	
	}else{
		
		$.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to delete games.',
            type: 'error'
          });
		
		}
   

}





//***************************************************
//---------------More Data Functions-----------------
//***************************************************

    if($('#loadmoregame').attr('id')=='loadmoregame')
	{
	var url = $("a#next").attr("href");
	            //Check are there anymore?
				if(typeof url=='undefined')
				{
					$('#loadmoregame').hide();
				}
	}
   
	
	$('#loadmoregame').live('click',function(){
											 
	
	$(".paging").hide();  //hide the paging for users with javascript enabled
	
	$(".thumbnails").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	
		
	var url = $("a#next").attr("href");
	$(".paging").remove();
	
	$("div.batch").load(url, function(response, status, xhr) {
            if (status == "error") {
              var msg = "Sorry but there was an error: ";
              alert(msg + xhr.status + " " + xhr.statusText);
            }
            else {
                $(this).attr("class","loaded"); //change the class name so it will not be confused with the next batch
                $(".paging").hide(); //hide the new paging links
                $(this).fadeIn();
				var url = $("a#next").attr("href");
	            //Check are there anymore?
				if(typeof url=='undefined')
				{
					$('#loadmoregame').hide();
				}
 
            }
        }); 
	
								 
				});
