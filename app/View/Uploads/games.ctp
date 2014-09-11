<!DOCTYPE HTML>
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<meta charset="utf-8">
<title>OgiPicker</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Generic page styles -->
 <?php echo $this->Html->css(array('uploadplugin/style','uploadplugin/jquery.fileupload','uploadplugin/jquery.Jcrop','uploadplugin/imgpicker/image-picker')); ?>
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->

<script>
uploadhandler='<?php echo $this->webroot.'uploadplugin/uploadhandler.php?uploadtype='.$uploadtype.'&id='.$id; ?>';
crophandler='<?php echo $this->webroot.'uploadplugin/crop.php'?>';
apply_file='<?php echo $this->Html->url(array('controller'=>'uploads','action'=>'apply_file')); ?>';
upload_type='<?php echo $uploadtype;?>';
user_id='<?php echo $id;?>';
</script>


</head>
<body>

            <!--These inputs are keeps coordinated-->
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			

<?php 
if($uploadtype=='game_upload')
$title_message='Upload game file';
?>

<div id="main-wrapper" class="panel panel-default">

<div id="top-menu">
<h3 style="margin-top: 5px;margin-left: 6px;font-size: 20px;color:#585656;" class="pull-left"><?php echo $title_message; ?></h3>	
<!--	
<a href="#upload" onclick="new_upload();" data-toggle="tab" class="btn btn-default" title=""><i class="glyphicon glyphicon-upload"></i> Upload</a>
<a href="#photos" onclick="go_photos();" data-toggle="tab" class="btn btn-default" title=""><i class="glyphicon glyphicon-user"></i> Your Files</a>
-->
</div>

<div id="main-area">
<!-- Main Begins-->

<div class="tab-content">
                        <div class="tab-pane active" id="upload" style=" text-align:center;padding:10px;">
						<!--Upload Area begins -->
						
					<div id="uploadtools">	<!-- Upload tools starts here -->	
						<!-- The fileinput-button span is used to style the file input field as button begins -->
    <span class="btn btn-success fileinput-button" style="background-color: #C2C6C6;border-color: #C2C6C6;margin-top:65px;">
        <i class="glyphicon glyphicon-cloud-upload" style="font-size:40px;"></i><br>
        <span style="font-size:25px;">Select File...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
		<input id="selected_image" type="hidden" value="empty">
		<input id="loadfrom" type="hidden" value="upload">
		<input id="imagepatch" type="hidden" value="empty">
		<input id="new_image_link" type="hidden" value="empty">
    </span>
				        <!-- The fileinput-button span is used to style the file input field as button ends -->	
						
						
	<!-- The global progress bar begins -->
    <div id="progress" class="progress" style="width:500px; margin:0px auto;margin-top:25px; display:block;">
        <div class="progress-bar progress-bar-info" style="background-color: #C2C6C6;border-color: #C2C6C6;"></div>
    </div>
	<!-- The global progress bar ends -->
	   </div><!-- Upload tools ends here -->	
	
	
	<div id="viewtools" style="display:none;"><!-- View tools begins here -->
	
	
	<ul class="breadcrumb pull-left" style=" background:#E0DFDF;padding: 2px 15px;margin-bottom: 10px;font-size: 12px; width:100%;">
    <li class="pull-left"><a onclick="new_upload();" href="#">Upload</a></li>
    <li class="pull-left" id="image_name">Sentry Knight</li>
</ul>
	
	
	 <!-- The container for the uploaded files begins -->
    <div id="files" class="files crop-image-wrapper"></div>
	<!-- The container for the uploaded files ends -->
	</div><!-- View tools ends here -->		
			
						<!--Upload Area ends -->
						</div>
                        <div class="tab-pane" id="photos">
						<!--Content of Photos begins -->
						<?php echo $this->element('uploadplugin/photos'); ?>
						<!--Content of Photos ends -->
						</div>
                       
                    </div>

<!-- Main End-->
</div>

<?php 
if($uploadtype=='game_upload')
$btn_message='Apply Game Upload';
?>

<div id="bottom-menu">
<a href="#comments" id="set_photo" class="btn btn-primary tip disabled" title=""><i class="glyphicon glyphicon-ok"></i> <?php echo $btn_message; ?></a>
<a id='close_panel' href="#comments" class="btn btn-default tip" title="">Cancel</a>
</div>

</div>

	
  


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<!-- The basic File Upload plugin -->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<?php echo $this->Html->script(array('uploadplugin/vendor/jquery.ui.widget')); ?>
<?php echo $this->Html->script(array('uploadplugin/jquery.iframe-transport')); ?>
<?php echo $this->Html->script(array('uploadplugin/jquery.fileupload')); ?>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<?php echo $this->Html->script(array('uploadplugin/jquery.Jcrop')); ?>
<?php echo $this->Html->script(array('uploadplugin/imgpicker/image-picker')); ?>
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/';
    $('#fileupload').fileupload({
        url: uploadhandler,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
			    $( "#uploadtools" ).hide();
				$( "#viewtools" ).show();
				$('#files').html('<i style="margin-top:65px; font-size:80px; color:#ffffff;" class="glyphicon glyphicon-check"></i>'+file.url);
				$('#selected_image').val(file.name);
				$('#image_name').html(file.name);
				$('#set_photo').removeClass('disabled');
				$('#crop_photo').removeClass('disabled');

                if(upload_type=='avatar_image')
				{
				var ratio=1;
				}
				if(upload_type=='cover_image')
				{
				var ratio=1000/300;
				}
				if(upload_type=='game_image')
				{
				var ratio=360/197;
				}

                //get image sizes begins
                var img = new Image();
                img.onload = function() {
                $('#theImg').Jcrop({ addClass: 'jcrop-centered',onSelect: updateCoords,trueSize: [this.width ,this.height],aspectRatio: ratio });
                }
                img.src = file.url;
                //get image sizes ends

				
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        },
        add: function (e, data) {
        var goUpload = true;
        var uploadFile = data.files[0];
        if (!(/\.(swf|unity3d)$/i).test(uploadFile.name)) {
            alert('You must select a game file only');
            goUpload = false;
        }
        if (uploadFile.size > 50000000) { // 2mb
            alert('Please upload a smaller file, max size is 50 MB');
            goUpload = false;
        }
        if (goUpload == true) {
            data.submit();
        }
    }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

$('#fileupload').click(function () {
		//$( ".progress" ).show();
	});

	
	$('#set_photo').click(function () {
		selected_image=$('#selected_image').val().trim();
		loadfrom=$('#loadfrom').val();
		imagepatch=$('#imagepatch').val();
		if(selected_image!='empty' || imagepatch!='empty')
		{//alert('inside'+upload_type+selected_image+user_id+loadfrom+imagepatch);
		//do jobs for s3 upload and database save
		//------
		   $.ajax({
        type: "POST",
        url: apply_file,
		data: {uploadtype:upload_type,name: selected_image,id:user_id,from:loadfrom,image:imagepatch},
        dataType: "json",
		async: false,
        success: function(data){
			
			//alert(data.rtdata.title);
			$('#new_image_link').val(data.rtdata.newlink);
			
			//$title=data.rtdata.title;
			
			},
        failure: function(errMsg) {
            alert(errMsg);
        }
  });
  //------	
		
		}
	});
	
	$('#crop_photo').click(function () {
	  if(checkCoords())
	  {//check selected begins
		selected_image=$('#selected_image').val().trim();
		//alert('photo has been cropped');
       //------
	   
	   //-------determine cropped images sizes begins------------
	            if(upload_type=='avatar_image')
				{
				var targ_w=150;
				var targ_h=150;
				}
				if(upload_type=='cover_image')
				{
				var targ_w=1000;
				var targ_h=300;
				}
				if(upload_type=='game_image')
				{
				var targ_w=360;
				var targ_h=197;
				}
	   //----------determine cropped images sizes ends--------------
	   
		   $.ajax({
        type: "POST",
        url: crophandler,
        data: {uploadtype:upload_type,name: selected_image,id:user_id,x:$('#x').val(),y:$('#y').val(),w:$('#w').val(),h:$('#h').val(),w_size:targ_w,h_size:targ_h},
		async: false,
        success: function(data){
			//alert(data);
			//alert(data.rtdata.title);
			//$('#theImg').attr('src', $('#theImg').attr('src')+'?'+Math.random());
			$('#files').html('<img id="theImg" src="'+$('#theImg').attr('src')+'" />');
			
			},
        failure: function(errMsg) {
            alert(errMsg);
        }
  });
  //------	

   }//check selected ends

	});
	
	function new_upload()
	{
	    $( "#uploadtools" ).show();
		$( "#viewtools" ).hide();
		$('#progress .progress-bar').css('width',0);
		$('#set_photo').addClass('disabled');
		$('#crop_photo').addClass('disabled');
		$('#selected_image').val('empty');
		$('#imagepatch').val('empty');
		$('.picker-badges').remove();
		$('#loadfrom').val('upload');
	}

	function go_gallery()
	{
		$('#set_photo').addClass('disabled');
		$('#crop_photo').addClass('disabled');
		$('#selected_image').val('empty');
		$('#imagepatch').val('empty');
		$('.picker-badges').remove();
		$('#loadfrom').val('gallery');
	}

	function go_photos()
	{
		$('#set_photo').addClass('disabled');
		$('#crop_photo').addClass('disabled');
		$('#selected_image').val('empty');
		$('#imagepatch').val('empty');
		$('.picker-badges').remove();
		$('#loadfrom').val('photos');
	}


	function updateCoords(c)
  {
  	$('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  }

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press Crop button.');
    return false;
  }

</script>

</body> 
</html>
