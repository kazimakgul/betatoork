<?php
/**
 * $id
 * $name
 * $follow optional
 */
?>
<?php if (isset($follow) && $follow === TRUE) { ?>
    <a id="list-unfollow-<?php echo $id; ?>" class="btn btn-default" onclick="subscribeout('<?php echo $name ?>', user_auth, <?php echo $id; ?>); switchunfollow(<?php echo $id; ?>);"><i class="fa fa-minus-circle"></i> Unfollow</a>
    <a id="list-follow-<?php echo $id; ?>" style="display:none;" class="btn btn-success" onclick="subscribe('<?php echo $name ?>', user_auth, <?php echo $id; ?>); switchfollow(<?php echo $id; ?>);"><i class="fa fa-plus-circle"></i> Follow</a>
<?php } else { ?>
    <a id="list-follow-<?php echo $id; ?>" class="btn btn-success" onclick="subscribe('<?php echo $name ?>', user_auth, <?php echo $id; ?>); switchfollow(<?php echo $id; ?>);"><i class="fa fa-plus-circle"></i> Follow</a> 
    <a id="list-unfollow-<?php echo $id; ?>" style="display:none;" class="btn btn-default" onclick="subscribeout('<?php echo $name ?>', user_auth, <?php echo $id; ?>); switchunfollow(<?php echo $id; ?>);"><i class="fa fa-minus-circle"></i> Unfollow</a>
<?php } ?>
