        <!-- section header -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"><!-- Collapsable nav bar -->
<div class="btn-group user-group btn-navbar" style="background : none; padding:0px 0px 0px 0px; margin:0px 40px 0px 0px;">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">


  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
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
                                            <a class="pull-left" href="#">

  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('class'=>'img-polaroid','align'=>'middle','title'=>'profile','alt'=>'profile','onerror'=>'imgError(this,"avatar");')); }
  ?>

                                            </a>
                                            <div class="media-body description">
                                                <p class="muted"><strong><?php echo $username ?></strong></p>
                                                <p class="muted"><?php echo $user['User']['email']; ?></p>
                                                <p class="action"><a class="link" href="<?php echo $publicprofile;?>">Public Channel</a> - <a class="link" href="<?php echo $settings;?>">Settings</a></p>
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
      <a href="<?php echo $index; ?>" class="brand"><img width="80"src="../img/logo.png"></a>
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
                    <li><a href="#">Best Channels</a></li>
                    <li><a href="#">Recommended Games</a></li>
                    <li><a href="#">New Games</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Why Join Toork</a></li>
                </ul>
            </li>
          <li class="divider-vertical"></li>
          <li class="dropdown user-group">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <div class="pull-left " style="margin:-9px 0px 0px 0px;">
  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('class'=>'img-polaroid','align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'20','onerror'=>'imgError(this,"avatar");')); }
  ?>

                <?php echo $username ?></div><strong class="caret"></strong></a>
            <div class="dropdown-menu dropdown-user" role="menu" style="padding: 15px; padding-bottom: 15px;">
                                        <div class="media">
                                            <a class="pull-left" href="#">

  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('class'=>'corner-all','align'=>'middle','title'=>'profile','alt'=>'profile','onerror'=>'imgError(this,"avatar");')); }
  ?>


                                            </a>
                                            <div class="media-body description">
                                                <p><strong><?php echo $username ?></strong></p>
                                                <p class="muted"><?php echo $user['User']['email']; ?></p>
                                                <p class="action"><a class="link" href="<?php echo $publicprofile;?>">Public Channel</a> - <a class="link" href="<?php echo $settings;?>">Settings</a></p>
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
