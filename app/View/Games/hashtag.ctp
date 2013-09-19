<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="background-color:#e5e5e5; padding-top:15px;">
   
<?php  
$channelimage=$this->Upload->image($user,'User.picture',array(),array('class'=>'img-polaroid', 'width'=>'70px','onerror'=>'imgError(this,"avatar");'));
$channelurl=$this->Html->url(array("controller"=> h($user['User']['seo_username'])));
$publicuser=$user;
$userid=$user['User']['id'];
?>

<div class="well well-small shadow-black" style=" padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/toork-social-wall.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/toork-social-wall.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/toork-social-wall.jpg); /* FF 3.6+ */  
">


<div class="row-fluid" style="margin-bottom:10px;" >
    <div class="span2">    
        <div class="thumbnails">
            <a href="<?php echo $channelurl; ?>">
            <?php echo $channelimage; ?>
            </a>
            <h4 style="margin-bottom:2px; font-family: 'Merriweather Sans', sans-serif; font-size: 20px; color:white; text-shadow: 1px 1px black;">#AngryBirds</h4>
        </div>

    </div>
    <div class="helper-font-16 span6 pull-right">
        <div class="pull-right">
    <a href="#" class="tag">#angryboys</a>
    <a href="#" class="tag">#angrychickens</a>
    <a href="#" class="tag">#angrysonic</a>
    <a href="#" class="tag">#angrybirdsstarwars2</a>
    <a href="#" class="tag">#angrynews</a>
    <a href="#" class="tag">#angrymetalslug</a>
    <a href="#" class="tag">#metalslug</a>
    <a href="#" class="tag">#papermario</a>
    <a href="#" class="tag">#SuperMario</a>
    <a href="#" class="tag">#NinjaTurtles</a>
        </div>
    </div>


</div>

</div>


                            <div class="row-fluid">


              <div class="span5">
                <ul style="background-color:white; padding:10px; margin:0px 0px 0px 0px;" class="span12 shadow well nav nav-pills">
                    <!--tab menus-->
                    <li class="active"><a data-toggle="tab" href="#new-feeds"><i class="elusive-bullhorn color-gold"></i> Game Activities</a></li>
                    <!--/tab menus-->
                </ul>

                <!-- Games Activities <?php echo $this->element('NewPanel/load_my_notifications2');?> -->

            </div>



                            <!-- tab resume content -->
                     
                                <!-- tab resume update -->
                                <div class="span7">
                                    <div>
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">

                                            </div>
                                            <ul style="background-color:white; padding:10px; margin:0px;" class="shadow well nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#new-feeds">#Angrybirds</a></li>
                                                <li><a data-toggle="tab" href="#my-feeds">#AngryChickens</a></li>
                                                <li><a data-toggle="tab" href="#my-feeds">#AngryBirdsStarWars2</a></li>
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