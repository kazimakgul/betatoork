
</br></br></br></br></br>
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'addgameform','class'=>'contact_form addgame' ,'type' => 'file'));?>

        <div class="sep"></div>
<span class="required_notification">* Denotes Required Field</span>
    <ul>
  
        <li>
            <label for="name">Username/Email:</label>
<?php echo $this->Form->input('username',array('label'=>false ,'div'=>false,'required','placeholder' => 'Username or Email')); ?>
<span class="form_hint">You can login with your channel name or email address.</span>
         </li>
        <li>
            <label for="website">Password:</label>

<?php echo $this->Form->input('password',array('label'=>false ,'div'=>false,'required' ,'placeholder' => 'Password','type' => 'password')); ?>

            <span class="form_hint">Do not share your password on a public place.</span>
        </li>
        <li>
            <label for="message">Auto Login:</label>


            <?php echo $this->Form->input('remember', array('type' => 'checkbox','value'=>0, 'label' => false)); ?>
        </li>


        <li>
            <button class="submit" type="submit">Login</button>
        </li>
    </ul>

</form>


