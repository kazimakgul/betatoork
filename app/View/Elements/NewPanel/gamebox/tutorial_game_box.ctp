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

      <div class="span6" style="margin:0px;">

                  
         <li class="header-control contact-alt grd-white" style="margin:0px 10px 10px 0px;">
                                                    <!--we use data toggle tab for navigate this action-->
                                                    <a style="margin:0px 0px 5px 0px;" href="#" >
                                                        <!--we use contact-item structure like the component media in bootstrap-->
                                                        <div class="contact-item">
                                                            <div class="pull-left" style="margin:4px;" >
                                                                <?php 
                echo $this->Upload->image($game,'Game.picture',array('class'=>'img-circle'),array('max-height'=>'40','onerror'=>'imgError(this,"avatar");'));
              ?>
                                                            </div>
                                                            <div class="contact-item-body">
                                                        <p class="contact-item-heading bold"><?php echo $game['Game']['name']; ?></p>
                                                            </div>
                                                        </div>
                                                    <button onclick="chaingame2('<?php echo $game['Game']['name']; ?>',user_auth,<?php echo $game['Game']['id']; ?>);" style="margin:-28px 5px 0px 0px; opacity:1;" href="#" rel="tooltip" data-placement="left" data-original-title="Chain" data-box="close" data-hide="fadeOut" class="close"><i class="btn btn-success btn-mini helper-font-16 icofont-link"></i></button> 
                                                    </a>
                                                </li>       
      
      
      </div>    






					
 <?php endforeach; ?>