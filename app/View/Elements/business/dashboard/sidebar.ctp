<?php
$index = $this->Html->url(array('controller' => 'businesses', 'action' => 'dashboard'));
$profile = $this->Html->url(array('controller'=>'businesses','action'=>'profile'));
$toolsNdocs = $this->Html->url(array('controller'=>'businesses','action'=>'toolsNdocs'));
$pricing = $this->Html->url(array('controller'=>'businesses','action'=>'pricing'));
$steps2launch = $this->Html->url(array('controller'=>'businesses','action'=>'steps2launch'));
$settings = $this->Html->url(array('controller' => 'businesses', 'action' => 'channel_settings'));
$activities = $this->Html->url(array('controller'=>'businesses','action'=>'activities'));
$app_status = $this->Html->url(array('controller'=>'businesses','action'=>'app_status'));
$logout = $this->Html->url(array("controller" => "businesses", "action" => "logout"));
$mygames = $this->Html->url(array('controller' => 'businesses', 'action' => 'mygames'));
$favorites = $this->Html->url(array('controller' => 'businesses', 'action' => 'favorites'));
$exploregames = $this->Html->url(array('controller' => 'businesses', 'action' => 'exploregames'));
$following = $this->Html->url(array('controller' => 'businesses', 'action' => 'following'));
$followers = $this->Html->url(array('controller' => 'businesses', 'action' => 'followers'));
$explorechannels = $this->Html->url(array('controller' => 'businesses', 'action' => 'explorechannels'));
$ch_settings	= $this->Html->url(array('controller'=>'businesses','action'=>'channel_settings'));
$notifications	= $this->Html->url(array('controller'=>'businesses','action'=>'notifications'));
$ads_management	= $this->Html->url(array('controller'=>'businesses','action'=>'ads_management'));
$avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
$gochannel = $this->Html->url(array('controller'=>'businesses','action'=>'mysite',$user['User']['id']));
if ($user['User']['picture'] == null) {
    $img = $this->Html->image("/img/avatars/$avatarImage.jpg", array('class' => 'avatar circular', "alt" => "clone user image"));
} else {
    $img = $this->Upload->image($user, 'User.picture', array(), array('class' => 'avatar circular', 'onerror' => 'imgError(this,"avatar");'));
}
?>
<div id="sidebar-default" class="main-sidebar">
    <div class="current-user">
        <a href="index.html" class="name">
            <?php echo $img ?>
            <span>
                <?php echo $user['User']['username'] ?>
                <i class="fa fa-chevron-down"></i>
            </span>
        </a>
        <ul class="menu">
		<li>
			<a href="<?php echo $ch_settings;?>" <?php if($active=='settings')echo 'class="active"'; ?>>
				Account Settings
			</a>
		</li>
		<li>
			<a href="<?php echo $settings;?>" <?php if($active=='profile')echo 'class="active"'; ?>>
				Billing
			</a>
		</li>
		<li>
			<a href="<?php echo $notifications;?>" <?php if($active=='notification')echo 'class="active"'; ?>>
				Notifications
			</a>
		</li>
        <li>
            <a href="<?php echo $settings;?>">
                Help & Support
            </a>
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
                <a href="<?php echo $gochannel ?>">
                    <i class="fa fa-play"></i> 
                    <span>Go to channel</span>
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
                    <li><a href="<?php echo $explorechannels ?>">Explore Channels</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="menu-section">
        <h3>Application</h3>
        <ul>
            <li>
                <a href="<?php echo $activities ?>">
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
                    <li><a href="<?php echo $app_status ?>">App Status</a></li>
                    <li><a href="<?php echo $toolsNdocs ?>">Tools & Docs</a></li>
                    <li><a href="<?php echo $steps2launch ?>">Steps to launch</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="sidebar">
                    <i class="fa fa-space-shuttle"></i> <span>Upgrade</span>
                    <i class="red fa fa-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo $pricing ?>">Pricing (Plans)</a></li>
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
							<li>
								<a href="<?php echo $ch_settings;?>" <?php if($active=='channel')echo 'class="active"'; ?>>
									Settings
								</a>
							</li>
							<li>
								<a href="<?php echo $settings;?>" <?php if($active=='profile')echo 'class="active"'; ?>>
									Billing
								</a>
							</li>
							<li>
								<a href="<?php echo $notifications;?>" <?php if($active=='notification')echo 'class="active"'; ?>>
									Notifications
								</a>
							</li>
							<li>
								<a href="<?php echo $settings;?>">
									Support
								</a>
							</li>
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
