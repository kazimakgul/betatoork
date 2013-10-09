
			<section class="section-wrapper create-account-page-w">
              <div class="container">
                <div class="row offset3">
                  <div class="span5">
                    <div class="white-card extra-padding">
                      <form>
                        <fieldset>

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

                            <div class="row-fluid">
                              <div class="span12">
                                <div class="control-group">
                                  <label>Username</label>
                                  <input style="height:40px;" class="span12" placeholder="Channel Name or Email" type="text">
                                </div>
                              </div>
                            </div>

                            <div class="row-fluid">
                              <div class="span12">
                                <div class="control-group">
                                  <label>Password</label>
                                  <input style="height:40px;" class="span12" placeholder="Capital letter sensitive" type="password">
                                </div>
                              </div>
                            </div>


                            <div class="row-fluid">
                              <div class="span12">
                                <label class="span6 checkbox">
                                   <input checked type="checkbox"> Remember me
                                </label>                                
                                  <button class="btn btn-success pull-right" name="button" type="submit">Sign In Now</button>
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