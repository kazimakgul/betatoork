<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
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
  <h1>Follow Best Channels</h1>
  <p>Find a good channel you like and follow them to get the latest news and games from them.</p>
  <p>
    <a href="<?php echo $bestchannel; ?>" class="btn btn-success btn-large">
      <i class="elusive-plus-sign"></i> Follow Channels
    </a>
  </p>
</div>

<ul class="thumbnails">

<?php  echo $this->element('NewPanel/mychains_box'); ?>

</ul>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->