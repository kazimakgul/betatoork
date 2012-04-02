<div class="wrapper" >
<div class="content">

<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('auto_login', array('type' => 'checkbox', 'label' => 'Log me in automatically?'));
        echo $this->Html->link('Forgot Password?', array('action' => 'reset_request'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'register')); ?> </li>
		<li><?php echo $this->Html->link(__('Play Games'), array('controller'=>'games','action' => 'index'));?></li>		
	</ul>
</div>

</div>
</div>