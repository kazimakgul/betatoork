<?php $this->Html->css(array('toprated')); ?>

<div class="content clearfix">
  <div class="left_panel">
    <?php  echo $this->element('userpanel'); ?>
      <?php  echo $this->element('social'); ?>
      <?php  echo $this->element('categories_left_menu'); ?>
      <?php  echo $this->element('best_channels_left_menu'); ?>
  </div>
  <div class="right_panel">
    <div class="toprated"></div>
    <div class="sep"></div>
    
	
	<ul>
	
	<li class="clearfix">
		<?php  echo $this->element('top_rated_game_box'); ?>
		</li>
	
	
        </ul>
	
	
  </div>
</div>