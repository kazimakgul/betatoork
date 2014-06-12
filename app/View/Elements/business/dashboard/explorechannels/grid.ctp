<?php
foreach ($following as $value) {
    $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
    $name = $value['User']['username'];
    $followers = $value['Userstat']['subscribe'];
    $following = $value['Userstat']['subscribeto'];
    $games = $value['Userstat']['uploadcount'];
    ?>
    <div class="user col-xs-12 col-sm-6 col-md-4 col-lg-2">
        <a href="<?php echo $userlink ?>">
            <?php
            if (is_null($value['User']['picture'])) {
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name));
            } else {
                echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name));
            }
            ?>
        </a>
        <a href="<?php echo $userlink ?>" class="name">
            <?php echo $name ?>
        </a>
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