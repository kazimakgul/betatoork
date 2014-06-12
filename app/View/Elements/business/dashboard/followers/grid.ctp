<?php
foreach ($followers as $value) {
    $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
    ?>
    <div class="user col-xs-6 col-sm-4 col-md-3 col-lg-2">
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
        <div class="name">
            <a href="<?php echo $userlink ?>">
                <?php echo $value['User']['username'] ?>
            </a>
        </div>
        <div class="email">
            <?php
            echo
            $value['User']['Userstat']['subscribeto'] . ' Followers | ' .
            $value['User']['Userstat']['subscribeto'] . ' Following | ' .
            $value['User']['Userstat']['uploadcount'] . ' Gamses'
            ?>
        </div>
    </div>
    <?php
}
?>