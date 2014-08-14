<?php
/**
 * $id
 * $name
 * $follow optional
 */
?>
<?php
if (!isset($function) || empty($function)) {
    $function = 'subscribe';
}
?>
<?php if (isset($follow) && $follow === TRUE) { ?>
    <a class="btn btn-default unfollow-<?php echo $id; ?>" onclick="subscribeout('<?php echo $name ?>', user_auth, <?php echo $id; ?>); switchunfollow(<?php echo $id; ?>);"><i class="fa fa-minus-circle"></i> Unfollow</a>
    <a class="btn btn-success follow-<?php echo $id; ?>" onclick="<?php echo $function; ?>('<?php echo $name ?>', user_auth, <?php echo $id; ?>); switchfollow(<?php echo $id; ?>);" style="display:none;"><i class="fa fa-plus-circle"></i> Follow</a>
<?php } else { ?>
    <a class="btn btn-success follow-<?php echo $id; ?>" onclick="<?php echo $function; ?>('<?php echo $name ?>', user_auth, <?php echo $id; ?>); <?php if ($function === 'subscribe') { ?>switchfollow(<?php echo $id; ?>);<?php } ?>"><i class="fa fa-plus-circle"></i> Follow</a> 
    <a class="btn btn-default unfollow-<?php echo $id; ?>" onclick="subscribeout('<?php echo $name ?>', user_auth, <?php echo $id; ?>); switchunfollow(<?php echo $id; ?>);" style="display:none;"><i class="fa fa-minus-circle"></i> Unfollow</a>
<?php } ?>
