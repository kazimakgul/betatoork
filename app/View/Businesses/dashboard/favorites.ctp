<?php
$search_action = $this->Html->url(array("controller" => "businesses", "action" => "favorites_search"));
$params = $this->Paginator->params();
$allgames = $params['count'];
?>
<body id="users">
    <div id="wrapper">
        <?php echo $this->element('business/dashboard/sidebar'); ?>
        <div id="content">
            <div class="menubar fixed">
                <div class="sidebar-toggler visible-xs">
                    <i class="ion-navicon"></i>
                </div>
                <div class="page-title">
                    Games
                </div>
                <form class="search hidden-xs" action="<?= $search_action ?>">
                    <i class="fa fa-search"></i>
                    <input type="text" name="q" placeholder="Search games..." />
                    <input type="submit" />
                </form>
                <a href="form.html" class="new-user btn btn-success pull-right">
                    <span>Add Game</span>
                </a>
            </div>
            <div class="content-wrapper">
                <div class="row page-controls">
                    <div class="col-md-12 filters">
                        <label>Filter Games:</label>
                        <a href="#" class="active">All Games (<?= $allgames ?>)</a>
                        <a href="#">Published (32)</a>
                        <a href="#">Suspended (6)</a>
                        <a href="#">Draft (1)</a>
                        <div class="show-options">
                            <div class="dropdown">
                                <a class="button" data-toggle="dropdown" href="#">
                                    <span>
                                        Sort by
                                        <i class="fa fa-unsorted"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><?= $this->Paginator->sort('name', 'Name') ?></li>
                                    <li><?= $this->Paginator->sort('channelclone', 'Clones', array('direction' => 'desc')) ?></li>
                                    <li><?= $this->Paginator->sort('favcount', 'Favorites', array('direction' => 'desc')) ?></li>
                                    <li><?= $this->Paginator->sort('playcount', 'Plays', array('direction' => 'desc')) ?></li>
                                    <li><?= $this->Paginator->sort('rate_count', 'Rates', array('direction' => 'desc')) ?></li>
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
                                        <li><a href="#">Add tags</a></li>
                                        <li><a href="#">Delete users</a></li>
                                        <li><a href="#">Edit customers</a></li>
                                        <li><a href="#">Manage permissions</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 header hidden-xs">
                                <label><?= $this->Paginator->sort('name', 'Name') ?></label>
                            </div>
                            <div class="text-right col-sm-2 header hidden-xs">
                                <label>Owner</label>
                            </div>
                            <div class="text-right col-sm-1 header hidden-xs">
                                <label><?= $this->Paginator->sort('channelclone', 'Clones', array('direction' => 'desc')) ?></label>
                            </div>
                            <div class="text-right col-sm-1 header hidden-xs">
                                <label><?= $this->Paginator->sort('favcount', 'Favorites', array('direction' => 'desc')) ?></label>
                            </div>
                            <div class="text-right col-sm-1 header hidden-xs">
                                <label><?= $this->Paginator->sort('playcount', 'Plays', array('direction' => 'desc')) ?></label>
                            </div>
                            <div class="text-right col-sm-1 header hidden-xs">
                                <label><?= $this->Paginator->sort('rate_count', 'Rates', array('direction' => 'desc')) ?></label>
                            </div>
                        </div>
                        <?= $this->element('business/dashboard/favorites/list') ?>
                        <div class="text-center">
                            <?= $this->element('business/components/pagination') ?>
                        </div>
                    </div>
                </div>
                <div class="row users-grid">
                    <?= $this->element('business/dashboard/favorites/grid') ?>
                    <div class="text-center">
                        <?= $this->element('business/components/pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>