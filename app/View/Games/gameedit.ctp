<div class="wrapper" >
<div class="content">
<?php
echo $this->element('logedinButtons');
?>

<?php 
$options2=array('1'=>'Active','0'=>'Passive');
?>
<div class="games index">
	<h2><?php echo __('Games');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('link');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($games as $game): ?>
	<tr>
		<td><?php echo h($game['Game']['id']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['name']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['link']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['description']); ?>&nbsp;</td>
		
		<?php echo $this->Form->create(null,array('url'=>'/games/gameedit/'));?>
	   <td><?php  echo $this->Form->radio('active',$options2,array('value'=>$game['Game']['active']))?></td>
	   <td><?php  echo $this->Form->hidden('id',array('value'=>$game['Game']['id']))?></td>
		<td><?php echo $this->Form->end(__('Update'));?></td>


		<td>
			<?php echo $this->Html->link($game['User']['id'], array('controller' => 'users', 'action' => 'view', $game['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($game['Category']['id'], array('controller' => 'categories', 'action' => 'view', $game['Category']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Play'), array('action' => 'play', $game['Game']['id'])); ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $game['Game']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $game['Game']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $game['Game']['id']), null, __('Are you sure you want to delete # %s?', $game['Game']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	<br><br><br>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	<li><?php echo $this->Html->link(__('Users List'), array('controller'=>'users','action' => 'useredit',$this->Session->read('Auth.User.id'))); ?></li>
	<li><?php echo $this->Html->link(__('Games List'), array('controller'=>'games', 'action' => 'gameedit')); ?></li>
	<li><?php echo $this->Html->link(__('Profile Edit'), array('controller'=>'users','action' => 'edit',$this->Session->read('Auth.User.id'))); ?></li>
	<li><?php echo $this->Html->link(__('Password Edit'), array('controller'=>'users','action' => 'password',$this->Session->read('Auth.User.id'))); ?></li>
	</ul>
</div>
</div>
</div>