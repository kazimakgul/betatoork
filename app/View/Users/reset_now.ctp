<div class="wrapper" >
<div class="content">

<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Password Reset'); ?></legend>
	<?php
		
		echo $this->Form->input('new_password',array('required','placeholder' => 'Must be at least 6 characters long','type'=>'password'));
		echo $this->Form->input('confirm_new_password',array('required','placeholder' => 'Must be same as above','type'=>'password'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	<li><?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'register')); ?> </li>
		<li><?php echo $this->Html->link(__('Play Games'), array('controller'=>'games','action' => 'index'));?></li>	
	</ul>
</div>


</div>
</div>