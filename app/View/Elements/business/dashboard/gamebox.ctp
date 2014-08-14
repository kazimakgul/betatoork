<?php

/**
 * Elements
 * #gamebox-type, #degerler
 * #author @volkanceliloglu
 */
?>

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

            <?php
            if($gameboxtype == "clone" || $gameboxtype == "search")
            {
            ?>
            <!----=========================================---->
            <!-- Clone Button -->
            <div class="clone text-center">
                <?php echo $this->element('buttons/clone', array('clone' => $game['clonestatus'], 'id' => $game['Game']['id'], 'name' => $name)); ?>
            </div>
            <!-- Clone Button End -->
            <?php
            }elseif($gameboxtype == "favorite"){
            ?>
            <!-- Favorite Button -->
            <div class="favourite">
                <div class="widget-button">
                    <?php echo $this->element('buttons/favorite', array('favorite' => TRUE, 'id' => $game['Game']['id'], 'name' => $name)); ?>
                </div>
            </div>
            <!-- Favorite Button  End-->
            <?php
            }
            ?>
        </div>
        <div class="panel-footer">
            <?php
            if($gameboxtype == "clone" || $gameboxtype == "search")
            {
            ?>
            <div class="row">
                <div class="col-md-4" style="margin-right:-30px;">
                    <a href="<?php echo $userlink; ?>">
                        <?php echo $this->Upload->image($game, 'User.picture', array(), array('class' => 'img-responsive img-thumbnail img-circle circular2', 'onerror' => 'imgError(this,"avatar");'));  ?>
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
            <?php
            }elseif($gameboxtype == "favorite"){
            ?>
                <div class="row">
                    <div class="col-md-4" style="margin-right:-30px;">
                        <a href="<?php echo $userlink; ?>">
                            <?php echo $this->Upload->image($game['Game'], 'User.picture', array(), array('class' => 'img-responsive img-thumbnail img-circle circular2', 'onerror' => 'imgError(this,"avatar");')); //$this->Upload->image($user, 'User.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'img-responsive img-thumbnail img-circle', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");','width'=>'50','height'=>'50'));     ?>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <h5>
                            <?php if ($game['Game']['User']['verify'] == 1) { ?>
                                <span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span>
                            <?php } ?>
                            <a href="<?php echo $userlink; ?>"><strong> <?php echo $game['Game']['User']['username']; ?></strong></a>
                            <br>
                            <small>@ <?php echo $game['Game']['User']['seo_username']; ?></small>
                        </h5>
                    </div>
                </div>

            <?php
            }
            else{
            ?>
                        <span>
                            <?php if ($game['Game']['featured'] == 1) { ?>
                                <button type="button" class="btn btn-warning btn-sm featured_toggle" id='<?php echo $game['Game']['id']; ?>'><i class="fa fa-bullseye"></i> Unset Featured</button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-default btn-sm featured_toggle" id='<?php echo $game['Game']['id']; ?>'><i class="fa fa-bullseye"></i> Set Featured</button>
                            <?php } ?>
                            <a href="<?php echo $game_edit . '/' . $id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <a data-toggle="modal" data-target="#confirm-modal" onclick="game_id_create(<?php echo $id; ?>);" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
                        </span>
            <?php } ?>
        </div>
    </div>
</div>