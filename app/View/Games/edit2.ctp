                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

    <p class="alert-info alert"><i class="elusive-info-sign"></i> Add a good quality game picture and define the game with your own words to make your game unique.</p>

                                        <div>
                                            <!--box-->
                                            <div class="box corner-all">
                                                <!--box header-->
                                                <div class="box-header grd-white color-silver-dark corner-top">
                                                    <div class="header-control">
                                                        <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                        <a data-box="close">×</a>
                                                    </div>
                                                    <span>Edit : <strong><?php echo $game['Game']['name'];?></strong></span>
                                                </div><!--/box header-->
                                                <!--box body-->
                                                <div class="box-body">
                                                    <!--element-->
<?php echo $this->Form->create('Game', array('label'=>false ,'id'=>'addgameform','class'=>'form-horizontal' ,'type' => 'file'));?>
<div class="control-group">
    <label class="control-label" for="inputAuto"><strong>Game Picture</strong></label>
<div class="span2 fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new img-polaroid" style="width: 215px; height:118px;">
    <?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('alt'=>$game['Game']['name'],'width'=>'500','height'=>'110','onerror'=>'imgError(this,"toorksize");')); ?></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 215px; height: 115px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <span class="fileupload-new"><i class="elusive-edit"></i></span>
        <span class="fileupload-exists"><i class="elusive-edit"></i></span><input data-form="uniform" id="inputUpload" type="file" name="data[Game][edit_picture]" accept="image/gif,image/jpg,image/png,image/jpeg" size="150" /></span>
    <a href="#" rel="tooltip" data-placement="bottom" data-original-title="Remove Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small fileupload-exists" data-dismiss="fileupload"><i class="elusive-trash"></i></a>
  </div>
</div>
</div>

                                                        <div class="control-group">
                                                            <label class="control-label" for="inputAuto"><strong>Game Name</strong></label>
                                                            <div class="controls">
<?php echo $this->Form->input('name',array('label'=>false ,'maxlength'=>28,'required','type'=>'text','class'=>'grd-white span10','id'=>'inputAuto','placeholder' => 'Metal Slug Brutal 3')); ?>     
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
                                                        
                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                            <button type="button" class="btn">Cancel</button>
                                                        </div>
                                                    </form>
                                                    <!--/element-->
                                                </div><!--/box body-->
                                            </div><!--/box-->
                                        </div>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->