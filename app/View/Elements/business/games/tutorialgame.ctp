<?php

if($tutorialgame == 1)
{
	$veri = $games;
}
else{
	$veri = $top_rated_games;
}
foreach ($veri as $game): 
$playurl=$this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
?>
<div class='col-xs-4' style='padding:0px 15px 0px 5px;'>
    <div class="panel panel-default">
      <div class="imagehover">
       <div class="caption" style="height: 100%; padding-top: 10px;">
            <?php
            if($tutorialgame == 1)
			{
				echo '<a href="" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" title="Clone This Game">Add</a>';
			}
			else{
				echo '<a href="" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Clone This Game">Clone</a>';
			}
            ?>
        </div>
       <a href="<?php echo $playurl; ?>" class="panel-image">
        <?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('class' => 'panel-image-preview','alt'=>$game['Game']['name'],'onerror'=>'imgError(this,"toorksize");')); ?></a>
      </div>
        <div class="panel-footer text-center" style="padding:0px;">
          <a href="<?php echo $playurl; ?>" style="padding:0px;"><h5 class="darkblue" style='height:16px; overflow:hidden;'><?php echo $game['Game']['name']; ?></h5></a>
          <div class="row">
          	<span class="col-md-6" style='margin-left:10px;'>
       			<div class= 'centerrate2'>
					<div class="stars2"  data-toggle="tooltip" data-original-title="<?=$game['Game']['rate_count'];?> Rates">
						<div class="ratingbar2" style="width: <?php echo $game['Game']['starsize']; ?>%;"></div>
						<div class="star2">
							<div class="star2">
								<div class="star2">
									<div class="star2">
										<div class="star2"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </span>
            <span class="col-md-5">
            <i data-toggle="tooltip" title="<?php echo $game['Gamestat']['playcount']; ?> Plays" class="fa fa-play green"></i>
            <i data-toggle="tooltip" title="<?php echo $game['Gamestat']['favcount']; ?> Favorites" class="fa fa-heart red"></i>
            <i data-toggle="tooltip" title="<?php echo $game['Gamestat']['totalclone']; ?> Clones" class="fa fa-plus-square darkblue"></i>
            <span>
            </div>
        </div>
    </div>
 </div>
 <?php endforeach; 
 ?>