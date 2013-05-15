<!--**************************-->  
	<!--Rating Stars Starts Below-->	
	<!--**************************-->	  
			  <div class= 'centerrate'>
			<div class="stars">
				<div class="ratingbar" style="width: <?php echo $game['Game']['starsize']; ?>%;"></div>
				<div class="star" onClick="event.cancelBubble=true; rate_a_game(1,user_auth,<?php echo $game['Game']['id'];?>); return false; _gaq.push(['_trackEvent', 'Games', 'Rate', '<?php echo $game['Game']['name']; ?>']); ">
					<div class="star" onClick="event.cancelBubble=true; rate_a_game(2,user_auth,<?php echo $game['Game']['id'];?>); return false; _gaq.push(['_trackEvent', 'Games', 'Rate', '<?php echo $game['Game']['name']; ?>']); ">
						<div class="star" onClick="event.cancelBubble=true; rate_a_game(3,user_auth,<?php echo $game['Game']['id'];?>); return false; _gaq.push(['_trackEvent', 'Games', 'Rate', '<?php echo $game['Game']['name']; ?>']); ">
							<div class="star" onClick="event.cancelBubble=true; rate_a_game(4,user_auth,<?php echo $game['Game']['id'];?>); return false; _gaq.push(['_trackEvent', 'Games', 'Rate', '<?php echo $game['Game']['name']; ?>']); ">
								<div class="star" onClick="event.cancelBubble=true; rate_a_game(5,user_auth,<?php echo $game['Game']['id'];?>); return false; _gaq.push(['_trackEvent', 'Games', 'Rate', '<?php echo $game['Game']['name']; ?>']); "></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--**************************-->  
	<!--/Rating Stars Ends Below-->	
	<!--**************************-->	