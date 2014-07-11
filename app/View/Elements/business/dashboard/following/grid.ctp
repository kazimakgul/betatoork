<?php
foreach ($following as $value) {
    if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
        $userlink = $this->Html->url('http://'.$value['User']['seo_username'].'.'.$_SERVER['HTTP_HOST']); 
    } else {
        $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
    }
    $name = $value['User']['username'];
    $followers = $value['User']['Userstat']['subscribeto'];
    $following = $value['User']['Userstat']['subscribe'];
    $games = $value['User']['Userstat']['uploadcount'];
    ?>
    <div class="user col-xs-6 col-sm-4 col-md-3 col-lg-2">
        <a href="<?php echo $userlink; ?>">
            <?php
            if (is_null($value['User']['picture'])) {
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name));
            } else {
                echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name));
            }
            ?>
        </a>
        <div class="name">
            <a href="<?php echo $userlink; ?>">
                <?php echo $name; ?>
            </a>
        </div>
        <div class="email">
            <?php
            echo
            $followers . ' Followers | ' .
            $following . ' Following | ' .
            $games . ' Gamses'
            ?>
        </div>
    </div>
    <?php
}
?>