<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title_for_layout?></title>
        <meta name="description" content= "<?php echo $description_for_layout?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"><?php echo $this->Html->css(array('business/custom','css2/jquery.pnotify.default')); ?>
    </head>
    <body>
        <?php  echo $this->element('business/header');
        echo $this->element('business/login');
 		?>
        <?php echo $content_for_layout?>
        <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<div id="fb-root"></div>
        <?php echo $this->Html->script(array('assets/prettify','business/custom','business/business','fbconnect','landingscripts')); ?>
	<script>
        toorksize	='<?php echo Configure::read('broken.toorksize'); ?>';
        avatar		='<?php echo Configure::read('broken.avatar'); ?>';
        s3patch		='<?php echo Configure::read('S3.url'); ?>';
        favswitcher	='<?php echo $this->Html->url(array('controller'=>'favorites','action'=>'add')); ?>';
        chaingame	='<?php echo $this->Html->url(array('controller'=>'games','action'=>'clonegame')); ?>';
        remotecheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkUser')); ?>';
		remotecheck2='<?php echo $this->Html->url(array('controller'=>'users','action'=>'checkUser2')); ?>';
		authcheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'usernameAvailable')); ?>';
		facecheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'FaceUser')); ?>';
		<? if($auth_user){
			echo "user_auth='1'";
		}else{echo "user_auth='0'"; }?>
        set_channel_ads='<?php echo $this->Html->url(array('controller'=>'users','action'=>'set_channel_ads')); ?>';
        </script>
    </body>
</html>
