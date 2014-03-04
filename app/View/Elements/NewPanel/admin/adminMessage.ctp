<table class="table table-striped">
                        <thead>
						<span class="label label-info">Messages</span>
                            <tr>
                                <th><?php echo $this->Paginator->sort('msg_id','#',array('direction' => 'desc')); ?></th>
								<th>uid</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php foreach ($messages as $message):
						$id=$message['Message']['msg_id'];
						$uid_fk=$message['Message']['uid_fk'];
						$messagess=$message['Message']['message'];
                        ?>
                            <tr>
                                <td><?php echo $id;?></td>
								<td><?php echo $uid_fk;?></td>
                                <td><?php echo $messagess;?></td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>