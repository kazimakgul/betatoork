<?php echo $this->element('mobile/drawer'); ?>
<div id="content" class="snap-content">
    <a class="btn btn-default" href="#" id="open-left"><i style="color:white; position:fixed;  z-index:9999999;" class="fa fa-bars fa-2x"></i></a>
    <div class="container" style="margin-top:44px;">
        <!--
        <iframe src="http://phoboslab.org/xtype/" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; ">
            Your browser doesn't support IFrames
        </iframe>
        -->
        <iframe src="<?= $game_link ?>" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; ">
            Your browser doesn't support IFrames
        </iframe>
    </div>
</div>