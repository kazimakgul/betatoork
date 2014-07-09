<?php
switch ($activefilter) {
    case 0:
        $search_action = $this->Html->url(array("controller" => "businesses", "action" => "mygames_search"));
        break;
    case 1:
        $search_action = $this->Html->url(array("controller" => "businesses", "action" => "mygames_search", "filter" => "mobiles"));
        break;
}
$mygames = $this->Html->url(array("controller" => "businesses", "action" => "mygames"));
$game_add = $this->Html->url(array("controller" => "businesses", "action" => "game_add"));
$game_edit = $this->Html->url(array("controller" => "businesses", "action" => "game_edit"));
if (isset($query)) {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search')) . '?q=' . $query;
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search', 'filter' => 'mobiles')) . '?q=' . $query;
} else {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames', 'filter' => 'mobiles'));
}
?>
<body id="users">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'mygames', 'bar' => 'Games')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="<?php echo $mygames; ?>">
                    My Games
                </a>
            </div>
            <form class="search hidden-xs" action="<?php echo $search_action; ?>">
                <i class="fa fa-search"></i>
                <input type="text" name="q" placeholder="Search games..." />
                <input type="submit" />
            </form>
            <a href="<?php echo $game_add; ?>" class="new-user btn btn-success pull-right">
                <span>Add Game</span>
            </a>
        </div>
        <div class="content-wrapper">
            <div class="row page-controls">
                <div class="col-md-12 filters">
                    <label>Filter Games:</label>
                    <a href="<?php echo $all; ?>" <?php echo $activefilter === 0 ? 'class="active"' : ''; ?>>All Games</a>
                    <a href="<?php echo $mobile; ?>" <?php echo $activefilter === 1 ? 'class="active"' : ''; ?>>Mobile Games</a>
                    <span style='color: gray;font-weight: bold;'>
                        <i style='color:#F7D358;font-size: 20px;vertical-align: middle;' class="fa fa-star" data-toggle="tooltip" data-original-title="Set as Featured"></i>
                        Featured
                    </span>
                    <div class="show-options">
                        <div class="dropdown">
                            <a class="button" data-toggle="dropdown" href="#">
                                <span>
                                    Sort by
                                    <i class="fa fa-unsorted"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li><?php echo $this->Paginator->sort('Game.name', 'Name', array('direction' => 'asc')) ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.channelclone', 'Clones', array('direction' => 'desc')) ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.favcount', 'Favorites', array('direction' => 'desc')) ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.playcount', 'Plays', array('direction' => 'desc')) ?></li>
                                <li><?php echo $this->Paginator->sort('Game.rate_count', 'Rates', array('direction' => 'desc')) ?></li>
                            </ul>
                        </div>
                        <a href="#" data-grid=".users-list" class="grid-view active"><i class="fa fa-th-list"></i></a>
                        <a href="#" data-grid=".users-grid" class="grid-view"><i class="fa fa-th"></i></a>
                    </div>
                </div>
            </div>
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
                                    <li><a href="#" data-toggle="modal" data-target="#confirm-modal" >Delete game(s)</a></li>
                                    <li><a href="#">Edit game</a></li>
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
                    <?php echo $this->element('business/dashboard/mygames/list', array('game_edit_link' => $game_edit)) ?>
                    <div class="text-center">
                        <?php echo $this->element('business/components/pagination') ?>
                    </div>
                </div>
            </div>
            <div class="row users-grid">
                <?php echo $this->element('business/dashboard/mygames/grid') ?>
                <div class="text-center">
                    <?php echo $this->element('business/components/pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="attr" value="edit_game" />
<?php echo $this->element('business/dashboard/modals/confirm'); ?>
</body>