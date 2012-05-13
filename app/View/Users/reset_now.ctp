<link type="text/css" rel="stylesheet" href="/css/Addgame.css" />

<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('unlogged_user_panel'); ?>
    
  </div>
  <div class="right_panel">

  <!-- Add Game UI is here-->  


<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'addgameform','class'=>'contact_form addgame' ,'type' => 'file'));?>

        <div class="sep"></div>
<span class="required_notification">* Denotes Required Field</span>
    <ul>
  
        <li>
            <label for="name">New Password:</label>

<?php echo $this->Form->input('new_password',array('label'=>false,'div'=>false  ,'required pattern'=>'[^\f\n\r\t\v\u00A0\u2028\u2029]{6,}','placeholder' => 'Must be at least 6 characters long','type'=>'password', 'title'=>"Please use at least 6 characters, only letters,numbers and specials, do not use any space" )); ?>
		<span class="form_hint">Try to make a hard to guess password by mixing numbers,letters and special characters"</span>
         </li>
        <li>
            <label for="website">Confirm New Password:</label>

<?php echo $this->Form->input('confirm_new_password',array('label'=>false ,'div'=>false ,'required pattern'=>'[^\f\n\r\t\v\u00A0\u2028\u2029]{6,}','placeholder' => 'Must be at least 6 characters long','type'=>'password', 'title'=>"Please use at least 6 characters, only letters,numbers and specials, do not use any space" )); ?>

            <span class="form_hint">Try to make a hard to guess password by mixing numbers,letters and special characters"</span>
        </li>


        <li>
            <button class="submit" type="submit">Submit</button>
        </li>
    </ul>

</form>




<!-- Add Game UI is up till here -->     


    </div>
</div>
