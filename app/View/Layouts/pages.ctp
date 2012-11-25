<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="http://toork.com/favicon.ico" type="image/x-icon" />
<!-- Include external files and scripts here (See HTML helper for more info.) -->

<?php echo $scripts_for_layout?>

<?php
echo $this->Html->css(array('myStyle','demo','style2','faqStyles','buttons','monsterPos','monster'));
echo $this->Html->script(array('jquery.min','faqScript.js','monsterEngine'));
?>

<?php
echo $this->element('analytics');
?>

</head>
<body>

<?php echo $this->element('header');?>

<?php echo $content_for_layout?>

<?php echo $this->element('footer');?>

<?php echo $this->Facebook->init(); ?>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>