//***************************************************
//------------------Rating Functions Begins---------- 
// Rating yıldızlarının çalışmasını sağlayan Function
//***************************************************
var __slice = [].slice;
(function($, window) {
    var Starrr;
    function rate_a_game(rating, user_auth, game_id) {
        if (user_auth == 1)
        {
            $.post(rateurl + '/' + game_id + '/' + rating, function(data) {
            });
        } else
        {
            $('#login').modal('show');
        }
    }
    Starrr = (function() {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function(e, value) {
                rate_a_game(value, user_auth, game_id);
            }
        };

        function Starrr($el, options) {
            var i, _, _ref,
                    _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'span', function(e) {
                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function() {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'span', function(e) {
                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function() {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
            }
            return _results;
        };

        Starrr.prototype.setRating = function(rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function(rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            }
            if (!rating) {
                return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
            }
        };
        return Starrr;

    })();
    return $.fn.extend({
        starrr: function() {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function() {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function() {
    return $(".starrr").starrr();
});


$(document).ready(function() {
    $('#gameshare').popover();
    $('#gamecomment').popover();
    //Ads Button table class
    $("#mytable #checkall").click(function() {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function() {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function() {
                $(this).prop("checked", false);
            });
        }
    });



    //Favourite Button class change
    $('.favourite .row button').click(function() {
        if ($('.btn-danger').val() == 0)
        {
            $('.btn-danger').removeClass().addClass('btn btn-default');
        }
        else {
            $('.btn-default').removeClass().addClass('btn btn-danger');
        }
    });


    $('#stars').on('starrr:change', function(e, value) {
        $('#count').html(value);
    });

    $('#stars-existing').on('starrr:change', function(e, value) {
        $('#count-existing').html(value);
    });
    //***************************************************
    //------------------Rating Functions Ends-------------------------
    //***************************************************



    //*********Social Function********
    $('.facebookreg').click(function() {
        facebooklogin();
    });
    $('#t_landing_registerbtn').click(function(e) {
        e.preventDefault();
        var btn = $(this);
        btn.button('loading');
        $.post(remotecheck2, {attr: 'fast_register', un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val()}, function(data) {
            if (data.rtdata == 'true') {

                setInterval(function() {
                    autoLogin($('#reg_username').val(), $('#reg_password').val());
                }, 2000);
            }
            else if (data.rtdata == 'false') {
                $('#errormsg_Reg').html("The username-password combination you entered is incorrect.");
                $('#errormsg_Reg').show();
                btn.button('reset');
            }
            else
            {
                $('#errormsg_Reg').html(data.rtdata);
                $('#errormsg_Reg').show();
                btn.button('reset');
            }
        }, 'json');

    });


//*********Forget Password Function********
    $('#resetcredential').keypress(function(e) {
        if (e.which == 13) {
            $('#forget_pass').click();
        }
    });

    $('#forget_pass').click(function() {
        $.post(remotecheck, {dt: $('#resetcredential').val(), attr: 't_regbox_logemail'}, function(data) {
            if (data.rtdata != null) {

                $('#errormsg_Passwd').html(data.rtdata.msg);
                $('#errormsg_Passwd').show();

            }
            else {
                $.pnotify({
                    title: 'Reset mail has been sent.',
                    text: 'Please check your mail box.',
                    type: 'success'
                });
            }
        }, 'json');

    });
    
    /**
     * Login Function
     */
    $('#t_gatekeeper_login_btn').click(function(e) {
        e.preventDefault();
        var btn = $(this);
        btn.button('loading');
        var attr = 'txt_logusername';
        var un = $('#txt_signusername').val();
        var ps = $('#txt_signpass').val();
        var rm = $('#txt_signremember:checked').length > 0 ? 1 : 0;
        $.post(remotecheck, {attr: attr, un: un, ps: ps, rm: rm}, function(data) {
            if (data.rtdata.msgid == '0') {
                $('#errormsg_Passwd').html(data.rtdata.msg);
                $('#errormsg_Passwd').show();
                btn.button('reset');
            }
            else if (data.rtdata.msgid == '1') {
                var host = window.location.host;
                var domain = 'clone.gs';
                if (host.match('/test/')) {
                    window.location.href = window.location.protocol + '//test.' + domain + '/dashboard';
                } else {
                    if (cname == 1) {
                        location.reload();
                    } else {
                        window.location.href = window.location.protocol + '//' + domain + '/dashboard';
                    }
                }
            }
            else {
                $('#errormsg_Passwd').html(data.rtdata.msg);
                $('#errormsg_Passwd').show();
                btn.button('reset');
            }
        }, 'json');
    });


    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ')
                c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0)
                return c.substring(nameEQ.length, c.length);
        }
        return null;
    }


    //***************************************************
//------------------Login Register Functions Begins-------------------------
//***************************************************

    //Validation for login panel
    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });
    var form = $("#toorkLogin");
    form.validate({
        rules: {
            email: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Please enter your username or email."
            }
        }
    });


    $('.validateLogin').click(function() {
        form.valid();
    });

    $('#txt_signusername').keypress(function() {
        $('#errormsg_Passwd').hide();
    });
    $('#txt_signpass').keypress(function() {
        $('#errormsg_Passwd').hide();
    });

    $('#txt_signusername').keypress(function(e) {
        if (e.which == 13) {
            $('#t_gatekeeper_login_btn').click();
        }
    });
    $('#txt_signpass').keypress(function(e) {
        if (e.which == 13) {
            $('#t_gatekeeper_login_btn').click();
        }
    });

//==========/Login Register Functions=============




//*********//Social Function********
    //***************************************************
//------------------Login Register Functions Ends-------------------------
//***************************************************

    //Register button for gatekeeper
    //New Validation System For Registration
    jQuery.validator.addMethod(
            "uniqueUserName",
            function(value, element) {
                $.ajax({
                    type: "POST",
                    url: authcheck,
                    data: {attr: 'check_username', dt: value},
                    dataType: "json",
                    async: false,
                    success: function(data) {
                        if (data.rtdata == 1)
                        {
                            $("#reg_username").data("valid", true);
                        } else {
                            $("#reg_username").data("valid", false);
                        }
                    },
                    failure: function(errMsg) {
                        //alert(errMsg);
                    }
                });

                return $("#reg_username").data("valid");
            },
            "Username is already taken"
            );

    jQuery.validator.addMethod(
            "uniqueEmail",
            function(value, element) {
                $.ajax({
                    type: "POST",
                    url: authcheck,
                    data: {attr: 'check_email', dt: value},
                    dataType: "json",
                    async: false,
                    success: function(data) {
                        if (data.rtdata == 1)
                        {
                            $("#reg_email").data("valid", true);
                        } else {
                            $("#reg_email").data("valid", false);
                        }
                    },
                    failure: function(errMsg) {
                        //alert(errMsg);
                    }
                });
                return $("#reg_email").data("valid");
            },
            "Email is already registered"
            );

    jQuery.validator.addMethod("nospace",
            function(value, element) {
                return value.indexOf(" ") < 0 && value != "";
            },
            "No space please and don't leave it empty"
            );

    $("#toorkRegister").validate({
        rules: {
            username: {
                required: true,
                minlength: 6,
                maxlength: 20,
                uniqueUserName: true,
                nospace: true
            },
            screenname: {
                required: true,
                minlength: 4,
                maxlength: 20
            },
            email: {
                required: true,
                email: true,
                uniqueEmail: true
            },
            password: {
                required: true,
                minlength: 6,
                nospace: true
            }
        },
        messages: {
            username: {
                required: "Please enter username.",
                minlength: "At least 6 characters.",
                maxlength: "Maximum 20 characters.",
                nospace: "You cannot use space in your username."
            },
            screenname: {
                required: "Please enter screen name.",
                minlength: "At least 4 characters.",
                maxlength: "Maximum 20 characters."
            },
            email: {
                required: "Please enter email.",
                email: "Your email address must be in the format of name@domain.com"
            },
            password: {
                required: "Please enter password.",
                minlength: "At least 6 characters.",
                nospace: "You cannot use space in your password."
            }
        }
    });

    $('#t_facebook_registerbtn').click(function() {
        if ($("#toorkRegister").valid())
        {
            faceUser();
        }
    });



    $('#contact-form').validate({
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            email: {
                required: true,
                email: true
            },
            message: {
                minlength: 2,
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function(element) {
            element.text('OK!').addClass('valid')
                    .closest('.control-group').removeClass('error').addClass('success');
        }
    });
});





function checkUser2() {
    $.post(remotecheck2, {attr: 'fast_register', un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val()}, function(data) {
        if (data.rtdata == 'true') {
            $('#grabloader').show();
            setInterval(function() {
                autoLogin($('#reg_username').val(), $('#reg_password').val());
            }, 2000);
        }
        else if (data.rtdata == 'false') {
            $('#errormsg_Passwd').html(data.rtdata.msg);
            $('#errormsg_Passwd').show();
        }
        else
        {
            $('#errormsg_Passwd').html(data.rtdata.msg);
            $('#errormsg_Passwd').show();
        }
    }, 'json');
}

function faceUser() {
    $.post(remotecheck2, {attr: 'facebook_register', sn: $('#reg_screenname').val(), un: $('#reg_username').val(), um: $('#reg_email').val(), up: $('#reg_password').val(), fi: $('#facebook_id').val(), at: $('#access_token').val()}, function(data) {
        if (data.rtdata == 'true') {
            $('#grabloader').show();
            setInterval(function() {
                autoLogin($('#reg_username').val(), $('#reg_password').val());
            }, 2000);
        }
        else if (data.rtdata == 'false') {
            $('#errormsg_Passwd').html(data.rtdata.msg);
            $('#errormsg_Passwd').show();
        }
        else
        {
            $('#errormsg_Passwd').html(data.rtdata.msg);
            $('#errormsg_Passwd').show();
        }
    }, 'json');
}

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

function autoLogin(username, password) {
    $.post(remotecheck, {un: username, ps: password, attr: 'txt_logusername'}, function(data) {
        if (data.rtdata.msgid == '0') {

            $('#errormsg_Passwd').html(data.rtdata.msg);
            $('#errormsg_Passwd').show();

        }
        else if (data.rtdata.msgid == '1') {

            window.location = data.rtdata.msg + '/welcome';
        }
        else {
            $('#errormsg_Passwd').html(data.rtdata.msg);
            $('#errormsg_Passwd').show();
        }
    }, 'json');
}


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


function subscribeout(channel_name, user_auth, id)
{
    if (user_auth == 1)
    {
        currentflw = $('#flwnumber').html();
        currentflw = parseInt(currentflw);
        $('#flwnumber').html(currentflw - 1);
        switch_subscribe(id);
    }
    else {
        $('#login').modal('show');
    }
}

function switch_subscribe(channel_id)
{
    $.get(subswitcher + '/' + channel_id, function(data) {/*success callback*/
    });
}

$('#follow_button').click(function()
{
    if (user_auth == 1)
    {
        $('#follow_button').hide();
        $('#unFollow_button').show();
    } else
    {
        $('#login').modal('show');
    }
});

$('#unFollow_button').click(function() {
    if (user_auth == 1)
    {
        $('#unFollow_button').hide();
        $('#follow_button').show();
    }
});

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
//------------Game Chain/Clone Functions-------------
//***************************************************

$('#chaingame').click(function() {
    if (user_auth == 1)
    {
        game_name = $('#game_name').val();
        $.get(chaingame + '/' + game_id, function(data) {
            if (data == 1)
            {
                currentflw = $('#clone_count').html();
                currentflw = parseInt(currentflw);
                $('#clone_count').html(currentflw + 1);
                $('.fa-cog').addClass('green');
                $.pnotify({
                    title: 'You have cloned succesfully.',
                    text: 'You have cloned. <strong>' + game_name + '</strong> game. You will be able to edit this game as you wish on your games section.',
                    type: 'success'
                });
            }
        });
    } else
    {
        $('#login').modal('show');
    }
});


function chaingame2(game_name, user_auth, game_id)
{
    if (user_auth == 1)
    {
        $.get(chaingame + '/' + game_id,
                function(data)
                {
                    if (data == 1)
                    {
                        $.pnotify({
                            title: 'You have cloned succesfully.',
                            text: 'You have cloned. <strong>' + game_name + '</strong> game. You will be able to edit this game as you wish on your games section.',
                            type: 'success'
                        });
                    } else
                    {
                        $('#myModal').modal('hide');
                        $('#login').modal('show');
                    }
                });

    } else
    {
        $('#myModal').modal('hide');
        $('#login').modal('show');
    }
}

