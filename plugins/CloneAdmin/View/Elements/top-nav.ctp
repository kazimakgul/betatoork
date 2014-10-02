<ul class="nav" data-dropdown="dropdown">

<li class="menu">
    <a class="menu" href="#">Group</a>
    <ul class="menu-dropdown">
        <li><a href="<?php echo $this->Html->url('/admin/groups');?>">Manage Group</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo $this->Html->url('/admin/groups/add');?>">New Group</a></li>
    </ul>
</li>
<li><a href="<?php echo $this->Html->url('/admin/user_permissions');?>">Permission</a></li>
</ul>
<?php
if($this->Session->check('Auth.User.id')){
?>
<ul class="nav secondary-nav">
  <li class="menu"><a>Hi, <?php echo $this->Session->read('Auth.User.username');?></a></li>
  <li class="menu"><?php echo $this->Html->link('Go to General Panel', array('plugin' => false,'controller' => 'admins', 'action' => 'games'));?></li>
  <li class="menu"><?php echo $this->Html->link('Logout', array('plugin' => false,'controller' => 'businesses', 'action' => 'logout'));?></li>
</ul>
<?php
}
?>
