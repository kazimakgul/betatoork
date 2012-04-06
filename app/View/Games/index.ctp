<div class="content">
  <div id="up">
	<?php  echo $this->element('slider'); ?>
  <?php  echo $this->element('userpanel'); ?>
  </div>

  <div class="down clearfix">
    <div class="left_panel">
    <?php echo $this->element('best_channels_left_menu'); ?>
		<?php echo $this->element('categories_left_menu'); ?>
    </div>
    <div class="right_panel">
      <div id="toprated">
        <div class="clearfix">
          <div class="toprated"></div>
          <?php echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'toprated'),array('class'=>'seeall')); ?>
        </div>
				
        <div class="sep"></div>
        <ul>
				
        
          <li class="clearfix">
					<?php echo $this->element('top_rated_game_box'); ?>
         </li>
         
				

        </ul>
        
				
      </div>
      <div id="mostplayed">
        <div class="clearfix">
          <div class="mostplayed"></div>
          <?php echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'mostplayed'),array('class'=>'seeall')); ?>
        </div>
        <div class="sep"></div>
          <ul>
           
	           <li class="clearfix">
            <?php echo $this->element('most_played_game_box'); ?>
            </li>
            
          </ul>

      </div>
    </div>
  </div>
</div>