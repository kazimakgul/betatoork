
    <?php if($isActive==0 && $this->Session->check('Auth.User') == 1){ ?>
    <div class="alert alert-warning span12">
                                    <div class="box-header corner-top">
                                            <div class="header-control">
                                            <button data-box="close" data-hide="fadeOut" class="close">×</button>
                                            </div>
                                            
                                    </div>
        <p> Your account is not active yet. Please check your email to activate your account to be able to publish your own games. ( Don't forget to check your spam folder also. ) 
        <a class="btn btn-warning btn-mini"><i class="elusive-envelope"></i>  Send Again</a></p>
    </div>
    <?php }else{}?>