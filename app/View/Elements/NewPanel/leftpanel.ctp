 
<?php
$router = Router::url();

if ($this->action == "dashboard"){
    $class = "class='active'";
    $class2 = "";$class3 = "";$class4 = "";$class5 = "";$class6 = "";
}elseif($this->action == "mygames"){
    $class2 = "class='active'";
    $class = "";$class3 = "";$class4 = "";$class5 = "";$class6 = "";
}elseif($this->action == "favorites"){
    $class3 = "class='active'";
    $class2 = "";$class = "";$class4 = "";$class5 = "";$class6 = "";
}elseif($this->action == "chains"){
    $class4 = "class='active'";
    $class2 = "";$class3 = "";$class = "";$class5 = "";$class6 = "";
}elseif($this->action == "wall3"){
    $class5 = "class='active'";
    $class2 = "";$class3 = "";$class4 = "";$class = "";$class6 = "";
}elseif($this->action == "settings"){
    $class6 = "class='active'";
    $class2 = "";$class3 = "";$class4 = "";$class5 = "";$class = "";
}else{
    $class = "";$class2 = "";$class3 = "";$class4 = "";$class5 = "";$class6 = "";
}

 ?>




 <div class="span1">
                    <!--side bar-->
                    <aside class="side-left">
                        <ul class="sidebar" data-step="2" data-position="bottom" data-intro="Hey this is your personal menu. Everything here belongs to you click on some of them and start building your game channel.">
                            <li <?php echo $class;?>> <!--always define class .first for first-child of li element sidebar left-->
                                <a href="<?php echo $dashboard; ?>" title="dashboard">
                                    <div class="helper-font-24">
                                        <i class="icofont-home"></i>
                                    </div>
                                    <span class="sidebar-text">Dashboard</span>
                                </a>
                            </li>
                            <li <?php echo $class2;?>>
                                <a href="<?php echo $mygames; ?>" title="My Games">
                                    <div class="helper-font-24">
                                        <i class="elusive-star-alt"></i>
                                    </div>
                                    <span class="sidebar-text">My Games</span>
                                </a>
                            </li>
                            <li <?php echo $class3;?>>
                                <a href="<?php echo $favorites; ?>" title="Favorites">
                                    <div class="helper-font-24">
                                        <i class="icofont-heart"></i>
                                    </div>
                                    <span class="sidebar-text">Favorites</span>
                                </a>
                            </li>

                            <li <?php echo $class4;?>>
                                <a href="<?php echo $chains; ?>" title="Follows">
                                    <div class="helper-font-24">
                                        <i class="elusive-group"></i>
                                    </div>
                                    <span class="sidebar-text">Follows</span>
                                </a>
                            </li>
                            <li <?php echo $class5;?>>
                                <a href="<?php echo $wall; ?>" title="Wall">
                                    <div class="helper-font-24">
                                        <i class="icofont-th-list"></i>
                                    </div>
                                    <span class="sidebar-text">News Feed</span>
                                </a>
                            </li>
                            <li <?php echo $class6;?>>
                                <a href="<?php echo $settings; ?>" title="Settings">
                                    <div class="helper-font-24">
                                        <i class="icofont-edit"></i>
                                    </div>
                                    <span class="sidebar-text">Settings</span>
                                </a>
                                <ul class="sub-sidebar-form corner-top shadow-white">
                                    <li>
                                        <a href="#" title="Monetize" class="corner-all">
                                            <i class="icofont-money"></i>
                                            <span class="sidebar-text">Monetize Your Channel</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo $settings; ?>" title="Edit" class="corner-all">
                                            <i class="icofont-user"></i>
                                            <span class="sidebar-text">Edit Channel</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $password; ?>" title="Change Password" class="corner-all">
                                            <i class="icofont-lock"></i>
                                            <span class="sidebar-text">Change Password</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </aside><!--/side bar -->
                </div><!-- span side-left -->