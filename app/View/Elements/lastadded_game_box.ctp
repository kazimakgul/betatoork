<?php $result = Set::sort($most_played_games, '{n}.Game.created', 'desc'); ?>
<?php foreach ($result as $game): ?>
<?php $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id']))); ?>	
<div class="gamebox clearfix">
	<div class="greyback">
		<div class="whiteback">
			<a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('class'=>'gamethumb','alt'=>$game['Game']['name'])); ?></a>
		</div>
	</div>
	
	<div class="gb_rate">
		
		
		<?php 
		
		if(81<=$game['Game']['starsize'] && $game['Game']['starsize']<=100)
		{
		$starvalue=0;
		}
		elseif(61<=$game['Game']['starsize'] && $game['Game']['starsize']<81)
		{
		$starvalue=-15;
		}
		elseif(41<=$game['Game']['starsize'] && $game['Game']['starsize']<61)
		{
		$starvalue=-30;
		}
		elseif(21<=$game['Game']['starsize'] && $game['Game']['starsize']<41)
		{
		$starvalue=-45;
		}
		elseif(0<$game['Game']['starsize'] && $game['Game']['starsize']<21)
		{
		$starvalue=-57;
		}
		elseif($game['Game']['starsize']==0)
		{
		$starvalue=-70;
		}
		
		?>
		
		
		<div id="rate" class="ratingcontainer">
		<div class="rating" style="background-position: <?php echo $starvalue;?>px 0px;">


		</div>
		</div>
		<div class="rateresult"><?php echo $game['Game']['starsize']; ?> %</div>
	</div>
	
	<?php $channelurl=$this->Html->url(array("controller" => "games","action" =>"usergames",$game['User']['id'])); ?>
	<a class="gb_channelname" href="<?php echo $channelurl ?>"><?php echo $game['User']['username']; ?></a>
	<a class="gb_gamename" href="<?php echo $playurl ?>"><?php echo $game['Game']['name']; ?></a>
</div>						
 <?php endforeach; ?>