<?php
$search_action = $this->Html->url(array("controller" => "businesses", "action" => "followers_search"));
$followers_url = $this->Html->url(array("controller" => "businesses", "action" => "followers"));
?>
<body id="users">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'followers', 'bar' => 'Follow')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="<?php echo $followers_url; ?>">
                    Followers
                </a>
            </div>
            <form class="search hidden-xs" action="<?php echo $search_action ?>">
                <i class="fa fa-search"></i>
                <input type="text" name="q" placeholder="Search channels, users..." />
                <input type="submit" />
            </form>
            <!--
            <a href="form.html" class="new-user btn btn-success pull-right">
                <span>Invite Friends</span>
            </a>
            -->
        </div>
        <div class="content-wrapper">
            <div class="row page-controls">
                <div class="col-md-12 filters">
                    <!--
                    <label>Filter Followers:</label>
                    <a href="#" class="active">All Followers (243)</a>
                    <a href="#">Verified (3)</a>
                    <a href="#">High Rated (8)</a>
                    <a href="#">Prospects</a>
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
                                    <?php echo $this->Paginator->sort('User.username', 'Name', array('direction' => 'asc')) ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('User.created', 'Created', array('direction' => 'desc')) ?>
                                </li>
                                <!--
                                <li>
                                    <a href="#">Followers</a>
                                </li>
                                <li>
                                    <a href="#">Following</a>
                                </li>
                                <li>
                                    <a href="#">Games</a>
                                </li>
                                -->
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
            foreach ($followers as $key => $value) {
                $followers[$key]['followstatus'] = $this->requestAction(array('controller' => 'subscriptions', 'action' => 'followstatus'), array($value['User']['id']));
            }
            echo $this->element('business/dashboard/followers/list', array('followers' => $followers));
            echo $this->element('business/dashboard/followers/grid', array('followers' => $followers));
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