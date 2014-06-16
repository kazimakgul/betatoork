<?php
foreach ($following as $value) {
	$userid  =$value['User']['id'];
	$publicname = $value['User']['username'];
    $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($userid)));
	$followid = $follower['User']['id'];
    ?>
    <div class="row user">
        <div class="col-sm-1">
<!-- Follow button -->
		<a id="unfollow<?php echo $userid; ?>" class="btn btn-block" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchunfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-remove-circle"></i> Unfollow</a>
		<a id="follow<?php echo $userid; ?>" style="margin-top: 5px; display:none;" class="btn btn-block btn-success" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-plus-sign"></i> Follow</a>
<!-- Follow button end -->
		</div>
        
        <div class="col-sm-1 avatar">
           <!-- <input type="checkbox" name="select-user" />-->
            <a href="<?php echo $userlink ?>" target="_blank">
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
            <a href="<?php echo $userlink ?>" class="name">
                <?php echo $value['User']['username'] ?>
            </a>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $value['User']['Userstat']['subscribeto'] ?>
            </div>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $value['User']['Userstat']['subscribeto'] ?>
            </div>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $value['User']['Userstat']['uploadcount'] ?>
            </div>
        </div>
    </div>
    <?php
}
?>