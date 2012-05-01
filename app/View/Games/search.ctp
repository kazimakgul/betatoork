<div class="content clearfix">
  <div class="left_panel">
      <?php  echo $this->element('userpanel'); ?>
      <?php  echo $this->element('social'); ?>
      <?php  echo $this->element('best_channels_left_menu'); ?>
      <?php  echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="right_panel">
    <div class="searchresult"></div>
        <div class="clearfix"></div>
              
              <div class="sep"></div>

                    <?php if(count($search) >= 1){ ?>
                    <ul>
           
                     <li class="clearfix">
                    <?php echo $this->element('search_game_box'); ?>
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

                <div class="alert alert-info channel">The game you are searching is not added yet, you can add this game after you become a member.</div>
                <?php }?>

                </div>


              

          <div class="clear"></div>
        
        </div>



