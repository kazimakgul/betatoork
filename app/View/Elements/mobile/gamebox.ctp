<?php
$play = $this->Html->url(array("controller" => "mobiles", "action" => "play", 2));
if (empty($games)) {
    ?>
    <div class="notfound text-center">
        <?php echo 'Games Not Found'; ?>
    </div>
    <?php
} else {
    foreach ($games as $game) {
        if (Configure::read('Domain.type') == 'subdomain') {
            $playurl = $this->Html->url(array("controller" => 'play', "action" => h($game['Game']['seo_url'])));
        } else {
            $playurl = $this->Html->url(array("controller" => 'mobiles', "action" => 'play', h($game['Game']['id'])));
        }
        if (empty($game['Gamestat']['playcount'])) {
            $playcount = 0;
        } else {
            $playcount = $game['Gamestat']['playcount'];
        }
        ?>
        <div class="col-sm-4">
            <div class="thumbnail">
                <a href="<?php echo $playurl; ?>">
                    <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $game['Game']['name'], 'onerror' => 'imgError(this,"toorksize");', 'width' => '100%')); ?>
                </a>
                <div class="caption">
                    <h3><a href="<?php echo $playurl; ?>"><?php echo $game['Game']['name']; ?></a></h3>
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
                        <a href="<?php echo $playurl; ?>" class="btn btn-success"><i class="fa fa-play" title="" data-toggle="tooltip" data-original-title=" Plays"></i> <?php echo $playcount; ?> Plays</a>
                    </div>
                </div>
                <div class="darkloader"></div>
                <div class="loader text-center">
                    LOADING
                    <br>
                    <?php echo $this->Html->image('mobile/ajax-loader.gif'); ?>
                </div>
            </div>
        </div>
        <?php
    }
}
?>