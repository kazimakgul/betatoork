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
	<!-- Remove Button -->
		<button type="button" class="close pull-right" data-toggle="tooltip" data-original-title="Close" style='padding: 6px 12px;' data-dismiss="alert" aria-hidden="true"><li class="glyphicon glyphicon-remove"></li></button>
		<button type="button" class="close pull-right" style='padding: 6px 12px;' data-toggle="tooltip" data-original-title="Next"><li class="fa fa-fast-forward"></li></button>
	<!-- Remove Button End -->
	<div class="collapse navbar-collapse" >
		<div class="col-sm-11 col-md-11" style="margin-bottom:0px;">
		<!-- center - right -->
		<div class='pull-left'>	
			<!-- Clone Button -->
			<div class="clone">
				<div class="widget-button" data-toggle="tooltip" data-original-title="Clone this game">
					<button type="button" class="btn btn-default"><i class="fa fa-cog"></i> Clone</button>
				</div>
			</div>
			<!-- Clone Button End -->

		<!-- Favorite Button -->
			<div class="favourite">
				<div class="widget-button" data-toggle="tooltip" data-original-title="Add to favorites">
					<button type="button" class="btn btn-default"><li class="fa fa-heart"></li> Favourite</button>
				</div>
			</div><!-- Favorite Button  End-->
		</div>
		<div class='pull-center'>	
			<!-- Rating Button -->
			<div class="rating">
			    <div class="widget-button" data-toggle="tooltip" data-original-title="Rate this game">
			        <div id="stars-existing" class="starrr" data-rating="<?=round($game['Game']['starsize']/20);?>"></div>
			    </div>
			</div><!-- Rating Button End -->
		</div>
		<div class='pull-right' style='margin-right: 30px;'>	
 		<!-- Comment Button -->
			<div class="CommentBtn">
				<div class="widget-button" data-toggle="tooltip" data-original-title="Comment">
					<button type="button" class="btn btn-default"><li class="fa fa-comment"></li> Comment</button>
				</div>
			</div><!-- Comment Button  End-->			
			
 		<!-- Share Button -->
			<div class="ShareBtn">
				<div class="widget-button" data-toggle="tooltip" data-original-title="Share">
					<button type="button" class="btn btn-default"><li class="fa fa-share-square-o"></li> Share</button>
				</div>
			</div><!-- Share Button  End-->
		</div>   
    </div>
	</div>

</div>