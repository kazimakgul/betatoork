<?php
if($game['User']['seo_username']!=NULL)
{
  $profilepublic=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>'go')); 
}
else{
  $profilepublic=$this->Html->url(array("controller" => "games","action" =>"profile",$game['User']['id']));
}
?>

<div style="margin:39px 0px 0px 0px; width:100%; height:100%;">
<iframe src="<?php echo h($game['Game']['link']); ?>" style="width:100%; height:100%;"></iframe>
</div>


<?php  echo $this->element('NewPanel/ratebar',array('profilepublic'=>$profilepublic)); ?>

