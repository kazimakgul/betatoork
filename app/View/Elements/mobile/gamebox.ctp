<?php
$play = $this->Html->url(array("controller" => "mobiles", "action" => "play", 2));
foreach ($games as $game) {
    $playurl = $this->Html->url(array("controller" => 'mobiles', "action" => 'play', h($game['Game']['id'])));
    if (empty($game['Gamestat']['playcount'])) {
        $playcount = 0;
    } else {
        $playcount = $game['Gamestat']['playcount'];
    }
    if (empty($game['Gamestat']['channelclone'])) {
        $totalclone = 0;
    } else {
        $totalclone = $game['Gamestat']['channelclone'];
    }
    ?>
    <div class="col-sm-4">
        <div class="thumbnail">
            <!-- <img style="margin:0px; padding:0px;" data-src="holder.js/300x200" alt="300x200" src="http://www.edweek.org/media/2013/01/22/18games_birds600.jpg" style="width: 300px; height: 200px;"> -->
            <a href="<?= $playurl ?>"><?= $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $game['Game']['name'], 'onerror' => 'imgError(this,"toorksize");', 'width' => '100%')); ?></a>
            <div class="caption">
                <h3><a href="<?= $playurl ?>"><?php echo $game['Game']['name']; ?></a></h3>
                <div class="row text-center yildiz">
                    <div class="stars2"  data-toggle="tooltip" data-original-title="<?= $game['Game']['rate_count']; ?> Rates">
                        <div class="ratingbar2" style="width: <?php echo $game['Game']['starsize']; ?>%;"></div>
                        <div class="star2">
                            <div class="star2">
                                <div class="star2">
                                    <div class="star2">
                                        <div class="star2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="btn-group btn-group-justified bt_grp_pad">
                        <div class="btn-group">
                            <label type="button" class="btn btn-success">
                                <i class="fa fa-play" title="" data-toggle="tooltip" data-original-title=" Plays"></i>
                                <?php echo $playcount; ?> Plays
                            </label>
                        </div>
                        <div class="btn-group">
                            <label type="button" class="btn btn-info">
                                <i class="fa fa-plus-square" title="" data-toggle="tooltip" data-original-title=" Clones"></i>
                                <?php echo $totalclone; ?> Clones
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>