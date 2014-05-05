
<div class="container">

<?php  echo $this->element('business/ads'); ?>
<?php // echo $this->element('business/login',array('user_id'=>$user['User']['id'])); ?>
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
	  <div class="col-sm-12">
		<div class="well well-sm">
		<h6 class="media-heading" style="margin-left:9px;" ><span class="btn-link label label-important"><a href="<?php echo $hashtaglink; ?>">#<?php echo $gamename; ?></a></span> : <?php echo $description; ?> </h6>
		</div>
	  </div>
	  
	  <div class="col-sm-12">
		<div class="row">
	      <div class="col-xs-12">
			<div class="panel panel-primary">

			  <div class="panel-body">
						<?php 
						//print_r($game); 
						echo $game['Game']['embed'] ?>

				<div class="col-sm-12 col-md-12">
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
				<div class='pull-right'>	
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
	  </div>
	</div>

	  
<?php  echo $this->element('business/ads'); ?>

<!-- Sonra Yapılcak -->


<?php  echo $this->element('business/ads'); ?>

	<!--/footer -->
	  <div class="col-sm-12">
	     <div class="row">
	      <div class="col-xs-12">
			<div class="panel panel-primary">
		      <div class="panel-heading">
		        <h3 class="panel-title">Recommended Games</h3>
		      </div>
		      <div class="panel-body">
		          <?php  
		            $div = "<div class='col-xs-3' style='padding:5px;'>";
		            $limit = 4;
		            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit)); 
		          ?>
		      </div>
		    </div>
	     </div>
	   </div>
	  </div>
	<!--/footer End--> 

</div><!-- /.container -->

<!--<?php  echo $this->element('business/footer'); ?>
-->