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
						<?php for($i=0; $i < count($slider); $i++){ 
							$channelurl=$this->Html->url(array("controller" => $slider[$i]['User']['seo_username'],"action" =>""));
							if($slider[$i]['Game']['seo_url']!=NULL){	  	
								$playurl=$this->Html->url(array( "controller" => h($slider[$i]['User']['seo_username']),"action" =>h($slider[$i]['Game']['seo_url']),'play'));
							}else{
								$playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($slider[$i]['Game']['id'])));  
							}	
							$caturl=$this->Html->url(array( "controller" => "games","action" =>"categorygames",h($slider[$i]['Category']['id'])));
						?>
						<div class="slider_leftpanel_game">
							<div class="slider_leftpanel_gamebox clearfix">
								<div class="slider_game_avatarback"><img alt="" width="100" height="55" src="<?php echo $this->Upload->url2($slider[$i],'Game.picture',array('style' => 'thumb')); ?>" /></div>
								<div class="slider_game_info">
									<a href="<?php echo $playurl ?>" class="slider_game_name"><?php echo $slider[$i]['Game']['name'] ?></a>
									<a href="<?php echo $channelurl ?>"><?php echo $slider[$i]['User']['username'] ?></a>
									<a href="<?php echo $caturl ?>" class="slider_game_category"><?php echo $slider[$i]['Category']['name'] ?></a>
									<?php 
									if(81<=$slider[$i]['Game']['starsize'] && $slider[$i]['Game']['starsize']<=100)
									{
										$starvalue=5;
									}
									elseif(61<=$slider[$i]['Game']['starsize'] && $slider[$i]['Game']['starsize']<81)
									{
										$starvalue=4;
									}
									elseif(41<=$slider[$i]['Game']['starsize'] && $slider[$i]['Game']['starsize']<61)
									{
										$starvalue=3;
									}
									elseif(21<=$slider[$i]['Game']['starsize'] && $slider[$i]['Game']['starsize']<41)
									{
										$starvalue=2;
									}
									elseif(0<$slider[$i]['Game']['starsize'] && $slider[$i]['Game']['starsize']<21)
									{
										$starvalue=1;
									}
									elseif($slider[$i]['Game']['starsize']==0)
									{
										$starvalue=0;
									}
									?>									
									<div class="rating<?php echo $starvalue;?>"></div>
								</div>
							</div>
							<div class="slider_sep"></div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="slider_sep" style="margin-bottom:5px;"></div>
			</div>
			<div class="slider_leftpanel_innershadow"></div>
		</div>
		<a href="javascript:;" class="downarr"></a>
	</div>
	<div class="slider_rightpanel">
		<div class="slider_rightpanel_slide">
			<div class="slider_rightpanel_slidepointerarr"></div>
			<div class="ul">
				<?php for($i=count($slider) - 1; $i>=0; $i--){ 
					if($slider[$i]['Game']['seo_url']!=NULL)
						$playurl=$this->Html->url(array( "controller" => h($slider[$i]['User']['seo_username']),"action" =>h($slider[$i]['Game']['seo_url']),'play'));
					else
						$playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($slider[$i]['Game']['id'])));  
				?>
					<div>
						<a href="<?php echo $playurl ?>"><img class="jail" alt="" data-href="<?php echo $this->Upload->url2($slider[$i],'Game.picture',array('style' => 'showcase')); ?>" src="_inc/img/blank.gif" /></a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="slider_shadowright"></div>
</div>