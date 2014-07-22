<?php 
$tools=$this->Html->url(array("controller" => "pages","action" =>"buttons"));  
$index=$this->Html->url(array("controller" => "games","action" =>"index")); 
?>

<body id="signup" class="clear">


    <a href="<?php echo $index; ?>" class="logo">
        <img width="70px" height="70px" src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/clonelogo.png">
    </a>



    <div class="content">

<div>
                 <h2>Developers</h2>

                      <p>
if you are a game creator and you want to promote your game in clone, the only thing you should do is becoming a member and submit your game for free. By submiting your games you will be able to earn money from your own games by having your own adcode like adsense or adbright. <a class="btn-link" href="mailto:developer@clone.gs"> Contact us</a> for more details as we are in beta right now.
                      </p>
                      
                      <h4>Submit your game</h4>
                      <p><small>
In this section you can add your own games by uploading your game file. Please let us know if you want to promote your own games. Your games will be hosted at clone servers for free. Even if you host your games on your own servers, you still can promote it on clone. if you are a game developer and want to learn more please contact us at <a class="btn-link" href="mailto:developer@clone.gs">developer@clone.gs</a>
                      </small></p>
                      
                      <h4>Clone Apps</h4>
                      <p><small>
Clone is working so hard to become developer friendly so you will be able to use clone api to interact with thousands of games and members.
                      </small></p>

                      <h4>Clone Social Buttons</h4>
                      <p><small>
Clone is a social network about games, gamers, game bloggers, game developers and game sites. Clone is the right place to promote your games. Add one of our pre-build clone social buttons to let your visitors reach your channel. Share good stuff , make them follow you and grow your community. Have fun. You already can use our pre-build social buttons <a class="btn" href="<?php echo $tools;?>">Clone Buttons Page</a>
                      </small></p>
    </div>

    </div>

<?php  echo $this->element('NewPanel/dashfooter'); ?>  

</body>
