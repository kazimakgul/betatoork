 <?php
$index=$this->Html->url(array("controller" => "games","action" =>"index")); 
?>

<body id="signup" class="clear">


    <a href="<?php echo $index; ?>" class="logo">
        <img width="70px" height="70px" src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/clonelogo.png">
    </a>



    <div class="content">

<div>
    <iframe id="forum_embed" src="https://groups.google.com/forum/embed/?place=forum/toorkfaq&amp;showsearch=true&amp;showpopout=false&amp;parenturl=http://toork.com/pages/faq" scrolling="no" frameborder="0" width="100%" height="1000"></iframe>
    </div>

    </div>

<?php  echo $this->element('NewPanel/dashfooter'); ?>  

</body>


           