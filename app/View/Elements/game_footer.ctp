<div id="bottomBar_wrap" class="fixedWrap" style="position: fixed; ">
	<div id="bottomBar">
		<?php
		$randomurl=$this->Html->url(array( "controller" => $randomuser,"action" =>$randomgame,'play'));
		$channelurl=$this->Html->url(array("controller" => $game['User']['seo_username'],"action" =>"")); 
		?>

		<div id="myButton">
			<a href="<?php echo $randomurl;?>"><input type="submit" id="submit" value="NEXT"></a>
		</div>

		<div class="hearts">
			<div class="adding" style="width: <?php echo $heartwidth;?>%; align:right; "></div>
			<div class="heart" onClick="event.cancelBubble=true;add_to_fav(<?php echo $heartwidth;?>);switcher(); return false;"></div>
		</div>

		<div id="myButton" style='float:left; padding-left:20px;' >
			<ul>
				<li class="profile"><a style='color:white;' href="<?php echo $channelurl;?>">by <?php echo $sharedby;?></a></li>
			</ul>
		</div>

		<div class= 'centerrate'>
			<div class="stars">
				<div class="ratingbar" style="width: <?php echo $starsize; ?>%;"></div>
				<div class="star" onClick="event.cancelBubble=true; rate_a_game(1); return false;">
					<div class="star" onClick="event.cancelBubble=true; rate_a_game(2); return false;">
						<div class="star" onClick="event.cancelBubble=true; rate_a_game(3); return false;">
							<div class="star" onClick="event.cancelBubble=true; rate_a_game(4); return false;">
								<div class="star" onClick="event.cancelBubble=true; rate_a_game(5); return false;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>  
	</div>
</div>