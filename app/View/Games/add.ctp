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


<?php echo $this->Form->create('Game', array('label'=>false ,'id'=>'addgameform','class'=>'contact_form addgame' ,'type' => 'file'));?>

        <div class="sep"></div>
<span class="required_notification">* Denotes Required Field</span>
    <ul>
  
        <li>
            <label for="name">Game Name:</label>
<?php echo $this->Form->input('name',array('label'=>false ,'maxlength'=>28,'required' ,'placeholder' => 'Metal Slug Brutal 3')); ?>
         </li>

<?php if ($this->Session->read('Auth.User.role') == 0){?>

        <li>
            <label for="website">Game Link:</label>

<?php echo $this->Form->input('link',array('label'=>false ,'div'=>false,'required pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'url', 'maxlength'=>200)); ?>

            <span class="form_hint">Proper format "http://someaddress.com/gamepage"</span>
        </li>

    <?php  } else{?>

          <li>
            <label for="website">Game Link:</label>

<?php echo $this->Form->input('link',array('label'=>false ,'div'=>false,'pattern'=>'(http|https)://.+' ,'placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'url', 'maxlength'=>200)); ?>

            <span class="form_hint">Proper format "http://someaddress.com/gamepage"</span>
        </li>
      
        <li>
            <label for="website">Game Embed:</label>

          <?php echo $this->Form->input('embed',array('label'=>false ,'div'=>false, 'pattern'=>'(<iframe|<embed|<object).+.(</iframe>|</embed>|</object>)' ,'type' => 'textarea','cols'=>'40','rows'=>'5' ,'placeholder' => 'Paste your game code here please','maxlength'=>1000, 'title'=>'Only <embed> , <iframe> and <object> tags are available and the game code must be starting from one of the tags and ending with the same tag. Ex: <embed> some code </embed>')); ?>


            <span class="form_hint">Must be one of the forms -> iframe, embed, object. Only embed , iframe and object tags are available and the game code must be starting from one of the tags and ending with the same tag."</span>
        </li>



      
      <?php } ?>



        <li>
            <label for="message">Game Description:</label>

<?php  echo $this->Form->input('description',array('label'=>false,'div'=>false,'maxlength'=>400,'required','placeholder' => 'Describe the game you share please','type' => 'textarea','cols'=>'40','rows'=>'5' )); ?>

            <span class="form_hint">recommendation : "your description must be between 50-300 chars please"</span>
        </li>
        <li>

 <?php echo $this->Form->input('category_id',array('label'=>'Select Category:' )); ?>
        </li>

        <li>
        <label for="picture">Game Picture:</label>

         <input placeholder="not yet" required type="file" name="data[Game][picture]" accept="image/gif,image/jpg,image/png,image/jpeg"  size="100">
         <a> 640x350 pixel high quality</a>
        </li>

<li>
  <?php

      echo $this->Recaptcha->show(array(
        'theme' => 'white',
        'lang' => 'en',
      ));
  
      echo $this->Recaptcha->error();

  ?>
</li>

        <li>
            <button class="submit" type="submit">Submit Game</button>
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

                <div class="alert alert-info channel">You don't have any published games yet, your published games will show up here</div>
                <?php }?>

                </div>


    </div>
</div>
