<?php
$index=$this->Html->url(array("controller" => "games","action" =>"index"));
?>

                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        <!-- content-header -->
                        <div class="content-header">

                            <h2><i class="icofont-link"></i> Best Channels</h2>
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
                                        <li><a href="#">Recommend</a></li>
                                        <li><a href="#">New Channels</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Chained</a></li>
                                    </ul>
                                </li>

                            </ul><!--/breadcrumb-nav-->
                            
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="#"><i class="icofont-link"></i> Best Channels</a></li>
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        
                        <!-- content-body -->
                        <div class="content-body">



<?php
if($this->Session->check('Auth.User')){
?>

            <div class="well well-small">
                <div class="box-header corner-top">
                <div class="header-control">
                <button data-box="close" data-hide="fadeOut" class="close">&times;</button> 
                </div>   
            </div>
              <h1>Game Channels Created by Users</h1>
              <p>Create your own game channel or Find a good channel you like and follow them to get the latest news and games from them.</p>
              <p>
                <a class="btn btn-success btn-large">
                  <i class="elusive-compass"></i>  Take the Tour
                </a>
              </p>
            </div>

<?php
}else{
?>


            <div class="alert alert-info">
                <div class="box-header corner-top">
                <div class="header-control">
                <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
                </div>
                
            </div>
              <h4>Join Toork For Free</h4>
              <p>If you join Toork, you will be able to create your own game channel and let people play games you share on your channel. See the benefits below.</p>
                <ul>
                    <li>Create your own game channel</li>
                    <li>Your special dashboard that knows what you want</li>
                    <li>Collect the games you love</li>
                    <li>Add new games</li>
                    <li>Follow other channels</li>
                    <li>All you need for online games</li>
                </ul>
              <p>
                <a href="<?php echo $index ?>" class="btn btn-danger">
                  <i class="elusive-user"></i> Join Toork
                </a>
              </p>
            </div>


<?php
}
?>

<ul class="thumbnails">

<?php  echo $this->element('NewPanel/bestchannel_box'); ?>

</ul>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->