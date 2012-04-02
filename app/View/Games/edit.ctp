<div class="wrapper" >
<div class="content">

<?php
echo $this->element('logedinButtons');
?>

	<div class="games form">
	<?php echo $this->Form->create('Game', array('type' => 'file'));?>
		<fieldset>
			<legend><?php echo __('Edit Game'); ?></legend>


	<?php
		echo $this->Form->input('name',array('required','placeholder' => 'Metal Slug Brutal 3'));
		echo $this->Form->input('link',array('required','placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'text', 'length' => 100));
		echo $this->Form->input('description',array('required','placeholder' => 'Write few words about the game please','type' => 'text', 'length' => 500));
        echo $this->Form->input('edit_picture', array('type' => 'file'));
        echo $this->Upload->image($game,'Game.picture');
		echo $this->Form->input('category_id');
	?>


		</fieldset>
	<?php echo $this->Form->end(__('Submit'));?>
	</div>


</div>
</div>