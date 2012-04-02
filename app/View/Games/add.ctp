<div class="wrapper" >
<div class="content">
<?php
echo $this->element('logedinButtons');
?>
	<div class="games form">
	<?php echo $this->Form->create('Game', array('type' => 'file'));?>
		<fieldset>
			<legend><?php echo __('Add Game'); ?></legend>
		<?php
			echo $this->Form->input('name',array('required','placeholder' => 'Metal Slug Brutal 3'));
			echo $this->Form->input('link',array('required','placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'text', 'length' => 100));
			echo $this->Form->input('description',array('required','placeholder' => 'Write few words about the game please','type' => 'text', 'length' => 500));
	        echo $this->Form->input('Game.picture', array('type' => 'file'));
			echo $this->Form->input('category_id');
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit'));?>
	</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Home'), array('action' => 'index'));?></li>
		</ul>
	</div>
	
</div>
</div>