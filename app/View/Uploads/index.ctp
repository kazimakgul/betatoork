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
uploadhandler='<?php echo 'http://127.0.0.1/ogipicker/server/php/fuk.php'; ?>';
</script>


</head>
<body>

 <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button" style="background-color: #C2C6C6;border-color: #C2C6C6;">
        <i class="glyphicon glyphicon-cloud-upload" style="font-size:40px;"></i><br>
        <span style="font-size:25px;">Select photo...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress" style="width:500px;">
        <div class="progress-bar progress-bar-info" style="background-color: #C2C6C6;border-color: #C2C6C6;"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>

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
				$('#files').prepend('<img id="theImg" src="'+file.url+'" />')
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
</script>

</body> 
</html>
