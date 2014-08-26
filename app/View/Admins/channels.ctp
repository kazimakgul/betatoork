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
            <input type="text" name="q" placeholder="Search customers, clients..." />
            <input type="submit" />
        </form>
        <a href="form.html" class="new-user btn btn-success pull-right">
            <span>New Channel</span>
        </a>
    </div>
    <div class="content-wrapper">
        <div class="row page-controls">
            <div class="col-md-12 filters">
                <label>Filter Channels:</label>
                <a href="#" class="active">All</a>
                <a href="#">Cname</a>
                <a href="#">Verify</a>
                <a href="#">Manager</a>
                <a href="#">Active</a>
                <div class="show-options">
                    <div class="dropdown">
                        <a class="button" data-toggle="dropdown" href="#">
                            <span>
                                Sort by
                                <i class="fa fa-unsorted"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a href="#">Date</a></li>
                            <li><a href="#">Potential</a></li>
                            <li><a href="#">Last Login</a></li>
                            <li><a href="#">Priority</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row users-list">
            <div class="col-md-12">
                <div class="row headers">
                    <div class="col-sm-1 header select-users">
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
                    <div class="col-sm-1 header hidden-xs">
                        <label><a href="#">Id</a></label>
                    </div>
                    <div class="col-sm-1 header hidden-xs">
                        <label><a href="#">Picture</a></label>
                    </div>
                    <div class="col-sm-2 header hidden-xs">
                        <label><a href="#">Name</a></label>
                    </div>
                    <div class="col-sm-3 header hidden-xs">
                        <label><a href="#">Email</a></label>
                    </div>
                    <div class="col-sm-3 header hidden-xs">
                        <label><a href="#">Domain</a></label>
                    </div>
                    <div class="col-sm-1 header hidden-xs">
                        <label class="text-right"><a href="#">Action</a></label>
                    </div>
                </div>
                <?php foreach ($data as $value) { ?>
                    <div class="row user">
                        <div class="col-sm-1 avatar">
                            <input type="checkbox" name="select-user" />
                        </div>
                        <div class="col-sm-1">
                            <?php echo $value['User']['id']; ?>
                        </div>
                        <div class="col-sm-1 avatar">
                            <?php
                            if (is_null($value['User']['picture'])) {
                                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                                echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $value['User']['username']));
                            } else {
                                echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $value['User']['username']));
                            }
                            ?>
                        </div>
                        <div class="col-sm-2">
                            <?php echo $value['User']['username']; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo $value['User']['email']; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo $value['User']['website']; ?>
                        </div>
                        <div class="col-sm-1 header hidden-xs">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                    Action
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Edit</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="row pager-wrapper">
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