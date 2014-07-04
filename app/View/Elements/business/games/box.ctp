<?php
$counter = 0;
$mygames = $this->Html->url(array("controller" => 'businesses', "action" => 'mygames'));
foreach ($gamedata as $game):
    $playcount = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
    $favcount = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
    $totalclone = empty($game['Gamestat']['totalclone']) ? 0 : $game['Gamestat']['totalclone'];
    if (Configure::read('Domain.type') == 'subdomain') {
        $playurl = $this->Html->url(array("controller" => 'play', "action" => h($game['Game']['seo_url'])));
    } else {
        $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
    }
    echo $div;
    ?>
    <div class="panel panel-default">
        <div class="imagehover">
            <?php if (isset($fix) && $controls == $user['User']['id'] && !isset($this->request->query['mode'])): ?>
                <div class="caption">
                    <p class="text-center">
                        <a href="<?php echo $mygames; ?>" class="label label-danger" data-placement="bottom" data-toggle="modal" title="Change This Game">Change</a>
                        <!--<a href="" class="label label-default" data-placement="bottom" data-toggle="tooltip" title="Play This Game">Play</a>-->
                    </p>
                </div>
            <?php endif; ?>
            <a href="<?php echo $playurl; ?>" class="panel-image">
                <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('class' => 'panel-image-preview', 'alt' => $game['Game']['name'], 'onerror' => 'imgError(this,"toorksize");')); ?>
            </a>
        </div>
        <div class="panel-footer text-center" style="padding:0px;">
            <a href="<?php echo $playurl; ?>" style="padding:0px;"><h5 class="darkblue" style='height:16px; overflow:hidden;'><?php echo $game['Game']['name']; ?></h5></a>
            <div class="row">
                <span class="game_box_left">
                    <div class= 'centerrate2'>
                        <div class="stars2"  data-toggle="tooltip" data-original-title="<?= $game['Game']['rate_count']; ?> Rates">
                            <div class="ratingbar2" style="width: <?php echo $game['Game']['starsize']; ?>%;"></div>
                            <div class="star2">
                                <div class="star2">
                                    <div class="star2">
                                        <div class="star2">
                                            <div class="star2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
                <span class="game_box_right">
                    <i data-toggle="tooltip" title="<?php echo $playcount; ?> Plays" class="fa fa-play green"></i>
                    <i data-toggle="tooltip" title="<?php echo $favcount; ?> Favorites" class="fa fa-heart red"></i>
                    <i data-toggle="tooltip" title="<?php echo $totalclone; ?> Clones" class="fa fa-plus-square darkblue"></i>
                </span>
            </div>
        </div>
    </div>
    </div>
    <?php
    $counter = $counter + 1;
    if (isset($limit) && $counter == $limit) {
        break;
    } else {
        continue;
    }
endforeach;
?>
<?php
if (isset($limit)):
    while ($counter < $limit):
        echo $div;
        ?>
        <div class="panel panel-default" style="background-color:silver;">
            <?php if ($controls !== $user['User']['id']) { ?>
                <div class="imagehover">
                    <div class="panel-image">
                        <img src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" class="panel-image-preview" alt="Metal Slug Brutal" onerror="imgError(this,&quot;toorksize&quot;);">
                    </div>
                </div>
                <div class="panel-footer text-center under-image">
                    <div class="row"></div>
                </div>
            <?php } else { ?>
                <div style="padding:20% 0% 21% 0%;" class="text-center">
                    <a href="<?php echo $mygames; ?>" class="btn btn-default btn-lg btn-danger"> <i class="fa fa-plus-square fa-2x"></i> </a>
                </div>
                <div class="panel-footer text-center" style="padding:0px;">
                    <a  href="<?php echo $mygames; ?>" style="padding:0px;"><h5 class="darkblue" >+Add Game</h5></a>
                    <div class="row"></div>
                </div>
            <?php } ?>
        </div>
        </div>
        <?php
        $counter++;
    endwhile;
endif;
?>