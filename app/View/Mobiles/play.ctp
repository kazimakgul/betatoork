<?php echo $this->element('mobile/drawer'); ?>
<div id="content" class="snap-content">
    <a class="btn" style="background-color: transparent;" href="javascript:;" id="open-left">
        <i style="color:white; position:fixed;  z-index:9999999;" class="fa fa-bars fa-2x"></i>
    </a>
    <div class="container" style="margin-top:44px;">
        <iframe src="<?= $game_link ?>" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; ">
            Your browser doesn't support IFrames
        </iframe>
    </div>
</div>
<script>
    setTimeout(function() {
        add_playcount(<?php echo $game_id; ?>, <?php echo $user_id; ?>);
    }, 10000);
</script>