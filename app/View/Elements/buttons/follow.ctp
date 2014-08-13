<?php
/**
 * $id
 * $name
 * $follow optional
 */
?>
<?php if (isset($follow) && $follow === TRUE) { ?>
    <a id="list-unfollow-<?php echo $userid; ?>" class="btn btn-default" onclick="subscribeout('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchunfollow(<?php echo $userid; ?>);"><i class="fa fa-minus-circle"></i> Unfollow</a>
    <a id="list-follow-<?php echo $userid; ?>" style="display:none;" class="btn btn-success" onclick="subscribe('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchfollow(<?php echo $userid; ?>);"><i class="fa fa-plus-circle"></i> Follow</a>
<?php } else { ?>
    <a id="list-follow-<?php echo $userid; ?>" class="btn btn-success" onclick="subscribe('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchfollow(<?php echo $userid; ?>);"><i class="fa fa-plus-circle"></i> Follow</a> 
    <a id="list-unfollow-<?php echo $userid; ?>" style="display:none;" class="btn btn-default" onclick="subscribeout('<?php echo $publicname ?>', user_auth, <?php echo $userid; ?>); switchunfollow(<?php echo $userid; ?>);"><i class="fa fa-minus-circle"></i> Unfollow</a>
<?php } ?>
