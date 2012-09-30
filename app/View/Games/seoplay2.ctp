div class="content clearfix">
    <div class="channel_left_panel">
		<?php  echo $this->element('logged_user_panel'); ?>
		<?php  echo $this->element('subscribe'); ?>
		<?php  echo $this->element('social'); ?>
		<?php  echo $this->element('best_channels_left_menu'); ?>
		<?php  echo $this->element('categories_left_menu'); ?>
    </div>
    <div class="right_panel">
		<!-- Up Advertisement -->
        <div class="panelgreyback">
            <div class="panelwhiteback">
				<div align="center" style="max-height:110px; overflow:hidden;"><?php echo $user['User']['adcode'] ?></div>
			</div>
		</div>
		<!-- Up Advertisement -->
		
		<!-- Game Desc & Share -->
        <div class="panelgreyback">
            <div class="panelwhiteback">
			    <div class="gamedesc">
                    <p><?php echo $game['Game']['name'] ?></p>
                    <div class="sep"></div>
                    <span><?php echo $game['Game']['description'] ?></span>
                </div>
				<div align="center" class="clearfix">
					<div class="face_send"></div>
					<div class="twitter_twit"></div>
					<div class="google_plus"></div>
					<div class="pin_pinit"></div>
				</div>
			</div>
		</div>
		<!-- Game Desc & Share -->
		
		<!-- Game -->
        <div class="panelgreyback">
            <div class="panelwhiteback">
				<div class="game" align="center"><?php echo $game['Game']['embed'] ?></div>
			</div>
		</div>
		<!-- Game -->
		
		<!-- Game Slider -->
		<div style="margin-bottom:10px;">
			<ul>
				<li class="clearfix">			
					<div class="gamebox clearfix">
						<div class="greyback">
							<div class="whiteback">
								<a href="/betatoork/games/play/9"><img width="200" height="110" alt="Monster Island" class="gamethumb" src="https://s3.amazonaws.com/betatoorkpics/upload/games/9/mzl_rtgqyxmy_1024x1024_65_toorksize.jpg"></a>
							</div>
						</div>
						<div class="gb_rate">	
							<div class="ratingcontainer" id="rate">
								<div style="background-position: 0px 0px;" class="rating"></div>
							</div>
							<div class="rateresult">100 %</div>
						</div>
						<a href="/betatoork/miniclip" class="gb_channelname">Miniclip</a>
						<a href="/betatoork/games/play/9" class="gb_gamename">Monster Island</a>
					</div>						
						
					<div class="gamebox clearfix">
						<div class="greyback">
							<div class="whiteback">
								<a href="/betatoork/games/play/9"><img width="200" height="110" alt="Monster Island" class="gamethumb" src="https://s3.amazonaws.com/betatoorkpics/upload/games/9/mzl_rtgqyxmy_1024x1024_65_toorksize.jpg"></a>
							</div>
						</div>
						<div class="gb_rate">	
							<div class="ratingcontainer" id="rate">
								<div style="background-position: 0px 0px;" class="rating"></div>
							</div>
							<div class="rateresult">100 %</div>
						</div>
						<a href="/betatoork/miniclip" class="gb_channelname">Miniclip</a>
						<a href="/betatoork/games/play/9" class="gb_gamename">Monster Island</a>
					</div>							
						
					<div class="gamebox clearfix">
						<div class="greyback">
							<div class="whiteback">
								<a href="/betatoork/games/play/9"><img width="200" height="110" alt="Monster Island" class="gamethumb" src="https://s3.amazonaws.com/betatoorkpics/upload/games/9/mzl_rtgqyxmy_1024x1024_65_toorksize.jpg"></a>
							</div>
						</div>
						<div class="gb_rate">	
							<div class="ratingcontainer" id="rate">
								<div style="background-position: 0px 0px;" class="rating"></div>
							</div>
							<div class="rateresult">100 %</div>
						</div>
						<a href="/betatoork/miniclip" class="gb_channelname">Miniclip</a>
						<a href="/betatoork/games/play/9" class="gb_gamename">Monster Island</a>
					</div>							
						
					<div class="gamebox clearfix">
						<div class="greyback">
							<div class="whiteback">
								<a href="/betatoork/games/play/9"><img width="200" height="110" alt="Monster Island" class="gamethumb" src="https://s3.amazonaws.com/betatoorkpics/upload/games/9/mzl_rtgqyxmy_1024x1024_65_toorksize.jpg"></a>
							</div>
						</div>
						<div class="gb_rate">	
							<div class="ratingcontainer" id="rate">
								<div style="background-position: 0px 0px;" class="rating"></div>
							</div>
							<div class="rateresult">100 %</div>
						</div>
						<a href="/betatoork/miniclip" class="gb_channelname">Miniclip</a>
						<a href="/betatoork/games/play/9" class="gb_gamename">Monster Island</a>
					</div>							
				</li>
			</ul>
		</div>
		<!-- Game Slider-->			
			
		<!-- Bottom Advertisement -->
        <div class="panelgreyback">
            <div class="panelwhiteback">
				<div align="center" style="max-height:110px; overflow:hidden;"><?php echo $user['User']['adcode'] ?></div>
			</div>
		</div>
		<!-- Bottom Advertisement -->
		
		<!-- Facebook Comments -->
        <div class="panelgreyback" style="margin-bottom:45px;">
            <div class="panelwhiteback">
				<div align="center"><?php echo $this->Facebook->comments(array('width'=>960)); ?></div>
			</div>
		</div>
		<!-- Facebook Comments -->		
		
    </div>
	
	
	
<!-- AddThis Button BEGIN -->
<!--<div class="addthis_toolbox addthis_default_style addthis_32x32_style">-->
<!--<a class="addthis_button_preferred_1"></a>-->
<!--<a class="addthis_button_preferred_2"></a>-->
<!--<a class="addthis_button_preferred_3"></a>-->
<!--<a class="addthis_button_preferred_4"></a>-->
<!--<a class="addthis_button_compact"></a>-->
<!--<a class="addthis_counter addthis_bubble_style"></a>-->
<!--</div>-->