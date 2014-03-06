<table class="table table-striped">
                        <thead>
						<span class="label label-info">SqlLogs</span>
                            <tr>
                                <th><?php echo $this->Paginator->sort('id','#',array('direction' => 'desc')); ?></th>
                                <th>action_ajax_bot	</th>
                                <th>pushactivity_bot</th>
                                <th>pushactivity_botsave</th>
								<th>incscribe</th>
								<th>incscribefast</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php foreach ($logs as $log):
						$id=$log['Log']['id'];
						$action_ajax_bot=$log['Log']['action_ajax_bot'];
                        $pushactivity_bot=$log['Log']['pushactivity_bot'];
						$pushactivity_botsave=$log['Log']['pushactivity_botsave'];
                        $incscribe=$log['Log']['incscribe'];
						$incscribefast=$log['Log']['incscribefast'];
                        ?>
                            <tr>
                                <td><?php echo $id;?></td>
								<td><?php echo $action_ajax_bot;?></td>
                                <td><?php echo $pushactivity_bot?></td>
                                <td><?php echo $pushactivity_botsave;?></td>
                                <td><?php echo $incscribe;?></td>
								<td><?php echo $incscribefast;?></td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>