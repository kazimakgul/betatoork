<?php
if(count($games)<=0){
$exploregames = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames'));
	echo '<div class="row_user" style="background: #FAFAFC;">
				<div class="no_data">
				<h3>You do not have any favorite now!</h3>
				<p>Click <a href="'.$exploregames.'" class="aRq">Explore Games</a> button to add new favorites</p>
				
				</div>
		</div>';
}else{
	foreach ($games as $game) {
    $name = $game['Game']['name'];
    $owner = empty($game['Game']['User']['username']) ? FALSE : $game['Game']['User']['username'];
    $clones = empty($game['Game']['Gamestat']['channelclone']) ? 0 : $game['Game']['Gamestat']['channelclone'];
    $favorites = empty($game['Game']['Gamestat']['favcount']) ? 0 : $game['Game']['Gamestat']['favcount'];
    $plays = empty($game['Game']['Gamestat']['playcount']) ? 0 : $game['Game']['Gamestat']['playcount'];
    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
    $userurl = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($game['Game']['User']['id'])));
    if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
        $playurl = $this->Html->url('http://' . $game['Game']['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
    } else {
        $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
    }
    ?>
    <div class="row user">
        <div class="col-sm-1 text-center followcolumn">
            <!-- Favorite Button -->
            <div class="favourite">
                <div class="widget-button" data-toggle="tooltip" data-original-title="Unfavorite">
                    <button type="button"  id="fav-<?php echo $game['Game']['id']; ?>" class="btn btn-danger" id="fav_button" onclick="favorite('<?php echo $name; ?>', user_auth,<?php echo $game['Game']['id']; ?>);"><li class="fa fa-heart"></li><span class="label label-info" id="fav_count"></span></button>
                </div>
            </div><!-- Favorite Button  End-->
        </div>
        <div class="col-sm-2 text-center avatar">

            <a href="<?php echo $playurl ?>" target="_blank">
                <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
            </a>
        </div>
        <div class="col-sm-3 text-center">
            <a href="<?php echo $playurl ?>"  target="_blank" class="name">
                <?php echo $name ?>
            </a>
        </div>
        <div class="col-sm-2 text-center">
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
        <div class="col-sm-1 text-center">
            <div class="total-spent">
                <?php echo $clones ?>
            </div>
        </div>
        <div class="col-sm-1 text-center">
            <div class="total-spent">
                <?php echo $favorites ?>
            </div>
        </div>
        <div class="col-sm-1 text-center">
            <div class="total-spent">
                <?php echo $plays ?>
            </div>
        </div>
        <div class="col-sm-1 text-center">
            <div class="total-spent">
                <?php echo $rates ?>
            </div>
        </div>
    </div>
    <?php
    }
}
?>