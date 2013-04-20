<?php
$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
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


<div class="well well-small">
<div class="row-fluid">
    <div class="span2">
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
        <h4><?php echo $publicname?></h4>
        <div>
        <i class="elusive-plus-sign color-red"></i> 27 Followers
        </div>
        <i class="elusive-plus-sign color-blue"></i> 13 Games
    </div>
    <div class="span10 thumbnails pull-right">
        <img data-src="holder.js/745x200"class="img-polaroid">
        <p><strong><?php echo $publicuser['User']['description'] ?></strong></p>
    </div>
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
  
  </script>
  <!----=========================================---->


    <div class="well well-small">
        <div class="row-fluid">
            <div class="span3">
                <a class="btn btn-success" id="follow_button" onclick="subscribe('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);">
                  <i class="elusive-plus-sign"></i> Follow
                </a> 
				<a class="btn" id="unFollow_button" style="display:none;" onclick="subscribeout('<?php echo $publicname?>',user_auth,<?php echo $userid; ?>);">
                  <i class="elusive-remove-circle"></i> Unfollow
                </a> 
            </div>
            <div class="span4 pull-right">
                <div class="pull-right">

<?php
$facebook=$publicuser['User']['fb_link'];
$twitter=$publicuser['User']['twitter_link'];
$gplus=$publicuser['User']['gplus_link'];
$website=$publicuser['User']['website'];
if($facebook==NULL){
                   echo "<a style='margin-right:20px;'>                     
                        <i class='elusive-facebook helper-font-32' style='opacity:0.3;'></i>
                    </a>";
}else{
                   echo "<a rel='tooltip' data-placement='bottom' data-original-title='Facebook Page' href='$facebook' target='_blank' rel='nofollow' style='margin-right:20px;'>                     
                        <i class='elusive-facebook color-blue helper-font-32'></i>
                    </a>";
}
if($website==NULL){
                    echo "<a style='margin-right:20px;'>                     
                        <i class='elusive-pinterest helper-font-32' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='Pinterest Board' href='$website' target='_blank' rel='nofollow' style='margin-right:20px;'>                     
                        <i class='elusive-pinterest color-red helper-font-32'></i>
                    </a>";
}
if($twitter==NULL){
                    echo "<a style='margin-right:20px;'>                     
                        <i class='elusive-twitter helper-font-32' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='Twitter Page' href='$twitter' target='_blank' rel='nofollow' style='margin-right:20px;'>                     
                        <i class='elusive-twitter color-blue helper-font-32'></i>
                    </a>";
}
if($gplus==NULL){
                    echo "<a style='margin-right:20px;'>                     
                        <i class='elusive-googleplus helper-font-32' style='opacity:0.3;'></i>
                    </a>";
}else{
                    echo "<a rel='tooltip' data-placement='bottom' data-original-title='Google+ Page' href='$gplus' target='_blank' rel='nofollow' style='margin-right:20px;'>                     
                        <i class='elusive-googleplus color-red helper-font-32'></i>
                    </a>";
}
?>


            </div>
            </div>
        </div>
    </div>

<div class="row-fluid">
        <!--span-->
         <div class="span12">
                                    <!--box tab-->
                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <ul class="nav nav-tabs">
     
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#boxtab-1"><i class="elusive-user"></i> Channel Games</a></li>
                                                <li class=""><a data-toggle="tab" href="#boxtab-2"><i class="elusive-heart color-red"></i> Favorites</a></li>
                                                <li class=""><a data-toggle="tab" href="#boxtab-3"><i class="elusive-th-list color-purple"></i> Wall</a></li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Follow <b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#boxdropdown-1" data-toggle="tab">Following</a></li>
                                                        <li><a href="#boxdropdown-2" data-toggle="tab">Followers</a></li>
                                                    </ul>
                                                </li><!--/tab menus-->
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade active in" id="boxtab-1">

<ul class="thumbnails">

<?php  echo $this->element('NewPanel/channel_game_box'); ?>

</ul>

                                                </div>
                                                <div class="tab-pane fade" id="boxtab-2">
<ul class="thumbnails">

<?php  echo $this->element('NewPanel/channel_favorite_box'); ?>

</ul>
                                                </div>
                                                <div class="tab-pane fade" id="boxtab-3">
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
                                                <li><a data-toggle="tab" href="#recent-posts">Shared Videos</a></li>
                                                <li><a data-toggle="tab" href="#recent-comments">Shared Pictures</a></li><!--/tab menus-->
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="recent-orders">
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Lorem ipsum </a><small class="helper-font-small">by john doe on 22 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Approve</a>
                                                                <a href="#" class="btn btn-mini">Invoice</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Lorem ipsum </a><small class="helper-font-small">by jane smith on 18 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Approve</a>
                                                                <a href="#" class="btn btn-mini">Invoice</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Lorem ipsum </a><small class="helper-font-small">by john smith on 18 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Approve</a>
                                                                <a href="#" class="btn btn-mini">Invoice</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="btn btn-small btn-link pull-right">View all &rarr;</a>
                                                </div>
                                                <div class="tab-pane fade" id="recent-posts">
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Tortor dapibus </a><small class="helper-font-small">by jane smith on 11 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Edit</a>
                                                                <a href="#" class="btn btn-mini">Draft</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Tortor dapibus </a><small class="helper-font-small">by john doe on 10 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Edit</a>
                                                                <a href="#" class="btn btn-mini">Draft</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Tortor dapibus </a><small class="helper-font-small">by jane doe on 9 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Edit</a>
                                                                <a href="#" class="btn btn-mini">Draft</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="btn btn-small btn-link pull-right">View all &rarr;</a>
                                                </div>
                                                <div class="tab-pane fade" id="recent-comments">
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Lacinia non </a><small class="helper-font-small">by jane smith on 20 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Approve</a>
                                                                <a href="#" class="btn btn-mini">Spam</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Lacinia non </a><small class="helper-font-small">by john smith on 19 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Approve</a>
                                                                <a href="#" class="btn btn-mini">Spam</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left" href="#">
                                                            <img class="media-object" data-src="js/holder.js/64x64">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Lacinia non </a><small class="helper-font-small">by john doe on 17 aug 2012, ip 192.168.56.7</small></h4>
                                                            <p>Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                                                            <div class="btn-group pull-right">
                                                                <a href="#" class="btn btn-mini">Approve</a>
                                                                <a href="#" class="btn btn-mini">Spam</a>
                                                                <a href="#" class="btn btn-mini btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="btn btn-small btn-link pull-right">View all &rarr;</a>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div><!--/box-body-->
                                    </div><!--/box-tab-->
                                </div><!-- tab resume update -->
                                                </div>
                                                <div class="tab-pane fade" id="boxdropdown-1">
                                                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                                </div>
                                                <div class="tab-pane fade" id="boxdropdown-2">
                                                    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div>
                                    </div><!--/box tab-->
         </div><!--/span-->
</div>




                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->