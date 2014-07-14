<?php
foreach ($following as $value) {
    if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
        $userlink = $this->Html->url('http://' . $value['User']['seo_username'] . '.' . $pure_domain);
    } else {
        $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
    }
    $userid = $value['User']['id'];
    $publicname = $value['User']['username'];
    $followid = $follower['User']['id'];
    $name = $value['User']['username'];
    $screenname = $value['User']['screenname'];
    $followers = $value['User']['Userstat']['subscribeto'];
    $following = $value['User']['Userstat']['subscribe'];
    $games = $value['User']['Userstat']['uploadcount'];
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
                    <a id="grid-unfollow-<?php echo $userid; ?>" class="btn btn-primary" onclick="subscribeout('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchunfollow(<?php echo $userid; ?>);"><i class="fa fa-foursquare"></i> Unfollow</a>
                    <a id="grid-follow-<?php echo $userid; ?>" style="display:none;" class="btn btn-success" onclick="subscribe('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchfollow(<?php echo $userid; ?>);"><i class="fa fa-plus-circle"></i> Follow</a>
                    <!-- Follow button end -->
                </div>
                <h4>
                    <?php if ($value['User']['verify'] == 1) { ?>
                        <span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account">
                            <i style="color:#428bca;" class="fa fa-check-circle"></i>
                        </span>
                    <?php } ?>
                    <strong><?php echo $name; ?></strong>
                    <br>
                    <?php if (!empty($screenname)) { ?>
                        <small>@<?php echo $screenname; ?></small>
                    <?php } else { ?>
                        <small>No Screen Name</small>
                    <?php } ?>
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