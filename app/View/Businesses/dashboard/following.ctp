<body id="users">
    <div id="wrapper">
        <?php echo $this->element('business/dashboard/sidebar'); ?>
        <div id="content">
            <div class="menubar fixed">
                <div class="sidebar-toggler visible-xs">
                    <i class="ion-navicon"></i>
                </div>
                <div class="page-title">
                    Channels
                </div>
                <form class="search hidden-xs">
                    <i class="fa fa-search"></i>
                    <input type="text" name="q" placeholder="Search channels, users..." />
                    <input type="submit" />
                </form>
                <a href="form.html" class="new-user btn btn-success pull-right">
                    <span>Invite Friends</span>
                </a>
            </div>
            <div class="content-wrapper">
                <div class="row page-controls">
                    <div class="col-md-12 filters">
                        <label>Filter Followers:</label>
                        <a href="#" class="active">All Followers (243)</a>
                        <a href="#">Verified (3)</a>
                        <a href="#">High Rated (8)</a>
                        <a href="#">Prospects</a>
                        <div class="show-options">
                            <div class="dropdown">
                                <a class="button" data-toggle="dropdown" href="#">
                                    <span>
                                        Sort by
                                        <i class="fa fa-unsorted"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><a href="#">Name</a></li>
                                    <li><a href="#">Followers</a></li>
                                    <li><a href="#">Following</a></li>
                                    <li><a href="#">Games</a></li>
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
                            <div class="col-sm-3 header hidden-xs">
                                <label><a href="#">Name</a></label>
                            </div>
                            <div class="col-sm-3 header hidden-xs">
                                <label><a href="#">Followers</a></label>
                            </div>
                            <div class="col-sm-2 header hidden-xs">
                                <label><a href="#">Following</a></label>
                            </div>
                            <div class="col-sm-2 header hidden-xs">
                                <label class="text-right"><a href="#">Games</a></label>
                            </div>
                        </div>
                        <?= $this->element('business/dashboard/following/list') ?>
                        <div class="text-center">
                            <?= $this->element('business/components/pagination') ?>
                        </div>
                    </div>
                </div>
                <div class="row users-grid">
                    <?= $this->element('business/dashboard/following/grid') ?>
                    <div class="text-center">
                        <?= $this->element('business/components/pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>