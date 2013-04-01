<?php foreach ($favorites as $game): ?>
<?php

if($game['Game']['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($game['Game']['User']['seo_username']),"action" =>'go')); 
}
else{
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$game['Game']['User']['id']));
}

if($game['Game']['seo_url']!=NULL)
{
      if($game['Game']['embed']!=NULL){
      $playurl=$this->Html->url(array( "controller" => h($game['Game']['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'playgame'));
    }
    else{
      $playurl=$this->Html->url(array( "controller" => h($game['Game']['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'playframe'));
    }
}
else{
    $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($game['Game']['id'])));
}


?>	
    
              <li class="span3" style="margin:0px 15px 0px 0px;">
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
                    <div style="min-height:45px; height:auto !important; height:45px;">
                    <h4 class="text-info"><?php echo $game['Game']['name']; ?></h4>
                    </div>
                  <p>
                    <a href="<?php echo $profileurl ?>"class="btn btn-mini"><strong><?php echo $game['Game']['User']['username']; ?></strong></a>
                    <a href="<?php echo $playurl ?>" class="pull-right btn btn-success btn-mini"><i class="icofont-play"></i> Play</a>
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