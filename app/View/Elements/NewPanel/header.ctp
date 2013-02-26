<?php $logout=$this->Html->url(array("controller" => "users","action" =>"logout")); ?>
<?php $addGame=$this->Html->url(array("controller" => "games","action" =>"add")); ?>
<?php $dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard")); ?>
<?php $index=$this->Html->url(array("controller" => "games","action" =>"index")); ?>

        <!-- section header -->
        <header class="header">
            <!--nav bar helper-->
            <div class="navbar-helper">
                <div class="row-fluid">
                    <!--panel site-name-->
                    <div class="span2">
                        <div class="panel-sitename">
                            <h2><a href="<?php echo $index; ?>">T<span size="small" class="color-blue">oo</span>rk</a></h2>
                        </div>
                    </div>
                    <!--/panel name-->

                    <div class="span6">
                        <!--panel search-->
                        <div class="panel-search">
                            <form class="form-search">
                                <div class="input-icon-append">
                                    <button type="submit" rel="tooltip-bottom" title="search" class="icon"><i class="icofont-search"></i></button>
                                    <input class="input-large search-query grd-white" maxlength="23" placeholder="Search here..." type="text">
                                </div>
                            </form>
                        </div><!--/panel search-->
                    </div>
                    <div class="span4">
                        <!--panel button ext-->
                        <div class="panel-ext">
                            <div class="btn-group">
                                <!--notification-->
                                <a class="btn btn-danger btn-small" data-toggle="dropdown" href="#" title="3 notification">3</a>
                                <ul class="dropdown-menu dropdown-notification">
                                    <li class="dropdown-header grd-white"><a href="#">View All Notifications</a></li>
                                    <li class="new">
                                        <a href="#">
                                            <div class="notification">John Doe commented on a post</div>
                                            <div class="media">
                                                <img class="media-object pull-left" data-src="js/holder.js/64x64" />
                                                <div class="media-body">
                                                    <h4 class="media-heading">Lorem ipsum <small class="helper-font-small"> john doe</small></h4>
                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="new">
                                        <a href="#">
                                            <div class="notification">Request new order</div>
                                            <div class="media">
                                                <img class="media-object pull-left" data-src="js/holder.js/64x64" />
                                                <div class="media-body">
                                                    <h4 class="media-heading">Tortor dapibus</h4>
                                                    <p>Vegan fanny pack odio cillum wes anderson 8-bit.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="new">
                                        <a href="#">
                                            <div class="notification">Request new order</div>
                                            <div class="media">
                                                <img class="media-object pull-left" data-src="js/holder.js/64x64" />
                                                <div class="media-body">
                                                    <h4 class="media-heading">Lacinia non</h4>
                                                    <p>Messenger bag gentrify pitchfork tattooed craft beer.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="notification">John Doe commented on a post</div>
                                            <div class="media">
                                                <img class="media-object pull-left" data-src="js/holder.js/64x64" />
                                                <div class="media-body">
                                                    <h4 class="media-heading">Lorem ipsum <small class="helper-font-small"> john doe</small></h4>
                                                    <p>Raw denim you probably haven't heard of them jean shorts Austin.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="notification">Request new order</div>
                                            <div class="media">
                                                <img class="media-object pull-left" data-src="js/holder.js/64x64" />
                                                <div class="media-body">
                                                    <h4 class="media-heading">Tortor dapibus</h4>
                                                    <p>Vegan fanny pack odio cillum wes anderson 8-bit.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="notification">Request new order</div>
                                            <div class="media">
                                                <img class="media-object pull-left" data-src="js/holder.js/64x64" />
                                                <div class="media-body">
                                                    <h4 class="media-heading">Lacinia non</h4>
                                                    <p>Messenger bag gentrify pitchfork tattooed craft beer.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- <li class="dropdown-footer"><a href=""></a></li> -->
                                </ul><!--notification-->
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-inverse btn-small dropdown-toggle" data-toggle="dropdown" href="#">
                                    Shortcut
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><a tabindex="-1" href="calendar.html">Calendar</a></li>
                                    <li><a tabindex="-1" href="invoice.html">Invoice</a></li>
                                    <li><a tabindex="-1" href="message.html">Message</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Sample Page</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="pricing.html">Pricing</a></li>
                                            <li><a tabindex="-1" href="bonus-page/resume/index.html">Resume</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Error Page</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="403.html">Error 403</a></li>
                                            <li><a tabindex="-1" href="404.html">Error 404</a></li>
                                            <li><a tabindex="-1" href="405.html">Error 405</a></li>
                                            <li><a tabindex="-1" href="500.html">Error 500</a></li>
                                            <li><a tabindex="-1" href="503.html">Error 503</a></li>
                                            <li><a tabindex="-1" href="under-construction.html">Under Construction</a></li>
                                            <li><a tabindex="-1" href="coming-son.html">Coming Son</a></li>
                                        </ul>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a tabindex="-1" href="#">Something else here</a></li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-inverse btn-small" href="#">Other Action</a>
                            </div>
                            <div class="btn-group user-group">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">


  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('class'=>'corner-all','align'=>'middle','title'=>'myUsername','alt'=>'myUsername','width'=>'35','height'=>'35','onerror'=>'imgError(this,"avatar");')); }
  ?><!--this for display on PC device-->
                                    <button class="btn btn-small btn-inverse"><?php echo $username ?></button> <!--this for display on tablet and phone device-->
                                </a>
                                <ul class="dropdown-menu dropdown-user" role="menu" aria-labelledby="dLabel">
                                    <li>
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
                                                <p class="muted">kazimakgul@socialesman.com</p>
                                                <p class="action"><a class="link" href="#">Activity</a> - <a class="link" href="#">Setting</a></p>
                                                <a href="<?php echo $dashboard;?>" class="btn btn-danger btn-small btn-block">Go To Dashboard</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-footer">
                                        <div>
                                            <a class="btn btn-small pull-right" href="<?php echo $logout; ?>">Logout</a>
                                            <a class="btn btn-small btn-success" href="<?php echo $addGame;?>">Add Game</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!--panel button ext-->
                    </div>
                </div>
            </div><!--/nav bar helper-->
        </header>