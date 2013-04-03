<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        <!-- content-header -->
                        <div class="content-header">
                            <h2><i class="icofont-link"></i> Following Channels</h2>
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
                                <li><a href="#"><i class="icofont-link"></i> Follows</a> </li>
                                
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        
                        <!-- content-body -->
                        <div class="content-body">

<div class="well well-small">
    <div class="box-header corner-top">
                                            <div class="header-control">
                                            <button data-box="close" data-hide="fadeOut" class="close">&times;</button> 
                                            </div>
                                            
                                        </div>
  <h1>Follow Best Channels</h1>
  <p>Find a good channel you like and follow them to get the latest news and games from them.</p>
  <p>
    <a href="<?php echo $bestchannel; ?>" class="btn btn-success btn-large">
      <i class="elusive-plus-sign"></i> Follow Channels
    </a>
  </p>
</div>

<ul class="thumbnails">

<?php  echo $this->element('NewPanel/mychains_box'); ?>

</ul>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->