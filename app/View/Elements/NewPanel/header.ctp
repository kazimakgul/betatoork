<?php 
$profilepublic=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>''));
?>
        <!-- section header -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"><!-- Collapsable nav bar -->
<div class="btn-group user-group btn-navbar" style="background : none; padding:0px 0px 0px 0px; margin:0px 40px 0px 0px;">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $settings;?>">


  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'20','class'=>'img-polaroid',"alt" => "toork avatar image"));
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('class'=>'img-polaroid','align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'20','onerror'=>'imgError(this,"avatar");')); }
  ?><!--this for display on PC device-->
  <div class="pull-left">
<button class="btn" data-toggle="dropdown-toggle" style="margin:5px 0px 0px 0px;">
    <i class="elusive-user"></i>
    <span class="caret"></span></span>
  </button>
</div>
                              <!--this for display on tablet and phone device-->
                                </a>
                                <ul class="dropdown-menu dropdown-user" role="menu">
                                    <li>
                                        <div class="media">
                                            <a class="pull-left" href="<?php echo $settings;?>">

  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'90','class'=>'corner-all',"alt" => "toork avatar image",)); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('width'=>'90','class'=>'img-polaroid','align'=>'middle','title'=>'profile','alt'=>'profile','onerror'=>'imgError(this,"avatar");')); }
  ?>

                                            </a>
                                            <div class="media-body description">
                                                <p class="muted"><strong><?php echo $username ?></strong></p>
                                                <p class="muted"><?php echo $user['User']['email']; ?></p>
                                                <p class="action"><a class="link" href="<?php echo $profilepublic;?>">Public Channel</a> - <a class="link" href="<?php echo $settings;?>">Settings</a></p>
                                                <a href="<?php echo $dashboard;?>" class="btn btn-danger btn-small btn-block"><i class="icofont-home"></i>Dashboard</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-footer">
                                        <div>
                                            <a class="btn btn-small pull-right" href="<?php echo $logout; ?>"><i class="icofont-signout"></i> Logout</a>
                                            <a class="btn btn-small btn-success" href="<?php echo $addGame;?>"><i class="elusive-plus-sign"></i> Add Game</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
 
      <!-- Your site name for the upper left corner of the site -->
      <a href="<?php echo $index; ?>" class="brand"></a>
 <form class="navbar-search">
<div class="input-icon-append">
  <button type="submit" rel="tooltip-bottom" title="" class="color-blue icon" data-original-title="search"><i class="icofont-search"></i></button>
 <input class="input-large search-query grd-white" maxlength="23" placeholder="Search for a game..." type="text">
</div>
</form>
      <!-- Start of the nav bar content -->
      <div class="nav-collapse"><!-- Other nav bar content -->
        <!-- The drop down menu -->
        <ul class="nav pull-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="elusive-compass"></i> Explore <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $bestchannels; ?>"><i class="elusive-user color-blue"></i> Best Channels</a></li>
                    <li><a href="<?php echo $toprated; ?>"><i class="elusive-fire color-red"></i> Hot Games</a></li>
                    <!-- <li><a href="#"><i class="elusive-eye-open color-green"></i> New Games</a></li> -->
                </ul>
            </li>
          <li class="divider-vertical"></li>

          <li class="dropdown user-group">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <div class="pull-left "> <i class="icofont-comments color-red"></i> Post <strong class="caret"></strong></div></a>
            <div class="dropdown-menu dropdown-user color-red" role="menu" style="padding:5px; padding-bottom: 5px;">
                                        
                                           
            <div class="span4" style=" margin: 5px 5px -15px 5px;">
              <div style=" padding: 5px 5px 5px 5px;">
                </br>
                <form class="navbar-form " >
                    <textarea name="message" id="fast_update" style="margin-top:-20px; padding: 0px 0px 0px 3px;" class="span4" rows="4"  placeholder="What do you want to share?"></textarea>
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
                  <button type="submit" id="success-post2" class="btn btn-danger pull-right fast_update_data">Publish</button>
                  <a href="<?php echo $wall;?>" class="btn">News Feed</a>
                </form></br></br>
              </div>
            </div>

                                    
            </div>
          </li>

          <li class="divider-vertical"></li>
          <li class="dropdown user-group" data-step="4" data-position="bottom" data-intro="You can see you channel card by clicking here. This card is full of useful shortcuts, such as settings, add game and go to your dashboard. This will always be here as long as you are online.">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <div class="pull-left " style="margin:-9px 0px 0px 0px;">
  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'20','class'=>'img-polaroid',"alt" => "toork avatar image")); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('class'=>'img-polaroid','align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'20','onerror'=>'imgError(this,"avatar");')); }
  ?>

                <?php echo $username ?></div><strong class="caret"></strong></a>
            <div class="dropdown-menu dropdown-user" role="menu" style="padding: 15px; padding-bottom: 15px;">
                                        <div class="media">
                                            <a class="pull-left" href="<?php echo $settings;?>">

  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'90','class'=>'corner-all',"alt" => "toork avatar image",)); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('width'=>'90','class'=>'corner-all','align'=>'middle','title'=>'profile','alt'=>'profile','onerror'=>'imgError(this,"avatar");')); }
  ?>


                                            </a>
                                            <div class="media-body description">
                                                <p><strong><?php echo $username ?></strong></p>
                                                <p class="muted"><?php echo $user['User']['email']; ?></p>
                                                <p class="action"><a class="link" href="<?php echo $profilepublic;?>">Public Channel</a> - <a class="link" href="<?php echo $settings;?>">Settings</a></p>
                                                <a href="<?php echo $dashboard;?>" class="btn btn-danger btn-small btn-block"><i class="icofont-home"></i>Dashboard</a>
                                            </div>
                                        </div>
                                  
                                        <div class="dropdown-footer">
                                            <a class="btn btn-small pull-right" href="<?php echo $logout; ?>"><i class="icofont-signout"></i> Logout</a>
                                            <a class="btn btn-small btn-success" href="<?php echo $addGame;?>"><i class="elusive-plus-sign"></i> Add Game</a>
                                        </div>
                                    

            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
