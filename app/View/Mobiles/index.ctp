<?php echo $this->element('mobile/drawer'); ?>
<div id="content" class="snap-content">
    <div id="toolbar">
        <a class="btn" style="background-color: transparent;" href="javascript:;" id="open-left"><i style="color:white;" class="fa fa-bars fa-2x"></i></a>
        <h1><?= $username ?></h1>
    </div>
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <?php echo $this->element('mobile/gamebox', array('games' => $games)); ?>
        </div>
        <div class="text-center">
            <?php echo $this->element('business/components/pagination'); ?>
        </div>
    </div>
</div>