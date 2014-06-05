<?php
foreach ($games as $game) {
    $name = $game['Game']['name'];
    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
    ?>
    <div class="row user">
        <div class="col-sm-2 avatar">
            <input type="checkbox" name="select-user" />
            <?= $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
        </div>
        <div class="col-sm-6">
            <a href="user-profile.html" class="name"><?= $name ?></a>
        </div>
        <div class="col-sm-1 text-right">
            <div class="total-spent">
                <?= $clones ?>
            </div>
        </div>
        <div class="col-sm-1 text-right">
            <div class="total-spent">
                <?= $favorites ?>
            </div>
        </div>
        <div class="col-sm-1 text-right">
            <div class="total-spent">
                <?= $plays ?>
            </div>
        </div>
        <div class="col-sm-1 text-right">
            <div class="total-spent">
                <?= $rates ?>
            </div>
        </div>
    </div>
    <?php
}
?>