<?php
foreach ($following as $value) {
    $name = $value['User']['username'];
    $userid = $value['User']['id'];
    $publicname = $value['User']['username'];
    $followstatus = $this->requestAction(array('controller' => 'subscriptions', 'action' => 'followstatus'), array($userid));
    $followers = $value['Userstat']['subscribeto'];
    $following = $value['Userstat']['subscribe'];
    $games = $value['Userstat']['uploadcount'];
    if (Configure::read('Domain.type') == 'subdomain') {
        $userlink = $this->Html->url('http://'.$value['User']['seo_username'].'.'.$_SERVER['HTTP_HOST']); 
    } else {
        $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
    }
    ?>
    <div class="user col-xs-6 col-sm-4 col-md-3 col-lg-2">
        <a href="<?php echo $userlink ?>">
            <?php
            if (is_null($value['User']['picture'])) {
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name));
            } else {
                echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name));
            }
            ?>
        </a>
        <!-- Follow button -->
        <?php if ($followstatus != 1) { ?>
            <a id="follow<?php echo $userid; ?>" class="btn btn-primary" onclick="subscribe('<?php echo $publicname ?>', user_auth,<?php echo $userid; ?>);
                    switchfollow(<?php echo $userid; ?>);
                    _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname ?>']);"><i class="fa fa-plus-circle"></i> Follow</a> 
            <a id="unfollow<?php echo $userid; ?>" style="display:none;" class="btn btn-success" onclick="subscribeout('<?php echo $publicname ?>', user_auth,<?php echo $userid; ?>);
                    switchunfollow(<?php echo $userid; ?>);
                    _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname ?>']);"> <i class="fa fa-foursquare"></i> Unfollow</a>
           <?php } else { ?> 
            <a id="unfollow<?php echo $userid; ?>" class="btn btn-success" onclick="subscribeout('<?php echo $publicname ?>', user_auth,<?php echo $userid; ?>);
                    switchunfollow(<?php echo $userid; ?>);
                    _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname ?>']);"><i class="fa fa-foursquare"></i>  Unfollow</a>
            <a id="follow<?php echo $userid; ?>" style="display:none;" class="btn btn-primary" onclick="subscribe('<?php echo $publicname ?>', user_auth,<?php echo $userid; ?>);
                    switchfollow(<?php echo $userid; ?>);
                    _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname ?>']);"><i class="fa fa-plus-circle"></i> Follow</a> <?php } ?> 
        <!-- Follow button end -->
        <div class="name">
            <a href="<?php echo $userlink ?>">
                <?php echo $name ?>
            </a>
        </div>
        <div class="email">
            <?php
            echo
            $followers . ' Followers | ' .
            $following . ' Following | ' .
            $games . ' Gamses'
            ?>
        </div>
    </div>
    <?php
}
?>