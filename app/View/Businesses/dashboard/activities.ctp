<body id="latest-activity">
    <div id="wrapper">
        <?php echo $this->element('business/dashboard/sidebar', array('active' => 'activities')); ?>
        <div id="content">
            <div class="menubar">
                <div class="sidebar-toggler visible-xs">
                    <i class="ion-navicon"></i>
                </div>
                <div class="page-title">
                    Recent Activity Feed
                </div>
            </div>
            <div class="content-wrapper">
                <!-- Single button -->
                <div class="filter-user btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Filter by user <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Jessie</a></li>
                        <li><a href="#">Robb Stark</a></li>
                        <li><a href="#">Anna Sophia</a></li>
                    </ul>
                </div>
                <h3>
                    Today
                    <small>August 03, 2014</small>
                </h3>
                <?php echo $this->element('business/activity') ?>
                <div class="text-center">
                    <?php echo $this->element('business/components/pagination') ?>
                </div>
            </div>
        </div>
    </div>
</body>