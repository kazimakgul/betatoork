<?php 
$profilepublic=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>''));

if(!isset($notifycount))
{$notifycount="-";}
?>

        <!-- section header -->
<div class="navbar navbar-fixed-top shadow-black">
  <div class="navbar-inner navbar-custom">
    <div class="container">
      <!-- Collapsable nav bar -->
<div class="btn-group user-group btn-navbar" style="background : none; padding:2px 0px 0px 0px; margin:0px 40px 0px 0px;">
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
        <ul class="nav pull-right span5" style="margin-right:-90px;">

                    <div class="span1">
                        <!--panel button ext-->
                       
                            <div class="pull-right">

                                <!--notification-->
                                <a class="" id="notifycount" data-toggle="dropdown" href="#" title="<?php echo $notifycount; ?> new notifications">
                                    <i class="icon-2x elusive-bell color-white" style="opacity:1; margin:5px 15px 5px 5px;"></i>
                                        
                            <?php if($notifycount>0){$label='label badge-important'; }else{ $label='label';}?>

                                        <p id="notcountsingle" style="padding:2px 4px 2px 4px; margin:3px 0px 0px -17px ;" class="<?php echo $label; ?>"><?php echo $notifycount; ?> </p>
                                </a>

                                <ul class="dropdown-menu dropdown-notification" style="margin-right:150px;">
                                    <?php  echo $this->element('NewPanel/header/headernotifications',array('wall'=>$wall)); ?>
                                </ul><!--notification-->
                            </div>
                       
                    </div>
          

          <li class="dropdown" style="margin-right:5px;">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" style="margin-left:5px; padding:0px;">
              <div class="pull-left btn btn-custom-darken"> <i class="icofont-comments"></i> Post <strong class="caret"></strong></div>
            </a>
            <div class="dropdown-menu dropdown-user color-red" role="menu" style="padding:5px; padding-bottom: 5px;">
                                        
                                           
            <div class="span4" style=" margin: 5px 5px -15px 5px;">
              <div style=" padding: 5px 5px 5px 5px;">
                </br>
                <form class="navbar-form" >
                    <textarea name="message" id="fast_update" style="margin-top:-20px; padding: 0px 0px 0px 3px;" class="span4" rows="4"  placeholder="What do you want to share?"></textarea></form>
                 </br>
                <div class="helper-font-16">
                          
                          <i rel="tooltip" data-placement="top" data-original-title="add image" href="javascript:void(0);"  id="camera2" class="elusive-camera"></i>
                            <i rel="tooltip" data-placement="top" data-original-title="add video" href="javascript:void(0);"  id="camera23" class="elusive-youtube"></i>
                            <i rel="tooltip" data-placement="top" data-original-title="add link" href="javascript:void(0);"  id="camera24" class="icofont-link"></i>       
                </div>
                
                            <!-ImageUploadPanel-><div id="imageupload" class="border" style="display:none;">
                            <?php $image_ajax_url_fly= $this->Html->url(array('controller'=>'Wallentries','action'=>'image_ajax_fly'));?>
                            <form id="imageform_fly" method="post" enctype="multipart/form-data" action='<?php echo $image_ajax_url_fly; ?>'> 
                            <div id='preview_fly'></div>
                            <span id='addphoto'>Add Photo:</span> <input type="file" name="photoimg" id="photoimg_fly" />
                            <input type='hidden' id='uploadvalues' />
                            </form>
                            </div><!-ImageUploadPanel-> 

                            <div id="imageupload23" class="border" style="display:none;">

                            <p>Just copy/paste a <strong class="color-purple">youtube</strong> ,<strong class="color-green">vimeo</strong> or <strong class="color-blue">dailymotion</strong> link ex: <strong>http://www.youtube.com/watch?v=bNNzRyd1xz0</strong></p>
                            </div>

                            <div id="imageupload24" class="border" style="display:none;">

                            <p>Just copy/paste the link you want to share ex: <strong>http://toork.com</strong></p>
                            </div>


                    <hr size="3" style="margin:0px 0px 5px 0px;">
                  <button type="submit" id="success-post2" class="btn btn-danger pull-right fast_update_data">Publish</button>
                  <a href="<?php echo $wall;?>" class="btn">News Feed</a>
                </form></br></br>
              </div>
            </div>

                                    
            </div>
          </li>

<! Main User Card starts ->
<div class="btn-group user-group"><strong>Username</strong>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    
                                   <!-- <img class="corner-all" align="middle" src="img/user-thumb.jpg" title="John Doe" alt="john doe"> -->
                                    <button class="btn btn-custom-darken"><?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'15',"alt" => "toork avatar image")); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'15','onerror'=>'imgError(this,"avatar");')); }
  ?> <?php echo $username ?></button> <!--this for display on tablet and phone device-->
                                </a>
                                <ul class="dropdown-menu dropdown-user" role="menu" aria-labelledby="dLabel">
                                    <li>
                                        <div class="media">
                                            <a class="pull-left" href="#">

  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'70','class'=>'corner-all img-polaroid',"alt" => "toork avatar image",)); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('width'=>'70','class'=>'corner-all img-polaroid','align'=>'middle','title'=>'profile','alt'=>'profile','onerror'=>'imgError(this,"avatar");')); }
  ?>

                                                <!-- <img class="img-circle" src="img/user.jpg" title="profile" alt="profile"> -->
                                            </a>
                                            <div class="media-body description">
                                                <p><strong><?php echo $username ?></strong></p>
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
<! Main User Card ends ->

        </ul>
      </div>
    </div>
  </div>
</div>
