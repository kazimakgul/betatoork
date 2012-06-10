<div class="slider clearfix">
	<div class="slider_shadowleft"></div>
	<div class="slider_leftpanel">
		<a href="javascript:;" class="uparr"></a>
		<div class="slider_leftpanel_slidepointer"></div>
		<div class="slider_leftcontent clearfix">
			<div class="slider_leftpanel_slideitem">
				<div class="slider_sep"></div>
				<div class="slider_leftpanel_slide">
					<div class="ul">
						
						<?php foreach ($slider as $game): ?>

<?php $channelurl=$this->Html->url(array("controller" => $user['User']['seo_username'],"action" =>""));?>
<?php $playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'play')); ?>
<?php $caturl=$this->Html->url(array( "controller" => "games","action" =>"categorygames",h($game['Category']['id']))); ?>
						
						<div class="slider_leftpanel_game">
							<div class="slider_leftpanel_gamebox clearfix">
								<div class="slider_game_avatarback"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'thumb')); ?></div>
								<div class="slider_game_info">
									<a href="<?php echo $playurl ?>" class="slider_game_name"><?php echo $game['Game']['name']?></a>
									<a href="<?php echo $channelurl ?>"><?php echo $game['User']['username']?></a>
									<a href="<?php echo $caturl ?>" class="slider_game_category"><?php echo $game['Category']['name']?></a>
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
								</div>
							</div>
							<div class="slider_sep"></div>
						</div>
						
						<?php endforeach; ?>
						
						
					</div>
				</div>
				<div class="slider_sep" style="margin-top:0px; margin-bottom:5px;"></div>
			</div>
			<div class="slider_leftpanel_innershadow"></div>
		</div>
		<a href="javascript:;" class="downarr"></a>
	</div>
	<div class="slider_rightpanel">
		<div class="slider_rightpanel_slide">
		<div class="slider_rightpanel_slidepointerarr"></div>
			<div class="ul">
				
				
				<?php foreach ($slider as $game): ?>
				
<?php $playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'play')); ?>
				
				<div>
					<a href="<?php echo $playurl ?>"><img class="jail" alt="" data-href="<?php echo $this->Upload->url2($game,'Game.picture',array('style' => 'showcase')); ?>"/></a>
<!-- 					<span  class="slider_rightpanel_desc">
					<?php //echo $game['Game']['description']?>
					</span> -->
				</div>
				
				<?php endforeach; ?>
					
				
			</div>
		</div>
	</div>
	<div class="slider_shadowright"></div>
</div>	