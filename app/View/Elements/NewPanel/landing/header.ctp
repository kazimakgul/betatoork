<?php 
  $register=$this->Html->url(array( "controller" => "users","action" =>"register2"));
  $login=$this->Html->url(array( "controller" => "users","action" =>"login3"));
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
                        <a href="<?php echo $login; ?>" class="btn">Sign In</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </header>