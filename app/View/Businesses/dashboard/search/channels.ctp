<?php
$search_action = $this->Html->url(array("controller" => "businesses", "action" => "explorechannels_search"));
$game_add = $this->Html->url(array("controller" => "businesses", "action" => "game_add"));
$exp_channel = $this->Html->url(array("controller" => "businesses", "action" => "explorechannels"));
$params = $this->Paginator->params();
$allgames = $params['count'];
?>
<body id="users">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'explorechannels', 'bar' => 'Follow')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="<?php echo $exp_channel; ?>">
                    Search
                </a>
            </div>
            <form class="search hidden-xs" action="<?php echo $search_action ?>">
                <i class="fa fa-search"></i>
                <input type="text" name="q" placeholder="Search channels, users..." />
                <input type="submit" />
            </form>
            <!--
            <a href="<?php echo $game_add; ?>" class="new-user btn btn-success pull-right">
                <span>Add Game</span>
            </a>
            -->
        </div>
        <div class="content-wrapper">
            <div class="row page-controls">
                <div class="col-md-12 filters">
                    <label>Filter Search:</label>
                    <a href="#" class="active">Games</a>
                    <a href="#">Channels</a>
                    <div class="show-options">
                        <div class="dropdown">
                            <a class="button" data-toggle="dropdown" href="#">
                                <span>
                                    Sort by
                                    <i class="fa fa-unsorted"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li><?php echo $this->Paginator->sort('User.username', 'Name', array('direction' => 'asc')) ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.channelclone', 'Clones', array('direction' => 'desc')) ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.favcount', 'Favorites', array('direction' => 'desc')) ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.playcount', 'Plays', array('direction' => 'desc')) ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.rate_count', 'Rates', array('direction' => 'desc')) ?></li>
                            </ul>
                        </div>
                        <a href="#" data-grid=".users-list" class="grid-view"><i class="fa fa-th-list"></i></a>
                        <a href="#" data-grid=".users-grid" class="grid-view active"><i class="fa fa-th"></i></a>
                    </div>
                </div>
            </div>
            <div class="row users-list">
                <div class="col-md-12">
                    <div class="row headers">
                        <div class="col-sm-3 header select-users">
                        </div>
                        <div class="col-sm-3 header hidden-xs">
                            <label><?php echo $this->Paginator->sort('User.username', 'Name', array('direction' => 'asc')) ?></label>
                        </div>
                        <div class="col-sm-1 col-sm-offset-1 header hidden-xs">
                            <label><a href="#">Followers</a></label>
                        </div>
                        <div class="col-sm-1 col-sm-offset-1 header hidden-xs">
                            <label><a href="#">Following</a></label>
                        </div>
                        <div class="col-sm-1 col-sm-offset-1 header hidden-xs">
                            <label class="text-right"><a href="#">Games</a></label>
                        </div>
                    </div>
                    <?php echo $this->element('business/dashboard/search/channels/list') ?>
                    <div class="text-center">
                        <?php echo $this->element('business/components/pagination') ?>
                    </div>
                </div>
            </div>
            <div class="row users-grid">
                <?php echo $this->element('business/dashboard/search/channels/grid') ?>
                <div class="text-center">
                    <?php echo $this->element('business/components/pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>