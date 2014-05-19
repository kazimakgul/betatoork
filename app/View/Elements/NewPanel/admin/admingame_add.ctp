<div class="media well shadow" style="background-color:white;">

	<fieldset>
               

    <div class="control-group  input-prepend">
    
<div class="span4 fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new img-polaroid" style="width: 215px; height:118px;"><img src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" alt="" id="game_image" style="width:215px;height:118px;" onerror="imgError(this,&quot;toorksize&quot;);"></div>
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
<input id="game_name" placeholder="Title of game." data-validate="{required: true, messages:{required:&quot;Please enter field required&quot;}}" type="text" value="Sentry Knight">                                                                </div>
                                                            </div>
			
                                                            
                                                            
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputEditorSimple">Description</label>
                                                            <div class="controls">

<textarea id="game_description" maxlength="280" placeholder="Describe your game." class="span8" rows="6" cols="30"></textarea>
                                                            </div>
                                                        </div>

<div class="control-group" >
<div class="controls">
<label class="control-label" for="url">Link</label>

<input style='float:left;' id="game_link" type="url" pattern="(http|https)://(www.|).+" placeholder="http://www.mywebsite.com" maxlength="100" value="http://socialesman.com"> 
<a style='float:left;margin-left:5px;' data-toggle="modal" data-target="#gameAdd" href="#" class="btn btn-success" title=""><i class="elusive-upload"></i> Upload Game File</a>

<input id="game_file" type="hidden" value="empty"> 
</div>
 </div> 

<div class="control-group" style='display: inline-block;width: 100%;'>

<div class="controls" style='float:left;'>
<label class="control-label" for="url">Width</label>
<input type="text" maxlength="100" value="" id="game_width"><i class='elusive-remove' style='margin:2px;font-size: 8px;'></i> 
</div>

<div class="controls" style='float:left;'>
<label class="control-label" for="url">Height</label>
<input  type="text" maxlength="100" value="" id="game_height"> </div>

</div>

<div class="control-group" >
<div class="controls">
<input  type="checkbox" maxlength="100" value="dd" id="full_screen">Full Screen</div>
<div class="controls">
<input type="checkbox" maxlength="100" value="dd" id="game_mobile">Mobile Ready</div>
 </div>                               

                                 


<div class="control-group">
<label class="control-label" for="url">Priority:</label>	
<input type="text" maxlength="100" value="" id="game_priority"> 
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
<input type="text" maxlength="100" value="<?php echo $user['User']['id']; ?>" id="game_user_id"> 
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