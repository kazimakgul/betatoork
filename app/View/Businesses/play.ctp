<div class="container">
    <?php
    $controls = NULL;
    if ($this->Session->read('Auth.User.id') == $user['User']['id']) {
        $controls = $user['User']['id'];
    }
    echo $this->element('business/ad', array('controls' => $controls, 'user_id' => $user['User']['id'], 'location' => 4));
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
                        <div class="game_box_pre" style="display:none;">
                            <div id="dl"></div> <a class="label label-warning" style="cursor: pointer;" onclick="skip_ad();">× Skip</a>
                            <!--Game Box pre -> Ads begins-->
                            <?php echo $this->element('business/ad', array('controls' => $controls, 'user_id' => $user['User']['id'], 'location' => 6, 'pregame' => 1)); ?>
                            <!--Game Box pre -> Ads ends-->
                        </div>
                        <!--Game Box begins-->
                        <div class='game_box' style="background-color:black; margin:0 auto; text-align: center; font-family:Verdana, Geneva, sans-serif; color:#000; font-size:5px;">
                            <?php echo $this->element('business/games/game-inc'); ?>
                        </div>
                        <!--Game Box ends-->
                        <div class="col-sm-12 col-md-12" style="margin-top: 15px">
                            <div class='pull-left'>	
                                <div class="clone">
                                    <?php
                                    if (isset($ownclone[0]['cloneships']['id'])) {
                                        $clone_status = TRUE;
                                    } else {
                                        $clone_status = FALSE;
                                    }
                                    echo $this->element('buttons/clone', array('clone' => $clone_status, 'name' => $gamename, 'id' => $game_id));
                                    ?>
                                </div>
                                <div class="favourite">
                                    <?php
                                    if (isset($ownuser[0]['favorites']['id'])) {
                                        $favorite_status = TRUE;
                                    } else {
                                        $favorite_status = FALSE;
                                    }
                                    echo $this->element('buttons/favorite', array('favorite' => $favorite_status, 'name' => $gamename, 'id' => $game_id));
                                    ?>
                                </div>
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
        </div>
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
        <?php echo $this->element('business/ad', array('controls' => $controls, 'user_id' => $user['User']['id'], 'location' => 5)); ?>
        <!--/footer End--> 
        <?php echo $this->element('business/components/popup', array('user_id' => $user['User']['id'])); ?>
        <?php echo $this->element('business/clonebox'); ?>
    <script>
        //=======Playcount==========
        setTimeout(function() {
            add_playcount(<?php echo $game['Game']['id']; ?>,<?php echo $game['Game']['user_id']; ?>);
        }, 10000);
    </script>