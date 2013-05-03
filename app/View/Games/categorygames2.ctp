                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<div class="well well-small shadow-black" style=" padding-bottom:0px; 


background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://mattandcathavebackissues.com/wp-content/themes/pandora/images/ban3.jpg);

background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://mattandcathavebackissues.com/wp-content/themes/pandora/images/ban3.jpg); /* Safari 4+, Chrome 2+ */  

background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://mattandcathavebackissues.com/wp-content/themes/pandora/images/ban3.jpg); /* FF 3.6+ */  

">

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
        <h4 style="font-family: 'Merriweather Sans', sans-serif; font-size: 18px; color:white; text-shadow: 1px 1px black;"><?php echo $catName; ?></h4>
        <h5><i class="elusive-plus-sign color-blue"></i> 
            <?php echo $this->Paginator->counter(array( 'format' => __('{:count}')));?> Games </h5>
    </div>

    <div class="span10 pull-right " style="padding-top:170px;">
        <p style="background: rgba(255, 255, 255, 0.3);"><strong><?php echo $description_for_layout?></strong></p>
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