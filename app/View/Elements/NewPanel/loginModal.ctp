<div class="modal hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">x</button>
    <h3>Login to Toork.com</h3>
  </div>
  <div class="modal-body">


<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'sign-in','method'=>'post'));?>
<p>Email / Username</p>
      <div class="input-prepend">
        <span class="add-on"><i class="elusive-user"></i></span>
<?php echo $this->Form->input('username',array('label'=>false,'div'=>false,'type'=>'text','style'=>'width: 300px;','id'=>'prependedInput')); ?>
      </div>
<p>Password</p>
      <div class="input-prepend">
        <span class="add-on"><i class="elusive-lock"></i></span>
<?php echo $this->Form->input('password',array('label'=>false,'div'=>false,'style'=>'width: 300px;','id'=>'prependedInput','required' ,'type' => 'password')); ?>
      </div></br>
<?php echo $this->Form->input('remember', array('label'=>false ,'div'=>false,'type'=>'checkbox','style'=>"float: left; margin-right: 10px;",'name'=>'remember_me','id'=>'user_remember_me','value'=>0, 'checked')); ?> 
                    <label class="string optional" for="user_remember_me"> Remember me</label>
                    <input class="btn btn-success span2"type="button" name="commit" id="t_mobile_login_btn" value="Sign In" />
                    <a href="#modal-recover" style="opacity:0.5;" data-toggle="modal" data-dismiss="modal">Forgot Password?</a>
                </form>
  </div>
  <div class="modal-footer">
    New To Toork.com?
    <a href="<?php echo $index; ?>" class="btn">Register</a>
  </div>
</div>