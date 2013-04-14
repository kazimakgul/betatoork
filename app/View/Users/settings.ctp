<?php
$password=$this->Html->url(array("controller" => "users","action" =>"password2",$this->Session->read('Auth.User.id')));
$profilepublic=$this->Html->url(array("controller" => "games","action" =>"profile",$this->Session->read('Auth.User.id')));
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        <!-- content-header -->
                        <div class="content-header">

                            <h2><i class="icofont-cogs"></i> My Settings</h2>
                        </div><!-- /content-header -->
                        
                        <!-- content-body -->
                        <div class="content-body">

    <p class="alert-info alert">Add a good quality channel avatar and a channel banner to make your channel unique. Preview your <strong><a target="_blank" href="<?php echo $profilepublic;?>"><i class="elusive-user"></i> public channel</strong></a> </p>
<div class="span10 pull-right fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new thumbnail" style="width: 745px; height: 200px;">
    <img src="http://www.placehold.it/745x200/EFEFEF/AAAAAA&text=add a banner to your channel" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 745px; max-height: 200px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <span class="fileupload-new"><i class="elusive-edit"></i></span>
        <span class="fileupload-exists"><i class="elusive-edit"></i></span><input type="file" /></span>
    <a href="#" rel="tooltip" data-placement="bottom" data-original-title="Remove Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small fileupload-exists" data-dismiss="fileupload"><i class="elusive-trash"></i></a>
  </div>
</div>

<div class="fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new thumbnail" style="width: 90px; height: 120px;">
    <img src="http://www.placehold.it/90x120/EFEFEF/AAAAAA&text=avatar" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 90px; max-height: 120px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <span class="fileupload-new"><i class="elusive-edit"></i></span>
        <span class="fileupload-exists"><i class="elusive-edit"></i></span><input type="file" /></span>
    <a href="#" rel="tooltip" data-placement="bottom" data-original-title="Remove Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small fileupload-exists" data-dismiss="fileupload"><i class="elusive-trash"></i></a>
  </div>
</div>

<hr style="margin-top:70px;">

                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <ul class="nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#boxtabpill-1">Channel Details</a></li>
                                                <li><a data-toggle="tab" href="#boxtabpill-2">Social Connections</a></li>
                                                <li><a data-toggle="tab" href="#boxtabpill-3">Change Password</a></li>
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="boxtabpill-1">
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'form-validate','novalidate'=>'novalidate','class'=>'form-horizontal' ,'type' => 'file'));?>
                                                        <fieldset>
                                                            
                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Channel Name</label>
                                                                <div class="controls">
                                                                    <span class="add-on">toork.com/</span>
<?php echo $this->Form->input('username',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'grd-white','data-validate'=>'{required: true, messages:{required:"Please enter field required"}}','id'=>'required')); ?>

                                                                </div>
                                                            </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputEditorSimple">Channel Description</label>
                                                            <div class="controls">

<?php  echo $this->Form->input('description',array('label'=>false,'div'=>false,'maxlength'=>280,'required','placeholder' => 'Describe your channel please.    Ex: Play free online games at Socialesman! Were the best online games website. Find the best uptodate games in socialesman channel.','type' => 'textarea','class'=>'span8','rows'=>'6','id'=>'inputEditorSimple' )); ?>

                                                            </div>
                                                        </div>
                                                        
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputUpload">Channel Avatar</label>
                                                            <div class="controls">
<input placeholder="not yet" type="file" name="data[User][edit_picture]" accept="image/gif,image/jpg,image/png,image/jpeg" data-form="uniform" id="inputUpload" size="100">
                                                            </div> <p> * Picture size must be 90x120 pixel</p>
                                                        </div> 
                                     
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>

                                                </div>
                                                <div class="tab-pane fade" id="boxtabpill-2">
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'form-validate','novalidate'=>'novalidate','class'=>'form-horizontal' ,'type' => 'file'));?>
                                                        <fieldset>
                                                         
                                                                <div class="control-group">
                                                                    <label class="control-label" for="inputDisabled">Channel Name</label>
                                                                    <div class="controls">
<?php echo $this->Form->input('username',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'input-xlarge','id'=>'inputDisabled','readonly')); ?>
                                                                    </div>
                                                                </div>




                                                            <div class="control-group">
                                                                <label class="control-label" for="url">Website</label>
                                                                <div class="controls">
<?php echo $this->Form->input('website',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label" for="url">Facebook</label>
                                                                <div class="controls">
<?php echo $this->Form->input('fb_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://facebook.com/.+' ,'placeholder' => 'http://facebook.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div>
                                                            </div>



                                                            <div class="control-group">
                                                                <label class="control-label" for="url">Twitter</label>
                                                                <div class="controls">
<?php echo $this->Form->input('twitter_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://twitter.com/.+' ,'placeholder' => 'http://twitter.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div>
                                                            </div>


                                                            <div class="control-group">
                                                                <label class="control-label" for="url">Google+</label>
                                                                <div class="controls">
<?php echo $this->Form->input('gplus_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://plus.google.com/.+' ,'placeholder' => 'http://plus.google.com/117184471094869274585','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="boxtabpill-3">
<div class="well well-small">
    <div class="box-header corner-top">
                                            <div class="header-control">
                                            <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
                                            </div>
                                            
                                        </div>
  <h1>Change Your Password</h1>
  <p>Please make sure that it is not an easy to remember password. Try to use some numbers and special characters as well.</p>
  <p>
    <a href="<?php echo $password; ?>" class="btn btn-danger btn-large">
      <i class="elusive-lock"></i> Change Password
    </a>
  </p>
</div>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div>
                                    </div>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->