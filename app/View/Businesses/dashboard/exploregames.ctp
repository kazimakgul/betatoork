<?php
switch ($activefilter) {
    case 0:
        $search_action = $this->Html->url(array("controller" => "businesses", "action" => "exploregames_search"));
        break;
    case 1:
        $search_action = $this->Html->url(array("controller" => "businesses", "action" => "exploregames_search", "filter" => "mobiles"));
        break;
    case 3:
        $search_action = $this->Html->url(array("controller" => "businesses", "action" => "exploregames_search", "filter" => "fullscreen"));
        break;
    case 4:
        $search_action = $this->Html->url(array("controller" => "businesses", "action" => "exploregames_search", "filter" => "embed"));
        break;
    default:
        $search_action = $this->Html->url(array("controller" => "businesses", "action" => "exploregames_search"));
}
$game_add = $this->Html->url(array("controller" => "businesses", "action" => "game_add"));
$explore = $this->Html->url(array("controller" => "businesses", "action" => "exploregames"));
if (isset($query)) {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames_search')) . '?q=' . $query;
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames_search', 'filter' => 'mobiles')) . '?q=' . $query;
    $fullscreen = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames_search', 'filter' => 'fullscreen')) . '?q=' . $query;
    $embed = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames_search', 'filter' => 'embed')) . '?q=' . $query;
} else {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames'));
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames', 'filter' => 'mobiles'));
    $fullscreen = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames', 'filter' => 'fullscreen'));
    $embed = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames', 'filter' => 'embed'));
}
?>
<body id="users">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'exploregames', 'bar' => 'Games')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="<?php echo $explore; ?>">
                    Explore Games
                </a>
            </div>
            <form class="search hidden-xs" action="<?php echo $search_action; ?>" style="margin-left: 200px">
                <i class="fa fa-search"></i>
                <input type="text" name="q" placeholder="Search games..." value="<?php if (isset($query)) { echo $query;}?>" />
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
                    <a href="<?php echo $fullscreen; ?>" <?php echo $activefilter === 2 ? 'class="active"' : ''; ?>>Fullscreen Games</a>
                    <a href="<?php echo $embed; ?>" <?php echo $activefilter === 3 ? 'class="active"' : ''; ?>>Embed Games</a>
                    <div class="show-options">
                        <div class="dropdown">
                            <a class="button" data-toggle="dropdown" href="#">
                                <span>
                                    Sort by
                                    <i class="fa fa-unsorted"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li>
                                    <?php echo $this->Paginator->sort('Game.name', 'Name', array('direction' => 'asc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Gamestat.channelclone', 'Clones', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Gamestat.favcount', 'Favorites', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Gamestat.playcount', 'Plays', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Game.rate_count', 'Rates', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Game.id', 'New Games', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Gamestat.potential', 'Recommended', array('direction' => 'desc')); ?>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if (isset($view) && $view === 'list') {
                            ?>
                            <a href="#" data-grid=".users-list" class="grid-view active"><i class="fa fa-th-list"></i></a>
                            <a href="#" data-grid=".users-grid" class="grid-view"><i class="fa fa-th"></i></a>
                            <?php
                        } else {
                            ?>
                            <a href="#" data-grid=".users-list" class="grid-view"><i class="fa fa-th-list"></i></a>
                            <a href="#" data-grid=".users-grid" class="grid-view active"><i class="fa fa-th"></i></a>
                                <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
            <?php
            foreach ($games as $key => $value) {
                $games[$key]['clonestatus'] = $this->requestAction(array('controller' => 'games', 'action' => 'checkClone'), array($value['User']['id'], $value['Game']['id']));
            }
            echo $this->element('business/dashboard/exploregames/list', array('games' => $games));
            echo $this->element('business/dashboard/exploregames/grid', array('games' => $games));
            ?>
        </div>
    </div>
</div>
<style>
<?php
if (isset($view) && $view === 'list') {
    echo '#users #content .content-wrapper .users-grid { display: none; }';
} else {
    echo '#users #content .content-wrapper .users-list { display: none; }';
}
?>
</style>
</body>