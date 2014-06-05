<?php
foreach ($games as $game) {
    $name = $game['Game']['name'];
    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
    ?>
    <div class="user col-sm-3 col-xs-6">
        <a href="#">
            <?= $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
        </a>
        <div class="name"><?= $name ?></div>
        <div class="email">Clones: <?= $clones ?> | Favorites: <?= $favorites ?> | Plays: <?= $plays ?> | Rates: <?= $rates ?></div>
    </div>
    <?php
}
?>