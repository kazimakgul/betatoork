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
<?php echo $this->Form->create('Game', array('label'=>false ,'id'=>'addgameform','class'=>'addgame' ,'type' => 'file'));?>

                    <div class="sep"></div>
                    <ul>
                        <li class="clearfix">
                            <p class="firstcol">Game Name</p>
                            <p>:</p>
                            <div class="clearfix">
                                <div class="inputleft"></div>
                                <div class="inputmid">
 
<?php echo $this->Form->input('name',array('label'=>false ,'id'=>'txtgamename','required','placeholder' => 'Metal Slug Brutal 3')); ?>
                                </div>
                                <div class="inputright"></div>
                            </div>   
                        </li>
                        <li class="clearfix">
                            <p class="firstcol">Game Link</p>
                            <p>:</p>
                            <div class="clearfix">
                                <div class="inputleft"></div>
                                <div class="inputmid">
      
<?php echo $this->Form->input('link',array('label'=>false ,'id'=>'txtgamename' ,'required','placeholder' => 'http://www.socialesman.com/msb3.html','type' => 'text', 'length' => 100)); ?>
                                </div>
                                <div class="inputright"></div>
                            </div>   
                        </li>                        
                        <li class="clearfix">
                            <p class="firstcol">Game Category</p>
                            <p>:</p>
                            <div class="clearfix">
                                <div class="inputleft"></div>
                                <div class="dropselect">
      
  <?php echo $this->Form->input('category_id',array('label'=>false ,'id'=>'selectCategory1','class'=>'CategoryPri')); ?>
                                     
                                </div>
                                <div class="inputright"></div>                                        
                            </div>                                       
                        </li>
                        <li class="clearfix">
                            <p class="firstcol">Game Slider Photo (640 x 350)</p>
                            <p>:</p>
                            <div class="thirdcol clearfix">
                                <div class="inputleft"></div>
                                <div class="inputmid">
                                    <input id="txtfakeslider" class="txtfakefile" type="text" />
                                </div>
                                <div class="inputright"></div>
                                <a href="javascript:void();" class="browse"></a>
<?php echo $this->Form->input('Game.picture', array('label'=>false ,'id'=>'fileslide','class'=>'file' ,'type' => 'file','size'=>'73','onchange'=>"javascript:$('#txtfakeslider').val($('#fileslide').val());")); ?>                               
                                                   
                            </div>   
                        </li>
                        <li class="clearfix">
                            <p class="firstcol">Description</p>
                            <p>:</p>
                            <div class="thirdcol clearfix">
                                <div class="textareaup"></div>
                                <div class="textareamid">
<?php  echo $this->Form->input('description',array('label'=>false ,'id'=>'txt_desc' ,'required','placeholder' => 'Write few words about the game please','type' => 'textarea')); ?>                              
                                
                                </div>
                                <div class="textareadown"></div>                                        
                            </div>
                        </li>
                        <li>

                       
                      <input type="submit" value="" class="add"/>
                      </form>
                    
                        </li>
                    </ul>
              

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
