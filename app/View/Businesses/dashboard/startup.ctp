<?php
$avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
$image = $this->requestAction(array('controller' => 'users', 'action' => 'randomPicture', 62));
if ($user['User']['picture'] == null) {
    $img = $this->Html->image("/img/avatars/$avatarImage.jpg", array('class' => 'img-responsive img-circle circular1', "alt" => "clone user image"));
} else {
    $img = $this->Upload->image($user, 'User.picture', array(), array('class' => 'img-responsive img-circle circular1', 'onerror' => 'imgError(this,"avatar");'));
}
?>
<body id="wizard">
<div id="wrapper">
    <div id="content">
        <div class="content-wrapper">
            <div class="header">
                <!--
                <div class="sidebar-toggler visible-xs">
                    <i class="ion-navicon"></i>
                </div>
                -->
                <div class="steps clearfix">
                    <div class="step active">
                        Setup your channel
                        <span></span>
                    </div>
                    <div class="step">
                        Add/Clone Games
                        <span></span>
                    </div>
                    <div class="step">
                        Follow Channels
                        <span></span>
                    </div>
                    <div class="step">
                        Finish
                        <span></span>
                    </div>
                </div>
            </div>
            <section class="form-wizard" style="width:63%">
                <form id="welcome_form" method="post" action="#" role="form">
                    <?php echo $this->element('business/dashboard/startup/step1') ?>
                    <?php echo $this->element('business/dashboard/startup/step2') ?>
                    <?php echo $this->element('business/dashboard/startup/step3') ?>
                    <?php echo $this->element('business/dashboard/startup/step4') ?>
                    <div style="clear: left;"></div>
                </form>
            </section>
        </div>
    </div>
</div>
<!-- Avatar Change Modal begins -->
<div class="modal fade" id="pictureChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
    <div class="modal-dialog" style="width:800px;">
        <div>
            <?php
            $avatar_image_url = $this->Html->url(array('controller' => 'uploads', 'action' => 'index', 'avatar_image', $user['User']['id']));
            $url = $avatar_image_url;
            ?>
            <iframe id='avatarframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
        </div>
    </div>
</div>
<!-- Avatar Change Modal ends -->
<!-- Cover Change Modal begins -->
<div class="modal fade" id="coverChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
    <div class="modal-dialog" style="width:800px;">
        <div>
            <?php
            $avatar_image_url = $this->Html->url(array('controller' => 'uploads', 'action' => 'index', 'cover_image', $user['User']['id']));
            $url = $avatar_image_url;
            ?>
            <iframe id='coverframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
        </div>
    </div>
</div>
<!-- Cover Change Modal ends -->
<!-- Background Change Modal begins -->
<div class="modal fade" id="backgroundChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
    <div class="modal-dialog" style="width:800px;">
        <div>
            <?php
            $background_image_url = $this->Html->url(array('controller' => 'uploads', 'action' => 'index', 'bg_image', $user['User']['id']));
            $url = $background_image_url;
            ?>
            <iframe id='backgroundframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
        </div>
    </div>
</div>
<style>
    body {
        background-color: #e9eaed;
    }
    #progressbar_clone, #progressbar_follow {
        margin: 0 auto 20px auto;
        width: 500px;
    }
    #progressbar_clone > span, #progressbar_follow > span {
        width: 500px;
        height: 2em;
        line-height: 2em;
        text-align: center;
        position: absolute;
        color: #5A6474;
        font-weight: bold;
    }
    .ui-widget-header {
        background: none !important;
        background-color: #94A1B8 !important;
    }
    .ui-progressbar-value {
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        background-color: #94A1B8 !important;
    }
    .ui-widget-content {
        border: 1px solid #5A6474 !important;
    }
    #progressbar_clone, #progressbar_follow {
        width: 100% !important;
        padding: 0 !important;
    }
    #progressbar_clone span, #progressbar_follow span {
        width: 100% !important;
    }
    #content{
        margin-left: 0px;
    }
    @media (max-width: 768px) {
        #progressbar_clone > span, #progressbar_follow > span {
            font-size: 12px;
            height: 29px;
            line-height: 29px;
        }
    }
</style>
<!-- Background Change Modal ends -->
<script type="text/javascript">
    var clone = 0;
    var follow = 0;
    var clone_bar = $('#progressbar_clone');
    var follow_bar = $('#progressbar_follow');
    var cloned_ids = [];
    
    $(document).ready(function() {
        
        var active_step = 0;
        var steps = $(".form-wizard .step");
        var buttons = steps.find("[data-step]");
        var tabs = $(".header .steps .step");
        
        clone_bar.progressbar();
        follow_bar.progressbar();
        
        buttons.click(function(e) {
            e.preventDefault();
            if ($('#welcome_form').valid()) {
                var step_index = $(this).data("step") - 1;
                var in_fade_class = (step_index > active_step) ? "fadeInRightStep" : "fadeInLeftStep";
                var out_fade_class = (in_fade_class === "fadeInRightStep") ? "fadeOutLeftStep" : "fadeOutRightStep";
                var out_step = steps.eq(active_step);
                if
                (
                    (step_index == 1 && $('#welcome_form').valid())
                    ||
                    (step_index == 2 && clone >= 5)
                    ||
                    (step_index == 3 && follow >= 5)
                    ||
                    ($(this).attr('id') == 'back')
                )
                {
                    //if it is last step,start to create channel
                    if (step_index == 3)
                    {
                        create_channel();
                    }
                    out_step.on(utils.animation_ends(), function() {
                        out_step.removeClass("fadeInRightStep fadeInLeftStep fadeOutRightStep fadeOutLeftStep");
                    }).addClass(out_fade_class);
                    active_step = step_index;
                    tabs.removeClass("active").filter(":lt(" + (active_step + 1) + ")").addClass("active");
                    steps.removeClass("active");
                    steps.eq(step_index).addClass("active animated " + in_fade_class);
                    setTimeout(function() {
                        $('html, body').animate({scrollTop: 0}, 'slow');
                    }, 500);
                } else {
                    switch (step_index) {
                        case 2:
                            Messenger().post({
                                message: 'Please Clone Least 5 Games',
                                type: 'error',
                                showCloseButton: true
                            });
                            break;
                        case 3:
                            Messenger().post({
                                message: 'Please Follow Least 5 Channels',
                                type: 'error',
                                showCloseButton: true
                            });
                            break;
                        default:
                            Messenger().post({
                                message: 'Error',
                                type: 'error',
                                showCloseButton: true
                            });
                    }
                }
            }
        });
    });
    
    function chaingame4(game_name, user_auth, game_id) {
        get_new_game(game_id);
        cloned_ids.push(game_id);
        var btn = $('a.clone-' + game_id);
        btn
            .removeClass('btn-success')
            .addClass('btn-warning')
            .html('<i class="fa fa-cog spin"></i> Cloning');
        var clone_count = 5;
        if (user_auth == 1) {
            clone++;
            var percent = clone * 20;
            if (percent <= 100) {
                clone_bar.progressbar({
                    value: percent
                });
            }
            console.log('Clone Count => ' + clone);
            clone_count = clone_count - clone;
            if (clone_count > 0) {
                $('#progressbar_clone span').html('Clone ' + clone_count + ' more games.');
            } else if (clone_count == 1) {
                $('#progressbar_clone span').html('Clone ' + clone_count + ' more game.');
            } else {
                $('#progressbar_clone span').html('Great! Click Next button for next step.');
            }
            if (game_name == 'mass_clone') {
                $.ajax({
                    type: "POST",
                    url: chaingame + '/' + game_id,
                    async: true,
                    success: function(data) {
                        if (data == 1) {
                            btn
                                .button('reset')
                                .html('<i class="fa fa-cog"></i> Cloned')
                                .removeClass('btn-warning')
                                .addClass('btn-default');
                        } else {
                            Messenger().post("Error. Please, try again..");
                            btn.button('reset');
                        }
                    },
                    failure: function(errMsg) {
                        //alert(errMsg);
                    }
                });
            }
        } else {
            $('#myModal').modal('hide');
            $('#login').modal('show');
        }
    }

    /**
     *  New Game for Wizard Method
     *  @param No
     *  @return No
     *  Note:When user clone a game on wizard,this function will put a new game.
     */
    function get_new_game(game_id)
    {
        //alert(game_id);
        var box = $('#gamebox-' + game_id);
        var btn = $('button.clone-' + game_id);
        //box.removeClass('#gamebox-' + game_id);

        link = newstartupgame;
        $.post(link, function(data) {
            if (data.rtdata.error) {
                //alert(data.rtdata.error); // error.id ye göre mesaj yazdırcak..
            } else {
                //alert(data.rtdata.game_name);
                box.attr('id', 'gamebox-' + data.rtdata.game_id);
                btn.attr('id', 'clone-' + data.rtdata.game_id);
                box.html(data.rtdata.html);
                $('#clone-' + data.rtdata.game_id).attr('onclick', data.rtdata.onclick);
            }
        }, 'json');
    }

    /**
     *  New Channel for Wizard Method
     *  @param No
     *  @return No
     *  Note:When user follow a channel on wizard,this function will put a new channel.
     */
    function get_new_channel(user_id)
    {
        var box = $('#channelbox-' + user_id);
        var btn = $('#grid-follow-' + user_id);
        link = newstartupchannel;
        $.post(link, function(data) {
            if (!data.rtdata.error) {
                box.attr('id', 'channelbox-' + data.rtdata.channel_id);
                btn.attr('id', 'grid-follow-' + data.rtdata.channel_id);
                box.html(data.rtdata.html);
            }
        }, 'json');

    }

    function subscribe2(channel_name, user_auth, id) {
        if (user_auth == 1) {
            get_new_channel(id);
            var follow_count = 5;
            follow++;
            var percent = follow * 20;
            if (percent <= 100) {
                follow_bar.progressbar({
                    value: percent
                });
            }
            console.log('Follow Count => ' + follow);
            follow_count = follow_count - follow;
            if (follow_count > 0)
            {
                $('#progressbar_follow span').html('Follow ' + follow_count + ' more channels.');
            } else if (follow_count == 1) {
                $('#progressbar_follow span').html('Clone ' + follow_count + ' more channels.');
            } else {
                $('#progressbar_follow span').html('Great! Click Next button for next step.');
            }
            switch_subscribe(id);
        }
    }

    function create_channel() {
        var messages = [];
        messages[0] = 'Please wait...';
        messages[1] = 'Your channel is preparing...';
        messages[2] = 'Files uploading to your account...';
        messages[4] = 'Your channel has been created successfully!';
        clonecount = cloned_ids.length;
        timesleep = 2000 * clonecount;
        var mes_index = 0;
        $.each(cloned_ids, function(index, value) {
            $('.load_message').html(messages[mes_index]);
            chaingame4('mass_clone', 1, value);
            //mes_index++;
        });
        setTimeout(function() {
            $('.load_message').html(messages[1]);
            setTimeout(function() {
                $('.load_message').html(messages[4]);
                $('.gotochannel').show();
                $('.load_icon').show();
                $('#grabloader').hide();
            }, timesleep / 2);
        }, timesleep / 2);
    }
</script>
</body>