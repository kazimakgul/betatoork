<?php 

if (empty($game)) {
    ?>
    <div class="notfound text-center">
        <?php echo 'Game Not Found'; ?>
    </div>
    <?php
} else {

        if (Configure::read('Domain.type') == 'subdomain') {
            $playurl = $this->Html->url(array("controller" => 'play', "action" => h($game['Game']['seo_url'])));
        } else {
            $playurl = $this->Html->url(array("controller" => 'mobiles', "action" => 'play', h($game['Game']['id'])));
        }


?>

<div class="panel panel-default">

        <a href="http://socialesman.clone.gs/play/flappybird1" target="_blank">
            <img src="https://s3.amazonaws.com/betatoorkpics/upload/games/6791/Screen Shot 2014-06-24 at 15.02.24_toorksize.png" style="toorksize" class="box_img_resize" alt="Flappy Bird" onerror="imgError(this,&quot;toorksize&quot;);" width="100%"> 
        </a>
        <div class="panel-body" style= "padding-bottom:0px;">
                 <div style= "margin-top:-60px; margin-bottom:20px;">

                    <button type="button" class="btn btn-primary"><i class="fa fa-play"></i> Play</button>

                    <button type="button" class="btn btn-success"><i class="fa fa-share-alt"></i> Share</button>

                </div>

            <p><h4><a target="_blank" href="http://socialesman.clone.gs/play/flappybird1"><strong><?php echo $game['Game']['name'] ?> </strong> </a>: <?php echo $game['Game']['description'] ?> </h4></p>


        </div>
                    <div class="panel-footer">
                                    <div class="row">
                        <div style="width: 55px;float:left; margin:0 10px">
                            <a href="http://socialesman.clone.gs">
                                <img src="https://s3.amazonaws.com/betatoorkpics/upload/users/2/6_original.jpg" class="img-responsive img-thumbnail img-circle circular2" onerror="imgError(this,&quot;avatar&quot;);" alt="">                            </a>
                        </div>
                        <div class="col-md-7">
                            <h5>
                                                                    <span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span>
                                                                <a href="http://socialesman.clone.gs">
                                    <strong>
                                        Socialesman                                    </strong>
                                </a>
                                <br>
                                <small>@ socialesman</small>
                            </h5>
                        </div>
                    </div>
                                </div>
            </div>


            <?php 
              }
            ?>