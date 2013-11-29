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



<div class="menu shadow-black" style="background-color:white;">
  <div class="accordion">
    <div class="accordion-group">
      <div class="accordion-heading country" style="margin:10px;">
        

                <div class="error-page" style="margin:-60px 0px 0px 0px;">
                    <h1 class="error-code color-blue" style="margin:0px 0px -30px 0px;">Add Game</h1>
                    <p class="error-description">The game you add will appear in <a href="<?php echo $mygames;?>">"My Games"</a> and your <a href="<?php echo $profilepublic;?>">"Public Channel"</a></p>
                   <form>
                        <div class="control-group">
                            <div class="input-append input-icon-prepend">
                                <div class="add-on">
                                    <a title="search" style="" class="icon"><i class="icofont-plus"></i></a>
                                    <input id="urlarea" class="input-xxlarge animated grd-white" required pattern="(http|https)://.+" onfocus type="text" placeholder="where is the game? Type the link of the website!">
                                </div>
                                <input id="grabgame" onClick="_gaq.push(['_trackEvent', 'Games', 'Add']);" type="button" class="btn btn-danger" value="Grab the game!">
                            </div>
                            <div id="grabloader" style="display:none;">
                            <p><small><?php echo $this->Html->image("/img/loading.gif");?> </small></p>
                            <p><small>Your game is processing... </small></p>
                            </div>
                            <p><small>Simply copy/paste the url from the browser where you play the game.  <strong>Ex: http://phoboslab.org/ztype/</strong></small></p>
                        </div>
                    </form>

                </div>


        <a style="text-align: center ;"class="accordion-toggle collapsed color-red" data-toggle="collapse" href="#expandGame">
        <small>Add Game Manually</small></br><i class="elusive-chevron-down"></i></a>

      </div>
      <div id="expandGame" class="accordion-body collapse" style="height: 0px;">
        <div class="accordion-inner">


<!- Game Edit Starts>


<?php echo $this->Form->create('Game', array('label'=>false ,'id'=>'addgameform','class'=>'form-horizontal' ,'type' => 'file'));?>
<div class="control-group">
    <label class="control-label" for="inputAuto"><strong>Game Picture</strong></label>
<div class="span4 fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new img-polaroid" style="width: 215px; height:118px;">
    <img src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" alt="" width="500" height="110"></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 215px; height: 115px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <span class="fileupload-new"><i class="elusive-edit"></i></span>
        <span class="fileupload-exists"><i class="elusive-edit"></i></span><input data-form="uniform" id="inputUpload" type="file" name="data[Game][edit_picture]" accept="image/gif,image/jpg,image/png,image/jpeg" size="150" /></span>
    <a href="#" rel="tooltip" data-placement="bottom" data-original-title="Remove Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small fileupload-exists" data-dismiss="fileupload"><i class="elusive-trash"></i></a>

     <a rel="tooltip" id="imageinfo" data-toggle="popover" style="margin:-80px 30px 0px 10px;" title="Picture Specs Info" data-placement="bottom" data-original-title="Game Image Info" class="btn btn-small" data-html="true" data-content='A good picture size is <strong>600*330</strong>px. For the best experience try to add a rectangle kind of image which is larger than <strong>200*110</strong>px. Any image size is always welcome.'><i class="elusive-info-sign"></i></a>

  </div>
</div>
</div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto"><strong>Game Name</strong></label>
                                                            <div class="controls">
<?php echo $this->Form->input('name',array('label'=>false ,'maxlength'=>25,'required','type'=>'text','class'=>'grd-white span10','id'=>'inputAuto','placeholder' => 'Metal Slug Brutal 3')); ?>     
                                                            </div>
                                                        </div>

<?php if ($this->Session->read('Auth.User.role') == 0){?>
                           <?php if(!$clone) { ?>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto"><strong>Game Link</strong></label>
                                                            <div class="controls">
<?php echo $this->Form->input('link',array('label'=>false ,'div'=>false,'required pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'url','class'=>'grd-white span10', 'maxlength'=>200)); ?>
                                                            </div>
                                                        </div>
                                    <?php } ?>          
<?php  } else{?>
                           <?php if(!$clone) { ?>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto"><strong>Game Link</strong></label>
                                                            <div class="controls">
<?php echo $this->Form->input('link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'url','class'=>'grd-white span10', 'maxlength'=>200)); ?>
                                                            </div>
                                                        </div>
                                
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto"><strong>Game Embed</strong></label>
                                                            <div class="controls">
<?php echo $this->Form->input('embed',array('label'=>false ,'div'=>false,'class'=>'span10','rows'=>'5','pattern'=>'(<iframe|<embed|<object).+.(</iframe>|</embed>|</object>)' ,'placeholder' => 'Paste your game code here please. The embed code can only be iframe,embed or object type of html tag. Ex: <object> some stuf is here </object>','maxlength'=>1000, 'title'=>'Only <embed> , <iframe> and <object> tags are available and the game code must be starting from one of the tags and ending with the same tag. Ex: <embed> some code </embed>')); ?> 
                                                            </div>
                                                        </div>
                                <?php } ?>                      
                                                        
<?php } ?>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto"><strong>Game Description</strong></label>
                                                            <div class="controls">
<?php  echo $this->Form->input('description',array('label'=>false,'div'=>false,'maxlength'=>400,'required','placeholder' => 'Describe the game you share please','type' => 'textarea','class'=>'span10','rows'=>'5',)); ?>  
                                                            </div>
                                                        </div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto"><strong>Game Category</strong></label>
                                                            <div class="controls">
 <?php echo $this->Form->input('category_id',array('label'=>'Select Category:' )); ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div style="width:100%;text-align:center;"><div id="grabloader" style="display:none;">
                            <p><small><?php echo $this->Html->image("/img/loading.gif");?> </small></p>
                            <p><small>Your game is processing... </small></p>
                            </div></div>
                                                        
                                                        <div class="form-actions">
                                                            <button id="editgame" type="submit" class="btn btn-primary">Save changes</button>
                                                            <a type="button" class="btn" href="<?php echo $mygames; ?>">Cancel</a>
                                                        </div>
                                                    </form>


<!- Game Edit Ends>


        </div>
      </div>
     


    </div>
  </div>
</div>


                    <div style="background-color:white;" class="shadow alert alert-block alert-info fadein">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <p><h4 class="alert-heading">The Benefits of Adding a Game</h4></p>
                        
                        <p><i class="elusive-ok-sign"></i> Play the game at your own game channel anymore.</p>
                        <p><i class="elusive-ok-sign"></i> Don't have to go to any other website to play games anymore.</p>
                        <p><i class="elusive-ok-sign"></i> Invite your friends to play the game at your channel.</p> 
                        <p><i class="elusive-ok-sign"></i> Collect the games you love form all around the web.</p>
                        <p><i class="elusive-ok-sign"></i> Your game will be available via Clone or any other search engines.</p>
                        <p><i class="elusive-ok-sign"></i> One Source for your online game activity.</p>
                        <p><i class="elusive-ok-sign"></i> It is totally yours!</p>
                        
                    </div>


                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->