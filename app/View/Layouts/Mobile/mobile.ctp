<!DOCTYPE HTML>
<html lang="en-US">
    <head>
    <title><?php echo $title_for_layout ?></title>
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">




    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

        <!-- FontAwsome fonts -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


            <?php echo $this->Html->css(array('mobile/snap', 'mobile/demo', 'mobile/bootstrap-social', 'mobile/custom')); ?>


            <?php
            /*
              if($channel_style['User']['bg_color']!=NULL)
              $bg_color=$channel_style['User']['bg_color'];
              else
              $bg_color='#ffffff';

              if($channel_style['User']['bg_image']!=NULL)
              $bg_image=Configure::read('S3.url').'/upload/users/'.$active_channel_id.'/'.$channel_style['User']['bg_image'];
              else
              $bg_image='';

              $customcss='<style type="text/css"> #toolbar {
              background-color: '.$bg_color.';
              border-bottom: 1px solid '.$color_darker.';
              }
              .snap-drawer {
              background-color: '.$bg_color.';
              }
              #content {
              background-color: '.$color_lighter.';
              } </style>';
             */
            ?>

            <!--We Add User Selected Addtitional Css Here(begins) -->
            <?php //echo $customcss;   ?>
            <!--We Add User Selected Addtitional Css Here(ends) -->

            </head>
            <body>


                <?php echo $content_for_layout ?>



                <?php echo $this->Html->script(array('mobile/snap')); ?>

            <script type="text/javascript">
                var snapper = new Snap({
                    element: document.getElementById('content'),
                    disable: 'right'
                });

            </script>
            <?php echo $this->Html->script(array('assets/jquery-1.10.1.min.js', 'mobile/demo', 'mobile/custom')); ?>
            <?php echo $this->Html->script(array('business/custom')); ?>
            <?php $game_id = $game['Game']['id']; ?>
            <script>
                toorksize = '<?php echo Configure::read('broken.toorksize'); ?>';
                avatar = '<?php echo Configure::read('broken.avatar'); ?>';
                s3patch = '<?php echo Configure::read('S3.url'); ?>';
                favswitcher = '<?php echo $this->Html->url(array('controller' => 'favorites', 'action' => 'add')); ?>';
                chaingame = '<?php echo $this->Html->url(array('controller' => 'games', 'action' => 'clonegame')); ?>';
                game_id = '<?= $game_id ?>';
            </script>
            <script>!function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>     
            </body>
            </html>
