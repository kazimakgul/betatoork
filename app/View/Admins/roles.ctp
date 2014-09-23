<?php
$add_role = $this->Html->url(array('controller' => 'admins', 'action' => 'add_role'));
?>
<div id="content">
    <div class="menubar fixed">
        <div class="sidebar-toggler visible-xs">
            <i class="ion-navicon"></i>
        </div>
        <div class="page-title">
            Roles
        </div>
        
        <?php echo $this->element('admin/header_buttons'); ?>
    </div>
    <div class="content-wrapper">
        
           <a href="<?php echo $add_role; ?>" class="new-user btn btn-success pull-right">
                <span>Add Role</span>
            </a>

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
                    
                    
                    <div class="col-sm-2 header hidden-xs">
                        <label>
                            <?php echo $this->Paginator->sort('User.username', 'Name', array('direction' => 'asc')); ?>
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
                    $id = $value['Role']['id'];
                    
                    //  name
                    $name = $value['Role']['name'];
                    
                    //  edit
                    $edit = $this->Html->url(array('controller' => 'admins', 'action' => 'role_edit', $id));
                    //  delete
                    $delete = $this->Html->url(array('controller' => 'admins', 'action' => 'role_delete', $id));
                    ?>
                    <div class="row user">
                        <div class="col-sm-1 avatar">
                            <input type="checkbox" name="select-user" />
                        </div>
                        <div class="col-sm-1">
                            <?php echo $id; ?>
                        </div>
                         
                        
                        <div class="col-sm-2">
                            <?php echo $name; ?>
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