                                <div class="span6" style="margin-left:0px; margin-right:10px;">
                                    <div>
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">

                                            </div>
                                            <ul style="background-color:white; margin:0px; padding:10px;" class="shadow well nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#new-feeds">What's New</a></li>
												<!--/tab menus-->
                                            </ul>
                                        </div>
                                        <div class="box-body" style="margin:-20px 0px 0px 0px;">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content span">
                                                <div class="tab-pane fade in active" id="new-feeds">
                                                   
												   
												    

										<div id="content"></div>			
												
					                       <?php echo $this->element('NewPanel/load_mess_boot');?>
						
                                                </div>

                                            </div><!--/widgets-tab-body-->
                                        </div><!--/box-body-->
                                    </div><!--/box-tab-->
                                </div><!-- tab resume update -->