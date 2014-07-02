<?php
foreach ($followers as $value) {
    if (Configure::read('Domain.type') == 'subdomain') {
        $userlink = $this->Html->url('http://' . $value['User']['seo_username'] . '.' . $_SERVER['HTTP_HOST']);
    } else {
        $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($value['User']['id'])));
    }
    $name = $value['User']['username'];
    $followers = $value['User']['Userstat']['subscribeto'];
    $following = $value['User']['Userstat']['subscribe'];
    $games = $value['User']['Userstat']['uploadcount'];
    ?>
    <div class="row user">
        <div class="col-sm-2 avatar">
            <input type="checkbox" name="select-user" />
            <a href="<?php echo $userlink; ?>" target="_blank">
                <?php
                if (is_null($value['User']['picture'])) {
                    $avatarImage = $this->requestAction(array('controller' => 'users', 'action' => 'randomAvatar'));
                    echo $this->Html->image('/img/avatars/' . $avatarImage . '.jpg', array('alt' => $name));
                } else {
                    echo $this->Upload->image($value, 'User.picture', array(), array('onerror' => 'imgError(this,"avatar");', 'alt' => $name));
                }
                ?>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="<?php echo $userlink; ?>" class="name">
                <?php echo $name; ?>
            </a>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $followers; ?>
            </div>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $following; ?>
            </div>
        </div>
        <div class="col-sm-1 col-sm-offset-1 text-right">
            <div class="total-spent">
                <?php echo $games; ?>
            </div>
        </div>
    </div>
    <?php
}
?>