<?php
$password=$this->Html->url(array("controller" => "users","action" =>"password2",$this->Session->read('Auth.User.id')));
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
                                                <li class="active"><a data-toggle="tab" href="#boxtabpill-1">Channel Details</a></li>
                                                <li><a data-toggle="tab" href="#boxtabpill-2">Social Connections</a></li>
                                                <li><a data-toggle="tab" href="#boxtabpill-3">Change Password</a></li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#boxdropdownpill-1" data-toggle="tab">dropdown 1</a></li>
                                                        <li><a href="#boxdropdownpill-2" data-toggle="tab">dropdown 2</a></li>
                                                    </ul>
                                                </li><!--/tab menus-->
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
                                                <div class="tab-pane fade" id="boxdropdownpill-1">
                                                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                                </div>
                                                <div class="tab-pane fade" id="boxdropdownpill-2">
                                                    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div>
                                    </div>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->