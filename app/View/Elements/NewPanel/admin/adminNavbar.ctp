<?php
$users = $this->Html->url(array("controller" => "admins", "action" => "users"));
$games = $this->Html->url(array("controller" => "admins", "action" => "games"));
$bots = $this->Html->url(array("controller" => "admins", "action" => "bots"));
$game_add = $this->Html->url(array("controller" => "admins", "action" => "game_add"));
if ($this->params['action'] == 'mass_pwd_change') {
    $admins = $this->Html->url(array("controller" => "admins", "action" => "mass_pwd_change", 1));
    $managers = $this->Html->url(array("controller" => "admins", "action" => "mass_pwd_change", 2));
} else {
    $admins = $this->Html->url(array("controller" => "admins", "action" => "users", 1));
    $managers = $this->Html->url(array("controller" => "admins", "action" => "users", 2));
}
$action = $this->params['action'];
$orders = $this->Html->url(array("controller" => "admins", "action" => "orders"));
$activities = $this->Html->url(array("controller" => "admins", "action" => "activities"));
$messages = $this->Html->url(array("controller" => "admins", "action" => "messages"));
$mass_pwd_change = $this->Html->url(array("controller" => "admins", "action" => "mass_pwd_change"));
?>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo $users; ?>"></a>
            <div class="nav-collapse collapse navbar-responsive-collapse">
                <ul class="nav">
                    <li class="<?php if ($action == 'users') echo 'active'; ?>"><a href="<?php echo $users; ?>">Users</a></li>
                    <li class="<?php if ($action == 'games') echo 'active'; ?>"><a href="<?php echo $games; ?>">Games</a></li>
                    <li class="<?php if ($action == 'game_add') echo 'active'; ?>"><a href="<?php echo $game_add; ?>">Game Add</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Insights <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $orders; ?>">Orders</a></li>
                            <li><a href="<?php echo $activities; ?>">Activities</a></li>
                            <li><a href="<?php echo $messages; ?>">Messages</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Nav header</li>
                            <li><a href="<?php echo $mass_pwd_change; ?>">Mass User Edit</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-search pull-left" action="">
                    <input placeholder="Search now..." name="adm_search_box"  class="search-query input-large adm_usr_src" type="text" value="">
                </form>
                <ul class="nav pull-right">
                    <li><a href="#">Link</a></li>
                    <?php if ($action != 'game_add' && $action != 'game_edit') { ?>
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter/Sort <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $users; ?>">Users</a></li>
                                <li><a href="<?php echo $bots; ?>">Bots</a></li>
                                <li><a href="<?php echo $admins; ?>">Admins(Role:1)</a></li>
                                <li><a href="<?php echo $managers; ?>">Managers(Role:2)</a></li>
                                <li class="divider"></li>
                                <li><?php echo $this->Paginator->sort('created', 'Sort by Date'); ?></li>
                                <li><?php echo $this->Paginator->sort('last_login', 'Sort By Last Login', array('direction' => 'desc')); ?></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>