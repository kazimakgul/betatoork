<div class="container">
    <?php
    $game_id = $game['Game']['id'];
    $gamename = $game['Game']['name'];
    $description = $game['Game']['description'];
    $username = $game['User']['seo_username'];
    $hashtaglink = $this->Html->url(array("controller" => "businesses", "action" => "hashtag", $game['Game']['seo_url']));
    if ($username != NULL) {
        $profilepublic = $this->Html->url(array("controller" => h($username), "action" => ''));
    } else {
        $profilepublic = $this->Html->url(array("controller" => "businesses", "action" => "profile", $game['User']['id']));
    }
    if (Configure::read('Domain.type') == 'subdomain') {
        $next_game = $this->Html->url(array("controller" => 'play', "action" => h($next_game['Game']['seo_url'])));
    } else {
        $next_game = $this->Html->url(array('controller' => 'businesses', 'action' => 'play', h($next_game['Game']['id'])));
    }
    ?>
    <script>
        game_id = '<?= $game_id ?>';
        rateurl = '<?php echo $this->Html->url(array('controller' => 'rates', 'action' => 'add')); ?>';
    </script>
    <!-- Iframe Content --> 
    <iframe src="<?php echo h($game['Game']['link']); ?>" style="border: 0; position:fixed; top:50px; left:0; right:0; bottom:0; width:100%; height:95%"></iframe><!-- Iframe Content End --> 
    <div class="navbar navbar-default navbar-fixed-bottom" style="min-height:35px" role="navigation">
        <!-- Remove Button -->
        <button type="button" class="close pull-right" data-toggle="tooltip" data-original-title="Close" style='padding: 6px 12px; margin-top: 4px' data-dismiss="alert" aria-hidden="true"><li class="glyphicon glyphicon-remove"></li></button>
        <!-- Remove Button End -->
        <!-- Next Button -->
        <a href="<?php echo $next_game; ?>" type="button" class="close pull-right" style='padding: 6px 12px; margin-top: 4px' data-toggle="tooltip" data-original-title="Next"><li class="fa fa-fast-forward"></li></a>
        <!-- Next Button End -->
        <div class="collapse navbar-collapse" >
            <div class="col-sm-11 col-md-11" style="margin-bottom: 0px; padding-top: 3px; padding-bottom: 3px">
                <!-- center - right -->
                <div class='pull-left'>
                    <?php echo $this->element('business/buttons/clone'); ?>
                    <?php echo $this->element('business/buttons/favorite'); ?>	
                </div>
                <div class='pull-center'>
                    <?php echo $this->element('business/buttons/rate'); ?>
                </div>
                <div class='pull-right' style='margin-right: 30px;'>	
                    <?php echo $this->element('business/buttons/comment'); ?>
                    <?php echo $this->element('business/buttons/share'); ?>
                </div>   
            </div>
        </div>
    </div>
    <?php echo $this->element('business/clonebox'); ?>