<?php
$mygames=$this->Html->url(array("controller" => "games","action" =>"mygames"));
$profilepublic=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>''));
?>

                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
    <?php if($isActive==0){ ?>
    <div class="alert alert-error span12">
                                    <div class="box-header corner-top">
                                            <div class="header-control">
                                            <button data-box="close" data-hide="fadeOut" class="close">×</button>
                                            </div>
                                            
                                    </div>
        <p> <i class="elusive-mail-alt helper-font-24"></i> Your account is not active yet. Please check your email account to activate your email address to be able to publish your own games.</p>
    </div>
<?php }else{}?>


                    <div class="alert alert-block fadein">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p><h5 class="alert-heading">Do you know what <a class="btn btn-success btn-mini icofont-link"> Chain</a> is? </br>Its the easy way of adding a game to your channel.</h5></p>
                        
                        <p><i class="elusive-info-sign"></i> If you chain a game, a clone of the game will be created in your games section and you will be able to edit the game as you wish.</p>
                        <p><i class="elusive-info-sign"></i> While you are playing a game you will see the <a class="btn btn-success btn-mini icofont-link"></a> chain button at the bottom of the page on the rating bar.</p>
                        
                    </div>


                <div class="error-page" style="margin:-60px 0px 0px 0px;">
                    <h1 class="error-code color-blue" style="margin:0px 0px -30px 0px;">Add Game</h1>
                    <p class="error-description">The game you add will appear in <a href="<?php echo $mygames;?>">"My Games"</a> and your <a href="<?php echo $profilepublic;?>">"Public Channel"</a></p>
                   <!-- <form>
                        <div class="control-group">
                            <div class="input-append input-icon-prepend">
                                <div class="add-on">
                                    <a title="search" style="" class="icon"><i class="icofont-plus"></i></a>
                                    <input class="input-xxlarge animated grd-white" required pattern="(http|https)://.+" onfocus type="text" placeholder="where is the game? Type the link of the website!">
                                </div>
                                <input onClick="_gaq.push(['_trackEvent', 'Games', 'Add']);" type="submit" class="btn btn-danger" value="Grab the game!">
                            </div>
                            <p><small>Simply copy/paste the url from the browser where you play the game.  <strong>Ex: http://phoboslab.org/ztype/</strong></small></p>
                        </div>
                    </form> -->
      
                    <div class="alert alert-block alert-info fadein">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p><h4 class="alert-heading">The Benefits of Adding a Game</h4></p>
                        
                        <p><i class="elusive-ok-sign"></i> Play the game at your own game channel anymore.</p>
                        <p><i class="elusive-ok-sign"></i> Don't have to go to any other website to play games anymore.</p>
                        <p><i class="elusive-ok-sign"></i> Invite your friends to play the game at your channel.</p> 
                        <p><i class="elusive-ok-sign"></i> Collect the games you love form all around the web.</p>
                        <p><i class="elusive-ok-sign"></i> Your game will be available via Toork or any other search engines.</p>
                        <p><i class="elusive-ok-sign"></i> One Source for your online game activity.</p>
                        <p><i class="elusive-ok-sign"></i> It is totally yours!</p>
                        
                    </div>

                </div>


                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <ul class="nav nav-pills">

                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#boxtabpill-1">Add Game</a></li>

                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="boxtabpill-1">

                                        <div class="span12">
                                            <!--box-->
                                            <div class="box corner-all">
                                                <!--box header-->
                                                <div class="box-header grd-white color-silver-dark corner-top">
                                                    <div class="header-control">
                                                        <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                        <a data-box="close">×</a>
                                                    </div>
                                                    <span>Game Details</span>
                                                </div><!--/box header-->
                                                <!--box body-->
                                                <div class="box-body">
                                                    <!--element-->
<?php echo $this->Form->create('Game', array('label'=>false ,'id'=>'addgameform','class'=>'form-horizontal' ,'type' => 'file'));?>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Name</label>
                                                            <div class="controls">
<?php echo $this->Form->input('name',array('label'=>false ,'maxlength'=>28,'required','type'=>'text','class'=>'grd-white','id'=>'inputAuto','placeholder' => 'Metal Slug Brutal 3')); ?>     
                                                            </div>
                                                        </div>

<?php if ($this->Session->read('Auth.User.role') == 0){?>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Link</label>
                                                            <div class="controls">
<?php echo $this->Form->input('link',array('label'=>false ,'div'=>false,'required pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'url','class'=>'grd-white', 'maxlength'=>200)); ?>
                                                            </div>
                                                        </div>
<?php  } else{?>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Link</label>
                                                            <div class="controls">
<?php echo $this->Form->input('link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'url','class'=>'grd-white', 'maxlength'=>200)); ?>
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Embed</label>
                                                            <div class="controls">
<?php echo $this->Form->input('embed',array('label'=>false ,'div'=>false, 'pattern'=>'(<iframe|<embed|<object).+.(</iframe>|</embed>|</object>)' ,'placeholder' => 'Paste your game code here please','maxlength'=>1000, 'title'=>'Only <embed> , <iframe> and <object> tags are available and the game code must be starting from one of the tags and ending with the same tag. Ex: <embed> some code </embed>')); ?> 
                                                            </div>
                                                        </div>
<?php } ?>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Description</label>
                                                            <div class="controls">
<?php  echo $this->Form->input('description',array('label'=>false,'div'=>false,'maxlength'=>400,'required','placeholder' => 'Describe the game you share please','type' => 'textarea')); ?>  
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto">Game Category</label>
                                                            <div class="controls">
 <?php echo $this->Form->input('category_id',array('label'=>'Select Category:' )); ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="control-group">
    <label class="control-label" for="inputAuto"><strong>Game Picture</strong></label>
<div class="span2 fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new img-polaroid" style="width: 215px; height:115px;">
    <img src="http://www.placehold.it/215x115/EFEFEF/AAAAAA&text=Game Picture" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 215px; height: 115px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <span class="fileupload-new"><i class="elusive-edit"></i></span>
        <span class="fileupload-exists"><i class="elusive-edit"></i></span><input data-form="uniform" id="inputUpload" required type="file" name="data[Game][picture]" accept="image/gif,image/jpg,image/png,image/jpeg" size="150" /></span>
    <a href="#" rel="tooltip" data-placement="bottom" data-original-title="Remove Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small fileupload-exists" data-dismiss="fileupload"><i class="elusive-trash"></i></a>
  </div>
</div>
</div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputUpload">Are You Hero?</label>
                                                            <div class="controls">
                                                                <div>
<?php
      echo $this->Recaptcha->show(array(
        'theme' => 'white',
        'lang' => 'en',));
      echo $this->Recaptcha->error();
?>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                           
                                                      

                                                        <div class="form-actions">
                                                            <button type="submit" onClick="_gaq.push(['_trackEvent', 'Games', 'Add']);" class="btn btn-primary">Save changes</button>
                                                            <button type="button" class="btn">Cancel</button>
                                                        </div>
                                                    </form>
                                                    <!--/element-->
                                                </div><!--/box body-->
                                            </div><!--/box-->
                                        </div>

                                                </div>

                                            </div><!--/widgets-tab-body-->
                                        </div>
                                    </div>



                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->