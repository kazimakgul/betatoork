<?php
foreach ($following as $value) {
    $name = $value['User']['username'];
    $userid = $value['User']['id'];
    $publicname = $value['User']['username'];
    $followstatus = $this->requestAction(array('controller' => 'subscriptions', 'action' => 'followstatus'), array($userid));
    $followers = $value['Userstat']['subscribeto'];
    $following = $value['Userstat']['subscribe'];
    $games = $value['Userstat']['uploadcount'];
    if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
        $userlink = $this->Html->url('http://' . $value['User']['seo_username'] . '.' . $_SERVER['HTTP_HOST']);
    } else {
        $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
    }
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
    $games_3 = $this->requestAction(array('controller' => 'games', 'action' => 'random_3_game', $userid));
    ?>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div style="padding:40px; background-size:contain; background-position:center; background-size: 100%; background-image:url(<?php echo $cover; ?>)" class="panel-heading">
            </div>
            <a href="<?php echo $userlink; ?>">
                <?php echo $avatar; ?>
            </a>
            <div class="panel-body">
                <div style="margin-top:-10px;" class="text-center">
                    <!-- Follow button -->
                    <?php if ($followstatus != 1) { ?>
                        <a id="grid-follow-<?php echo $userid; ?>" class="btn btn-success" onclick="subscribe('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>);
                                switchfollow(<?php echo $userid; ?>);">
                            <i class="fa fa-plus-circle"></i>
                            Follow
                        </a>
                        <a id="grid-unfollow-<?php echo $userid; ?>" style="display:none;" class="btn btn-default" onclick="subscribeout('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>);
                                switchunfollow(<?php echo $userid; ?>);">
                            <i class="fa fa-minus-circle"></i>
                            Unfollow
                        </a>
                    <?php } else { ?>
                        <a id="grid-unfollow-<?php echo $userid; ?>" class="btn btn-default" onclick="subscribeout('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>);
                                switchunfollow(<?php echo $userid; ?>);">
                            <i class="fa fa-minus-circle"></i>
                            Unfollow
                        </a>
                        <a id="grid-follow-<?php echo $userid; ?>" style="display:none;" class="btn btn-success" onclick="subscribe('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>);
                                switchfollow(<?php echo $userid; ?>);">
                            <i class="fa fa-plus-circle"></i>
                            Follow
                        </a>
                    <?php } ?>
                    <!-- Follow button end -->
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
            <?php if (!empty($games_3)) { ?>
                <div class="panel-footer">
                    <div class="row">
                        <?php
                        //  print_r($games_3);
                        foreach ($games_3 as $game33) {
                            if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                                $playurl = $this->Html->url('http://' . $value['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game33['Game']['seo_url']));
                            } else {
                                $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game33['Game']['id'])));
                            }
                            ?>
                            <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="<?php echo $playurl; ?>">
                                <!-- <img width="100%" data-original-title="<?php echo $game33['Game']['name'] ?>" data-placement="bottom" data-toggle="tooltip" src="https://s3.amazonaws.com/betatoorkpics/upload/games/6792/super_mario_bros_3_by_ggrock70-d36fqni_toorksize.png"> -->
                                <?= $this->Upload->image($game33, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $game33['Game']['name'], 'data-original-title' => $game33['Game']['name'], 'data-placement' => 'bottom', 'data-toggle' => 'tooltip', 'width' => '100%', 'onerror' => 'imgError(this,"toorksize");')); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>