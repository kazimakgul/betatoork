<div class="row users-list">
    <div class="col-md-12">
        <div class="row headers">
            <div class="col-sm-2 header select-users">
                <input type="checkbox" />
                <div class="dropdown bulk-actions">
                    <a data-toggle="dropdown" href="#">
                        Bulk actions
                        <span class="total-checked"></span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="#">Add tags</a></li>
                        <li><a href="#">Delete users</a></li>
                        <li><a href="#">Edit customers</a></li>
                        <li><a href="#">Manage permissions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 header hidden-xs">
                <label><?php echo $this->Paginator->sort('Game.name', 'Name', array('direction' => 'asc')) ?></label>
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
                $id = $game['Game']['id'];
                $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
                $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
                $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
                $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
                if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                    $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
                } else {
                    $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
                }
                ?>
                <div class="row user">
                    <div class="col-sm-2 avatar">
                        <input type="checkbox" name="select-user" value="<?php echo $id; ?>" />
                        <a href="<?php echo $playurl ?>" target="_blank">
                            <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");')); ?>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?php echo $playurl ?>" class="name">
                            <?php echo $name ?>
                        </a>
                        <a class="name" href="<?php echo $game_edit_link . '/' . $id; ?>"><i class="fa fa-edit"></i></a>
                        <?php if ($game['Game']['priority'] > 0) { ?>
                            <a class='btn-link name featured_toggle' id='<?php echo $game['Game']['id']; ?>' style='margin-left:10px;color:#F7D358;'><i class="fa fa-star"  data-toggle="tooltip" data-original-title="Unset as Featured"></i></a>
                        <?php } else { ?>
                            <a class='btn-link name featured_toggle' id='<?php echo $game['Game']['id']; ?>' style='margin-left:10px;color:#E6E6E6;'><i class="fa fa-star" data-toggle="tooltip" data-original-title="Set as Featured"></i></a>
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