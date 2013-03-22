                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        <!-- content-header -->
                        <div class="content-header">

                            <h2><i class="icofont-cogs"></i>Password Settings</h2>
                        </div><!-- /content-header -->
                        
                        <!-- content-body -->
                        <div class="content-body">


                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <ul class="nav nav-pills">
                                                <!--tab action-->
                                                <li class="dropdown pull-right">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icofont-cogs"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#collapse" data-toggle="tab">@collapse</a></li>
                                                        <li><a href="#close" data-toggle="tab">@close</a></li>
                                                        <li><a href="#other" data-toggle="tab">@other action</a></li>
                                                    </ul>
                                                </li><!--/tab action-->
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#boxtabpill-1">Change Password</a></li>
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="boxtabpill-1">

<?php echo $this->Form->create('User', array('label'=>false ,'type' => 'file'));?>
                                                        <fieldset>
                                                            
                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Current Password</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="icofont-unlock"></i></span>
<?php echo $this->Form->input('old_password',array('label'=>false,'div'=>false ,'placeholder' => 'Write your current password','type'=>'password','class'=>'grd-white','required','id'=>'required')); ?>

                                                                </div>
                                                            </div>
                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">New Password</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="icofont-lock"></i></span>
<?php echo $this->Form->input('new_password',array('label'=>false,'div'=>false ,'type'=>'password','class'=>'grd-white','required pattern'=>'[^\f\n\r\t\v\u00A0\u2028\u2029]{6,20}','placeholder' => 'Must be at least 6 characters long','id'=>'required')); ?>

                                                                </div>
                                                            </div>
                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Confirm New Password</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="icofont-lock"></i></span>
<?php echo $this->Form->input('confirm_new_password',array('label'=>false,'div'=>false ,'type'=>'password','class'=>'grd-white','required pattern'=>'[^\f\n\r\t\v\u00A0\u2028\u2029]{6,20}','placeholder' => 'Must be same as above','id'=>'required')); ?>
                                                                </div>
                                                            </div>
  
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>

                                                </div>


                                            </div><!--/widgets-tab-body-->
                                        </div>
                                    </div>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->