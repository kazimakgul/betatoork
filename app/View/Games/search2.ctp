<?php 
$addgame=$this->Html->url(array("controller" => "games","action" =>"add2"));
$toprated=$this->Html->url(array("controller" => "games","action" =>"toprated2"));
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        <!-- content-header -->
                        <div class="content-header">
                            <ul class="content-header-action pull-right">
                                <li>
                                    <a href="#">
                                        <div class="badge-circle grd-green color-white"><i class="icofont-plus-sign"></i></div>
                                        <div class="action-text color-green">8765 <span class="helper-font-small color-silver-dark">Visits</span></div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div class="badge-circle grd-teal color-white"><i class="icofont-user-md"></i></div>
                                        <div class="action-text color-teal">1437 <span class="helper-font-small color-silver-dark">Users</span></div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <div class="badge-circle grd-orange color-white">$</div>
                                        <div class="action-text color-orange">4367 <span class="helper-font-small color-silver-dark">Orders</span></div>
                                    </a>
                                </li>
                            </ul>
                            <h2><i class="icofont-umbrella"></i> Search Results</h2>
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
                                        <li><a href="#">Date</a></li>
                                        <li><a href="#">Rating</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Played</a></li>
                                    </ul>
                                </li>
                            </ul><!--/breadcrumb-nav-->
                            
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icofont-home"></i> Dashboard</a> <span class="divider">&rsaquo;</span></li>
                                <li><a href="interface.html">Search</a> <span class="divider">&rsaquo;</span></li>
                                <li class="active">Data elements</li>
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        
                        <!-- content-body -->
                        <div class="content-body">


                  <?php if(count($search) >= 1){ ?>
<ul class="thumbnails">

<?php  echo $this->element('NewPanel/search_game_box'); ?>

</ul>
                  <?php }else{ ?>
				  
				  <div class="alert alert-info channel"><p><strong>The game you are searching is not added yet, you can add this game after you become a member or Search our custom Toork search engine powered by Google to find your loved games...</strong></p></br>


                    <a href="<?php echo $addgame ?>" class="btn btn-danger"><i class="elusive-plus-sign"></i> Add Game</a>
                    <a href="<?php echo $toprated; ?>" class="btn btn-info"><i class="elusive-compass"></i> Explore Games</a>


                </div>
                <?php }?>

<?php echo $this->element('googleSearch'); ?>

                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->