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
if (isset($this->request->params['named']['sort']) && isset($this->request->params['named']['direction'])) {
    $sort = $this->request->params['named']['sort'];
    $direction = $this->request->params['named']['direction'];
    if ($sort == 'Game.name' && $direction == 'asc') {
        $name = 'A to Z';
    } else if ($sort == 'Game.name' && $direction == 'desc') {
        $name = 'Z to A';
    } else if ($sort == 'Game.starsize' && $direction == 'desc') {
        $name = 'Highest Rating';
    } else if ($sort == 'Game.starsize' && $direction == 'asc') {
        $name = 'Least Rating';
    } else if ($sort == 'Gamestat.channelclone' && $direction == 'desc') {
        $name = 'Most Cloned';
    } else if ($sort == 'Gamestat.channelclone' && $direction == 'asc') {
        $name = 'Least Cloned';
    } else if ($sort == 'Gamestat.favcount' && $direction == 'desc') {
        $name = 'Most Favorited';
    } else if ($sort == 'Gamestat.favcount' && $direction == 'asc') {
        $name = 'Least Favorited';
    } else if ($sort == 'Gamestat.playcount' && $direction == 'desc') {
        $name = 'Most Played';
    } else if ($sort == 'Gamestat.playcount' && $direction == 'asc') {
        $name = 'Least Played';
    } else if ($sort == 'Game.id' && $direction == 'desc') {
        $name = 'Newest';
    } else if ($sort == 'Game.id' && $direction == 'asc') {
        $name = 'Oldest';
    } else if ($sort == 'Gamestat.potential' && $direction == 'desc') {
        $name = 'Recommend';
    } else if ($sort == 'Gamestat.potential' && $direction == 'asc') {
        $name = 'Low Score';
    }
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
                <input type="text" name="q" placeholder="Search games..." value="<?php
                if (isset($query)) {
                    echo $query;
                }
                ?>" />
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
                    <a href="<?php echo $all; ?>" <?php echo $activefilter === 0 ? 'class="active"' : ''; ?>>All</a>
                    <a href="<?php echo $mobile; ?>" <?php echo $activefilter === 1 ? 'class="active"' : ''; ?>>Mobile</a>
                    <a href="<?php echo $fullscreen; ?>" <?php echo $activefilter === 2 ? 'class="active"' : ''; ?>>Fullscreen</a>
                    <a href="<?php echo $embed; ?>" <?php echo $activefilter === 3 ? 'class="active"' : ''; ?>>Embed</a>
                    <div class="show-options">


                    <?php if (!isset($query)) { ?>
                            <!--Sorting Tags Start here-->
                            <?php if (isset($name)) { ?>
                            <span style="margin-top:-16px;text-transform: uppercase;font-family: Arial, sans-serif;cursor: pointer;font-size: 12px;margin-right:12px;background-color: #ffffff; color: #666; border: 1px solid #ccc;" class="btn btn-default">
                                <a href="<?php echo $explore; ?>" style="text-decoration: none !important;color: #666">
                                        <?php echo $name; ?>
                                    <span style="font-family: Arial, sans-serif;color: #000; font-size: 10px;font-weight: bold; margin-left: 5px;"><i class="fa fa-times"></i></span>
                                </a>
                            </span>
                            <?php } ?>
                            <!--Sorting Tags Ends here-->
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
                                    <?php echo $this->Paginator->sort('Game.starsize', 'Rates', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Game.id', 'Newest', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Gamestat.potential', 'Recommend', array('direction' => 'desc')); ?>
                                </li>
                            </ul>
                        </div>
                        <?php } ?>



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
                $games[$key]['clonestatus'] = $this->requestAction(array('controller' => 'games', 'action' => 'checkClone'), array($userid, $value['Game']['id']));
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