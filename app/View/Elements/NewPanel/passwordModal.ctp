            <!-- modal recover -->
            <div id="modal-recover" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modal-recoverLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="modal-recoverLabel" class="bold">Reset password</h3>
                </div>
                <div class="modal-body">
                    <form id="form-recover" method="post">
                        <div class="control-group">
                            <div class="controls">
                                <input type="text" id="resetcredential" class="span4" placeholder="Username or Email Address"/>
                                <p class="help-block helper-font-small">Enter your username or email address and we will send you a link to reset your password.</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <input type="button" id="forget_pass" data-dismiss="modal" form="form-recover" class="btn btn-primary" value="Send reset link" >
                </div>
            </div><!-- /modal recover-->