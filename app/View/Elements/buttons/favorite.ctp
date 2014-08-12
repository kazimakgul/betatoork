<?php
/**
 * $name
 * $id
 * $favorite optinal
 */
?>
<?php if (isset($favorite) && $favorite === TRUE) { ?>
    <a onclick="favorite('<?php echo $name; ?>', user_auth, <?php echo $id; ?>);" class="btn btn-default fav-<?php echo $id; ?>" ><i class="fa fa-heart"></i> UnFavorite</a>
<?php } else { ?>
    <a onclick="favorite('<?php echo $name; ?>', user_auth, <?php echo $id; ?>);" class="btn btn-danger fav-<?php echo $id; ?>" ><i class="fa fa-heart"></i> Favorite</a>
<?php } ?>
