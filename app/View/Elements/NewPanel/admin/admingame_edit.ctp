<div class="media well shadow" style="background-color:white;">

	<fieldset>
               

    <div class="control-group input-prepend">
    <label class="control-label" for="inputAuto"><strong>Game Picture</strong></label>
<div class="span4 fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new img-polaroid" style="width: 215px; height:118px;">
    <?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('alt'=>$game['Game']['name'],'id'=>'game_image','style'=>'width:215px;height:118px;','onerror'=>'imgError(this,"toorksize");')); ?></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 215px; height: 115px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" data-toggle="modal" data-target="#gameChange" href="#" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <span class="fileupload-new"><i class="elusive-edit"></i></span>
        </span>
        
    

     <a rel="tooltip" id="imageinfo" data-toggle="popover" style="margin:-80px 30px 0px 10px;" title="Picture Specs Info" data-placement="bottom" data-original-title="Game Image Info" class="btn btn-small" data-html="true" data-content='A good picture size is <strong>600*330</strong>px. For the best experience try to add a rectangle kind of image which is larger than <strong>200*110</strong>px. Any image size is always welcome.'><i class="elusive-info-sign"></i></a>

  </div>
</div>
</div>










                                                            <div class="control-group">
                                                                <label class="control-label" for="required">Name</label>
                                                                <div class="controls">
                                                                    <span class="add-on"></span>
<input id="game_name" placeholder="Title of game." data-validate="{required: true, messages:{required:&quot;Please enter field required&quot;}}" type="text" value="<?php echo $game['Game']['name']; ?>">                                                                </div>
                                                            </div>
			
                                                            
                                                            
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputEditorSimple">Description</label>
                                                            <div class="controls">

<textarea id="game_description" maxlength="280" placeholder="Describe your game." class="span8" rows="6" cols="30"><?php echo $game['Game']['description']; ?></textarea>
                                                            </div>
                                                        </div>

<div class="control-group" >
<div class="controls">
<label class="control-label" for="url">Link</label>

<input style='float:left;' id="game_link" type="url" pattern="(http|https)://(www.|).+" placeholder="http://www.mywebsite.com" maxlength="100" value="<?php echo $game['Game']['link']; ?>"> 
<a style='float:left;margin-left:5px;' data-toggle="modal" data-target="#gameAdd" href="#" class="btn btn-success" title=""><i class="elusive-upload"></i> Upload Game File</a>

<input id="game_file" type="hidden" value="empty"> 
<input type="hidden" name="attr" id="attr" value="game_edit" />
<input type="hidden" name="game_id" id="game_id" value="<?php echo $game['Game']['id']; ?>" />
</div>
 </div> 

<div class="control-group" style='display: inline-block;width: 100%;'>

<div class="controls" style='float:left;'>
<label class="control-label" for="url">Width</label>
<input type="text" maxlength="100" value="<?php echo $game['Game']['width']; ?>" id="game_width"><i class='elusive-remove' style='margin:2px;font-size: 8px;'></i> 
</div>

<div class="controls" style='float:left;'>
<label class="control-label" for="url">Height</label>
<input  type="text" maxlength="100" value="<?php echo $game['Game']['height']; ?>" id="game_height"> </div>

</div>


<div class="control-group">
                        <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="fullscreen" name="send_marketing" <?php if($game['Game']['fullscreen']){echo 'checked';} ?> /> Full Screen
                            <span class="help" data-toggle="tooltip" title="game size full screen">
                                <i class="fa fa-question-circle"></i>
                            </span>
                                </label>
                            </div>
                        </div>
                    </div>



<div class="control-group">
                        <div class="col-sm-offset-2 col-sm-10 col-md-offset-2 col-md-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="mobile" name="send_marketing" <?php if($game['Game']['mobileready']){echo 'checked';} ?> /> Mobile Ready
                            <span class="help" data-toggle="tooltip" title="Suitable for mobile">
                                <i class="fa fa-question-circle"></i>
                            </span>
                                </label>
                            </div>
                        </div>
                    </div>                         

                                 


<div class="control-group">
<label class="control-label" for="url">Priority:</label>	
<input type="text" maxlength="100" value="<?php echo $game['Game']['priority']; ?>" id="game_priority"> 
</div>

<div class="control-group">
<label class="control-label" for="url">Tags:</label>	
<input type="text" maxlength="100" value="" id="game_tags"> 
</div>

<div class="control-group">
<div class="controls">
<?php echo $this->Form->input('category_id',array('label'=>'Select Category:','default'=>'18',array('id'=>'category') )); ?>
</div>
</div>


<div class="control-group">
<label class="control-label" for="url">Owner Channel Id:</label>    
<input type="text" maxlength="100" value="<?php echo $game['Game']['user_id']; ?>" id="game_user_id"> 
</div>


                                     
                                                            <div class="form-actions">
                                                                <button id='admin_game_submit' type="button" class="btn btn-primary">Submit Game</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                     
          </div>



    <!-- Game Image Change Modal begins -->
    <div class="modal fade" id="gameChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                <?php 
        $url=$this->Html->url(array('controller'=>'uploads','action'=>'images','new_game',$user['User']['id']));
        ?>
                <iframe id='gameframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
            </div>
        </div>
    </div>
  <!-- Game Image Change Modal ends -->      

  <!-- Game Add Modal begins -->
    <div class="modal fade" id="gameAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                <?php 
        $url=$this->Html->url(array('controller'=>'uploads','action'=>'games','game_upload',$user['User']['id']));
        ?>
                <iframe id='gameaddframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
            </div>
        </div>
    </div>
  <!-- Game Add Modal ends -->   