<?php
/**
 * $name
 * $id
 * $clone optional
 * $page optional
 */
if (!empty($page) && $page === 'welcome') {
    $function = 'chaingame4';
} else {
    $function = 'chaingame3';
}
?>
<?php if (isset($clone) && $clone === TRUE) { ?>
    <a onclick="<?php echo $function; ?>('<?php echo $name; ?>', user_auth, <?php echo $id; ?>);" class="btn btn-default clone-<?php echo $id; ?>"><i class="fa fa-cog"></i> Cloned</a>
<?php } else { ?>
    <a onclick="<?php echo $function; ?>('<?php echo $name; ?>', user_auth, <?php echo $id; ?>);" class="btn btn-success clone-<?php echo $id; ?>"><i class="fa fa-cog"></i> Clone</a>
<?php } ?>