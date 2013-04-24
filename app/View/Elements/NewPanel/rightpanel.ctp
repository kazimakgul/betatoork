                <!-- span side-right -->
                <div class="span2">
                    <!-- side-right -->
                    <aside class="side-right">
                        <!-- sidebar-right -->
                        <div class="sidebar-right">

                            <!--sidebar-right-control-->
                            <div class="sidebar-right-control">
                                <ul class="sr-control-item">
                                    <li class="active"><a href="#contact" rel="tooltip" data-placement="bottom" data-original-title="Best Channels" data-toggle="tab" title="Best Channels"><i class="icofont-group"></i></a></li>
                                    <li><a href="#alt1" rel="tooltip" data-placement="bottom" data-original-title="Categories" data-toggle="tab" title="Categories"><i class="icofont-flag"></i></a></li>
                                </ul>
                            </div><!-- /sidebar-right-control-->
                            <!-- sidebar-right-content -->
                            <div class="sidebar-right-content">
                                <div class="tab-content">
                                    
                                    <!--contact-->
                                    <div class="tab-pane fade active in" id="contact">
                                        <div class="side-contact" data-step="3" data-position="bottom" data-intro="This is your recommendation corner where you will find amazing game channels created by our members like you. Just click on plus button so follow any channel so you will be notified">
                                            <!--contact-control-->
                                            <div class="contact-control">

                                                <h5><i class="elusive-user color-blue"></i> <a href="<?php echo $bestchannels; ?>">Best Channels</a></h5>
                                            </div><!--/contact-control-->
                                         
										 <!--bestchannel-list-->
										 <ul class="contact-list">
                                           

                                <?php  echo $this->element('NewPanel/recommend_channel_box3'); ?>

                                   </ul><!--/bestchannel-list-->
								   
                                        </div>
                                    </div><!--/contact-->

<div class="tab-pane fade" id="alt1">
                                            <div class="side-contact">
                                            <!--contact-control-->
                                            <div class="contact-control">

                                                <h5><i class="icofont-flag color-red"></i> <a href="<?php echo $bestchannels; ?>">Categories</a></h5>
                                            </div><!--/contact-control-->
                                         
                                         <!--bestchannel-list-->
                                         <ul class="contact-list">
                                           

                                <?php  echo $this->element('NewPanel/category_box'); ?>

                                   </ul><!--/bestchannel-list-->
                                   
                                        </div>

                                       
                       
                                        
                                    </div>

                                </div>
                            </div><!-- /sidebar-right-content -->
                        </div><!-- /sidebar-right -->
                    </aside><!-- /side-right -->
                </div><!-- /span side-right -->