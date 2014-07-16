<?php
if (!empty($followers)) {
    foreach ($followers as $value) {
        $userid = $value['User']['id'];
        $publicname = $value['User']['username'];
        $followid = $follower['User']['id'];
        $followstatus = $this->requestAction(array('controller' => 'subscriptions', 'action' => 'followstatus'), array($userid));
        if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
            $userlink = $this->Html->url('http://' . $value['User']['seo_username'] . '.' . $pure_domain);
        } else {
            $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
        }
        $name = $value['User']['username'];
        $followers = $value['User']['Userstat']['subscribeto'];
        $following = $value['User']['Userstat']['subscribe'];
        $games = $value['User']['Userstat']['uploadcount'];
        ?>
        <div class="row user">
            <div class="col-sm-2 followcolumn">
                <!-- Follow button -->
                <?php if ($followstatus != 1) { ?>
                    <a id="list-follow-<?php echo $userid; ?>" class="btn btn-success" onclick="subscribe('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchfollow(<?php echo $userid; ?>);">
                        <i class="fa fa-plus-circle"></i>
                        Follow
                    </a> 
                    <a id="list-unfollow-<?php echo $userid; ?>" style="display:none;" class="btn btn-default" onclick="subscribeout('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchunfollow(<?php echo $userid; ?>);">
                        <i class="fa fa-minus-circle"></i>
                        Unfollow
                    </a>
                <?php } else { ?> 
                    <a id="list-unfollow-<?php echo $userid; ?>" class="btn btn-default" onclick="subscribeout('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchunfollow(<?php echo $userid; ?>);">
                        <i class="fa fa-minus-circle"></i>
                        Unfollow
                    </a>
                    <a id="list-follow-<?php echo $userid; ?>" style="display:none;" class="btn btn-success" onclick="subscribe('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchfollow(<?php echo $userid; ?>);">
                        <i class="fa fa-plus-circle"></i>
                        Follow
                    </a>
                <?php } ?> 
                <!-- Follow button end -->
            </div>
            <div class="col-sm-1 avatar">
                <!-- <input type="checkbox" name="select-user" /> -->
                <a href="<?php echo $userlink; ?>" target="_blank">
                    <?php
                    if (is_null($value['User']['picture'])) {
                        $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                        echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name));
                    } else {
                        echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name));
                    }
                    ?>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="<?php echo $userlink; ?>" class="name">
                    <?php echo $name; ?>
                    <?php if ($value['User']['verify'] == 1) { ?>
                        <span class="help" data-toggle="tooltip" title="" data-original-title="Verified channel."> <i style='color:#428bca;' class="fa fa-check-circle"></i></span>
                    <?php } ?>
                </a>
            </div>
            <div class="col-sm-1 col-sm-offset-1 text-right">
                <div class="total-spent">
                    <?php echo $followers; ?>
                </div>
            </div>
            <div class="col-sm-1 col-sm-offset-1 text-right">
                <div class="total-spent">
                    <?php echo $following; ?>
                </div>
            </div>
            <div class="col-sm-1 col-sm-offset-1 text-right">
                <div class="total-spent">
                    <?php echo $games; ?>
                </div>
            </div>
        </div>
        <?php
    }
}else{
	
echo $this->element('business/dashboard/nullconditions', array('link' => 'explorechannels', 'text' => 'Explore Channels'));
	
}
?>