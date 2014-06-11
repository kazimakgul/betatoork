<?php
foreach ($games as $game) {
    $name = $game['Game']['name'];
    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
    ?>
    <div class="game col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <a href="#">
            <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
        </a>
        <div class="name"><?= $name ?></div>
        <div class="email">Clones: <?php echo $clones ?> | Favorites: <?php echo $favorites ?> | Plays: <?php echo $plays ?> | Rates: <?php echo $rates ?></div>
    </div>
    <?php
}
?>