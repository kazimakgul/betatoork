<div class="row users-list">
    <div class="col-md-12">
        <div class="row headers">
            <div class="col-sm-3 header select-users">
            </div>
            <div class="col-sm-3 header hidden-xs">
                <label><?php echo $this->Paginator->sort('User.username', 'Name', array('direction' => 'asc')) ?></label>
            </div>
            <div class="col-sm-1 col-sm-offset-1 header hidden-xs">
                <label><a href="#">Followers</a></label>
            </div>
            <div class="col-sm-1 col-sm-offset-1 header hidden-xs">
                <label><a href="#">Following</a></label>
            </div>
            <div class="col-sm-1 col-sm-offset-1 header hidden-xs">
                <label class="text-right"><a href="#">Games</a></label>
            </div>
        </div>
        <?php
        foreach ($result as $value) {
            $name = $value['User']['username'];
            $userid = $value['User']['id'];
            $publicname = $value['User']['username'];
            //$followstatus = $this->requestAction(array('controller' => 'subscriptions', 'action' => 'followstatus'), array($userid));
            $followers = $value['Userstat']['subscribeto'];
            $following = $value['Userstat']['subscribe'];
            $games = $value['Userstat']['uploadcount'];
            if ($_SERVER['HTTP_HOST'] != "127.0.0.1" && $_SERVER['HTTP_HOST'] != "localhost") {
                $userlink = $this->Html->url('http://' . $value['User']['seo_username'] . '.' . $pure_domain);
            } else {
                $userlink = $this->Html->url(array("controller" => 'businesses', "action" => 'mysite', h($userid)));
            }
            ?>
            <div class="row user">
                <div class="col-sm-2 followcolumn">
                    <?php echo $this->element('buttons/follow', array('id' => $userid, 'name' => $publicname, 'follow' => $value['followstatus'])) ?>
                </div>
                <div class="col-sm-1 avatar">
                    <a href="<?php echo $userlink ?>" target="_blank">
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
                <div class="col-sm-3">
                    <a href="<?php echo $userlink; ?>" class="name">
                        <?php echo $name ?> 
                        <?php if ($value['User']['verify'] == 1) { ?>
                            <span class="help" data-toggle="tooltip" title="" data-original-title="Verified channel."> <i style='color:#428bca;' class="fa fa-check-circle"></i></span>
                        <?php } ?>

                    </a>
                </div>
                <div class="col-sm-1 col-sm-offset-1 text-right">
                    <div class="total-spent">
                        <?php echo $followers ?>
                    </div>
                </div>
                <div class="col-sm-1 col-sm-offset-1 text-right">
                    <div class="total-spent">
                        <?php echo $following ?>
                    </div>
                </div>
                <div class="col-sm-1 col-sm-offset-1 text-right">
                    <div class="total-spent">
                        <?php echo $games ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="text-center">
            <?php echo $this->element('business/components/pagination') ?>
        </div>
    </div>
</div>