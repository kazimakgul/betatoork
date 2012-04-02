<div class="rates view">
<h2><?php  echo __('Rate');?></h2>
	<dl>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rate['Game']['id'], array('controller' => 'games', 'action' => 'view', $rate['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rate['User']['id'], array('controller' => 'users', 'action' => 'view', $rate['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rate['Rate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($rate['Rate']['Total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current'); ?></dt>
		<dd>
			<?php echo h($rate['Rate']['Current']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Count'); ?></dt>
		<dd>
			<?php echo h($rate['Rate']['Count']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rate'), array('action' => 'edit', $rate['Rate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rate'), array('action' => 'delete', $rate['Rate']['id']), null, __('Are you sure you want to delete # %s?', $rate['Rate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
