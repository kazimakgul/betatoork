<?php 
$bestchannels=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$addGame=$this->Html->url(array("controller" => "games","action" =>"add3"));
$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
$wall=$this->Html->url(array("controller" => "wallentries","action" =>"wall3"));
$profilepublic=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>''));
$username = $user['User']['seo_username'];
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
                            <!-- dashboard -->

        <?php  echo $this->element('NewPanel/resendPassword'); ?>

<!--<i class="elusive-graph"></i> Your analytics are not active yet! You will be able to earn money via your channel soon.
<div class="row-fluid" style="opacity:0.3;">
    <div class="alert alert-info span3">
        <i class="elusive-thumbs-up helper-font-48"></i>
        <div class="pull-right ">
            <h2 style="margin:-8px 0px 0px 0px;">124</h2>
            <h4>Followers</h4>
        </div>
    </div>
    <div class="alert alert-info span3">
        <i class="elusive-group helper-font-48"></i>
        <div class="pull-right ">
            <h2 style="margin:-8px 0px 0px 0px;">1902</h2>
            <h4>Visitors</h4>
        </div>
    </div>
    <div class="alert alert-info span3">
        <i class="elusive-heart-alt helper-font-48"></i>
        <div class="pull-right ">
            <h2 style="margin:-8px 0px 0px 0px;">41</h2>
            <h4>Favorites</h4>
        </div>
    </div>
    <div class="alert alert-danger span3" style="padding:5px;">
        <h4>Your Channel Worth</h4>
        <div>
            <h2 style="margin:-3px 0px 0px 0px;">$7.15 <a rel="tooltip" data-placement="bottom" data-original-title="Not Active Yet"  class="btn btn-danger">Sell Now!</a> </h2>
        </div>
    </div>
</div> -->

<div class="row-fluid">
    <div class="navbar span6" data-intro="Share something amazing for your followers. You can also share videos and pictures." data-position="right">
        <div class="navbar-inner">
                </br>
                

            <div class="row-fluid">
                <div class="span2" rel="tooltip" data-placement="right" data-original-title="Change Your Avatar" style="margin-bottom:5px;"><a href="<?php echo $settings; ?>">
                    <?php 
                          if($user['User']['picture']==null) { 
                            echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'53','class'=>'img-polaroid',"alt" => "clone avatar image")); 
                            } else {
                              echo $this->Upload->image($user,'User.picture',array(),array('class'=>'img-polaroid','align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'53','onerror'=>'imgError(this,"avatar");')); }
                    ?>   
                </div> </a><div class="span10">
                    <textarea name="message" id="update" rows="3"  class="span12" placeholder="What do you want to share?"></textarea></div>
                </div>
                <div class="helper-font-24">
                           <i rel="tooltip" data-placement="top" data-original-title="add image" href="javascript:void(0);"  id="camera3" class="elusive-camera"></i>
                            <i rel="tooltip" data-placement="top" data-original-title="add video" href="javascript:void(0);"  id="camera4" class="elusive-youtube"></i>
                            <i rel="tooltip" data-placement="top" data-original-title="add link" href="javascript:void(0);"  id="camera5" class="icofont-link"></i>      
                </div>
                
                            <!-ImageUploadPanel-><div id="imageupload3" class="border" style="display:none;">
                            <?php $image_ajax_url= $this->Html->url(array('controller'=>'Wallentries','action'=>'image_ajax'));?>
                            <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo $image_ajax_url; ?>'> 
                            <div id='preview'></div>
                            <span id='addphoto'>Add Photo:</span> <input type="file" name="photoimg" id="photoimg" />
                            <input type='hidden' id='uploadvalues' />
                            </form>
                            </div><!-ImageUploadPanel->

                            <div id="imageupload4" class="border" style="display:none;">

                            <p>Just copy/paste a <strong class="color-red">youtube</strong> ,<strong class="color-green">vimeo</strong> or <strong class="color-blue">dailymotion</strong> link ex: <strong>http://www.youtube.com/watch?v=bNNzRyd1xz0</strong></p>
                            </div>

                            <div id="imageupload5" class="border" style="display:none;">

                            <p>Just copy/paste the link you want to share ex: <strong>http://clone.gs</strong></p>
                            </div>


                    <hr size="3" style="margin:0px 0px 5px 0px;">
                  <button id="success-post" type="submit" class="btn btn-inverse pull-right update_data" style="margin:0px 0px 0px 0px;">Publish</button>
                  <div><a class="btn btn-link btn-mini" href="<?php echo $wall; ?>">Whats New?</a><a class="btn btn-link btn-mini" href="<?php echo $profilepublic; ?>" rel="tooltip" data-placement="bottom" data-original-title="<?php echo 'http://clone.gs/'.$username?>">@<?php echo $username; ?></a></div>
                </br>
              </div>
            </div>

<!- start building starts>
        <div style="background-color:white;" class=" shadow alert alert-error span6">
                <div class="box-header corner-top">
                        <div class="header-control">
                        <button data-box="close" data-hide="fadeOut" class="close">×</button>
                        </div>
                        
                </div>
                    <h3 style="margin:0px;">Start Building!</h3>
                    <p>To start building your channel complete these steps.</p>
                        <p>
                        <a rel="tooltip" data-placement="top" data-original-title="Start Building" href="#modal-tutorial" data-toggle="modal" class="btn btn-info" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-play-circle"></i> Start
                        </a>
                         <a rel="tooltip" data-placement="top" data-original-title="Add a Game" href="<?php echo $addGame; ?>" class="btn btn-danger" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-plus"></i> Add Game
                        </a>
                         <a rel="tooltip" data-placement="top" data-original-title="Customize Your Channel" href="<?php echo $settings; ?>" class="btn btn-warning" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-edit"></i> Customize
                        </a>
                        <a rel="tooltip" data-placement="bottom" data-original-title="Follow Best Channels"  href="<?php echo $bestchannels; ?>" class="btn btn-success" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-plus-sign"></i> Discover Channels
                        </a>
                        <a rel="tooltip" data-placement="bottom" data-original-title="Take The Tour"  class="btn btn-custom-lighten" onclick="javascript:$('body').chardinJs('start');" style="margin:0px 3px 5px 0px;">
                            <i class="elusive-compass"></i> Tour
                        </a>
                        </p>
                        <p style="margin-bottom:0px;" ><i class="elusive-circle-arrow-down"></i> <small>We recommend you games upon your interests here.</small></p>
        </div>
        <?php  echo $this->element('NewPanel/tutorial'); ?>
        <?php  echo $this->element('NewPanel/tutorial2'); ?>

<!- start building ends>

</div>      
<hr style="margin-top:0px;">
<?php echo $this->element('NewPanel/dashboard/dashfeed');?>
                             
                                <ul class="thumbnails" id="thumbnails_area">
                                    <?php  echo $this->element('NewPanel/gamebox/dashboard_game_box'); ?>
                                </ul>
<div style="margin-bottom:30px;">
    <a id="loadmoregame" class="offset3 span6 btn btn-block loadertrig" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More</a>
	<!--Hidden Pagination -->
	<div class="paging" style="display:none;">
     <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
     echo $this->Paginator->numbers();
     echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
    </div>
    <!--Hidden Pagination -->
</div>    
                            <!--/dashboard-->
                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->