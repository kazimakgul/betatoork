                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        <!-- content-header -->
                        <div class="content-header">
                            <ul class="content-header-action pull-right">
                                <li>
                                    <a href="#">
                                       
                                        <div class="action-text color-green">8765 <span class="helper-font-small color-silver-dark">Visits</span></div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                       
                                        <div class="action-text color-teal">1437 <span class="helper-font-small color-silver-dark">favorited</span></div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        
                                        <div class="action-text color-red">4367 <span class="helper-font-small color-silver-dark">Played</span></div>
                                    </a>
                                </li>
                            </ul>
                            <h2><i class="icofont-home"></i> Dashboard <small>welcome to toork</small></h2>
                        </div><!-- /content-header -->
                        
                        <!-- content-breadcrumb -->
                        <div class="content-breadcrumb">
                            <!--breadcrumb-nav-->
                            <ul class="breadcrumb-nav pull-right">
                                <li class="divider"></li>
                                <li class="btn-group">
                                    <a href="#" class="btn btn-small btn-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="icofont-tasks"></i> Sort
                                        <i class="icofont-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Recomend</a></li>
                                        <li><a href="#">Date</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Popular</a></li>
                                    </ul>
                                </li>
                            </ul><!--/breadcrumb-nav-->
                            
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icofont-home"></i> Dashboard</a> <span class="divider">&rsaquo;</span></li>
                                <li class="active">Data elements</li>
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        
                        <!-- content-body -->
                        <div class="content-body">
                            <!-- dashboard -->

                            <div class="well well-small">
                                    <div class="box-header corner-top">
                                            <div class="header-control">
                                            <button data-box="close" data-hide="fadeOut" class="close">×</button>
                                            </div>
                                            
                                    </div>
                                        <h3>Welcome to Toork</h3>
                                        <p>Create your own game channel. Find the best games and channels created by users.</p>
                                            <p>
                                            <a class="btn btn-info btn-large">
                                                <i class="elusive-compass"></i> Take The Tour
                                            </a>
                                            <a class="btn btn-success btn-large">
                                                <i class="elusive-plus-sign"></i> Follow Channels
                                            </a>

                                            </p>
                            </div>
                          
                             
                                <ul class="thumbnails">
                                    <?php  echo $this->element('NewPanel/dashboard_game_box'); ?>
                                </ul>

                            <!--/dashboard-->
                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->