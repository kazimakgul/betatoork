<div class="content">
  <div id="up">
	<?php  echo $this->element('slider'); ?>

	<?php
  	if($this->Session->check('Auth.User'))
    	{  echo $this->element('channel_user_panel'); }
  	 else 
  	  {
	  ?>
	  <div data-bind="ifnot: user.logged_in()">
    	
		<?php  echo $this->element('unlogged_user_panel');  }?>
    	</div>
  	
	
	
  </div>
  <div class="down clearfix">
    <div class="left_panel">
		<?php echo $this->element('categories_left_menu'); ?>
		<?php echo $this->element('best_channels_left_menu'); ?>
    </div>
    <div class="right_panel">
      <div id="toprated">
        <div class="clearfix">
          <div class="toprated"></div>
          <a class="seeall" href="{% url toprated-games %}">(See All)</a>
        </div>
				
        <div class="sep"></div>
        <ul>
				<!--Foreach for topgames-->
          <li class="clearfix">
					<?php echo $this->element('game_box'); ?>
         </li>
				<!--Foreach for topgames ends-->
        </ul>
				
      </div>
      <div id="mostplayed">
        <div class="clearfix">
          <div class="mostplayed"></div>
          <a class="seeall" href="{% url most-played-games %}">(See All)</a>
        </div>
				{% with most_games as games %}
        <div class="sep"></div>
          <ul>
					{% for game in games %}
            {% cycle '<li class="clearfix">' '' '' '' %}
						{% include "game/game_box.html" %}
            {% cycle '' '' '' '</li>' %}
					{% endfor %}
          </ul>
				{% endwith %}
      </div>
    </div>
  </div>
</div>