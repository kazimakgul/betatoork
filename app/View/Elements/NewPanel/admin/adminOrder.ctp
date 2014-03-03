<?php 

foreach ($orders as $order): ?>


<?php
$clonebot_id=$order['Order']['clonebot_id'];echo '<br>';
$user=$order['User']['username'];echo '<br>';
$action_id=$order['Order']['action_id'];echo '<br>';
$done=$order['Order']['done'];echo '<br>';
$date=$order['Order']['date'];echo '<br>';

echo 'Bot_id:'.$clonebot_id.'Username:'.$user.'Action_id:'.$action_id.'Done:'.$done.'Date:'.$date;
?>
												
			<?php endforeach; ?>		