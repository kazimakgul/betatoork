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
						
						<?php foreach ($top_rated_games as $game): ?>

<?php $channelurl=$this->Html->url(array("controller" => "games","action" =>"usergames",$game['User']['id'])); ?>
<?php $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id']))); ?>
<?php $caturl=$this->Html->url(array( "controller" => "games","action" =>"categorygames",h($game['Category']['id']))); ?>
						
						<div class="slider_leftpanel_game">
							<div class="slider_leftpanel_gamebox clearfix">
								<div class="slider_game_avatarback"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'thumb')); ?></div>
								<div class="slider_game_info">
									<a href="<?php echo $playurl ?>" class="slider_game_name"><?php echo $game['Game']['name']?></a>
									<a href="<?php echo $channelurl ?>"><?php echo $game['User']['username']?></a>
									<a href="<?php echo $caturl ?>" class="slider_game_category"><?php echo $game['Category']['name']?></a>
									
									<div class="rating"></div>
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
				<?php rsort($top_rated_games); ?>
				<?php foreach ($top_rated_games as $game): ?>
				
<?php $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id']))); ?>
				
				<div>
					<img class="jail" alt="" data-href="<?php echo $this->Upload->url($game,'Game.picture',array('style' => 'showcase')); ?>" src="<?php echo $playurl ?>" />
					<span  class="slider_rightpanel_desc">
					<?php echo $game['Game']['description']?>
					</span>
				</div>
				
				<?php endforeach; ?>
				
				
				
			</div>
		</div>
	</div>
	<div class="slider_shadowright"></div>
</div>	