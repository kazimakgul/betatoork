	
<div class="span11">
<div class="content">
<div class="content-body" style="padding-top:15px;">

<?php 
echo $this->element('NewPanel/admin/adminNavbar');
?>
<div class="search-content"></div>

<?php 
echo $this->element('NewPanel/admin/adminLog');
?>			
			
   
   
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
   


	</div>
    </div>
</div>

