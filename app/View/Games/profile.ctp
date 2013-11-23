<?php
$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
$followerNumber = $publicuser['Userstat']['subscribeto']; 
$gameNumber = $publicuser['Userstat']['uploadcount'];
$favoriteNumber = $publicuser['Userstat']['favoritecount']; 
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">


<?php if($publicuser['User']['banner']==null) { ?>
<div class="well well-small shadow-black" style=" padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* FF 3.6+ */  
">
<?php } else { ?>
<div class="well well-small shadow-black" style=" padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>); /* FF 3.6+ */  
">
<?php } ?>
<div class="row-fluid">
    <div class="span12">
       <!-- <p class="pull-right badge" style="font-family: 'Merriweather Sans', sans-serif; font-size: 20px; color:white; text-shadow: 1px 1px black;">Worth: $3.12</p> -->       
        <div class="thumbnails">
            <a href="#">
                    <?php 
                    $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                      if($publicuser['User']['picture']==null) { 
                        echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'img-polaroid','width'=>'90',"alt" => "toork avatar image")); 
                        } else {
                          echo $this->Upload->image($publicuser,'User.picture',array(),array('class'=>'img-polaroid','width'=>'90','onerror'=>'imgError(this,"avatar");'));  }
                    ?>
            </a>
          
        </div>
<?php
$website=$publicuser['User']['website'];
?>        
        <h4 style="margin-bottom:2px; font-family: 'Merriweather Sans', sans-serif; font-size: 20px; color:white; text-shadow: 1px 1px black;"><?php echo $publicname?><?php echo $screenname?></h4>
<?php
if($website==NULL){


}else{
                    echo "<a target='_blank' rel='nofollow' class='btn btn-link' href='$website' style='padding:0px; font-family: Merriweather Sans, sans-serif; font-size: 12px; color:white; text-shadow: 1px 1px black;'>$website</a>";
}
?>
        <div class="row-fluid">
            <div class="span2">
			<?php if($follow==0){ ?>
                <a class="btn btn-block btn-success" id="follow_button" style="margin-top:6px;"  onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);">
                  <i class="elusive-plus-sign"></i> Follow
                </a> 
                <a class="btn btn-block" id="unFollow_button" style="display:none;" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'unFollow', '<?php echo $publicname?>']);">
                  <i class="elusive-remove-circle"></i> Unfollow
                </a> 
			<?php }else{ ?>
			
			<a class="btn btn-block btn-success" id="follow_button" style="display:none; margin-top: 6px;" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);">
                  <i class="elusive-plus-sign"></i> Follow
                </a> 
                <a class="btn btn-block" id="unFollow_button" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'unFollow', '<?php echo $publicname?>']);">
                  <i class="elusive-remove-circle"></i> Unfollow
                </a> 
			
			<?php } ?>
				
            </div> 
                <div class="span7"><p style="font-family: 'Merriweather Sans', sans-serif; font-size: 15px; color:white; text-shadow: 1px 1px black; margin-top:7px;">
                    <i class="helper-font-24 elusive-group color-blue"></i> <span id="flwnumber"><?php echo $followerNumber; ?></span> Followers 
                    <i class="helper-font-24 elusive-star-alt color-red"></i> <?php echo $gameNumber; ?> Games
                </p>
                </div>

                <div class="pull-right" style="margin-top:8px;">

<?php
$facebook=$publicuser['User']['fb_link'];
$twitter=$publicuser['User']['twitter_link'];
$gplus=$publicuser['User']['gplus_link'];
if($website==NULL){
                    echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-globe helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='$website' href='$website' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-globe color-red helper-font-24'></i>
                    </a>";
}
if($facebook==NULL){
                   echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-facebook helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                   echo "<a rel='tooltip' data-placement='bottom' data-original-title='Facebook Page' href='$facebook' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-facebook color-blue helper-font-24'></i>
                    </a>";
}
if($gplus==NULL){
                    echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-googleplus helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='Google+ Page' href='$gplus' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-googleplus color-red helper-font-24'></i>
                    </a>";
}
if($twitter==NULL){
                    echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-twitter helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='Twitter Page' href='$twitter' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-twitter color-blue helper-font-24'></i>
                    </a>";
}
?>


            </div>

        </div>
    </div>

    <i rel="tooltip" data-placement="right" data-original-title="Show Description" href="javascript:void(0);"  id="profileDesc" class="elusive-chevron-down"></i>

</div>    
    
    <div id="moveDesc" class="border" style="display:none;">
        <p style="background: rgba(255, 255, 255, 0.3);"><strong><?php echo $publicuser['User']['description'] ?></strong></p>
    </div>    

</div>


<!----Declare Channel Name For JavaScript Usage---->
  <!----=========================================---->
  <script>
  <?php if($this->Session->check('Auth.User') == 1){ ?>
  user_auth=1;
  <?php }else{?>
  user_auth=0;
  <?php }?>
  
  checkFollowStat='<?php echo $this->Html->url(array('controller'=>'subscriptions','action'=>'sub_check')); ?>';
  profile_id='<?php echo $userid; ?>';
  channelfavorite='<?php echo $this->Html->url(array('controller'=>'games','action'=>'channelfavorites')); ?>';
  channelfollowers='<?php echo $this->Html->url(array('controller'=>'games','action'=>'channelfollowers')); ?>';
  getprofilefeed='<?php echo $this->Html->url(array('controller'=>'games','action'=>'loadprofilefeeds')); ?>';
  getprofileactivity='<?php echo $this->Html->url(array('controller'=>'games','action'=>'getprofileactivity')); ?>';
  profilegames='<?php echo $this->Html->url(array('controller'=>'games','action'=>'profilegames')); ?>';
  </script>
  <!----=========================================---->


<div class="row-fluid">
        <!--span-->
         <div class="span12">
                                    <!--box tab-->
                                    <div >
                                        <div class="box-header corner-top">
                                            <ul class="nav nav-tabs" id="profile_tabs">
     
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#home_tab"><i class="elusive-home"></i> Home</a></li>
                                                <li class=""><a data-toggle="tab" href="#games_tab"><i class="elusive-user color-green"></i> Games - <small>(<?php echo $gameNumber; ?>)</small></a></li>
                                                <li class=""><a data-toggle="tab" href="#favorites_tab"><i class="elusive-heart color-red"></i> Favorites - <small>(<?php echo $favoriteNumber; ?>)</small></a></li>
                                                <li class=""><a data-toggle="tab" href="#news_tab"><i class="elusive-th-list color-purple"></i> News Feed</a></li>
                                                <li class=""><a data-toggle="tab" href="#followers_tab"><i class="elusive-group color-blue"></i> Followers - <small>(<?php echo $followerNumber; ?>)</small></a></li>
                                            </ul>
                                        </div>
                                        <div class="box-body" style="margin-top:-15px;">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">

<!------------------|||Seperator|||------------------------->

<!-- Home Tab Begins Here -->

                                                <div class="tab-pane fade active in" id="home_tab">

                                        <div class="span6" style="margin-left:0px; margin-right:10px; margin-top:-18px;">
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">

                                            </div>

                                        </div>
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <!-- channel news feed is in starts-->
                                                <?php  echo $this->element('NewPanel/load_profile_feeds_home'); ?>
                                                <!-- channel news feed is in ends-->
                                            </div><!--/widgets-tab-body-->
                                        </div><!--/box-body-->

<ul class="thumbnails" id="thumbnails_area">
<?php  echo $this->element('NewPanel/profile/channel_game_box'); ?>
</ul>
<div>
<?php if($mygames!=NULL){?>
<a id="loadmoreprofilegame" class="offset3 span6 btn btn-block loadertrig" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More</a>
<?php } ?>
</div>

                                                </div>



<!-- //Home Tab ENDS Here -->

<!------------------|||Seperator|||------------------------->

<!-- Game Tab Begins Here -->


<div class="tab-pane fade" id="games_tab">
<ul class="thumbnails" id="thumbnails_game_area">
<?php  //New Ajax Loaded Data Will come here. ?>
</ul>
<div>
<a id="loadmorechannelgames" class="offset3 span6 btn btn-block loadertrig" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More Game</a>
</div>

</div>

												
<!-- //Game Tab ENDS Here -->


<!------------------|||Seperator|||------------------------->

	
												
<div class="tab-pane fade" id="favorites_tab">
<ul class="thumbnails" id="thumbnails_fav_area">
<?php  //New Ajax Loaded Data Will come here. ?>
</ul>
<div>
<a id="loadmorefavorite" class="offset3 span6 btn btn-block loadertrig" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More Favorite</a>
</div>

</div>
												
												<!------------------|||Seperator|||------------------------->
												
                                                <div class="tab-pane fade" id="news_tab">
                                <!-- tab resume update -->
                                <div class="span12">
                                                    

                                    <div class="row-fluid">
                                    <div class="span5">
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">

                                            </div>
                                            <ul style="background-color:white; padding:10px; margin:0px;" class="shadow well nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#new-feeds">Activity Feed</a></li>
                                                <!--/tab menus-->
                                            </ul>
                                        </div>
                                        <?php  echo $this->element('NewPanel/load_my_notifications'); ?>
                                    </div>

                                        <div class="box-body span7 pull-right">
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">

                                            </div>
                                            <ul style="background-color:white; padding:10px; margin:0px;" class="shadow well nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#new-feeds">Channel News</a></li>
                                                <!--/tab menus-->
                                            </ul>
                                        </div>
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <!-- channel news feed is in starts-->
                                                <div class="tab-pane fade in active" id="recent-orders">

                                                </div>
                                                <!-- channel news feed is in ends-->
                                            </div><!--/widgets-tab-body-->
                                        </div><!--/box-body-->
                                    </div><!--/box-tab-->
                                </div><!-- tab resume update -->
                                                </div>
												
												
											<!------------------|||Seperator|||------------------------->	
												
												
                                                <div class="tab-pane fade" id="followers_tab">
<ul class="thumbnails" id="thumbnails_followers_area">
<?php  //echo 'Ajax Loaded Followers will come here'; ?>
</ul>
<div>
<a id="loadmorefollowers" class="offset3 span6 btn btn-block loadertrig" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More Followers</a>
</div>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div>
                                    </div><!--/box tab-->
         </div><!--/span-->
</div>



	<!--Hidden Pagination -->
	<div class="paging_home" style="display:none;">
     <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
     echo $this->Paginator->numbers();
     echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
    </div>
    <!--Hidden Pagination -->



                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->