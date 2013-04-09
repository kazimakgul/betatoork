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
        <div>
        <i class="elusive-plus-sign color-red"></i> 27 Followers
        </div>
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

    <div class="well well-small">
        <div class="row-fluid">
            <div class="span3">
                <a class="btn btn-danger">
                  <i class="elusive-plus-sign"></i> Follow
                </a> 
            </div>
            <div class="span4 pull-right">
                <div class="pull-right">

                    <a href="#" style="margin-right:20px;">
                        <i class="icofont-facebook color-blue helper-font-32"></i>
                    </a>
                    <a href="#" style="margin-right:20px;">                     
                        <i class="icofont-pinterest color-red helper-font-32"></i>
                    </a>
                    <a href="#" style="margin-right:20px;">
                        <i class="icofont-twitter color-blue helper-font-32"></i>
                    </a>
                    <a href="#" style="margin-right:20px;">
                        <i class="icofont-google-plus color-red helper-font-32"></i>
                    </a>

            </div>
            </div>
        </div>
    </div>



                                <ul class="thumbnails">
                                    <?php  echo $this->element('NewPanel/dashboard_game_box'); ?>
                                </ul>


                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->