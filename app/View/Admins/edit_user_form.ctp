<div id="adminform">

<div style='width:100%; margin-bottom:10px;'>

<!--Change Avatar Thumb begins-->
<div class="span2 fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new img-polaroid" style="width: 90px; max-height: 120px;">
    
  <?php 
    if($user[0]['User']['picture']==null) {
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'90',"alt" => "toork avatar image","id" => "user_avatar")).'poo'; 
    } else {
      echo $this->Upload->image($user[0],'User.picture',array(),array('width'=>'90','align'=>'middle','title'=>'profile','alt'=>'profile',"id" => "user_avatar",'onerror'=>'imgError(this,"avatar");'));
       }
  ?>

    </div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 90px; height: 120px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <a id="opencheck" data-toggle="modal" data-target="#pictureChange" href="#"><span class="fileupload-new"><i class="elusive-edit"></i></span></a>
  </span>
  </div>
</div>
<!--Change Avatar Thumb ends-->

</div><!--Extra div ends ends-->


<br>


<a id="opencheck2" data-toggle="modal" data-target="#coverChange" href="#"><span><i class="elusive-edit"></i>Change Cover</span></a>

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
<input name="user_username" placeholder="Ex: GameMonster" class="grd-white user_username" data-validate="{required: true, messages:{required:&quot;Please enter field required&quot;}}" id="required" type="text" value="<?php echo $user[0]['User']['username'];?>">                                                                </div>
                                                            </div>
															
														
														
													<div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Email</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="elusive-user"></i></span>
<input name="user_email" placeholder="Email adress." class="grd-white user_email" data-validate="{required: true, messages:{required:&quot;Please enter field required&quot;}}" id="required" type="text" value="<?php echo $user[0]['User']['email'];?>">                                                                </div>
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


                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Verified</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="elusive-user"></i></span>
<input name="user_verify" class="grd-white user_verify" type="checkbox" <?php if($user[0]['User']['verify']==1){echo 'checked';} ?>>                                                                </div>
                                                            </div>  	
															
                                                       

                                     
                                                            <div class="form-actions">
                                                                <button type="button" onclick="submit_user(<?php echo $user[0]['User']['id'];?>);" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>





<!-- Avatar Change Modal begins -->
    <div class="modal fade" id="pictureChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                
                <?php 
                $avatar_image_url=$this->Html->url(array('controller'=>'uploads','action'=>'index','avatar_image',$user[0]['User']['id']));
                $url=$avatar_image_url;
                ?>
                <iframe id='avatarframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
                
            </div>
        </div>
    </div>
    <!-- Avatar Change Modal ends -->
    
    <!-- Cover Change Modal begins -->
    <div class="modal fade" id="coverChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                <?php 
                $avatar_image_url=$this->Html->url(array('controller'=>'uploads','action'=>'index','cover_image',$user[0]['User']['id']));
                $url=$avatar_image_url;
                ?>
                <iframe id='coverframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
            </div>
        </div>
    </div>
    <!-- Cover Change Modal ends -->



													
</div><!-- Adminform closed-->													