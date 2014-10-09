<?php
$search = $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search'));
if (isset($query)) {
    $filter = array(
        'all' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search')),
        'cname' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search', 'filter' => 'cname')) . '?q=' . $query,
        'verify' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search', 'filter' => 'verify')) . '?q=' . $query,
        'manager' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search', 'filter' => 'manager')) . '?q=' . $query,
        'active' => $this->Html->url(array('controller' => 'admins', 'action' => 'channels_search', 'filter' => 'active')) . '?q=' . $query,
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
        <?php echo $this->element('admin/header_buttons'); ?>
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
                                <li>
                                    <a href="#">
                                        Status
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Verify
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Priority
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Role
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Password
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Delete
                                    </a>
                                </li>
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
                            <?php echo $this->Paginator->sort('User.priority', 'Priority', array('direction' => 'desc')); ?>
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
                    <div class="col-sm-2 header hidden-xs">
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
                <?php
                foreach ($data as $value) {
                    //  id
                    $id = $value['User']['id'];
                    //  picture
                    if (is_null($value['User']['picture'])) {
                        $avatarImage = $this->requestAction(array('plugin'=>false,'controller' => 'users', 'action' => 'randomAvatar'));
                        $picture = $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $value['User']['username']));
                    } else {
                        $picture = $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $value['User']['username']));
                    }
                    //  name
                    $name = $value['User']['username'];
                    //  email
                    $email = $value['User']['email'];
                    //  domain
                    $domain = $value['Custom_domain']['domain'];
                    //  priority
                    $priority = $value['User']['priority'];
                    //  edit
                    $edit = $this->Html->url(array('controller' => 'admins', 'action' => 'channels_edit', $id));
                    //  delete
                    $delete = $this->Html->url(array('controller' => 'admins', 'action' => 'channels_delete', $id));
                    ?>
                    <div class="row user">
                        <div class="col-sm-1 avatar">
                            <input type="checkbox" name="select-user" />
                        </div>
                        <div class="col-sm-1">
                            <?php echo $id; ?>
                        </div>
                         <div class="col-sm-1">
                            <?php echo $priority; ?>
                        </div>
                        <div class="col-sm-1 avatar">
                            <a target="_blank" href='http://<?php echo $name; ?>.clone.gs'><?php echo $picture; ?></a>
                        </div>
                        <div class="col-sm-2">
                            <a target="_blank" href='http://<?php echo $name; ?>.clone.gs'><?php echo $name; ?></a>
                        </div>
                        <div class="col-sm-2">
                            <?php echo $email; ?>
                        </div>
                        <div class="col-sm-3">
                            <a target="_blank" href='http://<?php echo $domain; ?>'><?php echo $domain; ?></a>
                        </div>
                        <div class="col-sm-1 header">
                            <div class="dropdown pull-right">
                                <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                    Action
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="<?php echo $edit; ?>">Edit</a>
                                    </li>
                                    <li role="presentation">
                                        <a class="channels_delete" role="menuitem" data-toggle="modal" data-target="#confirm-modal" tabindex="-1" href="javascript: return false;" value="<?php echo $delete; ?>">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="text-center">
                    <?php echo $this->element('business/components/pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Channel Delete Confirm Begin -->
<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    Are you sure you want to delete this?
                </h4>
            </div>
            <div class="modal-body">
                Do you want to delete channel?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="channels_delete_confirm" class="btn btn-danger">Yes, delete it</button>
            </div>
        </div>
    </div>
</div> 
<!-- Channel Delete Confirm End -->