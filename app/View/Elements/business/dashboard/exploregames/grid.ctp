<div class="row users-grid">
    <?php
    if (!empty($games)) {
    foreach ($games as $game) {
        $name = $game['Game']['name'];
        $id = $game['Game']['id'];
        $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
        $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
        $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
        $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
        $clonestatus = $game['clonestatus'];
        if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
            $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
            $userlink = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain);
        } else {
            $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
            $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($game['User']['id'])));
        }
        ?>
<<<<<<< HEAD
        <?php echo $this->element('business/dashboard/gamebox',
            array(
                "gameboxtype" => "clone",
                "id"        =>$id,
                "playurl"   =>$playurl,
                "game"      =>$game,
                "name"      =>$name,
                "rates"     =>$rates,
                "clones"    =>$clones,
                "favorites" =>$favorites,
                "plays"     =>$plays,
                "userlink"  =>$userlink
            )) ?>
    <?php
    }
=======
        <div class="col-xs-12 col-sm-6 col-md-4" style="padding-bottom: 5px;" id="gamebox-<?php echo $id; ?>">
            <div class="panel panel-default">
                <a href="<?php echo $playurl ?>" target="_blank">
                    <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'box_img_resize', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");', 'width' => '720', 'height' => '110')); ?>
                </a>
                <div class="panel-body" style="padding-top:0px;">
                    <a href="<?php echo $playurl ?>"><h4 class="text-center" style="height: 20px;overflow: hidden;"><strong><?php echo $name ?></strong> </h4></a>
                    <small>
                        <div class="text-center" style="margin-bottom:7px; color:orange;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $rates; ?> Rates">
                            <?php
                            $star = round($game['Game']['starsize'] / 20);
                            for ($i = 1; $i <= $star; $i++) {
                                echo '<i class="fa fa-star fa-2x"></i>';
                            }
                            $freestar = 5 - $star;
                            if ($freestar > 0) {
                                for ($i = 1; $i <= $freestar; $i++) {
                                    echo '<i class="fa fa-star-o fa-2x"></i>';
                                }
                            }
                            ?>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-plus-square "> <?php echo $clones ?> Clones</i> | 
                            <i class="fa fa-heart"> <?php echo $favorites ?> Favorites</i> | 
                            <i class="fa fa-play"> <?php echo $plays ?> Plays</i>
                        </div>
                    </small>
                    <!----=========================================---->
                    <!-- Clone Button -->
                    <div class="clone text-center">
                        <?php echo $this->element('buttons/clone', array('clone' => $clonestatus, 'id' => $game['Game']['id'], 'name' => $name)); ?>
                    </div>
                    <!-- Clone Button End -->
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-4" style="margin-right:-30px;">
                            <a href="<?php echo $userlink; ?>">
                                <?php echo $this->Upload->image($game, 'User.picture', array(), array('class' => 'img-responsive img-thumbnail img-circle circular2', 'onerror' => 'imgError(this,"avatar");')); //$this->Upload->image($user, 'User.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'img-responsive img-thumbnail img-circle', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");','width'=>'50','height'=>'50'));  ?>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h5><?php if ($game['User']['verify'] == 1) { ?>
                                    <span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span>
                                <?php } ?>
                                <a href="<?php echo $userlink; ?>"><strong> <?php echo $game['User']['username']; ?></strong></a> 
                                <br> <small>@ <?php echo $game['User']['seo_username']; ?></small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
         }
      }else{
        echo $this->element('business/dashboard/nullconditions', array('link' => 'exploregames', 'text' => 'Explore Games'));
      }
>>>>>>> FETCH_HEAD
    ?>
    <div class="text-center">
        <?php echo $this->element('business/components/pagination') ?>
    </div>
</div>