<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="background-color:#e5e5e5; padding-top:15px;">
   
<?php  
$channelimage=$this->Upload->image($channeldata,'User.picture',array(),array('class'=>'img-polaroid', 'width'=>'70px','onerror'=>'imgError(this,"avatar");'));
$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
$channelurl=$this->Html->url(array("controller"=> h($channeldata['User']['seo_username'])));
$publicuser=$user;
$userid=$user['User']['id'];
?>
<?php if($user['User']['banner']==null) { ?>
<div class="well well-small shadow-black" style=" padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* FF 3.6+ */  
">
<?php } else { ?>
<div class="well well-small shadow-black" style=" padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>); /* FF 3.6+ */  
">
<?php } ?>
<div class="row-fluid" style="margin-bottom:10px;" >
    <div class="span2">    
        <div class="thumbnails">
            <a href="<?php echo $channelurl; ?>">
            <?php echo $channelimage; ?>
            </a>
          
        </div>

    </div>

</div>

</div>


                            <div class="row-fluid">
            <div class="navbar span5">
              <div class="navbar-inner">
                </br>
                
                    <textarea name="message" id="update" class="span12" rows="4"  placeholder="What do you want to share?"></textarea>
                 </br>
                <div class="helper-font-16">
                          
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

                            <p>Just copy/paste a youtube or vimeo link ex: <strong>http://www.youtube.com/watch?v=bNNzRyd1xz0</strong></p>
                            </div>

                            <div id="imageupload5" class="border" style="display:none;">

                            <p>Just copy/paste the link you want to share ex: <strong>http://toork.com</strong></p>
                            </div>

                    <hr size="3" style="margin:0px 0px 5px 0px;">
                  <button type="submit" class="btn btn-inverse pull-right update_data" style="margin:0px 0px 0px 0px;">Publish</button>
                </form></br></br>
              </div>
              <div>
                <ul style="background-color:white; padding:10px; margin:15px 0px 0px 0px;" class="span12 shadow well nav nav-pills">
                    <!--tab menus-->
                    <li class="active"><a data-toggle="tab" href="#new-feeds"><i class="elusive-bell"></i> My Notifications</a></li>
                    <!--/tab menus-->
                </ul>

                <?php echo $this->element('NewPanel/load_my_notifications');?>

            </div>

            </div>


                            <!-- tab resume content -->
                     
                                <!-- tab resume update -->
                                <div class="span7">
                                    <div>
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">

                                            </div>
                                            <ul style="background-color:white; margin:0px;" class="shadow well nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#new-feeds">What's New</a></li>
                                                <li><a data-toggle="tab" href="#my-feeds">My Feeds</a></li>
												<!--/tab menus-->
                                            </ul>
                                        </div>
                                        <div class="box-body" style="margin:-20px 0px 0px 0px;">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="new-feeds">
                                                   
												   
												    

										<div id="content"></div>			
												
					                       <?php echo $this->element('NewPanel/load_mess_boot');?>
						
                                                </div>
                                                            
															                                        
                                                <div class="tab-pane fade" id="my-feeds">
                                                   
												   
												   <div id="my_more_content"></div>			
					                       <?php echo $this->element('NewPanel/load_my_feeds');?>
                                   
                                                </div>
                                                <div class="tab-pane fade" id="recent-comments">
                                                    
                                                   
                                                    
                                                    <a href="#" class="btn btn-small btn-link pull-right">View all &rarr;</a>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div><!--/box-body-->
                                    </div><!--/box-tab-->
                                </div><!-- tab resume update -->

                            </div><!-- tab stat -->
                            
                            
                            <!--/dashboar-->
                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->