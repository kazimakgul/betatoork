 <?php
$index=$this->Html->url(array("controller" => "games","action" =>"index")); 
?>

<body id="signup" class="clear">


    <a href="<?php echo $index; ?>" class="logo">
        <img width="70px" height="70px" src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/clonelogo.png">
    </a>



    <div class="content">

<div>
    <h2>About Us</h2>
    <h4>We are glad that you asked</h4>
   <p><small>
Clone is a social network about games, gamers, game bloggers, game developers and game sites. Clone is the right place to promote your games and build your community about games. We are a small company who are well focused on making clone the biggest community in the world. We are working really hard to make clone more advanced tool for gamers. Add one of our pre-build clone social buttons to let your visitors reach your channel. Share good stuff , make them follow you and grow your community. Have fun. </small></p>
                      <br />
                      <h4>Hey! I have a game site!</h4>
                      <p><small>
                            Thats really good that you have a web site about games. But how do you promote your site/games, how do you drive traffic to your games?
                            We are here to promote your site. Actually you are here to promote your site.
                            Just register and customize your channel, add your site url and add your games. As we are in beta and still in development please let us know if you have any problems so
                            contact us at <a class="btn-link" href="mailto:siteowner@clone.gs">siteowner@clone.gs</a>.
                      </small></p>
                      <br />
                      <h4>Wanna talk to us?</h4>
                      <p><small>
                            Shoot us an email at <a class="btn-link" href="mailto:hello@clone.gs">hello@clone.gs</a>
                      </small></p>
    </div>

    </div>

<?php  echo $this->element('NewPanel/dashfooter'); ?>  

</body>


              