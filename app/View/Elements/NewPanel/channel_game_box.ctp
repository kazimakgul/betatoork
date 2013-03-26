<?php foreach ($mygames as $game): ?>
<?php $playgameurl=$this->Html->url(array( "controller" => "games","action" =>"playgame",h($game['Game']['id'])));
if($game['Game']['seo_url']!=NULL)
$playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'play'));
else
$playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id'])));
?>	
<?php $editurl=$this->Html->url(array( "controller" => "games","action" =>"edit",h($game['Game']['id']))); ?>
<?php $deleteurl=$this->Html->url(array( "controller" => "games","action" =>"delete",h($game['Game']['id']))); ?>
<?php $channelurl=$this->Html->url(array("controller" => $game['User']['seo_username'],"action" =>"")); ?>
    
              <li class="span3">
                <div class="navbar"><div class="navbar-inner" style="padding:5px 5px 5px 5px;">
                  <a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('alt'=>$game['Game']['name'],'width'=>'200','height'=>'110;')); ?></a>
                  <div style="margin:-24px 0px 0px 0px; text-align: center">
                      <ul class="label label-inverse inline color-white" style="padding:0px 0px 0px 0px; text-align: center;">
                        <li rel="tooltip" data-placement="bottom" data-original-title="Favorite">
                          <i class="icofont-heart"></i>73
                        </li>
                        <li rel="tooltip" data-placement="bottom" data-original-title="Play" >
                          <i class="icofont-play"></i>5242
                        </li>
                        <li rel="tooltip" data-placement="bottom" data-original-title="Comment"  >
                          <i class="icofont-comment"></i>18
                        </li>
                      </ul>
                  </div>
                  <div class="caption">
                    <h4 style="margin:0px 0px 4px 0px;"><?php echo $game['Game']['name']; ?></h4>
                  <p>
                    <a href="<?php echo $channelurl ?>"class="btn btn-mini"><strong><?php echo $game['User']['username']; ?></strong></a>
                    <a href="<?php echo $playgameurl ?>" class="pull-right btn btn-success btn-mini"><i class="icofont-play"></i> Play</a>
                  </p>
                  <hr size="3" style="margin:0px 0px 5px 0px;">
                    <div rel="tooltip" data-placement="bottom" data-original-title="28 People Rated"  class="helper-font-16" style="text-align: center">
                      <i class="icofont-star"></i>
                      <i class="icofont-star"></i>
                      <i class="icofont-star"></i>
                      <i class="icofont-star"></i>
                      <i class="icofont-star-empty"></i>
                    </div>

                  </div>
                  
                </div></div>
              </li>
					
 <?php endforeach; ?>