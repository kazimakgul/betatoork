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
 <?php echo $this->Html->css(array('uploadplugin/style','uploadplugin/jquery.fileupload')); ?>
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->


<script>
uploadhandler='<?php echo $this->webroot.'uploadplugin/uploadhandler.php?uploadtype='.$uploadtype.'&id='.$id; ?>';
set_photo='<?php echo $this->Html->url(array('controller'=>'uploads','action'=>'set_as')); ?>';
upload_type='<?php echo $uploadtype;?>';
user_id='<?php echo $id;?>';
</script>


</head>
<body>




<div id="main-wrapper" class="panel panel-default">

<div id="top-menu">
<a href="#upload" onclick="new_upload();" data-toggle="tab" class="btn btn-default" title=""><i class="glyphicon glyphicon-upload"></i> Upload</a>
<a href="#album" data-toggle="tab" class="btn btn-default" title=""><i class="glyphicon glyphicon-list"></i> Album</a>
<a href="#photos" data-toggle="tab" class="btn btn-default" title=""><i class="glyphicon glyphicon-user"></i> Photos Of You</a>

 

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
        <span style="font-size:25px;">Select photo...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
		<input id="selected_image" type="hidden" value="empty">
		<input id="new_image_link" type="hidden" value="emptylink">
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
    <div id="files" class="files"></div>
	<!-- The container for the uploaded files ends -->
	</div><!-- View tools ends here -->		
			
						<!--Upload Area ends -->
						</div>
                        <div class="tab-pane" id="album">
						Albums Area
						</div>
                        <div class="tab-pane" id="photos">
						Photos Area
						</div>
                       
                    </div>

<!-- Main End-->
</div>


<div id="bottom-menu">
<a href="#comments" id="set_photo" class="btn btn-primary tip disabled" title=""><i class="glyphicon glyphicon-ok"></i> Set As Profile Photo</a>
<a href="#comments" id="crop_photo" class="btn btn-primary tip disabled" title="">Crop</a>
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
				$('#files').html('<img id="theImg" src="'+file.url+'" />');
				$('#selected_image').val(file.name);
				$('#image_name').html(file.name);
				$('#set_photo').removeClass('disabled');
				$('#crop_photo').removeClass('disabled');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

$('#fileupload').click(function () {
		//$( ".progress" ).show();
	});

	
	$('#set_photo').click(function () {
		selected_image=$('#selected_image').val().trim();
		if(selected_image!='empty')
		{
		//do jobs for s3 upload and database save
		//------
		   $.ajax({
        type: "POST",
        url: set_photo,
		data: {uploadtype:upload_type,name: selected_image,id:user_id },
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
		alert('photo has been cropped');
	});
	
	function new_upload()
	{
	    $( "#uploadtools" ).show();
		$( "#viewtools" ).hide();
		$('#progress .progress-bar').css('width',0);
		$('#set_photo').addClass('disabled');
		$('#crop_photo').addClass('disabled');
		$('#selected_image').val('empty');
	}

</script>

</body> 
</html>
