<?php
  $login=$this->Html->url(array( "controller" => "users","action" =>"login3"));
  $register=$this->Html->url(array( "controller" => "users","action" =>"register2"));
  $help=$this->Html->url(array( "controller" => "pages","action" =>"help"));
  $index=$this->Html->url(array( "controller" => "games","action" =>"index"));
  $features=$this->Html->url(array( "controller" => "games","action" =>"features"));
?>

<body id="home" style="background-color:#e9eaed;">

<?php echo $this->element('business/landing/headerindex',array('login'=>$login,'help'=>$help,'features'=>$features)); ?> 

  <div id="hero">
    <div class="container">
      <h1 class="animated fadeInDown" style="color:white;">
        A Cloud Based Powerful,<br/>Full Mobile Compatible <br/>Arcade Script
        
      </h1>
      <p class="sub-text animated fadeInDown">
        No install, no configuration, takes less than 2mins <br/> join clone.gs for free.
      </p>
      <div class="cta animated fadeInDown">
        <a href="<?php echo $features; ?>" class="button-outline">See the tour</a>
        <a href="<?php echo $register; ?>" class="button">Sign up free</a>
      </div>
      <div class="img"></div>
    </div>
  </div>

<?php echo $this->element('business/landing/features'); ?> 

  <div id="pricing">
    <div class="container">
      <div class="row header">
        <div class="col-md-12">
          <h3>Free trial. No contract. Cancel when you want.</h3>
          <p>All plans are free for a limited time</p>
        </div>
      </div>
      <div class="row charts">
        <div class="col-md-4">
          <div class="chart first">
            <div class="quantity">
              <span class="dollar">$</span>
              <span class="price">0</span>
              <span class="period">/month</span>
            </div>
            <div class="plan-name"><del>19$</del> Classic</div>
            <div class="specs">
              <div class="spec">
                <span class="variable">Clone</span>
                Social Features
              </div>
              <div class="spec">
                <span class="variable">All</span>
                Arcade Features
              </div>
              <div class="spec">
                <span class="variable">Mobile</span>
                Version Enabled
              </div>
              <div class="spec">
                <span class="variable">Unlimited</span>
                Free Games
              </div>
              <div class="spec">
                <span class="variable">Connect</span>
                Unlimited Channels
              </div>
            </div>
            <a class="btn-signup button-clear" href="<?php echo $register; ?>">
              <span>Start for free</span>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="chart featured">
            <div class="popular">Most popular</div>
            <div class="quantity">
              <span class="dollar">$</span>
              <span class="price">0</span>
              <span class="period">/month</span>
            </div>
            <div class="plan-name"><del>99$</del> Profesional</div>
            <div class="specs">
              <div class="spec">
                <span class="variable">All</span>
                Classic Features
              </div>
              <div class="spec">
                <span class="variable">Custom</span>
                Domain Mapping
              </div>
              <div class="spec">
                <span class="variable">Unlimited</span>
                Ads Management
              </div>
              <div class="spec">
                <span class="variable">Unlimited</span>
                Game Hosting
              </div>
              <div class="spec">
                <span class="variable">Unlimited</span>
                Themes and Plugins
              </div>
            </div>
            <a class="btn-signup button-clear" href="<?php echo $register; ?>">
              <span>Start for free</span>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="chart last">
            <div class="quantity">
              <span class="dollar">$</span>
              <span class="price">0</span>
              <span class="period">/month</span>
            </div>
            <div class="plan-name"><del>299$</del> Premium</div>
            <div class="specs">
              <div class="spec">
                <span class="variable">All</span>
                Professional Features
              </div>
              <div class="spec">
                <span class="variable">Multiple</span>
                Domain Mapping
              </div>
              <div class="spec">
                <span class="variable">Custom</span>
                Theme Design
              </div>
              <div class="spec">
                <span class="variable">1</span>
                Custom Plugin
              </div>
              <div class="spec">
                <span class="variable">7x24</span>
                Professional Support
              </div>
            </div>
            <a class="btn-signup button-clear" href="<?php echo $register; ?>">
              <span>Start for free</span>
            </a>
          </div>
        </div>
      </div>

      <div class="row header">
        <div class="col-md-12">
          <p>All plans include 7x24 email support</p>
        </div>
      </div>


    </div>
  </div>

  <div id="slider">
    <div class="container">
      <div class="row header">
        <div class="col-md-12">
          <h3>A complete arcade script that runs above the clouds</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 slide-wrapper">
          <div class="slideshow">
            <div class="btn-nav prev"></div>
            <div class="btn-nav next"></div>
            <div class="slide active">
              <img src="img/landing/slide3.png" alt="slide3" />
            </div>
            <div class="slide">
              <img src="img/landing/slide4.png" alt="slide4" />
            </div>
            <div class="slide">
              <img src="img/landing/slide1.png" alt="slide1" />
            </div>
            <div class="slide">
              <img src="img/landing/slide5.png" alt="slide5" />
            </div>
            <div class="slide">
              <img src="img/landing/slide2.png" alt="slide2" />
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
  <div id="cta" style="margin-bottom:50px;">
    <p>
      Start your arcade business now and earn money! 
    </p>
    <a href="<?php echo $register; ?>">
      Sign up for free
    </a>
  </div>


  <div id="clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Our Showcase</h3>
          <p>
            These are some of our popular channels that are made by Clone team.
          </p>
          <div class="logos">
            <a target="_blank" href="http://armorgames.clone.gs"><img src="img/landing/1armorgames.png"></a>
            <a target="_blank" href="http://miniclip.clone.gs"><img src="img/landing/2miniclip.png"></a>
            <a target="_blank" href="http://angrybirds.clone.gs"><img src="img/landing/3angry.png"></a>
            <a target="_blank" href="http://marvel.clone.gs"><img src="img/landing/4marvel.png"></a>
            <a target="_blank" href="http://kongregate.clone.gs"><img src="img/landing/5kongre.png"></a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php echo $this->element('business/landing/footerindex',array('help'=>$help)); ?> 

</body>
