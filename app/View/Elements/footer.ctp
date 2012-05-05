 <?php $terms=$this->Html->url(array( "controller" => "pages","action" =>"terms"));?>
<div class="footer">
  <div class="ftop clearfix">
    <div class="fmenu clearfix">
      <div class="fgames">
        <p>Games</p>
        <ul>
          <li><a href="/game/recently_added/">Last Added Games</a></li>
          <li><a href="/game/top_rated/">Top Rated Games</a></li>
          <li><a href="/game/most_played/">Most Played Games</a></li>
        </ul>
      </div>
      <div class="fterms">
        <p>Terms & Conditions</p>
        <ul>
          <li><a href="<?php echo $terms ?>">Terms & Conditions</a></li>
          <li><a href="">Privacy Policy</a></li>
          <li><a href="">FAQ</a></li>
          <li><a href="">Documents</a></li>
          <li><a href="">Help</a></li>
        </ul>
      </div>
    </div>
    <div class="flogo">
      <div class="logofooter"></div>
    </div>
  </div>
  <div class="fmid">
    <div class="fotosep"></div>
  </div>
  <div class="fdown">
    <ul>
      <li><a class="facebook" href="http://www.facebook.com/thetoork"></a></li>
      <li><a class="twitter" href="https://twitter.com/thetoork"></a></li>
      <li><a class="google" href="https://plus.google.com/u/0/117184471094869274585"></a></li>
    </ul>
    <span>Copyright 2011 © Toork Games All Rights Reserved</span>
  </div>
</div>
<script>
$(function() {
  if($("#register_form").length) {
    viewModel.registerForm = new RegisterForm("#register_form");
  }
  if($("#login_form").length) {
    viewModel.loginForm = new LoginForm("#login_form");
  }
  ko.applyBindings(viewModel);
});
</script>
