<?php
$games_url = $this->Html->url(array('controller' => 'admins', 'action' => 'games'));
$channels_url = $this->Html->url(array('controller' => 'admins', 'action' => 'channels'));
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
</div>