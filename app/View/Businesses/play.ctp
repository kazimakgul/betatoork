<div class="container">
    <?php
    $homeBannerTop = $addata[0]['homeBannerTop'];
    $homeBannerMiddle = $addata[0]['homeBannerMiddle'];
    $homeBannerBottom = $addata[0]['homeBannerBottom'];
    $controls = NULL;
    if ($this->Session->read('Auth.User.id') == $user['User']['id']) {
        $controls = $user['User']['id'];
    }
    echo $this->element('business/ads', array('controls' => $controls, 'code' => $homeBannerTop, 'adtype' => 'homeBannerTop'));
    $game_id = $game['Game']['id'];
    $gamename = $game['Game']['name'];
    $description = $game['Game']['description'];
    $username = $game['User']['seo_username'];
    if ($username != NULL) {
        $profilepublic = $this->Html->url(array("controller" => h($username), "action" => ''));
    } else {
        $profilepublic = $this->Html->url(array("controller" => "businesses", "action" => "profile", $game['User']['id']));
    }
    if (Configure::read('Domain.type') == 'subdomain') {
        $next_game = $this->Html->url(array("controller" => 'play', "action" => h($next_game['Game']['seo_url'])));
    } else {
        $next_game = $this->Html->url(array('controller' => 'businesses', 'action' => 'play', h($next_game['Game']['id'])));
    }
    ?>
    <script>
        game_id = '<?= $game_id ?>';
        rateurl = '<?php echo $this->Html->url(array('controller' => 'rates', 'action' => 'add')); ?>';
    </script>
    <div class="col-sm-12">
        <div class="well well-sm">
            <h6 class="media-heading">
                <span class="btn-link btn label-important"><a href="#">#<?php echo $gamename; ?></a></span>: <?php echo $description; ?>
            </h6>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <!--Game Box begins-->
                        <?php echo $this->element('business/games/game-inc'); ?>
                        <!--Game Box ends-->
                        <div class="col-sm-12 col-md-12" style="margin-top: 15px">
                            <div class='pull-left'>	
                                <?php echo $this->element('business/buttons/clone'); ?>
                                <?php echo $this->element('business/buttons/favorite'); ?>
                            </div>
                            <div class='pull-center'>	
                                <?php echo $this->element('business/buttons/rate'); ?>
                            </div>
                            <div class='pull-right'>	
                                <?php echo $this->element('business/buttons/comment'); ?>		
                                <?php echo $this->element('business/buttons/share'); ?>
                            </div>
                            <!-- Next Button -->
                            <a href="<?php echo $next_game; ?>" type="button" class="close pull-right" style='padding: 6px 12px; margin-right: 50px' data-toggle="tooltip" data-original-title="Next"><li class="fa fa-fast-forward"></li></a>
                            <!-- Next Button End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('business/ads', array('controls' => $controls, 'code' => $homeBannerMiddle, 'adtype' => 'homeBannerMiddle')); ?>
        <!--/footer -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Recommended Games</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            $div = "<div class='col-xs-3' style='padding:5px;'>";
                            $limit = 4;
                            echo $this->element('business/games/box', array('div' => $div, 'limit' => $limit, 'gamedata' => $games));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->element('business/ads', array('controls' => $controls, 'code' => $homeBannerBottom, 'adtype' => 'homeBannerBottom')); ?>
        <!--/footer End--> 
        <?php echo $this->element('business/components/popup', array('user_id' => $user['User']['id'])); ?>
        <?php echo $this->element('business/clonebox'); ?>
    </div><!-- /.container -->

    <script>
        //=======Playcount==========
        setTimeout(function() {
            add_playcount(<?php echo $game['Game']['id']; ?>,<?php echo $game['Game']['user_id']; ?>);
        }, 10000);
    </script>