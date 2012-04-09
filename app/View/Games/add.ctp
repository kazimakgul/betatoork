<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('channel_user_panel'); ?>
    <?php  echo $this->element('social'); ?>
    <?php echo $this->element('best_channels_left_menu'); ?>
    <?php echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="channel_right_panel">

<!-- Add Game UI is here-->        
	<div class="games form">
	<?php echo $this->Form->create('Game', array('type' => 'file'));?>
		<fieldset>
			<legend><?php echo __('Add Game'); ?></legend>
		<?php
			echo $this->Form->input('name',array('required','placeholder' => 'Metal Slug Brutal 3'));
			echo $this->Form->input('link',array('required','placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'text', 'length' => 100));
			echo $this->Form->input('description',array('required','placeholder' => 'Write few words about the game please','type' => 'text', 'length' => 500));
	        echo $this->Form->input('Game.picture', array('type' => 'file'));
			echo $this->Form->input('category_id');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit'));?>
	</div>

<!-- Add Game UI is here-->     

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

                <div class="alert alert-info channel">You don't have any games yet, your games will show up here</div>
                <?php }?>

                </div>


    </div>
</div>
