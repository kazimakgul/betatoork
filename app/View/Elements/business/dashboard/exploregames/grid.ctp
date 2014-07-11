<?php
foreach ($games as $game) {
    $name = $game['Game']['name'];
    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
    if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
        $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
    } else {
        $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
    }
    ?>
    <div class="game col-xs-6 col-sm-4 col-md-3 col-lg-2">
        <a href="<?php echo $playurl ?>">
            <?= $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
        </a>
		<button id="clone-<?php echo $game['Game']['id']; ?>" onclick="chaingame2('<?php echo $name; ?>',user_auth,<?php echo $game['Game']['id']; ?>);" class="btn btn-success" style="margin-top: -100px;margin-left: 30px;"><i class="fa fa-cog "></i> Clone</button>
        <div class="name">
            <a href="<?php echo $playurl ?>">
                <?php echo $name ?>
            </a>
        </div>
        <div class="email">
            Clones: <?= $clones ?> | Favorites: <?= $favorites ?> | Plays: <?= $plays ?> | Rates: <?= $rates ?>
        </div>
    </div>
    <?php
}
?>