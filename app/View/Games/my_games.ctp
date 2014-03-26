<?php 
$addgame=$this->Html->url(array("controller" => "games","action" =>"add3"));
$dashboard=$this->Html->url(array("controller" => "games","action" =>"dashboard"));
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">                      
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
<div class="raw-fluid span12">
<div style="background-color:white;" class=" shadow well well-small span5">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4>Add a game to your account</h4>
  <p>Adding a game to your account is as simple as doing copy/paste. Just find a web page where you play a game. That's all.</p>
  <p>
     <a rel="tooltip" data-placement="bottom" data-original-title="Add a Game" href="<?php echo $addgame; ?>" class="btn btn-danger" style="margin:0px 3px 5px 0px;">
        <i class="elusive-plus"></i> Add Game
    </a>
     <a style="margin:0px 3px 5px 0px;" rel="tooltip" id="ratebarchain" data-toggle="popover" data-placement="bottom" data-html="true" title="How to Clone?" data-original-title="How to Clone?" class="btn btn-success" data-content='
                       <p class="alert alert-info" STYLE="font-size:10pt;">
                            <i class="elusive-info-sign"></i> While you are playing a game you will see the <a class="btn btn-success btn-mini"><i class="elusive-map-marker"></i><i class="elusive-resize-horizontal"></i><i class="elusive-tint"></i></a> clone button at the bottom of the page on the rating bar.
                      </p>

                        <p>
 <i class="elusive-info-sign"></i> If you clone a game, a clone of the game will be created in your games section and you will be able to edit the game as you wish.
                        </p>

                       <a href="<?php echo $dashboard; ?>" class="btn btn-danger btn-small btn-block">
                            <div class="helper-font-16">
                            <i class="elusive-circle-arrow-right"> Play a Game</i>
                            </div>
                        </a>
                        <p STYLE="font-size:10pt;">
                          Its the easy way of adding a game to your channel.</p>
                  '>
        <i class="elusive-map-marker"></i><i class="elusive-resize-horizontal"></i><i class="elusive-tint"></i> Clone
    </a>
  </p>

</div>

<div style="background-color:white;" class="shadow alert alert-info span7">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4 style="margin:0px 0px 10px 0px;"><i class="elusive-info-sign"></i> Tips and Tricks</h4>
  <p><i class="elusive-ok-sign"></i> You can edit the games after you add them.</p>
  <p><i class="elusive-ok-sign"></i> Change the picture of the game if it doesnt fit your needs.</p>
  <p><i class="elusive-ok-sign"></i> You can also change the name and description of the game.</p>
  <p><i class="elusive-ok-sign"></i> Finally, share games with your social networks, to reach more people.</p>

</div>
</div>

<ul class="thumbnails" id="thumbnails_area">
<?php  echo $this->element('NewPanel/gamebox/mygames_box'); ?>
</ul>

 <?php if($mygames!=NULL){ ?>   
	<!--Hidden Pagination -->
    <div class="pagination pagination-centered">
        <ul>
            <li><?php echo $this->Paginator->prev(__('Prev', true), array(), null, array('class'=>'disabled'));?></li>
            <li><?php echo $this->Paginator->numbers(); ?></li>
            <li><?php echo '  '.$this->Paginator->next(__('Next', true), array('id'=>'next'), null, array('class' => 'disabled'));?></li>
        </ul>
        <div style="opacity:0.5;">
            <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} games out of {:count} total')));?>
        </div>
    </div>
    <!--Hidden Pagination -->
<?php } ?>


                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>                        
                    </div><!-- /content -->
                </div><!-- /span content -->