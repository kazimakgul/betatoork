<?php 
$addgame=$this->Html->url(array("controller" => "games","action" =>"add2"));
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">                      
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
<div class="raw-fluid span12">
<div class="well well-small span5">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4>Add a game to your account</h4>
  <p>Adding a game to your account is as simple as doing copy/paste. Just find a web page where you play a game. That's all.</p>
  <p>
    <a href="<?php echo $addgame; ?>" class="btn btn-danger">
      <i class="elusive-plus-sign"></i> Add Game
    </a>
  </p>
</div>

<div class="alert alert-info span7">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4><i class="elusive-info-sign"></i> Tips and Tricks</h4>
  <p>You can edit the games after you add them.</p>
  <p>Change the picture of the game if it doesnt fit your needs.</p>
  <p>You can also change the name and description of the game.</p>
  <p>Finally, share games with your social networks, to reach more people.</p>

</div>
</div>

<ul class="thumbnails">

<?php  echo $this->element('NewPanel/mygames_box'); ?>

</ul>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->