<?php
foreach ($channel as $value) {
    $followstatus = $this->requestAction(array('controller' => 'subscriptions', 'action' => 'followstatus'), array($value['User']['id']));
    $games_3 = $this->requestAction(array('controller' => 'games', 'action' => 'random_3_game', $value['User']['id']));
    if (!empty($games_3)) {
        echo $this->element('business/dashboard/channelbox', array('user' => $value['User'], 'userstat' => $value['Userstat'], 'status' => $followstatus, 'games' => $games_3));
    }
}
?>