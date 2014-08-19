<?php
if(isset($controller) && $controller == FALSE){
?>
    <div style="clear: both;">
        <ul  class="pagination">
            <li><?php echo $this->Paginator->prev(__('Prev', false), array(), null, array('class' => 'disabled')); ?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  ' . $this->Paginator->next(__('Next', false), array('id' => 'next'), null, array('class' => 'disabled')); ?></li>
        </ul>
        <div style="opacity:0.5;">
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} Items out of {:count} total')));?>
        </div>
    </div>
<?php
}else{
$params = $this->Paginator->params();
$pageCount = $params['pageCount'];
if ($pageCount > 1) {
    ?>
    <div style="clear: both;">
        <ul  class="pagination">
            <li><?php echo $this->Paginator->prev(__('Prev', false), array(), null, array('class' => 'disabled')); ?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  ' . $this->Paginator->next(__('Next', false), array('id' => 'next'), null, array('class' => 'disabled')); ?></li>
        </ul>
        <div style="opacity:0.5;">
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} Items out of {:count} total')));?>
        </div>
    </div>
<?php }
}
?>