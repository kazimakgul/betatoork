<?php
foreach ($following as $value) {
    $name = $value['User']['username'];
	$userid  =$value['User']['id'];
	$publicname = $value['User']['username'];
	$followstatus=$this->requestAction( array('controller' => 'subscriptions', 'action' => 'followstatus'),array($userid));
	
    $followers = $value['Userstat']['subscribe'];
    $following = $value['Userstat']['subscribeto'];
    $games = $value['Userstat']['uploadcount'];
    ?>
    	

    <div class="row user">
        <div class="col-sm-1">
<!-- Follow button -->
    <?php if($followstatus!=1){ ?>
    <a id="follow<?php echo $userid; ?>" style="margin-top: 5px;" class="btn btn-block btn-success" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-plus-sign"></i> Follow</a> 
    <a id="unfollow<?php echo $userid; ?>" style="display:none;" class="btn btn-block" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchunfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-remove-circle"></i> Unfollow</a>
    <?php }else{ ?> 
    <a id="unfollow<?php echo $userid; ?>" class="btn btn-block" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchunfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-remove-circle"></i> Unfollow</a>
    <a id="follow<?php echo $userid; ?>" style="margin-top: 5px; display:none;" class="btn btn-block btn-success" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);switchfollow(<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);"><i class="elusive-plus-sign"></i> Follow</a> <?php } ?> 
<!-- Follow button end -->
		</div>
        <div class="col-sm-1 avatar">
            <?php
            if (is_null($value['User']['picture'])) {
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name));
            } else {
                echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name));
            }
            ?>
        </div>
        <div class="col-sm-3">
            <a href="user-profile.html" class="name">
                <?php echo $name ?>
            </a>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $followers ?>
            </div>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $following ?>
            </div>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $games ?>
            </div>
        </div>
    </div>
    <?php
}
?>