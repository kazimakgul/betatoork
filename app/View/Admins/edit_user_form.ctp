<div id="adminform">

<br>
<form action="/betatoorkson/users/settings/1594" id="tab" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">


                                                        <fieldset>														

                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Screen Name</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="elusive-user"></i></span>
<input name="user_screen" placeholder="Its your visible name." class="grd-white user_screen" data-validate="{required: true, messages:{required:&quot;Please enter field required&quot;}}" id="required" type="text" value="<?php echo $user[0]['User']['screenname'];?>">                                                                </div>
                                                            </div>
			
                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Channel Name</label>
                                                                <div class="controls">
                                                                    <span class="add-on">clone.gs/</span>
<input name="user_username" placeholder="Ex: GameMonster" class="grd-white user_username" data-validate="{required: true, messages:{required:&quot;Please enter field required&quot;}}" id="required" disabled="disabled" type="text" value="<?php echo $user[0]['User']['username'];?>">                                                                </div>
                                                            </div>
															
														
														
													<div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Email</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="elusive-user"></i></span>
<input name="user_email" placeholder="Email adress." class="grd-white user_email" data-validate="{required: true, messages:{required:&quot;Please enter field required&quot;}}" id="required" disabled="disabled" type="text" value="<?php echo $user[0]['User']['email'];?>">                                                                </div>
                                                            </div>	
															
															
															<div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Role</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="elusive-user"></i></span>
<input name="user_role" placeholder="Role Number" class="grd-white user_role" data-validate="{required: true, messages:{required:&quot;Please enter field required&quot;}}" id="required" type="text" value="<?php echo $user[0]['User']['role'];?>">                                                                </div>
                                                            </div>	
															
															
															<div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Credit</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="elusive-user"></i></span>
<input name="user_credit" placeholder="Bot Credit" class="grd-white user_credit" type="text" value="<?php echo $user[0]['Botcred']['credit'];?>">                                                                </div>
                                                            </div>	
															
															<div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Bot Mode</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="elusive-user"></i></span>
<input name="user_botmode" class="grd-white user_botmode" type="checkbox" <?php if($bot==1){echo 'checked';} ?>>                                                                </div>
                                                            </div>		
															
                                                       

                                     
                                                            <div class="form-actions">
                                                                <button type="button" onclick="submit_user(<?php echo $user[0]['User']['id'];?>);" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
													
</div><!-- Adminform closed-->													