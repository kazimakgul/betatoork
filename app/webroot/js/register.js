$(function () {
    //var err;
    var err = true;
    var mailRegex = /[aA-zZ0-9._%+-]+@[aA-zZ0-9.-]+\.[aA-zZ]{2,4}/;


    //-----------------//
    /* Regbox position */
    $('.t_regbox_overlay').height($(window).height()).width($(window).width());
    $('.t_regbox').offset({ top: ($(window).height() - $('.t_regbox').height()) / 2, left: ($(window).width() - $('.t_regbox').width()) / 2 });
    /* Regbox position */
    //-----------------//


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
    function errbox(obj) {
        obj.parent().css('backgroundPosition', '0px -116px');
        err = true;
        if (obj.attr('id') == 'txt_signusername') {
            $('.errbox_title').html('Choose a Username');
            $('.errbox_msg').html('Please use 6 to 20 characters, only letters and numbers, do not use any space');
            $('.t_regbox_errbox_container').css({ 'top': '0px', 'left': '330px' });
        }
        else if (obj.attr('id') == 'txt_signemail') {
            $('.errbox_title').html('Type your e-mail');
            $('.errbox_msg').html('Email must be format: example@example.com');
            $('.t_regbox_errbox_container').css({ 'top': '37px', 'left': '330px' });
        }
        else if (obj.attr('id') == 'txt_signpass') {
            $('.errbox_title').html('Choose a Password');
            $('.errbox_msg').html('Please use at least 6 characters, only letters, numbers and specials, do not use any space');
            $('.t_regbox_errbox_container').css({ 'top': '76px', 'left': '330px' });
        }
        else if (obj.attr('id') == 'txt_signpassagain') {
            $('.errbox_title').html('Password Again');
            $('.errbox_msg').html('Please use at least 6 characters, only letters, numbers and specials, do not use any space');
            $('.t_regbox_errbox_container').css({ 'top': '115px', 'left': '330px' });
        }
        else if (obj.attr('id') == 'txt_logusername') {
            $('.errbox_title').html('Email or Username');
            $('.errbox_msg').html('Please use at least 6 characters, only letters, numbers and specials, do not use any space');
            $('.t_regbox_errbox_container').css({ 'top': '0px', 'left': '331px' });
        }
        else if (obj.attr('id') == 'txt_logpassword') {
            $('.errbox_title').html('Type your Password');
            $('.errbox_msg').html('Please use at least 6 characters, only letters, numbers and specials, do not use any space');
            $('.t_regbox_errbox_container').css({ 'top': '37px', 'left': '331px' });
        }
        else if (obj.attr('id') == 't_regbox_logemail') {
            $('.errbox_title').html('Type your e-mail');
            $('.errbox_msg').html('Email must be format: example@example.com');
            $('.t_regbox_errbox_container').css({ 'top': '39px', 'left': '333px' });
        }
        else { }
        $('.t_regbox_errbox_container').show();

    }

    $('#recaptcha_response_field').click(function () {
        if ($('.t_regbox_errbox_container').is(':visible')) {
            $('.t_regbox_errbox_container').hide();
            $('.recaptcha_response_field').css('backgroundPosition', '0px -22px');
        }
    });

    $('#t_regbox_regform input').focus(function () {
        $(this).parent().css('backgroundPosition', '0px -58px');
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
            errbox($(this));
        }
        else {
            if (_this.attr('id') == 'txt_signusername' || _this.attr('id') == 'txt_signemail') {
                if (_this.attr('id') == 'txt_signemail' && !mailRegex.test($(this).val())) {
                    errbox($(this));
                } else {
                    $.post('/betatoork/users/checkUsername', { ps: $(this).val() }, function (data) {
						//alert(data);
                        if (data.ps == null) {
						alert('if');
                            _this.parent().css('backgroundPosition', '0px -87px');
                            $('.t_regbox_errbox_container').hide();
                            err = false;
                            if (_this.parent().next().children('input').is(':disabled')) {
                                _this.parent().next().children('input').removeAttr('disabled');
                                _this.parent().next().css('backgroundPosition', '0px -29px');
                            }
                        }
                        else {
							alert('else');
                            //data.ps = 1;
                            err = true;
                            $('.errbox_msg').html('Please use at least 6 characters, only letters,numbers and specials, do not use any space');
                        }
                    }, 'json');
                }
            } else {
                if (_this.attr('id') == 'txt_signpassagain' && _this.val() != $('#txt_signpass').val()) {
                    err = true;
                    $('.t_regbox_signpassagain').css('backgroundPosition', '0px -116px');
                    $('.errbox_title').html('Password Again');
                    $('.errbox_msg').html('Please re-enter your password twice so that the values match');
                    $('.t_regbox_errbox_container').css({ 'top': '115px' });
                    $('.t_regbox_errbox_container').show();
                }
                else if (_this.attr('id') == 'txt_signpass' && $('#txt_signpassagain').val() != '' && _this.val() != $('#txt_signpassagain').val()) {
                    err = true;
                    $('.t_regbox_signpass').css('backgroundPosition', '0px -116px');
                    $('.errbox_title').html('Password Again');
                    $('.errbox_msg').html('Please re-enter your password twice so that the values match');
                    $('.t_regbox_errbox_container').css({ 'top': '76px' });
                    $('.t_regbox_errbox_container').show();
                }
                else {
                    $('.t_regbox_signpass').css('backgroundPosition', '0px -87px');
                    $('.t_regbox_signpassagain').css('backgroundPosition', '0px -87px');
                    $('.t_regbox_errbox_container').hide();
                    err = false;
                    if (_this.parent().next().children('input').is(':disabled')) {
                        _this.parent().next().children('input').removeAttr('disabled');
                        _this.parent().next().css('backgroundPosition', '0px -29px');
                    }
                }
            }
        }
    });

    $('#t_regbox_logform input').focus(function () {
        $(this).parent().css('backgroundPosition', '0px -58px');
        if ($('.t_regbox_errbox_container').is(':visible')) { $('.t_regbox_errbox_container').hide(); }
    }).blur(function () {
        if ($(this).val() == '') {
            $(this).parent().css('backgroundPosition', '0px -29px');
            errbox($(this));
        }
        else if ($(this).val().length < 6 || $(this).val().length > 20) {
            errbox($(this));
        }
        else { }
    }).keyup(function () {
        var _this = $(this);
        if ($(this).val().length < 6 || $(this).val().length > 20) {
            errbox($(this));
        }
        else {
            _this.parent().css('backgroundPosition', '0px -87px');
            $('.t_regbox_errbox_container').hide();
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
        if (!err) {
            $('.t_regbox_signform').animate({ left: '-=350' }, 300);
        }
    });

    $('#t_regbox_signdonebtn').click(function () {
        $.post('captcha.ashx', { c: $('#recaptcha_challenge_field').val(), r: $('#recaptcha_response_field').val() }, function (data) {
            if (data.cap == 'true') {
                $('.t_regbox_signform').animate({ left: '-=350' }, 300);
            }
            else {
                Recaptcha.reload();
                $('.errbox_title').html('Recaptcha Code');
                $('.errbox_msg').html('Recaptcha Code is incorrect. Please try again.');
                $('.t_regbox_errbox_container').css({ 'top': '138px', 'left': '196px' });
                $('.t_regbox_errbox_container').show();
                $('.recaptcha_response_field').css('backgroundPosition', '0px 0px');
            }
        }, 'json');
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
        $.post('captcha.ashx', { c: $('#recaptcha_challenge_field').val(), r: $('#recaptcha_response_field').val() }, function (data) {
            if (data.cap == 'true') {
                $('.t_regbox_signform').animate({ left: '-=350' }, 300);
            }
            else { }
        }, 'json');
    });

    $('#t_regbox_loginbtn').click(function () {
        $.post('login.ashx', { un: $('#recaptcha_challenge_field').val(), ps: $('#recaptcha_response_field').val() }, function (data) {
            if (data.cap == 'true') {

            }
            else {

            }
        }, 'json');
    });
    /* Button's action */
    //-----------------//
});