<ul class="ca-menu">
    <li>
        
		<span class="ca-icon">F</span>
		
	 <?php echo $this->Html->link($this->Html->div('ca-content','<h2 class="ca-main">My Games</h2><h3 class="ca-sub">Personalized to your needs</h3>'), array('controller'=>'games', 'action' => 'mygames'), array('escape' => false));?>
        
    </li>
       <li>
        
            <span class="ca-icon">N</span>
			
			<?php echo $this->Html->link($this->Html->div('ca-content','<h2 class="ca-main">Playlist</h2><h3 class="ca-sub">Your Favorite Games</h3>'), array('controller'=>'favorites', 'action' => 'playlist',$this->Session->read('Auth.User.id')), array('escape' => false));?>
			
    </li>
    <li>
        
            <span class="ca-icon">+</span>
			<?php echo $this->Html->link($this->Html->div('ca-content','<h2 class="ca-main">Add Game</h2><h3 class="ca-sub">Add your loved games</h3>'), array('controller'=>'games', 'action' => 'add'), array('escape' => false));?>
			
        
    </li>
    <li>
        
            <span class="ca-icon">S</span>
			
			<?php echo $this->Html->link($this->Html->div('ca-content','<h2 class="ca-main">Settings</h2><h3 class="ca-sub">Change your default settings</h3>'), array('controller'=>'users', 'action' => 'settings',$this->Session->read('Auth.User.id')), array('escape' => false));?>
			
        
    </li>
    <li>
       
            <span class="ca-icon">H</span>
			
			<?php echo $this->Html->link($this->Html->div('ca-content','<h2 class="ca-main">Help</h2><h3 class="ca-sub">Professionals in action</h3>'), array('controller'=>'pages', 'action' =>'help'), array('escape' => false));?>
			
            
    </li>
</ul>