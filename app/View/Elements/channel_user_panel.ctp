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


<div class="userpanel">
  <p><?php echo $username ?></p>
  <div class="useravatar">
      <?php echo $this->Upload->image($user,'User.picture');?>
  </div>
  <a class="wall" href="javascript:void();">Wall</a>
  <div class="panelsep"></div>
  <?php echo $this->Html->link('Channel Info',array('controller'=>'users','action'=>'edit',$userid),array('class'=>'info')); ?>
  <?php echo $this->Html->link('Change Password',array('controller'=>'users','action'=>'password',$userid),array('class'=>'change_password')); ?>
  <?php echo $this->Html->link('Add Game',array('controller'=>'games','action'=>'add'),array('class'=>'added')); ?>
  <a class="slide" href="#">Edit Slider</a>
  <?php if ($this->Session->read('Auth.User.role') == 0){
    }else{
    echo $this->Html->link('Google Adsense',array('controller'=>'users','action'=>'edit',$userid),array('class'=>'adsense'));
    }?>
  <a class="subscriber" href="<?php echo $folurl ?>">Followers (<?php echo $subscribeto?>)</a>
  <a class="subscription" href="<?php echo $suburl ?>">Subscriptions (<?php echo $subscribe?>)</a>
</div>



