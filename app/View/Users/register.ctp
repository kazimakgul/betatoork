<div class="wrapper" >
<div class="content">
<style type="text/css">
    .ahover:hover {text-decoration:underline; color:darkgrey;}
    .ahover { color:darkblue;}
</style>	

<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Register'); ?></legend>
	<?php
		echo $this->Form->input('username',array('required','placeholder' => 'Ex: GameMonster'));
		echo $this->Form->input('email',array('required','placeholder' => 'Ex: yourname@gmail.com'));
		echo $this->Form->input('password',array('required','placeholder' => 'Must be at least 6 letters'));
		echo $this->Form->input('confirm_password',array('type'=>'password','placeholder' => 'Must be same as above'));
	?>
	</fieldset>
<p>By clicking submit your are agreeing to our <?php echo $this->Html->link('Terms','/pages/terms',array('class'=>'ahover'));?> and <?php echo $this->Html->link('Privacy','/pages/privacy',array('class'=>'ahover'));?>  notice and confirming that you are at least 13 years old.</p>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')); ?> </li>	
	</ul>
</div>
<a> Toork is the only source you need for playing latest games on the web. <br>'One source to rule them all'</a>


</div>
</div>