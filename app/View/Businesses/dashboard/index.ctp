<?php
$ads_management = $this->Html->url(array('controller' => 'businesses', 'action' => 'ads_management'));
$mygames = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
$explorechannels = $this->Html->url(array('controller' => 'businesses', 'action' => 'explorechannels'));
?>
<body id="dashboard">
<div id="wrapper">
    <?php echo $this->element('business/dashboard/sidebar', array('active' => 'dashboard')); ?>
    <div id="content">
        <div class="menubar">
            <div class="sidebar-toggler visible-xs">
                <i class="ion-navicon"></i>
            </div>
            <div class="page-title">
                Dashboard
            </div>
            <div class="pull-right hidden-xs">
                <a href="<?php echo $mygames; ?>" class="btn btn-warning"><i class="fa fa-gamepad"></i> Game Management</a>
                <a href="<?php echo $ads_management; ?>" class="btn btn-danger"><i class="fa fa-bar-chart-o"></i> Ads Management</a>
                <a href="<?php echo $explorechannels; ?>" class="btn btn-info"><i class="ion-person-add"></i> Explore Channels</a>
            </div>
            <!--
            <div class="period-select hidden-xs">
                <form class="input-daterange ">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </span>
                        <input name="start" type="text" class="form-control datepicker" placeholder="02/27/2014" />
                    </div>

                    <p class="pull-left">to</p>

                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </span>
                        <input name="end" type="text" class="form-control datepicker" placeholder="02/27/2014" />
                    </div>
                </form> 
            </div>
            -->
        </div>
        <div class="content-wrapper">
            <div class="metrics clearfix">
                <div class="metric">
                    <span class="field">Total Reputation</span>
                    <span class="data">$<?php echo $stat['Userstat']['potential'] / 100; ?></span>
                </div>
                <div class="metric">
                    <span class="field">Total Followers</span>
                    <span class="data"><?php echo $stat['Userstat']['subscribeto']; ?></span>
                </div>
                <div class="metric">
                    <span class="field">Game Clones</span>
                    <span class="data"><?php echo $stat['Userstat']['uploadcount']; ?></span>
                </div>
                <div class="metric">
                    <span class="field">Game Plays</span>
                    <span class="data"><?php echo $stat['Userstat']['playcount']; ?></span>
                </div>
            </div>
            <div class="container-fluid">
                <hr class="">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div style="padding:40px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/users/2/gamebackground7_toork_original.gif)" class="panel-heading">
                            </div>
                            <a href="#">
                                <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive center-block avatar img-thumbnail img-circle" style="margin-top:-40px; width:80px; height:80px;">
                            </a>
                            <div class="panel-body">
                                <div style="margin-top:-10px;" class="text-center">
                                    <a class="btn btn-info"><i class="ion-person-add"></i> Follow</a>
                                </div>
                                <h4><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span> <strong>Socialesman</strong> <br> <small>@socialesman</small></h4>
                                <span class="label label-warning">148 Followers</span>
                                <span class="label label-danger">28 Games</span>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6792/super_mario_bros_3_by_ggrock70-d36fqni_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Super Mario Bros 3">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/168/toork_Kamikaze_Pigs_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Kamikaze Pigs">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6954/67444675_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Robots Wars">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div style="padding:40px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/users/6/rsz_1how_to_play_pool1_original.png)" class="panel-heading">
                            </div>
                            <a href="#">
                                <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/6/184532_292173477569836_806612665_n_1_original.jpg" class="img-responsive center-block avatar img-thumbnail img-circle" style="margin-top:-40px; width:80px; height:80px;">
                            </a>
                            <div class="panel-body">
                                <div style="margin-top:-10px;" class="text-center">
                                    <a class="btn btn-default"><i class="ion-person-add"></i> unfollow</a>
                                </div>
                                <h4><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span> <strong>MiniClip Games</strong> <br> <small>@miniclip</small></h4>
                                <span class="label label-warning">215 Followers</span>
                                <span class="label label-danger">59 Games</span>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6792/super_mario_bros_3_by_ggrock70-d36fqni_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Super Mario Bros 3">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/168/toork_Kamikaze_Pigs_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Kamikaze Pigs">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6954/67444675_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Robots Wars">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div style="padding:40px; background-color:#F7819F;" class="panel-heading">
                            </div>
                            <a href="#">
                                <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive center-block avatar img-thumbnail img-circle" style="margin-top:-40px; width:80px; height:80px;">
                            </a>
                            <div class="panel-body">
                                <div style="margin-top:-10px;" class="text-center">
                                    <a class="btn btn-info"><i class="ion-person-add"></i> Follow</a>
                                </div>
                                <h4><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span> <strong>Socialesman</strong> <br> <small>@socialesman</small></h4>
                                <span class="label label-warning">148 Followers</span>
                                <span class="label label-danger">28 Games</span>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6792/super_mario_bros_3_by_ggrock70-d36fqni_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Super Mario Bros 3">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/168/toork_Kamikaze_Pigs_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Kamikaze Pigs">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6954/67444675_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Robots Wars">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div style="padding:40px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/users/2/gamebackground7_toork_original.gif)" class="panel-heading">
                            </div>
                            <a href="#">
                                <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive center-block avatar img-thumbnail img-circle" style="margin-top:-40px; width:80px; height:80px;">
                            </a>
                            <div class="panel-body">
                                <div style="margin-top:-10px;" class="text-center">
                                    <a class="btn btn-info"><i class="ion-person-add"></i> Follow</a>
                                </div>
                                <h4><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span> <strong>Socialesman</strong> <br> <small>@socialesman</small></h4>
                                <span class="label label-warning">148 Followers</span>
                                <span class="label label-danger">28 Games</span>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6792/super_mario_bros_3_by_ggrock70-d36fqni_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Super Mario Bros 3">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/168/toork_Kamikaze_Pigs_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Kamikaze Pigs">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6954/67444675_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Robots Wars">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div style="padding:40px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/users/6/rsz_1how_to_play_pool1_original.png)" class="panel-heading">
                            </div>
                            <a href="#">
                                <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/6/184532_292173477569836_806612665_n_1_original.jpg" class="img-responsive center-block avatar img-thumbnail img-circle" style="margin-top:-40px; width:80px; height:80px;">
                            </a>
                            <div class="panel-body">
                                <div style="margin-top:-10px;" class="text-center">
                                    <a class="btn btn-default"><i class="ion-person-add"></i> unfollow</a>
                                </div>
                                <h4><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span> <strong>MiniClip Games</strong> <br> <small>@miniclip</small></h4>
                                <span class="label label-warning">215 Followers</span>
                                <span class="label label-danger">59 Games</span>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6792/super_mario_bros_3_by_ggrock70-d36fqni_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Super Mario Bros 3">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/168/toork_Kamikaze_Pigs_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Kamikaze Pigs">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6954/67444675_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Robots Wars">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div style="padding:40px; background-color:#F7819F;" class="panel-heading">
                            </div>
                            <a href="#">
                                <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive center-block avatar img-thumbnail img-circle" style="margin-top:-40px; width:80px; height:80px;">
                            </a>
                            <div class="panel-body">
                                <div style="margin-top:-10px;" class="text-center">
                                    <a class="btn btn-info"><i class="ion-person-add"></i> Follow</a>
                                </div>
                                <h4><span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span> <strong>Socialesman</strong> <br> <small>@socialesman</small></h4>
                                <span class="label label-warning">148 Followers</span>
                                <span class="label label-danger">28 Games</span>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6792/super_mario_bros_3_by_ggrock70-d36fqni_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Super Mario Bros 3">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/168/toork_Kamikaze_Pigs_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Kamikaze Pigs">
                                    </a>
                                    <a href="#" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6954/67444675_toorksize.png" width="100%" data-toggle="tooltip" data-placement="bottom" data-original-title="Robots Wars">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>