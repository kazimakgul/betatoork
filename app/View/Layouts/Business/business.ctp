<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title><?php echo $title_for_layout?></title>
        <meta name="description" content= "<?php echo $description_for_layout?>" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <?php echo $this->Html->css(array('business/custom')); ?>
    </head>

    <body>

        <?php  echo $this->element('business/header'); ?>

        <?php echo $content_for_layout?>


        <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <?php echo $this->Html->script(array('business/custom','business/business')); ?>

        <script>
        toorksize='<?php echo Configure::read('broken.toorksize'); ?>';
        avatar='<?php echo Configure::read('broken.avatar'); ?>';
        s3patch='<?php echo Configure::read('S3.url'); ?>';
        </script>


    </body>
</html>
