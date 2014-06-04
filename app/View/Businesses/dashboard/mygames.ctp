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
                <form class="search hidden-xs">
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
                        <a href="#">All Games (39)</a>
                        <a href="#" class="active">Published (32)</a>
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
                                    <li><a href="#">Name</a></li>
                                    <li><a href="#">Signed up</a></li>
                                    <li><a href="#">Last seen</a></li>
                                    <li><a href="#">Browser</a></li>
                                    <li><a href="#">Country</a></li>
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
                                <label><?= $this->Paginator->sort('name', 'Name') ?></label>
                            </div>
                            <div class="text-right col-sm-1 header hidden-xs">
                                <label><?= $this->Paginator->sort('channelclone', 'Clones') ?></label>
                            </div>
                            <div class="text-right col-sm-1 col-md-offset-1 header hidden-xs">
                                <label><?= $this->Paginator->sort('favcount', 'Favorites') ?></label>
                            </div>
                            <div class="text-right col-sm-1 col-md-offset-1 header hidden-xs">
                                <label><?= $this->Paginator->sort('playcount', 'Plays') ?></label>
                            </div>
                            <div class="text-right col-sm-1 col-md-offset-1 header hidden-xs">
                                <label><?= $this->Paginator->sort('potential', 'Rates') ?></label>
                            </div>
                        </div>
                        <?= $this->element('business/dashboard/list') ?>
                        <div class="text-center">
                            <?= $this->element('business/components/pagination') ?>
                        </div>
                    </div>
                </div>
                <div class="row users-grid">
                    <?= $this->element('business/dashboard/grid') ?>
                    <div class="pager-wrapper">
                        <div class="col-sm-12">
                            <ul class="pager">
                                <li><a href="#">Previous</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            // User list checkboxes
            var $allUsers = $(".select-users input:checkbox");
            var $checkboxes = $("[name='select-user']");
            $allUsers.change(function() {
                var checked = $allUsers.is(":checked");
                if (checked) {
                    $checkboxes.prop("checked", "checked");
                    toggleBulkActions(checked, $checkboxes.length);
                } else {
                    $checkboxes.prop("checked", "");
                    toggleBulkActions(checked, 0);
                }
            });
            $checkboxes.change(function() {
                var anyChecked = $(".user [name='select-user']:checked");
                toggleBulkActions(anyChecked.length, anyChecked.length);
            });
            function toggleBulkActions(shouldShow, checkedCount) {
                if (shouldShow) {
                    $(".users-list .header").hide();
                    $(".users-list .header.select-users").addClass("active").find(".total-checked").html("(" + checkedCount + " total games)");

                } else {
                    $(".users-list .header").show();
                    $(".users-list .header.select-users").removeClass("active");
                }
            }
            // Grid switcher
            $btns = $(".grid-view");
            $views = $(".users-view");
            $btns.click(function(e) {
                e.preventDefault();
                $btns.removeClass("active");
                $(this).addClass("active");

                $views.removeClass("active");

                $(".users-grid").hide();
                $(".users-list").hide();

                $($(this).data("grid")).show();
            });
        })
    </script>
</body>