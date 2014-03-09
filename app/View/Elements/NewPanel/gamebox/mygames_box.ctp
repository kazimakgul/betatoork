<?php if($mygames==NULL){ echo "<div class='elusive-plus-sign color-blue media well shadow span5' style='background-color:white;'> You haven't added any games yet.</div>";} ?>


<?php foreach ($mygames as $game): ?>
<?php

if($game['Game']['seo_url']!=NULL)
{
      if($game['Game']['embed']!=NULL)
      $playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'playgame'));
    else
    $playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'playframe'));
}
else{
    $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($game['Game']['id'])));
}

?>	
<?php $editurl=$this->Html->url(array( "controller" => "games","action" =>"edit2",h($game['Game']['id']))); ?>
<?php $deleteurl=$this->Html->url(array( "controller" => "games","action" =>"delete",h($game['Game']['id']))); ?>

              <li class="span3" id="my_thumb_<?php echo $game['Game']['id']; ?>" style="margin:0px 8px 0px 8px;">
              <?php if($game['Game']['clone']){ ?>
              <div class="helper-font-48" style="margin: 0px 0px 0px -9px; z-index:1; position:absolute;">
                <i class="elusive-bookmark color-blue"></i>
              </div>
              <div class="helper-font-24" style="margin: 0px 0px 0px -9px; z-index:1; position:absolute;">
                <i rel="tooltip" data-placement="top" data-original-title="Clone"  class="elusive-tint color-white" style="margin: 0px 0px 0px 12px;"></i>
              </div>
              <?php } ?>
                <div class="well" style="background-color:white; padding:0px 0px 25px 0px;">
                  <a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('alt'=>$game['Game']['name'],'width'=>'720','height'=>'110','onerror'=>'imgError(this,"toorksize");')); ?></a>
                  <div class="caption" style="margin:-5px 5px -5px 5px;">
                    <div style="min-height:45px; height:auto !important; height:45px;">
                    <h4 class="text-info"><?php echo $game['Game']['name']; ?></h4>
                    </div>
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
                                    <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">No</button>
                                    <button onclick="gamedelete('<?php echo $game['Game']['name']; ?>',user_auth,<?php echo $game['Game']['id']; ?>);" class="btn btn-danger">Yes! Delete</button>
         
                                </div>
                        </div>
                  <hr size="3" style="margin:0px 0px 5px 0px;">
                    <div class="helper-font-16 pull-right">
                      <i style="opacity:0.5;" rel="tooltip" data-placement="bottom" data-original-title="Favorites" class="color-red icofont-heart"></i>
                      <i style="opacity:0.5;" rel="tooltip" data-placement="bottom" data-original-title="Plays" class="color-blue icofont-play"></i>
                       <i style="opacity:0.5;" rel="tooltip" data-placement="bottom" data-original-title="Comments" class="color-green icofont-comment"></i>
                    </div>

                    <div rel="tooltip" data-placement="bottom" data-original-title="Avarage Total Rating" class="pull-left helper-font-16">
    <!--**************************-->  
  <!--16px Rating Stars Starts Below--> 
  <!--**************************-->   
  <?php echo  $this->element('NewPanel/rating_stars_16',array('game'=>$game)); ?>
  <!--**************************-->  
  <!--/16px Rating Stars Ends Below-->  
  <!--**************************--> 
                    </div>

                  </div>
                  
                </div>
              </li>
					
 <?php endforeach; ?>