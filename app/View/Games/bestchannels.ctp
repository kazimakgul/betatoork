<div class="content clearfix">
  <div class="channel_left_panel">
      <?php  echo $this->element('userpanel'); ?>
      <?php  echo $this->element('social'); ?>
      <?php  echo $this->element('best_channels_left_menu'); ?>
      <?php  echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="channel_right_panel">
     <div id="subscriber">
        <div class="clearfix">
            <div class="best"></div>
           
        </div>

    <div class="sep"></div>
    
                    <ul>
           
                    <li class=" rowheight clearfix">
                    <?php echo $this->element('best_channel_card'); ?>
                    </li>
            
                    </ul>

        <div align='center' class="paging">
  <?php
    echo $this->Paginator->prev('< ' . __('back'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
  ?>
  <p>
  <?php
  echo $this->Paginator->counter(array(
  'format' => __('Page {:page} of {:pages}, showing {:current} games out of {:count} total')
  ));
  ?>
</p>

  </div>

                </div>
    
    </div>
  </div>
</div>