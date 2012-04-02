<div class="wrapper" >
<div class="content">

<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Please enter your email address'); ?></legend>
    <?php
        echo $this->Form->input('email');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Send Reset Code'));?>
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