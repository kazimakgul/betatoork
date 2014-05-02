
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
<div style="margin:39px 0px 0px 0px; width:100%; height:100%;">
	<iframe src="<?php echo h($game['Game']['link']); ?>" style="border: 0; position:fixed; top:40px; left:0; right:0; bottom:0; width:100%; height:100%">
</iframe>
</div>

<div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
	<div class="collapse navbar-collapse">
		<!-- LEFT -->
		bbbbb
		<div class="col-sm-3 col-md-3 navbar-right " style="margin-bottom:0px;">
		<!-- RIGHT -->
		<div class="pull-right btn-group">
			asdasdasds
		</div>
    </div>
	</div>
</div>