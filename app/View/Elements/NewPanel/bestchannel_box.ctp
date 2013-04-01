

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
    <div class="navbar"><div class="navbar-inner"  style="padding:5px 5px 5px 5px;">
    <div class="span1" style="margin:0px 20px 0px 0px;">
            <?php 
              if($follower['User']['picture']==null) { 
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("class"=>"img-polaroid img-rounded","alt" => "toork avatar image",'width'=>'60','url' => array('controller' => 'games', 'action' => 'profile', $followid))); 
                } else {
                  echo $this->Upload->image($follower,'User.picture',array('class'=>'img-circle'),array('width'=>'60',"class"=>"img-polaroid img-rounded",'url' => array('controller' => 'games', 'action' => 'profile', $followid),'onerror'=>'imgError(this,"avatar");'));  }
            ?>
    </div>
    
    <div class="span4" style="margin:-10px 10px 0px -25px;">
        

<ul style="padding-left:0px; list-style:none" class="nav-list">
  <li ><h5><a class="btn" href="<?php echo $profileurl ?>"><?php echo $follower['User']['username']; ?></a></h5></li>
  <li><?php echo $follower['Userstat']['subscribeto']; ?> Followers</a></li>
  <li><?php echo $follower['Userstat']['uploadcount']; ?> Games</a></li>
</ul>

                    
                    
                    
                    
                    
                    <!-- <?php echo $follower['Userstat']['potential']; ?> -->

    </div>

    <div class="span7">
      <div class="header-control pull-left" style="margin:20px 0px 5px 0px;">
        <button onclick="$.pnotify({
            title: 'Thanks for Following',
            text: 'You are following <strong><?php echo $follower['User']['username']; ?></strong> now.<br>You will be notified about the updates of this channel.',
            type: 'success'
          });" rel="tooltip" data-placement="top" data-original-title="Follow this Channel" data-box="close" data-hide="fadeOut" class="close"><a class="btn btn-success"><i class="elusive-plus-sign"></i> follow</a></button> 
      </div>
<ul class="thumbnails pull-right">
  <li style="margin:0px 0px 0px 5px;">
    <a href="#" >
      <img class="img-polaroid" data-src="holder.js/130x72" alt="">
    </a>
  </li>  
  <li style="margin:0px 0px 0px 5px;">
    <a href="#" >
      <img class="img-polaroid" data-src="holder.js/130x72" alt="">
    </a>
  </li>
  <li style="margin:0px 0px 0px 5px;">
    <a href="#" >
      <img class="img-polaroid" data-src="holder.js/130x72" alt="">
    </a>
  </li>
</ul>

    </div>
</div>
</div></div>







					
 <?php endforeach; ?>