<!-- <div id="fb-root"></div> -->
<!-- <script> 
// (function(d, s, id) {
//   var js, fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s); js.id = id;
//   js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=241417062605921";
//   fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));
</script>-->

<?php $folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$userid)); ?>
<?php $suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$userid)); ?>
<?php 
$channel=$this->Html->url(array("controller" => "games","action" =>"channel"));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
 ?>


<div class="userpanel">
  <p><a href="<?php echo $channel ?>"><?php echo $username ?></a></p>
  <div class="useravatar">
  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array(    "alt" => "toork avatar image",    'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($user,'User.picture'); }
  ?>

  </div>
  <?php $wall=$this->Html->url(array("controller" => "Wallentries","action" =>"wall")); ?>
  <a class="wall" href="<?php echo $wall ?>">Wall</a>
  <div class="panelsep"></div>
  <?php echo $this->Html->link('Edit Channel',array('controller'=>'users','action'=>'edit',$userid),array('class'=>'info')); ?>
  <?php 
  if($user['User']['facebook_id']==null) { 
echo $this->Html->link('Change Password',array('controller'=>'users','action'=>'password',$userid),array('class'=>'change_password')); }
else{

}
?>
  <?php echo $this->Html->link('Add Game',array('controller'=>'games','action'=>'add'),array('class'=>'added')); ?>
<!--   <a class="slide" href="#">Edit Slider</a> -->
  <?php if ($this->Session->read('Auth.User.role') == 0){
    }else{
    echo $this->Html->link('Google Adsense',array('controller'=>'users','action'=>'edit',$userid),array('class'=>'adsense'));
    }?>
  <a class="subscriber" href="<?php echo $folurl ?>">Followers (<?php echo $subscribeto?>)</a>
  <a class="subscription" href="<?php echo $suburl ?>">Subscriptions (<?php echo $subscribe?>)</a>
</div>



