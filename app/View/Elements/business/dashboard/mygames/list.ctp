<?php
foreach ($games as $game) {
    $name = $game['Game']['name'];
	$id = $game['Game']['id'];
    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
    $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
    ?>
    <div class="row user">
        <div class="col-sm-2 avatar">
            <input type="checkbox" name="select-user" value="<?php echo $id;?>" />
            <a href="<?php echo $playurl ?>" target="_blank">
                <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
            </a>
        </div>
        <div class="col-sm-6">
            <a href="<?php echo $playurl ?>" class="name">
                <?php echo $name ?>
            </a>
            <a href="<?php echo $game_edit_link.'/'.$id; ?>"><i class="fa fa-pencil"></i></a>

            <?php if($game['Game']['priority']>0){ ?>
            <a href='#' style='display:none' class='featured_toggle unsetfeat' id='<?php echo $game['Game']['id']; ?>' style='margin-left:10px;color:#F7D358;'><i class="fa fa-star"></i></a>
            <?php }else{?>
            <a href='#' style='display:none' class='featured_toggle setfeat' id='<?php echo $game['Game']['id']; ?>' style='margin-left:10px;color:#E6E6E6;'><i class="fa fa-star"></i></a>
            <?php }?>



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