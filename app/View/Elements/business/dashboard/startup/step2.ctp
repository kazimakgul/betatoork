<div class="step">
    <div class="row">
        <div id="progressbar_clone" class="col-sm-12">
            <span>
                Start cloning minimum 5 games.
            </span>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($games as $game) {
            $name = $game['Game']['name'];
            $id = $game['Game']['id'];
            $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
            $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
            $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
            $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];

            if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
                $userlink = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain);
            } else {
                $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
                $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($game['User']['id'])));
            }
            ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="gamebox-<?php echo $id; ?>">
                <a onclick='get_new_game(<?php echo $id; ?>);' style="position:absolute; padding:5px; right:15px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Change Game"><i class="btn btn-xs btn-default fa fa-recycle"></i></a>
                <div class="panel panel-default">
                    <!--
                    <a href="#">
                        <div style="padding:80px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/games/168/toork_Kamikaze_Pigs_toorksize.png)" class="panel-heading">
                        </div>
                    </a>
                    -->
                    <a href="<?php echo $playurl ?>" target="_blank">
                        <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'box_img_resize', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");', 'width' => '720', 'height' => '110')); ?>
                    </a>
                    <div class="panel-body" style="padding-top:0px;">
                        <a href="<?php echo $playurl ?>">
                            <h4 class="text-center" style="height: 20px;overflow: hidden;">
                                <strong>
                                    <?php echo $name ?>
                                </strong>
                            </h4>
                        </a>
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
                                <i class="fa fa-play"> <?php echo $plays ?> Plays</i></div>
                        </small>
                        <!----=========================================---->
                        <!-- Clone Button -->
                        <div class="clone text-center">
                            <a id="clone-<?php echo $game['Game']['id']; ?>" onclick="chaingame4('<?php echo $name; ?>', user_auth,<?php echo $game['Game']['id']; ?>);" class="btn btn-success"><i class="fa fa-cog "></i> Clone</a>
                        </div>
                        <!-- Clone Button End -->
                    </div>
                    <!--
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
                    -->
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="form-group form-actions" style="float: left;width: 100%;">
        <a id="back" class="button" href="#" data-step="1" style="margin-top:35px;">
            <span><i class="fa fa-angle-double-left"></i> Back</span>
        </a>
        <button id="next" type="submit" class="button" data-step="3" style="margin-top:35px;">
            <span>Next Step <i class="fa fa-angle-double-right"></i></span>
        </button>
    </div>
</div>