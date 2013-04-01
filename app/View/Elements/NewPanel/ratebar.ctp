<div class="navbar navbar-fixed-bottom">
  <div class="header-control">
      <div class="navbar-inner" style="-webkit-border-radius: 0; -moz-border-radius: 0; border-radius: 0;">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
            <div class="row-fluid">

              <div class="span3">
<a class="btn" style="margin:5px;" href="<?php echo $profilepublic; ?> ">  
  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($game,'User.picture',array(),array('align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'12','onerror'=>'imgError(this,"avatar");')); }
  ?> <?php echo $game['User']['username'] ?> <i class="color-red icofont-bolt"></i>
</a>

              </div>

              <div class="span4 helper-font-32">
                 <div class="pull-right" style="margin-top:5px;">
                      <i class="elusive-star"></i>
                      <i class="elusive-star"></i>
                      <i class="elusive-star"></i>
                      <i class="elusive-star"></i>
                      <i class="elusive-star-empty"></i>
                    </div>
              </div>
              <div class="span4 helper-font-32">
                <ul>
                  <li rel="tooltip" data-placement="top" data-original-title="Next Game" class="btn pull-right color-blue" style="margin:5px;">
                      <i class="elusive-fire"></i> Next <i class="elusive-circle-arrow-right"></i>
                  </li>
                  <li rel="tooltip" data-placement="top" data-original-title="Add to Favorites" class="btn pull-right color-red" style="margin:5px;">
                      <i class="elusive-heart"></i>
                      <i class="elusive-heart-empty"></i>
                  </li>
                 <li rel="tooltip" data-placement="top" data-original-title="Comment" class="btn pull-right color-green" style="margin:5px;">
                      <i class="elusive-comment"></i>
                  </li>
                </ul>
              </div>
            </div>

        <button style="margin:-35px 0px 0px 0px;" onclick="$.pnotify({
            title: 'Rate Bar Removed',
            text: 'If you want to have your rate bar back, Just refresh your browser.',
            type: 'info'
          });"  rel="tooltip" data-placement="top" data-original-title="Remove This Bar" data-box="close" data-hide="fadeOut" class="close">×</button> 
          </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
      </div><!-- /navbar-inner -->
    </div>
  </div>