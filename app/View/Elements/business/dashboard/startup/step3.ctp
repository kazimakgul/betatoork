<div class="step">
    <div class="row">
        <div id="progressbar_follow" class="col-sm-12">
            <span>
                Start following minimum 5 channels.
            </span>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($following as $value) {
            if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                $userlink = $this->Html->url('http://' . $value['User']['seo_username'] . '.' . $_SERVER['HTTP_HOST']);
            } else {
                $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
            }
            $name = $value['User']['username'];
            $userid = $value['User']['id'];
            $publicname = $value['User']['username'];
            $followstatus = $this->requestAction(array('controller' => 'subscriptions', 'action' => 'followstatus'), array($userid));
            $followers = $value['Userstat']['subscribeto'];
            $following = $value['Userstat']['subscribe'];
            $games = $value['Userstat']['uploadcount'];
            if (is_null($value['User']['picture'])) {
                $avatar = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                $avatar = $this->Html->image('/img/avatars/' . $avatar . '.jpg', array('alt' => $name, 'class' => 'img-responsive center-block avatar img-thumbnail img-circle', 'style' => 'margin-top:-40px; width:80px; height:80px;'));
            } else {
                $avatar = $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name, 'class' => 'img-responsive center-block avatar img-thumbnail img-circle', 'style' => 'margin-top:-40px; width:80px; height:80px;'));
            }
            if (is_null($value['User']['banner'])) {
                $cover = $this->requestAction(array('controller' => 'users', 'action' => 'randomPicture', 62));
                $cover = 'http://s3.amazonaws.com/betatoorkpics/banners/' . $cover . '.jpg';
            } else {
                $cover = Configure::read('S3.url') . "/upload/users/" . $value['User']['id'] . "/" . $value['User']['banner'];
            }
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="channelbox-<?php echo $userid; ?>">
                <div onclick='get_new_channel(<?php echo $userid; ?>);' style="position:absolute; padding:5px; right:15px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Change Channel"><i class="btn btn-xs btn-default fa fa-recycle"></i></div>
                <div class="panel panel-default">
                    <div style="padding:40px; background-size:contain; background-position:center; background-size: 100%; background-image:url(<?php echo $cover; ?>)" class="panel-heading"></div>
                    <a target="_blank" href="<?php echo $userlink; ?>">
                        <?php echo $avatar; ?>
                    </a>
                    <div class="panel-body">
                        <div style="margin-top:-10px;" class="text-center">
                            <!-- Follow button -->
                            <!--
                            <a id="grid-unfollow-<?php echo $userid; ?>" style="display:none;" class="btn btn-default"> <i class="fa fa-minus-circle"></i> Following... </a>


                            <a id="grid-follow-<?php echo $userid; ?>" class="btn btn-success" onclick="subscribe2('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>);
                                    switchfollow(<?php echo $userid; ?>);">
                                <i class="fa fa-plus-circle"></i>
                                Follow
                            </a>
                            -->
                            <!-- Follow button end -->
                            <?php echo $this->element('buttons/follow', array('id' => $userid, 'name' => $publicname, 'follow' => FALSE, 'function' => 'subscribe2')) ?>
                        </div>
                        <h4>
                            <?php if ($value['User']['verify'] == 1) { ?>
                                <span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account">
                                    <i style="color:#428bca;" class="fa fa-check-circle"></i>
                                </span>
                            <?php } ?>
                            <?php if (!empty($screenname)) { ?>
                                <strong><?php echo $screenname; ?></strong>
                            <?php } else { ?>
                                <strong><?php echo $name; ?></strong>
                            <?php } ?>
                            <br>
                            <small>@<?php echo $name; ?></small>
                        </h4>
                        <span class="label label-success"><?php echo $followers; ?> Followers</span>
                        <span class="label label-warning"><?php echo $following; ?> Following</span>
                        <span class="label label-danger"><?php echo $games; ?> Games</span>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="form-group form-actions" style="float: left;width: 100%;">
        <a id="back" class="button" href="#" data-step="2">
            <span><i class="fa fa-angle-double-left"></i> Back</span>
        </a>
        <button id="next" type="submit" class="button" data-step="4">
            <span>Next <i class="fa fa-angle-double-right"></i></span>
        </button>
    </div>
</div>