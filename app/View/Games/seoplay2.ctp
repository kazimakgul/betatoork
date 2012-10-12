<div class="content clearfix">
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
                      <?php echo $this->element('gamepage_game_box'); ?>
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
				<div align="center"><?php echo $this->Facebook->comments(array('width'=>960,'data-href'=>Router::url( $this->here, true ))); ?></div>
			</div>
		</div>
		<!-- Facebook Comments -->		
		
    </div>
</div>	