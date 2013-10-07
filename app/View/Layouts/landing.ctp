<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $title_for_layout?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

    <?php echo $this->Html->css(array('assets/css/theme_venera')); ?>

  <link href="http://fonts.googleapis.com/css?family=Abel:400|Oswald:300,400,700" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
            <![endif]-->
            <header id='header'>
              <div class='navbar navbar-fixed-top'>
                <div class='navbar-inner'>
                  <div class='container'>
                    <a class='btn btn-navbar' data-target='.nav-collapse' data-toggle='collapse'>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                    </a>
                    <a href="index.html" class="brand"></a><a>beta</a>
                    <div class='nav-collapse subnav-collapse collapse pull-right' id='top-navigation'>
                      <ul class='nav'>
                        <li class='active'>
                          <a href="index.html">Home</a>
                        </li>
                        <li class='dropdown'>
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Features</a>
                          <ul class='dropdown-menu'>
                            <li>
                              <a href="features/pricing_tables.html">Pricing Table</a>
                            </li>
                            <li>
                              <a href="features/awesome_icons.html">Awesome Icons</a>
                            </li>
                            <li>
                              <a href="features/basic_elements.html">Basic Elements</a>
                            </li>
                            <li class='divider'></li>
                            <li class='nav-header'>Pages Examples</li>
                            <li>
                              <a href="features/about_us_page.html">About Us Page</a>
                            </li>
                            <li>
                              <a href="gallery_of_images.html">Gallery of Images</a>
                            </li>
                            <li>
                              <a href="features/not_found_page.html">Page not found</a>
                            </li>
                            <li>
                              <a href="features/coming_soon_page.html">Coming Soon Page</a>
                            </li>
                          </ul>
                        </li>
                        <li class='dropdown'>
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Documentation</a>
                          <ul class='dropdown-menu'>
                            <li>
                              <a href="documentation/get_started.html">Get Started</a>
                            </li>
                            <li>
                              <a href="documentation/scaffolding.html">Scaffolding</a>
                            </li>
                            <li>
                              <a href="documentation/base_css.html">Base CSS</a>
                            </li>
                            <li>
                              <a href="documentation/components.html">Components</a>
                            </li>
                            <li>
                              <a href="documentation/javascript.html">Javascript</a>
                            </li>
                          </ul>
                        </li>
                        <li class='dropdown'>
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
                          <ul class='dropdown-menu'>
                            <li>
                              <a href="blog/single_post.html">Single Post</a>
                            </li>
                            <li>
                              <a href="blog/two_per_line.html">Multiple Posts (two)</a>
                            </li>
                            <li>
                              <a href="blog/one_per_line.html">Multiple Posts (one)</a>
                            </li>
                          </ul>
                        </li>
                        <li class=''>
                          <a href="contact.html">Contact</a>
                        </li>
                      </ul>
                      <div class='top-account-control visible-desktop'>
                        <a href="features/pricing_tables.html" class="top-create-account">Create Account</a>
                        <a href="#" class="top-sign-in">Sign In</a>
                        <div class='login-box'>
                          <a class='close login-box-close' href='#'>&times;</a>
                          <h4 class='login-box-head'>Login Form</h4>
                          <div class='control-group'>
                            <label>Username</label>
                            <input class='span2' placeholder='Input username...' type='text'>
                          </div>
                          <div class='control-group'>
                            <label>Password</label>
                            <input class='span2' placeholder='Input password...' type='text'>
                          </div>
                          <div class='login-actions'>
                            <button class='btn btn-primary'>Log Me In</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </header>

            <div class='carousel slide over-something' id='homepage-carousel'>
              <div class='carousel-inner slider-w'>
                <div class='active item'>
                  <div class='container'>
                    <h1 class='slider-header'>Discover, <strong>Collect</strong> and Share <strong>Games</strong> with Friends</h1>
                    <h2 class='slider-sub-header'>Creaet Your Own Game Channel For Free</h2>
                    <div class='cta'>
                      <a href="features/pricing_tables.html" class="btn btn-cta"><i class="icon-plus"></i> Create Channel</a>
                    </div>
                    <div class='slider-browsers-w clearfix'>
                      <div class='slider-browser slider-browser-left hidden-phone' data-position-bottom='-8%'>
                        <img alt="Browser-window-1" src="img/images/browser-window1.png" />
                      </div>
                      <div class='slider-browser slider-browser-center' data-position-bottom='-9%'>
                        <img alt="Browser-window-2" src="img/images/browser-window.png" />
                      </div>
                      <div class='slider-browser slider-browser-right hidden-phone' data-position-bottom='-8%'>
                        <img alt="Browser-window-3" src="img/images/browser-window3.png" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class='item'>
                  <div class='container'>
                    <h1 class='slider-header'>One Game <strong>Source</strong> to Rule Them All</h1>
                    <h2 class='slider-sub-header'>Your Personal Game Advisor</h2>
                    <div class='cta'>
                      <a href="features/pricing_tables.html" class="btn btn-cta btn-warning">Join Toork Now</a>
                    </div>
                    <div class='row zoomed-browsers-w'>
                      <div class='span4'>
                        <div class='zoomed-browser'>
                          <img alt="Browser-window-1" src="http://soziev.com/assets/theme_venera/photos/browser-window-2.png" />
                        </div>
                      </div>
                      <div class='span4'>
                        <div class='zoomed-browser hidden-phone'>
                          <img alt="Browser-window-2" src="http://soziev.com/assets/theme_venera/photos/browser-window-1.png" />
                        </div>
                      </div>
                      <div class='span4'>
                        <div class='zoomed-browser hidden-phone'>
                          <img alt="Browser-window-3" src="http://soziev.com/assets/theme_venera/photos/browser-window-3.png" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a class='carousel-control left' data-slide='prev' href='#homepage-carousel'>
                <i class='icon-chevron-left'></i>
              </a>
              <a class='carousel-control right' data-slide='next' href='#homepage-carousel'>
                <i class='icon-chevron-right'></i>
              </a>
            </div>
            <div class='sub-slider-features'>
              <div class='container'>
                <div class='row'>
                  <div class='span4'>
                    <div class='info-bullet'>
                      <i class='icon-plus-sign'></i>
                      <h5>Follow Channels</h5>
                      <p>Follow hundreds of thousands of channels and get the latest updates immidiately from the channels you love.</p>
                    </div>
                  </div>
                  <div class='span4'>
                    <div class='info-bullet'>
                      <i class='icon-group'></i>
                      <h5>Play With Friends</h5>
                      <p>Find your friends or make new ones. join their channels or make them join yours. See what they like.</p>
                    </div>
                  </div>
                  <div class='span4'>
                    <div class='info-bullet'>
                      <i class='icon-magic'></i>
                      <h5>Discover New Games</h5>
                      <p>Every day hundreds of new games are waiting for you to discover. Just a click away. No Download necessary.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <section class='section-wrapper under-slider'>
              <div class='container'>
                <div class='row'>
                  <div class='span12'>
                    <h3 class='section-header'>Featured Channels</h3>
                  </div>
                  <div class='span3'>
                    <div class='white-card'>
                      <div class="img-w hover-fader">
                        <a href="http://toork.com/newsground"><img alt="Photo-card" src="img/images/photos/10.jpg">
                          <span class="hover-fade">
                            <i class="icon-upload"></i>
                          </span>
                        </a>
                      </div><i style="margin-top:-4px;" class="pull-right btn btn-success icon-plus-sign"> <strong>Follow</strong></i>
                      <h5>NewGrounds</h5>
                      <p>Newgrounds is an American entertainment and social media website and company. Here you will find latest news and games from newsground.com</p>
                    </div>
                  </div>
                  <div class='span3'>
                    <div class='white-card'>
                      <div class="img-w hover-fader">
                        <a href="http://toork.com/miniclip"><img alt="Photo-card" src="img/images/photos/11.jpg">
                          <span class="hover-fade">
                            <i class="icon-upload"></i>
                          </span>
                        </a>
                      </div><i style="margin-top:-4px;" class="pull-right btn btn-success icon-plus-sign"> <strong>Follow</strong></i>
                      <h5>MiniClip</h5>
                      <p>Miniclip is a mobile and online games company which includes the website Miniclip.com. Here you will find latest news and games from miniclip.</p>
                    </div>
                  </div>
                  <div class='span3'>
                    <div class='white-card'>
                      <div class="img-w hover-fader">
                        <a href="http://toork.com/armorgames"><img alt="Photo-card" src="img/images/photos/12.jpg">
                          <span class="hover-fade">
                            <i class="icon-upload"></i>
                          </span>
                        </a>
                      </div><i style="margin-top:-4px;" class="pull-right btn btn-success icon-plus-sign"> <strong>Follow</strong></i>
                      <h5>ArmorGames</h5>
                      <p>Armor Games, formerly Games Of Gondor, is a website, that hosts free Flash-based browser games. Here you will find latest news and games.</p>
                    </div>
                  </div>
                  <div class='span3'>
                    <div class='white-card'>
                      <div class="img-w hover-fader">
                        <a href="http://toork.com/kongregate"><img alt="Photo-card" src="img/images/photos/13.jpg">
                          <span class="hover-fade">
                            <i class="icon-upload"></i>
                          </span>
                        </a>
                      </div><i style="margin-top:-4px;" class="pull-right btn btn-success icon-plus-sign"> <strong>Follow</strong></i>
                      <h5>KongreGate</h5>
                      <p>Kongregate is an online games hosting website, which allows users to upload user-created Adobe Flash, HTML 5/JavaScript, Shockwave, Java or Unity3D games.</p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class='section-wrapper'>
              <div class='container'>
                <div class='row'>
                  <div class='span6'>
                    <h3 class='section-header'>Client Testimonials</h3>
                    <div class='testimonials'>
                      <div class='testimonials-users row hidden-phone'>
                        <div class='span1'>
                          <a class='testimonials-user-w active' data-toggle='testimonial' href='#testimonial1'>
                            <span class='testimonials-user'><img alt="Avatar-1" src="img/images/photos/14.jpg" /></span>
                          </a>
                        </div>
                        <div class='span1'>
                          <a class='testimonials-user-w' data-toggle='testimonial' href='#testimonial2'>
                            <span class='testimonials-user'><img alt="Avatar-2" src="img/images/photos/15.jpg" /></span>
                          </a>
                        </div>
                        <div class='span1'>
                          <a class='testimonials-user-w' data-toggle='testimonial' href='#testimonial3'>
                            <span class='testimonials-user'><img alt="Avatar-4" src="img/images/photos/16.jpg" /></span>
                          </a>
                        </div>
                        <div class='span1'>
                          <a class='testimonials-user-w' data-toggle='testimonial' href='#testimonial4'>
                            <span class='testimonials-user'><img alt="Avatar-1" src="img/images/photos/17.jpg" /></span>
                          </a>
                        </div>
                        <div class='span1'>
                          <a class='testimonials-user-w' data-toggle='testimonial' href='#testimonial5'>
                            <span class='testimonials-user'><img alt="Avatar-2" src="img/images/photos/18.jpg" /></span>
                          </a>
                        </div>
                        <div class='span1'>
                          <a class='testimonials-user-w' data-toggle='testimonial' href='#testimonial6'>
                            <span class='testimonials-user'><img alt="Avatar-4" src="img/images/photos/19.jpg" /></span>
                          </a>
                        </div>
                      </div>
                      <div class='testimonials-speeches'>
                        <div class="testimonials-speech active" id="testimonial1">
                          <p>
                            <strong>Toork is the right place.</strong>
                            When ever I feel bored, I come to spend time in toork to play some games and follow other friends of mine like batman and spiderman. So they keep me informed with their latest news.
                          </p>
                          <div class="speech-by">
                            Superman, Kryptonite Planet
                          </div>
                        </div>
                        <div class='testimonials-speech' id='testimonial2'>
                          <p>
                            <strong>Build your channel.</strong>
                            You all can create your own channel and let others to follow you. Customize your channel and make it nice for your visitors. put some black in your channel and stay away from joker.
                          </p>
                          <div class='speech-by'>
                            Batman, Unknown Place
                          </div>
                        </div>
                        <div class='testimonials-speech' id='testimonial3'>
                          <p>
                            <strong>Protect your channel</strong>
                            Share the things you love about games and let people know what they think about your stuff. Coment,like or clone stuff here.
                          </p>
                          <div class='speech-by'>
                            Green Lantern, Earth
                          </div>
                        </div>
                        <div class='testimonials-speech' id='testimonial4'>
                          <p>
                            <strong>Never get bored</strong>
                            You will never be bored here because alot of new games, videos or pictures are shared here. People are sharing faster than I run pal. Even I cant catch up.
                          </p>
                          <div class='speech-by'>
                            Flash, Several places in a second
                          </div>
                        </div>
                        <div class='testimonials-speech' id='testimonial5'>
                          <p>
                            <strong>Better than juping on the tree</strong>
                            I like it more to hangout here on toork than jumping o top of the trees. I dont have to hide here. People are following me and I enjoy being popular.
                          </p>
                          <div class='speech-by'>
                            Hawk, Unknown Forest
                          </div>
                        </div>
                        <div class='testimonials-speech' id='testimonial6'>
                          <p>
                            <strong>Blop blop, glu blop glu</strong>
                            bloop glue bloop blop blop gleu gleu glu glu. Sorry I forgat that you dont understand the under water talk. Toork is more fun than swimming. I am happy to be a part of it.
                          </p>
                          <div class='speech-by'>
                            Aquaman, Atlantis
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="span6">
                    <h3 class="section-header">Services We Offer</h3>
                    <div class="accordion" id="accordion">
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseOne">
                            Web Development
                          </a>
                        </div>
                        <div class="accordion-body collapse in" id="collapseOne">
                          <div class="accordion-inner">
                            Cras lacinia laoreet libero et mattis. In facilisis neque id lectus hendrerit in dignissim orci rhoncus. Etiam lacinia, mauris sed sagittis laoreet, sapien erat consectetur enim, eget sagittis orci magna at dolor. Donec semper tellus vitae massa laoreet congue. In id elit in turpis fermentum bibendum eget ac nibh.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">
                            Photoshop Website Design
                          </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseTwo">
                          <div class="accordion-inner">
                            Cras lacinia laoreet libero et mattis. In facilisis neque id lectus hendrerit in dignissim orci rhoncus. Etiam lacinia, mauris sed sagittis laoreet, sapien erat consectetur enim, eget sagittis orci magna at dolor. Donec semper tellus vitae massa laoreet congue. In id elit in turpis fermentum bibendum eget ac nibh.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseThree">
                            Search Engine Optimization
                          </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseThree">
                          <div class="accordion-inner">
                            Cras lacinia laoreet libero et mattis. In facilisis neque id lectus hendrerit in dignissim orci rhoncus. Etiam lacinia, mauris sed sagittis laoreet, sapien erat consectetur enim, eget sagittis orci magna at dolor. Donec semper tellus vitae massa laoreet congue. In id elit in turpis fermentum bibendum eget ac nibh.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class='section-wrapper stripped'>
              <div class='container'>
                <div class='row clients-w'>
                  <div class='span12'>
                    <h3 class='section-header'>Our Showcase</h3>
                  </div>
                  <div class='span2'>
                    <div class='white-card'>
                      <img alt="Client-1" src="img/images/photos/1.jpg" />
                    </div>
                  </div>
                  <div class='span2'>
                    <div class='white-card'>
                      <img alt="Client-2" src="img/images/photos/2.jpg" />
                    </div>
                  </div>
                  <div class='span2'>
                    <div class='white-card'>
                      <img alt="Client-3" src="img/images/photos/3.jpg" />
                    </div>
                  </div>
                  <div class='span2'>
                    <div class='white-card'>
                      <img alt="Client-4" src="img/images/photos/4.jpg" />
                    </div>
                  </div>
                  <div class='span2'>
                    <div class='white-card'>
                      <img alt="Client-5" src="img/images/photos/5.jpg" />
                    </div>
                  </div>
                  <div class='span2'>
                    <div class='white-card'>
                      <img alt="Client-6" src="img/images/photos/6.jpg" />
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class='section-wrapper stripped'>
              <div class='container'>
                <div class='row'>
                  <div class='span12'>
                    <h3 class='section-header'>From the Blog</h3>
                  </div>
                  <div class='span4'>
                    <div class='white-card recent-post clearfix'>
                      <h5 class='recent-post-header'>
                        <a href="blog/single_post.html">Nullam velit diam, rhoncus sed</a>
                      </h5>
                      <div class='post-info clearfix'>
                        <div class='pull-left'>
                          <span class='post-date'>January 15, 2011</span>
                          <a href="blog/single_post.html" class="post-comments">14 Comments</a>
                        </div>
                        <div class='pull-right'>
                          <a href="#" class="post-like"><i class='icon-heart'></i>
                            250
                          </a>
                        </div>
                      </div>
                      <img alt="Photo-card-big-1" class="post-image" src="img/images/test-square.png" />
                      <p class='post-content separated'>Donec vel turpis non erat luctus ultrices vel sed massa. Quisque commodo venenatis arcu, non volutpat arcu lobortis at. Donec imperdiet nibh id metus adipiscing semper.</p>
                      <a href="blog/single_post.html" class="btn btn-primary btn-extra pull-right">Read More &gt;</a>
                    </div>
                  </div>
                  <div class='span4'>
                    <div class='white-card recent-post clearfix'>
                      <h5 class='recent-post-header'>
                        <a href="blog/single_post.html">Nullam velit diam, rhoncus sed</a>
                      </h5>
                      <div class='post-info clearfix'>
                        <div class='pull-left'>
                          <span class='post-date'>January 15, 2011</span>
                          <a href="blog/single_post.html" class="post-comments">14 Comments</a>
                        </div>
                        <div class='pull-right'>
                          <a href="#" class="post-like"><i class='icon-heart'></i>
                            250
                          </a>
                        </div>
                      </div>
                      <img alt="Photo-card-big-2" class="post-image" src="img/images/test-square.png" />
                      <p class='post-content separated'>Donec vel turpis non erat luctus ultrices vel sed massa. Quisque commodo venenatis arcu, non volutpat arcu lobortis at. Donec imperdiet nibh id metus adipiscing semper.</p>
                      <a href="blog/single_post.html" class="btn btn-primary btn-extra pull-right">Read More &gt;</a>
                    </div>
                  </div>
                  <div class='span4'>
                    <div class='white-card recent-post clearfix'>
                      <h5 class='recent-post-header'>
                        <a href="blog/single_post.html">Nullam velit diam, rhoncus sed</a>
                      </h5>
                      <div class='post-info clearfix'>
                        <div class='pull-left'>
                          <span class='post-date'>January 15, 2011</span>
                          <a href="blog/single_post.html" class="post-comments">14 Comments</a>
                        </div>
                        <div class='pull-right'>
                          <a href="#" class="post-like"><i class='icon-heart'></i>
                            250
                          </a>
                        </div>
                      </div>
                      <img alt="Photo-card-big-6" class="post-image" src="img/images/test-square.png" />
                      <p class='post-content separated'>Donec vel turpis non erat luctus ultrices vel sed massa. Quisque commodo venenatis arcu, non volutpat arcu lobortis at. Donec imperdiet nibh id metus adipiscing semper.</p>
                      <a href="blog/single_post.html" class="btn btn-primary btn-extra pull-right post-btn">Read More &gt;</a>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class='section-wrapper stripped'>
              <div class='container'>
                <div class='row'>
                  <div class='span12'>
                    <h3 class='section-header'>Payment Plans Information</h3>
                    <div class='white-card no-padding'>
                      <div class='pricing-table'>
                        <div class='row'>
                          <div class='span3'>
                            <div class='pricing-plan-w first-plan'>
                              <div class='plan-name'>
                                Free
                              </div>
                              <div class='plan-price-w'>
                                <div class='plan-price-desc'>Starting at</div>
                                <div class='plan-price'>
                                  <span class='price-currency'>$</span>
                                  <span class='price-self'>0</span>
                                  <span class='price-period'>/mo</span>
                                </div>
                              </div>
                              <div class='plan-desc'>
                                <ul>
                                  <li>Unlimited bandwidth</li>
                                  <li>
                                    <strong>100</strong>
                                    Products
                                  </li>
                                  <li>
                                    <strong>1GB</strong>
                                    Storage
                                  </li>
                                  <li>
                                    <strong>2.0%</strong>
                                    Transaction fee
                                  </li>
                                </ul>
                                <p>Plan Information: In eu libero tortor, et bibendum tellus. Fusce a libero est.</p>
                                <a href="register.html" class="btn btn-primary btn-large">Select This Plan</a>
                              </div>
                            </div>
                          </div>
                          <div class='span3'>
                            <div class='pricing-plan-w'>
                              <div class='plan-name'>
                                Premium
                              </div>
                              <div class='plan-price-w'>
                                <div class='plan-price-desc'>Starting at</div>
                                <div class='plan-price'>
                                  <span class='price-currency'>$</span>
                                  <span class='price-self'>15</span>
                                  <span class='price-period'>/mo</span>
                                </div>
                              </div>
                              <div class='plan-desc'>
                                <ul>
                                  <li>Unlimited bandwidth</li>
                                  <li>
                                    <strong>500</strong>
                                    Products
                                  </li>
                                  <li>
                                    <strong>3GB</strong>
                                    Storage
                                  </li>
                                  <li>
                                    <strong>1.8%</strong>
                                    Transaction fee
                                  </li>
                                </ul>
                                <p>Plan Information: In eu libero tortor, et bibendum tellus. Fusce a libero est.</p>
                                <a href="register.html" class="btn btn-primary btn-large">Select This Plan</a>
                              </div>
                            </div>
                          </div>
                          <div class='span3'>
                            <div class='pricing-plan-w'>
                              <div class='plan-name'>
                                Enterprise
                              </div>
                              <div class='plan-price-w'>
                                <div class='plan-price-desc'>Starting at</div>
                                <div class='plan-price'>
                                  <span class='price-currency'>$</span>
                                  <span class='price-self'>25</span>
                                  <span class='price-period'>/mo</span>
                                </div>
                              </div>
                              <div class='plan-desc'>
                                <ul>
                                  <li>Unlimited bandwidth</li>
                                  <li>
                                    <strong>1000</strong>
                                    Products
                                  </li>
                                  <li>
                                    <strong>10GB</strong>
                                    Storage
                                  </li>
                                  <li>
                                    <strong>1.6%</strong>
                                    Transaction fee
                                  </li>
                                </ul>
                                <p>Plan Information: In eu libero tortor, et bibendum tellus. Fusce a libero est.</p>
                                <a href="register.html" class="btn btn-primary btn-large">Select This Plan</a>
                              </div>
                            </div>
                          </div>
                          <div class='span3'>
                            <div class='pricing-plan-w last-plan'>
                              <div class='plan-name'>
                                Unlimited
                              </div>
                              <div class='plan-price-w'>
                                <div class='plan-price-desc'>Starting at</div>
                                <div class='plan-price'>
                                  <span class='price-currency'>$</span>
                                  <span class='price-self'>50</span>
                                  <span class='price-period'>/mo</span>
                                </div>
                              </div>
                              <div class='plan-desc'>
                                <ul>
                                  <li>Unlimited bandwidth</li>
                                  <li>
                                    <strong>2000</strong>
                                    Products
                                  </li>
                                  <li>
                                    <strong>20GB</strong>
                                    Storage
                                  </li>
                                  <li>
                                    <strong>1.0%</strong>
                                    Transaction fee
                                  </li>
                                </ul>
                                <p>Plan Information: In eu libero tortor, et bibendum tellus. Fusce a libero est.</p>
                                <a href="register.html" class="btn btn-primary btn-large">Select This Plan</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <footer>
              <div class='pre-footer'>
                <div class='container'>
                  <div class='row'>
                    <div class='span4'>
                      <div class='footer-logo'>
                        <a>Theme<strong>Venera</strong></a>
                      </div>
                      <ul class='footer-address'>
                        <li>
                          <strong>Address:</strong>
                          2850 Collins ave<br/>
                          Camden, NJ 32432-1343, USA
                        </li>
                        <li>
                          <strong>Phone:</strong>
                          (324) 234-2343
                        </li>
                        <li>
                          <strong>Fax:</strong>
                          (324) 366-5423
                        </li>
                      </ul>
                    </div>
                    <div class='span4'>
                      <h5 class='footer-header'>Recent Posts</h5>
                      <ul class='footer-list'>
                        <li>
                          <a>Vestibulum auctor dapibus</a>
                        </li>
                        <li>
                          <a>Aliquam tincidunt mauris</a>
                        </li>
                        <li>
                          <a>Lorem ipsum dolor sit</a>
                        </li>
                        <li>
                          <a>Consectetur adipisicing elit</a>
                        </li>
                      </ul>
                    </div>
                    <div class='span4'>
                      <h5 class='footer-header'>Photostream</h5>
                      <ul class='footer-img-list thumbnails'>
                        <li class='span1'>
                          <a class='thumbnail'>
                            <img alt="8b9890" src="img/images/test-square.png" />
                          </a>
                        </li>
                        <li class='span1'>
                          <a class='thumbnail'>
                            <img alt="8b9890" src="img/images/test-square.png" />
                          </a>
                        </li>
                        <li class='span1'>
                          <a class='thumbnail'>
                            <img alt="8b9890" src="img/images/test-square.png" />
                          </a>
                        </li>
                        <li class='span1'>
                          <a class='thumbnail'>
                            <img alt="8b9890" src="img/images/test-square.png" />
                          </a>
                        </li>
                        <li class='span1'>
                          <a class='thumbnail'>
                            <img alt="8b9890" src="img/images/test-square.png" />
                          </a>
                        </li>
                        <li class='span1'>
                          <a class='thumbnail'>
                            <img alt="8b9890" src="img/images/test-square.png" />
                          </a>
                        </li>
                        <li class='span1'>
                          <a class='thumbnail'>
                            <img alt="8b9890" src="img/images/test-square.png" />
                          </a>
                        </li>
                        <li class='span1'>
                          <a class='thumbnail'>
                            <img alt="8b9890" src="img/images/test-square.png" />
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class='deep-footer'>
                <div class='container'>
                  <div class='row'>
                    <div class='span6'>
                      <div class='copyright'>Copyright &copy; 2013 Toork. All rights reserved.</div>
                    </div>
                    <div class='span6'>
                      <ul class='footer-links'>
                        <li>
                          <a>Some</a>
                        </li>
                        <li>
                          <a>Footer</a>
                        </li>
                        <li>
                          <a>Policy</a>
                        </li>
                        <li>
                          <a>Terms Of Use</a>
                        </li>
                        <li>
                          <a>Links</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </footer>

<?php echo $this->Html->script(array('assets/jquery-1.10.1.min','assets/bootstrap','assets/prettify','assets/lightbox','assets/main')); ?>

            </body>
          </html>
