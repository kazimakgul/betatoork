<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="background-color:rgba(0,0,0,.05);  padding-top:15px;">
                            <!-- dashboar 

                    <div class="alert alert-danger">
                        <div class="box-header corner-top">
                            <div class="header-control">
                            <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
                            </div>
                            
                        </div>
                        <h4><i class="elusive-info-sign"></i> Follow More!</h4>
                        <p>There are thousands of new channels you will want to follow and you can create your own game community. Check these valuable channels.</p>
                        <a href="<?php echo $bestchannel; ?>" class="btn btn-danger">
                          <i class="elusive-plus-sign"></i> Follow Channels
                        </a>
                    </div> 
                    -->

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
              <div class="alert alert-info" style="margin:10px 0px 0px 0px;">
                <h4><i class="elusive-info-sign"></i> Congrats! Ready to go.</h4>
                <p>This is the place where you will get all the news about your channel and the channels you follow. </br>Your followers will hear about your shares so publish your first post and make them happy !</p>
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