<?php
$avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
$image = $this->requestAction(array('controller' => 'users', 'action' => 'randomPicture', 62));
if ($user['User']['picture'] == null) {
    $img = $this->Html->image("/img/avatars/$avatarImage.jpg", array('class' => 'img-responsive img-circle circular1', "alt" => "clone user image"));
} else {
    $img = $this->Upload->image($user, 'User.picture', array(), array('class' => 'img-responsive img-circle circular1', 'onerror' => 'imgError(this,"avatar");'));
}

if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
    $gochannel = $this->Html->url('http://' . $user['User']['seo_username'] . '.' . $_SERVER['HTTP_HOST']);
} else {
    $gochannel = $this->Html->url(array('controller' => 'businesses', 'action' => 'mysite', $user['User']['id']));
}
?>
<style>
    #content{
        margin-left: 0px;
    }
</style>
<body id="wizard">
<div id="wrapper">
    <div id="content">
        <div class="content-wrapper">
            <div class="header">
                <div class="sidebar-toggler visible-xs">
                    <i class="ion-navicon"></i>
                </div>
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
            <section class="form-wizard">
                <form id="welcome_form" method="post" action="#" role="form">
                    <div class="step active animated fadeInRightStep">
                        <div class="form-group">
                            <label>Custom Domain: </label>
                            <span class="help" data-toggle="tooltip" title="Map your own domain to your channel.">
                                <i class="fa fa-question-circle"></i>
                            </span>
                            <a class="btn btn-default"> http://<?php echo $user['User']['seo_username']; ?>.clone.gs </a>
                            <a class="btn btn-default"><i class="fa fa-globe"></i> Map Domain </a>
                        </div>
                        <!--Channel Cover Avatar Begins -->
                        <div id='background_area' style="background-image: url('<?php echo Configure::read('S3.url') . '/upload/users/' . $user['User']['id'] . '/' . $user['User']['bg_image']; ?>'); background-color:<?php echo $user['User']['bg_color']; ?>;" class="well col-md-12">
                            <?php if ($user['User']['banner'] == null) { ?>
                                <div id="user_cover" style="background-image:url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);height: 160px;">
                                <?php } else { ?>
                                    <div id="user_cover" style="background-image:url(<?php echo Configure::read('S3.url') . "/upload/users/" . $user['User']['id'] . "/" . $user['User']['banner']; ?>);height: 160px;">
                                        <?php
                                    }
                                    $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                                    if ($user['User']['picture'] == null) {
                                        echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('style' => 'margin-top:120px;', 'id' => 'user_avatar', 'class' => 'pic circular1 img-thumbnail', "alt" => "clone user image"));
                                    } else {
                                        echo $this->Upload->image($user, 'User.picture', array(), array('style' => 'margin-top:120px; width:120px; height:120px;', 'id' => 'user_avatar', 'class' => 'pic circular1 img-thumbnail', 'onerror' => 'imgError(this,"avatar");'));
                                    }
                                    ?>
                                    <a data-toggle="modal" data-target="#coverChange" href="#" class="btn btn-xs btn-default pull-left" style="margin: 10px 0px 0px -110px; position:absolute;"><span class="fa fa-picture-o"></span> Change Cover</a>
                                    <div class="name">
                                        <div class="showme">
                                            <a data-toggle="modal" data-target="#pictureChange"  href="#" class="btn btn-xs btn-default pull-left" style="margin:-40px 0px 10px 27px; position:absolute;"><span class="fa fa-picture-o"></span> Change</a>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br><br>
                            </div>
                            <!--Channel Cover Avatar Ends -->
                            <div class="form-group">
                                <label style="text-align:left !important;">Screen Name
                                    <span class="help" data-toggle="tooltip" title="Users will see your screen name on your channel.">
                                        <i class="fa fa-question-circle"></i>
                                    </span>
                                </label>
                                <input type="text" class="form-control" name='screenname' id="title" value="<?php echo $user['User']['screenname']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <div><textarea id="desc" class="form-control" id="desc" rows="4" name="description" style="margin-bottom: 10px; height:100px;"><?php echo $user['User']['description']; ?></textarea></div>
                            </div>
                            <div class="form-group">
                                <label>Background Color</label>
                                <div>
                                    <input type="text" class="form-control minicolors" name='bgclr' id="bgcolor" value="<?php echo $user['User']['bg_color']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="attr" name="attr" value="channel_update_start" />
                            </div>
                            <div class="form-group form-actions" style="float: left;width: 100%;">
                                <button type="submit"  id="updateButton" class="btn button" data-step="2">
                                    <span>Next Step <i class="fa fa-angle-double-right"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="step">
                            <div id="progressbar_clone" style="width: 500px; margin: 0px auto; margin-bottom: 20px;text-align: center;"><span>Start following minimum 5 games</span></div>
                            
                            <div class="game_area">
                            <?php
                            foreach ($games as $game) {
                                $name = $game['Game']['name'];
                                $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
                                $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
                                $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
                                $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
                                if (Configure::read('Domain.type') == 'subdomain') {
                                    $playurl = $this->Html->url(array("controller" => 'play', "action" => h($game['Game']['seo_url'])));
                                } else {
                                    $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
                                }
                                ?>
                                <div class="game col-sm-4 panel">
                                    <a data-dismiss="alert" id="clone-<?php echo $game['Game']['id']; ?>" onclick="chaingame3('<?php echo $name; ?>', user_auth,<?php echo $game['Game']['id']; ?>);" class="btn btn-success startUpClone get_new_game"><i class="fa fa-cog "></i> Clone</a>
                                    <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");', 'width' => '200px', 'height' => '110px')); ?>
                                    <div class="name">
                                        <a href="<?php echo $playurl ?>" style="color:#000000">
                                            <?php echo $name ?>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            </div>

                            <div class="form-group form-actions" style="float: left;width: 100%;">
                                <a id="back" class="button" href="#" data-step="1" style="margin-top:35px;">
                                    <span><i class="fa fa-angle-double-left"></i> Back</span>
                                </a>
                                <button id="next" type="submit" class="button" data-step="3" style="margin-top:35px;">
                                    <span>Next Step <i class="fa fa-angle-double-right"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="step">
                            <div id="progressbar_follow"></div>
                            <?php
                            foreach ($following as $value) {
                                if (Configure::read('Domain.type') == 'subdomain') {
                                    $userlink = $this->Html->url(array("controller" => '/', "action" => h($value['User']['seo_username'])));
                                } else {
                                    $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
                                }
                                $name = $value['User']['username'];
                                $userid = $value['User']['id'];
                                $publicname = $value['User']['username'];
                                $followstatus = $this->requestAction(array('controller' => 'subscriptions', 'action' => 'followstatus'), array($userid));
                                $followers = $value['Userstat']['subscribe'];
                                $following = $value['Userstat']['subscribeto'];
                                $games = $value['Userstat']['uploadcount'];
                                ?>
                                <div class="user col-sm-2 panel">
                                    <a href="<?php echo $userlink ?>">
                                        <?php
                                        if (is_null($value['User']['picture'])) {
                                            $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                                            echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name, 'width' => '90px', 'height' => '120px'));
                                        } else {
                                            echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name, 'width' => '90px', 'height' => '120px'));
                                        }
                                        ?>
                                    </a>
                                    <div class="name">
                                        <a href="<?php echo $userlink ?>" class="text-render">
                                            <?php echo $name ?>
                                        </a>
                                    </div>
                                    <!-- Follow button -->
                                    <?php if ($followstatus != 1) { ?>
                                        <a id="follow<?php echo $userid; ?>" class="btn btn-primary" style="width:90px;" onclick="subscribe2('<?php echo $publicname ?>', user_auth,<?php echo $userid; ?>);
                                                        switchfollow(<?php echo $userid; ?>);
                                                        _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname ?>']);"><i class="fa fa-plus-circle"></i> Follow</a> 
                                        <a id="unfollow<?php echo $userid; ?>" style="display:none;width:90px;" class="btn btn-success" onclick="subscribeout('<?php echo $publicname ?>', user_auth,<?php echo $userid; ?>);
                                                        switchunfollow(<?php echo $userid; ?>);
                                                        _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname ?>']);"> <i class="fa fa-foursquare"></i> Unfollow</a>
                                       <?php } else { ?> 
                                        <a id="unfollow<?php echo $userid; ?>" class="btn btn-success" style="width:90px;" onclick="subscribeout('<?php echo $publicname ?>', user_auth,<?php echo $userid; ?>);
                                                        switchunfollow(<?php echo $userid; ?>);
                                                        _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname ?>']);"><i class="fa fa-foursquare"></i>  Unfollow</a>
                                        <a id="follow<?php echo $userid; ?>" style="display:none;width:90px;" class="btn btn-primary"  onclick="subscribe2('<?php echo $publicname ?>', user_auth,<?php echo $userid; ?>);
                                                        switchfollow(<?php echo $userid; ?>);
                                                        _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname ?>']);"><i class="fa fa-plus-circle"></i> Follow</a> <?php } ?> 
                                    <!-- Follow button end -->
                                </div>
                                <?php
                            }
                            ?>							
                            <div class="form-group form-actions" style="float: left;width: 100%;">
                                <a id="back" class="button" href="#" data-step="2">
                                    <span><i class="fa fa-angle-double-left"></i> Back</span>
                                </a>
                                <button id="next" type="submit" class="button" data-step="4">
                                    <span>Next <i class="fa fa-angle-double-right"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="step">
                            <div class="success">
                                <i class="ion-checkmark-circled"></i>
                                <h3>
                                    Your channel has been created successfully!
                                </h3>
                                <a href="<?php echo $gochannel; ?>" class="btn btn-success">
                                    <span>Go to my channel</span>
                                </a>
                            </div>
                        </div>
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
    #progressbar_clone, #progressbar_follow {
        margin-bottom: 20px;
    }
    .ui-widget-header {
        background: none !important;
        background-color: #5A6474 !important;
    }
    .ui-progressbar-value {
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        background-color: #5A6474 !important;
    }
    .ui-widget-content {
        border: 1px solid #94A1B8 !important;
    }
</style>
<!-- Background Change Modal ends -->
<script type="text/javascript">
    var clone = 0;
    var follow = 0;
    var clone_bar = $('#progressbar_clone');
    var follow_bar = $('#progressbar_follow');
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
                            alert('Please Clone Least 5 Games');
                            break;
                        case 3:
                            alert('Please Follow Least 5 Channels');
                            break;
                        default:
                            alert('Error');
                    }
                }
            }
        });
    });
    function chaingame3(game_name, user_auth, game_id) {
        var btn = $('#clone-' + game_id);
        btn.button('loading');
        var clone_count=5;
        if (user_auth == 1) {
            
                    //---------
                    clone++;
                    var percent = clone * 20;
                    if (percent <= 100) {
                        clone_bar.progressbar({
                            value: percent
                        });
                    }
                    console.log('Clone Count => ' + clone);
                    clone_count=clone_count-clone;
                    if(clone_count>0)
                    {
                    $('#progressbar_clone span').html('Clone '+clone_count+' more games');
                }else{
                    $('#progressbar_clone span').html('Great! Click Next button for next step.');
                }

                    //---------

            $.get(chaingame + '/' + game_id, function(data) {
                if (data == 1) {
                    //Messenger().post("Game Cloned");
                    
                    //btn.button('reset');
                } else {
                    Messenger().post("Error. Please, try again..");
                    btn.button('reset');
                }
            });
        } else {
            $('#myModal').modal('hide');
            $('#login').modal('show');
        }
    }
    function subscribe2(channel_name, user_auth, id) {
        if (user_auth == 1) {
            switch_subscribe(id);
            follow++;
            var percent = follow * 10;
            if (percent <= 100) {
                follow_bar.progressbar({
                    value: percent
                });
            }
            console.log('Follow Count => ' + follow);
        }
    }
</script>
</body>