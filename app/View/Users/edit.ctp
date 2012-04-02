<div class="wrapper" >
<div class="content">
<?php
echo $this->element('logedinButtons');
?>
<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
	
		echo $this->Form->input('username',array('required','placeholder' => 'Ex: GameMonster'));
		
	?>
	<a>Your Email: <?php echo $this->Session->read('Auth.User.email');?></a>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	<li><?php echo $this->Html->link(__('Profile Edit'), array('action' => 'edit',$this->Session->read('Auth.User.id'))); ?></li>
	<li><?php echo $this->Html->link(__('Password Edit'), array('action' => 'password',$this->Session->read('Auth.User.id'))); ?></li>
	</ul>
</div>


</div>
</div>