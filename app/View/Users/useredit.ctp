<?php 

$options=array('1'=>'Admin','0'=>'User','2'=>'Editor');
$options2=array('1'=>'Active','0'=>'Passive');
$optionscheck=array('1'=>'Yes','0'=>'No');

?>


<div class="row-fluid">
    <div class="span12">
        <div class="box corner-all">
            <div class="box-header grd-white corner-top">
                <div class="header-control">
                    <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                    <a data-box="close" data-hide="bounceOutRight">×</a>
                </div>
                <span>Bordered</span>
            </div>
            <div class="box-body">
                <table class="table table-bordered responsive">
                    <thead>
	<tr>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('facebook_id');?></th>
			<th><?php echo $this->Paginator->sort('seo_username');?></th>
			<th><?php echo $this->Paginator->sort('role');?></th>
			<th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('active -> Effect Game?');?></th>
			<th><?php echo $this->Paginator->sort('Update - Activate');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
                    </thead>
                    <tbody>
	<?php
	foreach ($users as $user): ?>
	<tr>
	
	<?php 
	$attrole=array('value'=>1); 
	$attactive=array('value'=>1);
	?>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['facebook_id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['seo_username']); ?>&nbsp;</td>
		
		<?php echo $this->Form->create(null,array('url'=>'/users/useredit'));?>
		<td><?php  echo $this->Form->radio('role',$options,array('value'=>$user['User']['role']))?></td>
	   <td><?php  echo $this->Form->radio('active',$options2,array('value'=>$user['User']['active']))?></td>
	   <td><?php echo 'Game affect?'; 	echo $this->Form->checkbox('affect',$options2);?></td>
	   <td><?php  echo $this->Form->hidden('id',array('value'=>$user['User']['id']))?></td>
	<td><?php echo $this->Form->end(__('Update'));?></td>
	
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'adminedit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /box-body -->
        </div><!-- /box -->
    </div><!-- /span -->
</div>

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






