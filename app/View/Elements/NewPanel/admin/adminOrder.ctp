<table class="table table-striped">
                        <thead>
						<span class="label label-info">Orders-Time Now:<?php echo date('Y-m-d H:i:s'); ?></span>
                            <tr>
                                <th><?php echo $this->Paginator->sort('id','#',array('direction' => 'desc')); ?></th>
                                <th>Bot id</th>
                                <th>Username/id</th>
                                <th>Action id</th>
								<th>Done</th>
								<th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php foreach ($orders as $order):
						$id=$order['Order']['id'];
						$clonebot_id=$order['Order']['clonebot_id'];
                        $user=$order['User']['username'];
						$userid=$order['User']['id'];
                        $action_id=$order['Order']['action_id'];
                        $done=$order['Order']['done'];
                        $date=$order['Order']['date'];
                        ?>
                            <tr>
                                <td><?php echo $id;?></td>
								<td><?php echo $clonebot_id;?></td>
                                <td><?php echo $user.'/'.$userid;?></td>
                                <td><?php echo $action_id;?></td>
                                <td><?php echo $done;?></td>
								<td><?php echo $date;?></td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>