<?php
$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<?php
if($this->Session->check('Auth.User')){
?>

        <div class="alert alert-info">
            <div class="box-header corner-top">
                <div class="header-control">
                <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
                </div>
            </div>
            <strong><a class="btn btn-link btn-small" style="margin=:0px 0px 0px 0px;" href="<?php echo $settings;?>"><i class="elusive-pencil"></i> Edit</strong></a>your own channel and start building your game community now.
        </div>

<?php
}else{
?>


<?php
}
?>


<div class="well well-small shadow-black" style=" padding-bottom:0px; 

background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);

background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* Safari 4+, Chrome 2+ */  

background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* FF 3.6+ */  

">
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
        <h4 style="margin-bottom:2px; font-family: 'Merriweather Sans', sans-serif; font-size: 20px; color:white; text-shadow: 1px 1px black;"><?php echo $publicname?></h4>
<?php
if($website==NULL){


}else{
                    echo "<a target='_blank' rel='nofollow' class='btn btn-link' href='$website' style='padding:0px; font-family: Merriweather Sans, sans-serif; font-size: 12px; color:white; text-shadow: 1px 1px black;'>$website</a>";
}
?>
        <div class="row-fluid">
            <div class="span2">
                <a class="btn btn-block btn-success" id="follow_button" style="margin-top:5px;"  onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $publicname?>']);">
                  <i class="elusive-plus-sign"></i> Follow
                </a> 
                <a class="btn btn-block" id="unFollow_button" style="display:none;" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>); _gaq.push(['_trackEvent', 'Channel', 'unFollow', '<?php echo $publicname?>']);">
                  <i class="elusive-remove-circle"></i> Unfollow
                </a> 
            </div> 
                <div class="span7"><p style="font-family: 'Merriweather Sans', sans-serif; font-size: 15px; color:white; text-shadow: 1px 1px black; margin-top:7px;">
                    <i class="helper-font-24 elusive-group color-blue"></i> <?php echo $publicuser['Userstat']['subscribeto']; ?> Followers 
                    <i class="helper-font-24 elusive-star-alt color-red"></i> <?php echo $publicuser['Userstat']['uploadcount']; ?> Games
                </p>
                </div>

                <div class="pull-right" style="margin-top:8px;">

<?php
$facebook=$publicuser['User']['fb_link'];
$twitter=$publicuser['User']['twitter_link'];
$gplus=$publicuser['User']['gplus_link'];
if($facebook==NULL){
                   echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-facebook helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                   echo "<a rel='tooltip' data-placement='bottom' data-original-title='Facebook Page' href='$facebook' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-facebook color-blue helper-font-24'></i>
                    </a>";
}
if($website==NULL){
                    echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-globe helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='$website' href='$website' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-globe color-red helper-font-24'></i>
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
if($gplus==NULL){
                    echo "<a style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-googleplus helper-font-24' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='Google+ Page' href='$gplus' target='_blank' rel='nofollow' style='margin-right:20px; text-shadow: 1px 1px black;'>                     
                        <i class='elusive-googleplus color-red helper-font-24'></i>
                    </a>";
}
?>


            </div>

        </div>
    </div>

</div>
        <p style="background: rgba(255, 255, 255, 0.3);"><strong><?php echo $publicuser['User']['description'] ?></strong></p>

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
  </script>
  <!----=========================================---->


<div class="row-fluid">
        <!--span-->
         <div class="span12">
                                    <!--box tab-->
                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <ul class="nav nav-tabs" id="profile_tabs">
     
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#games_tab"><i class="elusive-user"></i> Channel Games</a></li>
                                                <li class=""><a data-toggle="tab" href="#favorites_tab"><i class="elusive-heart color-red"></i> Favorites</a></li>
                                                <li class=""><a data-toggle="tab" href="#news_tab"><i class="elusive-th-list color-purple"></i> News Feed</a></li>
                                                <li class=""><a data-toggle="tab" href="#followers_tab"><i class="icofont-link color-blue"></i> Followers</a></li>
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="games_tab">

<ul class="thumbnails" id="thumbnails_area">
<?php  echo $this->element('NewPanel/profile/channel_game_box'); ?>
</ul>
<div>
<a id="loadmoreprofilegame" class="offset3 span6 btn btn-block" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More</a>
</div>

                                                </div>
												<!--Bu alana more games buttonu geliyor -->
	
												<!--/Bu alana more games buttonu geliyor -->
                                                <div class="tab-pane fade" id="favorites_tab">
<ul class="thumbnails" id="thumbnails_fav_area">
<?php  //New Ajax Loaded Data Will come here. ?>
</ul>
<div>
<a id="loadmorefavorite" class="offset3 span6 btn btn-block" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More Favorite</a>
</div>

                                                </div>
                                                <div class="tab-pane fade" id="news_tab">
                                <!-- tab resume update -->
                                <div class="span12">
                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a data-box="close" data-hide="rotateOutDownLeft">&times;</a>
                                            </div>
                                            <ul class="nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#recent-orders">Whats New</a></li>
                                                <!--/tab menus-->
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="recent-orders">
                                                    
													<div id="my_more_content"></div>			
					                               <?php //echo $this->element('NewPanel/load_profile_feeds');?>
													
                                                </div>
                                                
                                            </div><!--/widgets-tab-body-->
                                        </div><!--/box-body-->
                                    </div><!--/box-tab-->
                                </div><!-- tab resume update -->
                                                </div>
                                                <div class="tab-pane fade" id="followers_tab">
<ul class="thumbnails" id="thumbnails_followers_area">
<?php  //echo 'Ajax Loaded Followers will come here'; ?>
</ul>
<div>
<a id="loadmorefollowers" class="offset3 span6 btn btn-block" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More Followers</a>
</div>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div>
                                    </div><!--/box tab-->
         </div><!--/span-->
</div>



	<!--Hidden Pagination -->
	<div class="paging_mygames" style="display:none;">
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