<?php
$settings	= $this->Html->url(array('controller'=>'businesses','action'=>'settings'));
$ch_settings	= $this->Html->url(array('controller'=>'businesses','action'=>'channel_settings'));
?>

<div id="sidebar">
	<div class="sidebar-toggler visible-xs">
		<i class="ion-navicon"></i>
	</div>
	
	<h3>My account</h3>
	<ul class="menu">
		<li>
			<a href="<?=$ch_settings;?>" <?php if($active=='channel')echo 'class="active"'; ?>>
				<i class="fa fa-desktop"></i>
				Channel
			</a>
		</li>
		<li>
			<a href="<?=$settings;?>" <?php if($active=='profile')echo 'class="active"'; ?>>
				<i class="ion-ios7-person-outline"></i>
				Profile
			</a>
		</li>
		<li>
			<a href="<?=$settings;?>">
				<i class="ion-card"></i>
				Billing
			</a>
		</li>
		<li>
			<a href="<?=$settings;?>">
				<i class="ion-ios7-email-outline"></i>
				Notifications
			</a>
		</li>
		<li>
			<a href="<?=$settings;?>">
				<i class="ion-ios7-help-outline"></i>
				Support
			</a>
		</li>
	</ul>
</div>