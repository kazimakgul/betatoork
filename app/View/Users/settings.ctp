<?php
$password=$this->Html->url(array("controller" => "users","action" =>"password2",$this->Session->read('Auth.User.id')));
$profilepublic=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>''));
$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
$username = $user['User']['seo_username'];
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<?php  echo $this->element('NewPanel/resendPassword'); ?>

<div class="well shadow-black" style="background-color:white;">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab"><i class="elusive-user"></i> Profile</a></li>
      <li><a href="#profile" data-toggle="tab"><i class="elusive-thumbs-up color-blue"></i> Socials</a></li>
      <li><a href="#notifications" data-toggle="tab"><i class="elusive-envelope color-green"></i> Notifications</a></li>
      <li><a href="#password" data-toggle="tab"><i class="elusive-lock color-red"></i> Password</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'tab','class'=>'form-horizontal' ,'type' => 'file'));?>

<div class="raw-fluid">
<div class="span2 fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new img-polaroid" style="width: 90px; max-height: 120px;">
    
  <?php 
  if($user['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'90',"alt" => "toork avatar image","id" => "user_avatar")); 
    } else {
      echo $this->Upload->image($user,'User.picture',array(),array('width'=>'90','align'=>'middle','title'=>'profile','alt'=>'profile',"id" => "user_avatar",'onerror'=>'imgError(this,"avatar");'));
	   }
  ?>

    </div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 90px; height: 120px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">
        <a data-toggle="modal" data-target="#pictureChange" href="#"><span class="fileupload-new"><i class="elusive-edit"></i></span></a>
  </span>
  </div>
</div>

<div class="span8 fileupload fileupload-new" data-provides="fileupload" style="margin:0px 0px 0px 0px;">
  <div class="fileupload-new img-polaroid" style="width: 745px; height: 200px; padding-bottom:0px;">
	  
	  <?php 
  if($user['User']['banner']==null) { ?>
    
  <div id='user_cover' style="width: 745px; height: 200px;  padding-bottom:0px;background: url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);"></div>

   <?php } else {?>

<div id='user_cover' style="width: 745px; height: 200px; padding-bottom:0px;background: url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$user['User']['banner'];?>); "></div>

	 <?php  }
      ?>
	  
  </div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 745px; height: 200px; line-height: 20px;"></div>
  <div>
    <span rel="tooltip" data-placement="bottom" data-original-title="Add Image" data-toggle="modal" data-target="#coverChange" href="#" style="margin:-80px 0px 0px 10px;" class="btn btn-small btn-success btn-file">Change Background </span>


     <a rel="tooltip" id="imageinfo" data-toggle="popover" style="margin:-80px 30px 0px 10px;" title="Picture Specs Info" data-placement="bottom" data-original-title="Game Image Info" class="btn btn-small" data-html="true" data-content='If you want to add an image background, For the best experience try <strong>1000*300</strong>px image. You can always add a pattern background image which is going to be repeated. Try a <strong>100*100</strong>px pattern background image. Any image size is always welcome. '><i class="elusive-info-sign"></i></a>

  </div>
</div>
</div>
</br>

                                                        <fieldset>
                                                            
<?php echo $this->Form->input('fb_link',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'input-xlarge','id'=>'inputDisabled','readonly','type'=>'hidden')); ?>
<?php echo $this->Form->input('twitter_link',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'input-xlarge','id'=>'inputDisabled','readonly','type'=>'hidden')); ?>
<?php echo $this->Form->input('gplus_link',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'input-xlarge','id'=>'inputDisabled','readonly','type'=>'hidden')); ?>
															

                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Screen Name</label>
                                                                <div class="controls">
                                                                    <span class="add-on"><i class="elusive-user"></i></span>
<?php echo $this->Form->input('screenname',array('label'=>false,'div'=>false ,'placeholder' => 'Its your visible name.','type'=>'text','class'=>'grd-white','data-validate'=>'{required: true, messages:{required:"Please enter field required"}}','id'=>'required')); ?>
                                                                </div>
                                                            </div>
			
                                                            <div class="control-group  input-prepend">
                                                                <label class="control-label" for="required">Channel Name</label>
                                                                <div class="controls">
                                                                    <span class="add-on">clone.gs/</span>
<?php echo $this->Form->input('username',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'grd-white','data-validate'=>'{required: true, messages:{required:"Please enter field required"}}','id'=>'required','disabled')); ?>
                                                                </div>
                                                            </div>
                                                            <div class="pull-right span5"> <p style="padding:6px;" class="btn btn-link label label-important helper-font-16"><a href="<?php echo $profilepublic;?>">@<?php echo $username; ?></a></p>
                                                          </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputEditorSimple">Channel Description</label>
                                                            <div class="controls">

<?php  echo $this->Form->input('description',array('label'=>false,'div'=>false,'maxlength'=>280,'placeholder' => 'Describe your channel please.    Ex: Everything related to Starwars! Our channel is all about starwars and games.','type' => 'textarea','class'=>'span8','rows'=>'6','id'=>'inputEditorSimple' )); ?>

                                                            </div>
                                                        </div>
  <?php if ($this->Session->read('Auth.User.role') == 0){
      }else{
?> 
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputEditorSimple">Ads Code</label>
                                                            <div class="controls">

<?php echo $this->Form->input('adcode',array('label'=>false ,'div'=>false,'placeholder'=>'This is your advertisement code place. You can just paste your google adsense code or any other advertisement company code here.' ,'type'=>'textarea','class'=>'span8','rows'=>'6','length' => 1000)); ?>

                                                            </div>
                                                        </div>
<?php } ?>
                                                       <!-- <div class="control-group">
                                                            <label class="control-label" for="inputUpload">Channel Avatar</label>
                                                            <div class="controls">
<input placeholder="not yet" type="file" name="data[User][edit_picture]" accept="image/gif,image/jpg,image/png,image/jpeg" data-form="uniform" id="inputUpload" size="100">
                                                            </div> <p> * Picture size must be 90x120 pixel</p>
                                                        </div>-->

                                                            <div class="well control-group">
                                                                <label class="control-label" for="url">My Website</label>
                                                                <div class="controls">
<?php echo $this->Form->input('website',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://(www.|).+' ,'placeholder' => 'http://www.mywebsite.com','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div><i class='elusive-globe color-red helper-font-32'></i> <p>Just add your website or any other link if you want to link back. You will let your users reach your web page through your Clone channel.</p>
                                                            </div>

                                     
                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
      </div>
      <div class="tab-pane fade" id="profile">

    <p class="alert-success alert">The social connections you add will be shown at your public channel. It is just a simple link to your other social networks. If you are curious about how it is going to look like, just preview your current <a rel="tooltip" data-placement="bottom" data-original-title="<?php echo 'http://clone.gs/'.$user['User']['seo_username'];?>" target="_blank" href="<?php echo $profilepublic;?>"><i class="elusive-user"></i> public channel</a> </p>

<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'tab2','class'=>'form-horizontal' ,'type' => 'file'));?>
                                                        <fieldset>
                                                         
                                                
<?php echo $this->Form->input('username',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'input-xlarge','id'=>'inputDisabled','readonly','type'=>'hidden')); ?>
<?php echo $this->Form->input('screenname',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'input-xlarge','id'=>'inputDisabled','readonly','type'=>'hidden')); ?>
<?php echo $this->Form->input('description',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'input-xlarge','id'=>'inputDisabled','readonly','type'=>'hidden')); ?>
<?php echo $this->Form->input('adcode',array('label'=>false,'div'=>false ,'placeholder' => 'Ex: GameMonster','type'=>'text','class'=>'input-xlarge','id'=>'inputDisabled','readonly','type'=>'hidden')); ?>
<input data-form="uniform" id="inputUpload" type="hidden" name="data[User][banner]" accept="image/gif,image/jpg,image/png,image/jpeg" size="100" />
<input data-form="uniform" id="inputUpload" type="hidden" name="data[User][edit_picture]" accept="image/gif,image/jpg,image/png,image/jpeg" size="100" />
                                                            

                                                            <div class="well control-group">
                                                                <label class="control-label" for="url">Facebook</label>
                                                                <div class="controls">
<?php echo $this->Form->input('fb_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://(www.|)facebook.com/.+' ,'placeholder' => 'http://facebook.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div><i class='elusive-facebook color-blue helper-font-32'></i> <p> Just add your Facebook page link if you have any. You will let your users reach your Facebook page using your Clone channel.</p>
                                                            </div>


                                                            <div class="well control-group">
                                                                <label class="control-label" for="url">Twitter</label>
                                                                <div class="controls">
<?php echo $this->Form->input('twitter_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://(www.|)twitter.com/.+' ,'placeholder' => 'http://twitter.com/thetoork','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div> <i class='elusive-twitter color-blue helper-font-32'></i> <p> Just add your Twitter page link if you have any. You will let your users reach your Twitter page using your Clone channel.</p>
                                                            </div>


                                                            <div class="well control-group">
                                                                <label class="control-label" for="url">Google+</label>
                                                                <div class="controls">
<?php echo $this->Form->input('gplus_link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://(www.|)plus.google.com/.+' ,'placeholder' => 'http://plus.google.com/117184471094869274585','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div> <i class='elusive-googleplus color-red helper-font-32'></i> <p>Just add your Google+ page link if you have any. You will let your users reach your Google+ page using your Clone channel.</p>
                                                            </div>


                                                            <div class="well control-group">
                                                                <label class="control-label" for="url">My Website</label>
                                                                <div class="controls">
<?php echo $this->Form->input('website',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://(www.|).+' ,'placeholder' => 'http://www.mywebsite.com','type' => 'url', 'maxlength'=>100)); ?>
                                                                </div><i class='elusive-globe color-red helper-font-32'></i> <p>Just add your website or any other link if you want to link back. You will let your users reach your web page through your Clone channel.</p>
                                                            </div>

                                                            <div class="form-actions">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </fieldset>
                                                    </form>
      </div>

      <div class="tab-pane fade" id="notifications">

        <h3>Notify Me</h3>

<form>
<table class="table table-condensed table-hover">
  <thead>
    <tr>
      <th class="span1"></th>
      <th class="span3"></th>
      <th class="span9"></th>
      <th class="span2"></th>
    </tr>
  </thead>
  
  <?php if(!isset($user_perms))$user_perms=array(); ?>
  
  <tbody>
    <tr>
      <td><input type="checkbox" name="permission" value="2" <?php if(!in_array(2,$user_perms)) echo 'checked'; ?>> <a href="#"></a></td>
      <td><strong>Follow</strong></td>
      <td>I got a new follower</td>
      <td><span class="label pull-right">Email Me</span></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="permission" value="6" <?php if(!in_array(6,$user_perms)) echo 'checked'; ?>> <a href="#"></a></td>
      <td><strong>Comment</strong></td>
      <td>Comments on a post I created</td>
      <td><span class="label pull-right">Email Me</span></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="permission" value="12" <?php if(!in_array(12,$user_perms)) echo 'checked'; ?>> <a href="#"></a></td>
      <td><strong>Game Comment</strong></td>
      <td>Comments on one of my games</td>
      <td><span class="label pull-right">Email Me</span></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="permission" value="4" <?php if(!in_array(4,$user_perms)) echo 'checked'; ?>> <a href="#"></a></td>
      <td><strong>Rate</strong></td>
      <td>One of my games get rated</td>
      <td><span class="label pull-right">Email Me</span></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="permission" value="7" <?php if(!in_array(7,$user_perms)) echo 'checked'; ?>> <a href="#"></a></td>
      <td><strong>Favorite</strong></td>
      <td>Favorite one of my games</td>
      <td><span class="label pull-right">Email Me</span></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="permission" value="3" <?php if(!in_array(3,$user_perms)) echo 'checked'; ?>> <a href="#"></a></td>
      <td><strong>Clone</strong></td>
      <td>Clone one of my games</td>
      <td><span class="label pull-right">Email Me</span></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="permission" value="5" <?php if(!in_array(5,$user_perms)) echo 'checked'; ?>> <a href="#"></a></td>
      <td><strong>Mention</strong></td>
      <td>Mentions me in a post</td>
      <td><span class="label pull-right">Email Me</span></td>
    </tr>
	<tr>
      <td><input type="checkbox" name="permission" value="8" <?php if(!in_array(8,$user_perms)) echo 'checked'; ?>> <a href="#"></a></td>
      <td><strong>Hashtag</strong></td>
      <td>Someone hashtag my games</td>
      <td><span class="label pull-right">Email Me</span></td>
    </tr>
  </tbody>
</table>

    <div class="form-actions">
        <button type="button" id="savepermissions" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn">Cancel</button>
    </div>

</form>    

      </div>


      <div class="tab-pane fade" id="password">

<div >

  <h3>Change Your Password</h3>
  <p>Please make sure that it is not an easy to remember password. Try to use some numbers and special characters as well.</p>
  <p>
    <a href="<?php echo $password; ?>" class="btn btn-danger btn-large">
      <i class="elusive-lock"></i> Change Password
    </a>
  </p>
</div>


      </div>


  </div>
</div>



                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->
				
				
	<!-- Avatar Change Modal begins -->
    <div class="modal fade" id="pictureChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='display: none;'>
        <div class="modal-dialog" style="width:800px;">
            <div>
                <?php 
				$avatar_image_url=$this->Html->url(array('controller'=>'uploads','action'=>'index','avatar_image',$userid));
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
        $avatar_image_url=$this->Html->url(array('controller'=>'uploads','action'=>'index','cover_image',$userid));
        $url=$avatar_image_url;
        ?>
                <iframe id='coverframe' src="<?php echo $url; ?>" style='width:800px;height:450px; overflow-y: hidden;' scrolling="no"></iframe>
            </div>
        </div>
    </div>
  <!-- Cover Change Modal ends -->