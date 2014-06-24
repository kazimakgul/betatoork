<?php
foreach ($games as $game) {
    $name = $game['Game']['name'];
    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
    $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
    ?>
    <div class="game col-xs-6 col-sm-4 col-md-3 col-lg-2">
        <a href="<?php echo $playurl ?>">
            <?= $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
        </a>
     		<!-- Favorite Button -->
		<div class="favourite">
			<div class="widget-button">
				<button type="button" style="margin-top: -100px;margin-left: 50px;" id="fav-<?php echo $game['Game']['id'];?>" class="btn btn-danger" id="fav_button" onclick="favorite('<?php echo $name;?>',user_auth,<?php echo $game['Game']['id'];?>);"><li class="fa fa-heart"></li><span class="label label-info" id="fav_count"></span></button>
			</div>
		</div><!-- Favorite Button  End-->
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