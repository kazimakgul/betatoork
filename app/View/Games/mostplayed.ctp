<?php $this->Html->css(array('mostplayed')); ?>

<div class="content clearfix">
    <div class="left_panel">
      <?php  echo $this->element('userpanel'); ?>
      <?php  echo $this->element('social'); ?>
      <?php  echo $this->element('best_channels_left_menu'); ?>
      <?php  echo $this->element('categories_left_menu'); ?>
    </div>
    <div class="right_panel">
        <div class="mostplayed"></div>
          <div class="clearfix"></div>

        <div class="sep"></div>
        <ul>
	
    <li class="clearfix">
		  <?php  echo $this->element('most_played_game_box'); ?>
    </li>
	
	
        </ul>
    </div>
</div>