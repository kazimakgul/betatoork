<div class="wrapper" >
<div class="content">

	<div class="games form">
	<?php echo $this->Form->create('Country');?>
		<fieldset>
			<legend><?php echo __('Add Country'); ?></legend>
		<?php
			echo $this->Form->input('name',array('required','placeholder' => 'Turkey'));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit'));?>
	</div>

	
</div>
</div>