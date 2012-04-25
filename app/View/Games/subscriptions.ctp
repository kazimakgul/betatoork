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
            <div class="subscriptionhd"></div>
           
        </div>

    <div class="sep"></div>
    


                    <?php if(count($followers) >= 1){ ?>
                    <ul>
           
                    <li class=" rowheight clearfix">
                    <?php echo $this->element('subscribe_card'); ?>
                    </li>
            
                    </ul>

                    <?php } 
                    else { ?>

                <div class="alert alert-info channel"> <?php echo $username ?> didn't subscribed any channels yet </div>
                <?php }?>

                </div>
    
    </div>
  </div>
</div>