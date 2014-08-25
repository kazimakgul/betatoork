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

<?php if($game['Game']['install']){ ?>
<div class="panel panel-default">

        <a target='_blank' href="<?php echo $game['Game']['link']; ?>">
            <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $game['Game']['name'], 'onerror' => 'imgError(this,"toorksize");', 'width' => '100%')); ?> 
        </a>
        <div class="panel-body" style= "padding-bottom:0px;">
                 <div style= "margin-top:-60px; margin-bottom:20px;">

                   <!-- This generate mobile app buttons begins -->
                    <div class="row text-center">
                    <?php foreach ($game['Applink'] as $platforms) { ?>
                         
                       <?php if($platforms['platform_id']==1 && $platforms['link']!=NULL){ ?>
                    
                    <a target='_blank' href="<?php echo $platforms['link']; ?>" class="btn btn-success"><i class="fa fa-android"></i> Install Android</a>
                    
                       <?php }elseif($platforms['platform_id']==2 && $platforms['link']!=NULL) {?>
                    
                    <a target='_blank' href="<?php echo $platforms['link']; ?>" class="btn btn-info"><i class="fa fa-apple"></i> Install iOS</a>
                    
                       <?php }?>
                        
                           
                    <?php } ?>
                    </div>
                    <!-- This generate mobile app buttons ends -->

                    <!--<button type="button" class="btn btn-success"><i class="fa fa-share-alt"></i> Share</button>-->

                </div>

            <p><h4><a target='_blank' href="<?php echo $game['Game']['link']; ?>"><strong><?php echo $game['Game']['name'] ?> </strong> </a>: <?php echo $game['Game']['description'] ?> </h4></p>


        </div>
                    <div class="panel-footer">
                                    <div class="row">
                        <div style="width: 55px;float:left; margin:0 10px">
                            <a href="<?php echo $home; ?>">
                                <?php echo $this->Upload->image($user, 'User.picture', array(), array('id' => 'user_avatar', 'class' => 'img-responsive img-thumbnail img-circle circular2', 'onerror' => 'imgError(this,"avatar");', 'alt' => 'profile', 'width' => '35', 'height' => '35')) ?>                          </a>
                        </div>
                        <div class="col-md-7">
                            <h5>
                                                                    <span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span>
                                                                <a href="<?php echo $home; ?>">
                                    <strong>
                                        <?php echo $game['User']['username'] ?>  
                                    </strong>
                                </a>
                                <br>
                                <small>@ <?php echo $game['User']['seo_username'] ?></small>
                            </h5>
                        </div>
                    </div>
                                </div>
            </div>
<?php }else{ ?>
            <div class="panel panel-default">

        <a href="<?php echo $playurl; ?>">
            <?php echo $this->Upload->image($game, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $game['Game']['name'], 'onerror' => 'imgError(this,"toorksize");', 'width' => '100%')); ?> 
        </a>
        <div class="panel-body" style= "padding-bottom:0px;">
                 <div style= "margin-top:-60px; margin-bottom:20px;">

                   <a href="<?php echo $playurl; ?>"> <button type="button" class="btn btn-primary"><i class="fa fa-play"></i> Play</button> </a>

                    <!--<button type="button" class="btn btn-success"><i class="fa fa-share-alt"></i> Share</button>-->

                </div>

            <p><h4><a href="<?php echo $playurl; ?>"><strong><?php echo $game['Game']['name'] ?> </strong> </a>: <?php echo $game['Game']['description'] ?> </h4></p>


        </div>
                    <div class="panel-footer">
                                    <div class="row">
                        <div style="width: 55px;float:left; margin:0 10px">
                            <a href="<?php echo $home; ?>">
                                <?php echo $this->Upload->image($user, 'User.picture', array(), array('id' => 'user_avatar', 'class' => 'img-responsive img-thumbnail img-circle circular2', 'onerror' => 'imgError(this,"avatar");', 'alt' => 'profile', 'width' => '50', 'height' => '50')) ?>                          </a>
                        </div>
                        <div class="col-md-7">
                            <h5>
                                                                    <span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account"> <i style="color:#428bca;" class="fa fa-check-circle"></i></span>
                                                                <a href="<?php echo $home; ?>">
                                    <strong>
                                        <?php echo $game['User']['username'] ?>  
                                    </strong>
                                </a>
                                <br>
                                <small>@ <?php echo $game['User']['seo_username'] ?></small>
                            </h5>
                        </div>
                    </div>
                                </div>
            </div>
<?php }?>






            <?php 
              }//if game exists control ends here
            ?>