<?php $this->Html->css('change_pass', null, array('inline' => false));?>

<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('channel_user_panel'); ?>
    
  </div>
  <div class="right_panel">

  <!-- Add Game UI is here-->  


<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'addgameform','class'=>'contact_form changepass' ,'type' => 'file'));?>

        <div class="sep"></div>
<span class="required_notification">* Denotes Required Field</span>
    <ul>
  
        <li>
            <label for="name">Current Password:</label>
<?php echo $this->Form->input('old_password',array('label'=>false ,'required','placeholder' => 'Write your current password','type'=>'password')); ?>
         </li>
        <li>
            <label for="website">New Password:</label>

<?php echo $this->Form->input('new_password',array('label'=>false ,'required pattern'=>'[^\f\n\r\t\v\u00A0\u2028\u2029]{6,}','placeholder' => 'Must be at least 6 characters long','type'=>'password', 'title'=>"Please use at least 6 characters, only letters,numbers and specials, do not use any space" )); ?>

            <span class="form_hint">Proper format "http://someaddress.com/gamepage"</span>
        </li>

        <li>

 <?php echo $this->Form->input('confirm_new_password',array('label'=>'Confirm Password' ,'required pattern'=>'[^\f\n\r\t\v\u00A0\u2028\u2029]{6,}','placeholder' => 'Must be same as above','type'=>'password','title'=>"Please use at least 6 characters, only letters,numbers and specials, do not use any space")); ?> 


        </li>


        <li>
            <button class="submit" type="submit">Change Password</button>
        </li>
    </ul>

</form>




<!-- Add Game UI is up till here -->     


    </div>
</div>
