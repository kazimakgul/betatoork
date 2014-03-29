<?php $counter=0;?>
<?php foreach ($games as $game): ?>
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
          <?php echo $div; ?>
            <div class="panel panel-default">
                <a href="<?php echo $playurl; ?>" class="panel-image">
                <?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('class' => 'panel-image-preview','alt'=>$game['Game']['name'],'onerror'=>'imgError(this,"toorksize");')); ?></a>
                <div class="panel-footer text-center" style="padding:0px;">
                  <a href="<?php echo $playurl; ?>" style="padding:0px;"><h5 class="darkblue" ><?php echo $game['Game']['name']; ?></h5></a>
                  <div class="row">
                    <span class="col-md-7" data-toggle="tooltip" data-placement="bottom" title="53 Rates" >
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span> 
                    </span>
                    <span class="col-md-5">
                    <i data-toggle="tooltip" data-placement="bottom" title="67 Plays" class="fa fa-play green"></i>
                    <i data-toggle="tooltip" data-placement="bottom" title="23 Favorites" class="fa fa-heart red"></i>
                    <i data-toggle="tooltip" data-placement="bottom" title="41 Clones" class="fa fa-plus-square darkblue"></i>
                    <span>
                    </div>
                </div>
            </div>
          </div>

<?php $counter = $counter+1; if($counter==$limit){ break; }else{continue;}?>
 <?php endforeach; ?>