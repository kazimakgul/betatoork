<?php 
$users=$this->Html->url(array("controller" => "admins","action" =>"users"));  
$bots=$this->Html->url(array("controller" => "admins","action" =>"bots"));
$admins=$this->Html->url(array("controller" => "admins","action" =>"users",1));
$managers=$this->Html->url(array("controller" => "admins","action" =>"users",2));
?>

<div class="navbar">
                                        <div class="navbar-inner">
                                            <div class="container">
                                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </a>
                                                <a class="brand" href="#"></a>
                                                <div class="nav-collapse collapse navbar-responsive-collapse">
                                                    <ul class="nav">
                                                        <li class="active"><a href="#">Home</a></li>
                                                        <li><a href="#">Link</a></li>
                                                        <li><a href="#">Link</a></li>
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="<?php echo $users; ?>">Users</a></li>
                                                                <li><a href="<?php echo $bots; ?>">Bots</a></li>
                                                                <li><a href="#">Something else here</a></li>
                                                                <li class="divider"></li>
                                                                <li class="nav-header">Nav header</li>
                                                                <li><a href="#">Separated link</a></li>
                                                                <li><a href="#">One more separated link</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <form class="navbar-search pull-left" action="">
														<input name="adm_search_box"  class="search-query input-large adm_usr_src" type="text" value="">
                                                    </form>
                                                    <ul class="nav pull-right">
                                                        <li><a href="#">Link</a></li>
                                                        <li class="divider-vertical"></li>
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter/Sort <b class="caret"></b></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="<?php echo $users; ?>">Users</a></li>
                                                                <li><a href="<?php echo $bots; ?>">Bots</a></li>
                                                                <li><a href="<?php echo $admins; ?>">Admins(Role:1)</a></li>
																<li><a href="<?php echo $managers; ?>">Managers(Role:2)</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#">Separated link</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div><!-- /.nav-collapse -->
                                            </div>
                                        </div><!-- /navbar-inner -->
                                    </div>