




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



