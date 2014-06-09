<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />	
        <title><?php echo $title_for_layout?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="http://code.ionicframework.com/ionicons/1.4.1/css/ionicons.min.css" rel="stylesheet">
	<!-- stylesheets -->
		<?php echo $this->Html->css(array(
		'business/dashboard/compiled/theme',
		'business/dashboard/vendor/animate',
		'business/dashboard/custom',
		'business/dashboard/vendor/brankic',
		'business/dashboard/vendor/datepicker',
		'business/dashboard/vendor/morris',
		'business/dashboard/vendor/select2',
		'business/dashboard/vendor/select2-bootstrap',
		'business/dashboard/vendor/jquery.minicolors',
		'business/dashboard/vendor/summernote',
		'business/dashboard/vendor/jquery.dataTables',
		'business/dashboard/vendor/messenger/messenger',
		'business/dashboard/vendor/messenger/messenger-theme-flat')); ?>
	<!-- javascript -->
 		<script>
	        updateData	=	'<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'updateData')); ?>'; 
	        set_channel_ads='<?php echo $this->Html->url(array('controller'=>'users','action'=>'set_channel_ads')); ?>'; 
	        remove_ads_field='<?php echo $this->Html->url(array('controller'=>'users','action'=>'remove_ads_field')); ?>';        
	 		var toorksize = 'https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png';
	        var avatar = 'https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_manchannelavatar_default.png';
	        function imgError(image, style) {
	                image.onerror = "";
	                if (style == "toorksize") {
	                    image.src = toorksize;
	                } else if (style == "avatar") {
	                    image.src = avatar;
	                }
	                return true;
	            }
        </script>
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
        <?php echo $content_for_layout?>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<?php echo $this->Html->script(array(
		'business/dashboard/bootstrap/bootstrap.min',
		'business/dashboard/vendor/bootstrap-switch.min',
		'business/dashboard/vendor/jquery.cookie',
		'business/dashboard/vendor/moment.min',
		'business/dashboard/theme',
		'business/dashboard/vendor/select2.min',
		'business/dashboard/vendor/jquery.dataTables.min',
		'business/dashboard/vendor/jquery.validate.min',
		'business/dashboard/vendor/bootstrap-datepicker',
		'business/dashboard/vendor/summernote.min',
		'business/dashboard/vendor/jquery.minicolors.min',
		'business/dashboard/vendor/jquery.maskedinput',
		'business/dashboard/vendor/jquery.raty',
		'business/dashboard/vendor/raphael-min',
		'business/dashboard/vendor/morris.min',
		'business/dashboard/vendor/jquery.flot/jquery.flot',
		'business/dashboard/vendor/jquery.flot/jquery.flot.time',
		'business/dashboard/vendor/jquery.flot/jquery.flot.tooltip',
		'business/dashboard/vendor/messenger/messenger.min',
		'business/dashboard/vendor/messenger/messenger-theme-flat',
		'business/dashboard/custom.js'));
		?>

</html>