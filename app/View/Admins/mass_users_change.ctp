<?php foreach ($users as $user):
						$id=$user['User']['id'];
						$username=$user['User']['username'];
                        $email=$user['User']['email'];
						$seo_username=$user['User']['seo_username'];
                        ?>
						
                            <tr style="color:#008FFF;">
							    <td><input type="checkbox" id="check<?php echo $id;?>" onclick="addmasslist(<?php echo $id;?>);" name="permission" <?php if(isset($checkedlist) && in_array($id,$checkedlist)) echo 'checked'; ?>></td>
                                <td><?php echo $id;?></td>
								<td><?php echo $username;?></td>
                                <td><?php echo $email;?></td>
                                <td><?php echo $seo_username;?></td>
                            </tr>
						<?php endforeach; ?>