<!DOCTYPE HTML>
<html>
<head>

<!-- ### Define Charset ### -->
<meta charset="utf-8">

<!-- ### Responsive MetaTag ### -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- ### Page Title ### -->
<title> Toork | Create your own game channel  </title>

<!-- ### Description and Keyword ### -->
<meta name="keywords" content=""/>
<meta name="description" content=""/>

<!-- ### Stylesheet and Bootstrap ### -->


<?php echo $this->Html->css(array('css2/bootstrap','css2/bootstrap-responsive','css2/stilearn','css2/stilearn-responsive','css2/stilearn-helper','css2/stilearn-icon','css2/font-awesome','css2/animate','css2/uniform.default','css2/select2','css2/jquery.pnotify.default','css2/elusive-webfont')); ?>
<?php echo $this->Html->css(array('land/styles.css')); ?>

<!-- ### Favicon ### -->
<link rel="shortcut icon" href="land/favicon.ico" type="image/x-icon" />

<!-- ### Google Fonts ### -->
<link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,700,600,200" rel="stylesheet" type="text/css"/>

<!-- ### Javascript Files ### -->

<?php echo $this->Html->script(array('land/jquery.min.js','land/jquery-ui.min.js','land/lightbox.js','land/custom.js','land/custom2.js','land/slides.js')); ?>

<?php echo $this->Html->script(array('js2/bootstrap','js2/uniform/jquery.uniform','js2/peity/jquery.peity','js2/select2/select2','js2/knob/jquery.knob','js2/flot/jquery.flot','js2/flot/jquery.flot.resize','js2/holder','js2/pnotify/jquery.pnotify','js2/pnotify/jquery.pnotify.demo','js2/validate/jquery.validate','js2/wizard/jquery.wizard')); ?>


<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
<body>
<div class="wrap-switcher">
 <!-- ### START - Header Section ### -->
<?php

if($this->Session->check('Auth.User')){
    $index=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
}else{
    $index=$this->Html->url(array("controller" => "games","action" =>"index")); 
}

$logout=$this->Html->url(array("controller" => "users","action" =>"logout")); 
$addGame=$this->Html->url(array("controller" => "games","action" =>"add2"));
$dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard")); 
$mygames=$this->Html->url(array("controller" => "games","action" =>"mygames"));
$favorites=$this->Html->url(array("controller" => "games","action" =>"favorites"));
$chains=$this->Html->url(array("controller" => "games","action" =>"chains"));
$wall=$this->Html->url(array("controller" => "wallentries","action" =>"wall3"));
$bestchannels=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));
$toprated=$this->Html->url(array("controller" => "games","action" =>"toprated2"));
$login=$this->Html->url(array("controller" => "users","action" =>"login2"));
$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
$profilepublic=$this->Html->url(array("controller" => "games","action" =>"profile",$this->Session->read('Auth.User.id')));
$password=$this->Html->url(array("controller" => "users","action" =>"password2",$this->Session->read('Auth.User.id')));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
?>


<?php

if($this->Session->check('Auth.User')){

echo $this->element('NewPanel/header',array('logout'=>$logout,'addGame'=>$addGame,'dashboard'=>$dashboard,'publicprofile'=>$profilepublic,'settings'=>$settings,'index'=>$index,'avatarImage'=>$avatarImage,'wall'=>$wall,'bestchannels'=>$bestchannels,'toprated'=>$toprated));


}else{
    echo $this->element('NewPanel/unauthHeader',array('index'=>$index,'login'=>$login,'bestchannels'=>$bestchannels,'toprated'=>$toprated));
}

?>
<!-- ### END - Header Section ### -->
<div class="clear"></div>

<!-- ### START - Main Section ### -->
<div class="main" > 
<div class="gradient">
<div class="wrapper" style="margin-top:10px;"> 

	<h1>Discover, Share and Explore Games !</h1>
	<h2>Create your own game channel</h2> 

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
<p>Don&#8217;t miss this Limited Opportunity, Sign Up Now</p>
<!-- Newsletter -->
     
<form action="#" method="post" novalidate>
<input  value="Channel Name"  name="NAME"    class="autoclear name-newsletter"     >
<input  value="Your Email"  name="EMAIL"  class="email-newsletter"     >
<input  value="Password"  name="PASSWORD"  class="phone-newsletter"   >
<div style="padding-bottom:10px; margin:-26px 0px 0px 19px;"><i class="color-white elusive-lock"></i></div>
<input type="submit" value="Join Now" name="subscribe"  class="btn btn-success pull-right">
<label> * By clicking "Join Now" you agree to Toork's Terms &#38; Privacy Policies.</label>
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
<li> <i class="color-green elusive-ok-sign"></i> Create your own game channel  </li>
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


<!-- ### START - Screenshots Section ### -->
<div class="screenshots" >
<div class="wrapper">
<div class="title"><h3>Explore some channels</h3></div>
<div id="tabs">
<ul class="tabs-ul">

<li><a href="#tabs-1"> </a></li>
<li><a href="#tabs-2"> </a></li>

</ul>
 <div class="clear"></div>
 <div id="tabs-1" class="gallery">
<ul  class="row-fluid">
<!-- ### First Gallery ### -->
<li class="span3"> <a href="img/land/screenshots/screen1-big.jpg" class="lightbox-go" title="My Screenshot"><img src="img/land/screenshots/screen1.jpg" class="a" alt=""/> <img src="img/land/screenshots/hover.png" class="b" alt=""/></a>   </li>
<li class="span3"> <a href="img/land/screenshots/screen2-big.jpg" class="lightbox-go" title="My Screenshot"><img src="img/land/screenshots/screen2.jpg" class="a" alt=""/> <img src="img/land/screenshots/hover.png" class="b" alt=""/></a>   </li>
<li class="span3"> <a href="img/land/screenshots/screen3-big.jpg" class="lightbox-go" title="My Screenshot"><img src="img/land/screenshots/screen3.jpg" class="a" alt=""/> <img src="img/land/screenshots/hover.png" class="b" alt=""/></a>   </li>
<li class="span3"> <a href="img/land/screenshots/screen4-big.jpg" class="lightbox-go" title="My Screenshot"><img src="img/land/screenshots/screen4.jpg" class="a" alt=""/> <img src="img/land/screenshots/hover.png" class="b" alt=""/></a>   </li>
</ul>
 </div>
<div id="tabs-2" class="gallery">
<ul  class="row-fluid">
<!-- ### Second Gallery ### -->

<li class="span3"> <a href="img/land/screenshots/screen1-big.jpg" class="lightbox-go" title="My Screenshot"><img src="img/land/screenshots/screen1.jpg" class="a" alt=""/> <img src="img/land/screenshots/hover.png" class="b" alt=""/></a>   </li>
<li class="span3"> <a href="img/land/screenshots/screen2-big.jpg" class="lightbox-go" title="My Screenshot"><img src="img/land/screenshots/screen2.jpg" class="a" alt=""/> <img src="img/land/screenshots/hover.png" class="b" alt=""/></a>   </li>
<li class="span3"> <a href="img/land/screenshots/screen3-big.jpg" class="lightbox-go" title="My Screenshot"><img src="img/land/screenshots/screen3.jpg" class="a" alt=""/> <img src="img/land/screenshots/hover.png" class="b" alt=""/></a>   </li>
<li class="span3"> <a href="img/land/screenshots/screen4-big.jpg" class="lightbox-go" title="My Screenshot"><img src="img/land/screenshots/screen4.jpg" class="a" alt=""/> <img src="img/land/screenshots/hover.png" class="b" alt=""/></a>   </li>
</ul>
</div>
</div>
</div>
</div>
<!-- ### END - Screenshots Section ### -->


<!-- ### START - Testimonials Section ### -->
<div class="testimonials" >
<div class="wrapper">
 <div class="title"><h3>Enjoy Some Games</h3></div>
 <div class="row-fluid">
 
 <!-- ### Testimonials 1 ### -->
 <div class="span4 testi">
 <div class="client"> <img src="img/land/testimonials/client1.png" class="ft1" alt="" />  </div>
 <h6> John Doe</h6>
 <div class="testi-div"></div>
 <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.  </p>
 <div class="quote"><img src="img/land/testimonials/quote.png"   alt="" /></div>
 </div> 
 
 <!-- ### Testimonials 2 ### -->
 <div class="span4 testi">
 <div class="client"> <img src="img/land/testimonials/client1.png" class="ft1" alt="" />  </div>
 <h6> John Doe</h6>
 <div class="testi-div"></div>
 <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.  </p>
 <div class="quote"><img src="img/land/testimonials/quote.png"   alt="" /></div>
 </div> 
 
 <!-- ### Testimonials 3 ### -->
 <div class="span4 testi">
 <div class="client"> <img src="img/land/testimonials/client1.png" class="ft1" alt="" />  </div>
 <h6> John Doe</h6>
 <div class="testi-div"></div>
 <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.  </p>
 <div class="quote"><img src="img/land/testimonials/quote.png"   alt="" /></div>
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


<!-- ### START - FOOTER Section ### -->
<footer> 
<div class="wrapper">
<div class="copy">  <p><strong>Toork</strong> &#169; copyright 2013. all rights reserved</p> </div>
<div class="social"> 
<ul> 
<!-- ### Social Icons ### -->
<li class="google"> <a href="#"></a> </li> 
<li class="facebook"> <a href="#"></a> </li> 
<li class="twitter"> <a href="#"></a> </li> 
</ul> 
</div>
</div>
</footer>
<!-- ### END - FOOTER Section ### -->

</div>
</body>
</html>