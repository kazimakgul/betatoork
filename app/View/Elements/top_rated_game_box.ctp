								
<?php foreach ($top_rated_games as $game): ?>
<?php $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id']))); ?>	
<div class="gamebox clearfix">
	<div class="greyback">
		<div class="whiteback">
			<a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('class'=>'gamethumb')); ?></a>
		</div>
	</div>
	
	<div class="gb_rate">
		<div class="rating{{rating}}"></div>
		<div class="rateresult"><?php echo $game['Game']['starsize']; ?>%</div>
	</div>

	<?php $channelurl=$this->Html->url(array("controller" => "games","action" =>"usergames",$game['User']['id'])); ?>
	<a class="gb_channelname" href="<?php echo $channelurl ?>"><?php echo $game['User']['username']; ?></a>
	<a class="gb_gamename" href="<?php echo $playurl ?>"><?php echo $game['Game']['name']; ?></a>
</div>						
 <?php endforeach; ?>