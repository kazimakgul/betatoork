

<?php
	$terms=$this->Html->url(array( "controller" => "pages","action" =>"terms"));
	$privacy=$this->Html->url(array( "controller" => "pages","action" =>"privacy"));
	
	echo $this->element('NewPanel/landing/header',array());
                
?>


			<section class="section-wrapper create-account-page-w">
              <div class="container">
                <div class="row">
                  <div class="span9">
                    <div class="white-card extra-padding">
                      <form>
                        <fieldset>
                          <div class="row-fluid">
                            <div class="span12">
                              <h1 class="form-header"><i class="icon-plus"></i> Create Your Channel</h1>
                            </div>
                          </div>
                          <div class="row-fluid">
                            <div class="span12">
                              <div class="form-side-info">
                                <p>Get ready to follow thousands of channels and players.</p>
                              </div>
                            </div>
                          </div>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span6">

                          	<div class="row-fluid">
	                            <div class="span12">
	                              <div class="control-group">
	                                <label>Channel Name</label>
	                                <input style="height:40px;" class="span12" placeholder="At least 6 characters... Ex: Armorgames" type="text">
	                              </div>
	                            </div>
                            </div>

                           	<div class="row-fluid">
	                            <div class="span12">
	                              <div class="control-group">
	                                <label>Email Address</label>
	                                <input style="height:40px;" class="span12" placeholder="Needs for activation and notifications..." type="email">
	                              </div>
	                            </div>
                            </div> 
                           	<div class="row-fluid">
	                            <div class="span12">
	                              <div class="control-group">
	                                <label>Password</label>
	                                <input style="height:40px;" class="span12" placeholder="At least 6 characters..." type="password">
	                              </div>
	                            </div>
                            </div>                                         

    </div>
    <div class="span6 white-card">
    						<h5 class="text-center">Simply connect with your social account</h5>


                            <div class="row-fluid">
	                            <div class="span12">
	                              <div class="control-group">
	                                <a class="btn btn-block span12" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-facebook-sign"></h3> SignUp With Facebook</a>
	                              </div>
	                            </div>
                            </div>   
                           	<div class="row-fluid">
	                            <div class="span12">
	                              <div class="control-group">
	                                <a class="btn btn-block span12" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-twitter-sign" ></h3> SignUp With Twitter</a>
	                              </div>
	                            </div>
                            </div>                            
                           	<div class="row-fluid">
	                            <div class="span12">
	                              <div class="control-group">
	                                <a class="btn btn-block span12" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-google-plus-sign" ></h3> SignUp With Google+</a>
	                              </div>
	                            </div>
                            </div>   

    </div>
  </div>
</div>


                            <div class="row-fluid">
                              <div class="span12">
                                <div class="form-actions no-margin-bottom">
                                  <button style="margin-left:20px;" class="btn btn-success btn-large" name="button" type="submit">+ Join Toork Now</button><span class="offset2"><i class="icon-check"></i> By joinin toork.com you agree to our <a href="<?php echo $terms; ?>">terms</a> and <a href="<?php echo $privacy; ?>">privacy</a> policies.</span>
                                </div>
                              </div>
                            </div>
                          </fieldset>
                        </form>
                      </div>
                    </div>
                    <div class="span3">
                      <div class="blog-side-text-block widget-filled widget-yellow">
                        <h3>Some Tips:</h3>
                        <ul class="big-iconed-tips">
                          <li>
                            <i class="icon-credit-card"></i>
                            Registration is free
                          </li>
                          <li>
                            <i class="icon-plus-sign"></i>
                            Thousands of channels to follow
                          </li>
                          <li>
                            <i class="icon-cogs"></i>
                            Customize your channel
                          </li>
                          <li>
                            <i class="icon-share-alt"></i>
                            Share Games
                          </li>
                          <li>
                            <i class="icon-lock"></i>
                            100% Secured
                          </li>
                        </ul>
                        <p>After this step, you will have your own game channel to share with your friends and follow your friends, see all your friend activities about games.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </section>




                <?php
                 echo $this->element('NewPanel/landfooter',array());
                ?>