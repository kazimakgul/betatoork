<?php
$ads_management = $this->Html->url(array('controller' => 'businesses', 'action' => 'ads_management'));
$mygames = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
$explorechannels = $this->Html->url(array('controller' => 'businesses', 'action' => 'explorechannels'));
?>
<body id="users">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'none')); ?>
    <div id="content">
        <div class="menubar fixed">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                Clone FAQ
            </div>
            <div class="pull-right hidden-xs">
                <a href="<?php echo $mygames; ?>" class="btn btn-warning"><i class="fa fa-gamepad"></i> Game Management</a>
                <a href="<?php echo $ads_management; ?>" class="btn btn-danger"><i class="fa fa-bar-chart-o"></i> Ads Management</a>
                <a href="<?php echo $explorechannels; ?>" class="btn btn-info"><i class="ion-person-add"></i> Explore Channels</a>
            </div>
            <!--
            <div class="period-select hidden-xs">
                <form class="input-daterange ">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </span>
                        <input name="start" type="text" class="form-control datepicker" placeholder="02/27/2014" />
                    </div>

                    <p class="pull-left">to</p>

                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </span>
                        <input name="end" type="text" class="form-control datepicker" placeholder="02/27/2014" />
                    </div>
                </form> 
            </div>
            -->
        </div>
        <div class="content-wrapper">


<iframe id="forum_embed" src="https://groups.google.com/forum/embed/?place=forum/toorkfaq&amp;showsearch=true&amp;showpopout=false&amp;parenturl=http://toork.com/pages/faq" scrolling="no" frameborder="0" width="100%" height="1000"></iframe>


        </div>
    </div>
</div>
</body>