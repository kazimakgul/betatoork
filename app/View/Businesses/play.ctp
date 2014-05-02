
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
	  		<div class="panel-heading">
		        <h3 class="panel-title">Game</h3>
		    </div>
			  <div class="panel-body">
					<div class="videoWrapper">
<!--Array
(
    [User] =&gt; Array
        (
            [username] =&gt; Socialesman
            [seo_username] =&gt; socialesman
            [adcode] =&gt; 
            [fb_link] =&gt; http://facebook.com/thetoork2
            [twitter_link] =&gt; http://twitter.com/thetoork
            [gplus_link] =&gt; http://plus.google.com/117184471094869274585
            [website] =&gt; http://socialesman.com
            [picture] =&gt; cnet.png
            [id] =&gt; 2
        )

    [Game] =&gt; Array
        (
            [name] =&gt; Need For Speed Online
            [user_id] =&gt; 2
            [link] =&gt; http://world.needforspeed.com/login?xl=%2Fdow
            [starsize] =&gt; 84
            [embed] =&gt; 
            [description] =&gt; Need for speed world forever play it online for real. Get it done
            [id] =&gt; 2
            [active] =&gt; 1
            [picture] =&gt; Need_for_Speed_World_1589.jpg
            [seo_url] =&gt; need-for-speed
            [clone] =&gt; 0
            [owner_id] =&gt; 
        )

)
					
-->						
						<style>
							.videoWrapper {
							position: relative;
							padding-bottom: 56.25%; /* 16:9 */
							height: 0;
							text-align: center;
						}
						.videoWrapper iframe {
							position: absolute;
							top: 0;
							left: 0;
							width: 100%;
							height: 100%;
						}
						</style>

						<?php 
						//print_r($game); 
						echo $game['Game']['embed'] ?>
					</div>
				</div>
				
			<div class="panel-body">
               <li rel="tooltip" data-placement="top" data-original-title="Clone This Game" href="#myModalclone" data-toggle="modal" class="btn btn-success">
                  <a><i class="elusive-map-marker"></i><i class="elusive-resize-horizontal"></i><i class="elusive-plus-sign"></i> Clone</a>
              </li>
			 
			    <a class="btn btn-danger" id="fav_button" onclick="favorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);">
			     <i class="icofont-heart"></i> Favorite
			    </a> 
				
				 <a class="btn" id="unFav_button" style="display:none;" onclick="unFavorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);">
			     <i class="icofont-heart"></i> Unfavorite
			    </a> 
			
				<div class="pull-right span4">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
				<a class="addthis_button_preferred_1"></a>
				<a class="addthis_button_preferred_2"></a>
				<a class="addthis_button_preferred_3"></a>
				<a class="addthis_button_preferred_4"></a>
				<a class="addthis_button_compact"></a>
				<a class="addthis_counter addthis_bubble_style"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
				<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52f773524f71b7c3"></script>
				<!-- AddThis Button END -->
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