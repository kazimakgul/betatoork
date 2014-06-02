<?php if ($this->Paginator->param('pageCount') > 1) { ?>  
    <div style="clear: both;">
        <ul  class="pagination">
            <li><?php echo $this->Paginator->prev(__('Prev', false), array(), null, array('class' => 'disabled')); ?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  ' . $this->Paginator->next(__('Next', false), array('id' => 'next'), null, array('class' => 'disabled')); ?></li>
        </ul>
    </div>
<?php } ?>