<div style="clear: both;">
    <ul  class="pagination">
        <li><?php echo $this->Paginator->prev(__('Prev', true), array(), null, array('class'=>'disabled'));?></li>
        <li><?php echo $this->Paginator->numbers(); ?></li>
        <li><?php echo '  '.$this->Paginator->next(__('Next', true), array('id'=>'next'), null, array('class' => 'disabled'));?></li>
    </ul>
</div>