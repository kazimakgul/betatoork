                 <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body">


                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <ul class="nav nav-pills">

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
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->