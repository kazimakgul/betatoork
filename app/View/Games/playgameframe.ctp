<?php
if($game['User']['seo_username']!=NULL)
{
  $profilepublic=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>'')); 
}
else{
  $profilepublic=$this->Html->url(array("controller" => "games","action" =>"profile",$game['User']['id']));
}
?>

<div style="margin:39px 0px 0px 0px; width:100%; height:100%;">
<iframe frameBorder="0" src="<?php echo h($game['Game']['link']); ?>" seamless="seamless" style="width:100%; height:100%;"></iframe>
</div>


<?php  echo $this->element('NewPanel/ratebar',array('profilepublic'=>$profilepublic)); ?>

