<div class='sagda'>
	<ul>
		<li class="home"><?php echo $this->Html->link('Home',array('controller' => 'games', 'action' => 'index'));?></li>
		<li class="profile"><?php echo $this->Html->link('Login',array('controller' => 'users', 'action' => 'login'));?></li>
		<li class="update"><?php echo $this->Html->link('Register',array('controller' => 'users', 'action' => 'register'));?></li>
	</ul>
</div>