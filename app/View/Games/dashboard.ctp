<?php 
$bestchannels=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));
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
<div class="row-fluid">
                            <div class="well well-small span4">
                                    <div class="box-header corner-top">
                                            <div class="header-control">
                                            <button data-box="close" data-hide="fadeOut" class="close">×</button>
                                            </div>
                                            
                                    </div>
                                        <h3>Welcome to Toork</h3>
                                        <p>Create your own game channel. Find the best games and channels created by users. Enjoy exploring toork.</p>
                                            <p>
                                            <a rel="tooltip" data-placement="top" data-original-title="take the tour"  class="btn btn-info">
                                                <i class="elusive-compass"></i> Tour
                                            </a>
                                            <a rel="tooltip" data-placement="top" data-original-title="Follow Best Channels"  href="<?php echo $bestchannels; ?>" class="btn btn-success">
                                                <i class="elusive-plus-sign"></i> Follow Channels
                                            </a>

                                            </p>
                            </div>


            <div class="navbar span8">
              <div class="navbar-inner">
                </br>
                <form class="navbar-form">
                    <div class="row-fluid">
                        <div class="span2">
                      <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('class'=>'img-polaroid','align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'61','onerror'=>'imgError(this,"avatar");')); }
  ?>                    </div>
                    <textarea name="message" id="update" class="span10 pull-right" rows="4"  placeholder="What do you want to share?"></textarea>
                </div>
                <div class="helper-font-16">
                          
                           <i rel="tooltip" data-placement="bottom" data-original-title="add image" href="javascript:void(0);"  id="camera2" class="elusive-camera"></i>
                           <i rel="tooltip" data-placement="bottom" data-original-title="add game" href="javascript:void(0);"  id="camera2" class="elusive-plus-sign"></i>
                            <i rel="tooltip" data-placement="bottom" data-original-title="add video" href="javascript:void(0);"  id="camera2" class="elusive-youtube"></i>
                            <i rel="tooltip" data-placement="bottom" data-original-title="add link" href="javascript:void(0);"  id="camera2" class="icofont-link"></i>       
                </div>
                
                            <!-ImageUploadPanel-><div id="imageupload" class="border" style="display:none;">
                            <?php $image_ajax_url= $this->Html->url(array('controller'=>'Wallentries','action'=>'image_ajax'));?>
                            <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo $image_ajax_url; ?>'> 
                            <div id='preview'></div>
                            <span id='addphoto'>Add Photo:</span> <input type="file" name="photoimg" id="photoimg" />
                            <input type='hidden' id='uploadvalues' />
                            </form>
                            </div><!-ImageUploadPanel-> 
                    <hr size="3" style="margin:0px 0px 5px 0px;">
                  <button id="success-post" type="submit" class="btn btn-inverse pull-right update_data">Share</button>
                </form></br></br>
              </div>
            </div>

</div>      
                             
                                <ul class="thumbnails">
                                    <?php  echo $this->element('NewPanel/dashboard_game_box'); ?>
                                </ul>

                            <!--/dashboard-->
                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->