<?php

print_r($game);

if($game['User']['seo_username']!=NULL)
{
  $profilepublic=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>'')); 
}
else{
  $profilepublic=$this->Html->url(array("controller" => "games","action" =>"profile",$game['User']['id']));
}
?>

<div style="margin:39px 0px 0px 0px; width:100%; height:100%;">
	<iframe src="<?php echo h($game['Game']['link']); ?>" style="border: 0; position:fixed; top:40px; left:0; right:0; bottom:0; width:100%; height:100%">
</iframe>
</div>


<?php  echo $this->element('NewPanel/ratebar',array('profilepublic'=>$profilepublic)); ?>

