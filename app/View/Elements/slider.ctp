
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
						
						<div class="slider_leftpanel_game">
							<div class="slider_leftpanel_gamebox clearfix">
								<div class="slider_game_avatarback"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'thumb')); ?></div>
								<div class="slider_game_info">
									<a href="/socialgamer/monster_island/" class="slider_game_name">Monster Island</a>
									<a href="/socialgamer/">socialgamer</a>
									<a href="/game/category/detail/shooting/" class="slider_game_category">Shooting</a>
									
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
				
				<?php foreach ($top_rated_games as $game): ?>
				
				
				
				<div>
					<img class="jail" alt="" data-href="<?php echo $this->Upload->url($game,'Game.picture',array('style' => 'showcase')); ?>" src="http://beta.toork.com/static/img/blank.gif" />
					<span  class="slider_rightpanel_desc">Fight against the computer or your friend in this fun KOF fighting game, choose your character and try to win.

</span>
				</div>
				
				<?php endforeach; ?>
				
				
				
			</div>
		</div>
	</div>
	<div class="slider_shadowright"></div>
</div>	