<?php
$index = $this->Html->url(array('controller' => 'businesses', 'action' => 'dashboard'));
$search_action = $this->Html->url(array("controller" => "businesses", "action" => "explorechannels_search"));
$game_add = $this->Html->url(array("controller" => "businesses", "action" => "game_add"));
$exp_channel = $this->Html->url(array("controller" => "businesses", "action" => "explorechannels"));
$params = $this->Paginator->params();
$allgames = $params['count'];
$search_action = $this->Html->url(array('controller' => 'businesses', 'action' => 'main_search', 'channels'));
?>
<body id="users">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'explorechannels', 'active' => 'dashboard')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="<?php echo $index; ?>">
                    ← Search
                </a>
            </div>
            <form class="search hidden-xs" action="<?php echo $search_action ?>" style="margin-left: 160px;">
                <i class="fa fa-search"></i>
                <input type="text" name="q" placeholder="Search channels, users..." value="<?php echo $query; ?>" />
                <input type="submit" />
            </form>
        </div>
        <div class="content-wrapper">
            <div class="row page-controls">
                <div class="col-md-12 filters">
                    <label>Filter Search:</label>
                    <?php
                    switch ($active_filter) {
                        case 'games':
                            ?>
                            <a href="javascript:;" class="active">Games</a>
                            <a href="<?php echo $this->Html->url(array('controller' => 'businesses', 'action' => 'main_search', 'channels')) . '?q=' . $query; ?>">Channels</a>
                            <?php
                            break;
                        case 'channels':
                            ?>
                            <a href="<?php echo $this->Html->url(array('controller' => 'businesses', 'action' => 'main_search', 'games')) . '?q=' . $query; ?>">Games</a>
                            <a href="javascript:;"  class="active">Channels</a>
                            <?php
                            break;
                    }
                    ?>
                    <div class="show-options">
                        <div class="dropdown">
                            <a class="button" data-toggle="dropdown" href="#">
                                <span>
                                    Sort by
                                    <i class="fa fa-unsorted"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <li><?php echo $this->Paginator->sort('User.username', 'Name', array('direction' => 'asc')); ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.channelclone', 'Clones', array('direction' => 'desc')); ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.favcount', 'Favorites', array('direction' => 'desc')); ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.playcount', 'Plays', array('direction' => 'desc')); ?></li>
                                <li><?php echo $this->Paginator->sort('Gamestat.rate_count', 'Rates', array('direction' => 'desc')); ?></li>
                            </ul>
                        </div>
                        <a href="#" data-grid=".users-list" class="grid-view"><i class="fa fa-th-list"></i></a>
                        <a href="#" data-grid=".users-grid" class="grid-view active"><i class="fa fa-th"></i></a>
                    </div>
                </div>
            </div>
            <?php
            if (!empty($result)) {
                echo
                $this->element('business/dashboard/search/channels/list') .
                $this->element('business/dashboard/search/channels/grid');
            } else {
                echo $this->element('business/dashboard/nullconditions', array('link' => 'explorechannels', 'text' => 'Explore Channels'));
            }
            ?>
        </div>
    </div>
</div>
</body>