
</br></br></br></br></br>
<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'addgameform','class'=>'contact_form addgame' ,'type' => 'file'));?>

        <div class="sep"></div>
<span class="required_notification">* Denotes Required Field</span>
    <ul>
  
        <li>
            <label for="name">Username:</label>
<?php echo $this->Form->input('username',array('label'=>false ,'required','placeholder' => 'username')); ?>
         </li>
        <li>
            <label for="website">password:</label>

<?php echo $this->Form->input('password',array('label'=>false ,'required' ,'placeholder' => 'password','type' => 'password')); ?>

            <span class="form_hint">Proper format "http://someaddress.com/gamepage"</span>
        </li>
        <li>
            <label for="message">Auto Login:</label>

            <?php echo $this->Form->input('auto_login', array('type' => 'checkbox', 'label' => 'Log me in automatically?')); ?>
        </li>


        <li>
            <button class="submit" type="submit">Login</button>
        </li>
    </ul>

</form>


