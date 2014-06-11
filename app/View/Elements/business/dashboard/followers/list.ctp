<?php foreach ($followers as $value) { ?>
    <div class="row user">
        <div class="col-sm-2 avatar">
            <input type="checkbox" name="select-user" />
            <?php
            if (is_null($value['User']['picture'])) {
                $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name));
            } else {
                echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name));
            }
            ?>
        </div>
        <div class="col-sm-4">
            <a href="user-profile.html" class="name">
                <?php echo $value['User']['username'] ?>
            </a>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $value['User']['Userstat']['subscribeto'] ?>
            </div>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $value['User']['Userstat']['subscribeto'] ?>
            </div>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $value['User']['Userstat']['uploadcount'] ?>
            </div>
        </div>
    </div>
<?php } ?>