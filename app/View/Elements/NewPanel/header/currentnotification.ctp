<?php
if (isset($lastnotifies) && !is_null($lastnotifies)) {
    foreach ($lastnotifies as $lastnotify) {
        $followid = $lastnotify['PerformerUser']['id'];
        if ($lastnotify['PerformerUser']['screenname'] != NULL) {
            $performername = $lastnotify['PerformerUser']['screenname'];
        } else {
            $performername = $lastnotify['PerformerUser']['username'];
        }
        if ($lastnotify['PerformerUser']['seo_username'] != NULL) {
            $profileurl = $this->Html->url(array("controller" => h($lastnotify['PerformerUser']['seo_username']), "action" => ''));
        } else {
            $profileurl = $this->Html->url(array("controller" => "games", "action" => "profile", $followid));
        }
        $card = $this->requestAction(array('controller' => 'games', 'action' => 'follow_card', $followid));
        $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
        $activity_message = $this->requestAction(array('controller' => 'apis', 'action' => 'notificationMessage'), array('pass' => $lastnotify));
        $timestamp = strtotime($lastnotify['Activity']['created']);
        $time = date("c", $timestamp);
        $wall = $this->Html->url(array("controller" => "wallentries", "action" => "wall3"));
        $msg_id = $lastnotify['Activity']['msg_id'];
        $postPage = $this->Html->url(array("controller" => "wallentries", "action" => "posts", $msg_id));
        ?>
        <li class="grd-white notifyblocks unseen" id="<?php echo $lastnotify['Activity']['id']; ?>">
            <div class="media" style="margin:5px;">
                <div class="span1" style="margin:0px -20px 0px 0px;">
                    <div class="pull-left">
                        <?php
                        if ($card[6]['User']['picture'] == null) {
                            echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("class" => "img-polaroid", "alt" => "toork avatar image", 'width' => '30'));
                        } else {
                            echo $this->Upload->image($card[6], 'User.picture', array('class' => 'img-circle'), array('width' => '30', "class" => "img-polaroid", 'onerror' => 'imgError(this,"avatar");'));
                        }
                        ?>
                    </div>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><a href="<?php echo $profileurl ?>" class="btn btn-link" style="margin-top:0px; padding:0px 0px 0px 0px;"><?php echo $performername; ?></a><small class=" pull-right helper-font-small"><a href='<?php echo $postPage; ?>' class="timeago" title='<?php echo $time; ?>' style="margin:-2px 0px -25px 0px; padding-left:0px;padding-left:0px;"></a></small></h4>
                    <p><?php echo $activity_message; ?></p>
                </div>
            </div>
        </li>
        <hr style="margin:0px;">
        <?php
    }
}
?>				