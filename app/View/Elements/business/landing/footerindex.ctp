<?php 
$terms=$this->Html->url(array( "controller" => "pages","action" =>"terms"));
$privacy=$this->Html->url(array( "controller" => "pages","action" =>"privacy"));
$help=$this->Html->url(array( "controller" => "pages","action" =>"help"));
$about=$this->Html->url(array( "controller" => "pages","action" =>"about"));
$developer=$this->Html->url(array( "controller" => "pages","action" =>"developers"));
$advertise=$this->Html->url(array( "controller" => "pages","action" =>"advertise"));
$faq=$this->Html->url(array( "controller" => "pages","action" =>"faq"));
?>

	<div id="footer-white">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 menu">
					<h3>Overview</h3>
					<ul>
	      				<li>
	          				<a href="<?php echo $about;?>">About us</a>
	        			</li>
	        			<li>
	        				<a href="<?php echo $terms;?>">Terms and Conditions</a>
	        			</li>
	        			<li>
	          				<a href="<?php echo $privacy;?>">Privacy Policy</a>
	        			</li>
	        			<li>
	          				<a href="<?php echo $advertise;?>">Advertisement Department</a>
	        			</li>
	      			</ul>
				</div>
				<div class="col-sm-3 menu">
					<h3>Menu</h3>
					<ul>
	      				<li>
	          				<a href="<?php echo $about;?>">Features</a>
	        			</li>

	        			<li>
	          				<a href="<?php echo $help;?>">Support and Help</a>
	        			</li>
	        			<li>
	          				<a href="<?php echo $developer;?>">Developers  and API</a>
	        			</li>
	        			<li>
	          				<a href="<?php echo $faq;?>">FAQ</a>
	        			</li>

	        		<!--	<li>
	        				<a href="contactus.html">Success Stories</a>
	        			</li>
	        			<li>
	          				<a href="portfolio.html">Support</a>
	          				<a href="portfolio.html" class="hiring">
	          					FAQ
	          				</a>
	        			</li> -->
	      			</ul>
				</div>
				<div class="col-sm-2 menu">
					<h3>Social</h3>
					<ul>	      				
	        			<li>
	        				<a target="_blank" href="https://www.facebook.com/clonegs">Facebook</a>
	        			</li>
	        			<li>
	          				<a target="_blank" href="https://twitter.com/clonegs">Twitter</a>
	        			</li>
	      			</ul>
				</div>
				<div class="col-sm-4 newsletter">
					<!-- <div class="signup clearfix">
						<p>
							Sign up for the newsletter and we'll inform you of updates, offers and more.
						</p>
						<form>
							<input type="text" name="email" class="form-control" placeholder="Your email address" />
							<input type="submit" value="Sign up" />
						</form>
					</div> -->
					<a target="_blank" href="https://twitter.com/clonegs">
						<img src="img/landing/tw.png" alt="twitter" />
					</a>
					<a target="_blank" href="https://www.facebook.com/clonegs">
						<img src="img/landing/fb.png" alt="facebook" />
					</a>
				</div>
			</div>
			<div class="row credits">
				<div class="col-md-12">
					Copyright © <?php echo date("Y"); ?> - Clone.gs
				</div>
			</div>
		</div>
	</div>