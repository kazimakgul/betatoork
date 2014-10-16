<?php
   $index = $this->Html->url(array('plugin'=>'clone_admin','controller' => 'businesses', 'action' => 'dashboard'));
$profile = $this->Html->url(array('controller' => 'businesses', 'action' => 'profile'));
$cloneapi = $this->Html->url(array('controller' => 'businesses', 'action' => 'api'));
$pricing = $this->Html->url(array('controller' => 'businesses', 'action' => 'pricing'));
$steps2launch = $this->Html->url(array('controller' => 'businesses', 'action' => 'steps2launch'));
$settings = $this->Html->url(array('controller' => 'businesses', 'action' => 'channel_settings'));
$activities = $this->Html->url(array('controller' => 'businesses', 'action' => 'activities'));
$app_status = $this->Html->url(array('controller' => 'businesses', 'action' => 'app_status'));
$logout = $this->Html->url(array("plugin"=>false,"controller" => "businesses", "action" => "logout"));
   
   $managegames = $this->Html->url(array('plugin'=>'clone_admin','controller' => 'admins', 'action' => 'games'));

$favorites = $this->Html->url(array('controller' => 'businesses', 'action' => 'favorites'));
   
   $reportedgames = $this->Html->url(array('plugin'=>'clone_admin','controller' => 'businesses', 'action' => 'reportedgames'));
   $manageusers = $this->Html->url(array('plugin'=>'clone_admin','controller' => 'admins', 'action' => 'channels'));
   $premiumusers = $this->Html->url(array('plugin'=>'clone_admin','controller' => 'businesses', 'action' => 'premiumusers'));

   $managegroups = $this->Html->url(array('plugin'=>'acl_management','controller' => 'groups', 'action' => 'index'));
   $addgroup = $this->Html->url(array('plugin'=>'acl_management','controller' => 'groups', 'action' => 'add'));

   $permissions = $this->Html->url(array('plugin'=>'acl_management','controller' => 'user_permissions', 'action' => 'index'));

$ch_settings = $this->Html->url(array('controller' => 'businesses', 'action' => 'channel_settings'));
$notifications = $this->Html->url(array('controller' => 'businesses', 'action' => 'notifications'));
$ads_management = $this->Html->url(array('controller' => 'businesses', 'action' => 'ads_management'));
$faq = $this->Html->url(array('controller' => 'businesses', 'action' => 'faq'));
$avatarImage = $this->requestAction(array('plugin'=>false,'controller' => 'users', 'action' => 'randomAvatar'));
if (empty($notifycount)) {
    $notifycount = 0;
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
        <h3>Clone Admin-General</h3>
        <ul>
            
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
                    <li><a href="<?php echo $managegames ?>" <?php if (isset($active) && $active == 'mygames') echo 'class="active"'; ?>>Manage Games</a></li>
                    <li><a href="<?php echo $reportedgames ?>" <?php if (isset($active) && $active == 'favorites') echo 'class="active"'; ?>>Reported Games</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="sidebar">
                    <i class="ion-person-add"></i> <span>Channels</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu" <?php if (isset($bar) && $bar == 'Follow') echo 'style="display:block"'; ?>>
                    <li><a href="<?php echo $manageusers ?>" <?php if (isset($active) && $active == 'following') echo 'class="active"'; ?>>Manage Users</a></li>
                    <li><a href="<?php echo $premiumusers ?>" <?php if (isset($active) && $active == 'followers') echo 'class="active"'; ?>>Premium Users</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="sidebar">
                    <i class="fa fa-group"></i> <span>Groups</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu" <?php if (isset($bar) && $bar == 'Games') echo 'style="display:block"'; ?>>
                    <li><a href="<?php echo $managegroups ?>" <?php if (isset($active) && $active == 'mygames') echo 'class="active"'; ?>>Manage Groups</a></li>
                    <li><a href="<?php echo $addgroup ?>" <?php if (isset($active) && $active == 'favorites') echo 'class="active"'; ?>>Add Group</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="menu-section">
        <h3>Application</h3>
        <ul>
            <li>
                <a href="<?php echo $system_settins ?>" <?php if (isset($active) && $active == 'activities') echo 'class="active"'; ?>>
                    <i class="fa fa-gears"></i> 
                    <span>System Settings</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $permissions ?>" <?php if (isset($active) && $active == 'activities') echo 'class="active"'; ?>>
                    <i class="fa fa-key"></i> 
                    <span>Permissions</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $activities ?>" <?php if (isset($active) && $active == 'activities') echo 'class="active"'; ?>>
                    <i class="fa fa-tasks"></i> 
                    <span>Latest Activity</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $error_logs ?>" <?php if (isset($active) && $active == 'activities') echo 'class="active"'; ?>>
                    <i class="fa fa-file-text-o"></i> 
                    <span>Error Logs</span>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="sidebar">
                    <i class="ion-earth"></i> <span>App Pages</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu" <?php if (isset($bar) && $bar == 'step') echo 'style="display:block"'; ?>>
                    <li><a href="<?php echo $app_status ?>">App Status</a></li>
                    <li><a href="<?php echo $cloneapi ?>">Clone API</a></li>
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
