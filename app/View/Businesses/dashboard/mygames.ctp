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
if (isset($query)) {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search')) . '?q=' . $query;
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search', 'filter' => 'mobiles')) . '?q=' . $query;
    $featured = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search', 'filter' => 'featured')) . '?q=' . $query;
    $draft = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames_search', 'filter' => 'draft')) . '?q=' . $query;
} else {
    $all = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
    $mobile = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames', 'filter' => 'mobiles'));
    $featured = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames', 'filter' => 'featured'));
    $draft = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames', 'filter' => 'draft'));
}
//this provides titles for sorting
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
    }
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
            <?php echo $this->element('business/dashboard/search_bar', array('title' => 'Search games...', 'url' => $search_action)); ?>
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
                    <a href="<?php echo $featured; ?>" <?php echo $activefilter === 2 ? 'class="active"' : ''; ?>>Featured</a>
                    <a href="<?php echo $draft; ?>" <?php echo $activefilter === 3 ? 'class="active"' : ''; ?>>Draft</a>
                    <div class="show-options">
                        <?php if (!isset($query)) { ?>
                            <!--Sorting Tags Start here-->
                            <?php if (isset($name)) { ?>
                                <span style="margin-top:-16px;text-transform: uppercase;font-family: Arial, sans-serif;cursor: pointer;font-size: 12px;margin-right:12px;background-color: #ffffff; color: #666; border: 1px solid #ccc;" class="btn btn-default">
                                    <a href="<?php echo $mygames; ?>" style="text-decoration: none !important;color: #666">
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
                                    <li><?php echo $this->Paginator->sort('Game.name', 'Name', array('direction' => 'asc')) ?></li>
                                    <li><?php echo $this->Paginator->sort('Gamestat.channelclone', 'Clones', array('direction' => 'desc')) ?></li>
                                    <li><?php echo $this->Paginator->sort('Gamestat.favcount', 'Favorites', array('direction' => 'desc')) ?></li>
                                    <li><?php echo $this->Paginator->sort('Gamestat.playcount', 'Plays', array('direction' => 'desc')) ?></li>
                                    <li><?php echo $this->Paginator->sort('Game.starsize', 'Rates', array('direction' => 'desc')) ?></li>
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
            <?php echo $this->element('business/dashboard/mygames/grid') ?>
            <?php echo $this->element('business/dashboard/mygames/list') ?>
        </div>
    </div>
</div>
<input type="hidden" id="attr" value="edit_game" />
<script>
    function game_id_create(id) {
        games_delete_id = id;
    }
</script>
<!-- Confirm Modal -->
<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="#" role="form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">
                        Are you sure you want to delete this?
                    </h4>
                </div>
                <div class="modal-body">
                    Do you want to delete your games? All your info will be erased.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a onclick="delete_game(user_auth, games_delete_id);" class="btn btn-danger">Yes, delete it</a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    #search #content #sidebar .menu {
        list-style-type: none;
        padding: 0;
        margin: 0; }
    @media (max-width: 767px) {
        #search #content #sidebar .menu {
            margin-top: 15px;
            padding-bottom: 10px; } }
    #search #content #sidebar .menu li a {
        display: block;
        padding: 13px 30px;
        font-size: 15px;
        color: #555;
        text-decoration: none;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s linear; }
    #search #content #sidebar .menu li a.active, #account #content #sidebar .menu li a:hover {
        color: #6787DA; }
    #search #content #sidebar .menu li a i {
        min-width: 30px; }
    #search #content #sidebar .menu li a i.ion-ios7-person-outline {
        font-size: 30px;
        position: relative;
        top: 4px; }
    #search #content #sidebar .menu li a i.ion-ios7-email-outline {
        font-size: 24px;
        position: relative;
        top: 4px; }
    #search #content #sidebar .menu li a i.ion-ios7-help-outline {
        font-size: 24px;
        position: relative;
        top: 4px; }
    #search #content #sidebar .menu li a i.ion-card {
        font-size: 21px;
        position: relative;
        top: 3px; }

    #search #content #sidebar {
        left: 0;
        top: 0;
        bottom: 0;
        position: absolute;
        width: 100%;
        background: #fcfcfc;
        border-right: 1px solid #E8ECF1;
    }
    <?php
    if (isset($view) && $view === 'list') {
        echo '#users #content .content-wrapper .users-grid { display: none; }';
    } else {
        echo '#users #content .content-wrapper .users-list { display: none; }';
    }
    ?>
</style>
</body>
