<?php
$search_action = $this->Html->url(array("controller" => "businesses", "action" => "favorites_search"));
$game_add = $this->Html->url(array("controller" => "businesses", "action" => "game_add"));
$favorites = $this->Html->url(array("controller" => "businesses", "action" => "favorites"));
$params = $this->Paginator->params();
$allgames = $params['count'];


     //this provides titles for sorting
if(isset($this->request->params['named']['sort']) && isset($this->request->params['named']['direction']))
{
     $sort = $this->request->params['named']['sort'];
     $direction = $this->request->params['named']['direction'];
     if($sort=='Game.name' && $direction=='asc')
     {
           $name = 'A to Z'; 
     }else if($sort=='Game.name' && $direction=='desc')
     {
           $name = 'Z to A';
     }else if($sort=='Game.starsize' && $direction=='desc')
     {
           $name = 'Highest Rating';
     }else if($sort=='Game.starsize' && $direction=='asc')
     {
           $name = 'Least Rating';
     }else if($sort=='Gamestat.channelclone' && $direction=='desc')
     {
           $name = 'Most Cloned';
     }else if($sort=='Gamestat.channelclone' && $direction=='asc')
     {
           $name = 'Least Cloned';
     }else if($sort=='Gamestat.favcount' && $direction=='desc')
     {
           $name = 'Most Favorited';
     }else if($sort=='Gamestat.favcount' && $direction=='asc')
     {
           $name = 'Least Favorited';
     }else if($sort=='Gamestat.playcount' && $direction=='desc')
     {
           $name = 'Most Played';
     }else if($sort=='Gamestat.playcount' && $direction=='asc')
     {
           $name = 'Least Played';
     }
}
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


                         <!--Sorting Tags Start here-->
                          <?php if(isset($name)){ ?>
                          <span style="text-transform: uppercase;font-family: Arial, sans-serif;cursor: pointer;font-size: 12px;margin-right:12px;background-color: #ffffff; color: #666; border: 1px solid #ccc;" class="btn btn-default">
                             <a href="<?php echo $favorites; ?>" style="text-decoration: none !important;color: #666">
                            <?php echo $name; ?>
                            <span style="font-family: Arial, sans-serif;color: #000; font-size: 10px;font-weight: bold; margin-left: 5px;"><i class="fa fa-times"></i></span>
                            </a>
                          </span>
                          <?php } ?>
                          <!--Sorting Tags Ends here-->

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
            <?php echo $this->element('business/dashboard/favorites/list') ?>
            <?php echo $this->element('business/dashboard/favorites/grid') ?>
        </div>
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