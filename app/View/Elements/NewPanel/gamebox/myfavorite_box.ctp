<?php foreach ($favorites as $game): ?>
<?php 

if($game['Game']['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($game['Game']['User']['seo_username']),"action" =>'')); 
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

<?php $deleteurl=$this->Html->url(array( "controller" => "games","action" =>"delete",h($game['Game']['id']))); ?>

<!----Declare Channel Name For JavaScript Usage---->
  <!----=========================================---->
  <script>
  <?php if($this->Session->check('Auth.User') == 1){ ?>
  user_auth=1;
  <?php }else{?>
  user_auth=0;
  <?php }?>
  </script>
  <!----=========================================---->



              <li class="span3 header-control" style="margin:0px 15px 0px 0px;">
                <div class="navbar"><div class="navbar-inner" style="padding:10px 10px 5px 10px;">
                  <a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('alt'=>$game['Game']['name'],'width'=>'720','height'=>'110;')); ?></a>

                  <div class="caption">
                    <div style="min-height:45px; height:auto !important; height:45px;">
                    <h4 class="text-info"><?php echo $game['Game']['name']; ?></h4>
                    </div>
                    <p>
                    <a href="<?php echo $profileurl ?>"class="btn btn-mini"><strong><?php echo $game['Game']['User']['username']; ?></strong></a>
                    <a href="<?php echo $playurl ?>" class="btn btn-success btn-mini">Play</a>
                    <a rel="tooltip" onclick="unFavorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);" data-placement="bottom" data-original-title="Remove" data-box="close" data-hide="rotateOut" class="btn btn-mini pull-right helper-font-16"><i class="icofont-remove"></i></a> 
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