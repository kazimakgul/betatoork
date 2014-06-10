<?php
foreach ($games as $game) {
    $name = $game['Game']['name'];
    $owner = empty($game['Game']['User']['username']) ? FALSE : $game['Game']['User']['username'];
    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
    $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
    $userurl = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($game['Game']['User']['id'])));
    ?>
    <div class="row user">
        <div class="col-sm-2 avatar">
            <input type="checkbox" name="select-user" />
            <a href="<?php echo $playurl ?>" target="_blank">
                <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="<?php echo $playurl ?>"  target="_blank" class="name">
                <?php echo $name ?>
            </a>
        </div>
        <div class="col-sm-2 text-right">
            <?php if ($owner !== FALSE) { ?>
                <a href="<?php echo $userurl ?>"  target="_blank" class="name">
                    <?php echo $owner ?>
                </a>
            <?php } else { ?>
                <div class="total-spent">
                    No Owner
                </div>
            <?php } ?>
        </div>
        <div class="col-sm-1 text-right">
            <div class="total-spent">
                <?php echo $clones ?>
            </div>
        </div>
        <div class="col-sm-1 text-right">
            <div class="total-spent">
                <?php echo $favorites ?>
            </div>
        </div>
        <div class="col-sm-1 text-right">
            <div class="total-spent">
                <?php echo $plays ?>
            </div>
        </div>
        <div class="col-sm-1 text-right">
            <div class="total-spent">
                <?php echo $rates ?>
            </div>
        </div>
    </div>
    <?php
}
?>