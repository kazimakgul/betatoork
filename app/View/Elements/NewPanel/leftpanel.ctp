 
<?php
$router = Router::url();

if ($router == "/betatoork/games/dashboard"){
    $class = "class='active first'";
}else{
    $class2 = "class='active'";
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
                            <li>
                                <a href="icons.html" title="icons">
                                    <div class="helper-font-24">
                                        <i class="icofont-heart"></i>
                                    </div>
                                    <span class="sidebar-text">Favorites</span>
                                </a>
                            </li>

                            <li>
                                <a href="charts.html" title="charts">
                                    <div class="helper-font-24">
                                        <i class="icofont-link"></i>
                                    </div>
                                    <span class="sidebar-text">Chains</span>
                                </a>
                            </li>
                            <li>
                                <a href="tables.html" title="table">
                                    <div class="helper-font-24">
                                        <i class="icofont-th-list"></i>
                                    </div>
                                    <span class="sidebar-text">Wall</span>
                                </a>
                            </li>
                            <li>
                                <a href="form.html" title="form">
                                    <div class="badge badge-important">3</div>
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
                                        <a href="form.html" title="form element" class="corner-all">
                                            <i class="icofont-file"></i>
                                            <span class="sidebar-text">Edit Channel</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="code_editor.html" title="code editor" class="corner-all">
                                            <i class="icofont-book"></i>
                                            <span class="sidebar-text">Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="gallery.html" title="gallery" class="corner-all">
                                            <i class="icofont-picture"></i>
                                            <span class="sidebar-text">AdSense</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" title="more">
                                    <div class="badge badge-important">4</div>
                                    <div class="helper-font-24">
                                        <i class="icofont-th-large"></i>
                                    </div>
                                    <span class="sidebar-text">Public</span>
                                </a>
                                <ul class="sub-sidebar corner-top shadow-silver-dark">
                                    <li>
                                        <a href="404.html" title="not found">
                                            <div class="helper-font-24">
                                                <i class="icofont-th-list"></i>
                                            </div>
                                            <span class="sidebar-text">Wall</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login.html" title="login">
                                            <div class="helper-font-24">
                                                <i class="icofont-film"></i>
                                            </div>
                                            <span class="sidebar-text">Channel</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="bonus-page/resume/index.html" title="resume">
                                            <div class="helper-font-24">
                                                <i class="icofont-user"></i>
                                            </div>
                                            <span class="sidebar-text">Home</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </aside><!--/side bar -->
                </div><!-- span side-left -->