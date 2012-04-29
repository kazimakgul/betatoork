<?php foreach ($top_rated_games as $game): ?>
<?php $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id']))); ?>	
<div class="gamebox clearfix">
	<div class="greyback">
		<div class="whiteback">
			<a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('class'=>'gamethumb','alt'=>$game['Game']['name'])); ?></a>
		</div>
	</div>
	
	<div class="gb_rate">
		
		<?php 
		
		if(80<=$game['Game']['starsize'] && $game['Game']['starsize']<=100)
		{
		$starvalue=-15;
		}
		elseif(60<=$game['Game']['starsize'] && $game['Game']['starsize']<80)
		{
		$starvalue=-30;
		}
		elseif(40<=$game['Game']['starsize'] && $game['Game']['starsize']<60)
		{
		$starvalue=-45;
		}
		elseif(20<=$game['Game']['starsize'] && $game['Game']['starsize']<40)
		{
		$starvalue=-57;
		}
		elseif(0<=$game['Game']['starsize'] && $game['Game']['starsize']<20)
		{
		$starvalue=-70;
		}
		
		?>
		
		<div id="rate" class="ratingcontainer">
		<div class="rating" style="background-position: <?php echo $starvalue;?>px 0px;">


		</div>
		</div>
		
		<div class="rateresult"><?php echo $game['Game']['starsize']; ?>%</div>
	</div>
	
	<?php $channelurl=$this->Html->url(array("controller" => "games","action" =>"usergames",$game['User']['id'])); ?>
	<a class="gb_channelname" href="<?php echo $channelurl ?>"><?php echo $game['User']['username']; ?></a>
	<a class="gb_gamename" href="<?php echo $playurl ?>"><?php echo $game['Game']['name']; ?></a>
</div>						
 <?php endforeach; ?>