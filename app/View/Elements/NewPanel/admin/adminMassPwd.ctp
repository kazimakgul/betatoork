<?php $selected=0; ?>

<table class="table table-striped">
                        <thead>
						<span class="label label-info">Selected Row:<?php echo $selected; ?></span>
                            <tr>
							    <th></th>
                                <th><?php echo $this->Paginator->sort('id','#',array('direction' => 'desc')); ?></th>
                                <th>Username/id</th>
                                <th>Email</th>
								<th>Seo Username</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php foreach ($users as $user):
						$id=$user['User']['id'];
						$username=$user['User']['username'];
                        $email=$user['User']['email'];
						$seo_username=$user['User']['seo_username'];
                        ?>
                            <tr>
							    <td><input type="checkbox" id="check<?php echo $id;?>" onclick="addmasslist(<?php echo $id;?>);" name="permission" <?php if(in_array($id,$checkedlist)) echo 'checked'; ?>></td>
                                <td><?php echo $id;?></td>
								<td><?php echo $username;?></td>
                                <td><?php echo $email;?></td>
                                <td><?php echo $seo_username;?></td>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>