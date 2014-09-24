<?php
if($game['Game']['active']==0)
{ 
    $mygames = $this->Html->url(array("controller" => 'businesses', "action" => 'mygames', 'draft'));
?>

<div style="position:absolute; width:100%; z-index:9999;" align="center" class="alert alert-danger">
<button type="button" class="close pull-right" data-toggle="tooltip" data-original-title="Close" data-dismiss="alert" aria-hidden="true"><li class="glyphicon glyphicon-remove"></li></button>

        <span class="fa-stack fa-lg fa-2x" style="opacity:0.5;">
          <i class="fa fa-gamepad fa-stack-1x"></i>
          <i class="fa fa-ban fa-stack-2x text-danger"></i>
        </span>

        <h5>This game is unpublished so only you can see it.</h5>
         <a href="<?php echo $mygames; ?>" title="Go to MyGames" class="btn btn-sm btn-danger">
         <span class="fa fa-gamepad"></span> Go to MyGames</a>

</div>


<?php }
 ?>
 

<div class="container">
    <?php
    $game_id = $game['Game']['id'];
    $gamename = $game['Game']['name'];
    $description = $game['Game']['description'];
    $username = $game['User']['seo_username'];
    Configure::write('Backskin.block', 1);
    $hashtaglink = $this->Html->url(array("controller" => "businesses", "action" => "hashtag", $game['Game']['seo_url']));
    if ($username != NULL) {
        $profilepublic = $this->Html->url(array("controller" => h($username), "action" => ''));
    } else {
        $profilepublic = $this->Html->url(array("controller" => "businesses", "action" => "profile", $game['User']['id']));
    }
    if (Configure::read('Domain.type') == 'subdomain') {
        $next_game = $this->Html->url(array("controller" => 'play', "action" => h($next_game['Game']['seo_url'])));
        $playurl = $this->Html->url(array("controller" => 'play', "action" => h($game['Game']['seo_url'])));
    } else {
        $next_game = $this->Html->url(array('controller' => 'businesses', 'action' => 'play', h($next_game['Game']['id'])));
        $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game['Game']['id'])));
    }
    ?>
    <script>
        game_id = '<?= $game_id ?>';
        rateurl = '<?php echo $this->Html->url(array('controller' => 'rates', 'action' => 'add')); ?>';
    </script>
    

    <div class="game_box_pre" style="text-align: center; display:none;">
        <div id="dl"></div> <a class="label label-warning" style="cursor: pointer;" onclick="skip_ad();">× Skip</a>
        <!--Game Box pre -> Ads begins-->
	<?php echo $this->element('business/pregame_ad', array('controls' => NULL, 'user_id' => $user['User']['id'], 'location' =>6, 'pregame'=>1 )); ?>
        <!--Game Box pre -> Ads ends-->
    </div>


    <!-- Iframe Content --> 
    <iframe class="game_box" src="<?php echo h($game['Game']['link']); ?>" style="border: 0; position:fixed; top:50px; left:0; right:0; bottom:0; width:100%; height:95%"></iframe><!-- Iframe Content End --> 

    
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
                    <div class="clone">
                        <?php
                        if (isset($ownclone[0]['cloneships']['id'])) {
                            $clonestatus = TRUE;
                        } else {
                            $clonestatus = FALSE;
                        }
                        echo $this->element('buttons/clone', array('clone' => $clonestatus, 'name' => $gamename, 'id' => $game_id));
                        ?>
                    </div>
                    <div class="favourite">
                        <?php
                        if (isset($ownuser[0]['favorites']['id'])) {
                            $favorite_status = TRUE;
                        } else {
                            $favorite_status = FALSE;
                        }
                        echo $this->element('buttons/favorite', array('favorite' => $favorite_status, 'name' => $gamename, 'id' => $game_id));
                        ?>
                    </div>
                </div>
                <div class='pull-center'>
                    <?php echo $this->element('business/buttons/rate'); ?>
                </div>
                <div class='pull-right' style='margin-right: 30px;'>	
                    <?php echo $this->element('business/buttons/comment'); ?>
                    <?php
                    $share_url = $_SERVER['SERVER_NAME'].$playurl;
                    echo $this->element('business/buttons/share', array('url'=>$share_url,'name'=>$gamename.' - '.$share_url)); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->element('business/clonebox'); ?>

    <script>
        window.onload = hide_gamebox();

        //=======Playcount==========
        setTimeout(function() {
            add_playcount(<?php echo $game['Game']['id']; ?>,<?php echo $game['Game']['user_id']; ?>);
        }, 10000);

    </script>