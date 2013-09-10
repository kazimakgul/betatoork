<?php 
foreach ($users as $follower): ?>
<?php 
$followid = $follower['User']['id'];

if($follower['User']['seo_username']!=NULL)
{
  $profileurl=$this->Html->url(array( "controller" => h($follower['User']['seo_username']),"action" =>'')); 
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
    <div class="navbar"><div class="navbar-inner"  style="padding:5px 5px 5px 5px;">
    <div class="span1" style="margin:0px 20px 0px 0px;">
      <a href="<?php echo $profileurl ?>">
            <?php 
              if($follower['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("class"=>"img-polaroid img-rounded","alt" => "toork avatar image",'width'=>'60','style'=>'height:80px;')); 
                } else {
                  echo $this->Upload->image($follower,'User.picture',array('class'=>'img-circle'),array('width'=>'60','style'=>'height:80px;',"class"=>"img-polaroid img-rounded",'onerror'=>'imgError(this,"avatar");'));  }
            ?>
      </a>
    </div>
    
    <div class="span4" style="margin:-10px 10px 0px -25px;">
        

<ul style="padding-left:0px; list-style:none" class="nav-list">
  <li ><h5><a class="btn" href="<?php echo $profileurl ?>"><?php echo $follower['User']['username']; ?></a></h5></li>
  <li><i class="elusive-group color-blue"></i> <?php echo $follower['Userstat']['subscribeto']; ?> Followers</a></li>
  <li><i class="icon-gamepad color-red"></i> <?php echo $follower['Userstat']['uploadcount']; ?> Games</a></li>
</ul>

                    
                    
                    
                    
                    
                    <!-- <?php echo $follower['Userstat']['potential']; ?> -->

    </div>

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
    <div class="span7">
      <div class="header-control pull-left" style="margin:20px 0px 5px 0px;">
        
	<?php if($this->Session->check('Auth.User') == 1){ ?>	
		<button onclick="subscribe('<?php echo $follower['User']['username']; ?>',user_auth,<?php echo $follower['User']['id']; ?>); _gaq.push(['_trackEvent', 'Channel', 'Follow', '<?php echo $follower['User']['username']; ?>']);" rel="tooltip" data-placement="top" data-original-title="Follow this Channel" data-box="close" style="opacity:1;" data-hide="fadeOut" class="close"><a class="btn btn-success"><i class="elusive-plus-sign"></i> follow</a></button> 
    <?php }else{ ?>
	<button onclick="subscribe('<?php echo $follower['User']['username']; ?>',user_auth,<?php echo $follower['User']['id']; ?>);" rel="tooltip" data-placement="top" data-original-title="Follow this Channel"  style="opacity:1;" data-hide="fadeOut" class="close"><a class="btn btn-success"><i class="elusive-plus-sign"></i> follow</a></button> 
	<?php } ?>
		
		
      </div>
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
  <?php $gameName = $oneof3['Game']['name'];?>
  <li style="margin:0px 0px 0px 5px;">
    <div rel="tooltip" data-placement="top" data-original-title="<?php echo $gameName; ?>" >
	<a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($oneof3,'Game.picture',array('style' => 'toorksize'),array('width'=>'130px','height'=>'72px','style'=>'max-height:72px','alt'=>$gameName,'class'=>'img-polaroid','onerror'=>'imgError(this,"toorksize");')); ?></a>
	 </div>
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
 
 
  <!--Hidden Pagination -->
	<div class="paging" style="display:none;">
    <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
     echo $this->Paginator->numbers();
     echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
    </div>
  <!--Hidden Pagination -->