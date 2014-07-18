<div class="row users-list">
    <div class="col-md-12">
        <div class="row headers">
            <div class="col-sm-3 col-md-offset-3 header hidden-xs">
                <label><?php echo $this->Paginator->sort('Game.name', 'Name', array('direction' => 'asc')) ?></label>
            </div>
            <div class="col-sm-2 header hidden-xs text-right">
                <label>Owner</label>
            </div>
            <div class="col-sm-1 header hidden-xs text-right">
                <label><?php echo $this->Paginator->sort('Gamestat.channelclone', 'Clones', array('direction' => 'desc')) ?></label>
            </div>
            <div class="col-sm-1 header hidden-xs text-right">
                <label><?php echo $this->Paginator->sort('Gamestat.favcount', 'Favorites', array('direction' => 'desc')) ?></label>
            </div>
            <div class="col-sm-1 header hidden-xs text-right">
                <label><?php echo $this->Paginator->sort('Gamestat.playcount', 'Plays', array('direction' => 'desc')) ?></label>
            </div>
            <div class="col-sm-1 header hidden-xs text-right">
                <label><?php echo $this->Paginator->sort('Game.rate_count', 'Rates', array('direction' => 'desc')) ?></label>
            </div>
        </div>
        <?php
        if (!empty($games)) {
            foreach ($games as $game) {
                $name = $game['Game']['name'];
                $owner = empty($game['User']['username']) ? FALSE : $game['User']['username'];
                $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
                $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
                $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
                $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
                $userurl = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($game['User']['id'])));
                if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                    $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
                } else {
                    $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
                }
                ?>
                <div class="row user">
                    <div class="col-sm-1 text-center followcolumn">
                        <!-- Favorite Button -->
                        <div class="favourite">
                            <div class="widget-button" data-toggle="tooltip" data-original-title="Unfavorite">
                                <!--
                                <button type="button"  id="fav-<?php echo $game['Game']['id']; ?>" class="btn btn-danger" id="fav_button" onclick="favorite('<?php echo $name; ?>', user_auth, <?php echo $game['Game']['id']; ?>);">
                                    <li class="fa fa-heart"></li>
                                    <span class="label label-info" id="fav_count"></span>
                                </button>
                                -->
                                <button type="button"  id="fav-<?php echo $game['Game']['id']; ?>" class="btn btn-danger" id="fav_button" onclick="favorite('<?php echo $name; ?>', user_auth, <?php echo $game['Game']['id']; ?>);">
                                    <li class="fa fa-heart"></li>
                                    <span class="label label-info" id="fav_count"></span>
                                </button>
                            </div>
                        </div>
                        <!-- Favorite Button  End-->
                    </div>
                    <div class="col-sm-2 text-center avatar">
                        <a href="<?php echo $playurl ?>" target="_blank">
                            <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?php echo $playurl ?>"  target="_blank" class="name">
                            <?php echo $name ?>
                        </a>
                    </div>
                    <div class="col-sm-2 text-right">
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
                    <div class="col-sm-1 text-right">
                        <div class="total-spent">
                            <?php echo $clones ?>
                        </div>
                    </div>
                    <div class="col-sm-1 text-right">
                        <div class="total-spent">
                            <?php echo $favorites ?>
                        </div>
                    </div>
                    <div class="col-sm-1 text-right">
                        <div class="total-spent">
                            <?php echo $plays ?>
                        </div>
                    </div>
                    <div class="col-sm-1 text-right">
                        <div class="total-spent">
                            <?php echo $rates ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo $this->element('business/dashboard/nullconditions', array('link' => 'exploregames', 'text' => 'Explore Games'));
        }
        ?>
        <div class="text-center">
            <?php echo $this->element('business/components/pagination') ?>
        </div>
    </div>
</div>