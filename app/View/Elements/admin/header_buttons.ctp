<?php
$games_url = $this->Html->url(array('controller' => 'admins', 'action' => 'games'));
$channels_url = $this->Html->url(array('controller' => 'admins', 'action' => 'channels'));
$groups= $this->Html->url(array('controller' => 'admin', 'action' => 'groups'));
$perms= $this->Html->url(array('controller' => 'admin', 'action' => 'user_permissions'));

?>
<div class="pull-right hidden-xs" style="margin-top: -5px">
    <a href="<?php echo $games_url; ?>" class="btn btn-default">
        <i class="fa fa-gamepad"></i>
        Games
    </a>
    <a href="<?php echo $channels_url; ?>" class="btn btn-default">
        <i class="ion-person-add"></i>
        Channels
    </a>

    <a href="<?php echo $groups; ?>" class="btn btn-default">
        <i class="ion-person-add"></i>
        Groups
    </a>

    <a href="<?php echo $perms; ?>" class="btn btn-default">
        <i class="ion-person-add"></i>
        Permissions
    </a>
    
</div>