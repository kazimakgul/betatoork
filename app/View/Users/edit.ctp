<link type="text/css" rel="stylesheet" href="/css/Addgame.css" />

<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('channel_user_panel'); ?>
    
  </div>
  <div class="right_panel">

  <!-- Add Game UI is here-->  


<?php echo $this->Form->create('User', array('label'=>false ,'id'=>'addgameform','class'=>'contact_form addgame' ,'type' => 'file'));?>

        <div class="sep"></div>
<span class="required_notification">* Denotes Required Field</span>
    <ul>
  
        <li>
            <label for="name">Username:</label>
<?php echo $this->Form->input('username',array('label'=>false ,'required','placeholder' => 'Ex: GameMonster')); ?>
         </li>
        <li>
            <label for="website">Email:</label>

<?php echo $this->Form->input('email',array('label'=>false ,'div'=>false, 'required', 'readonly', 'length' => 100)); ?>

            <span class="form_hint">You are not allowed to change your email."</span>
        </li>

        <li>

 <?php echo $this->Form->input('birth_date', array('type' => 'date', 
'label' => 'Birthday:', 'empty' => false, 'minYear' => date('Y')-60, 
'maxYear' => date('Y')-10)); ?> 


        </li>

        <li>

 <?php $item_list = array('f'=>'Female','m'=>'Male'); 
 echo $this->Form->input('gender', array(  
                                'type'=>'select',  
                                'options'=>array($item_list),  
          'label'=>'Gender:',  
          'empty'=>'Choose Gender...',)  
             ); 


 ?>
        </li>

        <li>

 <?php echo $this->Form->input('country_id',array('label'=>'Country:' )); ?>
        </li>


         <li>
        <label for="picture">Avatar:</label>

         <input placeholder="not yet" type="file" name="data[User][edit_picture]" accept="image/jpg,image/png,image/jpeg"  size="60">
        </li>


        <li>
            <button class="submit" type="submit">Update Channel</button>
        </li>
    </ul>

</form>




<!-- Add Game UI is up till here -->     

               

                   

                 

               


    </div>
</div>