<?php
$play = $this->Html->url(array("controller" => "mobiles", "action" => "play", 2));
foreach ($games as $game) {
    ?>
    <div class="col-sm-4">
        <div class="thumbnail">
            <!-- <img style="margin:0px; padding:0px;" data-src="holder.js/300x200" alt="300x200" src="http://www.edweek.org/media/2013/01/22/18games_birds600.jpg" style="width: 300px; height: 200px;"> -->
            <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $game['Game']['name'], 'onerror' => 'imgError(this,"toorksize");', 'width' => '100%')); ?>
            <div class="caption">
                <h3><?php echo $game['Game']['name']; ?></h3>
                <!--
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a href="<?php echo $play; ?>" class="btn btn-primary" role="button">Play</a> </p>
                -->
                <div class="row">
                    <span class="col-md-6" style='margin-left:10px;'>
                        <div class= 'centerrate2'>
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
                    </span>
                    <span class="col-md-5">
                        <i data-toggle="tooltip" title="<?php echo $game['Gamestat']['playcount']; ?> Plays" class="fa fa-play green"></i>
                        <i data-toggle="tooltip" title="<?php echo $game['Gamestat']['favcount']; ?> Favorites" class="fa fa-heart red"></i>
                        <i data-toggle="tooltip" title="<?php echo $game['Gamestat']['totalclone']; ?> Clones" class="fa fa-plus-square darkblue"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
<?php } ?>