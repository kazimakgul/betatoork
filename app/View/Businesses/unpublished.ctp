<?php
$index = $this->Html->url(array("controller" => "games", "action" => "index"));
$register = $this->Html->url(array("controller" => "users", "action" => "register2"));
?>

<body id="signin" class="clear">

    <a href="<?php echo $index; ?>" class="logo">
        <img width="100px" height="100px" src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/clonelogo.png">
    </a>

    <h3>This game is not available anymore</h3>

    <div class="content">
            <h4 class="text-center">

<span class="fa-stack fa-lg fa-3x" style="opacity:0.5;">
  <i class="fa fa-gamepad fa-stack-1x"></i>
  <i class="fa fa-ban fa-stack-2x text-danger"></i>
</span>

                <br>Sorry, this game has may be removed or unpubished by the owner or may be suspended by Clone team!</h4>
            <div class="actions">
                <a href="http://clone.gs" class="btn btn-primary btn-lg">Go Back to Clone</a>
            </div>
    
    </div>

    <div class="bottom-wrapper">
        <div class="message">
            <span>Don't have an account?</span>
            <a href="<?php echo $register; ?>">Sign up here</a>.
        </div>
    </div>
    
</body>