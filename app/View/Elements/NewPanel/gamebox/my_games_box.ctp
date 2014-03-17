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

					
      <li class="span3" id="my_thumb_<?php echo $game['Game']['id']; ?>" style="background-color:white; margin:0px 8px 15px 8px;">
        <div class="thumbnail" style="border-radius:0px">
          <a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('alt'=>$game['Game']['name'],'width'=>'720','height'=>'110','onerror'=>'imgError(this,"toorksize");')); ?></a>
          <div class="caption" style="margin:0px; padding:0px 3px 0px 3px;" >
            <h5><?php echo $game['Game']['name']; ?></h5>

              <div rel="tooltip" data-placement="bottom" data-original-title="Avarage Total Rating" class="pull-left helper-font-16">
    <!--**************************-->  
  <!--16px Rating Stars Starts Below--> 
  <!--**************************-->   
  <?php echo  $this->element('NewPanel/rating_stars_16',array('game'=>$game)); ?>
  <!--**************************-->  
  <!--/16px Rating Stars Ends Below-->  
  <!--**************************--> 
              </div>
          <p>Potantional is 173</p>
            <p>
                <a href="<?php echo $editurl ?>" class="btn btn-info btn-mini">Edit</a> 
                <a href="<?php echo $playurl ?>" class="btn btn-success btn-mini">Play</a> 
                <a rel="tooltip" data-placement="bottom" data-original-title="Delete" href="#myModal<?php echo $game['Game']['id']; ?>" data-toggle="modal" class="btn btn-mini pull-right helper-font-16"><i class="icofont-trash"></i></a>
            </p>
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

          </div>
          <div style="margin:-4px; padding:0px 3px 0px 3px; border-radius:0px" class="alert alert-info"> <h5>INSIGHTS</h5>
            <p class="label label-warning">172 Plays</p>
            <p class="label label-info">84 Clones</p>
            <p class="label label-success">12 Favorites</p>
            <p class="label label-important">47 Rates</p>
        </div>
        </div>
      </li>


 <?php endforeach; ?>
