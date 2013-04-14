<?php
$dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
?>

	<div class="container">
		<div id="sections">
			<div id="demos">
				<div class="page-header"><a href="<?php echo $dashboard; ?>" class="btn pull-right">skip -></a>
					<h2>Follow 5 channels to get started</h2> 
				</div>

					<h3>What is it for?</h3>
					<p >By following these channels, Your dashboard will be customized for you. But this is not the only way. Just Enjoy...
					</p>

				<div id="psteps_simple" class="row-fluid" style="margin-bottom:20px">
					<div data-spy="affix" data-offset-top="180" class="span2" style="top:10px;">
						<div class="step-title"><span class="step-order">1.</span> <span class="step-name">Channel</span></div>
						<div class="step-title"><span class="step-order">2.</span> <span class="step-name">Channel</span></div>
						<div class="step-title"><span class="step-order">3.</span> <span class="step-name">Channel</span></div>
						<div class="step-title"><span class="step-order">4.</span> <span class="step-name">Channel</span></div>
						<div class="step-title"><span class="step-order">5.</span> <span class="step-name">Channel</span></div>
						<a href="<?php echo $dashboard; ?>"><div class="step-title"><span class="step-order">Go to</span> <span class="step-name">Dashboard</span></div></a>
						
						<div><p class="alert alert-block alert-info"> <small>Don't forget to customize your channel by going to settings to change your profile picture and channel banner.</small></p></div>
					</div>
					<div class="span10 pull-right">
						<ul class="thumbnails step-content ">
						<?php  echo $this->element('NewPanel/startchannel_box'); ?>
						</ul>
						<ul class="thumbnails step-content hide">
						<?php  echo $this->element('NewPanel/startchannel_box'); ?>
						</ul>
						<ul class="thumbnails step-content hide">
						<?php  echo $this->element('NewPanel/startchannel_box'); ?>
						</ul>
						<ul class="thumbnails step-content hide">
						<?php  echo $this->element('NewPanel/startchannel_box'); ?>
						</ul>
						<ul class="thumbnails step-content hide">
						<?php  echo $this->element('NewPanel/startchannel_box'); ?>
						</ul>
						<ul class="thumbnails step-content hide">
						<?php  echo $this->element('NewPanel/startchannel_box',array('dashboard'=>$dashboard)); ?>
						</ul>

					</div>
				</div>
		</div>

		</div>

	</div>