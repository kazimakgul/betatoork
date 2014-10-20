<div align="center" class="clearfix">
	<div style="float:left; padding-top:10px; padding-left:15px;">
		<div class="fb-like" data-href="<?php echo Router::url( $this->here, true ); ?>" data-layout="box_count" data-width="450" data-show-faces="true"></div>
	</div>
	<div style="float:left; padding-top:9px; padding-left:10px;">
		<a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-url="<?php echo Router::url( $this->here, true ); ?>" data-via="thetoork">Tweet</a>
		<script>
			!function(d,s,id){
				var js,fjs=d.getElementsByTagName(s)[0];
				if(!d.getElementById(id)){
					js=d.createElement(s);
					js.id=id;js.src="https://platform.twitter.com/widgets.js";
					fjs.parentNode.insertBefore(js,fjs);
				}
			}(document,"script","twitter-wjs");
		</script>				
	</div>
	<div style="float:left; padding-top:10px; padding-left:10px;">
		<!-- Place this tag where you want the +1 button to render. -->
		<div class="g-plusone" data-size="tall" data-href="www.toork.com"></div>

		<!-- Place this tag after the last +1 button tag. -->
		<script type="text/javascript">
		  (function() {
			var po = document.createElement('script'); 
			po.type = 'text/javascript'; 
			po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; 
			s.parentNode.insertBefore(po, s);
		  })();
		</script>			
	</div>
	<!--<div style="float:left; padding-top:30px; padding-left:10px;">
		<a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.toork.com&media=http%3A%2F%2Fwww.toork.com&description=Create%20your%20own%20game%20channel" class="pin-it-button" count-layout="vertical">
			<img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" />
		</a>
		<script src="//assets.pinterest.com/js/pinit.js"></script>
	</div>-->
</div>