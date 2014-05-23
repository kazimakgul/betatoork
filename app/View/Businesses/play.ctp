<div class="container">
<?php  echo $this->element('business/ads'); ?>
<?php
$game_id = $game['Game']['id'];
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
<script>game_id='<?=$game_id?>';</script>
	  <div class="col-sm-12">
		<div class="well well-sm">
		<h6 class="media-heading">
			<span class="btn-link btn label-important"><a href="<?php echo $hashtaglink; ?>">#<?php echo $gamename; ?></a></span>: <?php echo $description; ?>
		</h6>
		</div>
	  </div>
	  
	  <div class="col-sm-12">
		<div class="row">
	      <div class="col-xs-12">
			<div class="panel panel-primary">

			  <div class="panel-body">
				<?=$game['Game']['embed'];?>
				<div class="col-sm-12 col-md-12">
			        <div class='pull-left'>	
					<?php echo $this->element('business/buttons/clone');?>
					<?php echo $this->element('business/buttons/favorite');?>
					</div>
					<div class='pull-center'>	
					<?php echo $this->element('business/buttons/rate');?>
					</div>
					<div class='pull-right'>	
			 		<?php echo $this->element('business/buttons/comment');?>		
					<?php echo $this->element('business/buttons/share');?>
					</div>   
				</div>
			</div>
		  </div>
	  </div>
	</div>

	  
<?php  echo $this->element('business/ads'); ?>
	<div class="row-fluid col-sm-6 left">
		</div>
	<div class="row-fluid col-sm-6 right">
	
	        <div style="padding:5px; background-color:white;" class="span5 shadow well">
	                <h5 class="media-heading"><a style="margin-left:9px;" class="btn-link" href="<?php echo $hashtaglink; ?>">#<?php echo $game['Game']['seo_url'];?> Feed</a></h5>
	        </div>
	
	<?php if($tagActivities!=NULL) { ?>
	<?php echo $this->element('NewPanel/load_game_activity');?>
	<?php }else{ ?>
	
	        <div style="background-color:white;" class="span5 shadow well">
	                <h5 class="media-heading color-purple">Be the first to make an activity for this game</h5>
	                <h6 class="media-heading"><i class="elusive-download-alt"></i> Use the rate bar down here</h6>
	                <h4 class="media-heading color-red"><i class="elusive-heart"></i> Add this game to your favorites</h4>
	                <h3 class="media-heading color-blue"><i class="elusive-tint"></i> Make a Clone!</h3>
	                <h5 class="media-heading color-gold"><i class="elusive-star"></i> Rate this game please!</h5>
	                <h4 class="media-heading color-green"><i class="elusive-comment"></i> Comment about the game!</h5>
	                <h6 class="media-heading">Your activity will be published here</h6>
	        </div>
	
	<?php } ?>
	
	</div>


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
		            echo $this->element('business/games/box',array('div'=>$div,'limit'=>$limit, 'gamedata'=>$games)); 
		          ?>
		      </div>
		    </div>
	     </div>
	   </div>
	  </div>
	<!--/footer End--> 
<?php echo $this->element('business/clonebox');?>
</div><!-- /.container -->

