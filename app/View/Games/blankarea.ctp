<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">fffdd
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Facebook WallScript Version 5.0</title>

<script type="text/javascript" src="http://54.225.196.20/js/js2/jquery.js"></script>
<script type="text/javascript" src="http://54.225.196.20/js/wall/jquery.wallform.js"></script>

<script>
$('#photoimg').live('change', function()			
{ 
var values=$("#uploadvalues").val();
$("#previeww").html('<img src="icons/loader.gif"/>');
$("#imageform").ajaxForm({target: '#preview'  }).submit();

var X=$('.preview').attr('id');
var Z= X+','+values;
if(Z!='undefined,')
$("#uploadvalues").val(Z);

});
</script>

</head>
<body>

<form id="imageform" method="post" enctype="multipart/form-data" action='http://54.225.196.20/Wallentries/image_ajax'> 
<div id='preview'>
</div>

<span id='addphoto'>Add Photo:</span> <input type="file" name="photoimg" id="photoimg" />
<input type='hidden' id='uploadvalues' />
</form>

</body>
</html>
