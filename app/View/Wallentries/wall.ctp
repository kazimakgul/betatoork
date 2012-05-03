<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('channel_user_panel'); ?>
    <?php  echo $this->element('social'); ?>
    <?php echo $this->element('best_channels_left_menu'); ?>
    <?php echo $this->element('categories_left_menu'); ?>
  </div>
        
		
            <div class="right_panel">
                <div id="adsense" class="addadsense">
                <div class="wall">
          

          <?php if(count($entries) >= 1){ ?>
          <ul>
    <?php echo $this->element('wallentry'); ?>
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
        <?php } else { ?>
        <div class="alert alert-info channel"> You are not subscribed to any channels yet, subscribe a channel to be notified about new games from your favorite publishers. </div>
        <?php }?>


                </div>
                </div>
            </div>




</div>



