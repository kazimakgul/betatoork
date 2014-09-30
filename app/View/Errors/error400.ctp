<?php
$index = $this->Html->url(array("controller" => "games", "action" => "index"));
$register = $this->Html->url(array("controller" => "users", "action" => "register2"));
?>

<body id="signin" class="clear">

    <a href="<?php echo $index; ?>" class="logo">
        <img width="100px" height="100px" src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/clonelogo.png">
    </a>

    <h3>Ooops! Something went wrong!</h3>

    <div class="content">
            <h4 class="text-center">Sorry, an error has occured, Requested page not found!</h4>
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

    <h2><?php echo $name; ?></h2>
<p class="error">
    <strong><?php echo __d('cake', 'Error'); ?>: </strong>
    <?php printf(
        __d('cake', 'The requested address %s was not found on this server.'),
        "<strong>'{$url}'</strong>"
    ); ?>
</p>
<?php
if (Configure::read('debug') > 0):
    echo $this->element('exception_stack_trace');
endif;
?>
    
</body>