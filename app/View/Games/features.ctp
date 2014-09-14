<?php
  $login=$this->Html->url(array( "controller" => "users","action" =>"login3"));
  $register=$this->Html->url(array( "controller" => "users","action" =>"register2"));
  $index=$this->Html->url(array( "controller" => "games","action" =>"index"));
  $features=$this->Html->url(array( "controller" => "games","action" =>"features"));
  $help=$this->Html->url(array( "controller" => "pages","action" =>"help"));
?>

<body id="features" style="background-color:#e9eaed;">
<?php echo $this->element('business/landing/header',array('login'=>$login,'index'=>$index,'register'=>$register,'features'=>$features,'help'=>$help)); ?> 

	<div id="tabs">
		<div class="container">
			<div class="row header">
				<h3>The most advanced arcade script on the market</h3>
				<p>Clone is the only tool that works for you even when you are asleep.</p>
			</div>
			<div class="row">
				<div class="col-md-12 tabs-wrapper">
					<ul class="nav nav-tabs">
					  	<li class="active"><a href="#home" data-toggle="tab">Get started</a></li>
					  	<li><a href="#profile" data-toggle="tab">Basics</a></li>
					  	<li><a href="#messages" data-toggle="tab">Success Stories</a></li>
					  	<li><a href="#settings" data-toggle="tab">Tools</a></li>
					</ul>

					<div class="tab-content">
					  	<div class="tab-pane fade in active" id="home">
					  		<div class="col-md-6 info">
					  			<h4>Use Clone and get ready in less than 2 mins</h4>
					  			<p>
					  				Clone.gs is the most powerful arcade script on the market. Use Clone button to add Swf, HTML5, Android  iOS, games to your arcade or add your own and let your mobile visitors install and play, monetize your mobile arcade site for tablets and cellphones to boost your earning. supported files: fullscreen, swf, unity, HTML5 and Affiliate games (iOS, Android) CPI games.
					  			</p>
					  			<p>
					  				You have the full control over your channel/brand, add your own domain or use a the custom domain such as mysite.clone.gs add google analytics code to track your arcade site and to verify your site with google.
					  			</p>
					  		</div>
					  		<div class="col-md-6 image">
					  			<img src="../img/landing/pic1.png" class="img-responsive" alt="picture1" />
					  		</div>
					  	</div>
					  	<div class="tab-pane fade" id="profile">
					  		<div class="col-md-6 image">
					  			<img src="../img/landing/portfolioitem1.png" class="img-responsive" alt="picture2" />
					  		</div>
					  		<div class="col-md-6 info">
					  			<h4>The basic clone features</h4>
					  			<p>
					  				*Build a mobile and web arcade site<br>*Find best games and sites <br>*Customize your arcade site<br>*Add a custom domain you own<br>*Powerfull social admin panel<br>*Perfect ads management solution<br>*Natural link exchanges<br>*Cloud game arcade solution
					  			</p>
					  		</div>					  		
					  	</div>
					  	<div class="tab-pane fade" id="messages">
					  		<div class="col-md-6 info">
					  			<h4>There are thousands of channels powerd by clone</h4>
					  			<p>
					  				Clone has a very easy to build arcade script architecture. We believe that every entertainment channel should have a clone arcade site :) Here are some channels we are proud of.
					  			</p>
					  			<p>

<a href="http://supermario.clone.gs">supermario</a> - <a href="http://miniclip.clone.gs">miniclip</a> - <a href="http://armorgames.clone.gs">armorgames</a> - <a href="http://nishgame.com"]>nishgame</a> - <a href="http://kongregate.clone.gs">kongregate</a> - <a href="http://www.socialesman.com">socialesman</a> - <a href="http://avengers.clone.gs">avengers</a> - <a href="http://superman.clone.gs">superman</a> - <a href="http://m.swartag.com">swartag</a> - <a href="http://batman.clone.gs">batman</a> - <a href="http://simpsons.clone.gs">simpsons</a> - <a href="http://mobile.gamezidan.com">gamezidan</a> - <a href="http://toorkteam.clone.gs">toorkteam</a> - <a href="http://gamewom.com">gamewom</a> -  <a href="http://marvel.clone.gs">marvel</a> - <a href="http://angrybirds.clone.gs">angrybirds</a>


					  			</p>
					  		</div>
					  		<div class="col-md-6 image">
					  			<img src="../img/landing/pic2.png" class="img-responsive" style="position: relative;top: 15px;" alt="picture3" />
					  		</div>
					  	</div>
					  	<div class="tab-pane fade" id="settings">
					  		<div class="col-md-6 image">
					  			<img src="../img/landing/pic1.png" class="img-responsive" alt="picture4" />
					  		</div>
					  		<div class="col-md-6 info">
					  			<h4>Clone developer and publisher API</h4>
					  			<p>
					  				We are really working very hard be more developer firendly. We currently bring you the lates xml feeds, embeded channels and games for your own site. You are able to develope apps and games for the clone platform using our powerful API. Our API is currently available only for selected developers.
					  			</p>
					  		</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="first-option">
		<div class="container">
<?php echo $this->element('business/landing/features2'); ?> 
		</div>
	</div>

	<div id="second-option">
		<div class="container">
			<div class="row">
				<div class="col-md-4 feature">
					<i class="fa fa-cloud fa-2x"></i>
					<strong>Everything happens in the cloud</strong>
					<p>Clone is full cloud arcade script. You dont have to install anything or configure anything to run your arcade business. Clone is the fastest, most secure and upto date platform on the market. Clone just made for everyone. </p>
				</div>
				<div class="col-md-4 feature">
					<img src="https://s3.amazonaws.com/betatoorkpics/logos/clonelogo40.png" alt="arcade script" width="30px"/>
					<strong>A complete arcade script</strong>
					<p>Clone is a cross platform solution to your arcade business needs. It's mobile and desktop compatible, it just magicly works on all major browsers and devices such as iPhone, android and tablets.</p>
				</div>
				<div class="col-md-4 feature">
					<i class="fa fa-gamepad fa-2x"></i>
					<strong>Its a game machine</strong>
					<p>Any kind of games are welcome. You can easily upload .swf and .unity3d games and you will be able to add android and iOS affiliate links as new games.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 feature">
					<i class="fa fa-share-alt fa-2x"></i>
					<strong>Modern, social admin panel</strong>
					<p>Clone's powerful admin panel is not just for managing games and platform, its also a very strong social tool where you can find new hot games and new best arcade sites and channels. Clone's natural architecture design helps you gain more traffic and network to grow your business.</p>
				</div>
				<div class="col-md-4 feature">
					<i class="fa fa-money fa-2x"></i>
					<strong>Monetization in mind</strong>
					<p>Money is what we all work for so clone has all modern solutions for arcade games, such as ads (banners, pre-game ads, siteskin, pop-under, mobile ad types, affiliate links, iOS and android CPI).</p>
				</div>
				<div class="col-md-4 feature">
					<i class="fa fa-plug fa-2x"></i>
					<strong>Modern templates and plugins</strong>
					<p>With clone's powerfull backbone you can install templates and plugins with a single click of a button. Clone marketplace is the ecosystem for the arcade script industry</p>
				</div>
			</div>
		</div>
	</div>

	<div id="slider">
		<div class="container">
			<div class="row header">
				<h3>Includes all pages that a complete theme should have</h3>
			</div>
			<div class="row">
				<div class="col-md-12 slide-wrapper">
					<div class="slideshow">
						<div class="btn-nav prev"></div>
						<div class="btn-nav next"></div>
						<div class="slide active">
							<img src="../img/landing/slide3.png" alt="slide" />
						</div>
						<div class="slide">
							<img src="../img/landing/slide4.png" alt="slide" />
						</div>
						<div class="slide">
							<img src="../img/landing/slide1.png" alt="slide" />
						</div>
						<div class="slide">
							<img src="../img/landing/slide5.png" alt="slide" />
						</div>
						<div class="slide">
							<img src="../img/landing/slide2.png" alt="slide" />
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
<!--
	<div id="showcase">
		<div class="container">
			<div class="row header">
				<h3>Showcasing some blog posts</h3>
			</div>
			<div class="row">
				<div class="col-md-12 pics">
					<a class="pic" href="blogpost.html">
						<img src="images/blog1.png" alt="blog1" />
						<div class="bg">
							<p>How to survive in the big city</p>
						</div>
					</a>
					<a class="pic" href="blogpost.html">
						<img src="images/blog2.png" alt="blog2" />
						<div class="bg">
							<p>How to develop scalable Rails apps</p>
						</div>
					</a>
					<a class="pic" href="blogpost.html">
						<img src="images/blog3.png" alt="blog3" />
						<div class="bg">
							<p>Enjoy your life at the beach</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div> -->

	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 copyright">
					Copyright © 2014. clone.gs
				</div>
				<div class="col-sm-6 menu">
					<ul>
	      				<li class="active">
	          				<a href="<?php echo $features; ?>">Features</a>
	        			</li>
	        			<li>
	          				<a href="<?php echo $help; ?>">Support</a>
	        			</li>
	        			<li>
	          				<a href="<?php echo $register; ?>">Sign Up</a>
	        			</li>
	      			</ul>
				</div>
				<div class="col-sm-3 social">
					<a target="_blank" href="https://twitter.com/clonegs">
						<img src="../img/landing/tw.png" alt="twitter" />
					</a>
					<a target="_blank" href="https://www.facebook.com/clonegs">
						<img src="../img/landing/fb.png" alt="dribbble" />
					</a>				
				</div>
			</div>
		</div>
	</div>
</body>
