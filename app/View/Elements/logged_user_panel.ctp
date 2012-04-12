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
  <a class="added" href="{% url channel-games user_for_userpanel.username %}"><?php echo $gamenumber ?> games added</a>
  <a class="favorite" href="{% url favorite-games user_for_userpanel.username %}"><?php echo $favoritenumber ?> games favorite</a>
  <a class="played" href="{% url played-games user_for_userpanel.username %}"><!-- number of played games --> games played</a>
  <a class="subscriber" href="{% url subscribers user_for_userpanel.username %}"><?php echo $subscribeto ?> Followers</a>
  <a class="subscription" href="{% url subscriptions user_for_userpanel.username %}"><?php echo $subscribe ?> Subscriptions</a>
</div>
