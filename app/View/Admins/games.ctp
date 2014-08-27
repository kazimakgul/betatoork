<?php
$search = $this->Html->url(array('controller' => 'admins', 'action' => 'games_search'));
if (isset($query)) {
    $filter = array(
        'all' => $this->Html->url(array('controller' => 'admins', 'action' => 'games_search')),
        'clone' => $this->Html->url(array('controller' => 'admins', 'action' => 'games_search', 'filter' => 'clone')) . '?q=' . $query,
        'active' => $this->Html->url(array('controller' => 'admins', 'action' => 'games_search', 'filter' => 'active')) . '?q=' . $query,
        'fullscreen' => $this->Html->url(array('controller' => 'admins', 'action' => 'games_search', 'filter' => 'fullscreen')) . '?q=' . $query,
        'embed' => $this->Html->url(array('controller' => 'admins', 'action' => 'games_search', 'filter' => 'embed')) . '?q=' . $query,
        'install' => $this->Html->url(array('controller' => 'admins', 'action' => 'games_search', 'filter' => 'install')) . '?q=' . $query,
        'mobile' => $this->Html->url(array('controller' => 'admins', 'action' => 'games_search', 'filter' => 'mobile')) . '?q=' . $query,
    );
} else {
    $filter = array(
        'all' => $this->Html->url(array('controller' => 'admins', 'action' => 'games')),
        'clone' => $this->Html->url(array('controller' => 'admins', 'action' => 'games', 'filter' => 'clone')),
        'active' => $this->Html->url(array('controller' => 'admins', 'action' => 'games', 'filter' => 'active')),
        'fullscreen' => $this->Html->url(array('controller' => 'admins', 'action' => 'games', 'filter' => 'fullscreen')),
        'embed' => $this->Html->url(array('controller' => 'admins', 'action' => 'games', 'filter' => 'embed')),
        'install' => $this->Html->url(array('controller' => 'admins', 'action' => 'games', 'filter' => 'install')),
        'mobile' => $this->Html->url(array('controller' => 'admins', 'action' => 'games', 'filter' => 'mobile')),
    );
}
?>
<div id="content">
    <div class="menubar fixed">
        <div class="sidebar-toggler visible-xs">
            <i class="ion-navicon"></i>
        </div>
        <div class="page-title">
            Games
        </div>
        <form class="search hidden-xs" action="<?php echo $search; ?>">
            <i class="fa fa-search"></i>
            <?php if (isset($query)) { ?>
                <input type="text" name="q" placeholder="Search Games..." value="<?php echo $query; ?>" />
            <?php } else { ?>
                <input type="text" name="q" placeholder="Search Games..." />
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
                <label>Filter Games:</label>
                <a href="<?php echo $filter['all']; ?>" <?php echo $active_filter === 'all' ? 'class="active"' : ''; ?>>All</a>
                <a href="<?php echo $filter['clone']; ?>" <?php echo $active_filter === 'clone' ? 'class="active"' : ''; ?>>Clone</a>
                <a href="<?php echo $filter['active']; ?>" <?php echo $active_filter === 'active' ? 'class="active"' : ''; ?>>Active</a>
                <a href="<?php echo $filter['fullscreen']; ?>" <?php echo $active_filter === 'fullscreen' ? 'class="active"' : ''; ?>>Full Screen</a>
                <a href="<?php echo $filter['embed']; ?>" <?php echo $active_filter === 'embed' ? 'class="active"' : ''; ?>>Embed</a>
                <a href="<?php echo $filter['install']; ?>" <?php echo $active_filter === 'install' ? 'class="active"' : ''; ?>>Install</a>
                <a href="<?php echo $filter['mobile']; ?>" <?php echo $active_filter === 'mobile' ? 'class="active"' : ''; ?>>Mobile</a>
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
                                <?php echo $this->Paginator->sort('Game.created', 'Date', array('direction' => 'desc')); ?>
                            </li>
                            <li>
                                <?php echo $this->Paginator->sort('Gamestat.potential', 'Potential', array('direction' => 'desc')); ?>
                            </li>
                            <li>
                                <?php echo $this->Paginator->sort('Game.priority', 'Priority', array('direction' => 'desc')); ?>
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
                            <?php echo $this->Paginator->sort('Custom_domain.domain', 'Domain', array('direction' => 'asc')); ?>
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
                            <?php echo $value['Custom_domain']['domain']; ?>
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