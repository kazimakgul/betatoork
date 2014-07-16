<?php
if(!empty($games)){
$game_edit = $this->Html->url(array("controller" => "businesses", "action" => "game_edit"));

		foreach ($games as $game) {
		    $name = $game['Game']['name'];
		    $id = $game['Game']['id'];
		    $clones = empty($game['Gamestat']['channelclone']) ? 0 : $game['Gamestat']['channelclone'];
		    $favorites = empty($game['Gamestat']['favcount']) ? 0 : $game['Gamestat']['favcount'];
		    $plays = empty($game['Gamestat']['playcount']) ? 0 : $game['Gamestat']['playcount'];
		    $rates = empty($game['Game']['rate_count']) ? 0 : $game['Game']['rate_count'];
			
		    if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
		        $playurl = $this->Html->url('http://' . $game['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game['Game']['seo_url']));
		    } else {
		        $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
		    }
		    ?>
		        <div class="col-md-4" id="gamebox-<?php echo $id; ?>">
		            <div class="panel panel-default">
		                <!--<a href="#"><div style="padding:80px; background-size:contain; background-position:center; background-size: 100%; background-image:url(https://s3.amazonaws.com/betatoorkpics/upload/games/168/toork_Kamikaze_Pigs_toorksize.png)" class="panel-heading">
		                </div></a>-->
		                <a href="<?php echo $playurl ?>" target="_blank">
		                <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'box_img_resize', 'alt' => $name, 'onerror' => 'imgError(this,"toorksize");','width'=>'720','height'=>'110')); ?>
		            	</a>
		                <div class="panel-body" style="padding-top:0px;">
		                    <a href="<?php echo $playurl ?>"><h4 class="text-center" style="height: 20px;overflow: hidden;"><strong><?php echo $name ?></strong> </h4></a>
							<small>

                  <div class="text-center" style="margin-bottom:7px; color:orange;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $rates;?> Rates">
                    <?php 
                    $star = round($game['Game']['starsize'] / 20);
                    for($i=1; $i<=$star; $i++){
                    	echo '<i class="fa fa-star fa-2x"></i>';
                    }
					$freestar=5-$star;
                    if($freestar>0){
                    	for($i=1; $i<=$freestar; $i++)
						{
							echo '<i class="fa fa-star-o fa-2x"></i>';
						}
                    }
                    ?>
                </div>

			                <div class="text-center">
			                	<i class="fa fa-plus-square "> <?php echo $clones ?> Clones</i> | 
			                	<i class="fa fa-heart"> <?php echo $favorites ?> Favorites</i> | 
			                	<i class="fa fa-play"> <?php echo $plays ?> Plays</i></div>
		                	</small>
		                </div>
		                <div class="panel-footer">
						<span>
								<?php if ($game['Game']['featured'] == 1) { ?>
		                		<button type="button" class="btn btn-warning btn-sm featured_toggle" id='<?php echo $game['Game']['id']; ?>'><i class="fa fa-bullseye"></i> Unset Featured</button>
								<?php } else { ?>
		                		<button type="button" class="btn btn-default btn-sm featured_toggle" id='<?php echo $game['Game']['id']; ?>'><i class="fa fa-bullseye"></i>Set Featured</button>
								<?php } ?>
						  <a href="<?php echo $game_edit . '/' . $id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
						  <a data-toggle="modal" data-target="#confirm-modal" onclick="game_id_create(<?php echo $id; ?>);" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete</a>
						</span>
		                </div>
		            </div>
		        </div>
		    
		    <?php
		}
}else{
			echo $this->element('business/dashboard/nullconditions', array('link' => 'exploregames', 'text' => 'Explore Games'));
	
}
?>