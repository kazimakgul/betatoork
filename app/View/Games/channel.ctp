<div class="content clearfix">
  <div class="left_panel">
    <?php  echo $this->element('channel_user_panel'); ?>
    <?php  echo $this->element('social'); ?>
    <?php echo $this->element('best_channels_left_menu'); ?>
    <?php echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="right_panel">
      <?php  echo $this->element('slider'); ?>




                <div id="channelgames">
                    <div class="clearfix">
                        <div class="channelgame"></div>
               <?php echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'toprated'),array('class'=>'seeall')); ?>
               </div>

                    <div class="sep"></div>
                    <ul>
           
             <li class="clearfix">
            <?php echo $this->element('most_played_game_box'); ?>
            </li>
            
                    </ul>

                </div>


                <div id="favoritegames">
                    <div class="clearfix">
                        <div class="favoritegames"></div>
                    <?php echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'toprated'),array('class'=>'seeall')); ?>
                    </div>
                    <div class="sep"></div>
                    <ul>
                     
                       <li class="clearfix">
                      <?php echo $this->element('most_played_game_box'); ?>
                      </li>
                      
                    </ul>
                </div>

          <div class="clear"></div>
          <div class="alert alert-info channel">You didn't add any game to your favorites and you didn't create a game that belongs to you.</div>



            </div>
        </div>



