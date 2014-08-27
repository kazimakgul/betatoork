<?php
$search = $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search'));
if (isset($query)) {
    $filter = array(
        'all' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search')),
        'cname' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search', 'filter' => 'cname')),
        'verify' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search', 'filter' => 'verify')),
        'manager' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search', 'filter' => 'manager')),
        'active' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search', 'filter' => 'active')),
    );
} else {
    $filter = array(
        'all' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels')),
        'cname' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels', 'filter' => 'cname')),
        'verify' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels', 'filter' => 'verify')),
        'manager' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels', 'filter' => 'manager')),
        'active' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels', 'filter' => 'active')),
    );
}
?>
<div id="content">
    <div class="menubar fixed">
        <div class="sidebar-toggler visible-xs">
            <i class="ion-navicon"></i>
        </div>
        <div class="page-title">
            Channels
        </div>
        <form class="search hidden-xs" action="<?php echo $search; ?>">
            <i class="fa fa-search"></i>
            <?php if (isset($query)) { ?>
                <input type="text" name="q" placeholder="Search Channels..." value="<?php echo $query; ?>" />
            <?php } else { ?>
                <input type="text" name="q" placeholder="Search Channels..." />
            <?php } ?>
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
                <a href="<?php echo $filter['all']; ?>" <?php echo $active_filter === 'all' ? 'class="active"' : ''; ?>>All</a>
                <a href="<?php echo $filter['cname']; ?>" <?php echo $active_filter === 'cname' ? 'class="active"' : ''; ?>>Cname</a>
                <a href="<?php echo $filter['verify']; ?>" <?php echo $active_filter === 'verify' ? 'class="active"' : ''; ?>>Verify</a>
                <a href="<?php echo $filter['manager']; ?>" <?php echo $active_filter === 'manager' ? 'class="active"' : ''; ?>>Manager</a>
                <a href="<?php echo $filter['active']; ?>" <?php echo $active_filter === 'active' ? 'class="active"' : ''; ?>>Active</a>
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
                                <?php echo $this->Paginator->sort('User.created', 'Date', array('direction' => 'desc')); ?>
                            </li>
                            <li>
                                <?php echo $this->Paginator->sort('Userstat.potential', 'Potential', array('direction' => 'desc')); ?>
                            </li>
                            <li>
                                <?php echo $this->Paginator->sort('User.last_login', 'Last Login', array('direction' => 'desc')); ?>
                            </li>
                            <li>
                                <?php echo $this->Paginator->sort('User.priority', 'Priority', array('direction' => 'desc')); ?>
                            </li>
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
                        <label>
                            <?php echo $this->Paginator->sort('User.id', 'Id', array('direction' => 'asc')); ?>
                        </label>
                    </div>
                    <div class="col-sm-1 header hidden-xs">
                        <label>
                            <a href="#">Picture</a>
                        </label>
                    </div>
                    <div class="col-sm-2 header hidden-xs">
                        <label>
                            <?php echo $this->Paginator->sort('User.username', 'Name', array('direction' => 'asc')); ?>
                        </label>
                    </div>
                    <div class="col-sm-3 header hidden-xs">
                        <label>
                            <?php echo $this->Paginator->sort('User.email', 'Email', array('direction' => 'asc')); ?>
                        </label>
                    </div>
                    <div class="col-sm-3 header hidden-xs">
                        <label>
                            <?php echo $this->Paginator->sort('User.website', 'Domain', array('direction' => 'asc')); ?>
                        </label>
                    </div>
                    <div class="col-sm-1 header hidden-xs">
                        <label class="text-right">
                            <a href="#">Action</a>
                        </label>
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
                <div class="text-center">
                    <?php echo $this->element('business/components/pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>