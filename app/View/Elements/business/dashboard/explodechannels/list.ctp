<?php
foreach ($following as $value) {
    ?>
    <div class="row user">
        <div class="col-sm-2 avatar">
            <input type="checkbox" name="select-user" />
            <?php
            if (is_null($picture)) {
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $value['User']['username']));
            } else {
                echo $this->Upload->image($user, 'User.picture', array(), array('id' => 'user_avatar', 'onerror' => 'imgError(this,"avatar");', 'alt' => $value['User']['username']));
            }
            ?>
        </div>
        <div class="col-sm-3">
            <a href="user-profile.html" class="name"><?= $value['User']['username'] ?></a>
        </div>
        <div class="col-sm-3">
            <div class="email">john.smith@gmail.com</div>
        </div>
        <div class="col-sm-2">
            <div class="total-spent">
                $3,150.00
            </div>
        </div>
        <div class="col-sm-2">
            <div class="created-at">
                Feb 22, 2014
            </div>
        </div>
    </div>
    <?php
}
?>