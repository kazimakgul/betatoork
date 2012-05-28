<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('logged_user_panel'); ?>
      <?php  echo $this->element('subscribe'); ?>
      <?php  echo $this->element('social'); ?>
      <?php  echo $this->element('best_channels_left_menu'); ?>
      <?php  echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="channel_right_panel">
     <div id="subscriber">
        <div class="clearfix">
            <div class="subscriberhd"></div>
           
        </div>

    <div class="sep"></div>



                    <?php if(count($followers) >= 1){ ?>
                    <ul>
           
                    <li class=" rowheight clearfix">
                    <?php echo $this->element('follower_card'); ?>
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
                    

                    <?php } 
                    else { ?>

                <div class="alert alert-info channel"> No body is following <?php echo $username ?> yet, be the first to follow and get notified when new games published by them.</div>
                <?php }?>

                </div>


    </div>
  </div>
</div>




