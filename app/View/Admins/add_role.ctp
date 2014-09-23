<div id="content">
    <div class="menubar">
        <div class="sidebar-toggler visible-xs">
            <i class="ion-navicon"></i>
        </div>
        <div class="page-title">
            <a href="#" onclick="history.go(-1);
                    return false;">
                - Go back
            </a>
            <small class="hidden-xs">
                <strong>Add Role</strong>
            </small>
        </div>
    </div>
    <div class="content-wrapper">
        
        <?php echo $this->Form->create('Role');?>
            
            
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label">
                    Role Name
                </label>
                <div class="col-sm-10 col-md-8">
                    <input type="text" class="form-control" id="name" name="name" maxlength="45" value="" />
                </div>
            </div>
            
   
         
            <div class="form-group form-actions">
                <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
     
            <input class="form-submit btn btn-success" title="Click here to add the role" type="submit" value="Add Role" style="margin-top:15px;">
                    <!--<a data-toggle="modal" data-target="#confirm-modal" onclick="return false;" id="NewButton" class="btn btn-danger">Delete</a>-->
                </div>
            </div>
        <?php echo $this->Form->end(); ?>

    </div>
</div>
