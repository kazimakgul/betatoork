<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
   
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
            <h4 style="margin-bottom:2px; font-family: 'Merriweather Sans', sans-serif; font-size: 20px; color:white; text-shadow: 1px 1px black;">#<?php echo $hashtag; ?></h4>

<?php if(isset($tagActivities)) { 
//Generating Game Link Here
if($game['Game']['seo_url']!=NULL)
{
      if($game['Game']['embed']!=NULL)
      $playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'playgame'));
	  else
	  $playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'playframe'));
}
else{
    $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($game['Game']['id'])));
}
?>
    <a href="<?php echo $playurl; ?>" class="btn btn-block btn-success"><i class="elusive-play-alt"></i> Play Game</a>
<?php }else{ ?>

<?php } ?>            
        </div>

    </div>
    <div class="helper-font-16 span6 pull-right">
        <div class="pull-right">
	<?php $hashlink=$this->Html->url(array( "controller" => "games","action" =>"hashtag")); ?>	
	<?php foreach ($trends as $trend){ ?>
	<a href="<?php echo $hashlink.'/'.$trend['hashcount']['hashtag'] ?>" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#<?php echo $trend['hashcount']['hashtag']; ?></a>
	<?php } ?>
	<!--	
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#angryboys</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#angrychickens</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#angrysonic</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#angrybirdsstarwars2</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#angrynews</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#angrymetalslug</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#metalslug</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#papermario</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#SuperMario</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#NinjaTurtles</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#angryboys</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#angrychickens</a>
    <a href="#" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#angrysonic</a>
    -->
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
<?php if(isset($tagActivities)) { ?>
   <?php if($tagActivities!=NULL) { ?>
<?php echo $this->element('NewPanel/load_my_tag_activity');?>
   <?php }else{ ?>
   Bu bir oyun ama activity yok
   <?php } ?>
<?php }else{ ?>
Bu bir oyun degil ise bu alana birseyler gelecek
<?php } ?>

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
                                                <li class="active"><a data-toggle="tab" href="#new-feeds">#<?php echo $hashtag; ?></a></li>
												<!--/tab menus-->
                                            </ul>
                                        </div>
                                        <div class="box-body" style="margin:-20px 0px 0px 0px;">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="new-feeds">
                                                   
												   
												    

										<div id="content"></div>			
												
					                       <?php echo $this->element('NewPanel/load_hashtag_feeds');?>
						
                                                </div>
                                                            
															                                        
                                                <div class="tab-pane fade" id="my-feeds">
                                                   
												   
												   <div id="my_more_content"></div>			
					                       <?php //echo $this->element('NewPanel/load_my_feeds');?>
                                   
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