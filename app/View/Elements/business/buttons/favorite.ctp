<!----Declare Channel Name For JavaScript Usage---->
  <!----=========================================---->
<script>
  <?php 
 if($this->Session->check('Auth.User') == 1){ ?>
  user_auth=1;
  <?php  }else{?>
  user_auth=0;
  <?php }?>
  </script>
  <!----=========================================---->
		<!-- Favorite Button -->
		<div class="favourite">
			<div class="widget-button" data-toggle="tooltip" data-original-title="Add to favorites">
				<button type="button" class="btn btn-default" id="fav_button" onclick="favorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);"><li class="fa fa-heart <?if(isset($ownuser[0]['favorites']['id'])){echo 'red';}?>"></li> Favorite <span class="label label-info" id="fav_count"><?=$game['Gamestat']['favcount'];?></span></button>
			</div>
		</div><!-- Favorite Button  End-->
		