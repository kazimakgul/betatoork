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
  <a class="subscriber" href="{% url subscribers user_for_userpanel.username %}"><!-- number of subscribers --> Subscribers</a>
  <a class="subscription" href="{% url subscriptions user_for_userpanel.username %}"> <!-- number of subscriptions -->Subscriptions</a>
</div>
<a href="javascript:void();" class="subscribe" id="subscribe"></a>



<div id="fb-root"></div>

<script>
  window.FB_login = function() {}
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '241417062605921', // App ID
      channelUrl : '{% url channel %}', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here

  window.FB_login = function(nextUrl) {
      FB.login(function(response) {
        if (response.authResponse) {
          document.getElementById("_fb_access_token").value = response.authResponse.accessToken;
          document.getElementById("_fb_expires_in").value = response.authResponse.expiresIn;
          document.getElementById("_fb_next_url").value = nextUrl || '';
          document.getElementById("_fb_login").submit();
        } else {
          var next;
          if (response && response.status && response.status == "notConnected") {
            next = '/';
          } else {
            next = '/';
          }
          window.location.href = next;
        }
      }, {scope: '{{facebook_perms}}' });
    }
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));
</script>


<form id="_fb_login" method="post" action="">

<input type="hidden" name="next" value="" id="_fb_next_url"/>
<input type="hidden" name="access_token" id="_fb_access_token"/>
<input type="hidden" name="expires_in" id="_fb_expires_in"/>
</form>

<!-- <div class="fb-login-button"  data-width="200" data-max-rows="1" onclick="FB_login()"></div> -->


