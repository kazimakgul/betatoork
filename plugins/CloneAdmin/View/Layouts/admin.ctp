<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />	
        <title><?php echo $title_for_layout; ?></title>
        <meta name="description" content="<?php echo $description_for_layout; ?>">
        <meta name="author" content="<?php echo $author_for_layout; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php
        echo $this->Html->css(array(
            'http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
            'http://code.ionicframework.com/ionicons/1.4.1/css/ionicons.min.css',
            'business/dashboard/compiled/theme',
            'business/dashboard/vendor/bootstrap-switch.min',
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
            'business/dashboard/star-rating',
            'business/dashboard/vendor/messenger/messenger-theme-flat'
        ));
        echo $this->Html->script(array(
            'http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js',
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
            'business/dashboard/star-rating',
            'admins/channels',
            'admins/games',
            'business/dashboard/custom.js'
        ));
        ?>
        <script>
            var games_edit_post     = '<?php echo $this->Html->url(array('plugin'=>false,'controller' => 'admins', 'action' => 'games_edit_post')); ?>';
            var channels_edit_post  = '<?php echo $this->Html->url(array('plugin'=>false,'controller' => 'admins', 'action' => 'channels_edit_post')); ?>';
            var add_mapping         = '<?php echo $this->Html->url(array('plugin'=>false,'controller' => 'businesses', 'action' => 'add_mapping')); ?>';
            var remove_mapping      = '<?php echo $this->Html->url(array('plugin'=>false,'controller' => 'businesses', 'action' => 'remove_mapping')); ?>';
            

        </script>
        <script>
            var toorksize   =   'https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png';
            var avatar      =   'https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_manchannelavatar_default.png';
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
    <body id="users">
        <div id="wrapper">
            <?php
            echo $this->element('sidebar', array('active' => NULL));
            echo $content_for_layout;
            ?>
        </div>
        <script type="text/javascript">
            $(function() {
                // User list checkboxes
                var $allUsers = $(".select-users input:checkbox");
                var $checkboxes = $("[name='select-user']");

                $allUsers.change(function() {
                    var checked = $allUsers.is(":checked");
                    if (checked) {
                        $checkboxes.prop("checked", "checked");
                        toggleBulkActions(checked, $checkboxes.length);
                    } else {
                        $checkboxes.prop("checked", "");
                        toggleBulkActions(checked, 0);
                    }
                });

                $checkboxes.change(function() {
                    var anyChecked = $(".user [name='select-user']:checked");
                    toggleBulkActions(anyChecked.length, anyChecked.length);
                });

                function toggleBulkActions(shouldShow, checkedCount) {
                    if (shouldShow) {
                        $(".users-list .header").hide();
                        $(".users-list .header.select-users").addClass("active").find(".total-checked").html("(" + checkedCount + " total users)");

                    } else {
                        $(".users-list .header").show();
                        $(".users-list .header.select-users").removeClass("active");
                    }
                }


                // Grid switcher
                $btns = $(".grid-view");
                $views = $(".users-view");

                $btns.click(function(e) {
                    e.preventDefault();
                    $btns.removeClass("active");
                    $(this).addClass("active");

                    $views.removeClass("active");

                    $(".users-grid").hide();
                    $(".users-list").hide();

                    $($(this).data("grid")).show();
                });
            })
        </script>
    </body>
</html>