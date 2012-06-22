<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('unlogged_user_panel'); ?>
    
  </div>
  <div class="right_panel">

  <!-- Add Game UI is here-->  


<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'addgameform','class'=>'contact_form forgetpass' ,'type' => 'file'));?>

        <div class="sep"></div>
<span class="required_notification">* Denotes Required Field</span>
    <ul>
  
        <li>
            <label for="website">Email:</label>

<?php echo $this->Form->input('email',array('label'=>false ,'div'=>false, 'required pattern'=>
'[aA-zZ0-9._%+-]+@[aA-zZ0-9.-]+\.[aA-zZ]{2,4}'
,'placeholder'=>'me@example.com', 'type' => 'email', 'length' => 100)); ?>

            <span class="form_hint">Write your registered email address"</span>
        </li>


        <li>
            <button class="submit" type="submit">Send Me Reset Link</button>
        </li>
    </ul>

</form>




<!-- Add Game UI is up till here -->     


    </div>
</div>
