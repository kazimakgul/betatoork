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
					<div class="face_send">
						<div id="fb-root"></div>
						<script>
							(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=422837701111087";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
						</script>	
						<div class="fb-send" data-href="http://example.com"></div>
					</div>
					<div class="twitter_twit">
						<a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
						<script>
							!function(d,s,id){
								var js,fjs=d.getElementsByTagName(s)[0];
								if(!d.getElementById(id)){
									js=d.createElement(s);
									js.id=id;
									js.src="//platform.twitter.com/widgets.js";
									fjs.parentNode.insertBefore(js,fjs);
								}
							}(document,"script","twitter-wjs");
						</script>					
					</div>
					<div class="google_plus">
						<!-- Place this tag where you want the share button to render. -->
						<div class="g-plus" data-action="share" data-annotation="none"></div>

						<!-- Place this tag after the last share tag. -->
						<script type="text/javascript">
						  (function() {
							var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
							po.src = 'https://apis.google.com/js/plusone.js';
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
						  })();
						</script>					
					</div>
					<div class="pin_pinit">
						<a data-pin-config="none" data-pin-do="buttonPin" href="//pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.flickr.com%2Fphotos%2Fkentbrew%2F6851755809%2F&media=http%3A%2F%2Ffarm8.staticflickr.com%2F7027%2F6851755809_df5b2051c9_z.jpg&description=Next%20stop%3A%20Pinterest!">
							<img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
						</a>
						<script src="//assets.pinterest.com/js/pinit.js"></script>
					</div>
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