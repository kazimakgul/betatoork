<?
if(isset($size)){
	echo '<style>.rating .widget-button {font-size: '.$size.'px !important;}</style>';
}else{
	echo '<style>.pull-center .rating .widget-button {font-size: 24px !important;}</style>';
}
?>
		<!-- Rating Button -->
		<div class="rating">
		    <div class="widget-button" data-toggle="tooltip" data-original-title="<?=$game['Game']['rate_count'];?> Rates">
		        <div id="stars-existing" class="starrr" data-rating="<?=round($game['Game']['starsize']/20);?>"></div>
		    </div>
		</div><!-- Rating Button End -->
		