<div class="row users-grid">
    <?php
    foreach ($result as $value) {
        $games_3 = $this->requestAction(array(
            'controller' => 'games',
            'action' => 'random_3_game',
            $value['User']['id']
        ));
        echo $this->element('business/dashboard/channelbox', array(
            'user' => $value['User'],
            'userstat' => $value['Userstat'],
            'status' => $value['followstatus'],
            'games' => $games_3
        ));
    }
    ?>
    <div class="text-center">
        <?php echo $this->element('business/components/pagination') ?>
    </div>
</div>