<link type="text/css" rel="stylesheet" href="/css/Addgame.css" />

<div class="content clearfix">
  <div class="channel_left_panel">
    <?php  echo $this->element('channel_user_panel'); ?>
    <?php  echo $this->element('social'); ?>
    <?php echo $this->element('best_channels_left_menu'); ?>
    <?php echo $this->element('categories_left_menu'); ?>
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

<?php echo $this->Form->input('email',array('label'=>false ,'required', 'type' => 'email', 'length' => 100)); ?>

            <span class="form_hint">Proper format "http://someaddress.com/gamepage"</span>
        </li>

        <li>

 <?php echo $this->Form->input('birth_date',array('label'=>'Birth Date:' )); ?>
        </li>

        <li>

 <?php echo $this->Form->input('gender',array('label'=>'Gender:' )); ?>
        </li>

        <li>

 <?php echo $this->Form->input('country_id',array('label'=>'Country:' )); ?>
        </li>



        <li>
            <button class="submit" type="submit">Update Channel</button>
        </li>
    </ul>

</form>




<!-- Add Game UI is up till here -->     

               <div id="channelgames">
                    <div class="clearfix">
                        <div class="channelgame"></div>
              
              <?php 
              if(count($mygames) <= $limit){}
              else{
                echo $this->Html->link('(See All)',array('controller'=>'games','action'=>'toprated'),array('class'=>'seeall')); 
              } ?>
               </div>

                    <div class="sep"></div>

                    <?php if(count($mygames) >= 1){ ?>
                    <ul>
           
                     <li class="clearfix">
                    <?php echo $this->element('mygames_game_box'); ?>
                                                     
                    </li>
            
                    </ul>

                    <?php } 
                    else { ?>

                <div class="alert alert-info channel">You don't have any games yet, your games will show up here</div>
                <?php }?>

                </div>


    </div>
</div>