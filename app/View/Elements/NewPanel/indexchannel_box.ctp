<?php 
foreach ($users as $follower): ?>
<?php 
$followid = $follower['User']['id'];

if($follower['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($follower['User']['seo_username']),"action" =>'go')); 
}
else{
  $profileurl=$this->Html->url(array("controller" => "games","action" =>"profile",$followid));
}

$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));

?>

<?php
$facebook=$follower['User']['fb_link'];
$twitter=$follower['User']['twitter_link'];
$gplus=$follower['User']['gplus_link'];
$website=$follower['User']['website'];
if($facebook==NULL){
  
}else{
  $facebook = "<a class='fb_link' href='$facebook' target='_blank' rel='nofollow'></a>";
}
if($twitter==NULL){
  
}else{
  $twitter = "<a class='twitter_link' href='$twitter' target='_blank' rel='nofollow'></a>";
}
if($gplus==NULL){
  
}else{
  $gplus = "<a class='gplus_link' href='$gplus' target='_blank' rel='nofollow'></a>";
}
if($website==NULL){
  
}else{
  $website = "<a class='website_link' href='$website' target='_blank' rel='nofollow'></a>";
}
?>

<div class="row-fluid">
    <div class="navbar">
      <div class="navbar-inner"  style="padding:5px 5px 5px 5px;">
    <div class="span1" style="margin:0px 20px 0px 0px;">
      <a href="<?php echo $profileurl ?>">
            <?php 
              if($follower['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("class"=>"img-polaroid img-rounded","alt" => "toork avatar image",'width'=>'60','style'=>'height:75px;')); 
                } else {
                  echo $this->Upload->image($follower,'User.picture',array('class'=>'img-circle'),array('width'=>'60','style'=>'height:75px;',"class"=>"img-polaroid img-rounded",'onerror'=>'imgError(this,"avatar");'));  }
            ?>
      </a>
    </div>
    
    <div class="span4" style="margin:0px 0px 0px -5px;">
        

<ul style="padding-left:0px; list-style:none" class="nav-list">
  <li ><h5><a class="btn" href="<?php echo $profileurl ?>"><?php echo $follower['User']['username']; ?></a></h5></li>
  <li><?php echo $follower['Userstat']['subscribeto']; ?> Followers</a></li>
  <li><?php echo $follower['Userstat']['uploadcount']; ?> Games</a></li>
</ul>

                    
                    
                    
                    

    </div>

    <div class="span7">
<ul class="thumbnails pull-right" style="margin:2px 0px 0px 0px;">
  
  
  <?php
//Get 3 Games into variable
$games3=$this->requestAction( array('controller' => 'games', 'action' => 'get_3_games',$follower['User']['id']));	
foreach ($games3 as $oneof3):
//--------Setting Up of Play Url----------
if($oneof3['Game']['seo_url']!=NULL)
{
      if($oneof3['Game']['embed']!=NULL)
      $playurl=$this->Html->url(array( "controller" => h($oneof3['User']['seo_username']),"action" =>h($oneof3['Game']['seo_url']),'playgame'));
	  else
	  $playurl=$this->Html->url(array( "controller" => h($oneof3['User']['seo_username']),"action" =>h($oneof3['Game']['seo_url']),'playframe'));
}
else{
       $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($oneof3['Game']['id'])));
}
//-------/Setting Up of Play Url----------
?>
  
  <li style="margin:0px 0px 0px 5px;">
    
	<a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($oneof3,'Game.picture',array(NULL),array('width'=>'130px','height'=>'72px','style'=>'max-height:72px','alt'=>$oneof3['Game']['name'],'class'=>'img-polaroid')); ?></a>
	
  </li>  
 
<?php endforeach; ?>
  
  
  <!--
  <li style="margin:0px 0px 0px 5px;">
    <a href="#" >
      <img class="img-polaroid" data-src="holder.js/130x72" alt="">
    </a>
  </li>
  -->
  
</ul>

    </div>
</div>
</div></div>







					
 <?php endforeach; ?>