<?php
$addgame=$this->Html->url(array( "controller" => "games","action" =>"add"));
$top=$this->Html->url(array( "controller" => "games","action" =>"toprated"));
$most=$this->Html->url(array( "controller" => "games","action" =>"mostplayed"));
$best=$this->Html->url(array( "controller" => "games","action" =>"bestchannels"));
?>

<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('channel_user_panel'); ?>
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
                echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'allchannelgames'),array('class'=>'seeall')); 
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

                <div class="alert alert-info channel">You didn't add any games, add some games now

<div id="addButton">
<a href="<?php echo $addgame ?>"><input type="submit" id="submit" value="+ Add Game"></a>
</div>
                </div>
                <?php }?>


                </div>


                <div id="favoritegames">
                    <div class="clearfix">
                        <div class="favoritegames"></div>

                    <?php 
                    if(count($favorites) <= $limit-1){}
                    else{
                      echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'allchannelfavorites'),array('class'=>'seeall')); 
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
                  <div class="alert alert-info channel">You dont have any favorite game, add a game to your favorites by clicking the heart button while playing a game. Check our top rated games and most played games sections to find your favorite games.
<div id="addButton">
<a href="<?php echo $top ?>"><input type="submit" id="submit" value="Top Rated"></a>
<a href="<?php echo $most ?>"><input type="submit" id="submit" value="Most Played"></a>
</div>

                  </div>
                  <?php }?>




                    <div class="clearfix">
                        <div class="subscriptionhd"></div>

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
                  <div class="alert alert-info channel">You dont have any Chains yet, Please check our best channels to get connected to your favorite channels. 
<div id="addButton">
<a href="<?php echo $best ?>"><input type="submit" id="submit" value="Best Channels"></a>
</div>

                  </div>
                  <?php }?>




                </div>

          <div class="clear"></div>
        


            </div>
        </div>



