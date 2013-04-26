                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
<div class="well well-small">
<div class="row-fluid">
    <div class="span2">
        <div class="thumbnails">
         
            <a href="#">
                    <?php 
                    $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'img-polaroid','width'=>'90',"alt" => "toork avatar image")); 

                    ?>
            </a>
          
        </div>
        <h4><?php echo $catName; ?></h4>
        <i class="elusive-plus-sign color-blue"></i>         <?php
        echo $this->Paginator->counter(array(
        'format' => __('{:count}')
        ));
        ?> Games
    </div>
    <div class="span10 thumbnails pull-right">
        <img data-src="holder.js/745x200"class="img-polaroid">
        <p><strong><?php echo $description_for_layout?></strong></p>
    </div>
</div>
</div>


                                <ul class="thumbnails">
                                    <?php  echo $this->element('NewPanel/gamebox/dashboard_game_box'); ?>
                                </ul>


                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->