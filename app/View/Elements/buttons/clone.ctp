<?php if ($clone !== TRUE) { ?>
    <button onclick="chaingame3('<?php echo $name; ?>', user_auth, <?php echo $id; ?>);" class="btn btn-success clone-<?php echo $id; ?>"><i class="fa fa-cog"></i> Clone</button>
<?php } else { ?>
    <button onclick="chaingame3('<?php echo $name; ?>', user_auth, <?php echo $id; ?>);" class="btn btn-default clone-<?php echo $id; ?>"><i class="fa fa-cog"></i> Cloned</button>
<?php } ?>