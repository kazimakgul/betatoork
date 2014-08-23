<?php echo $this->element('mobile/drawer'); ?>
<div id="content" class="snap-content">
    <a href="javascript:;" id="open-left" class="btn">
        <i class="fa fa-bars fa-2x"></i>
    </a>
   
    <div class="game_box_pre" style="text-align: center; display:none;">
        <div id="dl"></div> <a class="label label-warning" style="cursor: pointer;" onclick="skip_ad();">× Skip</a>
        <!--Game Box pre -> Ads begins-->
    <?php echo $this->element('business/mobad_pregame', array('controls' => NULL, 'user_id' => $user_id, 'location' =>11, 'pregame'=>1 )); ?>
        <!--Game Box pre -> Ads ends-->
    </div>

    <div class="container game_box" style="margin-top:44px;">
        <iframe src="<?= $game_link ?>" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; ">
            Your browser doesn't support IFrames
        </iframe>
    </div>


</div>
<style>
    a#open-left {
        background-color: rgba(0, 0, 0, 0.5);
        margin-top: 50px;
        border-radius: 0 8px 8px 0;
        -webkit-border-radius: 0 8px 8px 0;
        -moz-border-radius: 0 8px 8px 0;
        z-index: 9999999;
        position: fixed;
    }
    a#open-left i {
        color: white;
        position: fixed;
        z-index: 9999999;
        margin-left: -13px;
    }
</style>
<script>
    window.onload = hide_gamebox();

    setTimeout(function() {
        add_playcount(<?php echo $game_id; ?>, <?php echo $user_id; ?>);
    }, 10000);
</script>