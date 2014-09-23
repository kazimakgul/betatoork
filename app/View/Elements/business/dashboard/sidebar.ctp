<?php
$index = $this->Html->url(array('controller' => 'businesses', 'action' => 'dashboard'));
$profile = $this->Html->url(array('controller' => 'businesses', 'action' => 'profile'));
$toolsNdocs = $this->Html->url(array('controller' => 'businesses', 'action' => 'toolsNdocs'));
$pricing = $this->Html->url(array('controller' => 'businesses', 'action' => 'pricing'));
$steps2launch = $this->Html->url(array('controller' => 'businesses', 'action' => 'steps2launch'));
$settings = $this->Html->url(array('controller' => 'businesses', 'action' => 'channel_settings'));
$activities = $this->Html->url(array('controller' => 'businesses', 'action' => 'activities'));
$app_status = $this->Html->url(array('controller' => 'businesses', 'action' => 'app_status'));
$logout = $this->Html->url(array("controller" => "businesses", "action" => "logout"));
$mygames = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
$favorites = $this->Html->url(array('controller' => 'businesses', 'action' => 'favorites'));
$exploregames = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames'));
$following = $this->Html->url(array('controller' => 'businesses', 'action' => 'following'));
$followers = $this->Html->url(array('controller' => 'businesses', 'action' => 'followers'));
$explorechannels = $this->Html->url(array('controller' => 'businesses', 'action' => 'explorechannels'));
$ch_settings = $this->Html->url(array('controller' => 'businesses', 'action' => 'channel_settings'));
$notifications = $this->Html->url(array('controller' => 'businesses', 'action' => 'notifications'));
$ads_management = $this->Html->url(array('controller' => 'businesses', 'action' => 'ads_management'));
$faq = $this->Html->url(array('controller' => 'businesses', 'action' => 'faq'));
$avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
if (empty($notifycount)) {
    $notifycount = 0;
}
if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
    if ($this->Session->read('mapping')) {
        $gochannel = $this->Html->url('http://' . $this->Session->read('mapping_domain'));
    } else {
        $gochannel = $this->Html->url('http://' . $user['User']['seo_username'] . '.' . $pure_domain);
    }
} else {
    $gochannel = $this->Html->url(array('controller' => 'businesses', 'action' => 'mysite', $user['User']['id']));
}
if ($user['User']['picture'] == null) {
    $img = $this->Html->image("/img/avatars/$avatarImage.jpg", array('class' => 'avatar circular', "alt" => "clone user image"));
} else {
    $img = $this->Upload->image($user, 'User.picture', array(), array('class' => 'avatar circular', 'onerror' => 'imgError(this,"avatar");'));
}
?>
<div id="sidebar-default" class="main-sidebar">
    <div class="current-user">
        <a href="#" class="name">
            <?php echo $img ?>
            <span>
                <?php echo $user['User']['username'] ?>
                <i class="fa fa-chevron-down"></i>
            </span>
        </a>
        <ul class="menu">
            <?php if ($user['User']['role'] == 1) { ?>
                <li>
                    <a href="<?php echo $this->Html->url(array('controller' => 'admins', 'action' => 'games')); ?>">
                        Admin
                    </a>
                </li>
            <?php } ?>
            <li>
                <a href="<?php echo $ch_settings; ?>">
                    Account Settings
                </a>
            </li>
            <!-- -- <li>
                    <a href="<?php echo $settings; ?>" <?php if ($active == 'profile') echo 'class="active"'; ?>>
                            Billing
                    </a>
            </li> -- -->
            <li>
                <a href="<?php echo $notifications; ?>">
                    Notifications
                </a>
            </li>
            <!-- --  <li>
                <a href="<?php echo $settings; ?>">
                    Help & Support
                </a>
            </li> -- -->
            <li>
                <a href="<?php echo $logout ?>">Sign out</a>
            </li>
        </ul>
    </div>
    <!--<div class="bottom-menu hidden-sm">
        <ul>
            <li><a href="<?php echo $faq ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Help"><i class="ion-help"></i></a></li>
            <li>
                <a href="<?php echo $activities; ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Recent Activity Feed">
                    <i class="ion-archive"></i>
    <?php if (isset($notifycount) && $notifycount > 0) { ?>
                                        <span class="badge notification_count"><?php echo $notifycount; ?></span>
    <?php } ?>
                </a>
            </li>
            <li><a href="<?php echo $logout ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Sign Out"><i class="ion-log-out"></i></a></li>
        </ul>
    </div>-->
    <div class="menu-section">
        <h3>General</h3>
        <ul>
            <!-- -- <li>
                 <a href="<?php echo $profile ?>">
                     <i class="fa fa-user"></i> 
                     <span>Profile</span>
                 </a>
             </li> -- -->

            <li>
                <a href="<?php echo $gochannel ?>">
                    <i class="fa fa-desktop"></i> 
                    <span>Go to Channel</span>
                </a>
            </li>

            <li>
                <a href="<?php echo $index ?>" <?php if (isset($active) && $active == 'dashboard') echo 'class="active"'; ?>>
                    <i class="ion-ios7-speedometer"></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="sidebar">
                    <i class="fa fa-gamepad"></i> <span>Games</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu" <?php if (isset($bar) && $bar == 'Games') echo 'style="display:block"'; ?>>
                    <li><a href="<?php echo $mygames ?>" <?php if (isset($active) && $active == 'mygames') echo 'class="active"'; ?>>My Games</a></li>
                    <li><a href="<?php echo $favorites ?>" <?php if (isset($active) && $active == 'favorites') echo 'class="active"'; ?>>Favorites</a></li>
                    <li><a href="<?php echo $exploregames ?>" <?php if (isset($active) && $active == 'exploregames') echo 'class="active"'; ?>>Explore Games</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="sidebar">
                    <i class="ion-person-add"></i> <span>Channels</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu" <?php if (isset($bar) && $bar == 'Follow') echo 'style="display:block"'; ?>>
                    <li><a href="<?php echo $following ?>" <?php if (isset($active) && $active == 'following') echo 'class="active"'; ?>>Following</a></li>
                    <li><a href="<?php echo $followers ?>" <?php if (isset($active) && $active == 'followers') echo 'class="active"'; ?>>Followers</a></li>
                    <li><a href="<?php echo $explorechannels ?>" <?php if (isset($active) && $active == 'explorechannels') echo 'class="active"'; ?>>Explore Channels</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu-section">
        <h3>Application</h3>
        <ul>
            <li>
                <a href="<?php echo $activities ?>" <?php if (isset($active) && $active == 'activities') echo 'class="active"'; ?>>
                    <i class="fa fa-tasks"></i> 
                    <span>Latest Activity</span>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="sidebar">
                    <i class="ion-earth"></i> <span>App Pages</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu" <?php if (isset($bar) && $bar == 'step') echo 'style="display:block"'; ?>>
                    <li><a href="<?php echo $app_status ?>">App Status</a></li>
                    <!-- -- <li><a href="<?php echo $toolsNdocs ?>">Tools & Docs</a></li> -- -->
                    <li><a href="<?php echo $steps2launch ?>" <?php if (isset($active) && $active == 'steps') echo 'class="active"'; ?>>Steps to Launch</a></li>

                </ul>
            </li>
            <!-- -- <li>
                <a href="#" data-toggle="sidebar">
                    <i class="fa fa-space-shuttle"></i> <span>Upgrade</span>
                    <i class="red fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo $pricing ?>">Pricing (Plans)</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                </ul>
            </li> -- -->
        </ul>
    </div>
    <div class="menu-section">
        <h3>Admin</h3>
        <ul>
            <li>
                <a href="#" data-toggle="sidebar">
                    <i class="ion-person"></i> <span>My Account</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu" <?php if (isset($bar) && $bar == 'setting') echo 'style="display:block"'; ?>>
                    <?php if ($user['User']['role'] == 1) { ?>
                        <li>
                            <a href="<?php echo $this->Html->url(array('controller' => 'admins', 'action' => 'games')); ?>">
                                Admin
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="<?php echo $ch_settings; ?>" <?php if (isset($active) && $active == 'channel') echo 'class="active"'; ?>>
                            Settings
                        </a>
                    </li>
                    <!-- -- <li>
                            <a href="<?php echo $settings; ?>" <?php if (isset($active) && $active == 'profile') echo 'class="active"'; ?>>
                                    Billing
                            </a>
                    </li> -- -->
                    <li>
                        <a href="<?php echo $notifications; ?>" <?php if (isset($active) && $active == 'notification') echo 'class="active"'; ?>>
                            Notifications
                        </a>
                    </li>
                    <!-- -- <li>
                            <a href="<?php echo $settings; ?>">
                                    Support
                            </a>
                    </li> -- -->
                </ul>
            </li>
        </ul>
    </div>
    <div class="bottom-menu hidden-sm">
        <ul>
            <li><a href="#"><i class="ion-help"></i></a></li>
            <li>
                <a href="<?php echo $activities; ?>">
                    <i class="ion-archive"></i>
                    <?php echo $notifycount >= 1 ? '
                    <span class="flag"></span>
                </a>
                <ul class="menu">
                    <li><a href="' . $activities . '">' . $notifycount . ' unread activity</a></li>
                </ul>' : '</a>';
                    ?>
            </li>
            <li><a href="<?php echo $logout ?>"><i class="ion-log-out"></i></a></li>
        </ul>
    </div>
</div>
