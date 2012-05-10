 <?php 
$terms=$this->Html->url(array( "controller" => "pages","action" =>"terms"));
$privacy=$this->Html->url(array( "controller" => "pages","action" =>"privacy"));
$help=$this->Html->url(array( "controller" => "pages","action" =>"help"));
$about=$this->Html->url(array( "controller" => "pages","action" =>"about"));
$developer=$this->Html->url(array( "controller" => "pages","action" =>"developers"));
$advertise=$this->Html->url(array( "controller" => "pages","action" =>"advertise"));

$lastadded=$this->Html->url(array( "controller" => "games","action" =>"lastadded"));
$toprated=$this->Html->url(array( "controller" => "games","action" =>"toprated"));
$mostplayed=$this->Html->url(array( "controller" => "games","action" =>"mostplayed"));
?>
<div class="footer">
  <div class="ftop clearfix">
    <div class="fmenu clearfix">
      <div class="fgames">
        <p>Games</p>
        <ul>
          <li><a href="<?php echo $lastadded ?>">Last Added Games</a></li>
          <li><a href="<?php echo $toprated ?>">Top Rated Games</a></li>
          <li><a href="<?php echo $mostplayed ?>">Most Played Games</a></li>
        </ul>
      </div>
      <div class="fterms">
        <p>Terms & Conditions</p>
        <ul>
          <li><a href="<?php echo $about ?>">About Us</a></li>
          <li><a href="<?php echo $terms ?>">Terms & Conditions</a></li>
          <li><a href="<?php echo $privacy ?>">Privacy Policy</a></li>
          <li><a href="<?php echo $help ?>">Support</a></li>
          <li><a href="<?php echo $developer ?>">Developers</a></li>
          <li><a href="<?php echo $advertise ?>">Advertise With Us</a></li>
          
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
    <span>Copyright 2011 - Toork - Create your own game channel. All Rights Reserved</span>
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
