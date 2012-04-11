<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('channel_user_panel'); ?>
	<?php  echo $this->element('subscribe'); ?>
    <?php  echo $this->element('social'); ?>
    <?php echo $this->element('best_channels_left_menu'); ?>
    <?php echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="channel_right_panel">
      <?php  echo $this->element('slider'); ?>


               <div id="channelgames">
                    <div class="clearfix">
                        <div class="channelgame"></div>
              
              <?php 
              if(count($mygames) <= $limit){}
              else{
                echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'toprated'),array('class'=>'seeall')); 
              } ?>
               </div>

                    <div class="sep"></div>

                    <?php if(count($mygames) >= 1){ ?>
                    <ul>
           
                     <li class="clearfix">
                    <?php echo $this->element('mygames_game_box'); ?>
                    </li>
            
                    </ul>

                    <?php } 
                    else { ?>

                <div class="alert alert-info channel">You didn't add any games, add some games using left panel</div>
                <?php }?>

                </div>


                <div id="favoritegames">
                    <div class="clearfix">
                        <div class="favoritegames"></div>

                    <?php 
                    if(count($mygames) <= $limit){}
                    else{
                      echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'toprated'),array('class'=>'seeall')); 
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
                  <div class="alert alert-info channel">You dont have any favorite game, add a game to your favorites by clicking on the heart button while playing a game.</div>
                  <?php }?>

                </div>

          <div class="clear"></div>
        


            </div>
        </div>



