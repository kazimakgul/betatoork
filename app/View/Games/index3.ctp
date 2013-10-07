
<?php
$bestchannels=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));
$featuredchannels=$this->Html->url(array("controller" => "games","action" =>"featuredchannels"));
$terms=$this->Html->url(array("controller" => "pages","action" =>"terms"));
$privacy=$this->Html->url(array("controller" => "pages","action" =>"privacy"));
?>
<div class="clear"></div>

<!-- ### START - Main Section ### -->
<div class="main" > 
<div class="gradient">
<div class="wrapper" style="margin-top:10px;"> 
<div style="margin:20px 0px -10px 0px ;">
  <h1>Discover, Collect and Share Games !</h1>
  <h2>Create your own game channel</h2> 
</div>
<!-- ### Slider Ipad ### -->
    <div class="slides">
    <div class="slides_container">
     
    <img    src="img/land/slider/image1.png" alt="sld1"/>
     
    
    <img   src="img/land/slider/image2.png"  alt="sld2" />
    
    
    <img    src="img/land/slider/image3.png"  alt="sld3" />
        <img    src="img/land/slider/image4.png"  alt="sld4" />
             
    </div>
    </div><!-- ### END - Slider Ipad ### -->
<div class="subscriber">
<div class="subscriber-wrap">
<h3> Join For Free - Sign Up </h3>
<p>Don&#8217;t miss this Limited Opportunity</p>
<!-- Newsletter -->
     
<form action="#" method="post" novalidate>
<input  value="Channel Name" id="reg_username" placeholder="Channel Name" name="NAME"    class="autoclear name-newsletter"     >
<input  value="Your Email" id="reg_email"  placeholder="Your Email" name="EMAIL"  class="email-newsletter"     >
<input  value="Password" id="reg_password"  placeholder="Password" name="PASSWORD" class="phone-newsletter"   >
<input  type="hidden" id="fast_register" value="1" >
<div style="padding-bottom:10px; margin:-30px 0px 0px 19px;"><i class="color-white elusive-lock"></i></div>
<!-- <a style="margin:18px 0px 0px 0px;" class="btn btn-small"><i class="elusive-facebook color-blue"></i> Connect</a> -->
<input style="margin:10px 0px 0px 0px;" type="button" id="t_landing_registerbtn" value="Join Now" name="subscribe"  class="btn btn-success pull-right" onClick="_gaq.push(['_trackEvent', 'Members', 'New Member']);" >
<label> * By clicking "Join Now" you agree to Toork's <a href="<?php echo $terms;?>">Terms</a> &#38; <a href="<?php echo $privacy;?>">Privacy.</a></label>
</form>
    
<!-- Newsletter -->
</div>
</div>  
</div> 
</div>
</div>
 
<!-- ### END - Main Section ### -->


<!-- ### START - Howitwork Section ### -->
<div class="howitwork" >
<div class="wrapper"> 
<div class="title"><h3>How it Works</h3></div>
<div class="row-fluid">
 
<!-- ###   Feature 1 ### -->
<div class="span4 featu">
<div class="icon"> <img src="img/land/icons/features1.png" class="ft1" alt="" />  </div>
<h6> 1. Choose your channel name</h6>
<p>  Find a great channel name that defines you and fill in the sign up form.</p>
<div class="step"><p>Step 1</p></div>
 </div> 
 
<!-- ###   Feature 2 ### -->
<div class="span4 featu">
<div class="icon"> <img src="img/land/icons/features2.png" class="ft1" alt="" />  </div>
<h6> 2. Confirm your email</h6>
<p>  Go to your e-mail box and verify your e-mail address to be able to share games.</p>
<div class="step"><p>Step 2</p></div>
</div> 
 
<!-- ###   Feature 2 ### -->
<div class="span4 featu">
<div class="icon"> <img src="img/land/icons/features3.png" class="ft1" alt="" />  </div>
<h6> 3. Add games to your channel</h6>
<p>  Play games, follow channels, add games to your channel or share games with your friends.</p>
<div class="step"><p>Step 3</p></div>
</div> 
 

</div>
</div>
</div>
<!-- ### END - Howitwork Section ### -->


<!-- ### START - Features Section ### -->
<div class="features" > 
<div class="wrapper">
<div class="feature1">
<h3>Why Join Toork Now? </h3>
<h6>Here you have some reasons and some features </h6>
<ul>
<li> <i class="color-green elusive-ok-sign"></i> Create your own game channel for free! </li>
<li> <i class="color-green elusive-ok-sign"></i> Add &#38; Share games with your friends and the world</li>
<li> <i class="color-green elusive-ok-sign"></i> Seo Optimized , your customized game channel</li>
<li> <i class="color-green elusive-ok-sign"></i> Easy to play, favorite and rate game</li>
<li> <i class="color-green elusive-ok-sign"></i> Your Personal Dashboard makes everything easier.</li>
</ul>
</div>
<div class="feature2"> <img src="img/land/mockup/window.png" alt="" /> </div>

</div>
</div>
<!-- ### END - Features Section ### -->

<div class="testimonials" >
<div class="wrapper" style="padding:50px 0px 0px 0px;">
 <div class="title" ><h3>Explore Some Games</h3></div>
 <div class="row-fluid" style="margin:50px 0px 0px 0px;">
                                <ul class="thumbnails">
                                    <?php  echo $this->element('NewPanel/gamebox/dashboard_game_box'); ?>
                                </ul>

 </div>
</div>
</div>

<!-- ### START - Testimonials Section ### -->
<div class="testimonials" >
<div class="wrapper">
 <div class="title"><h3>Explore Some Channels</h3></div>
 <div class="row-fluid" style="margin:50px 0px 0px 0px;">
 <ul class="thumbnails">

<?php  echo $this->element('NewPanel/indexchannel_box'); ?>

</ul>
<div>
<a class="btn btn-success span3" href="#top">Create Your Game Channel</a>
<a class="btn span3" href="<?php echo $featuredchannels;?>">Explore More Channels</a>
</div>
 </div>
</div>
</div>
<!-- ### END - Testimonials Section ### -->



<!-- ### START - Testimonials Section ### -->
<div class="action" >
<div class="wrapper">
<h3> Create Your Own <span>Game Channel </span> Now!</h3>
<a class="action-button" href="#top"><i class="elusive-edit"></i> Sign Up</a>
</div>
</div>
<!-- ### END - Testimonials Section ### -->