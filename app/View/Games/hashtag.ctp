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

<!--Game Image-->

<!--/Game Image-->

<div class="row-fluid" style="margin-bottom:10px;" >
    <div class="span2">    
        <div class="thumbnails">
            
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
}?>
<a href="<?php echo $playurl; ?>">
<?php
echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('class'=>'img-polaroid','alt'=>$game['Game']['name'],'width'=>'200','height'=>'100','onerror'=>'imgError(this,"toorksize");')); 
}
else{?></a>
<a href="<?php echo $channelurl; ?>">
<?php
    echo $channelimage;
}
?> 
            </a>
            <h4 style="margin-bottom:2px; font-family: 'Merriweather Sans', sans-serif; font-size: 20px; color:white; text-shadow: 1px 1px black;">#<?php echo $hashtag; ?></h4>

<?php if(isset($tagActivities)) { 

?>
    <a href="<?php echo $playurl; ?>" class="btn btn-block btn-success"><i class="elusive-play-alt"></i> Play Game</a>
<?php }else{ ?>

<?php } ?>            
        </div>

    </div>
    <div class="helper-font-16 span6 pull-right">
        <div class="pull-right">

	<?php
	 if(isset($trends))
	 {
	 foreach ($trends as $trend){ 
        $hashlink=$this->Html->url(array( "controller" => "games","action" =>"hashtag",$trend['hashcount']['hashtag']));
	 ?>
	<a href="<?php echo $hashlink; ?>" style="padding-top:1px; padding-bottom:1px; float:right;" class="tag">#<?php echo $trend['hashcount']['hashtag']; ?></a>
	<?php } } ?>

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
        
        <div style="background-color:white; padding:20px; margin:15px 0px 0px 0px;" class="span12 shadow well">
        
                <h5 class="media-heading color-purple"><i class="elusive-upload"></i> Hit the play button to create the an activity</h5>
                <h6 class="media-heading"><i class="elusive-download-alt"></i> Use the rate bar at the game page</h6>
                <h4 class="media-heading color-red"><i class="elusive-heart"></i> Add this game to your favorites</h4>
                <h3 class="media-heading color-blue"><i class="elusive-tint"></i> Make a Clone!</h3>
                <h5 class="media-heading color-gold"><i class="elusive-star"></i> Rate this game please!</h5>
                <h4 class="media-heading color-green"><i class="elusive-comment"></i> Comment about the game!</h5>
                <h6 class="media-heading">Your activity will be published here</h6>
        </div>
              
   <?php } ?>
<?php }else{ ?>
                <div style="background-color:white; padding:20px; margin:15px 0px 0px 0px;" class="span12 shadow well">
                    <p class="alert alert-info"> <a class="bold">Beginners Guide For Hashtags</a><br>
Spaces are an absolute no-no. Even if your hashtag contains multiple words, group them all together. If you want to differentiate between words, use capitals instead <span class="label label-warning">#SuperMario</span>. Uppercase letters will not alter your search results, so searching for <span class="label label-warning">#SuperMario</span> will yield the same results as <span class="label label-warning">#supermario</span>.<br><br>

Numbers are supported, so publish about <span class="label label-warning">#50ShadesOfGrey</span> to your heart’s content. However, punctuation marks are not, so commas, periods, exclamation points, question marks and apostrophes are out. Forget about asterisks, ampersands or any other special characters.<br><br>

Keep in mind that the <span class="label label-warning">@</span> symbol does something completely different. Using <span class="label label-warning">@</span> before a channel name, it will create a mention about it, letting the channel owner know that you have written something about them. A hashtag will not. Sometimes users will hashtag a channel name instead of using their channel name. it is acceptable to post something like <span class="label label-warning">#clonemaster</span> or <span class="label label-warning">@clonemaster</span>. But if you are trying to reach the channel owner directly, don’t use a hashtag.<br><br>

One more thing about hashtags in toork which is completely different than other social networks is where if you hashtag a game will completely result in a different hashtag page, This new hashtag page is called <span class="label label-warning">gametag</span> page. This page includes the direct play button for the game and game activities are listed and more...<br><br>

There is no preset list of hashtags. Create a brand new hashtag simply by putting the hash before a series of words, and if it hasn't been used before, voilà! You've invented a hashtag.<a class="pull-right bold">"- Mashable -"</a>
                    </p>
                </div>
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