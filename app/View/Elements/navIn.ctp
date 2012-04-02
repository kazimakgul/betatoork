<ul class="ha-menu">
    <li >
	
       <span class="ha-icon">U</span>
	<?php echo $this->Html->link($this->Html->div('ha-content','<h2 class="ha-main">'.$this->Session->read('Auth.User.username').'</h2><h3 class="ha-sub">Go to your profile</h3>'), array('controller'=>'users', 'action' => 'profile'), array('escape' => false));?>
	
    </li>
    <li class='bali'>
        
            <span class="ba-icon">X</span>
			
			<?php echo $this->Html->link($this->Html->div('ba-content','<h2 class="ba-main">Log Out</h2><h3 class="ba-sub">See you soon</h3>'), array('controller'=>'users', 'action' => 'logout'), array('escape' => false));?>
			
            
    </li>
</ul>