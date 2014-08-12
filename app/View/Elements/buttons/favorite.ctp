<?php if (isset($favorite) && $favorite === TRUE) { ?>
    <a type="button" class="btn btn-danger fav-<?php echo $game['Game']['id']; ?>" onclick="favorite('<?php echo $game['Game']['name']; ?>', user_auth, <?php echo $game['Game']['id']; ?>);"><i class="fa fa-heart"></i> Favorite</a>
<?php } else { ?>
    <a type="button" class="btn btn-danger fav-<?php echo $game['Game']['id']; ?>" onclick="favorite('<?php echo $game['Game']['name']; ?>', user_auth, <?php echo $game['Game']['id']; ?>);"><i class="fa fa-heart"></i> Favorite</a>
<?php } ?>
