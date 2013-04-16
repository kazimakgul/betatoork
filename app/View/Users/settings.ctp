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

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab"><i class="elusive-user"></i> Profile</a></li>
      <li><a href="#profile" data-toggle="tab"><i class="elusive-thumbs-up color-blue"></i> Socials</a></li>
      <li><a href="#password" data-toggle="tab"><i class="elusive-lock color-red"></i> Password</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'tab','novalidate'=>'novalidate','class'=>'form-horizontal' ,'type' => 'file'));?>
<div class="raw-fluid">
<div class="span2 fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new img-polaroid" style="width: 90px; height: 120px;">
    <img src="http://www.placehold.it/90x120/EFEFEF/AAAAAA&text=avatar" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 90px; height: 120px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <span class="fileupload-new"><i class="elusive-edit"></i></span>
        <span class="fileupload-exists"><i class="elusive-edit"></i></span><input type="file" /></span>
    <a href="#" rel="tooltip" data-placement="bottom" data-original-title="Remove Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small fileupload-exists" data-dismiss="fileupload"><i class="elusive-trash"></i></a>
  </div>
</div>

<div class="span8 fileupload fileupload-new" data-provides="fileupload" style="margin:0px 0px 0px 0px;">
  <div class="fileupload-new img-polaroid" style="width: 745px; height: 200px;">
    <img src="http://www.placehold.it/745x200/EFEFEF/AAAAAA&text=add a banner to your channel" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 745px; height: 200px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <span class="fileupload-new"><i class="elusive-edit"></i></span>
        <span class="fileupload-exists"><i class="elusive-edit"></i></span><input type="file" /></span>
    <a href="#" rel="tooltip" data-placement="bottom" data-original-title="Remove Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small fileupload-exists" data-dismiss="fileupload"><i class="elusive-trash"></i></a>
  </div>
</div>
</div>

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
      <div class="tab-pane fade" id="profile">

    <p class="alert-success alert">The social connections you add will be shown at your public channel. It is just a simple link to your other social networks. If you are curious about how it is going to look like, just preview your current <strong><a target="_blank" href="<?php echo $profilepublic;?>"><i class="elusive-user"></i> public channel</strong></a> </p>

<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'tab2','novalidate'=>'novalidate','class'=>'form-horizontal' ,'type' => 'file'));?>
                                                        <fieldset>
                                                         
                                                
<?php echo $this->Form->input('username',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'input-xlarge','id'=>'inputDisabled','readonly','type'=>'hidden')); ?>
                                                            

                                                            <div class="well control-group">
                                                                <label class="control-label" for="url">Facebook</label>
                                                                <div class="controls">
<?php echo $this->Form->input('fb_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://facebook.com/.+' ,'placeholder' => 'http://facebook.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div><i class='elusive-facebook color-blue helper-font-32'></i> <p> Just add your Facebook page link if you have any. You will let your users reach your Facebook page using your toork channel.</p>
                                                            </div>


                                                            <div class="well control-group">
                                                                <label class="control-label" for="url">Twitter</label>
                                                                <div class="controls">
<?php echo $this->Form->input('twitter_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://twitter.com/.+' ,'placeholder' => 'http://twitter.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div> <i class='elusive-twitter color-blue helper-font-32'></i> <p> Just add your Twitter page link if you have any. You will let your users reach your Twitter page using your toork channel.</p>
                                                            </div>


                                                            <div class="well control-group">
                                                                <label class="control-label" for="url">Google+</label>
                                                                <div class="controls">
<?php echo $this->Form->input('gplus_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://plus.google.com/.+' ,'placeholder' => 'http://plus.google.com/117184471094869274585','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div> <i class='elusive-googleplus color-red helper-font-32'></i> <p>Just add your Google+ page link if you have any. You will let your users reach your Google+ page using your toork channel.</p>
                                                            </div>


                                                            <div class="well control-group">
                                                                <label class="control-label" for="url">Pinterest</label>
                                                                <div class="controls">
<?php echo $this->Form->input('website',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div><i class='elusive-pinterest color-red helper-font-32'></i> <p>Just add your Pinterest page or board link if you have any. You will let your users reach your Pinterest using your toork channel.</p>
                                                            </div>

                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
      </div>
      <div class="tab-pane fade" id="password">

<div >

  <h1>Change Your Password</h1>
  <p>Please make sure that it is not an easy to remember password. Try to use some numbers and special characters as well.</p>
  <p>
    <a href="<?php echo $password; ?>" class="btn btn-danger btn-large">
      <i class="elusive-lock"></i> Change Password
    </a>
  </p>
</div>


      </div>


  </div>
</div>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->