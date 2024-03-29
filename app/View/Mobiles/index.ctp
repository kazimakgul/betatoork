<?php
if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
    $home = $this->Html->url('/');
} else {
    $home = $this->Html->url(array("controller" => "mobiles", "action" => "index", $user_id));
}
echo $this->element('mobile/drawer');

    $controls = NULL;
?>
<div id="content" class="snap-content">
    <div id="toolbar">
        <a class="btn" style="background-color: transparent;" href="javascript:;" id="open-left"><i style="color:white;" class="fa fa-bars fa-2x"></i></a>
        <h1><?php if($screenname ==NULL) {echo $username;} else{echo $screenname; } ?></h1>
        <?php
        if (is_null($picture)) {
            $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
            echo '<a class="image" href="' . $home . '">' . $this->Html->image("/img/avatars/$avatarImage.jpg", array('id' => 'user_avatar', 'class' => 'img-circle', 'onerror' => 'imgError(this,"avatar");', 'alt' => 'profile', 'width' => '35', 'height' => '35')) . '</a>';
        } else {
            echo '<a class="image" href="' . $home . '">' . $this->Upload->image($user, 'User.picture', array(), array('id' => 'user_avatar', 'class' => 'img-circle', 'onerror' => 'imgError(this,"avatar");', 'alt' => 'profile', 'width' => '35', 'height' => '35')) . '</a>';
        }
        ?>
    </div>
    <div class="container">
        
        <?php echo $this->element('business/mobad', array('controls' => $controls, 'user_id' => $user_id, 'location' => 7)); ?>

        <div class="row">
            <?php echo $this->element('mobile/gamebox', array('games' => $games)); ?>
        </div>

        <?php echo $this->element('business/mobad', array('controls' => $controls, 'user_id' => $user_id, 'location' => 8)); ?>

        <div class="text-center">
            <?php echo $this->element('business/components/pagination'); ?>
        </div>
    </div>
</div>
<style>
    .container {
        margin-top: 60px;
    }
    div#toolbar a.image {
        position: absolute;
        right: 10px;
        top: 5px;
    }
</style>