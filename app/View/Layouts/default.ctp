<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- Include external files and scripts here (See HTML helper for more info.) -->

<?php echo $scripts_for_layout?>

<?php 
echo $this->Html->css(array('myStyle','gamebox','rating','game','demo','style2','buttons','cake.generic','monsterPos','monster')); 
echo $this->Html->script(array('jquery.min','monsterEngine'));
?>


<?php
echo $this->element('analytics');
?>

</head>
<body>

<?php echo $this->element('header');?>
<br>
<?php 
echo $this->Session->flash('flash', array('element' => 'info'));
echo $this->Session->flash('auth', array('element' => 'info'));
?>
<?php echo $content_for_layout?>

<?php echo $this->element('footer');?>


</body>
</html>