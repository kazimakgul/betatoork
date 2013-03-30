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
function trecaptcha2(){alert('youclick');
		$.post(remotecheck, { dt: $('#recaptcha_response_field').val(), c: $('#recaptcha_challenge_field').val(), attr: 'recaptcha_response_field', un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val() }, function (data) {
			if (data.rtdata == 'true') {
				alert('iyibari');
			}
			else if(data.rtdata == 'false'){
                Recaptcha.reload();
				alert('Recaptcha Code is incorrect. Please try again.');
			}
			else
			{
				Recaptcha.reload();
				$('.t_regbox_signform').animate({ left: '+=350' }, 300);
				errbox($('#txt_signusername'));
				//$('.errbox_msg').html(data.rtdata);
				alert(data.rtdata)
			}
		}, 'json');	
	}
	
	
	//Register button for gatekeeper
	
	$('#t_gatekeeper_registerbtn').click(function () {
        
		if($('#reg_username').val().length<6 || $('#reg_username').val().length>20)
		{
		//aksiyon
		}
		 
		//Eger validationda bir sikinti yoksa.  
		
		trecaptcha2();
		
    });
	
	//------------
	
	//Error messages for GateKeeper
	 function errlist(obj) {
        obj.parent().css('backgroundPosition', '0px -116px');
		var topPos = obj.parent().position().top;
		var leftPos  = obj.parent().position().left + obj.parent().width() + 5;
        if (obj.attr('id') == 'txt_signusername') {
            //alert('Choose a Username');
        }
        else if (obj.attr('id') == 'txt_signpass') {
            alert('Choose a Password');
        }
        else if (obj.attr('id') == 'txt_signpassagain') {
            alert('Password Again');
        }
        else if (obj.attr('id') == 'txt_logusername') {
            alert('Email or Username');
        }
        else if (obj.attr('id') == 'txt_logpassword') {
            alert('Type your Password');
        }
        else { }
		if (obj.attr('id') == 'txt_signemail'){
		    alert('Type your e-mail');
            alert('Email must be format: example@example.com');
		}
		else
		{
			 //alert('Please use 6 to 20 characters, only letters and numbers, do not use any space'); Bootstrap validation bunu halleder
		}
		$('.t_regbox_errbox_container').css({ 'top': topPos, 'left': leftPos });
        $('.t_regbox_errbox_container').show();

    }
	
	//Error messages for GateKeeper
	
	
	
	//--------------------Function for Gatekeeper
	
	$('.controls input').focus(function () { 
        if($(this).val() == '' ) { $(this).parent().css('backgroundPosition', '0px -58px'); }
        if ($('.t_regbox_errlist_container').is(':visible')) { $('.t_regbox_errlist_container').hide(); }
    }).blur(function () {
        if ($(this).val() == '') {
            $(this).parent().css('backgroundPosition', '0px -29px'); errlist($(this));
        }
        else if ($(this).attr('id') != 'txt_signemail' && ($(this).val().length < 6 || $(this).val().length > 20)) {
            errlist($(this));
        }
        else { }
    }).keyup(function () {
        var _this = $(this);
        if (_this.attr('id') != 'txt_signemail' && ($(this).val().length < 6 || $(this).val().length > 20)) {
			if(_this.attr('id') == 'txt_signusername'){errun = true;}else{errpas = true;}
            errlist($(this));
        }else {
			if (_this.attr('id') == 'txt_signemail' && !mailRegex.test($(this).val())) {
				errmail = true;
				errlist($(this));
			}
			else if (_this.attr('id') == 'txt_signusername' || _this.attr('id') == 'txt_signemail'){
				$.post(remotecheck, { dt: $(this).val(), attr: _this.attr('id') }, function (data) {
					if (data.rtdata == null) {
						if(_this.attr('id') == 'txt_signusername'){errun = false;}else{errmail = false;}
						_this.parent().css('backgroundPosition', '0px -87px');
						$('.t_regbox_errlist_container').hide();
						if (_this.parent().next().children('input').is(':disabled')) {
							_this.parent().next().children('input').removeAttr('disabled');
							_this.parent().next().css('backgroundPosition', '0px -29px');
						}
					}
					else {
						if(_this.attr('id') == 'txt_signusername'){errun = true;}else{errmail = true;}
						_this.parent().css('backgroundPosition', '0px -116px');
						$('.errlist_title').html('Choose a Username');
						$('.errlist_msg').html(data.rtdata);
						$('.t_regbox_errlist_container').show();
					}
				}, 'json');
			}
			else if(_this.attr('id') == 'txt_signpass' && $('#txt_signpassagain').val() !='' && _this.val() != $('#txt_signpassagain').val()){
				errpass = true;
				$('.t_regbox_signpass').css('backgroundPosition', '0px -116px');
				$('.errlist_title').html('Password Again');
				$('.errlist_msg').html('Please re-enter your password twice so that the values match');
				$('.t_regbox_errlist_container').css({ 'top': '76px' });
				$('.t_regbox_errlist_container').show();
			}
			else if(_this.attr('id') == 'txt_signpassagain' && $('#txt_signpass').val() !='' && _this.val() != $('#txt_signpass').val()){
				errpass = true;
				$('.t_regbox_signpassagain').css('backgroundPosition', '0px -116px');
				$('.errlist_title').html('Password Again');
				$('.errlist_msg').html('Please re-enter your password twice so that the values match');
				$('.t_regbox_errlist_container').css({ 'top': '115px' });
				$('.t_regbox_errlist_container').show();		
			}
			else
			{
				$('.t_regbox_errlist_container').hide();
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
	
	//----------------------