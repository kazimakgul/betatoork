<?php $folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$userid)); ?>
<?php $suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$userid)); ?>
<?php $channelurl=$this->Html->url(array("controller" => "games","action" =>"usergames",$userid)); ?>

<div class="userpanel">
  <p><?php echo $username ?></p>
  <div class="useravatar">
    <!-- if facebook logedin 
      <fb:profile-pic uid="" size="small" width="100" height="200" linked="false"/> -->
    <!-- else -->
      <img alt="" src="/betatoork/img/avatar1.jpg" />
   <!-- end -->
  </div>
  <div class="activity">Activity</div>
  <div class="panelsep"></div>
  <a class="added" href="<?php echo $channelurl ?>"><?php echo $gamenumber ?> games added</a>
  <a class="favorite" href="<?php echo $channelurl ?>"><?php echo $favoritenumber ?> games favorite</a>
  <a class="played" href="{% url played-games user_for_userpanel.username %}"><!-- number of played games --> games played</a>
  <a class="subscriber" href="<?php echo $folurl ?>"><?php echo $subscribeto ?> Followers</a>
  <a class="subscription" href="<?php echo $suburl ?>"><?php echo $subscribe ?> Subscriptions</a>
</div>
