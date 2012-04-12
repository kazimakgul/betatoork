<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('logged_user_panel'); ?>
    <?php  echo $this->element('subscribe'); ?>
    <?php  echo $this->element('social'); ?>
    <?php echo $this->element('best_channels_left_menu'); ?>
    <?php echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="channel_right_panel">
  
                <div id="subscriber">
                    <div class="clearfix">
                        <div class="subscriberhd"></div>
                        <span class="subcount">(542)</span>
                    </div>

                                        <div class="sep"></div>
                    <ul>
                        <li class="rowheight clearfix">
                            <div id="card1" class="subcard">
                                <div class="subup clearfix">
                                    <a class="channelname" href="javascript:void();">xxgamer</a>
                                    <a class="viewchannel" href="javascript:void();"></a>
                                    <a class="block" href="javascript:void();"></a>
                                </div>
                                <div class="submid clearfix">
                                    <div class="cardsep"></div>
                                    <div class="channelavatar">
                                        <img alt="" src="image/channelavatar/channel_avatar.jpg" />
                                    </div>
                                    <ul>
                                        <li class="clearfix"><a class="" href="javascript:void();">27 Added Games</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">53 Favorite Games</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">53 Played Games</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">546 Subscribers</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">678 Subscriptions</a></li>
                                    </ul>

                                </div>
                                <div class="subdown"></div>
                            </div>
                            <div id="card2" class="subcard">
                                <div class="subup clearfix">
                                    <a class="channelname" href="javascript:void();">xxgamer</a>
                                    <a class="viewchannel" href="javascript:void();"></a>
                                    <a class="block" href="javascript:void();"></a>
                                </div>
                                <div class="submid clearfix">
                                    <div class="cardsep"></div>
                                    <div class="channelavatar">
                                        <img alt="" src="image/channelavatar/channel_avatar.jpg" />
                                    </div>
                                    <ul>
                                        <li class="clearfix"><a class="" href="javascript:void();">27 Added Games</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">53 Favorite Games</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">53 Played Games</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">546 Subscribers</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">678 Subscriptions</a></li>
                                    </ul>

                                </div>
                                <div class="subdown"></div>
                            </div>
                            <div id="card3" class="subcard">
                                <div class="subup clearfix">
                                    <a class="channelname" href="javascript:void();">xxgamer</a>
                                    <a class="viewchannel" href="javascript:void();"></a>
                                    <a class="block" href="javascript:void();"></a>
                                </div>
                                <div class="submid clearfix">
                                    <div class="cardsep"></div>
                                    <div class="channelavatar">
                                        <img alt="" src="image/channelavatar/channel_avatar.jpg" />
                                    </div>
                                    <ul>
                                        <li class="clearfix"><a class="" href="javascript:void();">27 Added Games</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">53 Favorite Games</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">53 Played Games</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">546 Subscribers</a></li>
                                        <li class="clearfix"><a class="" href="javascript:void();">678 Subscriptions</a></li>
                                    </ul>

                                </div>
                                <div class="subdown"></div>
                            </div>
                        </li>
                    </ul>
              
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

                <div class="alert alert-info channel"><?php echo $username ?> didn't add any games yet, Subscribe to his channel to get notified when new games added</div>
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
                  <div class="alert alert-info channel"><?php echo $username ?> doesn't have any favorite games yet</div>
                  <?php }?>

                </div>

          <div class="clear"></div>
        


            </div>
        </div>



