<div class="rates form">
<?php echo $this->Form->create('Rate');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Rate'); ?></legend>
	<?php
		echo $this->Form->input('Game_id');
		echo $this->Form->input('User_id');
		echo $this->Form->input('id');
		echo $this->Form->input('Total');
		echo $this->Form->input('Current');
		echo $this->Form->input('Count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Rate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Rate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rates'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
