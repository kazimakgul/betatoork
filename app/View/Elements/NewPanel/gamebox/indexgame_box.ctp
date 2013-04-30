<?php foreach ($top_rated_games as $game): ?>
<?php

if($game['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>'')); 
}
else{
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$game['User']['id']));
}

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


              <li class="span3" style="margin:0px 8px 0px 8px;">
                <div class="navbar"><div class="navbar-inner" style="padding:10px 10px 5px 10px;">
                  <a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('alt'=>$game['Game']['name'],'width'=>'720','height'=>'110','onerror'=>'imgError(this,"toorksize");')); ?></a>
                  <div class="caption">
                    <div style="min-height:45px; height:auto !important; height:45px;">
                    <h4 class="text-info"><?php echo $game['Game']['name']; ?></h4>
                    </div>
                  <p>
                    <a href="<?php echo $profileurl ?>"class="btn btn-mini"><strong><?php echo $game['User']['username']; ?></strong></a>
                    <a href="<?php echo $playurl ?>" class="btn btn-success btn-mini"><i class="icofont-play"></i> Play</a>
                  </p>
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
                  
                </div></div>
              </li>

					
 <?php endforeach; ?>