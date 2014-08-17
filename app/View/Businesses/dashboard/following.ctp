<?php
$search_action = $this->Html->url(array("controller" => "businesses", "action" => "following_search"));
$following = $this->Html->url(array("controller" => "businesses", "action" => "following"));
if (isset($this->request->params['named']['sort']) && isset($this->request->params['named']['direction'])) {
    $sort = $this->request->params['named']['sort'];
    $direction = $this->request->params['named']['direction'];
    if ($sort == 'User.username' && $direction == 'asc') {
        $name = 'A to Z';
    } else if ($sort == 'User.username' && $direction == 'desc') {
        $name = 'Z to A';
    } else if ($sort == 'Userstat.subscribeto' && $direction == 'desc') {
        $name = 'Most Followed';
    } else if ($sort == 'Userstat.subscribeto' && $direction == 'asc') {
        $name = 'Least Followed';
    } else if ($sort == 'Userstat.subscribe' && $direction == 'desc') {
        $name = 'Most Following';
    } else if ($sort == 'Userstat.subscribe' && $direction == 'asc') {
        $name = 'Least Following';
    } else if ($sort == 'Userstat.uploadcount' && $direction == 'desc') {
        $name = 'Most Added Game';
    } else if ($sort == 'Userstat.uploadcount' && $direction == 'asc') {
        $name = 'Least Added Game';
    }
}
?>
<body id="users">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'following', 'bar' => 'Follow')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="<?php echo $following; ?>">
                    Following
                </a>
            </div>


            <?php echo $this->element('business/dashboard/search_bar', array('title'=>'Search channels, users...','url' => $search_action)); ?>


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
                    <label>Filter Followings:</label>
                    <a href="#" class="active">All Followings (243)</a>
                    <a href="#">Verified (3)</a>
                    <a href="#">High Rated (8)</a>
                    <a href="#">Prospects</a>
                    -->
                    <div class="show-options">


                    <?php if (!isset($query)) { ?>
                           <!--Sorting Tags Start here-->
                            <?php if (isset($name)) { ?>
                                <span style="margin-top:-16px;text-transform: uppercase;font-family: Arial, sans-serif;cursor: pointer;font-size: 12px;margin-right:12px;background-color: #ffffff; color: #666; border: 1px solid #ccc;" class="btn btn-default">
                                    <a href="<?php echo $following; ?>" style="text-decoration: none !important;color: #666">
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
                                    <?php echo $this->Paginator->sort('User.username', 'Name', array('direction' => 'asc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Userstat.subscribeto', 'Followers', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Userstat.subscribe', 'Following', array('direction' => 'desc')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Paginator->sort('Userstat.uploadcount', 'Game Count', array('direction' => 'desc')); ?>
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
            <?php echo $this->element('business/dashboard/following/list') ?>
            <?php echo $this->element('business/dashboard/following/grid') ?>
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