<?php $toprated=$this->Html->url(array("controller" => "games","action" =>"toprated2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<div class="well well-small">
    <div class="box-header corner-top">
                                            <div class="header-control">
                                            <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
                                                
                                            </div>
                                            
                                        </div>
  <h1>Get more favorite games</h1>
  <p>When ever you find a game you like just hit favorite to add it on your favorite list down here.</p>
  <p>
    <a href="<?php echo $toprated; ?>" class="btn btn-info btn-large">
      <i class="elusive-compass"></i> Find Games
    </a>
  </p>
</div>

<ul class="thumbnails">

<?php  echo $this->element('NewPanel/myfavorite_box'); ?>

</ul>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->