<?php foreach ($mygames as $game): ?>
<?php 
if($game['Game']['seo_url']!=NULL)
$playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'play'));
else
$playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id'])));
?>	
<?php $editurl=$this->Html->url(array( "controller" => "games","action" =>"edit",h($game['Game']['id']))); ?>
<?php $deleteurl=$this->Html->url(array( "controller" => "games","action" =>"delete",h($game['Game']['id']))); ?>
<?php $channelurl=$this->Html->url(array("controller" => $game['User']['seo_username'],"action" =>"")); ?>

              <li class="span3">
                <div class="thumbnail">
                	<a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('alt'=>$game['Game']['name'],'width'=>'200','height'=>'110;')); ?></a>
                    <div class="badge-square grd-black color-white">
                        <div><i rel="tooltip" data-placement="top" data-original-title="Favorited" class="icofont-heart"></i>73 <i rel="tooltip" data-placement="top" data-original-title="Played" class="icofont-play"></i>1242 <i rel="tooltip" data-placement="top" data-original-title="Commented"  class="icofont-comment"></i>13</div>
                    </div>
                  <div class="caption">
                    <h4 style="margin:0px 0px 4px 0px;"><?php echo $game['Game']['name']; ?></h4>
                    <p><a href="<?php echo $editurl ?>" class="btn btn-info btn-mini">Edit</a> <a href="<?php echo $playurl ?>" class="btn btn-success btn-mini">Play</a> <a href="#myModal<?php echo $game['Game']['id']; ?>" data-toggle="modal" class="btn btn-danger btn-mini">Delete</a></p>

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


                  </div>
                </div>
              </li>




					
 <?php endforeach; ?>