<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <title><?php echo $title_for_layout ?></title>
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
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
        <script>
            addplaycount = '<?php echo $this->Html->url(array('controller'=>'businesses','action'=>'add_playcount')); ?>';
        </script>
        <?php 
        if(!empty($channel_style['User']['bg_color'])) {
            $bg_color = $channel_style['User']['bg_color'];
        } else {
            $bg_color = '##BFC7D8';
        } 

        if(!empty($channel_style['User']['bg_image'])) {
            $bg_image = Configure::read('S3.url') . '/upload/users/' . $active_channel_id . '/' . $channel_style['User']['bg_image'];
        } else {
            $bg_image = '';
        }  

        $customcss =
        '<style type="text/css">
            #content, .snap-content {
                background-color: ' . $bg_color . ';
                background-image: url("' . $bg_image . '");
                background-repeat: repeat;
            }
        </style>';
        
        echo $customcss;
        ?>
    </head>
    <body>
        <?php echo $content_for_layout ?>
        <?php echo $this->Html->script(array('mobile/snap')); ?>
        <script type="text/javascript">
            var snapper = new Snap({
                element: document.getElementById('content'),
                disable: 'right'
            });
            setTimeout(function() {
                window.scrollTo(0, 1);
            }, 0);
        </script>
        <?php echo $this->Html->script(array('assets/jquery-1.10.1.min.js', 'mobile/demo', 'mobile/custom')); ?>
        <?php echo $this->Html->script(array('business/custom')); ?>
        <?php
        if (isset($game['Game']['id'])) {
            $game_id = $game['Game']['id'];
        }
        ?>
        <script>
            toorksize = '<?php echo Configure::read('broken.toorksize'); ?>';
            avatar = '<?php echo Configure::read('broken.avatar'); ?>';
            s3patch = '<?php echo Configure::read('S3.url'); ?>';
            favswitcher = '<?php echo $this->Html->url(array('controller' => 'favorites', 'action' => 'add')); ?>';
            chaingame = '<?php echo $this->Html->url(array('controller' => 'games', 'action' => 'clonegame')); ?>';
            <?php if (isset($game_id)) { ?>
                game_id = '<?php $game_id; ?>';
            <?php } ?>
        </script>
        <script>
            !function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "https://platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            }(document, "script", "twitter-wjs");
        </script> 
        <?php if ($user['User']['analitics'] != '0' && $user['User']['analitics'] != NULL) { ?>
            <!--++++++++++++++++++++++++++++++++++++++++++++-->
            <!--======Analitic code for channel owner=======-->
            <!--++++++++++++++++++++++++++++++++++++++++++++-->
            <script type="text/javascript">
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', '<?php echo $user['User']['analitics']; ?>']);
                _gaq.push(['_trackPageview']);
                (function() {
                    var ga = document.createElement('script');
                    ga.type = 'text/javascript';
                    ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(ga, s);
                })();
            </script>
            <!--++++++++++++++++++++++++++++++++++++++++++++-->
            <!--=======//Analitic code for channel owner======-->
            <!--++++++++++++++++++++++++++++++++++++++++++++-->
        <?php } ?>
    </body>
</html>
