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

  

<div class="span6" style="margin:0px 5px 0px 0px;">
  <li class="header-control">
    <div class="well thumbnail">
<?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('class'=>'img-polaroid','width'=>'230px','onerror'=>'imgError(this,"toorksize");')); ?>
      <button onclick="chaingame2('<?php echo $game['Game']['name']; ?>',user_auth,<?php echo $game['Game']['id']; ?>);" style="margin-top:-150px; margin-left:80px;" href="#" rel="tooltip" data-placement="left" data-original-title="Clone" data-box="close" data-hide="fadeOut" class="btn btn-success"><i class="elusive-plus-sign"></i> Clone</button>

      <p style="margin:5px; margin-top:-15px;"><strong><?php echo $game['Game']['name']; ?></strong></p>
    </div>
  </li>
</div>



					
 <?php endforeach; ?>