<?php 
  $register=$this->Html->url(array( "controller" => "users","action" =>"register2"));
  $index=$this->Html->url(array( "controller" => "games","action" =>"index"));
?>
            <header id='header'>
              <div class='navbar navbar-fixed-top'>
                <div class='navbar-inner'>
                  <div class='container'>
                    <a class='btn btn-navbar' data-target='.nav-collapse' data-toggle='collapse'>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                    </a>
                    <a href="<?php echo $index; ?>" class="brand"></a><span>beta</span>
                    <div class='nav-collapse subnav-collapse collapse pull-right' id='top-navigation'>
                      <div class=''>
                        <a href="<?php echo $register; ?>" class="btn btn-success">Create Account</a>
                        <a href="#" class="btn top-sign-in">Sign In</a>
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