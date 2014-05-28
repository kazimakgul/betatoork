<div style="clear: both;">
	<ul  class="pagination">
		<li><?php echo $this->Paginator->prev(__('Prev', false), array(), null, array('class'=>'disabled'));?></li>
		<li><?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?></li>
		<li><?php echo '  '.$this->Paginator->next(__('Next', false), array('id'=>'next'), null, array('class' => 'disabled'));?></li>
	</ul>
</div>