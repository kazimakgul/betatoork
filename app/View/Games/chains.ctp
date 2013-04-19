<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
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
  <h5>Follow Channels</h5>
  <p>Following a channel means that you like the channel and you want to be more connected to the channel and games they have. You don't have to go to any other game site to see anything new anymore.</p>
  <p>
    <a href="<?php echo $bestchannel; ?>" class="btn btn-danger">
      <i class="elusive-plus-sign"></i> Follow Channels
    </a>
  </p>
</div>

<div class="alert alert-info span7">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h5><i class="elusive-info-sign"></i> Tips and Tricks</h5>
  <p>Follow the channels you are interested about</p>
  <p>Your dashboard will be full of your interests.</p>
  <p>Channels will let you know first about the news they have.</p>
  <p>One game source to rule them all!</p>

</div>
</div>

<ul class="thumbnails">

<?php  echo $this->element('NewPanel/mychains_box'); ?>

</ul>



                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->