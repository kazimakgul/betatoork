

<?php
	$terms=$this->Html->url(array( "controller" => "pages","action" =>"terms"));
	$privacy=$this->Html->url(array( "controller" => "pages","action" =>"privacy"));
	              
?>


			<section class="section-wrapper create-account-page-w">
              <div class="container"><br>
                <div class="row">
                  <div class="span9">
                    <div class="white-card extra-padding">
                      <form id="toorkRegister">
                        <fieldset>
                          <div class="row-fluid">
                            <div class="span12">
                              <h3 class="form-header"><i class="icon-plus"></i> Create Your Channel</h3>
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
	                            <div class="span11">
	                              <div class="control-group">
	                                <label>Channel Name</label>
	                                <input name="username" id="reg_username" style="height:40px;" class="span12" placeholder="At least 6 characters... Ex: Armorgames" type="text">
                                  <label style="display:none; color:red; font-family:arial; font-size:13px;" for="reg_username" class="error">Username is already taken</label>
	                              </div>
	                            </div>
                            </div>

                           	<div class="row-fluid">
	                            <div class="span11">
	                              <div class="control-group">
	                                <label>Email Address</label>
	                                <input name="email" id="reg_email" style="height:40px;" class="span12" placeholder="Needs for activation and notifications..." type="email">
                                  <label style="display:none; color:red; font-family:arial; font-size:13px;" for="reg_email" class="error">Email is already taken</label>
	                              </div>
	                            </div>
                            </div> 
                           	<div class="row-fluid">
	                            <div class="span11">
	                              <div class="control-group">
	                                <label>Password</label>
	                                <input name="password" id="reg_password" style="height:40px;" class="span12" placeholder="At least 6 characters..." type="password">
                                  <label style="display:none; color:red; font-family:arial; font-size:13px;" for="reg_password" class="error">Password is wrong</label>
	                              </div>
	                            </div>
                            </div>                                         

    </div>

    <div class="span6 white-card">
                <h5 class="text-center">Sign Up With Your Social Account</h5>


                            <div class="row-fluid">
                              <div class="span12">
                                <div class="control-group">
                                  <a id="facebookreg" class="btn btn-block span12" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-facebook-sign"></h3> SignUp With Facebook</a>
                                </div>
                              </div>
                            </div>  
<!--

                            <h6 class="text-center">Some Activities You Can Do</h6>
                            <div class="row-fluid">
                              <div class="span4">
                                <div class="control-group">
                                  <a class="btn btn-small btn-block span12 btn-success" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-plus-sign"></h3> Follow Channels</a>
                                </div>
                              </div>
                                <div class="span4">
                                <div class="control-group">
                                  <a class="btn btn-small btn-block span12 btn-danger" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-tint" ></h3> Clone Games</a>
                                </div>
                              </div>
                               <div class="span4">
                                <div class="control-group">
                                  <a class="btn btn-small btn-block span12" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-star" ></h3> Rate Games</a>
                                </div>
                              </div> 


                            </div>                            
                            <div class="row-fluid">
                              <div class="span4">
                                <div class="control-group">
                                  <a class="btn btn-small btn-block span12 btn-warning" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-heart" ></h3> Favorite Games</a>
                                </div>
                              </div>
                               <div class="span4">
                                <div class="control-group">
                                  <a class="btn btn-small btn-block span12 btn-primary" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-plus" ></h3> Add Games</a>
                                </div>
                              </div> 
                              <div class="span4">
                                <div class="control-group">
                                  <a class="btn btn-small btn-block span12 btn-info" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-play" ></h3> Play Games</a>
                                </div>
                              </div>
                            </div> 
-->

    </div>


<!--    
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
-->

  </div>
</div>

<div style="width:100%;text-align:center;"><div id="grabloader" style="display:none;">
							<p><small><?php echo $this->Html->image("/img/loading.gif");?> </small></p>
							<p><small>You have successfully registered now.<br>You will be redirected to your personal channel now.<br>Please be patient and enjoy Clone...</small></p>
							</div></div>


                            <div class="row-fluid">
                              <div class="span12">
                                <div class="form-actions no-margin-bottom">
                                  <button id="t_landing_registerbtn" style="margin-left:20px;" class="btn btn-info btn-large validateRegister" name="button" type="button">+ Join Clone Now</button><span class="offset2"><i class="icon-check"></i> By joinin clone.gs you agree to our <a href="<?php echo $terms; ?>">terms</a> and <a href="<?php echo $privacy; ?>">privacy</a> policies.</span>
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


 <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>