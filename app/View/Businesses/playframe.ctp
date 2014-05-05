<div class="container">
<?php
$gamename = $game['Game']['name'];
$description = $game['Game']['description'];
$username = $game['User']['seo_username'];
$hashtaglink=$this->Html->url(array("controller" => "businesses","action" =>"hashtag",$game['Game']['seo_url']));
if($username !=NULL)
{
  $profilepublic=$this->Html->url(array( "controller" => h($username ),"action" =>'')); 
}
else{
  $profilepublic=$this->Html->url(array("controller" => "businesses","action" =>"profile",$game['User']['id']));
}
?>
<!-- Iframe Content --> 
<iframe src="<?php echo h($game['Game']['link']); ?>" style="border: 0; position:fixed; top:40px; left:0; right:0; bottom:0; width:100%; height:100%"></iframe><!-- Iframe Content End --> 

<div class="navbar navbar-default navbar-fixed-bottom" style="min-height:35px" role="navigation">
	<div class="collapse navbar-collapse">
		<div class="col-sm-12 col-md-12 navbar-center " style="margin-bottom:0px;">
		<!-- center - right -->
		<div class="center-block" style="text-align: center">
			<!-- Rating Button -->
			<div class="rating">
			    <div class="row" data-toggle="tooltip" data-original-title="">
			        <div id="stars-existing" class="starrr" data-rating="<?=round($game['Game']['starsize']/20);?>"></div>
			    </div>
			</div><!-- Rating Button End -->
			
			<!-- Clone Button -->
			<div class="clone">
				<div class="row" data-toggle="tooltip" data-original-title="">
					<button type="button" class="btn btn-success"><i class="fa fa-cog"></i> Clone</button>
				</div>
			</div>
			<!-- Clone Button End -->

		<!-- Favorite Button -->
			<div class="favourite">
				<div class="row" data-toggle="tooltip" data-original-title="">
					<button type="button" class="btn btn-default"><li class="fa fa-heart"></li> Favourite</button>
				</div>
			</div><!-- Favorite Button  End-->			
		</div>
    </div>
	</div>
</div>