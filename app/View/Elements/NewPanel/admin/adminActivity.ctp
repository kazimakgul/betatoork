<table class="table table-striped">
                        <thead>
						<span class="label label-info">Activities</span>
                            <tr>
                                <th><?php echo $this->Paginator->sort('id','#',array('direction' => 'desc')); ?></th>
                                <th>Performer id</th>
                                <th>Channel Id</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php foreach ($activities as $activity):
						$id=$activity['Activity']['id'];
						$performer_id=$activity['Activity']['performer_id'];
                        $channel_id=$activity['Activity']['channel_id'];
						$created=$activity['Activity']['created'];
                        ?>
                            <tr>
                                <td><?php echo $id;?></td>
								<td><?php echo $performer_id;?></td>
                                <td><?php echo $channel_id;?></td>
								<td><?php echo $created;?></td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>