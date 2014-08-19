<?php
$image = $this->requestAction(array('controller' => 'users', 'action' => 'randomPicture', 62));
$suburl2 = $this->Html->url(array("controller" => "subscriptions", "action" => "add_subscription"));
$followNo = $user['Userstat']['subscribeto'];
$gameNo = $user['Userstat']['uploadcount'];
$subgameurl = $this->Html->url(array("controller" => "businesses", "action" => "toprated", $user['User']['id']));
?>
<script>
    subswitcher = '<?php echo $this->Html->url(array('controller' => 'subscriptions', 'action' => 'add_subscription')); ?>';
<?php if ($this->Session->check('Auth.User') == 1) { ?>
        user_auth = 1;
<?php } else { ?>
        user_auth = 0;
<?php } ?>
</script>
<div class="showhim col-md-12">
    <?php if ($user['User']['banner'] == null) { ?>
        <div class="panel no-border" id="user_cover" style="background-size:contain; background-position:center; background-image:url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg)">
        <?php } else { ?>
            <div class="panel no-border" id="user_cover" style="margin-bottom: 15px !important;background-size:contain; background-position:center; background-image:url(<?php echo Configure::read('S3.url') . "/upload/users/" . $user['User']['id'] . "/" . $user['User']['banner']; ?>)">
            <?php } ?>
            <div id="profilepicarea">
                <?php
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                if ($user['User']['picture'] == null) {
                    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('class' => 'circular img-thumbnail', "alt" => "clone user image"));
                } else {
                    echo $this->Upload->image($user, 'User.picture', array(), array('id' => 'user_avatar', 'class' => 'circular img-thumbnail', 'onerror' => 'imgError(this,"avatar");'));
                }
                ?>
                <?php if ($controls == $user['User']['id'] && !isset($this->request->query['mode'])) { ?>
                    <a id="changeprofilepic" data-toggle="modal" data-target="#pictureChange"  href="#" class="btn btn-xs btn-default pull-left"><span class="fa fa-picture-o"></span> Change</a>
                <?php } ?>
            </div>
            <?php if ($controls == $user['User']['id'] && !isset($this->request->query['mode'])) { ?>
                <a data-toggle="modal" data-target="#coverChange" href="#" class="btn btn-xs btn-default pull-left" style="margin:10px 0px 10px -160px; position:absolute;"><span class="fa fa-picture-o"></span> Change Cover</a>
            <?php } ?>

            <?php
            $website = $user['User']['website'];
            $facebook = $user['User']['fb_link'];
            $twitter = $user['User']['twitter_link'];
            $gplus = $user['User']['gplus_link'];
            if ($website == NULL) {
                
            } else {
                echo " <a href='$website'' class='btn btn-xs btn-success pull-right' style='margin:10px;' target='_blank'><span class='fa fa-globe'></span> $website</a>";
            }
            if ($facebook == NULL) {
                
            } else {
                echo " <a href='$facebook' class='btn btn-xs btn-primary pull-right' style='margin:10px;' target='_blank'><span class='fa fa-facebook-square'></span> Facebook</a>";
            }
            if ($gplus == NULL) {
                
            } else {
                echo " <a href='$gplus' class='btn btn-xs btn-danger pull-right' style='margin:10px;' target='_blank'><span class='fa fa-google-plus-square'></span> Google+</a>";
            }
            if ($twitter == NULL) {
                
            } else {
                echo " <a href='$twitter' class='btn btn-xs btn-info pull-right' style='margin:10px;' target='_blank'><span class='fa fa-twitter-square'></span> Twitter</a>";
            }
            ?>
        </div>
            <div class="name">
                <?php if ($follow == 0 || $this->Session->check('Auth.User') == 0) { ?>
                    <a class="btn btn-primary" id="follow_button"  onclick="subscribe('<?php echo $user['User']['username'] ?>', user_auth,<?php echo $user['User']['id'] ?>);
                        _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $user['User']['username'] ?>']);">
                        <i class="fa fa-plus-circle"></i> Follow - <?php echo $followNo; ?>
                    </a>
                    <a class="btn btn-success" id="unFollow_button" style="display:none;" onclick="subscribeout('<?php echo $user['User']['username'] ?>', user_auth,<?php echo $user['User']['id'] ?>);
                        _gaq.push(['_trackEvent', 'Channel', 'unFollow', '<?php echo $user['User']['username'] ?>']);">
                        <i class="fa fa-foursquare"></i> Unfollow - <span id='flwnumber'><?php echo $followNo; ?></span>
                    </a>
                <?php } else { ?>
                    <a class="btn btn-primary" id="follow_button" style="display:none;" onclick="subscribe('<?php echo $user['User']['username'] ?>', user_auth,<?php echo $user['User']['id'] ?>);
                        _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $user['User']['username'] ?>']);">
                        <i class="fa fa-plus-circle"></i> Follow - <span id='flwnumber'><?php echo $followNo; ?></span>
                    </a>
                    <a class="btn btn-success" id="unFollow_button" onclick="subscribeout('<?php echo $user['User']['username'] ?>', user_auth,<?php echo $user['User']['id'] ?>);
                        _gaq.push(['_trackEvent', 'Channel', 'unFollow', '<?php echo $user['User']['username'] ?>']);">
                        <i class="fa fa-foursquare"></i> Unfollow - <?php echo $followNo; ?>
                    </a>
                <?php } ?>
                <a href="<?= $subgameurl; ?>/sort:recommend/direction:desc" class="btn btn-danger"><i class="fa fa-gamepad"></i> Games - <?php echo $gameNo; ?></a>
            </div>
        <br><br><br><br>
    </div>