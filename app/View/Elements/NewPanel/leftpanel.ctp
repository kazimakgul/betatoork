 
<?php
$router = Router::url();

if ($this->action == "dashboard"){
    $class = "class='active first'";
}elseif($this->action == "mygames"){
    $class2 = "class='active'";
}elseif($this->action == "favorites"){
    $class3 = "class='active'";
}elseif($this->action == "chains"){
    $class4 = "class='active'";
}elseif($this->action == "wall3"){
    $class5 = "class='active'";
}elseif($this->action == "settings"){
    $class6 = "class='active'";
}

 ?>




 <div class="span1">
                    <!--side bar-->
                    <aside class="side-left">
                        <ul class="sidebar">
                            <li <?php echo $class;?>> <!--always define class .first for first-child of li element sidebar left-->
                                <a href="<?php echo $dashboard; ?>" title="dashboard">
                                    <div class="helper-font-24">
                                        <i class="icofont-home"></i>
                                    </div>
                                    <span class="sidebar-text">Dashboard</span>
                                </a>
                            </li>
                            <li <?php echo $class2;?>>
                                <a href="<?php echo $mygames; ?>" title="interface">
                                    <div class="helper-font-24">
                                        <i class="icofont-umbrella"></i>
                                    </div>
                                    <span class="sidebar-text">My Games</span>
                                </a>
                            </li>
                            <li <?php echo $class3;?>>
                                <a href="<?php echo $favorites; ?>" title="icons">
                                    <div class="helper-font-24">
                                        <i class="icofont-heart"></i>
                                    </div>
                                    <span class="sidebar-text">Favorites</span>
                                </a>
                            </li>

                            <li <?php echo $class4;?>>
                                <a href="<?php echo $chains; ?>" title="charts">
                                    <div class="helper-font-24">
                                        <i class="icofont-link"></i>
                                    </div>
                                    <span class="sidebar-text">Chains</span>
                                </a>
                            </li>
                            <li <?php echo $class5;?>>
                                <a href="<?php echo $wall; ?>" title="table">
                                    <div class="helper-font-24">
                                        <i class="icofont-th-list"></i>
                                    </div>
                                    <span class="sidebar-text">Wall</span>
                                </a>
                            </li>
                            <li <?php echo $class6;?>>
                                <a href="<?php echo $settings; ?>" title="form">
                                    <div class="helper-font-24">
                                        <i class="icofont-edit"></i>
                                    </div>
                                    <span class="sidebar-text">Settings</span>
                                </a>
                                <ul class="sub-sidebar-form corner-top shadow-white">
                                    <li class="title muted">Change Avatar</li>
                                    <li>
                                        <input type="file" data-form="uniform" onchange="alert('your progres uploading file...')" />
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="gallery.html" title="gallery" class="corner-all">
                                            <i class="icofont-money"></i>
                                            <span class="sidebar-text">Monetize Your Channel</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo $settings; ?>" title="form element" class="corner-all">
                                            <i class="icofont-user"></i>
                                            <span class="sidebar-text">Edit Channel</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $password; ?>" title="code editor" class="corner-all">
                                            <i class="icofont-lock"></i>
                                            <span class="sidebar-text">Change Password</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </aside><!--/side bar -->
                </div><!-- span side-left -->