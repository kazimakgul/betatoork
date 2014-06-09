<?php
$index = $this->Html->url(array('controller' => 'businesses', 'action' => 'dashboard'));
$profile = $this->Html->url(array('controller'=>'businesses','action'=>'profile'));
$settings = $this->Html->url(array('controller' => 'businesses', 'action' => 'channel_settings'));
$logout = $this->Html->url(array("controller" => "businesses", "action" => "logout"));
$mygames = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
$favorites = $this->Html->url(array('controller' => 'businesses', 'action' => 'favorites'));
$exploregames = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames'));
$following = $this->Html->url(array('controller' => 'businesses', 'action' => 'following'));
$followers = $this->Html->url(array('controller' => 'businesses', 'action' => 'followers'));
$avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
if ($user['User']['picture'] == null) {
    $img = $this->Html->image("/img/avatars/$avatarImage.jpg", array('class' => 'avatar circular', "alt" => "clone user image"));
} else {
    $img = $this->Upload->image($user, 'User.picture', array(), array('class' => 'avatar circular', 'onerror' => 'imgError(this,"avatar");'));
}
?>
<div id="sidebar-default" class="main-sidebar">
    <div class="current-user">
        <a href="index.html" class="name">
            <?= $img ?>
            <span>
                <?php echo $user['User']['username'] ?>
                <i class="fa fa-chevron-down"></i>
            </span>
        </a>
        <ul class="menu">
            <li>
                <a href="<?php echo $settings ?>">Account settings</a>
            </li>
            <li>
                <a href="<?php echo $settings ?>">Billing</a>
            </li>
            <li>
                <a href="<?php echo $settings ?>">Notifications</a>
            </li>
            <li>
                <a href="<?php echo $settings ?>">Help / Support</a>
            </li>
            <li>
                <a href="<?php echo $logout ?>">Sign out</a>
            </li>
        </ul>
    </div>
    <div class="menu-section">
        <h3>General</h3>
        <ul>
            <li>
                <a href="<?php echo $profile ?>">
                    <i class="fa fa-user"></i> 
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $index ?>" class="active">
                    <i class="ion-ios7-speedometer"></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="users.html" data-toggle="sidebar">
                    <i class="fa fa-gamepad"></i> <span>Games</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo $mygames ?>">My Games</a></li>
                    <li><a href="<?php echo $favorites ?>">Favorites</a></li>
                    <li><a href="<?php echo $exploregames ?>">Explore Games</a></li>
                </ul>
            </li>
            <li>
                <a href="users.html" data-toggle="sidebar">
                    <i class="ion-person-add"></i> <span>Follows</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo $following ?>">Following</a></li>
                    <li><a href="<?php echo $followers ?>">Followers</a></li>
                    <li><a href="reports-alt.html">Explore Channels</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu-section">
        <h3>Application</h3>
        <ul>

            <li>
                <a href="<?php echo $index ?>">
                    <i class="fa fa-tasks"></i> 
                    <span>Latest activity</span>
                </a>
            </li>

            <li>
                <a href="account.html" data-toggle="sidebar">
                    <i class="ion-earth"></i> <span>App Pages</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="status.html">App Status</a></li>
                    <li><a href="projects.html">Tools & Docs</a></li>
                    <li><a href="steps.html">Steps to launch</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="account.html" data-toggle="sidebar">
                    <i class="fa fa-space-shuttle"></i> <span>Upgrade</span>
                    <i class="red fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="pricing.html">Pricing (Plans)</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu-section">
        <h3>Admin</h3>
        <ul>
            <li>
                <a href="account.html" data-toggle="sidebar">
                    <i class="ion-person"></i> <span>My account</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo $settings ?>">Settings</a></li>
                    <li><a href="account-billing.html">Billing</a></li>
                    <li><a href="account-notifications.html">Notifications</a></li>
                    <li><a href="account-support.html">Support</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="bottom-menu hidden-sm">
        <ul>
            <li><a href="#"><i class="ion-help"></i></a></li>
            <li>
                <a href="#">
                    <i class="ion-archive"></i>
                    <span class="flag"></span>
                </a>
                <ul class="menu">
                    <li><a href="#">5 unread notifications</a></li>
                    <!-- <li><a href="#">3 features added</a></li> -->
                </ul>
            </li>
            <li><a href="<?php echo $logout ?>"><i class="ion-log-out"></i></a></li>
        </ul>
    </div>
</div>
