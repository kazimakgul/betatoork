								
<?php foreach ($games as $game): ?>
<?php $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id']))); ?>	
<div class="gamebox clearfix">
	<div class="greyback">
		<div class="whiteback">
			<a href="<?php echo $playurl ?>"><img class="gamethumb" alt="" src="/betatoork/upload/games/4/angry200_original.png" /></a>
		</div>
	</div>
	
	<div class="gb_rate">
		<div class="rating{{rating}}"></div>
		<div class="rateresult"><?php echo $game['Game']['starsize']; ?>%</div>
	</div>
	<a class="gb_channelname" href="linktouser"><?php echo $game['User']['username']; ?></a>
	<a class="gb_gamename" href="<?php echo $playurl ?>"><?php echo $game['Game']['name']; ?></a>
</div>						
 <?php endforeach; ?>