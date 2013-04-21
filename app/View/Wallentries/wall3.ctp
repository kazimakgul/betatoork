                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
                            <!-- dashboar -->
                            <div class="row-fluid">
            <div class="navbar span4">
              <div class="navbar-inner">
                </br>
                <form class="navbar-form ">
                    <textarea name="message" id="update" class="span12" rows="4"  placeholder="What do you want to share?"></textarea>
                 </br>
                <div class="helper-font-16">
                          
                          <i rel="tooltip" data-placement="top" data-original-title="add image" href="javascript:void(0);"  id="camera2" class="elusive-camera"></i>
                            <i rel="tooltip" data-placement="top" data-original-title="add video" href="javascript:void(0);"  id="camera2" class="elusive-youtube"></i>
                            <i rel="tooltip" data-placement="top" data-original-title="add link" href="javascript:void(0);"  id="camera2" class="icofont-link"></i>       
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
                  <button type="submit" class="btn btn-inverse pull-right update_data" style="margin:0px 0px 0px 0px;">Publish</button>
                </form></br></br>
              </div>
            </div>


                            <!-- tab resume content -->
                     
                                <!-- tab resume update -->
                                <div class="span8">
                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a data-box="close" data-hide="rotateOutDownLeft">&times;</a>
                                            </div>
                                            <ul class="nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#new-feeds">What's New</a></li>
                                                <li><a data-toggle="tab" href="#my-feeds">My Feeds</a></li>
												<!--/tab menus-->
                                            </ul>
                                        </div>
                                        <div class="box-body">
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