<div class="wrapper" >
<div class="content">

<?php 

 $options=array('1'=>'Admin','0'=>'User','2'=>'Editor');
$options2=array('1'=>'Active','0'=>'Passive');
$optionscheck=array('1'=>'Yes','0'=>'No');

?>
<div class="users index">
	<h2><?php echo __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('role');?></th>
			<th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('active -> Effect Game?');?></th>
			<th><?php echo $this->Paginator->sort('Update - Activate');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
	
	<?php 
	$attrole=array('value'=>1); 
	$attactive=array('value'=>1);
	?>
	
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		
		<?php echo $this->Form->create(null,array('url'=>'/users/useredit'));?>
		<td><?php  echo $this->Form->radio('role',$options,array('value'=>$user['User']['role']))?></td>
	   <td><?php  echo $this->Form->radio('active',$options2,array('value'=>$user['User']['active']))?></td>
	   <td><?php echo 'Game affect?'; 	echo $this->Form->checkbox('affect',$options2);?></td>
	   <td><?php  echo $this->Form->hidden('id',array('value'=>$user['User']['id']))?></td>
	<td><?php echo $this->Form->end(__('Update'));?></td>
	
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
