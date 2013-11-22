<html>
<head>
<script>
facecheck='<?php echo $this->Html->url(array('controller'=>'users','action'=>'FaceUser')); ?>';
</script>
</head>
<body>
<div id="fb-root"></div>
<?php echo $this->Html->script('fbconnect'); ?>

<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>
<a id="facebookregister" class="btn btn-success"><i class="icon-plus"></i> Login With Facebook</a>

<a href="#" id="facebookreg">Login With Facebook</a>

<?php echo $this->Html->script(array('assets/jquery-1.10.1.min','landingscripts','assets/bootstrap','assets/prettify','assets/lightbox','assets/main','js2/pnotify/jquery.pnotify','js2/pnotify/jquery.pnotify.demo','jquery.validate')); ?>
</body>
</html>