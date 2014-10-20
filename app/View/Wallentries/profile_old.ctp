<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('logged_user_panel'); ?>
    <?php  echo $this->element('subscribe'); ?>
    <?php  echo $this->element('social'); ?>
    <?php echo $this->element('best_channels_left_menu'); ?>
    <?php echo $this->element('categories_left_menu'); ?>
  </div>
        
		
            <div class="right_panel">!--Right Panel Div Begins -->
               
	<?php echo $this->element('topbar'); ?>		   
	<div id="wall_container">

<!-- Buraya zamaningoyu ekledim -->
<?php
echo  '<h3>'.ucfirst($username).' Updates </h3>';
?>

<div id='profile_grid'>
<div style='float:left;width:200px'>
<h4>Friends</h4>
<span class='count'>

</span>
</div>
<div style='float:right;width:200px'>

</div>
</div>
<div style='clear:both'/>


<?php if($profile_uid==$uid)
{

?>
<!-- Buraya zamaningoyu ekledim -->

<div id="updateboxarea">
<h4>What's up?</h4>
<textarea name="update" id="update" maxlength="200" ></textarea>
<br />
<div id="webcam_container" class='border'>
<div id="webcam" >
</div>
<div id="webcam_preview">

</div>

<div id='webcam_status'></div>
<div id='webcam_takesnap'>

<input type="button" value=" Take Snap " onclick="return takeSnap();" class="camclick button"/>
<input type="hidden" id="webcam_count" />
</div>
</div>
<div  id="imageupload" class="border">
<?php $image_ajax_url= $this->Html->url(array('controller'=>'Wallentries','action'=>'image_ajax'));?>
<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo $image_ajax_url; ?>'> 
<div id='preview'>
</div>

<span id='addphoto'>Add Photo:</span> <input type="file" name="photoimg" id="photoimg" />
<input type='hidden' id='uploadvalues' />
</form>
</div>
<div style="width:100%;clear:both">
<input type="submit"  value=" Update "  id="update_button"  class="update_button"/> 
<span style="float:right">
<a href="javascript:void(0);" id="camera" title="Upload Image"><img src="icons/cameraa.png" border="0" /></a> 
 <a href="javascript:void(0);" id="webcam_button" title="Webcam Snap"><img src="icons/web-cam.png"  border="0"  style='margin-top:5px'/></a>
</span>
</div>

</div>

<div id='flashmessage'>
<div id="flash" align="left"  ></div>
</div>
<?php } ?>
<div id="content">

<?php 
// Loading Messages
echo $this->element('wall/load_messages');	
?>

</div>
</div>		   
			   
			   
			   
			   
			   
			   
			   
			   
			   
			   
            </div><!--Right Panel Div Ends -->






</div>



