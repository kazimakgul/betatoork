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


            <?php echo $this->element('business/dashboard/search_bar', array('title'=>'Search channels, users2...','url' => $search_action,'query'=>$query,'style'=>'margin-left: 160px;')); ?>


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


                        <?php if (!isset($query)) { ?>
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
            if (!empty($result)) {
                foreach ($result as $key => $value) {
                    $result[$key]['followstatus'] = $this->requestAction(array('controller' => 'subscriptions', 'action' => 'followstatus'), array($value['User']['id']));
                }
                echo $this->element('business/dashboard/search/channels/list', array('result' => $result));
                echo $this->element('business/dashboard/search/channels/grid', array('result' => $result));
            } else {
                echo $this->element('business/dashboard/nullconditions', array('link' => 'explorechannels', 'text' => 'Explore Channels'));
            }
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