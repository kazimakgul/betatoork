<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="http://toork.com/favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->

<?php echo $scripts_for_layout?>

<?php 
echo $this->Html->css(array('header','cake.generic')); 
echo $this->Html->script(array('jquery.min','jquery-ui-1.8.17.custom.min','jquery.cookie','jquery.fancybox-1.3.4.pack','jquery.lightbox_me','knockout-2.0.0','underscore','jquery.placeholder.min','jail','t_slider'));
?>


<?php
echo $this->element('analytics');
?>

</head>
<body>

<?php echo $this->element('header');?>
<br>
<?php 
echo $this->Session->flash();
echo $this->Session->flash('auth');
?>
<?php echo $content_for_layout?>

<?php echo $this->element('footer');?>


</body>
</html>