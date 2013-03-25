<?php foreach ($top_rated_games as $game): ?>
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
                  <div class="caption">
                    <h4 style="margin:0px 0px 4px 0px;"><?php echo $game['Game']['name']; ?></h4>
                    <p>
                    <a href="<?php echo $channelurl ?>"class="btn btn-mini"><strong><?php echo $game['User']['username']; ?></strong></a>
                    <a href="<?php echo $playgameurl ?>" class="pull-right btn btn-success btn-mini">Play</a></p>
                  </div>
                    
                      <ul class="inline color-black" style="text-align: center">
                        <li>
                          <i rel="tooltip" data-placement="top" data-original-title="Favorited2" class="icofont-heart"></i>73
                        </li>
                        <li>
                          <i rel="tooltip" data-placement="top" data-original-title="Played" class="icofont-play"></i>52242
                        </li>
                        <li>
                          <i rel="tooltip" data-placement="top" data-original-title="Commented"  class="icofont-comment"></i>18
                        </li>
                      </ul>
                  
                </div></div>
              </li>




					
 <?php endforeach; ?>