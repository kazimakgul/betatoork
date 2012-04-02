<div class="wrapper" >
<div class="content">

<?php
echo $this->element('logedinButtons');
?>

<div style="margin-top:80px;">

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th ><?php echo $this->Paginator->sort('picture');?></th>
			<th ><?php echo $this->Paginator->sort('name');?></th>
			<th ><?php echo $this->Paginator->sort('link');?></th>
			<th ><?php echo $this->Paginator->sort('description');?></th>
			<th ><?php echo $this->Paginator->sort('active');?></th>
			<th ><?php echo $this->Paginator->sort('category_id');?></th>
			<th ><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($mygames as $game): ?>
	<tr>
		<td><?php echo $this->Upload->image($game,'Game.picture'); ?></td>
		<td><?php echo h($game['Game']['name']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['link']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['description']); ?>&nbsp;</td>
		<td><?php echo h($game['Game']['active']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($game['Category']['name'], array('controller' => 'categories', 'action' => 'view', $game['Category']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Play'), array('action' => 'play', $game['Game']['id'])); ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $game['Game']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $game['Game']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>


	<div align='center' class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
</p>
	</div>
	<br><br><br>

</div>

</div>
</div>
