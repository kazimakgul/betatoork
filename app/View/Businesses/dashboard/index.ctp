<?php
$ads_management = $this->Html->url(array('controller' => 'businesses', 'action' => 'ads_management'));
$mygames = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
$explorechannels = $this->Html->url(array('controller' => 'businesses', 'action' => 'explorechannels'));
$search_action = $this->Html->url(array('controller' => 'businesses', 'action' => 'main_search', 'games'));
?>
<body id="dashboard">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'dashboard')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                <a href="javascript:;">Dashboard</a>
            </div>
            <form class="search hidden-xs" action="<?php echo $search_action; ?>">
                <i class="fa fa-search"></i>
                <input type="text" name="q" placeholder="Search..." />
                <input type="submit" />
            </form>
            <div class="pull-right hidden-xs" style="margin-top: -5px">
                <a data-toggle="tooltip" data-placement="bottom" data-original-title="Game Management" href="<?php echo $mygames; ?>" class="btn btn-warning"><i class="fa fa-gamepad"></i></a>
                <a data-toggle="tooltip" data-placement="bottom" data-original-title="Ads Management" href="<?php echo $ads_management; ?>" class="btn btn-info"><i class="fa fa-bar-chart-o"></i></a>
                <a data-toggle="tooltip" data-placement="bottom" data-original-title="Explore Channels" href="<?php echo $explorechannels; ?>" class="btn btn-danger"><i class="ion-person-add"></i></a>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="metrics clearfix">
                <div class="metric">
                    <span class="field">Channel Worth</span>
                    <span class="data"><i class="fa fa-usd"></i> <?php echo round(($stat['Userstat']['potential'] / 200),2); ?></span>
                </div>
                <div class="metric">
                    <span class="field">Total Followers</span>
                    <span class="data"><i class="ion-person-add"></i> <?php echo $stat['Userstat']['subscribeto']; ?></span>
                </div>
                <div class="metric">
                    <span class="field">Game Clones</span>
                    <span class="data"><i class="fa fa-plus-circle"></i> <?php echo $stat['Userstat']['uploadcount']; ?></span>
                </div>
                <div class="metric">
                    <span class="field">Game Plays</span>
                    <span class="data"><i class="fa fa-play"></i> <?php echo $stat['Userstat']['playcount']; ?></span>
                </div>
            </div>
            <div class="container-fluid">
                <hr class="">
                <div class="row">
                     <?php echo $this->element('business/dashboard/main') ?>
                         <div class="text-center">
					        <?php echo $this->element('business/components/pagination') ?>
					    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .page-title {
        position: relative !important;
        paddding: 0 30px;
        margin-top: -20px;
        line-height: 63px;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
    form.search {
        margin-left: 20px !important;
    }
    @media (max-width:780px) {
        .page-title {
            margin-left: -20px;
            border: none !important;
        }
    }
</style>
</body>