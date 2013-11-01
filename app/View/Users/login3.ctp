<section class="section-wrapper create-account-page-w">
              <div class="container"><br>
                <div class="row offset3">
                  <div class="span5">
                    <div class="white-card extra-padding">
<form id="toorkLogin">
<fieldset>

                <h5 class="text-center">Log in to your Toork account</h5>

<!--
                <h5 class="text-center">Simply connect with your social account</h5>
                            <div class="row-fluid">
                              <div class="span12">
                                <div class="control-group">
                                  <a class="btn btn-block span12" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-facebook-sign"></h3> Login With Facebook</a>
                                </div>
                              </div>
                            </div>   
                            <div class="row-fluid">
                              <div class="span12">
                                <div class="control-group">
                                  <a class="btn btn-block span12" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-twitter-sign" ></h3> Login With Twitter</a>
                                </div>
                              </div>
                            </div>                            
                            <div class="row-fluid">
                              <div class="span12">
                                <div class="control-group">
                                  <a class="btn btn-block span12" style="height:40px; margin-bottom:20px;" type="button"><h3 class="icon-google-plus-sign" ></h3> Login With Google+</a>
                                </div>
                              </div>
                            </div>   

                            <h5 class="text-center">Or</h5>
-->

                            <div class="row-fluid">
                              <div class="span12">
                                <div class="control-group">
                                  <label>Username</label>
  <input name="username" id="txt_signusername" style="height:40px;" class="span12" placeholder="Channel Name or Email" type="text">
  <span style="display:none; color:red; font-family:arial;"  class="errormsg" id="errormsg_Email">Enter your username or email address.</span>
                                </div>
                              </div>
                            </div>

                            <div class="row-fluid">
                              <div class="span12">
                                <div class="control-group">
                                  <label>Password</label>
                                  <input name="password" id="txt_signpass" style="height:40px;" class="span12" placeholder="Capital letter sensitive" type="password">
								  <span style="display:none; color:red; font-family:arial;" id="errormsg_Passwd">The username or password you entered is incorrect.</span>
                                </div>
                              </div>
                            </div>


                            <div class="row-fluid">
                              <div class="span12">
                                <label class="span6 checkbox">
                                   <input checked type="checkbox"> Remember me
                                </label>      
  <button id="t_gatekeeper_login_btn" class="validateLogin btn btn-success pull-right" type="button">Sign In Now</button>
</div>
                            </div>
                          </fieldset>
                        </form>
                          <p><a href="#modal-recover" class="link" data-toggle="modal">Forgot password?</a></p>
                          <?php  echo $this->element('NewPanel/passwordModal'); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
	  
			  
			  
			  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://jquery.bassistance.de/validate/jquery.validate.js"></script>
<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>

			  