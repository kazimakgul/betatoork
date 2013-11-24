 
<?php
$router = Router::url();

if ($this->action == "dashboard"){
    $class = "class='active'";
    $class2 = "";$class3 = "";$class4 = "";$class5 = "";$class6 = "";$class7 = "";$class8 = "";$class9 = "";
}elseif($this->action == "mygames"){
    $class2 = "class='active'";
    $class = "";$class3 = "";$class4 = "";$class5 = "";$class6 = "";$class7 = "";$class8 = "";$class9 = "";
}elseif($this->action == "favorites"){
    $class3 = "class='active'";
    $class2 = "";$class = "";$class4 = "";$class5 = "";$class6 = "";$class7 = "";$class8 = "";$class9 = "";
}elseif($this->action == "chains"){
    $class4 = "class='active'";
    $class2 = "";$class3 = "";$class = "";$class5 = "";$class6 = "";$class7 = "";$class8 = "";$class9 = "";
}elseif($this->action == "wall3"){
    $class5 = "class='active'";
    $class2 = "";$class3 = "";$class4 = "";$class = "";$class6 = "";$class7 = "";$class8 = "";$class9 = "";
}elseif($this->action == "settings"){
    $class6 = "class='active'";
    $class2 = "";$class3 = "";$class4 = "";$class5 = "";$class7 = "";$class = "";$class8 = "";$class9 = "";
}elseif($this->action == ("bestchannels2" || "toprated2")){
    $class7 = "class='active'";
    $class2 = "";$class3 = "";$class4 = "";$class5 = "";$class6 = "";$class = "";$class8 = "";$class9 = "";
}elseif($this->action == "buttons"){
    $class8 = "class='active'";
    $class = "";$class2 = "";$class3 = "";$class4 = "";$class5 = "";$class6 = "";$class7 = "";$class9 = "";
}else{
    $class = "";$class2 = "";$class3 = "";$class4 = "";$class5 = "";$class6 = "";$class7 = "";$class8 = "";$class9 = "";
}

$mychannel=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>''));

 ?>


 <div class="span1">
                    <!--side bar-->
                    <aside class="side-left">
                        <ul class="sidebar">
                            
                            <li <?php echo $class7;?>>
                                <a href="<?php echo $explore; ?>" title="Explore">
                                    <div class="helper-font-24">
                                        <i class="elusive-compass"></i>
                                    </div>
                                    <span class="sidebar-text">Explore</span>
                                </a>
                            </li>

                            <li <?php echo $class9;?>>
                                <a href="<?php echo $mychannel; ?>" title="My Channel">
                                    <div class="helper-font-24">
                                        <i class="elusive-user"></i>
                                    </div>
                                    <span class="sidebar-text">My Channel</span>
                                </a>
                            </li>


                            <li <?php echo $class;?>> <!--always define class .first for first-child of li element sidebar left-->
                                <a href="<?php echo $dashboard; ?>" title="dashboard">
                                    <div class="helper-font-24">
                                        <i class="icofont-dashboard"></i>
                                    </div>
                                    <span class="sidebar-text">Dashboard</span>
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
                            <li <?php echo $class6;?> data-intro="Customize your channel and change your notification settings here" data-position="right">
                                <a href="<?php echo $settings; ?>" title="Settings">
                                    <div class="helper-font-24">
                                        <i class="icofont-edit"></i>
                                    </div>
                                    <span class="sidebar-text">Settings</span>
                                </a>
                            </li>
                            <li <?php echo $class8;?> >
                                <a href="<?php echo $tools; ?>" title="Tools">
                                    <div class="helper-font-24">
                                        <i class="elusive-briefcase"></i>
                                    </div>
                                    <span class="sidebar-text">Tools</span>
                                </a>
                            </li>

                        </ul>
                    </aside><!--/side bar -->
                </div><!-- span side-left -->