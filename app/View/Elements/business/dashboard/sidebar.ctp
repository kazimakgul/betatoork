<?php
$index = $this->Html->url(array('controller' => 'businesses', 'action' => 'dashboard'));
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
                <?= $user['User']['username'] ?>
                <i class="fa fa-chevron-down"></i>
            </span>
        </a>
        <ul class="menu">
            <li>
                <a href="<?= $settings ?>">Account settings</a>
            </li>
            <li>
                <a href="<?= $settings ?>">Billing</a>
            </li>
            <li>
                <a href="<?= $settings ?>">Notifications</a>
            </li>
            <li>
                <a href="<?= $settings ?>">Help / Support</a>
            </li>
            <li>
                <a href="<?= $logout ?>">Sign out</a>
            </li>
        </ul>
    </div>
    <div class="menu-section">
        <h3>General</h3>
        <ul>
            <li>
                <a href="<?= $index ?>" class="active">
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
                    <li><a href="<?= $mygames ?>">My Games</a></li>
                    <li><a href="<?= $favorites ?>">Favorites</a></li>
                    <li><a href="<?= $exploregames ?>">Explore Games</a></li>
                </ul>
            </li>
            <li>
                <a href="users.html" data-toggle="sidebar">
                    <i class="ion-person-add"></i> <span>Follows</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?= $following ?>">Following</a></li>
                    <li><a href="<?= $followers ?>">Followers</a></li>
                    <li><a href="reports-alt.html">Explore Channels</a></li>
                </ul>
            </li>
            <li>
                <a href="users.html" data-toggle="sidebar">
                    <i class="ion-pricetags"></i> <span>Forms</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="form.html">New Customer (validation)</a></li>
                    <li><a href="form-product.html">New Product (add-ons)</a></li>
                    <li><a href="wizard.html">Wizard</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu-section">
        <h3>Application</h3>
        <ul>
            <li>
                <a href="account.html" data-toggle="sidebar">
                    <i class="ion-earth"></i> <span>App Pages</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="sidebar.html">Inbox Messages</a></li>
                    <li><a href="user-profile.html">User profile</a></li>
                    <li><a href="latest-activity.html">Latest activity</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="steps.html">Steps to launch</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                </ul>
            </li>
            <li>
                <a href="account.html" data-toggle="sidebar">
                    <i class="ion-card"></i> <span>Pricing</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="pricing.html">Pricing (Plans)</a></li>
                    <li><a href="pricing-alt.html">Pricing charts</a></li>
                    <li><a href="billing-form.html">Billing form</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                </ul>
            </li>
            <li>
                <a href="account.html" data-toggle="sidebar">
                    <i class="ion-flash"></i> <span>Features</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="email-templates.html">Email templates</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="ui.html">UI Extras</a></li>
                    <li><a href="docs.html">API Documentation</a></li>
                    <li><a href="signup.html">Sign up</a></li>
                    <li><a href="signin.html">Sign in</a></li>
                    <li><a href="status.html">App Status</a></li>
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
                    <li><a href="<?= $settings ?>">Settings</a></li>
                    <li><a href="account-billing.html">Billing</a></li>
                    <li><a href="account-notifications.html">Notifications</a></li>
                    <li><a href="account-support.html">Support</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="sidebar">
                    <i class="ion-usb"></i> <span>Level Navigation</span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li>
                        <a href="invoice.html" data-toggle="sidebar">
                            Submenu
                            <i class="fa fa-chevron-down"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="#">Last menu</a></li>
                            <li><a href="#">Last menu</a></li>
                        </ul>
                    </li>
                    <li><a href="invoice.html">Menu link</a></li>
                    <li><a href="#">Extra link</a></li>
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
                    <li><a href="#">5 unread messages</a></li>
                    <li><a href="#">12 tasks completed</a></li>
                    <!-- <li><a href="#">3 features added</a></li> -->
                </ul>
            </li>
            <li><a href="<?= $logout ?>"><i class="ion-log-out"></i></a></li>
        </ul>
    </div>
</div>
