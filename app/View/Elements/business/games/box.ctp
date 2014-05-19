<?php $counter=0;?>
<?php 
	foreach ($gamedata as $game): 
	$playurl=$this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
?>
	          <?php echo $div; ?>
	            <div class="panel panel-default">
	              <div class="imagehover">
	               <? if (isset($fix) && $controls==$user['User']['id']){ ?>
	               <div class="caption">
	                    <p><a href="" class="label label-danger" data-placement="bottom" data-toggle="tooltip" title="Change This Game">Change</a>
	                    <a href="" class="label label-default" data-placement="bottom" data-toggle="tooltip" title="Play This Game">Play</a></p>
	                </div>
	               <? } ?>
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
	<?php $counter = $counter+1; 
	      if(isset($limit) && $counter==$limit){ 
	        break; }else{continue;} ?>
	 <?php endforeach; ?>
<?php 
if(isset($limit))
{
while ($counter < $limit){?>
          <?php echo $div; ?>
            <div class="panel panel-default" style="background-color:silver;">
              <div style="padding:20% 0% 21% 0%;" class="text-center">
              <button class="btn btn-default btn-lg btn-danger"> <i class="fa fa-plus-square fa-2x"></i> </button>
              </div>
                <div class="panel-footer text-center" style="padding:0px;">
                  <a  href="#" data-toggle="modal" data-target=".bs-modal-sm"  style="padding:0px;"><h5 class="darkblue" >+Add Game</h5></a>
                  <div class="row">

                    </div>
                </div>
            </div>
          </div>
<?php $counter++;  } 
}?>