<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('logged_user_panel'); ?>
    <?php  echo $this->element('subscribe'); ?>
    <?php  echo $this->element('social'); ?>
    <?php echo $this->element('best_channels_left_menu'); ?>
    <?php echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="channel_right_panel">
      <?php  echo $this->element('usergames_slider'); ?>


               <div id="channelgames">
                    <div class="clearfix">
                        <div class="channelgame"></div>
              
              <?php 
              if(count($mygames) <= $limit-1){}
              else{
                echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'allusergames',$userid),array('class'=>'seeall')); 
              } ?>
               </div>

                    <div class="sep"></div>

                    <?php if(count($mygames) >= 1){ ?>
                    <ul>
           
                     <li class="clearfix">
                    <?php echo $this->element('usergames_game_box'); ?>
                    </li>
            
                    </ul>

                    <?php } 
                    else { ?>

                <div class="alert alert-info channel"><?php echo $username ?> didn't add any games yet, Subscribe to his channel to get notified when new games added</div>
                <?php }?>

                </div>


                <div id="favoritegames">
                    <div class="clearfix">
                        <div class="favoritegames"></div>

                    <?php 
                    if(count($favorites) <= $limit-1){}
                    else{
                      echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'alluserfavorites',$userid),array('class'=>'seeall')); 
                    } ?>

                    </div>
                    <div class="sep"></div>

                    <?php if(count($favorites) >= 1){ ?>
                    <ul>
                     
                       <li class="clearfix">
                      <?php echo $this->element('favorites_game_box'); ?>
                      </li>
                      
                    </ul>

                    <?php } 
                    else { ?>
                  <div class="alert alert-info channel"><?php echo $username ?> doesn't have any favorite games yet</div>
                  <?php }?>

                </div>



                 <div id="subscriber">
                    <div class="clearfix">
                        <div class="chainstitle"></div>

                    <?php 
                    if(count($users) <= $limit2-1){}
                    else{
                      echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'subscriptions',$userid),array('class'=>'seeall_channel')); 
                    } ?>

                    </div>
                    <div class="sep"></div>

                    <?php if(count($users) >= 1){ ?>
                    <ul>
                     
                       <li class="clearfix">
                      <?php echo $this->element('channelgames_sub_card'); ?>
                      </li>
                      
                    </ul>

                    <?php } 
                    else { ?>
                  <div class="alert alert-info channel"><?php echo $username ?> doesn't have any Chains yet</div>
                  <?php }?>

                </div>

          <div class="clear"></div>
      




                </div>


            </div>



