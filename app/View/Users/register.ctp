        <!-- section content -->
        <section class="section">
            <div class="container">
                <div class="signin-form row-fluid">
                    <!--Sign Up-->
                    <div class="span5">
                        <div class="box corner-all">
                            <div class="box-header grd-green color-white corner-top">
                                <span>Create an account!</span>
                            </div>
                            <div class="box-body bg-white">
                                <form id="sign-up" method="post">
                                    <div class="control-group">
                                        <label class="control-label">Username</label>
                                        <div class="controls">
                                            <input type="text" class="input-block-level" data-validate="{required: true, messages:{required:'Please enter field username'}}" name="username" id="username" autocomplete="off" />
                                            <p class="help-block muted helper-font-small">May contain letters, digits, dashes and underscores, and should be between 2 and 20 characters long.</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Email</label>
                                        <div class="controls">
                                            <input type="text" class="input-block-level" data-validate="{required: true, email:true, messages:{required:'Please enter field email', email:'Please enter a valid email address'}}" name="email" id="email" autocomplete="off" />
                                            <p class="help-block muted helper-font-small"><strong>Type carefully.</strong> You will be sent a confirmation email.</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Password</label>
                                        <div class="controls">
                                            <input type="password" class="input-block-level" data-validate="{required: true, minlength: 6, messages:{required:'Please enter field password', minlength:'Please enter at least 6 characters.'}}" name="password" id="password" autocomplete="off" />
                                            <p class="help-block muted helper-font-small">The longer the better. Include numbers for protein.</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Password Again</label>
                                        <div class="controls">
                                            <input type="password" class="input-block-level" data-validate="{required: true, equalTo: '#password', messages:{required:'Please enter field confirm password', equalTo: 'confirmation password does not match the password'}}" name="password_again" id="password_again" autocomplete="off" />
                                            <p class="help-block muted helper-font-small">Enter your password again.</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <p class="term-of-use">Lorem ipsum dolor sit amet, natoque per at morbi at vestibulum leo, velit non, curabitur ac est. <a href="#">terms of use</a> and <a href="#">privacy policy</a>.</p>
                                    </div>
                                    <div class="control-group">
                                        <label class="checkbox">
                                            <input type="checkbox" data-form="uniform" name="subscribe" id="subscribe_yes" value="yes" checked> Sign me up for the newsletter
                                        </label>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" class="btn btn-block btn-large btn-success" value="Create account" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!--/Sign Up-->
                </div><!-- /row -->
            </div><!-- /container -->
            
        </section>