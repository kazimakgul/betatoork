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
		echo $this->Form->input('old_password',array('required','placeholder' => 'Write your current password','type'=>'password'));
		echo $this->Form->input('new_password',array('required','placeholder' => 'Must be at least 6 characters long','type'=>'password'));
		echo $this->Form->input('confirm_new_password',array('required','placeholder' => 'Must be same as above','type'=>'password'));
		
	?>
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