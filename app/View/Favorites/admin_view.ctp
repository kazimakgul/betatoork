<div class="favorites view">
<h2><?php  echo __('Favorite');?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($favorite['User']['id'], array('controller' => 'users', 'action' => 'view', $favorite['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Game'); ?></dt>
		<dd>
			<?php echo $this->Html->link($favorite['Game']['id'], array('controller' => 'games', 'action' => 'view', $favorite['Game']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($favorite['Favorite']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Favorite'), array('action' => 'edit', $favorite['Favorite']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Favorite'), array('action' => 'delete', $favorite['Favorite']['id']), null, __('Are you sure you want to delete # %s?', $favorite['Favorite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Favorites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Favorite'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); ?> </li>
	</ul>
</div>
