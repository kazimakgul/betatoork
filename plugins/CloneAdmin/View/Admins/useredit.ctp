<?php 

$options=array('1'=>'Admin','0'=>'User','2'=>'Editor');
$options2=array('1'=>'Active','0'=>'Passive');
$optionscheck=array('1'=>'Yes','0'=>'No');

?>


                <div class="span11">
                    <!-- content -->
                    <div class="content">
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">


<div class="row-fluid">
    <div class="span12">
        <div class="box corner-all">
            <div class="box-header grd-white corner-top">
                <div class="header-control">
                    <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                    <a data-box="close" data-hide="bounceOutRight">×</a>
                </div>
                <span>Users</span>
            </div>
            <div class="box-body">
                <table class="table table-bordered responsive">
                    <thead>
	<tr>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('username');?> - <?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('role');?> - <?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('active -> Effect Game?');?></th>
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
		<td><?php echo h($user['User']['username']); ?>&nbsp; <?php echo h($user['User']['email']); ?>&nbsp;</td>
		
		<?php echo $this->Form->create(null,array('url'=>'/users/useredit'));?>
		<td><?php  echo $this->Form->select('role',$options,array('value'=>$user['User']['role']))?>
	   <?php  echo $this->Form->select('active',$options2,array('value'=>$user['User']['active']))?></td>
	   <td><?php echo 'Game affect?'; 	echo $this->Form->checkbox('affect',$options2);?></td>
	   <td><?php  echo $this->Form->hidden('id',array('value'=>$user['User']['id']))?> <?php echo $this->Form->end(__('Update'));?></td>

	
		<td class="actions">
			<div class="btn btn-mini"><?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?></div>
			<div class="btn btn-mini btn-success"><?php echo $this->Html->link(__('Edit'), array('action' => 'adminedit', $user['User']['id'])); ?></div>
			<div class="btn btn-mini btn-danger"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </div>
		</td>
	</tr>
<?php endforeach; ?>
                    </tbody>
                </table>

<!--Hidden Pagination -->
    <div class="pagination pagination-centered">
        <ul>
            <li><?php echo $this->Paginator->prev(__('Prev', true), array(), null, array('class'=>'disabled'));?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  '.$this->Paginator->next(__('Next', true), array('id'=>'next'), null, array('class' => 'disabled'));?></li>
        </ul>
        <div style="opacity:0.5;">
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} Members out of {:count} total')));?>
        </div>
    </div>
    <!--Hidden Pagination -->

            </div><!-- /box-body -->
        </div><!-- /box -->
    </div><!-- /span -->
</div>



        </div><!-- /box -->
    </div><!-- /span -->
</div>




