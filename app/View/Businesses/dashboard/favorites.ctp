<?php
$search_action = $this->Html->url(array("controller" => "businesses", "action" => "favorites_search"));
$game_add = $this->Html->url(array("controller" => "businesses", "action" => "game_add"));
$favorites = $this->Html->url(array("controller" => "businesses", "action" => "favorites"));
$params = $this->Paginator->params();
$allgames = $params['count'];
?>
<body id="users">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'favorites', 'bar' => 'Games')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="<?php echo $favorites; ?>">
                    Favorites
                </a>
            </div>
            <form class="search hidden-xs" action="<?php echo $search_action ?>">
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
                    <!--
                    <label>Filter Games:</label>
                    <a href="#" class="active">All Games (<?php echo $allgames ?>)</a>
                    <a href="#">Published (32)</a>
                    <a href="#">Suspended (6)</a>
                    <a href="#">Draft (1)</a>
                    -->
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
                                    <?php echo $this->Paginator->sort('Game.name', 'Name', array('direction' => 'asc')) ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('User.username', 'Owner', array('direction' => 'asc')) ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Favorite.channelclone', 'Clones', array('direction' => 'desc')) ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Favorite.favcount', 'Favorites', array('direction' => 'desc')) ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Favorite.playcount', 'Plays', array('direction' => 'desc')) ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Game.rate_count', 'Rates', array('direction' => 'desc')) ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Game.id', 'Date', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Game.id', 'Recommend', array('direction' => 'desc')); ?>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if ($view === 'list') {
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
            <?php echo $this->element('business/dashboard/favorites/list') ?>
            <?php echo $this->element('business/dashboard/favorites/grid') ?>
        </div>
        </div>
    </div>
</div>
<style>
    <?php
    if ($view === 'list') {
        echo '#users #content .content-wrapper .users-grid { display: none; }';
    } else {
        echo '#users #content .content-wrapper .users-list { display: none; }';
    }
    ?>
</style>
</body>