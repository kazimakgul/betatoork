<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />	
        <title><?php echo $title_for_layout ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="http://code.ionicframework.com/ionicons/1.4.1/css/ionicons.min.css" rel="stylesheet">
        <?php
        echo $this->Html->css(array(
            'business/dashboard/compiled/theme.css',
            'business/dashboard/vendor/animate.css',
            'business/dashboard/vendor/brankic.css',
            'business/dashboard/css/vendor/datepicker.css',
            'business/dashboard/css/vendor/morris.css',
            'business/dashboard/custom.css'
        ));
        ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <?php
        echo $this->Html->script(array(
            'business/dashboard/bootstrap/bootstrap.min.js',
            'business/dashboard/vendor/jquery.cookie.js',
            'business/dashboard/vendor/moment.min.js',
            'business/dashboard/theme.js',
            'business/dashboard/vendor/bootstrap-datepicker.js',
            'business/dashboard/vendor/raphael-min.js',
            'business/dashboard/vendor/morris.min.js',
            'business/dashboard/vendor/jquery.flot/jquery.flot.js',
            'business/dashboard/vendor/jquery.flot/jquery.flot.time.js',
            'business/dashboard/vendor/jquery.flot/jquery.flot.tooltip.js'
        ));
        ?>
        <script>
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
    <?php echo $content_for_layout ?>
</html>