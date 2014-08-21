<?php
/**
 * Dashboard
 * Dashboard Search
 * Following
 * Followers
 * Explore Games
 * Welcome
 * 
 * @param integer $id Kanal kimliği
 * @param string $name Kanal adı
 * @param string $page Hangi Sayfada Çalışıyor?
 * @param boolean $followstatus Takip durumunu belirtir.
 * @param array $games 3 lü oyun alanı için gönderilen oyun datası
 * @author Emircan Ok <emircan@toork.com>
 */
?>
<?php
$id = $user['id'];
$name = $user['username'];
$screenname = isset($user['screenname']) ? $user['screenname'] : NULL;
$verify = $user['verify'];

/**
 * User Link
 */
if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
    $userlink = $this->Html->url('http://' . $value['User']['seo_username'] . '.' . $pure_domain);
} else {
    $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($id)));
}

/**
 * Avatar Photo
 */
$picture = $user['picture'];
if (is_null($picture)) {
    $avatar = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
    $avatar = $this->Html->image('/img/avatars/' . $avatar . '.jpg', array('alt' => $name, 'class' => 'img-responsive center-block avatar img-thumbnail img-circle', 'style' => 'margin-top:-40px; width:80px; height:80px;'));
} else {
    $avatar = $this->Upload->image($user, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name, 'class' => 'img-responsive center-block avatar img-thumbnail img-circle', 'style' => 'margin-top:-40px; width:80px; height:80px;'));
}

/**
 * Cover Photo
 */
$banner = $user['banner'];
if (is_null($banner)) {
    $cover = $this->requestAction(array('controller' => 'users', 'action' => 'randomPicture', 62));
    $cover = 'http://s3.amazonaws.com/betatoorkpics/banners/' . $cover . '.jpg';
} else {
    $cover = Configure::read('S3.url') . "/upload/users/" . $id . "/" . $banner;
}

/**
 * User Stats
 */
$followers = $userstat['subscribeto'];
$following = $userstat['subscribe'];
$games = $userstat['uploadcount'];
?>
<div class="col-xs-12 col-sm-6 col-md-4">
    <div class="panel panel-default">
        <div style="padding:40px; background-size:contain; background-position:center; background-size: 100%; background-image:url(<?php echo $cover; ?>)" class="panel-heading">
        </div>
        <a href="<?php echo $userlink; ?>">
            <?php echo $avatar; ?>
        </a>
        <div class="panel-body">
            <div style="margin-top:-10px;" class="text-center">
                <?php echo $this->element('buttons/follow', array('id' => $id, 'name' => $name, 'follow' => $status)); ?>
            </div>
            <h4>
                <?php if ($verify == 1) { ?>
                    <span class="help" data-toggle="tooltip" data-placement="top" title="" data-original-title="Verified Account">
                        <i style="color:#428bca;" class="fa fa-check-circle"></i>
                    </span>
                <?php } ?>
                <?php if (!is_null($screenname)) { ?>
                    <strong><?php echo $screenname; ?></strong>
                <?php } else { ?>
                    <strong><?php echo $name; ?></strong>
                <?php } ?>
                <br>
                <small>@<?php echo $name; ?></small>
            </h4>
            <span class="label label-success"><?php echo $followers; ?> Followers</span>
            <span class="label label-warning"><?php echo $following; ?> Following</span>
            <span class="label label-danger"><?php echo $games; ?> Games</span>
        </div>
        <?php if (isset($games) && is_array($games) && !empty($games)) { ?>
            <div class="panel-footer">
                <div class="row">
                    <?php
                    foreach ($games_3 as $game33) {
                        if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                            $playurl = $this->Html->url('http://' . $value['User']['seo_username'] . '.' . $pure_domain . '/play/' . h($game33['Game']['seo_url']));
                        } else {
                            $playurl = $this->Html->url(array("controller" => 'businesses', "action" => 'play', h($game33['Game']['id'])));
                        }
                        ?>
                        <a class="col-xs-4 col-sm-4 col-md-4 col-lg-4" href="<?php echo $playurl; ?>">
                            <?php echo $this->Upload->image($game33, 'Game.picture', array('style' => 'toorksize'), array('style' => 'toorksize', 'class' => 'panel-image-preview', 'alt' => $game33['Game']['name'], 'data-original-title' => $game33['Game']['name'], 'data-placement' => 'bottom', 'data-toggle' => 'tooltip', 'width' => '100%', 'onerror' => 'imgError(this,"toorksize");')); ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>