function Register() {
    $('.t_regbox_overlay').fadeIn(400);
    $('.t_regbox').animate({top: ($('.t_regbox_overlay').height() - $('.t_regbox').height()) / 2}, 150, function() {
        $('.t_regbox_regtab').click();
    });
}


$(function() {
    //variable
    var errpas, errun, errmail, errfor = true;
    var mailRegex = /[aA-zZ0-9._%+-]+@[aA-zZ0-9.-]+\.[aA-zZ]{2,4}/;

    //header menu
    $('.menu a').mouseenter(function() {
        var positions = $(this).position();
        $('.pointer').animate({left: positions.left}, 200);
        $('.menu_up').animate({left: -positions.left}, 200);
    });
    //header menu

    $('.t_regbox_regform input').keypress(function(e) {
        if (!errpass && !errun && !errmail && e.which == 13) {
            $('.t_regbox_signform').animate({left: '-=350'}, 300);
        }
    });

    $('.t_regbox_regcapthcaform input').keypress(function(e) {
        if (e.which == 13) {
            trecaptcha();
        }
    });

    $('.t_regbox_loginform input').keypress(function(e) {
        if (e.which == 13) {
            tlogin();
        }
    });

    $('.t_regbox_rememberform input').keypress(function(e) {
        if (e.which == 13) {
            tforget();
        }
    });

    $('.t_regbox').css({'left': ($('.t_regbox_overlay').width() - $('.t_regbox').width()) / 2});

    $('#up_btn_register').click(function() {
        Register();
    });

    $('.unauth').click(function() {
        Register();
    });

    $('#subscribeout').click(function() {
        Register();
    });

    $('.logout_btn').click(function() {
        Register();
    });

    $('#up_btn_forget').click(function() {
        $('.t_regbox_overlay').fadeIn(400);
        $('.t_regbox').animate({top: ($('.t_regbox_overlay').height() - $('.t_regbox').height()) / 2}, 150, function() {
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
    $('.t_regbox_regtab').click(function() {
        $('.t_regbox_tabs').css('backgroundPosition', '-4px 0px');
        $('.t_regbox_logmask').hide();
        $('.t_regbox_signmask').show();
        if ($('.t_regbox_errbox_container').is(':visible')) {
            $('.t_regbox_errbox_container').hide();
        }
    });
    $('.t_regbox_logtab').click(function() {
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

    function trecaptcha() {
        $.post(remotecheck, {dt: $('#recaptcha_response_field').val(), c: $('#recaptcha_challenge_field').val(), attr: 'recaptcha_response_field', un: $('#txt_signusername').val(), um: $('#txt_signemail').val(), up: $('#txt_signpass').val()}, function(data) {
            if (data.rtdata == 'true') {
                $('.t_regbox_signform').animate({left: '-=350'}, 300);
            }
            else if (data.rtdata == 'false') {
                Recaptcha.reload();
                $('.errbox_title').html('Recaptcha Code');
                $('.errbox_msg').html('Recaptcha Code is incorrect. Please try again.');
                $('.t_regbox_errbox_container').css({'top': $('#recaptcha_response_field').position().top - $('#recaptcha_response_field').height(), 'left': '196px'});
                $('.t_regbox_errbox_container').show();
                $('.recaptcha_response_field').css('backgroundPosition', '0px 0px');
            }
            else
            {
                Recaptcha.reload();
                $('.t_regbox_signform').animate({left: '+=350'}, 300);
                errbox($('#txt_signusername'));
                $('.errbox_msg').html(data.rtdata);
            }
        }, 'json');
    }

    function tlogin() {
        $.post(remotecheck, {un: $('#txt_logusername').val(), ps: $('#txt_logpassword').val(), attr: 'txt_logusername'}, function(data) {
            if (data.rtdata.msgid == '0') {
                $('#txt_logusername').parent().css('backgroundPosition', '0px -116px');
                $('#txt_logpassword').parent().css('backgroundPosition', '0px -116px');
                $('.errbox_title').html('Invalid Username or Password');
                $('.errbox_msg').html(data.rtdata.msg);
                $('.t_regbox_errbox_container').css({'top': $('#txt_logusername').parent().position().top});
                $('.t_regbox_errbox_container').show();
            }
            else if (data.rtdata.msgid == '1') {
                $('.t_regbox').animate({top: -$('.t_regbox').height()}, 150);
                $('.t_regbox_overlay').fadeOut(400, function() {
                    $('.t_regbox_overlay').hide();
                    window.location = data.rtdata.msg;
                });
            }
            else {
                $('#txt_logusername').parent().css('backgroundPosition', '0px -116px');
                $('#txt_logpassword').parent().css('backgroundPosition', '0px -116px');
                $('.errbox_title').html('Invalid Username or Password');
                $('.errbox_msg').html(data.rtdata.msg);
                $('.t_regbox_errbox_container').css({'top': $('#txt_logusername').parent().position().top});
                $('.t_regbox_errbox_container').show();
            }
        }, 'json');
    }

    function tforget() {
        $.post(remotecheck, {dt: $('#t_regbox_logemail').val(), attr: 't_regbox_logemail'}, function(data) {
            if (data.rtdata != null) {
                $('.t_regbox_errbox_container').show();
                $('#t_regbox_logemail').parent().css('backgroundPosition', '0px -116px');
                $('.errbox_title').html('Invalid Email');
                $('.errbox_msg').html(data.rtdata);
                $('.t_regbox_errbox_container').css({'top': $(this).parent().position().top, 'left': '331px'});
            }
            else {
                $('.t_regbox_logform').animate({left: '-=350'}, 300);
            }
        }, 'json');
    }

    function errbox(obj) {
        obj.parent().css('backgroundPosition', '0px -116px');
        var topPos = obj.parent().position().top;
        var leftPos = obj.parent().position().left + obj.parent().width() + 5;
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
        else {
        }
        if (obj.attr('id') == 'txt_signemail') {
            $('.errbox_title').html('Type your e-mail');
            $('.errbox_msg').html('Email must be format: example@example.com');
        }
        else
        {
            $('.errbox_msg').html('Please use 6 to 20 characters, only letters and numbers, do not use any space');
        }
        $('.t_regbox_errbox_container').css({'top': topPos, 'left': leftPos});
        $('.t_regbox_errbox_container').show();

    }




    $('#recaptcha_response_field').click(function() {
        if ($('.t_regbox_errbox_container').is(':visible')) {
            $('.t_regbox_errbox_container').hide();
            $('.recaptcha_response_field').css('backgroundPosition', '0px -22px');
        }
    });




    $('#t_regbox_regform input').focus(function() {
        if ($(this).val() == '') {
            $(this).parent().css('backgroundPosition', '0px -58px');
        }
        if ($('.t_regbox_errbox_container').is(':visible')) {
            $('.t_regbox_errbox_container').hide();
        }
    }).blur(function() {
        if ($(this).val() == '') {
            $(this).parent().css('backgroundPosition', '0px -29px');
            errbox($(this));
        }
        else if ($(this).attr('id') != 'txt_signemail' && ($(this).val().length < 6 || $(this).val().length > 20)) {
            errbox($(this));
        }
        else {
        }
    }).keyup(function() {
        var _this = $(this);
        if (_this.attr('id') != 'txt_signemail' && ($(this).val().length < 6 || $(this).val().length > 20)) {
            if (_this.attr('id') == 'txt_signusername') {
                errun = true;
            } else {
                errpas = true;
            }
            errbox($(this));
        } else {
            if (_this.attr('id') == 'txt_signemail' && !mailRegex.test($(this).val())) {
                errmail = true;
                errbox($(this));
            }
            else if (_this.attr('id') == 'txt_signusername' || _this.attr('id') == 'txt_signemail') {
                $.post(remotecheck, {dt: $(this).val(), attr: _this.attr('id')}, function(data) {
                    if (data.rtdata == null) {
                        if (_this.attr('id') == 'txt_signusername') {
                            errun = false;
                        } else {
                            errmail = false;
                        }
                        _this.parent().css('backgroundPosition', '0px -87px');
                        $('.t_regbox_errbox_container').hide();
                        if (_this.parent().next().children('input').is(':disabled')) {
                            _this.parent().next().children('input').removeAttr('disabled');
                            _this.parent().next().css('backgroundPosition', '0px -29px');
                        }
                    }
                    else {
                        if (_this.attr('id') == 'txt_signusername') {
                            errun = true;
                        } else {
                            errmail = true;
                        }
                        _this.parent().css('backgroundPosition', '0px -116px');
                        $('.errbox_title').html('Choose a Username');
                        $('.errbox_msg').html(data.rtdata);
                        $('.t_regbox_errbox_container').show();
                    }
                }, 'json');
            }
            else if (_this.attr('id') == 'txt_signpass' && $('#txt_signpassagain').val() != '' && _this.val() != $('#txt_signpassagain').val()) {
                errpass = true;
                $('.t_regbox_signpass').css('backgroundPosition', '0px -116px');
                $('.errbox_title').html('Password Again');
                $('.errbox_msg').html('Please re-enter your password twice so that the values match');
                $('.t_regbox_errbox_container').css({'top': '76px'});
                $('.t_regbox_errbox_container').show();
            }
            else if (_this.attr('id') == 'txt_signpassagain' && $('#txt_signpass').val() != '' && _this.val() != $('#txt_signpass').val()) {
                errpass = true;
                $('.t_regbox_signpassagain').css('backgroundPosition', '0px -116px');
                $('.errbox_title').html('Password Again');
                $('.errbox_msg').html('Please re-enter your password twice so that the values match');
                $('.t_regbox_errbox_container').css({'top': '115px'});
                $('.t_regbox_errbox_container').show();
            }
            else
            {
                $('.t_regbox_errbox_container').hide();
                if ($('#txt_signpass').val() == $('#txt_signpassagain').val())
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

    $('#t_regbox_logform input').focus(function() {
        if ($(this).val() == '') {
            $(this).parent().css('backgroundPosition', '0px -58px');
        }
        if ($('.t_regbox_errbox_container').is(':visible')) {
            $('.t_regbox_errbox_container').hide();
        }
    }).blur(function() {
        if (_this.attr('id') != 't_regbox_logemail' && $(this).val() == '') {
            $(this).parent().css('backgroundPosition', '0px -29px');
            errbox($(this));
        }
        else if (_this.attr('id') != 't_regbox_logemail' && $(this).val().length < 6 || $(this).val().length > 20) {
            errbox($(this));
        }
        else {
        }
    }).keyup(function() {
        var _this = $(this);
        if (_this.attr('id') != 't_regbox_logemail' && ($(this).val().length < 6 || $(this).val().length > 20)) {
            errbox($(this));
        }
        else if (_this.attr('id') == 't_regbox_logemail' && !mailRegex.test($(this).val())) {
            errfor = true;
            _this.parent().css('backgroundPosition', '0px -116px');
            $('.errbox_title').html('Type your e-mail');
            $('.errbox_msg').html('Email must be format: example@example.com');
            $('.t_regbox_errbox_container').css({'top': $(this).parent().position().top, 'left': '331px'});
            $('.t_regbox_errbox_container').show();
        }
        else {
            _this.parent().css('backgroundPosition', '0px -87px');
            $('.t_regbox_errbox_container').hide();
            if (_this.attr('id') == 't_regbox_logemail') {
                errfor = false;
            }
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
    $('#t_regbox_registerbtn').click(function() {
        if (!errpass && !errun && !errmail) {
            $('.t_regbox_signform').animate({left: '-=350'}, 300);
        }
    });

    $('#t_regbox_signdonebtn').click(function() {
        trecaptcha();
    });

    $('.t_regbox_forgetbtn').click(function() {
        $('.t_regbox_errbox_container').hide();
        $('.t_regbox_logform').animate({left: '-=350'}, 300);
    });

    $('#t_regbox_logcancelbtn').click(function() {
        $('.t_regbox_errbox_container').hide();
        $('.t_regbox_logform').animate({left: '+=350'}, 300);
    });

    $('#t_regbox_logdonebtn').click(function() {
        tforget();
    });

    $('#t_regbox_loginbtn').click(function() {
        tlogin();
    });


    $('#t_regbox_clsbtn').click(function() {
        $('.t_regbox').animate({top: -$('.t_regbox').height()}, 150);
        $('.t_regbox_overlay').fadeOut(400, function() {
            $('.t_regbox_overlay').hide();
        });
    });

    $('#t_regbox_remembtn').click(function() {
        if ($(this).hasClass('rememberbtn')) {
            $('#t_regbox_remembtn').removeClass('rememberbtn').addClass('rememberbtntick');
        } else {
            $('#t_regbox_remembtn').removeClass('rememberbtntick').addClass('rememberbtn');
        }
    });
    /* Button's action */
    //-----------------//


});









//Gatekeeper functions

//***************************************************
//------------------Settings-------------------------
//***************************************************
//Login Olan Userin Redirect Sayfasi(düzenlenecek)
var redirect_page = 'homepage';


function trecaptcha2() {
    $.post(remotecheck, {dt: $('#recaptcha_response_field').val(), c: $('#recaptcha_challenge_field').val(), attr: 'recaptcha_response_field', un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val()}, function(data) {
        if (data.rtdata == 'true') {

            $.pnotify({
                text: 'You have successfully registered now. You will be redirected to your personal channel now. Please be patient and enjoy Toork...',
                type: 'success'
            });

            setInterval(function() {
                autoLogin($('#reg_username').val(), $('#reg_password').val());
            }, 2000);


        }
        else if (data.rtdata == 'false') {
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


function checkUser2() {
    $.post(remotecheck2, {attr: 'fast_register', un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val()}, function(data) {
        if (data.rtdata == 'true') {

            $.pnotify({
                text: 'You have successfully registered now.<br>You will be redirected to your personal channel now.<br>Please be patient and enjoy Toork...',
                type: 'success'
            });

            setInterval(function() {
                autoLogin($('#reg_username').val(), $('#reg_password').val());
            }, 2000);


        }
        else if (data.rtdata == 'false') {


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
}
;


function checkusername() {

    $.post(remotecheck, {dt: $('#reg_username').val(), attr: 'txt_signusername'}, function(data) {
        if (data.rtdata == null) {
            //no any messages
            alert('boyle bir user yok');
            hata = 0;
        }
        else {

            alert('boyle bir user var');
            hata = 1;

        }

        alert(hata);


    }, 'json');

}


//Register button for landingpage

$('#t_landing_registerbtn').live('click', function() {

    //checkusername();
    if (check_land_validation())
    {
        checkUser2();
    } else {

        $.pnotify({
            text: 'There are some missing parts on registration form.',
            type: 'error'
        });


    }
});

function check_land_validation() {
    result = 1;
    if ($('#reg_username').val().length == 0 || $('#reg_username').val().length < 6 || $('#reg_username').val().length > 20)
    {
        //aksiyon
        result = 0;
    }
    if ($('#reg_email').val().length == 0 || !isValidEmailAddress($('#reg_email').val()))
    {
        //aksiyon
        result = 0;
    }
    if ($('#reg_password').val().length == 0 || $('#reg_password').val().length < 6)
    {
        //aksiyon
        result = 0;
    }

    return result;
}


//Register button for gatekeeper
$('#t_gatekeeper_registerbtn').click(function() {

    //checkusername();
    if (checkvalidation())
    {
        trecaptcha2();
    } else {

        $.pnotify({
            text: 'There are some missing parts on registration form.',
            type: 'error'
        });


    }
});


function checkAvailability(dt_var, attr_var) {

    $.post(remotecheck, {dt: dt_var, attr: attr_var}, function(data) {
        if (data.rtdata == null) {
            //no any messages
            onay = 1;
        }
        else {

            $.pnotify({
                text: data.rtdata,
                type: 'error'
            });
            onay = 0;
        }

        if (onay == 1)
        {

        }
        if (onay == 0)
        {
            my_issue = 0;
            alert('edildi');
        }



    }, 'json');

}




function checkvalidation() {
    result = 1;
    if ($('#reg_username').val().length == 0 || $('#reg_username').val().length < 6 || $('#reg_username').val().length > 20)
    {
        //aksiyon
        result = 0;
    }
    if ($('#reg_email').val().length == 0 || !isValidEmailAddress($('#reg_email').val()))
    {
        //aksiyon
        result = 0;
    }
    if ($('#reg_password').val().length == 0 || $('#reg_password').val().length < 6)
    {
        //aksiyon
        result = 0;
    }
    if ($('#reg_password_again').val().length == 0 || $('#reg_password_again').val() != $('#reg_password').val())
    {
        //aksiyon
        result = 0;
    }

    return result;

}


$('#t_mobile_login_btn').live('click', function() {

    t_mobile_login2();
});

function t_mobile_login2() {
    $.post(remotecheck, {un: $('#mobile_signusername').val(), ps: $('#mobile_signpass').val(), attr: 'txt_logusername'}, function(data) {
        if (data.rtdata.msgid == '0') {

            $.pnotify({
                title: 'Invalid Username or Password',
                text: data.rtdata.msg,
                type: 'error'
            });

        }
        else if (data.rtdata.msgid == '1') {

            window.location = data.rtdata.msg;
        }
        else {

            $.pnotify({
                title: 'Invalid Username or Password',
                text: data.rtdata.msg,
                type: 'error'
            });

        }
    }, 'json');
}


$('#t_gatekeeper_login_btn').click(function() {

    tlogin2();
});


function tlogin2() {
    $.post(remotecheck, {un: $('#txt_signusername').val(), ps: $('#txt_signpass').val(), attr: 'txt_logusername'}, function(data) {
        if (data.rtdata.msgid == '0') {

            $.pnotify({
                title: 'Invalid Username or Password',
                text: data.rtdata.msg,
                type: 'error'
            });

        }
        else if (data.rtdata.msgid == '1') {

            window.location = data.rtdata.msg;
        }
        else {

            $.pnotify({
                title: 'Invalid Username or Password',
                text: data.rtdata.msg,
                type: 'error'
            });

        }
    }, 'json');
}

function autoLogin(username, password) {
    $.post(remotecheck, {un: username, ps: password, attr: 'txt_logusername'}, function(data) {
        if (data.rtdata.msgid == '0') {

            $.pnotify({
                title: 'Invalid Username or Password',
                text: data.rtdata.msg,
                type: 'error'
            });

        }
        else if (data.rtdata.msgid == '1') {

            window.location = data.rtdata.msg + '/welcome';
        }
        else {

            $.pnotify({
                title: 'Invalid Username or Password',
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

function subscribe(channel_name, user_auth, id) {


    if (user_auth == 1)
    {
        currentflw = $('#flwnumber').html();
        currentflw = parseInt(currentflw);
        $('#flwnumber').html(currentflw + 1);

        switch_subscribe(id);
        /*
         $.pnotify({
         title: 'Thanks for Following',
         text: 'You are following <strong>'+channel_name+'</strong> now.<br>You will be notified about the updates of this channel.',
         type: 'success'
         });
         */
        //pushActivity(null,id,1,1,2);

    } else {

        $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to follow channels.',
            type: 'error'
        });

    }


}


function subscribeout(channel_name, user_auth, id) {

    if (user_auth == 1)
    {
        currentflw = $('#flwnumber').html();
        currentflw = parseInt(currentflw);
        $('#flwnumber').html(currentflw - 1);

        switch_subscribe(id);
        /*
         $.pnotify({
         title: 'Unfollow is done',
         text: 'You stopped following <strong>'+channel_name+'</strong> now.<br>You will not be notified about the updates of this channel.',
         type: 'error'
         });
         */

    } else {

        $.pnotify({
            title: 'Authentication Error',
            text: 'You have to login first to follow channels.',
            type: 'error'
        });

    }


}


function switch_subscribe(channel_id)
{

    $.get(subswitcher + '/' + channel_id, function(data) {/*success callback*/
    });

}


$('#follow_button').click(function() {
    if (user_auth == 1)
    {
        $('#follow_button').hide();
        $('#unFollow_button').show();
    }
});

$('#unFollow_button').click(function() {
    if (user_auth == 1)
    {
        $('#unFollow_button').hide();
        $('#follow_button').show();
    }
});


//Her sayfa yüklenisinde ve sadece profile sayfasinda çalismak üzere hazirlandi.	
if ($('#follow_button').attr('id') == 'follow_button')
{
    checkstatus();
}


function checkstatus() {
    $.get(checkFollowStat + '/' + profile_id, function(data) {
        if (data == 1) {
            $('#follow_button').hide();
            $('#unFollow_button').show();
        } else {
            $('#unFollow_button').hide();
            $('#follow_button').show();
        }
    });
}



function switchfollow(id)
{
    var x = id;
    $("a[id=follow" + x + "]").hide();
    $("a[id=unfollow" + x + "]").show();
}
function switchunfollow(id)
{
    var x = id;
    $("a[id=unfollow" + x + "]").hide();
    $("a[id=follow" + x + "]").show();
}
//***************************************************
//------------------Favorite Functions-------------------------
//***************************************************	


function favorite(game_name, user_auth, id) {

    if (user_auth == 1)
    {

        switch_favorite(id);

        /*
         $.pnotify({
         title: 'Thanks for Favorite',
         text: 'You have added <strong>'+game_name+'</strong> in your favorite list.<br>You can reach this game when you want to play again.',
         type: 'success'
         });
         */

    } else {

        $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to favorite games.',
            type: 'error'
        });

    }

    //pushActivity(id,null,1,1,7);		
}

function unFavorite(game_name, user_auth, id) {

    if (user_auth == 1)
    {

        switch_favorite(id);
        /*
         $.pnotify({
         title: 'Favorite has been removed',
         text: 'You have removed <strong>'+game_name+'</strong> from your favorite list.',
         type: 'error'
         });
         */

    } else {

        $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to favorite games.',
            type: 'error'
        });

    }


}

function switch_favorite(game_id)
{

    $.get(favswitcher + '/' + game_id, function(data) {/*success callback*/
    });

}

$('#fav_button').click(function() {
    if (user_auth == 1)
    {
        $('#fav_button').hide();
        $('#fav_button2').hide();
        $('#unFav_button').show();
        $('#unFav_button2').show();
    }
});

$('#unFav_button').click(function() {
    if (user_auth == 1)
    {
        $('#unFav_button').hide();
        $('#unFav_button2').hide();
        $('#fav_button').show();
        $('#fav_button2').show();
    }
});

$('#fav_button2').click(function() {
    if (user_auth == 1)
    {
        $('#fav_button').hide();
        $('#fav_button2').hide();
        $('#unFav_button').show();
        $('#unFav_button2').show();
    }
});

$('#unFav_button2').click(function() {
    if (user_auth == 1)
    {
        $('#unFav_button').hide();
        $('#unFav_button2').hide();
        $('#fav_button').show();
        $('#fav_button2').show();
    }
});

//Her sayfa yüklenisinde ve sadece game sayfasinda çalismak üzere hazirlandi.	
if ($('#fav_button').attr('id') == 'fav_button')
{
    checkstatus2();
}


function checkstatus2() {
    $.get(checkFavStat + '/' + game_id, function(data) {
        if (data == 1) {
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

if ($('#fav_button2').attr('id') == 'fav_button2')
{
    checkstatus2();
}


function checkstatus2() {
    $.get(checkFavStat + '/' + game_id, function(data) {
        if (data == 1) {
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

function rate_a_game(rating, user_auth, game_id) {


    if (user_auth == 1)
    {
        $.post(rateurl + '/' + game_id + '/' + rating, function(data) {

            $.pnotify({
                text: data,
                type: 'success'
            });
        });


        if (rating == 1)
        {
            $('.ratingbar').css({width: '20%'});
        }
        else if (rating == 2)
        {
            $('.ratingbar').css({width: '40%'});
        }
        else if (rating == 3)
        {
            $('.ratingbar').css({width: '60%'});
        }
        else if (rating == 4)
        {
            $('.ratingbar').css({width: '80%'});
        }
        else if (rating == 5)
        {
            $('.ratingbar').css({width: '100%'});
        }

    } else {
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

$('#chaingame').live('click', function() {

    if (user_auth == 1)
    {
        game_name = $('#game_name').val();
        $.get(chaingame + '/' + game_id, function(data) {
            if (data == 1)
            {
                $.pnotify({
                    title: 'You have cloned succesfully.',
                    text: 'You have cloned. <strong>' + game_name + '</strong> game. You will be able to edit this game as you wish on your games section.',
                    type: 'success'
                });

                //pushActivity(game_id,null,1,1,3);	 

            } else {

                $.pnotify({
                    title: 'System Error',
                    text: 'There are some problems on server,please try again later.',
                    type: 'error'
                });

            }

        });

    } else {

        $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to clone games.',
            type: 'error'
        });


    }



});


function chaingame2(game_name, user_auth, game_id)
{
    if (user_auth == 1)
    {
        $.get(chaingame + '/' + game_id, function(data) {

            if (data == 1)
            {
                $.pnotify({
                    title: 'You have cloned succesfully.',
                    text: 'You have cloned. <strong>' + game_name + '</strong> game. You will be able to edit this game as you wish on your games section.',
                    type: 'success'
                });
            } else {

                $.pnotify({
                    title: 'System Error',
                    text: 'There are some problems on server,please try again later.',
                    type: 'error'
                });

            }

        });

    } else {

        $.pnotify({
            title: 'Sign in Please',
            text: 'You have to sign in first to clone games.',
            type: 'error'
        });


    }


}


//***************************************************
//---------------Game Delete Function----------------
//***************************************************
function gamedelete(game_name, user_auth, game_id)
{

    if (user_auth == 1)
    {

        $.get(deletegame + '/' + game_id, function(data) {

            if (data == 1)
            {
                $.pnotify({
                    text: '<strong>' + game_name + '</strong> has been deleted,That game will no longer be visible.',
                    type: 'success'
                });

                $('#myModal' + game_id).modal('toggle');
                $('#my_thumb_' + game_id).hide();
            } else {

                $.pnotify({
                    title: 'System Error',
                    text: 'There are some problems on server,please try again later.',
                    type: 'error'
                });

            }

        });


    } else {

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

if ($('#loadmoreprofilegame').attr('id') == 'loadmoreprofilegame')
{
    var url = $(".paging_home a#next").attr("href");
    //Check are there anymore?
    if (typeof url == 'undefined')
    {
        $('#loadmoreprofilegame').hide();
    }
}

if ($('#loadmoregame').attr('id') == 'loadmoregame')
{
    var url = $(".paging a#next").attr("href");
    //Check are there anymore?
    if (typeof url == 'undefined')
    {
        $('#loadmoregame').hide();
    }
}

//==========================================================	
$('.loadertrig').live('click', function() {
    var objid = this.id;
    $(".loadertrig").data("oldhtml", document.getElementById(objid).innerHTML);
    document.getElementById(objid).innerHTML = '<img src="https://s3.amazonaws.com/betatoorkpics/socials/ajaxloader.gif"  />';

    var moretimer = setInterval(function() {
        document.getElementById(objid).innerHTML = $(".loadertrig").data("oldhtml");
        clearInterval(moretimer);
    }, 1200);

});

//==========================================================	

$('#loadmoregame').live('click', function() {
    $(".more").click();
    $(".explore_more").click();
    $(".paging").hide();  //hide the paging for users with javascript enabled

    $("#thumbnails_area").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	

    var url = $(".paging a#next").attr("href");
    $(".paging").remove();
    $("div.batch").load(url, function(response, status, xhr) {
        if (status == "error") {
            var msg = "Sorry but there was an error: ";
            alert(msg + xhr.status + " " + xhr.statusText);
        }
        else {
            $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
            $(".paging").hide(); //hide the new paging links
            $(this).fadeIn();
            var url = $(".paging a#next").attr("href");
            //Check are there anymore?
            if (typeof url == 'undefined')
            {
                $('#loadmoregame').hide();
            }

        }
    });

    //This code block below allow make Live Tooltips(allow to work for ajax loaded objects)
    $('body').tooltip({
        selector: '[rel=tooltip]'
    });
    //Live Version of Box Close Function Begins
    $('.header-control [data-box=close]').live('click', function() {
        var close = $(this),
                box = close.parent().parent().parent(),
                data_anim = close.attr('data-hide'),
                animate = (data_anim == undefined || data_anim == '') ? 'fadeOut' : data_anim;

        box.addClass('animated ' + animate);
        setTimeout(function() {
            box.hide()
        }, 1000);
    });
    //Live Version of Box Close Function Ends

});//This is end of MoreGames button click function.

//==========================================================

$('#loadmoreprofilegame').live('click', function() {
    $(".profile_more2").click();
    $(".paging_home").hide();  //hide the paging for users with javascript enabled

    $("#thumbnails_area").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	

    var url = $(".paging_home a#next").attr("href");
    $(".paging_home").remove();
    $("div.batch").load(url, function(response, status, xhr) {
        if (status == "error") {
            var msg = "Sorry but there was an error: ";
            alert(msg + xhr.status + " " + xhr.statusText);
        }
        else {
            $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
            $(".paging_home").hide(); //hide the new paging links
            $(this).fadeIn();
            var url = $(".paging_home a#next").attr("href");
            //Check are there anymore?
            if (typeof url == 'undefined')
            {
                $('#loadmoreprofilegame').hide();
            }

        }
    });

    //This code block below allow make Live Tooltips(allow to work for ajax loaded objects)
    $('body').tooltip({
        selector: '[rel=tooltip]'
    });
    //Live Version of Box Close Function Begins
    $('.header-control [data-box=close]').live('click', function() {
        var close = $(this),
                box = close.parent().parent().parent(),
                data_anim = close.attr('data-hide'),
                animate = (data_anim == undefined || data_anim == '') ? 'fadeOut' : data_anim;

        box.addClass('animated ' + animate);
        setTimeout(function() {
            box.hide()
        }, 1000);
    });
    //Live Version of Box Close Function Ends

});//This is end of MoreGames button click function.

//==========================================================

$('#loadmorefavorite').live('click', function() {

    $(".paging_favorites").hide();  //hide the paging for users with javascript enabled

    $("#thumbnails_fav_area").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	

    var url = $(".paging_favorites a#next").attr("href");
    $(".paging_favorites").remove();
    $("div.batch").load(url, function(response, status, xhr) {
        if (status == "error") {
            var msg = "Sorry but there was an error: ";
            alert(msg + xhr.status + " " + xhr.statusText);
        }
        else {
            $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
            $(".paging_favorites").hide(); //hide the new paging links
            $(this).fadeIn();
            var url = $(".paging_favorites a#next").attr("href");
            //Check are there anymore?
            if (typeof url == 'undefined')
            {
                $('#loadmorefavorite').hide();
            }

        }
    });

    //This code block below allow make Live Tooltips(allow to work for ajax loaded objects)
    $('body').tooltip({
        selector: '[rel=tooltip]'
    });

});//This is end of MoreGames button click function.

//==========================================================
//==========================================================

$('#loadmorechannelgames').live('click', function() {

    $(".paging_games").hide();  //hide the paging for users with javascript enabled

    $("#thumbnails_game_area").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	

    var url = $(".paging_games a#next").attr("href");
    $(".paging_games").remove();
    $("div.batch").load(url, function(response, status, xhr) {
        if (status == "error") {
            var msg = "Sorry but there was an error: ";
            alert(msg + xhr.status + " " + xhr.statusText);
        }
        else {
            $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
            $(".paging_games").hide(); //hide the new paging links
            $(this).fadeIn();
            var url = $(".paging_games a#next").attr("href");
            //Check are there anymore?
            if (typeof url == 'undefined')
            {
                $('#loadmorechannelgames').hide();
            }

        }
    });

    //This code block below allow make Live Tooltips(allow to work for ajax loaded objects)
    $('body').tooltip({
        selector: '[rel=tooltip]'
    });

});//This is end of MoreGames button click function.

//==========================================================
//==========================================================


$('#loadmorefeaturedchannels').live('click', function() {
    $(".paging").hide();  //hide the paging for users with javascript enabled

    $("#thumbnails_area").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	

    var url = $(".paging a#next").attr("href");
    $(".paging").remove();
    $("div.batch").load(url, function(response, status, xhr) {
        if (status == "error") {
            var msg = "Sorry but there was an error: ";
            alert(msg + xhr.status + " " + xhr.statusText);
        }
        else {
            $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
            $(".paging").hide(); //hide the new paging links
            $(this).fadeIn();
            var url = $(".paging a#next").attr("href");
            //Check are there anymore?
            if (typeof url == 'undefined')
            {
                $('#loadmorefeaturedchannels').hide();
            }

        }
    });

    //This code block below allow make Live Tooltips(allow to work for ajax loaded objects)
    $('body').tooltip({
        selector: '[rel=tooltip]'
    });

});//This is end of MoreGames button click function.

//==========================================================

$('#loadmorefollowers').live('click', function() {

    $(".paging_followers").hide();  //hide the paging for users with javascript enabled

    $("#thumbnails_followers_area").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	

    var url = $(".paging_followers a#next").attr("href");
    $(".paging_followers").remove();
    $("div.batch").load(url, function(response, status, xhr) {
        if (status == "error") {
            var msg = "Sorry but there was an error: ";
            alert(msg + xhr.status + " " + xhr.statusText);
        }
        else {
            $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
            $(".paging_followers").hide(); //hide the new paging links
            $(this).fadeIn();
            var url = $(".paging_followers a#next").attr("href");
            //Check are there anymore?
            if (typeof url == 'undefined')
            {
                $('#loadmorefollowers').hide();
            }

        }
    });

    //This code block below allow make Live Tooltips(allow to work for ajax loaded objects)
    $('body').tooltip({
        selector: '[rel=tooltip]'
    });

});//This is end of MoreGames button click function.
//==========================================================

$('#profile_tabs a[href="#games_tab"]').click(function(e) {
    //first_fetch class is key which means whether it is first click or not on favorite tab.
    if ($('.first_fetch_game').attr('class') != 'first_fetch_game') {
        //********* Function gets ajax loaded channel favorites********
        $(".paging_games").hide();  //hide the paging for users with javascript enabled
        $("#thumbnails_game_area").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	

        var url = profilegames + '/' + profile_id;
        $(".paging_games").remove();
        $("div.batch").load(url, function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                alert(msg + xhr.status + " " + xhr.statusText);
            }
            else {
                $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
                $("#thumbnails_game_area").append('<div class="first_fetch_game" style="display:none;"></div>');
                $(".paging_games").hide(); //hide the new paging links
                $(this).fadeIn();
                var url = $(".paging_games a#next").attr("href");
                //Check are there anymore?
                if (typeof url == 'undefined')
                {
                    $('#loadmorechannelgames').hide();
                }
            }

            //This code block below allow make Live Tooltips(allow to work for ajax loaded objects)
            $('body').tooltip({
                selector: '[rel=tooltip]'
            });

        });
        //*********/Function gets ajax loaded channel favorites********
    }

});

//Run when user click on favorite tab	
$('#profile_tabs a[href="#favorites_tab"]').click(function(e) {

    //first_fetch class is key which means whether it is first click or not on favorite tab.
    if ($('.first_fetch_fav').attr('class') != 'first_fetch_fav') {
        //********* Function gets ajax loaded channel favorites********
        $(".paging_favorites").hide();  //hide the paging for users with javascript enabled
        $("#thumbnails_fav_area").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	
        var url = channelfavorite + '/' + profile_id;
        $(".paging_favorites").remove();
        $("div.batch").load(url, function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                alert(msg + xhr.status + " " + xhr.statusText);
            }
            else {
                $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
                $("#thumbnails_fav_area").append('<div class="first_fetch_fav" style="display:none;"></div>');
                $(".paging_favorites").hide(); //hide the new paging links
                $(this).fadeIn();
                var url = $(".paging_favorites a#next").attr("href");
                //Check are there anymore?
                if (typeof url == 'undefined')
                {
                    $('#loadmorefavorite').hide();
                }
            }

            //This code block below allow make Live Tooltips(allow to work for ajax loaded objects)
            $('body').tooltip({
                selector: '[rel=tooltip]'
            });

        });
        //*********/Function gets ajax loaded channel favorites********
    }
});

$('#profile_tabs a[href="#news_tab"]').click(function(e) {

    //first_fetch class is key which means whether it is first click or not on favorite tab.
    if ($('.first_fetch_feed').attr('class') != 'first_fetch_feed') {
        //********* Function gets ajax loaded channel favorites********

        $("#recent-orders").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	
        var url = getprofilefeed + '/' + profile_id;
        $("div.batch").load(url, function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                alert(msg + xhr.status + " " + xhr.statusText);
            }
            else {
                $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
                $("#recent-orders").append('<div class="first_fetch_feed" style="display:none;"></div>');
                $(this).fadeIn();
            }


        });
        //*********/Function gets ajax loaded channel news********
    }
    //=========Get profile activity information with ajax============= 
    var activityurl = getprofileactivity + '/' + profile_id;
    $.post(activityurl, function(data) {
        if ($.trim(data) != '') {
            $(".profileActivityArea").append(data);
            $(".profileActivityArea").attr("class", "Activityloaded"); //change the class name so it will not be confused with the next batch
        }

    });

    //=========//Get profile activity information with ajax============= 


});

//Run when user click on followers tab	
$('#profile_tabs a[href="#followers_tab"]').click(function(e) {

    //first_fetch class is key which means whether it is first click or not on favorite tab.
    if ($('.first_fetch_fol').attr('class') != 'first_fetch_fol') {
        //********* Function gets ajax loaded channel favorites********
        $(".paging_followers").hide();  //hide the paging for users with javascript enabled
        $("#thumbnails_followers_area").append('<div class="batch" style="display:none;"></div>'); //append a container to hold ajax content	
        var url = channelfollowers + '/' + profile_id;
        $(".paging_followers").remove();
        $("div.batch").load(url, function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                alert(msg + xhr.status + " " + xhr.statusText);
            }
            else {
                $(this).attr("class", "loaded"); //change the class name so it will not be confused with the next batch
                $("#thumbnails_followers_area").append('<div class="first_fetch_fol" style="display:none;"></div>');
                $(".paging_followers").hide(); //hide the new paging links
                $(this).fadeIn();
                var url = $(".paging_followers a#next").attr("href");
                //Check are there anymore?
                if (typeof url == 'undefined')
                {
                    $('#loadmorefollowers').hide();
                }
            }

            //This code block below allow make Live Tooltips(allow to work for ajax loaded objects)
            $('body').tooltip({
                selector: '[rel=tooltip]'
            });

        });
        //*********/Function gets ajax loaded channel favorites********
    }


});

//==========================================================
//*********Forget Password Function********
function forgetPassword()
{

    $.post(remotecheck, {dt: $('#resetcredential').val(), attr: 't_regbox_logemail'}, function(data) {
        if (data.rtdata != null) {

            $.pnotify({
                text: data.rtdata,
                type: 'error'
            });

        }
        else {
            $.pnotify({
                title: 'Reset mail has been sent.',
                text: 'Please check your mail box.',
                type: 'success'
            });
        }
    }, 'json');

}

//*********/Forget Password Function********

//==========================================================
//*********Grab Game Function********
$('#metacrawler').live('click', function() {
    $graburl = $('#urlarea').val();
    $("#fetchurl").html($graburl.substring(0, 35));
    $('#fetchloader').show();
    if ($graburl != "")//bu bölüme validation kontrolü gelecek
    {

        //if given url ia valid url execute codes below
        $.ajax({
            type: "POST",
            url: crawler,
            data: {crawlurl: $graburl},
            dataType: "json",
            async: true,
            success: function(data) {

                $title = data.rtdata.title;
                $description = data.rtdata.description;
                $imagevalid = data.rtdata.imagevalid;
                $image = data.rtdata.image;

                if ($imagevalid == 1)
                {
                    document.getElementById("currentavatar").src = $image;
                    $('#external_image').val($image);
                }

                $('#game_name').val($title);
                $('#game_link').val($graburl);
                $('#game_desc').val($description);
                $("#expandGame").collapse('show');

                //window.scrollBy(0,50);
                var $target = $('#expandGame');
                $('html, body').animate({scrollTop: $target.position().top - 120}, 'slow');
                $('#fetchloader').css("display", "none");
            },
            failure: function(errMsg) {
                //alert(errMsg);
            }
        });

    }

});


$('#grabgame').live('click', function() {

    $graburl = $('#urlarea').val();

    if ($graburl != "")
    {

        $('#grabloader').css("display", "block");

        $.post(grabcheck, {graburl: $graburl}, function(data) {
            if (data != null) {

                window.location = data;

            }
            else {
                alert('some problems');
            }
        });

    } else {//if url not null									 

    }

});

//*********/Grab Game Function********

//*********Edit Game Function********

$('#editgame').live('click', function() {

    if ($("#addgameform").valid())
    {
        $('#grabloader').css("display", "block");
    }

});

$('#submitgame').live('click', function() {

    if ($("#addgameform").valid())
    {
        $('#grabloader').css("display", "block");
    }

});

//*********/Edit Game Function********

//==========================================================
//***********Set Mail Permissions********
//==========================================================
$('#savepermissions').live('click', function() {
    var permarray = [];
    $("input:checkbox[name=permission]:not(:checked)").each(function()
    {
        permarray.push($(this).val());

    });

    $.pnotify({
        text: 'Mail Permissions Updated',
        type: 'success'
    });
//alert(permarray.join('\n'));


    $.post(setpermission, {permdata: permarray}, function(data) {
        if (data != null) {
            //alert(data);
        }

    });

});
//==========================================================
//*********//Set Mail Permissions********
//==========================================================

//==========================================================
//*********Activity Submit Functions********
//==========================================================
function pushActivity(game_id, channel_id, notify, email, type)
{
    activitypath = pushactivity + '/' + game_id + '/' + channel_id + '/' + notify + '/' + email + '/' + type
    $.post(activitypath, function(data) {
        if (data != null) {
            //alert(data);
        }

    });

}

// setInterval(function(){getFreshActivity();getNotificationCount();},10000);
function getFreshActivity()
{
    last_id = $('.lastactivityid').val();
    if (typeof last_id == 'undefined' || last_id == null || last_id == '')
    {
//alert('null');
    } else {
//alert(last_id);
        activitypath = freshactivity + '/' + last_id
        $.post(activitypath, function(data) {
            if ($.trim(data) != '') {
                $(".freshactivities").append(data);
                $('#act' + last_id).remove();
                $('.freshactivities').addClass("freshactivitiesold");
                $('.freshactivities').removeClass("freshactivities");
                $('.freshactivitiesnew').addClass("freshactivities");
                $('.freshactivitiesnew').removeClass("freshactivitiesnew");
            }

        });
    }//End of last_id control
}




//==========================================================
//*********Some Validations********
//==========================================================
// Setup form validation on the #register-form element
$("#addgameform").validate({});
//==========================================================
//*********Some Validations********
//==========================================================


//==========================================================
//*********Execute Bot Activity Start********
//==========================================================

//setInterval(function(){execute_order();},30000);

function execute_order()
{

    $.post(order_execute, function(data) {

    });
}
//==========================================================
//*********Execute Bot Activity Ends********
//==========================================================


//==========================================================
//*********Admin Functions Begins********
//==========================================================

// commentopen 
$('.detailopen').live("click", function()
{

//Remove old adminforms
    $("#adminform").remove();

    var ID = $(this).attr("id");
    $("#detailbox" + ID).slideToggle('fast');
//<<<<<<Get detail page with ajax starts>>>>>>
    $.ajax({
        type: "POST",
        url: edit_user_form + '/' + ID,
        async: true,
        success: function(data) {

            $("#detailbox" + ID).html(data);

        },
        failure: function(errMsg) {
            //alert(errMsg);
        }
    });
//<<<<<Get detail page with ajax ends>>>>>>


    return false;
});


//User Edit Submit function begins
function submit_user($id)
{
    $screenname = $('.user_screen').val();
    $username = $('.user_username').val();
    $email = $('.user_email').val();
    $role = $('.user_role').val();
    $credit = $('.user_credit').val();
    $verify = $('.user_verify').is(':checked');
    $botmode = $('.user_botmode').is(':checked');
    if ($botmode)
    {
        $bot = 1;
    } else {
        $bot = 0;
    }

    if ($verify)
    {
        $verify = 1;
    } else {
        $verify = 0;
    }


    //=============Submit User Function Starts===============
    $.ajax({
        type: "POST",
        url: edit_user_submit,
        data: {id: $id, screenname: $screenname, username: $username, email: $email, role: $role, credit: $credit, bot: $bot, verify: $verify},
        async: true,
        success: function(data) {

            //Remove old adminforms
            $("#adminform").remove();

        },
        failure: function(errMsg) {
            //alert(errMsg);
        }
    });
    //=============Submit User Function Ends===============
}
//User Edit Submit function ends



$('.adm_usr_src').on('input', function() {
    // do your stuff
    $src_content = $('.adm_usr_src').val();
    $length = $('.adm_usr_src').val().length
    if ($length > 4)
    {
        get_search_users($src_content);
    }
});


//Get_search_users function begins
function get_search_users($keyword)
{
    //=============Submit User Function Starts===============
    $.ajax({
        type: "POST",
        url: bring_search_users + '/' + $keyword,
        async: true,
        success: function(data) {

            $(".search-content").html(data);

        },
        failure: function(errMsg) {
            //alert(errMsg);
        }
    });
    //=============Get_search_users Function Ends===============

}
//User Get Search user function ends


//Add checked users to session function begins
function addmasslist(user_id)
{
    var checked = document.getElementById("check" + user_id).checked;
    //alert(user_id);
    if (checked == true)
    {

        $.post(add_mass_session + '/' + user_id, function(data) {
            if ($.trim(data) != '') {
                //alert(data);
                //increase row count
                currentrow = $('#selectedcount').html();
                currentrow = parseInt(currentrow);
                $('#selectedcount').html(currentrow + 1);
            }
        });


    } else {

        $.post(remove_mass_session + '/' + user_id, function(data) {
            if ($.trim(data) != '') {
                //alert(data);
                //decrease row count
                currentrow = $('#selectedcount').html();
                currentrow = parseInt(currentrow);
                $('#selectedcount').html(currentrow - 1);
            }
        });
    }


}
//Add checked users to session function ends

//Do changes for selected users func begins
$('#do_pwd_changes').live('click', function() {

    $password = $('#mass_pwd_text').val();
    $confirm_pwd = $('#mass_pwd_confirm').val();

    $.ajax({
        type: "POST",
        url: do_pwd_changes,
        data: {password: $password, confirm_pwd: $confirm_pwd},
        async: true,
        success: function(data) {
            //alert(data);
            $('#affectedusers').html(data);
            $('#modalaffected').modal();

            //Do All chkboxes unchecked
            var $checkBoxes = $('input[type="checkbox"]');
            $checkBoxes.attr('checked', false);
            //Do Row Count Zero
            $('#selectedcount').html(0);

        },
        failure: function(errMsg) {
            //alert(errMsg);
        }
    });

});
//Do changes for selected users func ends

//Do adcode changes for selected users func begins
$('#do_adcode_changes').live('click', function() {

    $adcode = $('#useradcode').val();

    $.ajax({
        type: "POST",
        url: do_adcode_changes,
        data: {adcode: $adcode},
        async: true,
        success: function(data) {
            //alert(data);
            $('#affectedusers').html(data);
            $('#modalaffected').modal();

            //Do All chkboxes unchecked
            var $checkBoxes = $('input[type="checkbox"]');
            $checkBoxes.attr('checked', false);
            //Do Row Count Zero
            $('#selectedcount').html(0);

        },
        failure: function(errMsg) {
            //alert(errMsg);
        }
    });

});
//Do adcode changes for selected users func ends

$('#remove_selections').live('click', function() {

    $.post(remove_selections, function(data) {
        if ($.trim(data) != '') {
            alert(data);
            //Do All chkboxes unchecked
            var $checkBoxes = $('input[type="checkbox"]');
            $checkBoxes.attr('checked', false);
            //Do Row Count Zero
            $('#selectedcount').html(0);
        }
    });
});

$('#select_all').live('click', function() {

    //Do All chkboxes checked
    var $checkBoxes = $('input[type="checkbox"]');
    $checkBoxes.attr('checked', true);
    var count = $("input[type=checkbox]:checked").size();
    //increase row count
    currentrow = $('#selectedcount').html();
    currentrow = parseInt(currentrow);
    $('#selectedcount').html(currentrow + count);
});


//Admin game add begins
$('#admin_game_submit').live('click', function() {

    $game_name = $('#game_name').val();
    $game_description = $('#game_description').val();
    $game_link = $('#game_link').val();
    $game_width = $('#game_width').val();
    $game_height = $('#game_height').val();
    $game_priority = $('#game_priority').val();
    $game_tags = $('#game_tags').val();
    $game_user_id = $('#game_user_id').val();
    $category_id = $('#category_id').val();

    $image_name = $('#game_image').attr('data-src');
    $game_file = $('#game_file').val();

    if ($('#game_mobile').prop('checked')) {
        $mobile_ready = 1;
    } else {
        $mobile_ready = 0;
    }

    if ($('#full_screen').prop('checked')) {
        $full_screen = 1;
    } else {
        $full_screen = 0;
    }

    //------
    $.ajax({
        type: "POST",
        url: admin_game_submit,
        data: {id: $id, game_name: $game_name, game_description: $game_description, game_link: $game_link, game_width: $game_width, game_height: $game_height, game_priority: $game_priority, game_tags: $game_tags, game_user_id: $game_user_id, mobile_ready: $mobile_ready, image_name: $image_name, category_id: $category_id, game_file: $game_file, full_screen: $full_screen},
        dataType: "json",
        async: false,
        success: function(data) {
            alert(data.rtdata.title);
        },
        failure: function(errMsg) {
            alert(errMsg);
        }
    });
    //------	

});
//Admin game add ends

//Admin game add full screen checkbox begins
$('#full_screen').live('click', function() {
    if ($(this).prop('checked'))
    {
        $('#game_width').val('100%');
        $('#game_height').val('100%');
        $('#game_width').attr('disabled', 'disabled');
        $('#game_height').attr('disabled', 'disabled');
    } else {
        $('#game_width').removeAttr('disabled');
        $('#game_height').removeAttr('disabled');
    }
});
//Admin game add full screen checkbox ends

//==========================================================
//*********Admin Functions Ends********
//==========================================================


//==========================================================
//*********Mygames Functions Ends********
//==========================================================

$('#mygames_src').keypress(function(e) {
    if (e.which == 13) {
        //alert($('#mygames_src').val());
        window.location.href = my_search + '/search/' + $('#mygames_src').val();
    }
});
//==========================================================
//*********//Mygames Functions Ends********
//==========================================================


//==========================================================
//*********Upload Modal Functions Begins********
//==========================================================
//Controller functions for modals of avatar begins
$('#avatarframe').load(function() {
    $(this).contents().find("#close_panel").on('click', function(event) {
        $('#pictureChange').modal('toggle');
    });
});

$('#avatarframe').load(function() {
    $(this).contents().find("#set_photo").on('click', function(event) {
        $('#pictureChange').modal('toggle');
        $('#user_avatar').attr('src', 'http://www.imageyourself.net/images/website/loading.gif');

        setTimeout(function() {
            var new_img = $('iframe[id=avatarframe]').contents().find('#new_image_link').val();
            $('#user_avatar').attr('src', new_img);
        }, 1000);

    });

//var name = $('iframe[id=avatarframe]').contents().find('#selected_image').val();
//alert(name);
});
//Controller functions for modals of avatar ends

//Controller functions for modals of cover begins
$('#coverframe').load(function() {
    $(this).contents().find("#close_panel").on('click', function(event) {
        $('#coverChange').modal('toggle');
    });
});

$('#coverframe').load(function() {
    $(this).contents().find("#set_photo").on('click', function(event) {
        $('#coverChange').modal('toggle');
        $('#user_cover').css('background-image', 'url(http://3.bp.blogspot.com/-13dC5LhMbMM/T6NpcCU7obI/AAAAAAAAAVE/kt0XhVIV_zU/s200/loading.gif)');
        setTimeout(function() {
            var new_img = $('iframe[id=coverframe]').contents().find('#new_image_link').val();
            $('#user_cover').css('background-image', 'url(' + new_img + ')');
        }, 1000);

    });

});
//Controller functions for modals of covers ends

//Controller functions for modals of game image begins
$('#gameframe').load(function() {
    $(this).contents().find("#close_panel").on('click', function(event) {
        $('#gameChange').modal('toggle');
    });
});

$('#gameframe').load(function() {
    $(this).contents().find("#set_photo").on('click', function(event) {
        $('#gameChange').modal('toggle');
        $('#game_image').attr('src', 'http://www.imageyourself.net/images/website/loading.gif');
        setTimeout(function() {
            var new_img = $('iframe[id=gameframe]').contents().find('#new_image_link').val();
            var img_name = $('iframe[id=gameframe]').contents().find('#selected_image').val();
            $('#game_image').attr('src', new_img);
            $('#game_image').attr('data-src', img_name);
        }, 1000);

    });

});
//Controller functions for modals of game_image ends

//Controller functions for modals of game Upload begins
$('#gameaddframe').load(function() {
    $(this).contents().find("#close_panel").on('click', function(event) {
        $('#gameAdd').modal('toggle');
    });
});

$('#gameaddframe').load(function() {
    $(this).contents().find("#set_photo").on('click', function(event) {
        $('#gameAdd').modal('toggle');
        $('#game_file_loader').attr('src', 'http://www.imageyourself.net/images/website/loading.gif');
        setTimeout(function() {
            var img_name = $('iframe[id=gameaddframe]').contents().find('#selected_image').val();
            $('#game_file').val(img_name);
            $('#game_link').val(img_name);
            $('#game_link').attr('disabled', 'disabled');
        }, 1000);

    });

});
//Controller functions for modals of game Upload ends


//I use some javasript here to access dynamically created iframe avatar begins
$('#opencheck').live('click', function() {

    var iframe = document.getElementById("avatarframe");
    var btn1 = iframe.contentWindow.document.getElementById('close_panel');
    btn1.onclick = function() {
        //Actions for button 1
        $('#pictureChange').modal('toggle');
        //Actions for button 1 ends
    }
    var btn2 = iframe.contentWindow.document.getElementById('set_photo');
    btn2.onclick = function() {
        //Actions for button 2
        $('#pictureChange').modal('toggle');
        $('#user_avatar').attr('src', 'http://www.imageyourself.net/images/website/loading.gif');
        setTimeout(function() {
            var new_img = $('iframe[id=avatarframe]').contents().find('#new_image_link').val();
            $('#user_avatar').attr('src', new_img);
        }, 1000);
        //Actions for button 2 ends
    }

});
//I use some javasript here to access dynamically created iframe avatar ends

//I use some javasript here to access dynamically created iframe cover begins
$('#opencheck2').live('click', function() {

    var iframe = document.getElementById("coverframe");
    var btn1 = iframe.contentWindow.document.getElementById('close_panel');
    btn1.onclick = function() {
        //Actions for button 1
        $('#coverChange').modal('toggle');
        //Actions for button 1 ends
    }
    var btn2 = iframe.contentWindow.document.getElementById('set_photo');
    btn2.onclick = function() {
        //Actions for button 2
        $('#coverChange').modal('toggle');
        $('#user_cover').attr('src', 'http://www.imageyourself.net/images/website/loading.gif');
        setTimeout(function() {
            var new_img = $('iframe[id=coverframe]').contents().find('#new_image_link').val();
            $('#user_cover').attr('src', new_img);
        }, 1000);
        //Actions for button 2 ends
    }

});
//I use some javasript here to access dynamically created iframe cover ends

//==========================================================
//*********Upload Modal Functions Ends********
//==========================================================


//==========================================================
//*********Notification Frontend Functions********
//==========================================================
function getNotificationCount()
{
    lastcount = parseInt($('#notcountsingle').html());
    classlaststat = $('#notcountsingle').attr("class");
    $.post(notifycount, function(data) {
        if ($.trim(data) != '') {
            count = data;
            if (parseInt(count) == 0)
            {
                if (classlaststat = "badge-important")
                {
                    $('#notcountsingle').removeClass("badge-important");
                }
            } else {
                if (classlaststat != "badge-important")
                {
                    $('#notcountsingle').addClass("badge-important");
                }
            }
            $('#notifycount').attr('title', count + ' new notifications');
            $('#notcountsingle').html(count);
            if (parseInt(count) > lastcount)
            {
                $("body").data("oldtitle", $(document).attr('title'));
                $(document).attr('title', 'You have new notifications.');
                getNewNotification();
            }
        }

    });
}

//this function gets all unseen notification with limit 10
function getNewNotification()
{
    //alert('notifications');
    $.post(notifyrefresh, function(data) {
        if ($.trim(data) != '') {
            $('#notifyarea').html(data);
            $('#notifyarea').attr("class", "secondcome");
            $("#notifyarea").attr('id', 'notifyarealocked');
            $("#notifyareanew").attr('id', 'notifyarea');
        } else {
            $('#notifymessage').show();
        }

    });
}

function getOldNotification()
{
    //alert('old notifications');
    $.post(oldnotify, function(data) {
        if ($.trim(data) != '') {
            $('#oldnotifyarea').html(data);
            $('#oldnotifyarea').attr("class", "secondcome");
        } else {
            $('#oldnotifymessage').show();
        }

    });
}

$('#notifycount').live('click', function() {

    $(document).attr('title', $("body").data("oldtitle"));
    classstat = $('#notifyarea').attr("class");
    classstatold = $('#oldnotifyarea').attr("class");
    if (classstatold == "firstcome")
    {
        //getNewNotification();
        getOldNotification();
    }

    //Panelde gösterilen tüm notificationlarin idsini bir array içinde topladiktan sonra seen degerlerini 1 olarak set etmek için notifytoggle fonksiyonuna gönderiyoruz.
    var seenlist = [];
    $('.notifyblocks.unseen').each(function() {
        $(this).toggleClass('unseen');
        seenlist.push(this.id);
    });
    //alert(seenlist.join('\n'));

    if (seenlist.length == 0)
    {
        getNewNotification();
    }

    $.post(notifytoggle, {jsondata: JSON.stringify(seenlist)}, function(data) {
        if (data == '1') {
            getNotificationCount();
        }
    });

});

//==========================================================
//*********//Notification Frontend Functions********
//==========================================================