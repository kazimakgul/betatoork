<?php foreach ($followers as $value) { ?>
    <div class="user col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <a href="#">
            <?php
            if (is_null($value['User']['picture'])) {
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name));
            } else {
                echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name));
            }
            ?>
        </a>
        <div class="name"><?= $value['User']['username'] ?></div>
        <div class="email">john.smith@gmail.com</div>
    </div>
<?php } ?>