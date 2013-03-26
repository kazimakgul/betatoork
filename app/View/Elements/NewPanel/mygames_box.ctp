<?php foreach ($mygames as $game): ?>
<?php $playgameurl=$this->Html->url(array( "controller" => "games","action" =>"playgame",h($game['Game']['id'])));
if($game['Game']['seo_url']!=NULL)
$playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'playgame'));
else
$playurl=$this->Html->url(array( "controller" => "games","action" =>"playgame",h($game['Game']['id'])));
?>	
<?php $editurl=$this->Html->url(array( "controller" => "games","action" =>"edit2",h($game['Game']['id']))); ?>
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
                        <a href="<?php echo $editurl ?>" class="btn btn-info btn-mini">Edit</a> 
                        <a href="<?php echo $playurl ?>" class="btn btn-success btn-mini">Play</a> 
                        <a rel="tooltip" data-placement="bottom" data-original-title="Delete" href="#myModal<?php echo $game['Game']['id']; ?>" data-toggle="modal" class="btn btn-mini pull-right helper-font-16"><i class="icofont-trash"></i></a>
                    </p>
                                                    <!-- Modal -->
                        <div id="myModal<?php echo $game['Game']['id'];?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabel">Delete <?php echo $game['Game']['name']; ?> ?</h3>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this game? There is no undo.</p>
                                </div>
                                <div class="modal-footer">
                                    <button id="top-success" class="btn btn-success" data-dismiss="modal" aria-hidden="true">No</button>
                                    <a href="<?php echo $playurl;?>" class="btn btn-danger">Yes! Delete</a>
         
                                </div>
                        </div>
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